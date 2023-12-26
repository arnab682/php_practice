@extends('backend.layout.app')

@section('dashboard')
<div class="row">
  <div class="col-md-12">
    <h1>Bus Edit</h1>
        <a class="btn btn-success btn-sm" href="{{route('buses.index')}}">
            <i class="mdi mdi-playlist-plus">List</i>
        </a>
  </div>
</div>

<div class="row">
  <div class="card">
        
        <form method="post" action="{{route('buses.update', $bus->id)}}" enctype="multipart/form-data">@csrf @method('put')
            <div class="form-group">
                <label for="">Bus Number</label>
                <input type="text" name="bus_number" class="form-control" id="" value="{{$bus->bus_number}}">
                <small id="" class="form-text text-muted">Give Bus Number </small>
            </div>
            <div class="form-group">
                <label for="">Bus Seats </label>
                <input type="text" name="bus_seats " class="form-control" id="" value="{{$bus->bus_seats}}">
                <small id="" class="form-text text-muted">Give Bus Seats  </small>
            </div>

            <div class="form-group">
                <label for="">Remark</label>
                <select name="remark" id="" class="form-control"> 
                    <option value="Running">Running</option> 
                    <option value="Processing">Processing</option> 
                    <option value="Stop">Stop</option> 
                </select>
                <small id="" class="form-text text-muted">Give Remark </small>
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