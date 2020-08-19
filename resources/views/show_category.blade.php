@extends('layouts.app')

@section('content')
	<div class="container">
		<h2>{{ $category->name }}</h2>
		<li>Description : {{ $category->description }}</li>
		<br>
		<a href="/category/{{$category->id}}/edit"><button class="btn btn-primary">Edit</button></a>
		<br><br>
		
	</div>
@endsection