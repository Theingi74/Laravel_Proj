@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <div class="container">
				<h2>Category Home Page</h2>
				<br>
				@if(session("session_message"))
				<div class="alert alert-primary alert-dismissible fade show" role="alert">
				  {{session("session_message")}}
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
					</button>
				</div>
				@endif
				<a href="/category/create">
					<button class="btn btn-success"> Create Category </button>
				</a>
				<br><br>
				@foreach($categoryData as $category)
					<a href="/category/{{ $category->id }}"><li>{{$category->name}}</li></a>
				@endforeach

				<br><br><br>
				<div>
					{{$categoryData->links()}}
				</div>
				
			</div>
        </div>
    </div>
</div>
@endsection


	
