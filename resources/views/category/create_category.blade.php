@extends('layouts.app')

@section('title')
  Register Page
@endsection

@section('content')
<div class="container">
 	<h2>Add New Category </h2>
	 	@if ($errors->any())
		    <div class="alert alert-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif

 	<form method="POST" action="/category">
 		<!-- @csrf -->
 		{{ csrf_field()}}
	  <div class="form-group">
	    <label for="exampleInputEmail1">Category Name</label>
	    <input type="text" name="name" class="form-control" id="name" value="{{ old('name')}}">
	  </div>
	  <div class="form-group">
	    <label for="exampleInputPassword1">Description </label>
	    <input type="text" name="description" class="form-control" id="description"  value="{{ old('description')}}">
	  </div>
  
	  <button type="submit" class="btn btn-primary">Insert Category</button>
	</form>
</div>
@endsection