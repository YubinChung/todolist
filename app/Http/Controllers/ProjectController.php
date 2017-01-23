<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Http\Libraries\AjaxResponse;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['user'] = \Auth::user();
        $data['project'] = Project::where('user_id', $data['user']->id)->get();

        return view('project.index', $data);
    }

   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['user'] = \Auth::user();
        $rsp = new AjaxResponse();
        $data['project'] = Project::where('user_id', $data['user']->id)->get();
        $data['html'] = \View::make('project.create')->with('project', $data['project'])->render();

        $rsp->success= 1;
        $rsp->data = $data;

        return $rsp->toArray();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data['user'] = \Auth::user();

        $project = new Project();
        $project->name = $request->name;
        $project->description = $request->description;
        $project->user()->associate( $data['user']->id);
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
        $data['user'] = \Auth::user();
        $rsp = new AjaxResponse();
        $data['project'] = Project::findOrFail($id);
        $data['html'] = \View::make('project.edit')->with('project', $data['project'])->render();

        $rsp->success= 1;
        $rsp->data = $data;

        return $rsp->toArray();

		// 2. 화면로딩+data
		// return view('project.edit', $data);
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
        $data['project'] = Project::findOrFail($id);
		
//		
//		$project->update([
//			'name' => $request->name,
//			'description' => $request->description
//		]);

        $data['project'] ->name = $request->name;
        $data['project'] ->description = $request->description;
        $data['project'] ->save();

        return redirect('/project')->with('message', $data['project']->name." has been updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data['project'] = Project::findOrFail($id);
		
		// 테이블 간 연결되어 있어서 모두 지워주도록
		foreach($data['project']->tasks as $data['task']){
            $data['task']->delete();
		}
        $data['project'] ->delete();
		
		return redirect('/project')->with('message', $data['project']->name." has been deleted");
    }
}
