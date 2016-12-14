@extends('layouts.app')

@section('title')
Project Edit
@endsection

@section('content')
<div class="container">
	<div class="col-md-8">
		<div class="form-group">
			<label for="Project Name">Project Name</label>
			<div><input type="text" class="form-control" id="name" name="name" value="{{$project->name}}" readonly="true"></div>
		</div>
		<div class="form-group">
			<label for="Project Description">Project Description</label>
			<div>
				<textarea name="dedscription" id="description" class="form-control" readonly="true">{{ $project->description}}</textarea>
			</div>
		</div>
		<div class="form-group">
			<label for="Created">Created</label>
			<div><input type="text" class="form-control" id="created_at" name="created_at" value="{{$project->created_at}}" readonly="true"></div>
		</div>
		<div class="form-group">
			<label for="Updated">Updated</label>
			<div><input type="text" class="form-control" id="updated_at" name="updated_at" value="{{$project->updated_at}}" readonly="true"></div>
		</div>
		<div class="form-group">

			<div>
			<a href="{{route('project.index')}}" type="submit" class="btn btn-primary">Project List</a>
			<a href="{{route('task.index')}}" type="submit" class="btn btn-primary pull-right">Task List</a>
			</div>
		</div>
	</div>
</div>

@endsection
