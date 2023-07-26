<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Type;
use App\Models\Technology;
use Illuminate\Http\Request;


class ProjectController extends Controller
{
    public function index()
    {

        $projects = Project::all();

        return view('home', compact('projects'));
    }

    public function show($id)
    {
        $projects = Project::findOrFail($id);
        return view("show", compact('projects'));
    }

    public function create()
    {
        $types = Type::all();
        $technologies = Technology::all();
        return view('create', compact('types', 'technologies'));
    }
    public function store(Request $request)
    {
        $data = $request->all();
        $project = Project::create($data);
        $project->technologies()->attach($request->input('technologies'));
        // Assegnare il tipo al progetto, supponendo che 'type_id' sia presente nei dati del form
        $project->type()->associate($request->input('type_id'));
        $project->save();
        return redirect()->route('project.show', $project->id);
    }
}
