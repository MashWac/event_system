@extends('layouts.artists')
@section('content')

<br>
<h3 class="eventh3">EVENT BOOKINGS REQUESTS</h3>
<section class="items">
	@foreach($data['bookings'] as $item)
	<div class="item details">
		<img src= "{{asset('/assets/uploads/events/'.$item->event_flyer)}}">
		<p><button class="btnshowmodal see-more" >See More....</button></p>
			<input type="text" id="eventnames" value="{{$item->event_name}}" hidden >
			<input type="text" id="eventlocation" value="{{$item->location}}" hidden >
			<input type="text" id="eventtime" value=" {{$item->event_date}}" hidden>
			<input type="text" id="eventdescription" value=" {{$item->event_description}}" hidden>
			<input type="text" id="organiser" value=" {{$item->name}}" hidden>
			<input type="text" id="emailorg" value=" {{$item->email}}" hidden>
			<input type="text" id="phoneor" value=" {{$item->phone}}" hidden>
			<input type="text" id="salaryrange" value=" {{$item->pay_offer}}" hidden>
			<input type="text" id="eventflyer" value="assets/uploads/events/{{$item->event_flyer}}" hidden>
		<a href="{{url('acceptoffer/'.$item->booking_id)}}">	
			<button class="but">Accept</button>
		</a>
		<a href="{{url('rejectoffer/'.$item->booking_id)}}">
        	<button class="but" style="background-color:red;">Reject</button>
		</a>
	</div>
	@endforeach
</section>

<div class="bg-modal" id="bgg">
	<div class="content-modal">
		<div class="card mb-3" style="max-width: 95%;">
  			<div class="row g-0">
				<div class="col-md-4">
				<img id="modalimage"src="" class="img-fluid rounded-start" alt="...">
				</div>
				<div class="col-md-8">
					<div class="card-body" class="details">
						<h5 class="card-title" id="modalevent" ></h5>

						<p class="card-text" id="modalorganiser"></p>
						<p class="card-text" id="modalvenue"></p>
						<p class="card-text" id="modaldescription"> </p>
						<p class="card-text" id="modaldate"></p>
						<p class="card-text" id="modalsalary"></p>
						<p class="card-text"><span id="modalphone"> </span><span id="modalemail"></span></p>
						<p class="card-text"><small class="text-muted"></small></p>
						<button class="event" onclick="showdiv()">Contact</button>
					</div>
				</div>
    		</div>
		</div>
		<div class="close" onclick="closediv()">
			+
		</div>
	</div>
</div>

@endsection
