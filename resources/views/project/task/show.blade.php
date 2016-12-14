@extends('layouts.app')

@section('title')
Task Edit
@endsection

@section('content')
<div class="container">
	<div class="col-md-8">
		<div class="form-group">
			<label for="Task Name">Task Name</label>
			<div><input type="text" class="form-control" id="tname" name="tname" value="{{ $task -> name }}" readonly="true"></div>
		</div>
		<div class="form-group">
			<label for="Task Description">Task Description</label>
			<div>
				<textarea name="dedscription" id="description" class="form-control" readonly="true">{{ $task->description}}</textarea>
			</div>
		</div>
		<div class="form-group">
			<label for="Duedate">Due date</label>
			<div><input type="text" class="form-control" id="duedate_at" name="duedate_at" value="{{ $task->due_date }}" readonly="true"></div>
		</div>
		<div class="form-group">
			<label for="Created">Created</label>
			<div><input type="text" class="form-control" id="created_at" name="created_at" value="{{$task->created_at}}" readonly="true"></div>
		</div>
		<div class="form-group">
			<label for="Updated">Updated</label>
			<div><input type="text" class="form-control" id="updated_at" name="updated_at" value="{{$task->updated_at}}" readonly="true"></div>
		</div>
		<div class="form-group">

			<div>
			<a href="{{route('project.index')}}" type="submit" class="btn btn-primary">Project List</a>
			<a href="{{route('task.index') }}" type="submit" class="btn btn-primary pull-right">Task List</a>
			</div>
		</div>
	</div>
</div>

@endsection
