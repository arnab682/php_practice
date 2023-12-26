@extends('backend.layout.app')

@section('dashboard')
<div class="row">
  <div class="col-md-12">
    <h1>Customer Create</h1>
        <a class="btn btn-success btn-sm" href="{{route('customers.index')}}">
            <i class="mdi mdi-playlist-plus">List</i>
        </a>
  </div>
</div>

<div class="row">
  <div class="card">
        
        <form method="post" action="{{route('customers.store')}}" enctype="multipart/form-data">@csrf
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" class="form-control" id="" placeholder="">
                <small id="" class="form-text text-muted">Give Name </small>
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" name="email" class="form-control" id="" placeholder="">
                <small id="" class="form-text text-muted">Give Email </small>
            </div>

            <div class="form-group">
                <label for="">Phone Number</label>
                <input type="text" name="phone_number" class="form-control" id="" placeholder="">
                <small id="" class="form-text text-muted">Give Phone Number </small>
            </div>

            <div class="form-group">
                <label for="">Address</label>
                <input type="text" name="address" class="form-control" id="" placeholder="">
                <small id="" class="form-text text-muted">Give Address </small>
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection