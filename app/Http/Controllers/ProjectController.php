<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = auth()->user()->projects;
        return view('project.index', compact('projects'));
    }

    public function store()
    {


        $attributes = \request()->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        //$attributes['user_id'] = auth()->id();

       $project =  auth()->user()->projects()->create($attributes);

        //Project::query()->create($attributes);

        return redirect($project->path());
    }

    public function show(Project $project)
    {
        $this->authorize('view',$project);
        /*if(auth()->user()->isNot($project->user))
            ort(403 );*/

        return view('project.show', compact('project'));


    }

    public function create()
    {
        return view('project.create');
    }
}
