<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Task;
use App\User;

class TaskController extends Controller
{
    public function index()
    {
        $user = \Auth::user();
		$data['projects'] = Project::where('user_id', $user->id)->get();
		$data['tasks'] = Task::where('project_id', $user->id)->get();
		
		return view('project.task.index', $data);
    }
	public function create()
    {
		$user = \Auth::user();
		$data['projects'] = Project::where('user_id', $user->id)->get();
		$data['tasks'] = Task::where('project_id', $user->id)->get();
		
        return view('project.task.create', $data);
    }
	
	public function store(Request $request)
    {
        //dd($request->all());
		
		$user = \Auth::user();

		$task = new Task();
		$task->name = $request->tname;
		$task->description = $request-> description;
		$task->project_id = $user->id;
		$task->due_date = $request -> duedate_at;
		$task->save();

		return redirect('/task')->with('message', $task-> name." has been created");
    }
	
	public function show($id)
    {
        $data['task'] = Task::findOrFail($id);
		
		if($data['task'] == null) abort(404, $id." Model has not found");
		
		return view('project.task.show', $data);
    }
}
