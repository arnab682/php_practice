@extends('backend.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 grid-margin stretch-card">
        	@if (session('success'))
		        @include('backend.layouts.elements.success')
		    @endif

		    @if ($errors->any())
		        @include('backend.layouts.elements.error')
		    @endif
		    
            <div class="card">
                <div class="card-header">
                	<h4 class="card-title text-center">
                	About Us </h4>

                	
                </div>

                <div class="card-body table-responsive" >

                    <table class="table table-striped table-bordered table-hover" id="myTable">
					  <thead>
					    <tr>
					      <th scope="col" style="width: 5%">No</th>
					      <th scope="col" style="width: 35%">About Us</th>
					      <th scope="col" style="width: 15%">Photo</th>
					      <th scope="col" style="width: 25%">Facebook Link</th>
					      <th scope="col" style="width: 20%">Action</th>
					    </tr>
					  </thead>
					  @php
					  	$s = 0;
					  @endphp
					@foreach($about as $about)
					  <tbody>
					    <tr>
					      <td scope="row">{{++$s}}</td>
					      
					      <td><a href="">{!!$about->aboutus!!}</a></td>
					      <td>
					      	@foreach($about->images as $image)
	            				@if($image->image)
		                            @php
		                                $allImage = json_decode($image->image)
		                            @endphp
		                            @foreach($allImage as $img)
										  @if(file_exists('uploads/images/about/'.$img))
											  <img src="{{asset('uploads/images/about/'.$img)}}" width="80" height="80" alt="User"/>
										  @else
											  <img src="{{asset('uploads/noImage/noimage.png')}}" width="80" height="80" alt="User"/>
										  @endif
		                            @endforeach
		                        @endif
	                        @endforeach
					      </td>
					      <td>{{$about->socialLinkFacebook}}</td>
					      <td class="actionButton">

					      	<a class="btn btn-success btn-icon mr-1 mt-1" href="{{route('abouts.show', $about->id)}}"> <i class="mdi mdi-eye"></i>  </a>

				            <a class="btn btn-primary btn-icon mr-1 mt-1" href="{{route('abouts.edit', $about->id)}}"> <i class="mdi mdi-pencil"></i>  </a>


					      </td>
					    </tr>
					  </tbody>
					@endforeach
					</table>
					                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('css')
    
    <style type="text/css">
    	#myTable tr:hover{background-color:#ffff99;cursor: pointer}
    </style>
@endpush
