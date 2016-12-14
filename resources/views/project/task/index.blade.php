@extends('layouts.app')

@section('title')
Task List
@endsection

@section('content')
<div class="container">
	<div class="col-md-12">
		<p><a href="{{ route('task.create')}}" class="btn btn-success">Task Create</a></p>
		@if(Session::has('message'))
			<div class="alert alert-info">{{ Session::get('message') }}</div>
		@endif
		
		<table class="table table-striped">
			<thead>
				<tr>
					<td>Project Name</td>
					<td>Name</td>
					<td>Description</td>
					<td>Create</td>
				</tr>
			</thead>
			<tbody>
				
				@foreach($tasks as $task)
				
				<tr>
					<td>{{-- $project -> name --}}</td>
					<td><a href="{{ route('task.show', $task->id) }}">{{ $task-> name }}</a></td>
					<td>{{ $task -> description }}</td>
					<td>{{ $task -> due_date }}</td>
					<td><a href="{{--route('project.task.edit', $task->id)--}}" class="btn btn-info">Edit</a></td>
					<td>
						<form rule="form" method="post" action="{{-- route('project.task.destroy', $task->id )--}}" class="form-horizontal">
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

@endsection
