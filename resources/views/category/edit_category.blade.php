@extends('layouts.app')

@section('title')
  Edit Page
@endsection

@section('content')
<div class="container">
 	<h2>Edit Category Data </h2>
	@if ($errors->any())
			    <div class="alert alert-danger">
			        <ul>
			            @foreach ($errors->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
		@endif
	<form method="POST" action="/category/{{$data->id}}">
		{{ csrf_field()}}
 		{{ method_field('PATCH')}}
	  <div class="form-group">
	    <label for="exampleInputEmail1">Category Name</label>
	    <input type="text" name="name" class="form-control" id="name" value="{{ $data->name }}">
	  </div>
	  <div class="form-group">
	    <label for="exampleInputPassword1">Description </label>
	    <input type="text" name="description" class="form-control" id="ingredients" value="{{ $data->description}}">
	  </div>
	  <button type="submit" class="btn btn-primary">Update Category</button>
 	</form>
</div>
@endsection