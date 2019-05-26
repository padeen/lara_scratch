<?php

namespace App\Http\Controllers;

use \App\Project;

use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index() {

        $projects = Project::all();
        
        return view('projects.index', ['projects' => $projects]);
    }

    public function create() {

        return view('projects.create');
    }

    public function show() {

    }

    public function edit($id) {
        
        $project = Project::findOrFail($id);
        return view('projects.edit', compact('project'));

    }

    public function update($id) {

        $project = Project::find($id);
        $project->title = request('title');
        $project->description = request('description');
        $project->save();
        
        return redirect('/projects');
    }

    public function destroy($id) {

        Project::find($id)->delete();

        return redirect('/projects');
    }

    public function store() {

        $project = new Project();
        $project->title = request('title');
        $project->description = request('description');
        $project->save();

        return redirect('/projects');
    }
}
