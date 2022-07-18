@extends('layouts.attendee')
@section('content')
<div class="con">
    <div id="artistland">
            <div id="alandtext">
                <p id="alandmessage"> Support your favourite artists</p>
                <p id="alandmoreinfo">Follow your favorite and keep up with their latest content.</p>
            </div>
    </div>

    <div class="card py-1">
        <div class="card-header">
            <div class="headie">
            <h2 id="headline">Artists You follow <a href="">
                <button type="button" class="btn btn-dark" style="background-color:#E223E2;">View all</button>
            </a></h2>
            
            </div>
        </div>

        <div class="card-body">
            <div class="row py-3 px-5">
            @foreach($data['follows'] as $item)
                <div class="col-sm-4 py-1">
                <div class="card" style="width: 18rem;">
                        <img src="{{asset('/assets/uploads/artists/'.$item->artist_photo)}}"  height="300px" width="300px" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{$item->stage_name}}</h5>
                            <a href="{{url('viewartist/'.$item->artist_id)}}" class="btn btn-dark">View Artist</a>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>
    <div id="artistbreak">
            <div id="artisttext">
                <p id="artistmessage">Find New artists </p>
                <p id="artistbreakmoreinfo">All Your Favorite Artists Under One Platform</p>
            </div>
    </div>
 
    <div class="card py-1">
        <div class="card-header">
            <div class="headie">
            <h2 id="headline">Artists</h2>
            </div>
        </div>
        <div class="card-body">
            <div class="row py-3 px-5">
            @foreach($data['artists'] as $item)
                <div class="col-sm-4 py-1">
                <div class="card" style="width: 18rem;">
                        <img src="{{asset('/assets/uploads/artists/'.$item->artist_photo) }}"  height="300px" width="300px" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{$item->stage_name}}</h5>
                            <a href="{{url('viewartist/'.$item->artist_id)}}" class="btn btn-dark">View Artist</a>
                            <a href="{{url('followartist/'.$item->artist_id)}}" class="btn btn-dark" style="background-color:#E223E2;">Follow Artist</a>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
            <div class="text-center d-flex justify-content-center">
                    {{$data['artists']->links() }}
            </div>
        </div>
    </div>

@endsection




