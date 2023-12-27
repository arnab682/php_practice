@extends('backend.layout.app')

@section('dashboard')
<div class="row">
  <div class="col-md-12">
    <h1>Reservation List</h1>
    <a href="{{route('reservations.create')}}" class="create-modal btn btn-success btn-sm">
            Create<i class="glyphicon glyphicon-plus"></i>
          </a>
  </div>
</div>

<div class="row">
  <div class="table table-responsive">
    <table class="table table-bordered" id="table">
      <tr>
        <th>No</th>
        <th>Customer</th>
        <th>Bus Number</th>
        <th>From</th>
        <th>To</th>
        <th>Reservation Date</th>
        <th>Reservation Time</th>
        <th>Tickets</th>
        <th>status</th>
        <th>Create At</th>
        <th>
          Action
        </th>
      </tr>
      {{ csrf_field() }}
      <?php  $no=1; ?>
      @foreach ($reservations as $value)
        <tr class="post{{$value->id}}">
          <td>{{ $no++ }}</td>
          <td>{{ $value->customer->name }}</td>
          <td>{{ $value->bus->bus_number }}</td>
          <td>{{ $value->location }}</td>
          <td>{{ $value->destination }}</td>
          <td>{{ $value->reservation_date }}</td>
          <td>{{ $value->reservation_time }}</td>
          <td>{{ $value->tickets }}</td>
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
            <a href="{{route('reservations.edit', $value->id)}}" class="edit-modal btn btn-warning btn-sm" >
              Edit<i class="glyphicon glyphicon-pencil"></i>
            </a>
            <a class="delete-modal btn btn-danger btn-sm" onclick="document.getElementById('blockBus-{{$value->id}}').submit()">
              Delete<i class="glyphicon glyphicon-trash"></i>
            <form id="blockBus-{{$value->id}}" action="{{route('reservations.destroy', $value->id) }}" method="post">@csrf @method('delete')</form>
            </a>
          </td>
        </tr>
      @endforeach
    </table>
  </div>
</div>
@endsection