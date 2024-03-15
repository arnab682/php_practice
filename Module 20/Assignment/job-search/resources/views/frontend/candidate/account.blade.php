@extends('frontend.layouts.master')

@section('title')
    Job-Search
@endsection


@section('content')

<!-- Contact Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Candidate Account</h1>
                <div class="row g-4">
                    
                    <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="wow fadeInUp" data-wow-delay="0.5s">
                            <h3 style="text-align: center;"><b>Log In</b></h3><hr>
                            <form>
                                <div class="row g-3">
                                    
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="email" class="form-control" id="email" placeholder="Your Email">
                                            <label for="email">Your Email</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="password" class="form-control" id="password" placeholder="Your Password">
                                            <label for="password">Your Password</label>
                                        </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <button onclick="Login()" id="login-btn" class="btn btn-primary w-100 py-3" type="submit">Log In</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
        
    @include('frontend.candidate.create')
@endsection