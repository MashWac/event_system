@extends('layouts.organisers')
@section('content')

<div class="container-fluid">

    <div class="card">
        <div class="card-header">
            <h2>Find New Artists</h2>
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
                        <th>Stage Name</th>
                        <th>Date Added</th>
                        <th>Number of Followers</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($data['artists'] as $item)
                    <tr>
                        <input type="number" id="artistid" value="{{$item->artist_id}}" hidden>
                        <td>{{$item->first_name}} {{$item->last_name}}</td>
                        <td>{{$item->stage_name}}</td>
                        <td>{{$item->created_at}}</td>
                        <td>{{$item->followers}}</td>
                        <td><img src="{{asset('/assets/uploads/artists/'.$item->artist_photo) }}" height="130px" width="100px" alt='image here'></td>
                        <td> 
                            
                                <button type="submit" class="btn btn-primary" onclick="showorgDiv()">Send Request</button>
                        
                            <a href="">
                                <button class="btn btn-moreinfo btn-dark" style="margin-top:6px;">View Reviews</button>
                            </a>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
        <div class="bg-modal" style="display:none;" id="bg-modal">
        <div class="modal-content">
            <div class="card mb-3" style="max-width: 100%;">
            <form action="sendrequest" method="POST" enctype="multipart/form-data">
                @csrf 
                <div class="col-md-6">
                    <label for="sendeventreq">Select Event:</label>
                    <input type="text" class="form-control"name="sendeventreq" id="event-listings" list="eventselect">
                        <datalist id="eventselect">
                            @foreach($data['events'] as $item)
                            <option value="<?=$item['event_id']?>"><?="Event-".$item['event_name']?><option>
                            @endforeach
                        </datalist>
                        <input type='number' id="artistsend" name="artistsend" value="" hidden>
                </div>
                <div class="col-md-6">
                    <label for="paymentoffer">Payment Offer:</label>
                    <input type="text" class="form-control"name="paymentoffer" id="payoffer">
                </div>
                <div class="col-md-12">
                <button type="submit" class="btn btn-primary" onclick="closeorgDiv()">Submit Offer</button>
                </div>
            </form>
            
            </div>
            <div class="close" onclick="closeorgDiv()">+</div>
        </div>       
</div>
    </div>
</div>
 
@endsection




