@extends('backend.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 grid-margin stretch-card">
        	@if (session('success'))
		        @include('backend.layouts.elements.success')
		    @endif

				@if(session('message'))
					<div class="alert alert-success">
						{{ session('message') }}
					</div>
				@endif

		    @if ($errors->any())
		        @include('backend.layouts.elements.error')
		    @endif

            <div class="card">
                <div class="card-header">
                	<h4 class="card-title text-center">
                	Project Category List </h4>

                	<div class="float-right">
                		<a class="btn btn-success easyAccess mr-2" class="float-right" href="{{route('subcategory.create')}}">
                			<i class="mdi mdi-playlist-plus">Create</i>
                		</a>
                	</div>
                </div>

                <div class="card-body table-responsive" >
                
				    
                    <table class="table table-striped table-bordered table-hover" id="myTable">
					  <thead>
					    <tr>
					      <th scope="col" style="width: 5%">No</th>
					      
					      <th scope="col" style="width: 20%">Title</th>
					      <th scope="col" style="width: 15%">Photo</th>
					      <th scope="col" style="width: 20%">Category Name</th>
					      <th scope="col" style="width: 20%">Action</th>
					    </tr>
					  </thead>
					  @php
					  	$s = 0;
					  @endphp
					
					  <tbody>
					  	@foreach($subcategories as $subcategory)
					    <tr>
					    	
					      <td scope="row">{{++$s}}</td>
					      
					      <td><a href="{{route('subcategory.show', $subcategory->id)}}">{{$subcategory->title}}</a></td>
					      <td>
					      	@foreach($subcategory->images as $image)
	            				@if($image->image)
		                            @php
		                                $allImage = json_decode($image->image)
		                            @endphp
		                            @foreach($allImage as $img)
			                            @if(file_exists('uploads/images/subcategory/'.$img))
			                            	<img src="{{asset('uploads/images/subcategory/'.$img)}}" width="80" height="80" alt="User"/>
			                            @else
											<img src="{{asset('uploads/noImage/noimage.png')}}" width="80" height="80" alt="User"/>
										@endif
		                            @endforeach
		                        @endif
	                        @endforeach
					      </td>
					      <td>
					      	@foreach($categories as $cat)
						      	@if($cat->id == $subcategory->parent_id)
							      	{{$cat->title}}
							    @else
							    	
							    @endif
							@endforeach
					      </td>
					      <td>

					      	<a class="btn btn-success btn-icon mr-1 mt-1" href="{{route('subcategory.show', $subcategory->id)}}"> <i class="mdi mdi-eye"></i> </a>

				            <a class="btn btn-primary btn-icon mr-1 mt-1" href="{{route('subcategory.edit', $subcategory->id)}}"> <i class="mdi mdi-pencil"></i> </a>

				            {!! Form::open(array('route' => ['subcategory.destroy',$subcategory->id],'onclick'=>"return confirm('Are you sure you want to delete this item?');",'method' => 'DELETE', 'class' => 'deleteForm')) !!}
                                    {{ Form::button('<i class="mdi mdi-delete-forever"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-icon mt-1'] )  }}
                            {!! Form::close() !!}

					      </td>
						    
					    </tr>
					    @endforeach
					  </tbody>
					
					</table>
					                 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@push('css')
    <link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet">
    <style type="text/css">
    	#myTable tr:hover{background-color:#ffff99;cursor: pointer}
    </style>
@endpush

@push('scripts')
    
    <!-- <script src="{ asset('ui/frontend/js/jquery-3.4.1.min.js') }" defer></script> -->
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script>
     $(document).ready(function(){
     $("#myTable").dataTable();
        });
   
   </script>
@endpush