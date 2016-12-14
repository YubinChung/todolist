<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Task;

class TaskController extends Controller
{
    public function index()
    {
        $user = \Auth::user();
		$data['projects'] = Project::where('id')->get();
		$data['tasks'] = Task::where('project_id', $user->id)->get();
		
		return view('project.task.index', $data);
    }
	public function create()
    {
		$user = \Auth::user();
		$data['projects'] = Project::where('user_id', $user->id)->get();
        return view('project.task.create', $data);
    }
	public function store(Request $request)
    {
        //dd($request->all());
		
		$user = \Auth::user();
		$value = $request->pname;
		// $data['projects'] = Project::where('user_id', $user->id)->get();
		$task = new Task();
		$project = new Project();
		
		$task->name = $request->tname;
		$task->description = $request-> description;
		$task->project_id = $value;
		//$task->user()->associate($user->id);
		$task->save();
		$project->save();

		return redirect('/task', $data)->with('message', $task->tname." has been created");
    }
}
