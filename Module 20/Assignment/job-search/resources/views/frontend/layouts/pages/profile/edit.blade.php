@extends('frontend.layouts.master')

@section('title')
    Job-Search
@endsection


@section('content')

<!-- Contact Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Reset Password</h1>
                <div class="row g-4">
                    <div class="col-md-12">
                        @if ($errors->any())
                            @include('frontend.layouts.elements.error')
                        @endif
                        @if(session()->has('error'))
                            <div class="alert alert-danger">
                                {{ session()->get('error') }}
                            </div>
                        @endif
                    </div>
                    <div class="col-md-3"></div>
                    <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="wow fadeInUp" data-wow-delay="0.5s">
                            <h3 style="text-align: center;"><b></b></h3>
                            <form method="POST" action="{{ route('password.store') }}"> @csrf
                                <div class="row g-3">
                                     <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="password" class="form-control"  id="password" name="password" required autocomplete="new-password">
                                            <label for="password">Your Name</label>
                                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="email" class="form-control"  id="email" name="email" :value="old('email', $request->email)" required autofocus>
                                            <label for="email">Your Email</label>
                                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="password" class="form-control"  id="password" name="password" required autocomplete="new-password">
                                            <label for="password">Your Password</label>
                                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="password" class="form-control"  id="password_confirmation" name="password_confirmation" required autocomplete="new-password">
                                            <label for="password_confirmation">Your Password Confirmation</label>
                                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                        </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100 py-3" type="submit">Reset Password</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-3"></div>
                </div>
            </div>
        </div>
        <!-- Contact End -->


@endsection