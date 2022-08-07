@extends('layouts.artists')

@section('content')
@push('css')
    <link href="{{ asset('css/profile.css') }}" rel="stylesheet">
@endpush


<div class="container rounded bg-white mt-5 mb-5" style="background:white; height:fit-content;">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="{{asset('assets/uploads/artists/'.$data['artist']->artist_photo)}}"><span class="font-weight-bold">{{$data['artist']->first_name ." ". $data['artist']->last_name }}</span><span class="text-black-50">{{$data['artist']->email}}</span><span>Number of Followers</span><span class="text-black-50"> {{$data['followers']}} Followers</span></div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Your profile</h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">First Name</label><input type="text" class="form-control" placeholder="First Name" value="{{$data['artist']->first_name}}"></div>
                    <div class="col-md-6"><label class="labels">Last Name</label><input type="text" class="form-control" value="{{$data['artist']->first_name}}" placeholder="Last Name"></div>
                    <div class="col-md-6"><label class="labels">Stage Name</label><input type="text" class="form-control" value="{{$data['artist']->stage_name}}" placeholder="Last Name"></div>

                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Email</label><input type="text" class="form-control" placeholder="Email" value="{{$data['artist']->email}}"></div>
                    <div class="col-md-12"><label class="labels">Password</label><input type="password" class="form-control" placeholder="Password" value="{{$data['artist']->password}}"></div>
                    <div class="col-md-12"><label class="labels">Confirm Password</label><input type="text" class="form-control" placeholder="Confirm Password" value=""></div>
                    <div class="col-md-12"><label class="labels">Updated</label><input readonly type="datetime-local" class="form-control" placeholder="enter address line 2" value="{{$data['artist']->updated_at}}"></div>
                </div>
                <div class="col-md-12">
                        <label for="eventflyer">Profile photo:</label>
                        <input type="file" id="img"  name="eventflyer">
                    </div>

                    <div class="col-md-6">
                        <h4>Current Photo</h4> 
                        @if($data['artist']->artist_photo)
                        <img src="{{asset('assets/uploads/artists/'.$data['artist']->artist_photo)}}" alt="Artist Photo" height='400px' width='350px'>
                        @endif
                    </div>
                    <div class="col-md-6" >
                        <h4>New Photo</h4> 
                        <div id="selectedBanner">
                        
                        </div>

                    </div>
                <div class="mt-5 text-center"><button type="submit" class="btn btn-dark" style="background-color:#E223E2;">Update Profile</button></div>
            </div>
        </div>
    </div>
</div>
<div class="card py-1">
    <div class="card-header">
        <div class="headie">
        <h2 id="headline">My Wallet</h2>
        </div>
    </div>
    <div class="card-body">
    @foreach($data['wallet'] as $item)

    <div class="card text-center">
        
        <div class="card-header">
            Current status
        </div>
        <div class="card-body">
            <h5 class="card-title">Wallet Ballance: {{$item->amount}}</h5>
            <p class="card-text">Perform Transaction</p>
            <label for="phoneattendetransact">Mpesa Phone Number:</label>
            <input type="number"  name="phoneattendetransact" id="phoneattendetransact" placeholder="Enter Phone" onchange="editartphone(this.value)" width="40%">
            <label for="amountattendetransact">Amount Transaction:</label>
            <input type="number"  name="amountattendetransact" id="amountartusttransact" placeholder="Enter Amount" onchange="editartamount(this.value)" width="40%">
            <form action="{{url('withdrawartist/'.$item->artistswallet_id)}}" method="POST" enctype="multipart/form-data">
                @csrf 
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="withdrawartist" id="withdrawartist" value="" hidden >
                        <input type="text" class="form-control" name="phonewartist" id="phonewartist"hidden >
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-dark">Withdraw</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-footer text-muted">
            Last Update: {{$item->updated_at}}
        </div>
        </div>
        @endforeach
    </div>
</div>
<div class="card py-1">
    <div class="card-header">
        <div class="headie">
        <h2 id="headline">My Schedule</h2>
        </div>
    </div>
    <div class="card-body">
    <table class="table table-stripped table-hover" id="ticketstable">
                <thead>
                    <tr>
                        <th>Event Name</th>
                        <th>Date of Event</th>
                        <th>Date of Booking</th>
                        <th>Pay Offered</th>
                        <th>Event Organiser</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($data['schedule'] as $item)
                    <tr>
                        <td>{{$item->event_name}}</td>
                        <td>{{$item->event_date}}</td>
                        <td>{{$item->dateofbooking}}</td>
                        <td>{{$item->pay_offer}}</td>
                        <td>{{$item->name}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
    </div>
</div>
<div class="card py-1">
    <div class="card-header">
        <div class="headie">
        <h2 id="headline">Events Performed</h2>
        </div>
    </div>
    <div class="card-body">
    <table class="table table-stripped table-hover" id="ticketstable">
                <thead>
                    <tr>
                        <th>Event Name</th>
                        <th>Date of Event</th>
                        <th>Date of Booking</th>
                        <th>Pay Offered</th>
                        <th>Event Organiser</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($data['events'] as $item)
                    <tr>
                        <td>{{$item->event_name}}</td>
                        <td>{{$item->event_date}}</td>
                        <td>{{$item->dateofbooking}}</td>
                        <td>{{$item->pay_offer}}</td>
                        <td>{{$item->name}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
    </div>
</div>

@endsection