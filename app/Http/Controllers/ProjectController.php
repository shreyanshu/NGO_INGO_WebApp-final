<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class ProjectController extends Controller
{
    public function index()
 	{
 		$projects = Project::get();
 		return view('projects', compact('projects'));
 	}  

 	public function destroy(Project $project)
 	{
 		$project->donor()->detach();
 		$project->forceDelete();
 		$projects = Project::get();
 		return view('projects', compact('projects'));
 	}

 	public function store(Request $request)
 	{
 		$projects = new Project;
 		$projects->name = $request->name;
 		$projects->duration = $request->duration;
 		$projects->description = $request->description;
 		$projects->budget = $request->budget;
 		$projects->tags = "";
		$projects->sponsor_id = 1;
		$projects->organization_id=2;

		$projects->save();
		return redirect('/projects'); 
 	}
}
