@extends('backend.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title text-center">
                        Home Content Show </h4>

                        <div class="float-right">
                            <a class="btn btn-success easyAccess mr-2" class="float-right" href="{{route('contents.index')}}">
                                <i class="mdi mdi-arrow-left-bold">Back</i>
                            </a>
                        </div>
                	
                </div>

                <div class="card-body">
                    <div class="row">

                        <div class="col-md-5">
                            @foreach($content->images as $image)
                                @if($image->image)
                                    @php
                                        $allImage = json_decode($image->image)
                                    @endphp
                                    @foreach($allImage as $img)
                                        @if(file_exists('uploads/images/home-content/'.$img))
                                            <img src="{{asset('uploads/images/home-content/'.$img)}}" width="200" height="200" alt="User" style="margin-left: 260px; border-style: solid;" />
                                        @else
                                            <img src="{{asset('uploads/noImage/noimage.png')}}" width="200" height="200" alt="User" style="margin-left: 260px; border-style: solid;"/>
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                        </div>

                        <div class="col-md-7">
                            <div style="margin-left: 120px; margin-top: 20px">
                                <h4>
                                    <b>Title : </b> {{$content->title}}</h4>
                                <h5>
                                <p>
                                    
                                    <b>Page Link : </b> {{$content->link}}<br />
                                    <b>Created At : </b> {{$content->created_at->format('F d, Y h:s A')}}<br />
                                    <b>Updated At : </b> {{$content->updated_at->format('F d, Y h:s A')}}<br />

                                </p>
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
