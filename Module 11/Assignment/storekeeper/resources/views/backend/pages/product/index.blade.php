@extends('backend.layout.app')

@section('dashboard')
<div class="row">
  <div class="col-md-12">
    <h1>Simple Laravel CRUD Ajax</h1>
  </div>
</div>

<div class="row">
  <div class="table table-responsive">
    <table class="table table-bordered" id="table">
      <tr>
        <th width="150px">No</th>
        <th>Title</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Create At</th>
        <th class="text-center" width="150px">
          <a href="{{route('products.create')}}" class="create-modal btn btn-success btn-sm">
            Create<i class="glyphicon glyphicon-plus"></i>
          </a>
        </th>
      </tr>
      {{ csrf_field() }}
      <?php  $no=1; ?>
      @foreach ($products as $value)
        <tr class="post{{$value->id}}">
          <td>{{ $no++ }}</td>
          <td>{{ $value->title }}</td>
          <td>{{ $value->quantity }}</td>
          <td>{{ $value->price }}</td>
          <td>{{ $value->created_at }}</td>
          <td>
            <!-- <a href="#" class="show-modal btn btn-info btn-sm" >
              Show<i class="fa fa-eye"></i>
            </a> -->
            <a href="{{route('products.edit', $value->id)}}" class="edit-modal btn btn-warning btn-sm" >
              Edit<i class="glyphicon glyphicon-pencil"></i>
            </a>
            <!-- <a href="{route('products.destory', $value->id)}}" class="delete-modal btn btn-danger btn-sm" >
              Delete<i class="glyphicon glyphicon-trash"></i>
            </a> -->
          </td>
        </tr>
      @endforeach
    </table>
  </div>
</div>
@endsection