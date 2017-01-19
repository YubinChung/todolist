<form role="form" action="{{ route('project.update', $project->id) }}" method="post" class="form-horizontal">
	{{method_field("PUT")}}
	{{csrf_field()}}
	<div class="form-group">
		<label for="Project Name">Project Name</label>
		<div><input type="text" class="form-control" id="name" name="name" value="{{$project->name}}"></div>
	</div>
	<div class="form-group">
		<label for="Project Description">Project Description</label>
		<div>
			<textarea name="description" id="description" class="form-control">{{ $project->description}}</textarea>
		</div>
	</div>
	<div class="form-group">
		<label for="Created">Created</label>
		<div><input type="text" class="form-control" id="created_at" name="created_at" value="{{$project->created_at}}"></div>
	</div>
	<div class="form-group">

		<div><button type="submit" class="btn btn-primary">Update</button></div>
	</div>
</form>