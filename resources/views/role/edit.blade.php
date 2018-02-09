@extends('layouts.layout')

@section('title')
    Roles
@endsection

@section('heading')
    <h3>Roles</h3>
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<form action="{{ url('/roles/'.$role->id) }}" method="POST" class="form-horizontal">
			{{ csrf_field() }}
			<input type="hidden" name="_method" value="PUT">
			<div class="card-header">
				<h4>Edit Role</h4>
			</div>

			<div class="card-block">
				<div class="form-group row">
					<label for="" class="col-md-3 form-control-label">Role Name</label>
					<div class="col-md-9">
						<input type="text" name="name" class="form-control" value="{{ $role->name }}" required="true">
					</div>
				</div>

				<div class="form-group row">
					<label for="" class="col-md-3 form-control-label">Display Name</label>
					<div class="col-md-9">
						<input type="text" name="display_name" class="form-control" value="{{ $role->display_name }}" required="true">
					</div>
				</div>

				<div class="form-group row">
					<label for="" class="col-md-3 form-control-label">Description</label>
					<div class="col-md-9">
						<textarea name="description" class="form-control">{{ $role->description }}</textarea>
					</div>
				</div>

				<div class="row">
					<div class="col-md-10 offset-md-1">
						<h4 style="text-align: center">Permissions</h4>
						<table class="table table-condensed">
							@foreach($permissions as $permission)
							<tr>
								<td>
									<input type="checkbox" class="form-control" name="permissions[]" value="{{ $permission['id'] }}"
									<?php foreach($role->permissions as $havepermission){
											if($permission['id'] == $havepermission['id']) echo "checked";
									}?> >
								</td>
								<td>
									{{ $permission['display_name'] }}
								</td>
								<td>
									{{ $permission['description'] }}
								</td>
							</tr>
							@endforeach
						</table>
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