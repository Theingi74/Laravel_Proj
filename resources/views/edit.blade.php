@extends('layouts.app')

@section('title')
  Edit Page
@endsection

@section('content')
<div class="container">
 	<h2>Edit Receipe </h2>
	 	@if ($errors->any())
			    <div class="alert alert-danger">
			        <ul>
			            @foreach ($errors->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
		@endif
 	<form method="POST" action="/receipe/{{$receipe->id}}">
 		<!-- @csrf -->
 		{{ csrf_field()}}
 		{{ method_field('PATCH')}}
	  <div class="form-group">
	    <label for="exampleInputEmail1">Receipe Name</label>
	    <input type="text" name="name" class="form-control" id="name" value="{{ $receipe->name }}">
	  </div>
	  <div class="form-group">
	    <label for="exampleInputPassword1">Ingredients </label>
	    <input type="text" name="ingredients" class="form-control" id="ingredients" value="{{ $receipe->ingredients}}">
	  </div>
<!-- 	  <div class="form-group">
	  	<select class="form-control" name="category">
	  		<option value="{{ $receipe->categories->id}}" selected>{{ $receipe->categories->name}}</option>
	  	</select>	  	
	  </div> -->
	  <!-- {{$receipe->categories->id}} -->
	  <label for="exampleInputPassword1">Category </label>
	  <div class="form-group">
	  	<select class="form-control" name="category">
	  		@foreach ($category as $value)
	  		<option value="{{ $value->id}}" 
	  			{{ $receipe->categories->id == $value->id ? "selected" : ''}} >{{ $value->name}}</option>
	  		@endforeach
	  	</select>	  	
	  </div>
	  

	
	  
	  <button type="submit" class="btn btn-primary">Update</button>
	</form>
</div>
@endsection