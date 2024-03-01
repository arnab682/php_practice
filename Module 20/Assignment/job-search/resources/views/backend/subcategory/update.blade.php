
<div class="row mx-auto" style="height: 220px; background-color: ;">

    <div class="col-md-7">
        

        <div class="img pt-2 float-right" >
            @foreach($subcategory->images as $image)
                @if($image->image)
                   
                   
                    @php
                        $allImage = json_decode($image->image)
                    @endphp
                    @foreach($allImage as $img)
                        @if(file_exists('uploads/images/subcategory/'.$img))
                            <img src="{{asset('uploads/images/subcategory/'.$img)}}" id="blah"  style="width:200px;height:200px; border: 1px solid black"/>
                        @else
                            <img src="{{asset('uploads/noImage/noimage.png')}}" id="blah" style="width:200px;height:200px; border: 1px solid black"/>
                        @endif
                    @endforeach
                @endif
            @endforeach
           
        </div>

    </div>

    <div class="col-md-5 info pt-4">
        <p>Height: 200 pixels</p>
        <p>Width: 300 Pixels</p>
        <p>Size: 200kb</p>
        <p>Image Format: jpeg,png,jpg,gif,svg</p>
    </div>

</div>


<div class="form-group" style="margin-top:10px">

    <label for="image">Image* : </label><br>
   
    <input type="file" name="filename[]" accept="image/*" class="form-control"  onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">  
</div>



<div class="form-group">
    {!! Form::label('title', 'Sub-Category Title* :') !!}
    {!! Form::text('title', old('title') ? old('title') : (!empty($subcategory)? $subcategory->title : null),[
        'class'=>'form-control',
        'placeholder' => 'Sub-Category Title',
        'required',
    ]) !!}
</div>



<div class="form-group">
    <label for="parent_id">Select Category* :</label>

    <select class="form-control form-control-" required="" name="parent_id">
        <option>Select Category</option>
        @foreach( $categories as $category)
        <option value="{{$category->id}}" {{ ( $category->id  == $subcategory->parent_id) ? 'selected' : '' }}>{{$category->title}}</option>
        @endforeach
    </select>

</div>






{!! Form::button('Update',['type'=> 'submit', 'class'=> 'btn btn-default btn-success']) !!}

