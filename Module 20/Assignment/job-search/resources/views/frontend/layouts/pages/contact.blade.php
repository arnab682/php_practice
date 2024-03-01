@extends('frontend.layouts.master')

@section('title')
    Silverbricksbd
@endsection


@section('content')

    <div class="element about hybrid" style="width: 100%; margin-bottom: 0rem; margin-left: 1rem"></div>


         
            <!------------- Start Google Map ----------------->

                @include('frontend.layouts.elements.google_map')
            <!----------------- End Google Map ------------------>

            <!--===== Start Company Address =========-->

                    @include('frontend.layouts.elements.address')

            <!--========== End Company Address ================-->

            <!--===== Start Company Address =========-->

                    @include('frontend.layouts.elements.address2')

            <!--========== End Company Address ================-->


            <!--============= Start Contact form =========-->
                    @include('frontend.layouts.elements.contactus')
            
            <!--============ End Contact form =========-->

            <!--============= Start Contact form =========-->
                    @include('frontend.layouts.elements.contactus2')
        
            <!--============ End Contact form =========-->
            


@endsection

@push('css')
<style type="text/css">
    .col2-3.white-bottom {
        padding: 10px 50px 8px 50px;
        background: #fff;
    }
</style>
<style type="text/css">

        @media (min-width:768px) {
            /***BODY ***/
            

            /***MAIN & MOBILE NAV***/
           #addform {
                display: block;
                height: 546px !important;
                background-size: 300px 546px!important;     
            }

            #addform2 {
                display: none;
                
            }
        }

        @media (max-width:768px) {
                /***BODY ***/
                

            /***MAIN & MOBILE NAV***/
           #addform {
             display: none;
                            

            }

            #addform2 {
                display: block;
                height: 446px !important;
                background-size: 300px 446px!important; 
            }
            
        }

    </style>
@endpush