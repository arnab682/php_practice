@extends('backend.layout.app')

@section('dashboard')
<div class="row">
  <div class="col-md-12">
    <h1>Bus List</h1>
    <div class="">
        <a href="{{route('buses.create')}}" class="create-modal btn btn-success btn-sm">
          Create<i class="glyphicon glyphicon-plus"></i>
        </a>
    </div>
  </div>
</div>

<div class="row">
  <div class="table table-responsive">
    <table class="table table-bordered" id="table">
      <tr>
        <th width="150px">No</th>
        <th>Brand Name</th>
        <th>Bus Number</th>
        <th>Bus Seats </th>
        <th>Remark</th>
        <th>Status</th>
        <th>Create At</th>
        <th>
          Action
        </th>
      </tr>
      
      <?php  $no=1; ?>
      @foreach ($buses as $value)
        <tr>
          <td>{{ $no++ }}</td>
          <td>{{ $value->brand_name }}</td>
          <td>{{ $value->bus_number }}</td>
          <td>{{ $value->bus_seats }}</td>
          <td>{{ $value->remark }}</td>
          <td>
            @if($value->status == 1)
              <p>Active</p>
            @else
              <p>Inactive</p>
            @endif
          </td>
          <td>{{ $value->created_at }}</td>
          <td>
            <!-- <a href="#" class="show-modal btn btn-info btn-sm" >
              Show<i class="fa fa-eye"></i>
            </a> -->
            <a href="{{route('buses.edit', $value->id)}}" class="edit-modal btn btn-warning btn-sm" >
              Edit<i class="glyphicon glyphicon-pencil"></i>
            </a>
            <a class="delete-modal btn btn-danger btn-sm" onclick="document.getElementById('blockBus-{{$value->id}}').submit()">
              Delete<i class="glyphicon glyphicon-trash"></i>
            <form id="blockBus-{{$value->id}}" action="{{route('buses.destroy', $value->id) }}" method="post">@csrf @method('delete')</form>
            </a>
          </td>
        </tr>
      @endforeach
    </table>
  </div>
</div>
@endsection