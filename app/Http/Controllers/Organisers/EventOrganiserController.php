<?php

namespace App\Http\Controllers\Organisers;

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
use Carbon\Carbon;
use PHPUnit\Framework\Constraint\IsEmpty;


class EventOrganiserController extends Controller
{
    public function index(){
        return view('Organisers.index');
    }
    public function createevent(){
        return view('Organisers.createevent');
    }
    public function addevent(Request $request){
        $event=new EventModel;
        $tickettype=new TickettypeModel;
        if($request->hasFile('eventflyer')){
            $file=$request->file('eventflyer');
            $ext=$file->getClientOriginalExtension();
            $filename= time().'.'.$ext;
            $file->move('assets/uploads/events/',$filename);
            $event->event_flyer=$filename;
        }
        $event->event_name=$request->input('eventname');
        $event->location=$request->input('location');
        $event->event_description=$request->input('eventdescr');
        $event->event_creator=session('user_id');
        $event->event_date=$request->input('eventtime');
        $event->updated_at= Carbon::now();
        if($event->save()){

            if($request->input('earlybirdprice') && $request->input('earlybirdquan')){ 
                $event_id=$event->event_id;
                $data=[
                'event_id'=>$event_id,
                'updated_at'=> Carbon::now(),
                'ticket_type'=>$request->input('earlybirdname'),
                'ticket_price'=>$request->input('earlybirdprice'),
                'ticket_quantity'=>$request->input('earlybirdquan'),
                ];  
                $tickettype->insert($data);
            }
            if($request->input('advancedprice') && $request->input('advancedquan')){ 
                $event_id=$event->event_id;
                $data=[
                    'event_id'=>$event_id,
                    'updated_at'=> Carbon::now(),
                    'ticket_type'=>$request->input('advancedname'),
                    'ticket_price'=>$request->input('advancedprice'),
                    'ticket_quantity'=>$request->input('advancedquan'),
                    ];  

                $tickettype->insert($data);

            }
            if($request->input('vipprice') && $request->input('vipquan')){   
                $event_id=$event->event_id;
                $data=[
                    'event_id'=>$event_id,
                    'updated_at'=> Carbon::now(),
                    'ticket_type'=>$request->input('vipname'),
                    'ticket_price'=>$request->input('vipprice'),
                    'ticket_quantity'=>$request->input('vipquan'),
                    ];  

                $tickettype->insert($data);
            }

            if($request->input('flashsaleprice') && $request->input('flashsalequan')){ 
                $event_id=$event->event_id;
                $data=[
                    'event_id'=>$event_id,
                    'updated_at'=> Carbon::now(),
                    'ticket_type'=>$request->input('flashsalename'),
                    'ticket_price'=>$request->input('flashsaleprice'),
                    'ticket_quantity'=>$request->input('flashsalequan'),
                    ];  
                $tickettype->insert($data);

            }
            
            return redirect('createevent')->with('status','Event Created Successfully');
        }
        return redirect('products')->with('status','Product Added Successfully.');
    }
    public function activeevents(){
        $organiser=session('user_id');
        // get the current time
        $current = Carbon::now();
        $event=new EventModel;
        // sub 3 hours to the current time
        $eventtime = $current->subHours(3);

        $data['events']=$event->whereDate('event_date', '>=',$eventtime->toDateString())->where('is_deleted',0)->where('event_creator',$organiser)->get();

        return view('Organisers.activeevents',compact('data'));
    }

    public function previousevents(){
        $organiser=session('user_id');
        // get the current time
        $current = Carbon::now();
        $event=new EventModel;
        // sub 3 hours to the current time
        $eventtime = $current->subHours(3);

        $data['events']=$event->whereDate('event_date', '<',$eventtime->toDateString())->where('is_deleted',0)->where('event_creator',$organiser)->get();
        return view('Organisers.previousevents',compact('data'));
    }
    public function findartists(){
        $organiser=session('user_id');
        // get the current time
        $current = Carbon::now();
        $event=new EventModel;
        // sub 3 hours to the current time
        $eventtime = $current->subHours(3);

        $data['events']=$event->whereDate('event_date', '>=',$eventtime->toDateString())->where('is_deleted',0)->where('event_creator',$organiser)->get();
        $data['artists']=Artists::all();
        return view('Organisers.findartists',compact('data'));
    }
    public function sendrequest(Request $request){
        $booking=new BookingsModel();
        $booking->event_id=$request->input('sendeventreq');
        $booking->artist_id=$request->input('artistsend');
        $booking->organiser_id=session('user_id');
        $booking->pay_offer=$request->input('paymentoffer');
        $booking->approval_status='Pending';
        $booking->updated_at= Carbon::now();
        if($booking->save()){
            return redirect('findartists')->with('status','Request Sent Successfully');
        }
        else{
            return redirect('findartists')->with('status','Request unsuccessful');

        }

    }
    public function acceptedrequests(){
        return view('Organisers.acceptedrequests');
    }
    public function deniedrequests(){
        return view('Organisers.deniedrequests');
    }

}
