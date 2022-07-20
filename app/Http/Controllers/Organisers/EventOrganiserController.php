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
use App\Models\PerformanceModel;
use App\Models\PurchasesModel;
use App\Models\ReversalModel;
use App\Models\ArtistsPaymentModel;
use App\Models\OrganiserWallet;
use App\Models\PaymentMethodsModel;
use App\Models\FollowModel;


class EventOrganiserController extends Controller
{
    public function index(){
        $tickets=new TicketModel();
        $attendees=new Attendee();
        $artists=new Artists();
        $user=session('user_id');
        $data['totalticketsold']=$tickets->join('ticket_types', 'tickets.ticket_type', '=', 'ticket_types.tickettype_id')->join('tbl_event', 'tickets.event_id', '=', 'tbl_event.event_id')->where('tbl_event.event_creator',$user)->selectRaw("COUNT(*) as count, DATE_FORMAT(tickets.created_at, '%Y %m %e') as created_data")
        ->whereBetween('tickets.created_at', [Carbon::createFromDate(2020,3,4), Carbon::now()])
        ->groupBy('tickets.created_at')
        ->get();

        $data['gendermaledemographics']=$tickets->join('ticket_types', 'tickets.ticket_type', '=', 'ticket_types.tickettype_id')->join('tbl_event', 'tickets.event_id', '=', 'tbl_event.event_id')->where('tbl_event.event_creator',$user)->join('users', 'users.user_id', '=', 'tickets.buyer')->where('users.gender','male')->count();
        $data['genderfemaledemographics']=$tickets->join('ticket_types', 'tickets.ticket_type', '=', 'ticket_types.tickettype_id')->join('tbl_event', 'tickets.event_id', '=', 'tbl_event.event_id')->where('tbl_event.event_creator',$user)->join('users', 'users.user_id', '=', 'tickets.buyer')->where('users.gender','female')->count();
        $data['genders']=['males'=>$data['gendermaledemographics'], 'females'=>$data['genderfemaledemographics']];
        $data['totalsales']=$tickets->join('ticket_types', 'tickets.ticket_type', '=', 'ticket_types.tickettype_id')->join('tbl_event', 'tickets.event_id', '=', 'tbl_event.event_id')->where('tbl_event.event_creator',$user)->count();
        $newdatedata=[];
        $datachecked=[];
        $timings=[];
        $times=[];
        $alltimes=[];
        $current=0;
        $wow=[];
        foreach(compact($data['totalticketsold']) as $item){
            $timecreate=$item['created_data'];
            $thecount=$item['count'];
            array_push($datachecked,array($timecreate=>$thecount));
        }

        print_r($datachecked);


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
    public function updateevent(Request $request,$id){
        $event=EventModel::find($id);
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
        $event->update();
        return redirect('activeevents')->with('status','Event Updated Successfully.');

    }
    public function activeevents(){
        $organiser=session('user_id');
        // get the current time
        $current = Carbon::now();
        $event=new EventModel;
        $booking=new BookingsModel;
        $artists=new Artists;
        // sub 3 hours to the current time
        $eventtime = $current->subHours(3);
        $noadds=$current->subDays(2);

        $data['events']=$event->whereDate('event_date', '>=',$eventtime->toDateString())->where('is_deleted',0)->where('event_creator',$organiser)->get();
        $data['waiting']=$artists->where('artists.is_deleted',0)->join('bookings', 'artists.artist_id', '=', 'bookings.artist_id')->where('bookings.approval_status','Accepted')->where('bookings.is_deleted','0')->join('tbl_event', 'bookings.event_id', '=', 'tbl_event.event_id')->whereDate('event_date', '>=',$noadds->toDateString())->where('tbl_event.is_deleted',0)->where('event_creator',$organiser)->get();

        return view('Organisers.activeevents',compact('data'));
    }
    public function addtoevent($id,$event_id,$booking_id){
        $event= EventModel::find($event_id);
        $organiser=$event->event_creator;
        $time_event=$event->event_date;
        $time_event= Carbon::create($time_event);
        $time_before=$time_event->subHours(4);
        $performance= new PerformanceModel();
        $data=$performance->where('event_performances.performer_id',$id)->where('event_performances.is_deleted',0)->join('tbl_event', 'event_performances.event_id', '=', 'tbl_event.event_id')->where('tbl_event.is_deleted',0)->whereDate('event_date', '>=',$time_before->toDateString())->whereDate('event_date', '<=',$time_event->toDateString())->get();
        if($data->IsEmpty()){
            $performance->performer_id=$id;
            $performance->event_id=$event_id;
            $performance->organiser_id=$organiser;
            $performance->updated_at= Carbon::now();
            $performance->accepted_booking=$booking_id;
            if($performance->save()){
                $bookings= new BookingsModel();
                $datab=$bookings->where('event_id',$event_id)->where('artist_id',$id)->where('organiser_id',$organiser)->get();

                foreach($datab as $item){
                    $item->is_deleted=1;
                    $item->updated_at= Carbon::now();
                    $item->update();
                 
                }
                return redirect('activeevents')->with('status','Performer Has Been Added To Event');
            }
            else{
                return redirect('activeevents')->with('status','Error Adding Performer.');

            }



        }else{
            return redirect('activeevents')->with('status','Cannot Add Performer. Conflicting Performce Time With Another Event.');
        }

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
    public function deleteevent($event_id){
        $event=new EventModel();
        $del_event=EventModel::find($event_id);
        $eventdate=$del_event->event_date;
        $eventdate=Carbon::create($eventdate);
        $current=Carbon::now();
        $current=$current->subHours(3);
        $timebefore=$eventdate->subDays(2);
        if($eventdate<=$timebefore){
            $del_event->is_deleted=1;
            $del_event->updated_at=Carbon::now();
            $del_event->update();
            return redirect('organisers')->with('status','Event Has been deleted.');

        }elseif($eventdate<=$current){
            return redirect('organisers')->with('status','Event is too soon cannot be deleted.');
        }  
        else{
            $purchases=new PurchasesModel();
            $refund_amount=$purchases->where('event_id',$event_id)->sum('order_amount');
            $reversal=new ReversalModel();
            $reversal->event_id=$event_id;
            $reversal->reversal_amount=$refund_amount;
            $reversal->save();

            $del_event->is_deleted=1;
            $del_event->updated_at=Carbon::now();
            $del_event->update();
            return redirect('organisers')->with('status','Event Has been deleted.');


        }

    }
    public function viewevent($id){
        $data['viewevent']=EventModel::find($id);
        $paymeths= new PaymentMethodsModel();
        $data['paymethods']=$paymeths->all();
        $payouts=new ArtistsPaymentModel();
        $performances=new PerformanceModel();
        $data['performance']=$performances->where('event_performances.is_deleted',0)->where('event_performances.event_id',$id)->join('tbl_event', 'event_performances.event_id', '=', 'tbl_event.event_id')->join('artists', 'event_performances.performer_id', '=', 'artists.artist_id')->join('bookings', 'event_performances.accepted_booking', '=', 'bookings.booking_id')->get();
        $data['payout']=$payouts->join('event_performances', 'artist_payment.event_id', '=', 'event_performances.event_id')->groupBy('artist_payment.recepient_id')->sum('amount');
        return view('Organisers.viewevent',compact('data'));
    }
    public function editevent($id){
        $data['event']=EventModel::find($id);
        $tickettypes=new TickettypeModel();
        $data['tickettypes']=$tickettypes->where('event_id',$id)->get();
        return view('Organisers.editevent',compact('data'));
    }
    public function deleteperformance($id){
        $performance=PerformanceModel::find($id);
        $performance->is_deleted=1;
        $performance->update();
    }
    public function findartists(){
        $organiser=session('user_id');
        $followers=new FollowModel();
        $current=Carbon::now();
        // get the current time
        $current = Carbon::now();
        $event=new EventModel;
        // sub 3 hours to the current time
        $eventtime = $current->subHours(3);

        $data['events']=$event->where('is_deleted',0)->whereDate('event_date', '>=',$eventtime->toDateString())->where('event_creator',$organiser)->get();
        $data['artists']=Artists::all();
        foreach($data['artists'] as $item){
            $artistid=$item->artist_id;
            $data['followers']=$followers->where('following',$artistid)->count();
            $item->followers=$data['followers'];
        }
        return view('Organisers.findartists',compact('data'));
    }
    public function payartist(Request $request){
        $payment_artist=new ArtistsPaymentModel();
        $artist_wallet=new ArtistWallet();
        $organiser_wallet=new OrganiserWallet();
        $payment_artist->amount=$request->input('paymentamount');
        $payment_artist->payer_id=$request->input('organiserid');
        $payment_artist->recepient_id=$request->input('artist_id');
        $payment_artist->event_id=$request->input('event_id');
        $payment_artist->paylists=$request->input('organiserid');

        $payment_artist->save();

        $artist_wallet->artist_id=$request->input('artist_id');
        $artist_wallet->save();

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
        $organiser=session('user_id');
        $artists=new Artists;
        $data['accepts']=$artists->where('artists.is_deleted',0)->join('bookings', 'artists.artist_id', '=', 'bookings.artist_id')->where('bookings.approval_status','Accepted')->join('tbl_event', 'bookings.event_id', '=', 'tbl_event.event_id')->where('event_creator',$organiser)->get();
        return view('Organisers.acceptedrequests',compact('data'));
    }
    public function deniedrequests(){
        $organiser=session('user_id');
        $artists=new Artists;
        $data['rejects']=$artists->where('artists.is_deleted',0)->join('bookings', 'artists.artist_id', '=', 'bookings.artist_id')->where('bookings.approval_status','rejected')->join('tbl_event', 'bookings.event_id', '=', 'tbl_event.event_id')->where('event_creator',$organiser)->get();
        return view('Organisers.deniedrequests',compact('data'));
    }
    public function organiserprofile()
    {
        $userid=session('user_id');
        $tickets=new TicketModel();
        $organiserwallet=new OrganiserWallet();
        $data['organiser']=Organiser::find($userid);
        $data['wallet']=$organiserwallet->where('organiser_id', $userid)->get();
        return view('Organisers.organiserprofile', compact('data'));
    }

}
