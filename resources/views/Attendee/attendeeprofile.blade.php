@extends('layouts.attendee')

@push('css')
    <link href="{{ asset('css/profile.css') }}" rel="stylesheet">
@endpush

@section('content')

<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span class="font-weight-bold">{{$data['attendee']->first_name ." ". $data['attendee']->last_name }}</span><span class="text-black-50">{{$data['attendee']->email}}</span><span> </span></div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Your profile</h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">First Name</label><input type="text" class="form-control" placeholder="First Name" value="{{$data['attendee']->first_name}}"></div>
                    <div class="col-md-6"><label class="labels">Last Name</label><input type="text" class="form-control" value="{{$data['attendee']->first_name}}" placeholder="Last Name"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Email</label><input type="text" class="form-control" placeholder="Email" value="{{$data['attendee']->email}}"></div>
                    <div class="col-md-12"><label class="labels">Age</label><input type="number" class="form-control" placeholder="Age" value="{{$data['attendee']->age}}"></div>
                    <div class="col-md-12"><label class="labels">Password</label><input type="password" class="form-control" placeholder="Password" value="{{$data['attendee']->password}}"></div>
                    <div class="col-md-12"><label class="labels">Confirm Password</label><input type="text" class="form-control" placeholder="Confirm Password" value=""></div>
                    <div class="col-md-12"><label class="labels">Updated</label><input readonly type="datetime-local" class="form-control" placeholder="enter address line 2" value="{{$data['attendee']->updated_at}}"></div>
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
            <input type="number"  name="phoneattendetransact" id="phoneattendetransact" placeholder="Enter Phone" onchange="editphone(this.value)" width="40%">
            <label for="amountattendetransact">Amount Transaction:</label>
            <input type="number"  name="amountattendetransact" id="amountattendetransact" placeholder="Enter Amount" onchange="editamount(this.value)" width="40%">
            <form action="depositattendee" method="POST" enctype="multipart/form-data" class="py-1">
                @csrf 
                @method('PUT')
                <div class="row wallattend">
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="depositattendee" id="depositattendee" hidden>
                        <input type="text" class="form-control" name="phonedattendee" id="phonedattendee" hidden>
                    </div>
                    <div class="col-md-12">
                    <button type="submit" class="btn btn-dark" style="background-color:#E223E2;">Deposit</button>
                    </div>
                </div>
            </form>
            <form action="withdrawattendee" method="POST" enctype="multipart/form-data">
                @csrf 
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="withdrawattendee" id="withdrawattendee" hidden>
                        <input type="text" class="form-control" name="phonewattendee" id="phonewattendee" hidden>
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
        <h2 id="headline">My Tickets</h2>
        </div>
    </div>
    <div class="card-body">
    <table class="table table-stripped table-hover" id="ticketstable">
                <thead>
                    <tr>
                        <th>Ticket Number</th>
                        <th>Event Name</th>
                        <th>Date of Event</th>
                        <th>Date of Purchase</th>
                        <th>Price</th>
                        <th>Ticket Type</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($data['tickets'] as $item)
                    <tr>
                        <td>{{$item->ticket_number}}</td>
                        <td>{{$item->event_name}}</td>
                        <td>{{$item->event_date}}</td>
                        <td>{{$item->created_at}}</td>
                        <td>{{$item->ticket_price}}</td>
                        <td>{{$item->ticket_type}}</td>

                        <td>
                            <a href="">
                                <button type="button" class="btn btn-dark">Download</button>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
    </div>
</div>
<div class="card py-1">
    <div class="card-header">
        <div class="headie">
        <h2 id="headline">Artists I Follow</h2>
        </div>
    </div>
    <div class="card-body">
    <table class="table table-stripped table-hover" id="ticketstable">
                <thead>
                    <tr>
                        <th>Artist Name</th>
                        <th>Photo</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($data['follows'] as $item)
                    <tr>
                        <td>{{$item->stage_name}}</td>
                        <td><img src="{{asset('/assets/uploads/artists/'.$item->artist_photo) }}" height="130px" width="100px" alt='image here'></td>
                        <td>
                            <a href="{{url('viewartist/'.$item->artist_id)}}">
                                <button type="button" class="btn btn-dark">View Content</button>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
    </div>
</div>

@endsection