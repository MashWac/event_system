@extends('layouts.organisers')
@section('content')
<div class="card">
            <div class="card-body">
                <h1>Statistics</h1>
            </div>
    </div>
    <div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header ">
                <h5 class="card-title">Trend of Tickets Sold</h5>
              </div>
              <div class="card-body ">
                <canvas id="chartHours" width="400" height="100"></canvas>
              </div>

            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="card ">
              <div class="card-header ">
                <h5 class="card-title">Gender Statistics</h5>
              </div>
              <div class="card-body ">
                <canvas id="chartgender" width="1000" height="1000"><canvas>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card ">
              <div class="card-header ">
                <h5 class="card-title">Tickets Sold</h5>
              </div>
              <div class="card-body ">
                <h1>
                {{$soldtickets}} Tickets
                </h1>
              </div>
            </div>
          </div>
        </div>
          <script>
            var _ydata=JSON.parse('<?php echo( json_encode( $dates))?>');
            var _xdata=JSON.parse('<?php echo(json_encode($tickets))?>');
            var genders=JSON.parse('<?php echo(json_encode($genders))?>');
            var genders=JSON.parse('<?php echo(json_encode($gendercount))?>');

        </script>
@endsection




