@extends('layouts.organisers')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header text-center">
            <h2>Previous Events</h2>
            <div class="eventsearchpanel">
        <div class="searchoption">
            <form> 
                <input type="text" id="filteredsearchbox" name="searchbox"  placeholder="Search...event">
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
                        <a href="#none">None</a>
                        
                    </div>
                    </div>
                </li>
                <li>                   
                    <div class="dropdown">
                        <button onclick="myFunction()" class="dropbtn">Event Name</button>
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
                                    <p class="card-text">{{$item->event_description}}</p>
                                    <p class="card-text"><small class="text-muted">Last updated {{$item->updated_at}}</small></p>
                                    <a href="{{url('viewevent/'.$item->event_id)}}">
                                        <button type="submit" class="btn btn-primary">View Event Performance</button>
                                    </a>
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
</div>
@endsection




