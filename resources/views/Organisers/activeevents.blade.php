@extends('layouts.organisers')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header text-center">
            <h2>Active Events</h2>
        </div>
        <div class="card-body">
            <div class="Accordion" style="margin:3%;">
            @foreach($data['events'] as $item)
                <div class=Accorcionitem id="option{{$item->event_id}}">

                    <a class="accordionlink" href="{{'#option'.$item->event_id}}">{{$item->event_name}}
                    <ion-icon class="ion-icon" name="add"></ion-icon>
                    <ion-icon class="ion-icon" name="remove"></ion-icon>
                    </a>
                    <div class="answer">
                        <div class="card mb-3" style="max-width: 100%;">
                            <div class="row g-0">
                                <div class="col-md-4">
                                <img src="{{asset('/assets/uploads/events/'.$item->event_flyer) }}" class="img-fluid rounded-start" alt="...">
                                </div>
                                <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Event Date: {{$item->event_date}} Location: {{$item->location}}</h5>
                                    <p class="card-title">{{$item->event_description}}</p>
                                    <a href="">
                                        <button type="submit" class="btn btn-primary">View Event Performance</button>
                                    </a>
                                    <a href="">
                                        <button class="btn btn-moreinfo btn-dark" style="margin-top:6px;">Edit Event</button>
                                    </a>
                                    <a href="">
                                        <button class="btn btn-moreinfo btn-danger" style="margin-top:6px;">Delete Event</button>
                                    </a>
                                    <p class="card-text"><small class="text-muted">Last updated {{$item->updated_at}}</small></p>

                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h2>Artists Awaiting Addition to Event</h2>
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
                        <th>Date of Approval</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection




