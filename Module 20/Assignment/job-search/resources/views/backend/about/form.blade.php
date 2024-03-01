
<div class="form-group" style="margin-top:10px">

    <label for="image">Image : </label><br>
   
    <input type="file" name="filename[]" accept="image/*" class="form-control"  onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" >  
</div>


<div class="form-group">
    {!! Form::label('aboutus', 'About Us :') !!}
    {!! Form::text('aboutus', old('aboutus') ? old('aboutus') : (!empty($about)? $about->aboutus : null),[
        'class'=>'form-control',
        'placeholder' => 'aboutus',
        'required',
        'maxlength' => '120',
    ]) !!}
</div>


<div class="form-group">
    {!! Form::label('socialLinkFacebook', 'Facebook Link :') !!}
    {!! Form::url('socialLinkFacebook', old('socialLinkFacebook') ? old('socialLinkFacebook') : (!empty($about)? $about->socialLinkFacebook : null),[
        'class'=>'form-control',
        'placeholder' => 'Social Link Facebook',
        
    ]) !!}
</div>


{!! Form::button('Submit',['type'=> 'submit', 'class'=> 'btn btn-default btn-success mr-1']) !!}

{!! Form::button('Reset',['type'=> 'reset', 'class'=> 'btn btn-default btn-danger']) !!}


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
      ' alignright alignjustify | bullist numlist outdent indent |' +
      ' removeformat | help',

    });
</script>

@endpush