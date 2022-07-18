@extends('layouts.artists')
@section('content')

<br>
<h3 class="eventh3">EVENT BOOKINGS</h3>
<section class="items">
	<div class="item">
		<img src= "/frontend/assets/event1.jpeg">
		<p><button class="see-more" onclick="showdiv()">See More....</button></p>
		<button class="but">Accept</button>
        <button class="but">Reject</button>
	</div>
	<div class="item">
		<img src= "/frontend/assets/event2.png">
		<p><button class="see-more" onclick="showdiv()">See More....</button></p>
		<button class="but">Accept</button>
        <button class="but">Reject</button>
	</div>
	<div class="item">
		<img src= "/frontend/assets/event3.png">
        <p><button class="see-more" onclick="showdiv()">See More....</button></p>
		<button class="but">Accept</button>
        <button class="but">Reject</button>
	</div>
    <div class="item">
		<img src= "/frontend/assets/event4.jpg">
        <p><button class="see-more" onclick="showdiv()">See More....</button></p>
		<button class="but">Accept</button>
        <button class="but">Reject</button>
	</div>
    <div class="item">
		<img src= "/frontend/assets/event5.jpeg">
        <p><button class="see-more" onclick="showdiv()">See More....</button></p>
		<button class="but">Accept</button>
        <button class="but">Reject</button>
	</div>
	<div class="item">
		<img src= "/frontend/assets/event6.jpg">
        <p><button class="see-more" onclick="showdiv()">See More....</button></p>
		<button class="but">Accept</button>
        <button class="but">Reject</button>
	</div>
	<div class="item">
		<img src= "/frontend/assets/event7.jpg">
        <p><button class="see-more" onclick="showdiv()">See More....</button></p>
        <button class="but">Accept</button>
        <button class="but">Reject</button>
	</div>
	<div class="item">
		<img src= "/frontend/assets/event8.jpg">
        <p><button class="see-more" onclick="showdiv()">See More....</button></p>
		<button class="but">Accept</button>
        <button class="but">Reject</button>
	</div>
</section>

<div class="bg-modal" id="bg-modal">
	<div class="content-modal">
		<div class="card mb-3" style="max-width: 95%; margin-top: 3%; margin-bottom: 3%;">
  			<div class="row g-0">
				<div class="col-md-4">
				<img src="/frontend/assets/event7.jpg" class="img-fluid rounded-start" alt="...">
				</div>
				<div class="col-md-8">
					<div class="card-body">
						<h5 class="card-title">Event request</h5>

						<p class="card-text">Event Organizer: </p>
						<p class="card-text">Event venue: </p>
						<p class="card-text">Date: </p>
						<p class="card-text">Time: </p>
						<p class="card-text">Salary range: </p>
						<p class="card-text">Contact details: </p>
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
