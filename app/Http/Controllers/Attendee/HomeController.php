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
use Illuminate\Support\Facades\Session;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\PurchasesModel;
use App\Models\PurchasesdetailsModel;
use App\Models\User;
use App\Models\Videos;
use App\Models\Albums;
use App\Models\OrganiserWallet;
use PDF;



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
        $request=new Request;
        $tickettype=new TickettypeModel;
        session(['event' => $id]);
        $data['ticket']=$tickettype->where('ticket_types.event_id',$id)->where('ticket_types.is_deleted',0)->join('tbl_event', 'ticket_types.event_id', '=', 'tbl_event.event_id')->get();
        $count=0;
        if(!session('purchase')){
            foreach($data['ticket']as $item){
                $item_array=array('ticket_id'=>$item->tickettype_id,'ticket_type'=>$item->ticket_type,'subtotal'=>0,'quantity'=>0,'stock'=>$item->ticket_quantity,);
                $ticketdata[$count] = $item_array;
                Session::put('tickets', $ticketdata);

                $count++;
            }
            Session::put('purchase', true);
        }
        $data['ritems'] = Session::get('tickets', []);


        return view('Attendee.buytickets',compact('data'));
    }
    public function updatecart(Request $request){
        $count=0;
        $ticket_quantity=$request->input('ticketquantity');
        $ticketname=$request->input('ticket_name');
        $ticketprice=$request->input('ticket_price');
        $event=session('event');
        $items = Session::get('tickets', []);

            foreach ($items as &$item) {
                if ($item['ticket_type'] == $ticketname) {
                    $item['quantity']=$ticket_quantity;
                    $item['subtotal']=intval($ticket_quantity)*intval($ticketprice); 

                }
                
            }

            Session::put('tickets', $items);
            return redirect('buytickets/'.$event);


    }
    public function artistpage($id)
    {
        $videos=new Videos();
        $artists= new Artists;
        $albums=new Albums();
        $data['artist']=Artists::find($id);
        $data['videos']=$videos->join('content', 'videos.content_id', '=', 'content.content_id')->where('content.artist',$id)->get();
        $data['albums']=$albums->join('content', 'albums.content_id', '=', 'content.content_id')->where('content.artist',$id)->get();

        return view('Attendee.artistprofile',compact('data'));
    }
    public function refunds()
    {
        return view('Attendee.refunds');
    }
    public function checkout(Request $request){
        $tickets=new TicketModel;
        $tickettypes=new TickettypeModel;
        $purchase=new PurchasesModel;
        $purchasedetails= new PurchasesdetailsModel;
        $attwallet=new AttendeeWallet();
        $orgwallet=new OrganiserWallet();
        $method=$request->input('paymenttype');
        $eventid=session('event');

        if($method=='mpesa'){
            $phone=$request->input('mpesanumber');
            if(strlen($phone)!=10){
                return redirect('events')->with('status','Your phone number is not correct');
            }else{

                $items = Session::get('tickets', []);
                $x=1;
                $total=0;
                foreach ($items as &$item) {
                    $total+=$item['subtotal'];
                }
                $event= EventModel::find($eventid);

               
                $purchase->order_amount=$total;
                $purchase->event_id=session('event');
                $purchase->payment_method=1;
                $purchase->buyer_id=session('user_id');
                $purchase->organiser_id= $event->event_creator;
                $purchase->updated_at=Carbon::now();

                $f=$event->event_creator;
                $purchase->save();
                $m=$purchase->order_id;
                foreach ($items as &$item) {
                    $tickid=$item['ticket_id'];
                    $stock=intval($item['stock']);
                    $reducedquan=intval($item['quantity']);
                    $edtick=TickettypeModel::find($tickid);
                    $edtick->ticket_quantity=$stock-$reducedquan;
                    $edtick->update();
                    $count=intval($item['quantity']);
               
                    $datapu=['ticket_id'=>$tickid,
                        'purchase_id'=>$m,
                        'quantity'=>$reducedquan,
                        'updated_at'=>Carbon::now()];
                    $purchasedetails->insert($datapu);
                    
                    while($x<=$count){
                       
                        $filename= time();
                        $filename=intval($filename);
                        $filename=$filename+$x;
                        $data=['ticket_number'=>$filename,
                        'event_id'=>session('event'),
                        'purchase_date'=>Carbon::now(),
                        'buyer'=>session('user_id'),
                        'qr_id'=>$x.$filename.'.sgv',
                        'ticket_type'=>$tickid,
                        'updated_at'=>Carbon::now()];
                        QrCode::generate($filename, 'assets/uploads/tickets/'.$filename.'.svg');

                        $tickets->insert($data);
                        $x++;
                    }
                }
                
                $request->session()->forget('tickets');
                $request->session()->forget('event');
                session(['purchase'=>false]);
                
                return redirect('attendee')->with('status','Your purchase is successful');
            }
        }else{
            $items = Session::get('tickets', []);
                $x=1;
                $total=0;
                foreach ($items as &$item) {
                    $total+=$item['subtotal'];
                }

                $event= EventModel::find($eventid);

               
                $purchase->order_amount=$total;
                $purchase->event_id=session('event');
                $purchase->payment_method=1;
                $purchase->buyer_id=session('user_id');
                $purchase->organiser_id= $event->event_creator;
                $purchase->updated_at=Carbon::now();

                $f=$event->event_creator;
                $attendeewallet=$attwallet->where('user_id',session('user_id'))->get();
                foreach($attendeewallet as $item){
                    $newid=$item['wallet_id'];
                }
                $orgwallet=$orgwallet->where('organiser_id',$event->event_creator)->get();

                foreach($orgwallet as $item){
                    $id=$item['organiserwallet_id'];
                }
                $orgwallet=OrganiserWallet::find($id);
                $attendeewallet=AttendeeWallet::find($newid);
                $orgamount=$orgwallet->amount_available;
                $attamount=$attendeewallet->available_amount;
                $newamount=$total;
                $valuenew=intval($attamount)+intval($newamount);
                $reducedamout=intval($orgamount)-intval($newamount);
                if($orgamount<$newamount){
                    return redirect()->back()->with('status','Amount Not Updated. Insufficient Funds');
                }else{
                    $attendeewallet->available_amount=$reducedamout;
                    $attendeewallet->updated_at=Carbon::now();
                    $orgwallet->amount_available=$valuenew;
                    $orgwallet->updated_at=Carbon::now();
                    $attendeewallet->update();
                    $orgwallet->update();
                    $purchase->save();
                    $m=$purchase->order_id;
                foreach ($items as &$item) {
                    $tickid=$item['ticket_id'];
                    $stock=intval($item['stock']);
                    $reducedquan=intval($item['quantity']);
                    if(TickettypeModel::find($tickid)){
                        $edtick=TickettypeModel::find($tickid);
                        $edtick->ticket_quantity=500;
                        $edtick->update();
                        $count=intval($item['quantity']);
                   
                        $datapu=['ticket_id'=>$tickid,
                            'purchase_id'=>$m,
                            'quantity'=>$reducedquan,
                            'updated_at'=>Carbon::now()];
                        $purchasedetails->insert($datapu);
                        
                        while($x<=$count){
                           
                            $filename= time();
                            $filename=intval($filename);
                            $filename=$filename+$x;
                            $data=['ticket_number'=>$filename,
                            'event_id'=>session('event'),
                            'purchase_date'=>Carbon::now(),
                            'buyer'=>session('user_id'),
                            'qr_id'=>$x.$filename.'.svg',
                            'ticket_type'=>$tickid,
                            'updated_at'=>Carbon::now()];
                            QrCode::generate($filename, 'assets/uploads/tickets/'.$filename.'.svg');
    
                            $tickets->save($data);
                            $x++;
                        }

                    }else{
                        echo($tickid);


                    }
    
                }
                
                $request->session()->forget('tickets');
                $request->session()->forget('event');
                session(['purchase'=>false]);
                
                return redirect('attendee')->with('status','Your purchase is successful');

                }




            
        }
    }

    public function profilePage()
    {
        $follows=new FollowModel();
        $artists=new Artists();
        $user=session('user_id');
        $data['follows']=$artists->where('artists.is_deleted',0)->join('followers', 'artists.artist_id', '=', 'followers.following')->where('followers.follower',$user)->where('followers.is_deleted',0)->paginate(10);

        $userid=session('user_id');
        $tickets=new TicketModel();
        $attendeewallet=new AttendeeWallet();
        $data['attendee']=Attendee::find($userid);
        $data['wallet']=$attendeewallet->where('user_id', $userid)->get();
        $data['tickets']=$tickets->where('buyer',$userid)->join('ticket_types', 'tickets.ticket_type', '=', 'ticket_types.tickettype_id')->join('tbl_event', 'tickets.event_id', '=', 'tbl_event.event_id')->paginate(10);
        return view('Attendee.attendeeprofile', compact('data'));
    }
    public function deposit(Request $request,$id){
        $wallet=AttendeeWallet::find($id);
        $amount=$wallet->available_amount;
        $newamount=$request->input('depositattendee');
        $valuenew=intval($amount)+intval($newamount);
        $wallet->available_amount=$valuenew;
        $wallet->updated_at=Carbon::now();
        $wallet->update();

        return redirect('profile')->with('status','You Have Successfully Deposited');
    }
    public function withdraw(Request $request, $id){
        $wallet=AttendeeWallet::find($id);
        $amount=$wallet->available_amount;
        $newamount=$request->input('withdrawattendee');
        if(intval($amount)<intval($newamount)){
            return redirect('profile')->with('status','Not Enough Money In Your Account');

        }else{
            $valuenew=intval($amount)-intval($newamount);
            $wallet->available_amount=$valuenew;
            $wallet->updated_at=Carbon::now();
            
            if($wallet->update()){
            return redirect('profile')->with('status','Withdraw Successful.');
            }
        }


    }
    public function downloadtickets($id){
        $tickets=new TicketModel();
        $userid=session('user_id');

        $data['tickets'] =$data['tickets']=$tickets->where('buyer',$userid)->join('ticket_types', 'tickets.ticket_type', '=', 'ticket_types.tickettype_id')->join('tbl_event', 'tickets.event_id', '=', 'tbl_event.event_id')->where('tickets.ticket_id',$id)->paginate(10);
        ;
        $pdf = PDF::loadView('Attendee.ticket', compact('data'));
  
        return $pdf->download('ticket.pdf');
    }
    public function ticketpage($id){
        $tickets=new TicketModel();
        $userid=session('user_id');

        $data['tickets'] =$data['tickets']=$tickets->where('tickets.ticket_id',$id)->where('buyer',$userid)->join('ticket_types', 'tickets.ticket_type', '=', 'ticket_types.tickettype_id')->join('tbl_event', 'tickets.event_id', '=', 'tbl_event.event_id')->get();
        return view('Attendee.ticket', compact('data'));

    }

}
