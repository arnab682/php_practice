@extends('backend.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title text-center">
                        About Show </h4>

                        <div class="float-right">
                            <a class="btn btn-success easyAccess mr-2" class="float-right" href="{{route('abouts.index')}}">
                                <i class="mdi mdi-arrow-left-bold">Back</i>
                            </a>
                        </div>
                    
                </div>

                 <div class="card-body">
                    <div class="row">

                        <div class="col-md-4 float-right">
                            @foreach($about->images as $image)
                                @if($image->image)
                                    @php
                                        $allImage = json_decode($image->image)
                                    @endphp
                                    @foreach($allImage as $img)
                                        @if(file_exists('uploads/images/about/'.$img))
                                            <img src="{{asset('uploads/images/about/'.$img)}}" width="200" height="200" alt="User" style="margin-left: 260px; border-style: solid;"/>
                                        @else
                                            <img src="{{asset('uploads/noImage/noimage.png')}}" width="200" height="200" alt="User" style="margin-left: 260px; border-style: solid;"/>
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                        </div>

                        <div class="col-md-6">
                            <div style="margin-left: 120px; margin-top: 10px">
                                <h5>
                                    
                                <p>
                                    
                                    <b>About Us : </b>{!!$about->aboutus!!}
                                    <b>Facebook Link : </b> {{$about->socialLinkFacebook}}<br />
                                    <b>Created At : </b> {{$about->created_at->format('F d, Y h:s A')}}<br />
                                    <b>Updated At : </b> {{$about->updated_at->format('F d, Y h:s A')}}<br />
                                </p>
                                </h5>


                            </div>
                            <div class="col-md-2"></div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



