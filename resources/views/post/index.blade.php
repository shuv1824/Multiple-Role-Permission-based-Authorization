@extends('layouts.layout')

@section('title')
    Posts
@endsection

@section('heading')
    <h3>Posts</h3>
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="card">
			@if(Session::has('success'))
		        <div class="alert alert-success">
		            {{Session::get('success')}}
		        </div>
		    @endif

		    @if(Session::has('error'))
		        <div class="alert alert-danger">
		            {{Session::get('error')}}
		        </div>
		    @endif
			<div class="card-header">
				<h4>All Posts</h4>
			</div>
			<div class="card-block">
				<ul class="list-group">
					@foreach($posts as $post)
					<li class="list-group-item">
						<h4><a href="{{ url('/posts/'.$post->id) }}">{{ $post->title }}</a> </h4>
						<small> by {{ $post->user->name }}</small> <br>
						<p>{!! $post->body !!}</p> <br>
						<p>Posted on: {{ date('d-M-Y', strtotime($post->created_at)) }}</p>
					</li>
					@endforeach
				</ul>
			</div>
		</div>
	</div>
</div>
@endsection