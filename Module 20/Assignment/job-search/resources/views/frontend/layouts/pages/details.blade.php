@extends('frontend.layouts.master')

@section('title')
    Silverbricksbd
@endsection

@section('content')

 <div class="element about hybrid" style="width: 100%; margin-bottom: 0rem; margin-left: 1rem">
        
    </div>
      <div class="element  clearfix col4-3 auto home">
        <div class="flexslider">
          <div class="images">
            <ul class="slides">
              @foreach($project->images as $image)
                @if($image->image)
                  @php
                      $allImage = json_decode($image->image)
                  @endphp
                  @foreach($allImage as $img)
                    <li>               
                      <img src="{{asset('uploads/images/project/'.$img)}}" alt=""/>
                    </li> 
                  @endforeach
                @endif
              @endforeach  
            </ul>
          </div>
        </div>
      </div>
      <div class="element clearfix col1-3 home grey auto" style="height:  430px !important;">
        <h3 class="uppercase"><strong>{{$project->title}}</strong></h3>
        <div class="ct-part">
          <p class="small">Category :</p>
          <p><a href="#">
           @if(isset($project->category->title))
             {{$project->category->title}}
           @else

           @endif
          </a></p>
          <!-- <p class="small">Project Cost :</p>
          <p>{{$project->cost}}</p> -->
          <p class="small">Client :</p>
          <p>{{$project->clientName}}</p>
          <p class="small">Project Location :</p>
          <p>{{$project->address}} </p>
          <!-- <p class="small">Phone Number :</p>
          <p>+02-41360233(Silverbricksbd)</p>
          <p class="small">Email :</p>
          <p>info@silverbricksbd.com</p> -->
        </div>
      </div>
      @if(isset($project->description))
        <div class="element clearfix col1-3 grey  " style="height:  430px !important;">
          <h3 class="uppercase"><strong>Description</strong></h3>
          <div class="ct-part">
            
            {!! $project->description !!}
          </div>
        </div>
      @endif
      
      <!--===== Start Company Address =========-->

         <div class="element clearfix col1-3 grey  " style="height:  430px !important;" >
          
            @php
                $location = App\Model\Location::all();
            @endphp
           
            <h3 class="uppercase"><strong>Silverbricks</strong></h3>
            <div class="ct-part">
              <ul class="unordered-list">
                  <li>{{$location[0]->address}}
                  </li>
                  <li>Dhaka Office: {{$location[0]->dhakaAddress}}
                  </li>
                  <li>PH: {{$location[0]->phoneNumber}}.</li>
                  <li><a href="mailto:{{$location[0]->email}}" title="Write Email">{{$location[0]->email}}</a></li>
              </ul>
            </div>
        </div>

      <!--========== End Company Address ================-->

      <!-- contact   -->
            <!--include('frontend.layouts.elements.contactus')   -->
            
            <div class="element clearfix col1-3 home auto " id="form">
             
                <div class="elem-content">
                    <h3><strong>Say Hi</strong></h3>
                   
                    <form class="form-part" method="post" action="{{route('contactSendEmail')}}" name="contactform"
                          id="contactform" autocomplete="off">@csrf
                        <input name="name" type="text" required id="name" size="30" placeholder="Name"/>
                        <input name="email" type="email" required id="email" size="30" placeholder="Email"/>
                        <input name="phone" type="text" id="phone" required size="30" placeholder="Phone"/>
                        <textarea name="comments" cols="40" rows="3" required id="comments"
                                  placeholder="Tell us what you think!" ></textarea>
            
                        <div class="input-wrapper clearfix">    
                            <input type="submit" class="send-btn" value="Send" id="submitInfo" name="Submit"/>           
                        </div>
                        <span  class="successMess">
                            @if (session('success'))
                                {{ session('success') }}
                            @endif
                        </span>
                            
                    </form>
                   
                </div>
            </div>
            

      <!--============= Start Contact form =========-->
              <!-- include('frontend.layouts.elements.contactus2') -->

          <div class="element clearfix col1-3 home auto " id="form2">
           
            
              <div class="elem-content">
                  <h3><strong>Say Hi</strong></h3>
                 
                  <form class="form-part" method="post" action="{{route('contactSendEmail')}}" name="contactform"
                        id="contactform" autocomplete="off">@csrf
                      <input name="name" type="text" required id="name" size="30" placeholder="Name"/>
                      <input name="email" type="email" required id="email" size="30" placeholder="Email"/>
                      <input name="phone" type="text" id="phone" required size="30" placeholder="Phone"/>
                      <textarea name="comments" cols="40" rows="3" required id="comments"
                                placeholder="Tell us what you think!"></textarea>

                      <div class="input-wrapper clearfix">    
                          <input type="submit" class="send-btn" value="Send" id="submitInfo" name="Submit"/>           
                      </div>
                      <span  class="successMess">
                          @if (session('success'))
                              {{ session('success') }}
                          @endif
                      </span>
                                    
                  </form>
                 
              </div>
          </div>
  
      <!--============ End Contact form =========-->
        <!--===== Start Company Address =========-->

               <!--  include('frontend.layouts.elements.location') -->

        <!--========== End Company Address ================-->

@endsection

@push('css')

<style>

    .successMess{
        border: none 0px transparent;
        
        padding: 16px 8px 16px 4px;
        height: 48px;
        font-family: 'Open Sans', 'Helvetica Neue', Arial, Helvetica, sans-serif;
        font-size: 20px;
        display: block;
        width: auto;
        float: right;
        margin: -47px 114px 16px 16px;
        /* margin: 18px 29px 0px 0px; */
        line-height: 12px;
        font-style: italic;
        color: green;
    }

    .form-part .send-btn {
        border: none 0px transparent;
        background: url(../../ui/frontend/images/icons/bg-mail.png) no-repeat scroll top right transparent;
        background-size: 48px 48px;
        padding: 19px 60px 16px 4px;
        height: 48px;
        font-family: 'Open Sans', 'Helvetica Neue', Arial, Helvetica, sans-serif;
        font-size: 14px;
        display: block;
        width: auto;
        float: right;
        margin: 19px 29px 0px 0px;
        /* margin: 18px 29px 0px 0px; */
        line-height: 12px;
        font-style: italic;
    }


      #comments{
          height: 70px;
          resize: none;
          overflow:hidden
      }
      
      .form-part > textarea {
          
          resize: none;
      }


      #parent-div{
          position: relative;
      }
      
      @media (max-width: 768px) {
              
             
            #form {
             display: none;                
    
            }

            /***MAIN & MOBILE NAV***/
          
            #form2 {
                display: block;
                height:  440px !important;       
            }
    
        }
      
      @media (min-width: 768px) {    
    
            #form {
                display: block;
                height: 430px !important;       
            }

            /***MAIN & MOBILE NAV***/
           
            #form2 {
                display: none;
                
            }
        }


</style>

@endpush