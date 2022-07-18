@extends('layouts.attendee')
@section('content')
<div class="con">
    <div class="card py-1">
        <div class="card-header">
            <div class="headie">
            <h2 id="headline">Buy Tickets</h2>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-stripped table-hover" id="ticketstable">
                <thead>
                    <tr>
                        <th>Ticket Type</th>
                        <th>Status</th>
                        <th>Ticket Price</th>
                        <th>Quantity</th>
                        <th>SubTotal</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($data['ticket'] as $item)
                    <tr>
                        <td>{{$item->ticket_type}}</td>
                        @if(($item->status_open)==0)
                        <td>Open</td>
                        @else
                        <td>Closed</td>
                        @endif
                        <td>{{$item->ticket_price}}</td>
                        @if((($item->status_open)==0)&&((($item->ticket_quantity)>0)))
                        <td>
                            <select class="form-select form-select-sm formquan" name="ticketquantity" id="ticketquantity" aria-label=".form-select-sm example">
                                <option selected value="0"></option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select>
                            <input type='hidden'  name="ticket_price" value="{{$item->ticket_price}}" width="0px">
                            <input type='hidden'  name="ticket_name" value="{{$item->ticket_type}}" width="0px">
                            
                        </div></td>
                        @else
                        <td>
                            <input type="number" name="quantityticket" id="quantityticket" readonly>
                        </td>
                        @endif
                        <td id="loop" class="ptotal"><span id="totalsub">0</span> </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
            <h3 id="headline">Total:<span id="totalpurchase"> </span></h3>
            <div class="card py-1">
                <div class="card-header">
                    <div class="headie">
                    <h3 id="headline">Complete Puchase</h3>
                    </div>
                </div>
                <div class="card-body">
                <h4 id="headline">Select Payment Method</h4>

                <div class="accordion" id="accordionPanelsStayOpenExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                            Through Wallet
                        </button>
                        </h2>
                        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                        <div class="accordion-body">
                            <p>Make Payment From Wallet<br><br>
                                <form method="post" action="checkout">
                                <input type="hidden" name="paymenttype" id="paymenttype" value="wallet">
                                <input type="hidden" name="totalpay" id="totalpay" class="totalpay">
                                <button type="submit" class="btn btn-dark" style="background-color:#E223E2;">Complete Purchase</button>
                                </form>
                        </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                            Mpesa
                        </button>
                        </h2>
                        <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                            <div class="accordion-body">
                                <form method="post" action="checkout">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="mpesanumber">Enter phone Number:</label>
                                            <input type="number" class="form-control" name="mpesanumber">
                                            <input type="hidden" name="paymenttype" id="paymenttype" value="mpesa">
                                            <input type="hidden" name="totalpay" id="totalpaym" class="totalpay">
                                            <button type="submit" class="btn btn-dark" style="background-color:#E223E2;">Complete Purchase</button>
                                        </div>
                                    </div>
                                </form>                        
                            </div>
                        </div>
                    </div>
                    </div>

                </div>
            </div>
        </div>
        </div>
    </div>
 

@endsection




