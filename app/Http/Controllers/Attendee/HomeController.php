<?php

namespace App\Http\Controllers\Attendee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EventModel;
use App\Models\TicketModel;
use App\Models\TickettypeModel;
use App\Models\ContentModel;
use App\Models\Artists;
use App\Models\Attendee;
use App\Models\Organiser;
use App\Models\AttendeeWallet;
use App\Models\ArtistWallet;
use App\Models\BookingsModel;
use App\Models\FollowModel;
use Carbon\Carbon;
use PHPUnit\Framework\Constraint\IsEmpty;

class HomeController extends Controller
{
    public function index(){
        $artists=new Artists;
        // get the current time
        $current = Carbon::now();
        $event=new EventModel;
        // sub 3 hours to the current time
        $eventtime = $current->subHours(3);
        $lastevent=$current->addDays(7);

        $data['events']=$event->whereDate('event_date', '>=',$eventtime->toDateString())->whereDate('event_date', '<',$lastevent->toDateString())->take(12)->where('is_deleted',0)->get();
        $data['artists']=$artists->where('is_deleted',0)->take(10)->get();
        return view('Attendee.homepage',compact('data'));
    }
    public function events()
    {
        $artists=new Artists;
        // get the current time
        $current = Carbon::now();
        $event=new EventModel;
        // sub 3 hours to the current time
        $eventtime = $current->subHours(3);
        $lastevent=$current->addDays(7);

        $data['events']=$event->whereDate('event_date', '>=',$eventtime->toDateString())->whereDate('event_date', '<',$lastevent->toDateString())->where('tbl_event.is_deleted',0)->join('event_organisers', 'tbl_event.event_creator', '=', 'event_organisers.organiser_id')->where('event_organisers.is_deleted',0)->take(3)->get();
        $data['eventmob']=$event->whereDate('event_date', '>=',$eventtime->toDateString())->where('tbl_event.is_deleted',0)->join('event_organisers', 'tbl_event.event_creator', '=', 'event_organisers.organiser_id')->where('event_organisers.is_deleted',0)->paginate(6);
        return view('Attendee.event', compact('data'));
    }
    public function artists()
    {
        $artists= new Artists;
        $user=session('user_id');
        $data['follows']=$artists->where('artists.is_deleted',0)->join('followers', 'artists.artist_id', '=', 'followers.following')->where('followers.follower',$user)->where('followers.is_deleted',0)->take(6)->get(['artists.*','followers.following']);

        $data['artists']=$artists->where('is_deleted',0)->paginate(6);

        return view('Attendee.artists',compact('data'));
    }
    public function followartist($id){
        $follows=new FollowModel;
        $user=session('user_id');
        $data_follow = $follows->where('follower',$user)->where('following',$id)->where('is_deleted',0)->first();
        $data_usedto=$follows->where('follower',$user)->where('following',$id)->where('is_deleted',1)->first();
        if(!empty($data_follow)){
            return redirect('artists')->with('status','You already follow this artist');
        }elseif(!empty($data_usedto))
        {
            $id=$data_usedto['follow_id'];
            $follows=FollowModel::find($id);
            $follows->is_deleted=0;
            $follows->updated_at= Carbon::now();
            $follows->update();
            return redirect('artists')->with('status','Artist Followed');

        }else{
            $follows->follower=$user;
            $follows->following=$id;
            $follows->updated_at= Carbon::now();
            if($follows->save()){
                return redirect('artists')->with('status','Artist Followed');
            }
            else{
                return redirect('artists')->with('status','Failed to Follow');
            }
        }
    }
    public function buytickets($id){
        $tickettype=new TickettypeModel;
        session(['event' => $id]);
        $data['ticket']=$tickettype->where('ticket_types.event_id',$id)->where('ticket_types.is_deleted',0)->join('tbl_event', 'ticket_types.event_id', '=', 'tbl_event.event_id')->get();
        return view('Attendee.buytickets',compact('data'));
    }
    public function artistpage($id)
    {
        $artists= new Artists;
        $data['artist']=Artists::find($id);
        return view('Attendee.artistprofile',compact('data'));
    }
    public function refunds()
    {
        return view('Attendee.refunds');
    }
    public function checkout(Request $request){
        $tickets=new TicketModel;
        $method=$request->input('paymenttype');

        if($method=='mpesa'){
            $phone=$request->input('mpesanumber');
            if(strlen($phone)!=0){
                return redirect('events')->with('status','Your phone number is not correct');
            }else{

                return redirect('attendee')->with('status','Your purchase is successful');
            }
        }else{
            

        }

    }

    public function profilePage(Attendee $attendee)
    {
        return view('Attendee.attendeeprofile')->with(['attendee' => $attendee]);
    }

}
