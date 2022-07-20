@extends('layouts.organisers')
@section('content')
<div class="content">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h5 class="title">My Profile</h5>
              </div>
              <div class="card-body">
                <form>
                @csrf 
                @method('PUT')
                  <div class="row">
                    <div class="col-md-5 pr-md-1">
                      <div class="form-group">
                        <label>Company (disabled)</label>
                        <input type="text" class="form-control" disabled="" placeholder="Company" value="{{$data['organiser']->name}}">
                      </div>
                    </div>
                    <div class="col-md-3 px-md-1">
                      <div class="form-group">
                        <label>Admin Name:</label>
                        <input type="text" class="form-control" placeholder="Username" value="{{$data['organiser']->admin_name}}">
                      </div>
                    </div>
                    <div class="col-md-4 pl-md-1">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" placeholder="mike@email.com" value="{{$data['organiser']->email}}">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-md-1">
                      <div class="form-group">
                        <label>Phone</label>
                        <input type="number" class="form-control" placeholder="Company" value="{{$data['organiser']->phone}}">
                      </div>
                    </div>
                    <div class="col-md-6 pl-md-1">
                      <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" placeholder="Last Name" value="{{$data['organiser']->password}}">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" class="form-control" placeholder="Confirm Password">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                  <div class="col-md-12">
                        <label for="certificate">Certification of incorporation</label>
                        <input type="file" id="img"  name="certificate">
                    </div>

                    <div class="col-md-6">
                        <h4>Current Certification</h4> 
                        <img src="{{asset('assets/uploads/products/'.$data['organiser']->certification)}}" alt="Certification" height='400px' width='350px'>
                    </div>
                    <div class="col-md-6" >
                        <h4>New Certification</h4> 
                        <div id="selectedBanner">
                        
                        </div>

                    </div>
                    <div class="col-md-4 px-md-1">
                      <div class="form-group">
                        <label>Last Update</label>
                        <input type="text" class="form-control" placeholder="Country" value="{{$data['organiser']->updated_at}}" readonly>
                      </div>
                    </div>
                    <div class="col-md-4 pl-md-1" style="display:none;">
                      <div class="form-group">
                        <label>Postal Code</label>
                        <input type="number" class="form-control" placeholder="ZIP Code">
                      </div>
                    </div>
                  </div>
                </form>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-fill btn-primary">Update</button>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card card-user">
              <div class="card-body">
                <p class="card-text">
                  <div class="author">
                    <div class="block block-one"></div>
                    <div class="block block-two"></div>
                    <div class="block block-three"></div>
                    <div class="block block-four"></div>
                    <a href="javascript:void(0)">
                      <img class="avatar" src="/frontend/assets/anime3.png" alt="...">
                      <h5 class="title">{{$data['organiser']->admin_name}}</h5>
                    </a>
                    <p class="description">
                      Ceo/Co-Founder
                    </p>
                  </div>
                </p>
                <div class="card-description">
                    Great event Planner
                </div>
              </div>
              <div class="card-footer">
                <div class="button-container">
                  <button href="javascript:void(0)" class="btn btn-icon btn-round btn-facebook">
                    <i class="fab fa-facebook"></i>
                  </button>
                  <button href="javascript:void(0)" class="btn btn-icon btn-round btn-twitter">
                    <i class="fab fa-twitter"></i>
                  </button>
                  <button href="javascript:void(0)" class="btn btn-icon btn-round btn-google">
                    <i class="fab fa-google-plus"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card py-1">
    <div class="card-header">
        <div class="headie">
        <h2 id="headline">My Wallet</h2>
        </div>
    </div>
    <div class="card-body">
    @foreach($data['wallet'] as $item)

    <div class="card text-center">
        
        <div class="card-header">
            Current status
        </div>
        <div class="card-body">
            <h5 class="card-title">Wallet Ballance: {{$item->amount_available}}</h5>
            <p class="card-text">Perform Transaction</p>
            <label for="phoneorganisertransact">Mpesa Phone Number:</label>
            <input type="number"  name="phoneorganisertransact" id="phoneorganisertransact" placeholder="Enter Phone" onchange="editorgphone(this.value)" width="40%">
            <label for="amountorganisertransact">Amount Transaction:</label>
            <input type="number"  name="amountorganisertransact" id="amountorganisertransact" placeholder="Enter Amount" onchange="editorgamount(this.value)" width="40%">
            <form action="depositorganiser" method="POST" enctype="multipart/form-data" class="py-1">
                @csrf 
                @method('PUT')
                <div class="row wallattend">
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="depositorganiser" id="depositorganiser" hidden>
                        <input type="text" class="form-control" name="phonedorganiser" id="phonedorganiser" hidden>
                    </div>
                    <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Deposit</button>
                    </div>
                </div>
            </form>
            <form action="withdraworganiser" method="POST" enctype="multipart/form-data">
                @csrf 
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="withdraworganiser" id="withdraworganiser" hidden>
                        <input type="text" class="form-control" name="phoneworganiser" id="phoneworganiser" hidden>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-dark">Withdraw</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-footer text-muted">
            Last Update: {{$item->updated_at}}
        </div>
        </div>
        @endforeach
    </div>
</div>
@endsection




