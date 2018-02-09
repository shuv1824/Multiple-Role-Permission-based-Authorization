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
			@if(Session::has('success'))
		        <div class="alert alert-success">
		            {{Session::get('success')}}
		        </div>
		    @endif
			<div class="card-header">
				<h4>Role List</h4>
			</div>
			<div class="card-block">
				<table class="table table-bordered table-striped table-condensed" id="datatable">
					<thead>
						<tr>
							<th>Sl.</th>
							<th>Name</th>
							<th>Description</th>
							<th>Permissions</th>
							<th>Action</th>
						</tr>
					</thead>

					<tbody>
						@foreach($roles as $i => $role)

						<tr>
							<td>{{ $i+1 }}</td>
							<td>{{ $role['display_name'] }}</td>
							<td>{{ $role['description'] }}</td>
							<td>
								@foreach($role->permissions as $permission)
								 <span class="btn btn-default btn-sm">{{ $permission['display_name'] }} </span>
								@endforeach
							</td>
							<td>
								<a href="{{ url('roles/'.$role['id'].'/edit') }}" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
								<button type="submit" class="btn btn-danger btn-sm" onclick="document.getElementById('role-delete-form').submit();">
									<i class="fa fa-trash-o"></i>
								</button>

								<form action="{{ url('roles/'.$role['id']) }}" method="POST" id="role-delete-form">
									{{ csrf_field() }}
									<input type="hidden" name="_method" value="DELETE">
								</form>
							</td>
						</tr>

						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection