@extends('backend.layout.app')

@section('dashboard')
<div class="row">
  <div class="col-md-12">
    <h1>Simple Laravel CRUD - Edit</h1>
        <a class="btn btn-success mb-4" class="float-right" href="{{route('products.index')}}">
            <i class="mdi mdi-playlist-plus">List</i>
        </a>
  </div>
</div>

<div class="row">

        <form method="post" action="{{route('products.update', $product->id)}}" enctype="multipart/form-data">@csrf {{ method_field('PUT') }}
            <div class="form-group">
                <label for="">Product Title</label>
                <input type="text" name="title" class="form-control" id="" value="{{$product->title}}">
                <small id="" class="form-text text-muted">Give Title </small>
            </div>
            <div class="form-group">
                <label for="">Product Quantity</label>
                <input type="text" name="quantity" class="form-control" id="" value="{{$product->quantity}}">
                <small id="" class="form-text text-muted">Give Quantity </small>
            </div>

            <div class="form-group">
                <label for="">Product Price</label>
                <input type="text" name="price" class="form-control" id="" value="{{$product->price}}">
                <small id="" class="form-text text-muted">Give Price </small>
            </div>
            
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
   
</div>
@endsection