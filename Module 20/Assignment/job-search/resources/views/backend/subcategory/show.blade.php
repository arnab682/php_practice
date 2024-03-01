@extends('backend.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                	<h4 class="card-title text-center">
                        Project Category Show  </h4>

                        <div class="float-right">
                            <a class="btn btn-success easyAccess mr-2" class="float-right" href="{{route('subcategory.index')}}">
                                <i class="mdi mdi-arrow-left-bold">Back</i>
                            </a>
                        </div>
                	
                </div>

                <div class="card-body">
					<div class="row">

						<div class="col-md-4">
							@foreach($subcategory->images as $image)
								@if($image->image)
									@php
										$allImage = json_decode($image->image)
									@endphp
									@foreach($allImage as $img)
										@if(file_exists('uploads/images/subcategory/'.$img))
											<img src="{{asset('uploads/images/subcategory/'.$img)}}" width="200" height="200" alt="User" style="margin-left: 260px; border-style: solid;"/>
										@else
											<img src="{{asset('uploads/noImage/noimage.png')}}" width="200" height="200" alt="User" style="margin-left: 260px; border-style: solid;"/>
										@endif
									@endforeach
								@endif
							@endforeach
						</div>

						<div class="col-md-8">
							<div style="margin-left: 120px; margin-top: 20px">
								<h4>
									<b>Category Title : </b> {{$subcategory->title}}</h4>
								<h5>
									
									<b>Category Name : </b>
									@foreach($categories as $cat)
										@if($cat->id == $subcategory->parent_id)
											{{$cat->title}}
										@else

										@endif
									@endforeach<br>
									
									<b>Created At : </b> {{$subcategory->created_at->format('F d, Y h:s A')}}<br />
									<b>Updated At : </b> {{$subcategory->updated_at->format('F d, Y h:s A')}}<br />

								</h5>

							</div>


						</div>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
