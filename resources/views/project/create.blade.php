<div class="col-sm-9">
<form action="{{--route('project.store')--}}" class="form-horizontal" role="form" method="post">
	{{csrf_field()}}
	<div class="form-group">
		<label for="Project Name">Project Name</label>
		<div><input type="text" class="form-control" id="name" name="name" value="{{old('created_at')}}"></div>
	</div>
	<div class="form-group">
		<label for="Project Description">Project Description</label>
		<div>
			<textarea name="description" id="description" class="form-control">{{old('description')}}</textarea>
		</div>
	</div>
	<div class="form-group">
		<label for="Created">Created</label>
		<div><input type="text" class="form-control" id="created_at" name="created_at" value="{{old('created_at')}}"></div>
	</div>
	<div class="form-group">
		<label for="Updated">Updated</label>
		<div><input type="text" class="form-control" id="updated_at" name="updated_at" value="{{old('updated_at')}}"></div>
	</div>
	<div class="form-group">

		<div>
		<button type="submit" href="{{ route('project.store') }}" type="submit" class="btn btn-primary btnajax">Create</button>

		</div>
	</div>
</form>
</div>