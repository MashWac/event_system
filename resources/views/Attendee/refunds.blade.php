@extends('layouts.attendee')
@section('content')
<div class="con">
    <div class="card py-1">
        <div class="card-header">
            <div class="headie">
            <h2 id="headline">Refund Policy</h2>
            </div>
        </div>
        <div class="card-body ">
            <div class="text-center">
                <h3 id="refundpolicy">PURCHASE OF THE TICKET IS DEEMED TO BE ACCEPTANCE OF THE FOLLOWING TERMS AND CONDITIONS</h3>
            </div>
            <div class="card-body">
                <ul>
                    <li class="policies">Tickets are sold on behalf of the event organizer or promoter and may be subject to additional conditions of admission to the event.</li>
                    <li class="policies">Ticket holders buy the event ticket at will. We will not be responsible loss, damage or injury arising from a pre-existing medical condition or due to breach of these conditions.</li>
                    <li class="policies">Bookings are subject to availability and no guarantee is made that specific seating requests will be available at time of booking.</li>
                    <li class="policies">Terms and conditions remain in effect even when the ticket changes hands. The reselling of a ticket or a breach of the terms and conditions, does not nullify the terms and conditions of the original ticket sale. Any subsequent ticket holder is bound by those terms and conditions.</li>
                    <li class="policies">Ticket may not be resold for commercial packages or at a premium. If a ticket sold is in breach of this condition, the bearer of the ticket may be refused admission.</li>
                    <li class="policies">If a performance is cancelled due to an act of God, natural disaster, adverse weather or for any other cause reasonably beyond our control, there is no right of refund or exchange, and no obligation is assured by us for the arranging of a substitute service, event or performance.</li>
                    <li class="policies">Incase of a refund. 75% of the ticket price will be refunded. </li>

                </ul>
            </div>
        </div>
        <div class="text-center">
            <h3 id="refundpolicy">Enter Ticket Number to Request Refund:</h3>
                <form>
                    <input type="text" name="ticketrefund" placeholder="Ticket Number">
                    <button type="submit" class="btn btn-dark btn-block">Request Refund</button>
                </form>
        </div>

    </div>

@endsection




