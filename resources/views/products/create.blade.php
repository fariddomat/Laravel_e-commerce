@extends('layouts.app')

@section('content')

<div class="">
<div class="panel col-md-8 col-md-offset-2">
    <div class="panel-heading">
        <h3>Dashboard</h3>
    </div>
    <hr>
    <div class="panel-body">
    <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('POST')
        <div class="form-group">
      <label for="name">Name</label>
        <input type="text" value="{{old('name')}}"
        class="form-control" name="name" id="name" aria-describedby="helpId" placeholder="">    
    </div>
    <div class="form-group">
      <label for="price">Price</label>
    <input type="number" value="{{old('price')}}"
        class="form-control" name="price" id="price" aria-describedby="helpId" placeholder="">
    </div>
    <div class="form-group">
      <label for="img">Image</label>
      <input type="file" class="form-control-file" name="img" id="img" placeholder="" aria-describedby="fileHelpId"  onchange="loadFile(event)" value="{{asset('uploads/product_images/default.png')}}">
    </div>
    <div class="form-group">
      <img src="{{asset('uploads/product_images/default.png')}}" style="width:100px" class="img-thumbnail image-p" id="image-p" alt="">
      </div>
    <div class="form-group">
      <label for="desc">Description</label>
      <textarea class="form-control" name="desc" id="desc" rows="3">
        {{old('desc')}}
      </textarea>
    </div>
    <button type="submit" class="btn btn-primary">Create Product</button>
    </form>
    </div>
</div>
</div>

@endsection