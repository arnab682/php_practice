
<div class="element clearfix col1-3 home auto " id="form">
 
  
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

@push('css')

    
<style type="text/css">
    
    .successMess{
         border: none 0px transparent;
        /*background: url(../ui/frontend/images/icons/bg-mail.png) no-repeat scroll top right transparent;
        background-size: 48px 48px;*/
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
        background: url(../ui/frontend/images/icons/bg-mail.png) no-repeat scroll top right transparent;
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


#parent-div{
    position: relative;
}

@media (max-width: 768px) {
        
       
        #form {
         display: none;
                        

        }

    }

@media (min-width: 768px) {
        

        #form {
            display: block;
            height: 546px !important;       
        }
    }

</style>

@endpush