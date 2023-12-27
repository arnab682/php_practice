<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <b>Bus Ticket Booking</b>  <hr>      
                    <div class="row"> 
                      <div class="col-md-6"> 
                          <form method="post" action="{{route('trickets.store')}}" enctype="multipart/form-data">@csrf
                              <div class="form-group">
                                  <label for="">Bus Number & Seat</label>
                                    <select name="bus_id" id="" class="form-control border border-primary"> 
                                        @foreach($buses as $bus)
                                        <option value="{{$bus->id}}">{{$bus->brand_name}}-{{$bus->bus_number}}-{{$bus->bus_seats}}(Seat)</option> 
                                        @endforeach
                                    </select>
                                  <small id="" class="form-text text-muted">Give Location</small>
                              </div>

                              <div class="form-group">
                                  <label for="">From</label>
                                    <select name="location" id="" class="form-control border border-primary"> 
                                        <option value="Dhaka">Dhaka</option>  
                                    </select>
                                  <small id="" class="form-text text-muted">Give Location</small>
                              </div>
                
                              <div class="form-group">
                                  <label for="">To</label>
                                    <select name="destination" id="" class="form-control border border-primary"> 
                                        <option value="Cox's Bazaar">Cox's Bazaar</option>  
                                    </select>
                                  <small id="" class="form-text text-muted">Give Destination </small>
                              </div>
                              <div class="form-group">
                                  <label for="">Date</label>
                                  <input type="date" name="reservation_date" class="form-control border border-primary" id="" placeholder="">
                                  <small id="" class="form-text text-muted">Give Date </small>
                              </div>

                              <div class="form-group">
                                  <label for="">Travel Time</label>
                                   <select name="reservation_time" id="" class="form-control border border-primary"> 
                                        <option value="8.00am">8.00am</option>  
                                        <option value="9.00am">9.00am</option>  
                                        <option value="10.00am">10.00am</option>  
                                    </select>
                                  <small id="" class="form-text text-muted">Give Time </small>
                              </div>
                              <div class="form-group">
                                  <label for="">Total Ticket</label>
                                  <input type="number" name="tickets" class="form-control border border-primary" id="" placeholder="">
                                  <small id="" class="form-text text-muted">Give Ticket </small>
                              </div>

                              <button class="btn btn-primary">Submit</button>
                          </form>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
