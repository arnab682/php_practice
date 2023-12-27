@extends('backend.layout.app')

@section('dashboard')
<div class="row">
  <div class="col-md-12">
    <h1>Bus Create</h1>
        <a class="btn btn-success btn-sm" href="{{route('buses.index')}}">
            <i class="mdi mdi-playlist-plus">List</i>
        </a>
  </div>
</div>

<div class="row">
  <div class="card">
        
        <form method="post" action="{{route('buses.store')}}" enctype="multipart/form-data">@csrf
            <div class="form-group">
                <label for="">Brand Name</label>
                <input type="text" name="brand_name" class="form-control" id="" placeholder="">
                <small id="" class="form-text text-muted">Give Brand Name </small>
            </div>
            <div class="form-group">
                <label for="">Bus Number</label>
                <input type="text" name="bus_number" class="form-control" id="" placeholder="">
                <small id="" class="form-text text-muted">Give Bus Number </small>
            </div>
            <div class="form-group">
                <label for="">Bus Seats </label>
                <input type="text" name="bus_seats " class="form-control" id="" placeholder="">
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

            
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection