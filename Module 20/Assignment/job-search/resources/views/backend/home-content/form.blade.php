<div class="row mx-auto" style="height: 220px; background-color: ;">

    <div class="col-md-7">
        

        <div class="img pt-2 float-right" style="" >
            <img  id="blah"  style="width:200px;height:200px; border: 1px solid black; background-color: #EBEDEF" />
        </div>

    </div>

    <div class="col-md-5 info pt-4">
        <p>Height: 200 Pixels</p>
        <p>Width: 300 Pixels</p>
        <p>Size: 200kb</p>
        <p>Image Format: jpeg,png,jpg,gif,svg</p>
    </div>

</div>




<div class="form-group" style="margin-top:10px">

    <label for="image">Image* : </label><br>
   
    <input type="file" name="filename[]" accept="image/*" class="form-control" required onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" >  
</div>



<div class="form-group">
    {!! Form::label('title', 'Title* :') !!}
    {!! Form::text('title', old('title') ? old('title') : (!empty($content)? $content->title : null),[
        'class'=>'form-control',
        'placeholder' => 'Title',
        'required',
    ]) !!}
</div>

<div class="form-group">
    {!! Form::label('link', 'Page Link* :') !!}
    {!! Form::url('link', old('link') ? old('link') : (!empty($content)? $content->link : null),[
        'class'=>'form-control',
        'placeholder' => '',
        'required',
    ]) !!}
</div>




{!! Form::button('Submit',['type'=> 'submit', 'class'=> 'btn btn-default btn-success mr-1']) !!}

{!! Form::button('Reset',['type'=> 'reset', 'class'=> 'btn btn-default btn-danger']) !!}




