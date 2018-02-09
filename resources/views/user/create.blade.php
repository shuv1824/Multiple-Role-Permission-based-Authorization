@extends('layouts.layout')

@section('title')
    Users
@endsection

@section('heading')
    <h3>Users</h3>
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<form action="{{ url('/users') }}" method="POST" class="form-horizontal">
			{{ csrf_field() }}
			<div class="card-header">
				<h4>Create New User</h4>
			</div>

			<div class="card-block">
				<div class="form-group row">
					<label for="" class="col-md-3 form-control-label">Name</label>
					<div class="col-md-9">
						<input type="text" name="name" class="form-control" required="true">
					</div>
				</div>

				<div class="form-group row">
					<label for="" class="col-md-3 form-control-label">Email</label>
					<div class="col-md-9">
						<input type="email" name="email" class="form-control" required="true">
					</div>
				</div>

				<div class="form-group row">
					<label for="" class="col-md-3 form-control-label">Password</label>
					<div class="col-md-9">
						<input type="password" name="password" class="form-control" required="true">
					</div>
				</div>

				<div class="form-group row">
					<label for="" class="col-md-3 form-control-label">Confirm Password</label>
					<div class="col-md-9">
						<input type="password" name="password_confirmation" class="form-control" required="true">
					</div>
				</div>

				<div class="form-group row">
					<label for="" class="col-md-3 form-control-label">Roles</label>
					<div class="col-md-9">
						<select name="roles[]" class="form-control select2-multiple select-box" multiple="">
							{{-- <option value=""></option> --}}
							@foreach($roles as $role)
								<option value="{{ $role->id }}">{{ $role->display_name }}</option>
							@endforeach
						</select>
					</div>
				</div>
			</div>

			<div class="card-footer">
				<input type="submit" class="btn btn-primary" value="Add">
			</div>

			</form>
		</div>
	</div>
</div>
@endsection