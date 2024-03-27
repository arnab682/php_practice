
        <!-- Carousel Start -->
        <div class="container-fluid p-0">
            <div class="owl-carousel header-carousel position-relative">
                @foreach($banners as $banner)
                <div class="owl-carousel-item position-relative">
                    @foreach($banner->images as $img)
                        
                    <img class="img-fluid" src="{{asset('/uploads/images/banner/'.$img->image)}}" alt="" style="height: 400px;">

                    @endforeach
                    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(43, 57, 64, .5);">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-10 col-lg-8">
                                    <h1 class="display-3 text-white animated slideInDown mb-4">{{$banner->title}}</h1>
                                    <p class="fs-5 fw-medium text-white mb-4 pb-2">{{$banner->short_description}}</p>
                                    <!-- <a href="" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Search A Job</a>
                                    <a href="" class="btn btn-secondary py-md-3 px-md-5 animated slideInRight">Find A Talent</a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <!-- Carousel End -->