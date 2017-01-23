<h2>Edit Post</h2>
<div>
	<form role="form" action="{{ route('project.update', $project->id) }}" method="post" class="form-horizontal">
		{{method_field("PUT")}}
		{{csrf_field()}}
		<div>
			<label for="Project Name">Project Name</label>
			<div><input type="text" class="form-control" id="name" name="name" value="{{$project->name}}"></div>
		</div>
		<div>
			<label for="Project Description">Project Description</label>
			<div>
				<textarea name="description" id="description" class="form-control">{{ $project->description}}</textarea>
			</div>
		</div>
		<div>
			<label for="Created">Created</label>
			<div><input type="text" class="form-control" id="created_at" name="created_at" value="{{$project->created_at}}"></div>
		</div>
		<div>
			<div>
				<button class="btn btn-primary" data-link="{{ route('store') }}" type="submit">Update</button>

		</div>
	</form>
</div>