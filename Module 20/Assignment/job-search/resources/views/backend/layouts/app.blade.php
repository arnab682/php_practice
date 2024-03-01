@include('backend.layouts.partials.header')


@include('backend.layouts.partials.navbar')


    @include('backend.layouts.partials.sidebar')


        <div id="contentRef" class="content">
            @yield('content')
        </div>


 @include('backend.layouts.partials.footer')