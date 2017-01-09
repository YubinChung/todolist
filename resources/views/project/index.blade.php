
<div class="col-sm-9">
<div class="panel panel-default">
	<div class="panel-heading"><h2>My Project</h2></div>
	

	@if(Session::has('message'))
		<div class="alert alert-info">{{ Session::get('message') }}</div>
	@endif

	<div class="panel-body">
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

				@foreach($project as $prj)
				<tr>
					<td>{{$no++}}</td>
					<td><a href="{{--route('project.show', $prj->id) --}}">{{ $prj -> name }}</a></td>
					<td>{{ $prj -> description }}</td>
					<td>{{ $prj -> created_at }}</td>
					<td><a data-link="{{--route('pEdit') --}}" class="btn btn-info">Edit</a><br>
						<form rule="form" method="post" action="{{-- route('project.destroy', $prj->id )--}}" class="form-horizontal">
							{{ method_field("DELETE") }}
							{{csrf_field()}}
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
<!-- Scripts -->
    <script src="/js/app.js"></script>


