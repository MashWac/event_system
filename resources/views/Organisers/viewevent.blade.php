@extends('layouts.organisers')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header text-center">
            <h2>{{$data['viewevent']->event_name}}</h2>
            <p class="card-text">{{$data['viewevent']->event_date}}</p>
            <p class="card-text">{{$data['viewevent']->location}}</p>
            <div class="card">
            <div class="card-body">
                <h3>Statistics</h3>
            </div>
            <div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header ">
                <h5 class="card-title">Trend of Tickets Sold</h5>
              </div>
              <div class="card-body ">
                <canvas id="chartHours" width="400" height="100"></canvas>
              </div>

            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="card ">
              <div class="card-header ">
                <h5 class="card-title">Gender Statistics</h5>
              </div>
              <div class="card-body ">
                <canvas id="chartgender" width="1000" height="1000"><canvas>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card ">
              <div class="card-header ">
                <h5 class="card-title">Tickets Sold</h5>
              </div>
              <div class="card-body ">
                <h1>
                {{$soldtickets}} Tickets
                </h1>
              </div>
            </div>
          </div>
        </div>
            </div>
        </div>

    </div>
    <div class="card">
        <div class="card-header">
            <h2>Performances</h2>
            <div class="eventsearchpanel">
        <div class="searchoption">
            <form> 
                <input type="text" id="filteredsearchbox" name="searchbox"  placeholder="Search...artist">
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </div>
        <div class="organiserfilter">
            <ul id="organiserfilters">
                <li>
                    <div class="dropdown">
                    <button onclick="myFunction()" class="dropbtn">Date Added</button>
                    <div id="myDropdown" class="dropdown-content">
                        <a href="#home">Ascending</a>
                        <a href="#about">Descending</a>
                    </div>
                    </div>
                </li>
                <li>                   
                    <div class="dropdown">
                        <button onclick="myFunction()" class="dropbtn">Artists Name</button>
                        <div id="myDropdown" class="dropdown-content">
                            <a href="#home">Ascending</a>
                            <a href="#about">Descending</a>
                        </div>
                    </div>
                </li>
                <li>                   
                    <div class="dropdown">
                    <button onclick="myFunction()" class="dropbtn"> Number of Followers</button>
                    <div id="myDropdown" class="dropdown-content">
                        <a href="#home">Ascending</a>
                        <a href="#about">Descending</a>
                    </div>
                    </div>
                </li>

            </ul>
        </div>
      
    </div>
        </div>
        <div class="card-body">
            <table class="table table-striped" >
                <thead>
                    <tr>
                        <th> Artists Name</th>
                        <th>Event Name</th>
                        <th>Date of Event</th>
                        <th>Offer Accepted</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($data['performance'] as $item)
                    <tr>
                        <td>{{$item->first_name}} AKA {{$item->stage_name}}</td>
                        <td>{{$item->event_name}}</td>
                        <td>{{$item->event_date}}</td>
                        <td>{{$item->pay_offer}}</td>
                        <td><img src="{{asset('/assets/uploads/artists/'.$item->artist_photo) }}" height="130px" width="100px" alt='image here'></td>
                        <td>
                            <div class="paytoform">
                                <input type="text" class="form-control"name="evname" id="evname" value="{{$item->event_name}}" hidden>
                                <input type="text" class="form-control"name="artname" id="artname" value="{{$item->stage_name}}" hidden>
                                <input type='number' id="evid" name="evid" value="{{$item->event_id}}" hidden>
                                <input type='number' id="artid" name="artid" value="{{$item->artist_id}}" hidden>
                                <input type='number' id="ammyu" name="amountpay" value="{{$item->pay_offer}}" hidden>
                                <input type='number' id="orgid" name="orgid" value="{{$item->event_creator}}" hidden>
                                <button type="submit" class="btn btn-primary payoutform" >Payout</button>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
    <div class="bg-modal" style="display:none;" id="bbg">
            <div class="modal-content">
                <div class="card mb-3" style="max-width: 100%;">
                <form action="{{url('payartist')}}" method="POST" enctype="multipart/form-data">
                    @csrf 
                    <div class="col-md-6">
                        <input type='number' id="event_id" name="event_id" value="" hidden>
                        <label for="artname">Event Name:</label>
                        <input type="text" readonly class="form-control"name="eventyname" id="eventyname">
                        <input type='number' id="artist_id" name="artist_id" value="" hidden>
                        <label for="artname">Artist Name:</label>
                        <input type="text" readonly class="form-control"name="artist_name" id="artist_name">
                        <input type='number' id="organiserid" name="organiserid" value="" hidden>

                    </div>
                    <div class="col-md-6">
                        <label for="paymentoffer">Payment amount:</label>
                        <input type="number" class="form-control"name="paymentamount" id="paytoartist" value="">
                    </div>
                    <div class="col-md-6">
                    <label for="paylists">Select Payment Method:</label>
                        <input type="text" class="form-control"name="paylists" onchange='showmpesabox()'id="paylist" list="payselect">
                            <datalist id="payselect">
                                @foreach($data['paymethods'] as $vitu)
                                <option value="<?=$vitu['method_id']?>"><?=$vitu['method_name']?><option>
                                @endforeach
                            </datalist>
                    </div>
                    <div class="col-md-12">
                    <button type="submit" class="btn btn-primary" onclick="closureDiv()">Submit Offer</button>
                    </div>
                </form>
                
                </div>
                <div class="close" onclick="closureDiv()">+</div>
            </div>       
        </div>
</div>
<script>
            var _ydata=JSON.parse('<?php echo( json_encode( $dates))?>');
            var _xdata=JSON.parse('<?php echo(json_encode($tickets))?>');
            var genders=JSON.parse('<?php echo(json_encode($genders))?>');
            var genders=JSON.parse('<?php echo(json_encode($gendercount))?>');

        </script>
@endsection




