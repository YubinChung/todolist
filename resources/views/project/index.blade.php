@extends('layouts.app')

@section('content')
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h2>Project</h2>
				<a data-link="{{ route('c') }}" class="ajaxbtn btn btn btn-default navbar-btn">Create</a>
			</div>
			<div class="panel-body">
				<div id="screenPanel" class="t111">

				@if(Session::has('message'))
					<div class="alert alert-info">{{ Session::get('message') }}</div>
				@endif
				<table class="table table-striped">
					<thead>
					<tr>
						<td>No.</td>
						<td>Name</td>
						<td>Description</td>
						<td>Create</td>
						<td>Actions</td>
					</tr>
					</thead>
					<tbody>
                    <?php $no=1; ?>

					@foreach( $project as $prj)
						<tr>
							<td>{{ $no++ }}</td>
							<td><a href="{{--route('project.show', $prj->id) --}}">{{ $prj -> name }}</a></td>
							<td>{{ $prj -> description }}</td>
							<td>{{ $prj -> created_at }}</td>
							<td><a data-link="{{ route('edit') }}" class="btn btn-info">Edit</a><br>
								<form rule="form" method="post" action="{{-- route('project.destroy', $prj->id )--}}" class="form-horizontal">
									{{ method_field("DELETE") }}
									{{ csrf_field() }}
									<button type="submit" class="btn btn-danger">Delete</button>
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