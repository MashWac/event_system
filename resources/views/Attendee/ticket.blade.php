
@extends('layouts.attendee')
@section('content')
@foreach($data['tickets'] as $item)
<div class="card text-center">
<h1> {{$item->event_name}}</h1>
<strong>{{$item->location}}</strong>
<strong>{{$item->event_date}}</strong>
<div class="qr">
{{\SimpleSoftwareIO\QrCode\Facades\QrCode::size(200)->generate($item->qr_id)}}  

</div>
@endforeach
@endsection