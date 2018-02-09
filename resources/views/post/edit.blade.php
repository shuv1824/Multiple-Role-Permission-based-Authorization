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
			<form action="{{ url('/posts/'.$post->id) }}" method="POST" class="form-horizontal">
			{{ csrf_field() }}
			<input type="hidden" name="_method" value="PUT">
			<div class="card-header">
				<h4>Edit Post</h4>
			</div>

			<div class="card-block">
				<div class="form-group row">
					<label for="" class="col-md-3 form-control-label">Title</label>
					<div class="col-md-9">
						<input type="text" name="title" class="form-control" value="{{ $post->title }}" required="true">
					</div>
				</div>

				<div class="form-group row">
					<label for="" class="col-md-3 form-control-label">Post Body</label>
					<div class="col-md-9">
						<textarea name="body" id="post-body" class="form-control">{{ $post->body }}</textarea>
					</div>
				</div>
			</div>

			<div class="card-footer">
				<input type="submit" class="btn btn-primary" value="Edit">
			</div>
			</form>
		</div>
	</div>
</div>
@endsection