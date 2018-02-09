@extends('layouts.layout')

@section('title')
    Posts
@endsection

@section('heading')
    <h3>Post</h3>
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
				<h4>{{ $post->title }}</h4>
				<p>{{ $post->user->name }}</p>
			</div>

			<div class="card-block">
				<p>{!! $post->body !!}</p>
				<p>Posted on: {{ date('d-M-Y h:i A', strtotime($post->created_at)) }}</p>
			</div>
				

			<div class="card-footer">
				<a href="{{ url('posts/'.$post->id.'/edit') }}" class="btn btn-warning btn-sm">Edit Post</a>
				<button class="btn btn-danger btn-sm" 
						onclick="document.getElementById('post-delete-form').submit();">Delete Post</button>
			</div>

			<form action="{{ url('posts/'.$post->id) }}" method="POST" id="post-delete-form">
				{{ csrf_field() }}
				<input type="hidden" name="_method" value="DELETE">
			</form>
		</div>
	</div>
</div>
@endsection