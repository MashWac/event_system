@extends('layouts.organisers')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h2>Create Event</h2>
        </div>
        <div class="card-body">
        <form action="addevent" method="POST" enctype="multipart/form-data">
                @csrf 
                <div class="row">
                    <div class="col-md-6">
                        <label for="eventname">Event Name:</label>
                        <input type="text" class="form-control" name="eventname">
                    </div>
                    <div class="col-md-6">
                        <label for="location">Location:</label>
                        <input type="text" class="form-control" name="location">
                    </div>
                    <div class="col-md-12">
                        <label for="eventdescr">Event Description:</label>
                        <textarea class="form-control" name="eventdescr" id="descript"> </textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="eventtime">Event Time: </label>
                        <input type="datetime-local" id="eventtime" name="eventtime">
                    </div>

 


                    <div class="col-md-12">
                        <label for="eventflyer">Event Banner:</label>
                        <input type="file" id="img"  name="eventflyer">
                    </div>
                    <div class="col-md-6" id="selectedBanner">

                    </div>
                    <div class="col-md-12">
                        <label for="tickettypes">Ticket Types:</label>
                                <input  type="checkbox" id='earlycheck'name="early-bird" value="Earlybird">
                                <label for="early-bird">Early Bird </label>
                                
                                <input  type="checkbox" id='advancedcheck' name="advancedtick" value="Advanced">
                                <label  for="advancedtick">Advanced </label>
                        
                                <input  type="checkbox" id='vipcheck'name="viptickets" value="VIP">
                                <label for="viptickets">VIP </label>
                         
                                <input  type="checkbox" id='flashcheck' name="flashsale" value="Flashsale">
                                <label  for="flashsale">Flash Sale</label>
                           
                    </div>
                    <div class="col-md-6">
                        <div class="col-md-6" id='early' style="display: none ;">
                            <label for="earlybird">Early bird Price:</label>
                            <input type="number" class="form-control" name="earlybirdprice">
                            <input type="text" class="form-control" name="earlybirdname" value="EarlyBird" hidden>
                            <label for="earlybirdquan"> Number of Early bird Tickets:</label>
                            <input type="number" class="form-control" name="earlybirdquan">
                        </div>

                        <div class="col-md-6" id='advanced' style="display: none ;">
                            <label for="advancedprice">Advanced Price:</label>
                            <input type="number" class="form-control" name="advancedprice">
                            <label for="Advancedquan">Number of Advanced Tickets:</label>
                            <input type="number" class="form-control" name="advancedquan">
                            <input type="text" class="form-control" name="advancedname" value="Advance" hidden>
                        </div>
                        <div class="col-md-6" id='vip' style="display: none ;">
                            <label for="vipprice">Vip Price:</label>
                            <input type="number" class="form-control" name="vipprice">
                            <label for="vipquan"> Number of VIP Tickets</label>
                            <input type="number" class="form-control" name="vipquan">
                            <input type="text" class="form-control" name="vipname" value="VIP" hidden>
                        </div>
                        <div class="col-md-6" id='flash' style="display: none ;">
                            <label for="flashsaleprice">Flash Sale Price:</label>
                            <input type="number" class="form-control" name="flashsaleprice">
                            <label for="flashsalequan"> Number of Flash Sale tickets:</label>
                            <input type="number" class="form-control" name="flashsalequan">
                            <input type="text" class="form-control" name="flashsalename" value="Flashsale" hidden>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection




