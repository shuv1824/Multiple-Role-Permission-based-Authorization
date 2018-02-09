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
			@if(Session::has('success'))
		        <div class="alert alert-success">
		            {{Session::get('success')}}
		        </div>
		    @endif
			<div class="card-header">
				<h4>User List</h4>
			</div>
			<div class="card-block">
				<table class="table table-bordered table-striped table-condensed datatable">
					<thead>
						<tr>
							<th>Sl.</th>
							<th>Name</th>
							<th>Email</th>
							<th>Roles</th>
							<th>Permissions</th>
							<th>Action</th>
						</tr>
					</thead>

					<tbody>
						@foreach($users as $i => $user)

						<tr>
							<td>{{ $i+1 }}</td>
							<td>{{ $user['name'] }}</td>
							<td>{{ $user['email'] }}</td>
							<td>
								@foreach($user->roles as $role)
								 <span class="btn btn-default btn-sm">{{ $role['display_name'] }} </span>
								@endforeach
							</td>
							<td>
								@foreach($user->roles as $role)
									@foreach($role->permissions as $permission)
								 		<span class="btn btn-default btn-sm">
								 			{{ $permission['display_name'] }} 
								 		</span>
								 	@endforeach
								@endforeach
							</td>
							<td>
								<a href="{{ url('users/'.$user['id']."/edit") }}" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
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