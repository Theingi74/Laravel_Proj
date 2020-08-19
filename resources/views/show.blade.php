@extends('layouts.app')

@section('content')
	<div class="container">
		<h2>{{ $receipe->name }}</h2>
		<li>Ingredients : {{ $receipe->ingredients }}</li>
		<li>Category    : {{ $receipe->categories->name }}</li>
		<br>
		<a href="/receipe/{{ $receipe->id }}/edit"><button class="btn btn-primary">Edit</button></a>
		<br><br>
		<form method="POST" action="/receipe/{{ $receipe->id}}">
			@csrf
			{{method_field('DELETE')}}

			<button class="btn btn-primary">DELETE</button>
			

		</form>
	</div>
@endsection