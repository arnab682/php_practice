@extends('backend.layout.app')

@section('dashboard')
<div class="row">
  <div class="col-md-12">
    <h1>Simple Laravel CRUD - Create</h1>
        <a class="btn btn-success mb-4" class="float-right" href="{{route('products.index')}}">
            <i class="mdi mdi-playlist-plus">List</i>
        </a>
  </div>
</div>

<div class="row">
  <div class="card">
        
        <form method="post" action="{{route('products.store')}}" enctype="multipart/form-data">@csrf
            <div class="form-group">
                <label for="">Product Title</label>
                <input type="text" name="title" class="form-control" id="" placeholder="">
                <small id="" class="form-text text-muted">Give Title </small>
            </div>
            <div class="form-group">
                <label for="">Product Quantity</label>
                <input type="text" name="quantity" class="form-control" id="" placeholder="">
                <small id="" class="form-text text-muted">Give Quantity </small>
            </div>

            <div class="form-group">
                <label for="">Product Price</label>
                <input type="text" name="price" class="form-control" id="" placeholder="">
                <small id="" class="form-text text-muted">Give Price </small>
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection