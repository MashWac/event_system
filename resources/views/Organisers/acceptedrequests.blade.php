@extends('layouts.organisers')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h2>Artists Accepted Requests</h2>
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
                    <button onclick="myFunction()" class="dropbtn">Event Date</button>
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
                    <button onclick="myFunction()" class="dropbtn"> Event Name</button>
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
                        <th>Date of Approval</th>
                        <th>Image</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($data['accepts'] as $item)
                    <tr>
                        <td>{{$item->first_name}} AKA{{$item->stage_name}}</td>
                        <td>{{$item->event_name}}</td>
                        <td>{{$item->event_date}}</td>
                        <td>{{$item->dateofbooking}}</td>
                        <td><img src="{{asset('/assets/uploads/artists/'.$item->artist_photo) }}" height="130px" width="100px" alt='image here'></td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection




