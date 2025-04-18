<?php

namespace App\Http\Controllers;
use App\Models\Client;

use Illuminate\Http\Request;
use App\Models\Project;
class ProjectController extends Controller
{
    public function index(){
        $projects = Project::all(); //Получить все проекты
        return view('projects.index', compact('projects')); // Проекты в представление передаем

    }

    

    public function create(){
        $clients= Client::all();
        return view('projects.create', compact('clients')); // Форма для создания проекта
        
    }

    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'status' => 'required|string',
    ]);

    $project = new Project();
    $project->title = $request->title;
    $project->status = $request->status;
    $project->client_id = $request->client_id;
    $project->save();

    return redirect()->route('projects.index'); // После добавления проекта перенаправляем на список
}
public function edit(Project $project){
    
    $clients = Client::all();
    return view ('projects.edit', compact ('project', 'clients'));
}

public function update(Request $request, Project $project)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'status' => 'required|string|max:255',
        'client_id' => 'required|exists:clients,id',
    ]);

    $project->update($validated);

    return redirect()->route('projects.index')->with('success', 'Project updated successfully!');
}


public function destroy(Project $project){

    $project->delete();
    return redirect()->route('projects.index');
}

public function show($id)
{
    $project = Project::find($id);

    if (!$project) {
        return redirect()->route('projects.index')->with('error', 'Project not found.');
    }

    $invoices = $project->invoices;

    return view('projects.show', compact('project', 'invoices'));
}



}
