@extends('backend.layout.app')

@section('dashboard')
<div class="row">
  <div class="col-md-12">
    <h1>Customer Edit</h1>
        <a class="btn btn-success btn-sm" href="{{route('customers.index')}}">
            <i class="mdi mdi-playlist-plus">List</i>
        </a>
  </div>
</div>

<div class="row">
  <div class="card">
        
        <form method="post" action="{{route('customers.update', $customer->id)}}" enctype="multipart/form-data">@csrf @method('put')
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" class="form-control" id="" value="{{$customer->name}}">
                <small id="" class="form-text text-muted">Give Name </small>
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" name="email" class="form-control" id="" value="{{$customer->email}}">
                <small id="" class="form-text text-muted">Give Email </small>
            </div>

            <div class="form-group">
                <label for="">Phone Number</label>
                <input type="text" name="phone_number" class="form-control" id="" value="{{$customer->phone_number}}">
                <small id="" class="form-text text-muted">Give Phone Number </small>
            </div>

            <div class="form-group">
                <label for="">Address</label>
                <input type="text" name="address" class="form-control" id="" value="{{$customer->address}}">
                <small id="" class="form-text text-muted">Give Address </small>
            </div>

            <div class="form-group">
                <label for="">Status</label>
                <select name="status" id="" class="form-control"> 
                    <option value="1">Active</option> 
                    <option value="0">Inactive</option> 
                </select>
                <small id="" class="form-text text-muted">Give Status </small>
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection