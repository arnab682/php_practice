@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if ($errors->any())
                    @include('backend.layouts.elements.error')
                @endif
                <div class="card">
                    <div class="card-header">
                        
                        <h4 class="card-title text-center">
                        Create About </h4>

                        <div class="float-right">
                            <a class="btn btn-success easyAccess mr-2" class="float-right" href="{{route('abouts.index')}}">
                                <i class="mdi mdi-arrow-left-bold">Back</i>
                            </a>
                        </div>
                    </div>
                    

                    <div class="card-body table-responsive">
                        <div class="container">
                            
                            <form method="post" action="{{route('abouts.store')}}" id="signupForm" enctype="multipart/form-data"  >@csrf

                                @include('backend.about.form') <!-- autocomplete="off" -->

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
