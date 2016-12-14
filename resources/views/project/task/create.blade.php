@extends('layouts.app')

@section('title')
Task Create
@endsection

@section('content')
<div class="container">
	<div class="col-md-8">
		<form action="{{route('task.store')}}" class="form-horizontal" role="form" method="post">
			{{csrf_field()}}
			<div class="form-group">
				<label for="Task project">project Name</label>
				<div>
					<select class="form-control" name="pname">
					<option disabled selected>-- select --</option>
						@foreach($projects as $select_project)
						<option value="{{ $select_project -> id }}">{{ $select_project -> name }}</option>
						@endforeach
					</select>
				</div>	
			</div>
			<div class="form-group">
				<label for="Task Name">Task Name</label>
				<div><input type="text" class="form-control" id="tname" name="tname" value="{{old('created_at')}}"></div>
			</div>
			<div class="form-group">
				<label for="Task Description">Task Description</label>
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
				<button type="submit" href="{{route('task.store')}}" type="submit" class="btn btn-primary">Create</button>

				</div>
			</div>
		</form>
	</div>
</div>

@endsection
