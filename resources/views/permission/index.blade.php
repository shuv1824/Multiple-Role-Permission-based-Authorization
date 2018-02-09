@extends('layouts.layout')

@section('title')
    Permissions
@endsection

@section('heading')
    <h3>Permissions</h3>
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h4>Permission List</h4>
			</div>
			<div class="card-block">
				<table class="table table-bordered table-striped table-condensed datatable">
					<thead>
						<tr>
							<th>Sl.</th>
							<th>Name</th>
							<th>Description</th>
						</tr>
					</thead>

					<tbody>
						@foreach($permissions as $i => $permission)

						<tr>
							<td>{{ $i+1 }}</td>
							<td>{{ $permission['display_name'] }}</td>
							<td>{{ $permission['description'] }}</td>
						</tr>

						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection