@extends('layouts.app')

@section('content')
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h2 class="title">Project</h2>
				<a data-link="{{ route('c') }}" class="ajaxbtn btn btn btn-primary navbar-btn btn_create">Create</a>
			</div>
			<div class="panel-body">
				<div id="screenPanel" class="t111">

				@if(Session::has('message'))
					<div class="alert alert-info">{{ Session::get('message') }}</div>
				@endif
				<table class="table table-striped">
					<thead>
					<tr>
						<td>ID</td>
						<td>Name</td>
						<td>Description</td>
						<td>Create</td>
						<td>Actions</td>
					</tr>
					</thead>
					<tbody>


					@foreach( $project as $prj)
						<tr>
							<td>{{ $prj -> id }}</td>
							<td><a href="{{--route('project.show', $prj->id) --}}">{{ $prj -> name }}</a></td>
							<td>{{ $prj -> description }}</td>
							<td>{{ $prj -> created_at }}</td>
							<td><a data-link="{{ route ('edit', $prj->id) }}" class="btn btn-info ajaxbtn btn-block"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit</a>
								<form rule="form" method="post" action="{{ route('project.destroy', $prj->id )}}" class="form-horizontal">
									{{ method_field("DELETE") }}
									{{ csrf_field() }}
									<button type="submit" class="btn btn-danger btn-block mt-1"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete</button>
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