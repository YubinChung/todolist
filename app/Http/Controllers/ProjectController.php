<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = \Auth::user();
		$data['projects'] = Project::where('user_id', $user->id)->get();
		
		return view('project.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('project.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
		
		$user = \Auth::user();
		
		$project = new Project();
		$project->name = $request->name;
		$project->description = $request->description;
		$project->user()->associate($user->id);
		$project->save();
		
		return redirect('/project')->with('message', $project->name." has been created");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['project'] = Project::findOrFail($id);
		
		if($data['project'] == null) abort(404, $id." Model has not found");
		
		return view('project.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // 1. data조회
		$data['project'] = Project::findOrFail($id);
		// 2. 화면로딩+data
		return view('project.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);
		
//		
//		$project->update([
//			'name' => $request->name,
//			'description' => $request->description
//		]);
		
		$project->name = $request->name;
		$project->description = $request->description;
		$project->save();
		
		return redirect('/project')->with('message', $project->name." has been changed");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::findOrFail($id);
		
		// 테이블 간 연결되어 있어서 모두 지워주도록
		foreach($project->tasks as $task){
			$task->delete();
		}
		$project->delete();
		
		return redirect('/project')->with('message', $project->name." has been deleted");
    }
}
