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
                                <option  value="user">Attendee</option>
                            </select>
                        </div>

                    </div>
                    <div class="card">
                        <div class="card-header">{{ __('Register') }}</div>

                        <div class="card-body">
                            <div id="formartist" style="display:none;">
                            <form method="POST" action="reguser"  enctype="multipart/form-data">
                                @csrf
                                <input name="usertype" value="artist" hidden>

                                <div class="row mb-3">
                                    <label for="fname" class="col-md-4 col-form-label text-md-end">First Name: </label>
                                    <div class="col-md-6">
                                        <input id="fname" type="text" class="form-control" name="fname" required autocomplete="fname" autofocus>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="lname" class="col-md-4 col-form-label text-md-end">Last Name:</label>

                                    <div class="col-md-6">
                                        <input id="lname" type="text" name="lname" class="form-control" required autocomplete="lname" autofocus>
                                    </div>
                                </div>
                                
                                <div class="row mb-3">
                                <label for="stagename" class="col-md-4 col-form-label text-md-end">Stage Name:</label>

                                <div class="col-md-6">
                                    <input id="stagename" type="text" name="stagename" class="form-control" required autocomplete="stagename" autofocus>
                                </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="email" class="col-md-4 col-form-label text-md-end">Email Address:</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email"name="email" class="form-control" required autocomplete="email">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="telephone" class="col-md-4 col-form-label text-md-end">Telephone:</label>

                                    <div class="col-md-6">
                                        <input id="telephone" type="number" name="telephone" class="form-control" required autocomplete="telephone" autofocus>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="expertise" class="col-md-4 col-form-label text-md-end">Expertise:</label>
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input  type="radio" name="skill" id="Musician" value="Musician" checked>
                                            <label for="Musician">Musician</label>
                                        </div>
                                        <div class="form-check">
                                            <input  type="radio" name="skill" id="comedian" value="Comedian">
                                            <label  for="comedian">Comedian</label>
                                        </div>
                                        <div class="form-check">
                                            <input  type="radio" name="skill" id="Magician" value="Magician">
                                            <label for="Magician">Magician</label>
                                        </div>
                                        <div class="form-check">
                                            <input  type="radio" name="skill" id="comedian" value="Comedian">
                                            <label  for="comedian">Dancer</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="password" class="col-md-4 col-form-label text-md-end">Password: </label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-end">Confirm Password:</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="photo" class="col-md-4 col-form-label text-md-end">Profile Photo:</label>
                                    <div class="col-md-6">
                                        <input type="file" id="img"  name="artistphoto">
                                    </div>
                                </div>
                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">Register</button>
                                    </div> 
                                </div>
                            </form>

                            </div>
                            <div id="formattendee" style="display:none;">
                                <form method="POST" action="{{url('reguser')}} "  enctype="multipart/form-data">
                                    @csrf
                                    <input name="usertype" value="attendee" hidden>
                                    <div class="row mb-3">
                                        <label for="fname" class="col-md-4 col-form-label text-md-end">First Name:</label>

                                        <div class="col-md-6">
                                            <input id="fname" type="text" class="form-control" name="fname" required autocomplete="fname" autofocus>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="lname" class="col-md-4 col-form-label text-md-end">Last Name:</label>
                                        <div class="col-md-6">
                                            <input id="lname" type="text" class="form-control" name="lname" required autocomplete="lname" autofocus>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="email" class="col-md-4 col-form-label text-md-end">Email Address:</label>
                                        <div class="col-md-6">
                                            <input id="email" type="email" class="form-control" name="email" required autocomplete="email">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="age" class="col-md-4 col-form-label text-md-end">Age:</label>

                                        <div class="col-md-6">
                                            <input id="age" type="number" class="form-control" name="age" required autocomplete="age" autofocus>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="gender" class="col-md-4 col-form-label text-md-end">Gender:</label>

                                        <div class="col-md-6">
                                            <div class="form-check">
                                                <input  type="radio" name="gender" id="Male" value="Male" checked>
                                                <label for="Male">Male</label>
                                            </div>
                                            <div class="form-check">
                                                <input  type="radio" name="gender" id="female" value="Female">
                                                <label  for="female">Female</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="password" class="col-md-4 col-form-label text-md-end">Password:</label>

                                        <div class="col-md-6">
                                            <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="password-confirm" class="col-md-4 col-form-label text-md-end">Confirm Password:</label>

                                        <div class="col-md-6">
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                    </div>

                                    <div class="row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">Register</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div id="formorganiser" style="display:none;">
                                <form method="POST" action="reguser"  enctype="multipart/form-data"> 
                                    @csrf 
                                    <input name="usertype" value="organiser" hidden>
                                    <div class="row mb-3">
                                        <label for="organisername" class="col-md-4 col-form-label text-md-end">Company Name:</label>
                                
                                        <div class="col-md-6">
                                            <input id="organisername" type="text" class="form-control" name="organisername" required autocomplete="name" autofocus>
                                        </div>
                                    </div>    
                                    <div class="row mb-3">
                                        <label for="email" class="col-md-4 col-form-label text-md-end">Email Address:</label>
                                
                                        <div class="col-md-6">
                                            <input id="email" type="email" class="form-control" name="email"  required autocomplete="email">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="telephone" class="col-md-4 col-form-label text-md-end">Telephone:</label>
                                
                                        <div class="col-md-6">
                                            <input id="telephone" type="number" class="form-control" name="telephone" required autocomplete="telephone" autofocus>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="adminname" class="col-md-4 col-form-label text-md-end">Admin Name:</label>
                                
                                        <div class="col-md-6">
                                            <input id="adminname" type="text" class="form-control" name="adminname" required autocomplete="adminname" autofocus>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="expertise" class="col-md-4 col-form-label text-md-end">Certificate of Incorporation:</label>
                                        <div class="col-md-6">
                                            <input type="file" id="img"  name="certimage">
                                        </div>
                                    </div>
                                
                                    <div class="row mb-3">
                                        <label for="password" class="col-md-4 col-form-label text-md-end">Password:</label>
                                
                                        <div class="col-md-6">
                                            <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password">
                                        </div>
                                    </div>
                                
                                    <div class="row mb-3">
                                        <label for="password-confirm" class="col-md-4 col-form-label text-md-end">Confirm Password:</label>
                                        <div class="col-md-6">
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                    </div>
                                
                                    <div class="row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">Register</button>
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
    
@endsection
