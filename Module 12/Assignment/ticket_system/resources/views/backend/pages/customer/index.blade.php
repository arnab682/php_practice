@extends('backend.layout.app')

@section('dashboard')
<div class="row">
  <div class="col-md-12">
    <h1>Customer List</h1>
    <div class="">
        <a href="{{route('customers.create')}}" class="create-modal btn btn-success btn-sm">
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
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Status</th>
        <th>Create At</th>
        <th>
          Action
        </th>
      </tr>
      
      <?php  $no=1; ?>
      @foreach ($customers as $value)
        <tr>
          <td>{{ $no++ }}</td>
          <td>{{ $value->name }}</td>
          <td>{{ $value->email }}</td>
          <td>{{ $value->phone_number }}</td>
          <td>{{ $value->address }}</td>
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
            <a href="{{route('customers.edit', $value->id)}}" class="edit-modal btn btn-warning btn-sm" >
              Edit<i class="glyphicon glyphicon-pencil"></i>
            </a>
            <a class="delete-modal btn btn-danger btn-sm" onclick="document.getElementById('blockCustomer-{{$value->id}}').submit()">
              Delete<i class="glyphicon glyphicon-trash"></i>
            <form id="blockCustomer-{{$value->id}}" action="{{route('customers.destroy', $value->id) }}" method="post">@csrf @method('delete')</form>
            </a>
          </td>
        </tr>
      @endforeach
    </table>
  </div>
</div>
@endsection