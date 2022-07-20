<?php

namespace App\Http\Controllers\Artist;

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
use Illuminate\Support\Facades\Session;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\PurchasesModel;
use App\Models\PurchasesdetailsModel;
use App\Models\PerformanceModel;


class ArtistHomeController extends Controller
{
    public function index(){
        return view('Artists.index');
    }

    public function content(){
        return view('Artists.mycontent');
    }

    public function bookings(){
        $bookings=new BookingsModel();
        $artist_id=session('user_id');
        $current = Carbon::now();
        $event=new EventModel;
        // sub 3 hours to the current time
        $eventtime = $current->subDays(2);
        $data['bookings']=$bookings->where('bookings.is_deleted',0)->where('bookings.approval_status','Pending')->whereDate('bookings.created_at', '>=',$eventtime->toDateString())->where('bookings.artist_id',$artist_id)->join('tbl_event', 'bookings.event_id', '=', 'tbl_event.event_id')->where('tbl_event.is_deleted',0)->join('event_organisers', 'tbl_event.event_creator', '=', 'event_organisers.organiser_id')->paginate(8);
        return view('Artists.eventbookings',compact('data'));
    }
    public function rejectoffer($id){
        $bookings=BookingsModel::find($id);
        $bookings->approval_status='rejected';
        $bookings->updated_at= Carbon::now();
        $bookings->update();
        return redirect('eventbookings')->with('status','Offer has been rejected');
    }
    public function acceptoffer($id){
        $bookings=BookingsModel::find($id);
        $current = Carbon::now();
        $event=new EventModel;
        $event=$bookings->event_id;
        $eventsearch=EventModel::find($event);
        $similartime=$eventsearch->event_date;
        $similartime=Carbon::create($similartime);
        $similartime=$similartime->subHours(4);
        // sub 3 hours to the current time
        $eventtime = $current->subDays(2);
        $artist_id=session('user_id');
        $performance= new PerformanceModel();
        $data['perform']=$performance->where('event_performances.is_deleted',0)->where('performer_id',$artist_id)->join('tbl_event', 'event_performances.event_id', '=', 'tbl_event.event_id')->whereDate('tbl_event.event_date', '>=',$eventtime->toDateString())->where('tbl_event.is_deleted',0)->get();
        foreach($data['perform']as $item){
            if($item->event_date<=$similartime){
                return redirect('eventbookings')->with('status','Offer cannot be accepted because of timing');
            }
        }
        $bookings->approval_status='Accepted';
        $bookings->updated_at= Carbon::now();
        $bookings->update();
        return redirect('eventbookings')->with('status','Offer has been Accepted');
    }

    public function feedback(){
        return view('Artists.contentfeedback');
    }

    public function display(){
        return view('Artists.videodisplay');
    }

    public function display2(){
        return view('Artists.albumsdisplay');
    }
    public function myartistprofile()
    {
        $userid=session('user_id');
        $performances=new PerformanceModel();
        $artistwallet=new ArtistWallet();
        $followers=new FollowModel();
        $current=Carbon::now();
        $data['followers']=$followers->where('following',$userid)->count();
        $data['artist']=Artists::find($userid);
        $data['wallet']=$artistwallet->where('artist_id', $userid)->get();
        $data['schedule']=$performances->where('performer_id',$userid)->join('tbl_event', 'event_performances.event_id', '=', 'tbl_event.event_id')->join('bookings', 'event_performances.accepted_booking', '=', 'bookings.booking_id')->join('event_organisers', 'event_performances.organiser_id', '=', 'event_organisers.organiser_id')->paginate(10);
        $data['events']=$performances->where('performer_id',$userid)->join('tbl_event', 'event_performances.event_id', '=', 'tbl_event.event_id')->join('bookings', 'event_performances.accepted_booking', '=', 'bookings.booking_id')->join('event_organisers', 'event_performances.organiser_id', '=', 'event_organisers.organiser_id')->whereDate('event_date', '<',$current->toDateString())->paginate(10);

        return view('Artists.artistprofile',compact('data'));
    }
}
