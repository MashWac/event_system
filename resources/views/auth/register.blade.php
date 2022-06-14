@extends('layouts.attendeelog')

@section('content')
<div class="container">
    <div id="authpagesN">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h6>Select User Type</h6>
                        <label for="account-selection" class="form-label">Account Type:</label>
                        <div class="col-md-6">
                            <select class="form-select form-select-sm" name="accounttype" id="accounttype" onchange="toggle()" aria-label=".form-select-sm example">
                                <option selected value="none">Not Selected</option>
                                <option value="event_org">Event Organiser</option>
                                <option value="artist">Artist</option>
                                <option  value="user">User</option>
                            </select>
                        </div>

                    </div>
                    <div class="card">
                        <div class="card-header">{{ __('Register') }}</div>

                        <div class="card-body">
                            <div id="formaccount">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection
