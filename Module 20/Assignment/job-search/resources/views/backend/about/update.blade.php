<div class="row mx-auto" style="height: 220px; background-color: ;">

    <div class="col-md-7">
        

        <div class="img pt-2 float-right" >
           @foreach($about->images as $image)
                @if($image->image)
                   
                   
                    @php
                        $allImage = json_decode($image->image);
                    @endphp

                    @foreach($allImage as $img)
                        @if(file_exists('uploads/images/about/'.$img))
                            <img src="{{asset('uploads/images/about/'.$img)}}" id="blah"  style="width:200px;height:200px; border: 1px solid black"/>
                        @else
                            <img src="{{asset('uploads/noImage/noimage.png')}}" id="blah"  style="width:200px;height:200px; border: 1px solid black"/>
                        @endif
                    @endforeach
                @endif
            @endforeach         
        </div>

    </div>

    <div class="col-md-5 info pt-4">
        <p>Height: 580 pixels</p>
        <p>Width: 620 Pixels</p>
        <p>Size: 300kb</p>
        <p>Image Format: jpeg,png,jpg,gif,svg</p>
    </div>

</div>


<div class="form-group" style="margin-top:10px">

    <label for="image">Image* : </label><br>
   
    <input type="file" name="filename[]" accept="image/*" class="form-control"  onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" >  
</div>


<div class="form-group">
    {!! Form::label('aboutus', 'About Us* :') !!}
    {!! Form::text('aboutus', old('aboutus') ? old('aboutus') : (!empty($about)? $about->aboutus : null),[
        'class'=>'form-control',
        'placeholder' => 'aboutus',
        'maxlength' => '120',
        'row' => 1,
        'required',
    ]) !!}
</div>


<div class="form-group">
    {!! Form::label('socialLinkFacebook', 'Facebook Link :') !!}
    {!! Form::url('socialLinkFacebook', old('socialLinkFacebook') ? old('socialLinkFacebook') : (!empty($about)? $about->socialLinkFacebook : null),[
        'class'=>'form-control',
        'placeholder' => 'http://facebook.com',
        
    ]) !!}
</div>




{!! Form::button('Update',['type'=> 'submit', 'class'=> 'btn btn-default btn-success']) !!}


@push('scripts')

<script src="https://cdn.tiny.cloud/1/aqfqxas2hn4ckreepuu93xeiw4ofga57rfql30n88j309ikj/tinymce/5/tinymce.min.js"></script>
    

<script>
    tinymce.init({
      selector: '#aboutus',
      height: 200,
      menubar: false,
      plugins: [
        'advlist autolink lists link image charmap print preview anchor',
        'searchreplace visualblocks code fullscreen',
        'insertdatetime media table paste code help wordcount'
      ],
      toolbar: 'undo redo | formatselect | ' +
      ' bold italic backcolor | alignleft aligncenter ' +
      ' alignright alignjustify | help',

    });
</script>

@endpush