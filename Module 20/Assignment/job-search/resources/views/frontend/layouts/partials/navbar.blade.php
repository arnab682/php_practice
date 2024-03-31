<!-- Navbar Start -->
        <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
            <a href="index.html" class="navbar-brand d-flex align-items-center text-center py-0 px-4 px-lg-5">
                <h1 class="m-0 text-primary">JobEntry</h1>
            </a>
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    <a href="{{route('welcome')}}" class="nav-item nav-link active">Home</a>
                    <a href="{{route('about')}}" class="nav-item nav-link">About</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Jobs</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <a href="job-list.html" class="dropdown-item">Job List</a>
                            <!-- <a href="job-detail.html" class="dropdown-item">Job Detail</a> -->
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <a href="category.html" class="dropdown-item">Job Category</a>
                            <!-- <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                            <a href="404.html" class="dropdown-item">404</a> -->
                        </div>
                    </div>
                    <a href="{{route('contact')}}" class="nav-item nav-link">Contact</a>
                    @if(Auth::user() && Auth::user()->Role->company == true)
                        <div class="nav-item dropdown">
                            <a href="" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block nav-link" data-bs-toggle="dropdown">{{Auth::user()->Company->name}}<i class="fa fa-arrow-right ms-3"></i></a>
                                <div class="dropdown-menu rounded-0 m-0">
                                    <a href="{{url('/profile')}}" class="dropdown-item">
                                        <b>Profile</b><br>
                                        <span>Your Profile</span>
                                    </a><hr>
                                    <form method="POST" action="{{ route('logout') }}">@csrf
                                        <a href="{{route('logout')}}"
                                            onclick="event.preventDefault();
                                                        this.closest('form').submit();" class="dropdown-item">
                                            <b>Logout</b><br>
                                            <span>Create Account or Sign In</span>
                                        </a>
                                    </form>
                                </div>
                        </div>
                    @elseif(Auth::user() && Auth::user()->Role->candidate == true)
                        <div class="nav-item dropdown">
                            <a href="" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block nav-link" data-bs-toggle="dropdown">{{Auth::user()->Profile->name}}<i class="fa fa-arrow-right ms-3"></i></a>
                                <div class="dropdown-menu rounded-0 m-0">
                                    <a href="{{url('/profile')}}" class="dropdown-item">
                                        <b>Profile</b><br>
                                        <span>Your Profile</span>
                                    </a><hr>
                                    <form method="POST" action="{{ route('logout') }}">@csrf
                                        <a href="{{route('logout')}}"
                                            onclick="event.preventDefault();
                                                        this.closest('form').submit();" class="dropdown-item">
                                            <b>Logout</b><br>
                                            <span>Create Account or Sign In</span>
                                        </a>
                                    </form>
                                </div>
                        </div>
                    @else
                        <div class="nav-item dropdown">
                        <a href="" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block nav-link" data-bs-toggle="dropdown">Signup/Login<i class="fa fa-arrow-right ms-3"></i></a>
                            <div class="dropdown-menu rounded-0 m-0">
                                <a href="{{url('/employer/account')}}" class="dropdown-item">
                                    <b>Employers</b><br>
                                    <span>Create Account or Sign In</span>
                                </a><hr>
                                <a href="{{url('/candidate/account')}}" class="dropdown-item">
                                    <b>Job Seeker</b><br>
                                    <span>Create Account or Sign In</span>
                                </a>
                            </div>
                    </div>
                    @endif
                   
                </div>
                
            </div>
        </nav>
        <!-- Navbar End -->