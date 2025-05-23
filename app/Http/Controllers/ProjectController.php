<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index(){
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }
    public function create(){
        return view('projects.create');
    }
    public function store(Request $request){
        $validated = $request->validate([
            'title'=>'required|max:255',
            'description'=>'nullable',
            'project_url'=>'nullable | url',
            'image'=>'required | image | mimes:jpeg,png,jpg,gif|max:2048',
            'status'=>'required|in:draft,published'
        ]);

        if($request->hasFile('image')){
            $imagePath = $request->file('image')->store('projects','public');
            $validated['image'] = $imagePath;
        }

        Project::create($validated);
        return redirect()->route('projects.index')->with('success', 'Project created successfully');
    }

    public function show(Project $project){
        return view('projects.show', compact('project'));
    }

    public function edit(Project $project){
        return view('projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project){
        $validated = $request->validate([
            'title'=>'required|max:255',
            'description'=>'nullable',
            'project_url'=>'nullable | url',
            'image'=>'required | image | mimes:jpeg,png,jpg,gif|max:2048',
            'status'=>'required|in:draft,published'
        ]);

        if($request->hasFile('image')){
            $imagePath = $request->file('image')->store('projects','public');
            $validated['image'] = $imagePath;
        }

        $project->update($validated);
        return redirect()->route('projects.index')->with('success', 'Project updated successfully');
    }

    public function destroy(Project $project){
        $project->delete();
        return redirect()->route('projects.index')->with('success', 'Project deleted successfully');
    }
}
