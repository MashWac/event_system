@extends('layouts.attendee')
@section('content')
<div class="con">
    <div class="card py-1">
        <div class="card-header">
            <div class="headie">
            <h2 id="headline">Highlights</h2>
            </div>
        </div>
        <div id="filters">
            <form action="{{ url('/search') }}" method="GET">
                <div id="searchboxcrit">
                    <input type="text" type="search" value="{{ old('searchitem') }}" name="searchitem" id="search_item" placeholder="Search Event">
                    <button type="submit" class="btn btn-dark"><ion-icon name="search"></ion-icon></button>
                </div>
            </form>
            <form action="Displayprods/filterproducts"  method="POST">

            <ul id=filteropts>
            <h4 id="selby">Filters:</h4>
                <li>
                <label class="filterlabels" for="select-cato">Event Type:</label>
                    <select name="select-cato" id="selectcato">
                        <optgroup label="category">
                        <option selected>None</option>
                        <option>Men</option>
                        <option>Women</option>
                        <option>Children</option>
                        <option>Pets</option>
                        </optgroup>
                    </select>
                </li>
                <li>               
                    <label class="filterlabels" for="select-price">Price:</label>
                    <select name="select-price" id="selectprice">
                        <option selected>None</option>
                        <option>Ascending</option>
                        <option>Descending</option>
                    </select>
                </li>
                <li>               
                    <label class="filterlabels" for="select-sales">Date:</label>
                    <select name="select-sales" id="selectsales">
                        <option selected>None</option>
                        <option>Ascending</option>
                        <option>Descending</option>
                    </select>
                </li>
                <li>               
                <button type="button" class="btn btn-dark" style="background-color:#E223E2;">Filter</button>
                </li>
            </ul>
            </form>
        </div>
        <div class="card-body">
            <div class="row py-3 px-5">
            @foreach($data['events'] as $item)
                <div class="col-sm-4 py-1">
                    <div class="card">
                        <input type="text" id="eventflyer" value="asset('/assets/uploads/events/'.$item->event_flyer)" hidden >
                        <img src="{{asset('/assets/uploads/events/'.$item->event_flyer) }}" height="390px" class="card-img-top" alt="care">
                        <div class="card-body details">
                            <input type="text" id="eventnames" value="{{$item->event_name}}" hidden >
                            <input type="text" id="eventlocation" value="{{$item->location}}" hidden >
                            <input type="text" id="eventtime" value=" {{$item->event_date}}" hidden>
                            <input type="text" id="eventdescription" value=" {{$item->event_description}}" hidden>
                            <input type="text" id="organiser" value=" {{$item->name}}" hidden>
                            <input type="text" id="eventflyer" value="assets/uploads/events/{{$item->event_flyer}}" hidden>

                            <p class="card-text">{{$item->event_date}} {{$item->location}} </p>
                            
                            <button type="button" class="btn btn-dark btnshowmodal">More Details</button>
                        
                            <a href="{{url('buytickets/'.$item->event_id)}}">
                                <button type="button" class="btn btn-dark" style="background-color:#E223E2;">Buy Ticket</button>
                            </a>     
                        </div>
                    </div>
                </div>
                @endforeach
   
            </div>
        </div>
    </div>
    <div id="eventbreak">
            <div id="breaktext">
                <p id="breakmessage"> The Best Events That Suit Your Needs.</p>
                <p id="breakmoreinfo">Blow off some steam with our line up.</p>
            </div>
    </div>
    <div id="filters">
                <div id="searchboxcrit">
                    <input type="text" name="searchitem" id="search_item" placeholder="Search Event">
                    <button type="button" class="btn btn-dark"><ion-icon name="search"></ion-icon></button>
                </div>
            <form action="Displayprods/filterproducts"  method="POST">

            <ul id=filteropts>
            <h4 id="selby">Filters:</h4>

                <li>
                <label class="filterlabels" for="select-cato">Event Type:</label>
                    <select name="select-cato" id="selectcato">
                        <optgroup label="category">
                        <option selected>None</option>
                        <option>Men</option>
                        <option>Women</option>
                        <option>Children</option>
                        <option>Pets</option>
                        </optgroup>
                    </select>
                </li>
                <li>               
                    <label class="filterlabels" for="select-price">Price:</label>
                    <select name="select-price" id="selectprice">
                        <option selected>None</option>
                        <option>Ascending</option>
                        <option>Descending</option>
                    </select>
                </li>
                <li>               
                    <label class="filterlabels" for="select-sales">Date:</label>
                    <select name="select-sales" id="selectsales">
                        <option selected>None</option>
                        <option>Ascending</option>
                        <option>Descending</option>
                    </select>
                </li>
                <li>               
                <button type="button" class="btn btn-dark" style="background-color:#E223E2;">Filter</button>
                </li>
            </ul>
            </form>
        </div>
    <div class="card py-1">
        <div class="card-header">
            <div class="headie">
            <h2 id="headline">Upcoming Events</h2>
            </div>
        </div>
        <div class="card-body">
            <div class="row py-3 px-5">
                @foreach($data['eventmob'] as $item)
                <div class="col-sm-4 py-1">
                    <div class="card">
                    <img src="{{asset('/assets/uploads/events/'.$item->event_flyer) }}" height="390px" class="card-img-top" alt="care">
                        <div class="card-body details">
                            <input type="text" id="eventnames" value="{{$item->event_name}}" hidden >
                            <input type="text" id="eventlocation" value="{{$item->location}}" hidden >
                            <input type="text" id="eventtime" value=" {{$item->event_date}}" hidden>
                            <input type="text" id="eventdescription" value=" {{$item->event_description}}" hidden>
                            <input type="text" id="organiser" value=" {{$item->name}}" hidden>
                            <input type="text" id="eventflyer" value="assets/uploads/events/{{$item->event_flyer}}" hidden>
                            <input type="text" id="eventidtag" value="buytickets/{{$item->event_id}}" hidden>


                            <h5 class="card-title"> {{$item->event_name}}</h5>
                            <p class="card-text">{{$item->event_date}} {{$item->location}} </p>

                            <button type="button" class="btn btn-dark btnshowmodal">More Details</button>
                             
                            <a href="{{url('buytickets/'.$item->event_id)}}">
                            <button type="button" class="btn btn-dark" style="background-color:#E223E2;">Buy Ticket</button>
                            </a>     
                        </div>
                    </div>
                </div>
                @endforeach
               
            </div>
            <div class="text-center d-flex justify-content-center">
            {{ $data['eventmob']->links() }}


            </div>
        </div>
    </div>
    <div class="bg-modal" style="display:none;" id="bgg">
        <div class="modal-content">
            <div class="card mb-3" style="max-width: 95%;">
                <div class="row g-0">
                    <div class="col-md-4">
                    <img id="modalimg" src='' height="420px" class="card-img-top" alt="care">
                    </div>
                    <div class="col-md-8">
                    <div class="card-body">
                        <h5 id="modaltitle" class="card-title"></h5>
                        <p id="modaldescription" class="card-text"></p>
                        <p id="modallocation" class="card-text"></p>
                        <p id="modalorganiser" class="card-text"></p>
                        <p id="modaltime"class="card-text"><small class="text-muted"></small></p>
                                                     
                        <a id="buyticketmodal" href="">
                            <button type="button" id="buyticketmodal" class="btn btn-dark" style="background-color:#E223E2;">Buy Ticket</button>
                        </a>    
                    </div>
                    </div>
                </div>
            </div>
            <div class="close" onclick="closeDiv()">+</div>
        </div>       
    </div> 

@endsection




