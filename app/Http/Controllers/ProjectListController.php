<?php

namespace App\Http\Controllers;

use App\Models\ProjectList;
use App\Models\Tag;
use Illuminate\Http\Request;

class ProjectListController extends Controller
{
    public function index()
    {
        $projects = ProjectList::with('tags')->get();
        $tags = Tag::all();
        return view('projectEdit.index', compact('projects', 'tags'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'tags' => 'array',
            'tags.*' => 'exists:tags,id',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['name', 'description', 'date']);
        if ($request->hasFile('image')) {
            $data['image'] = base64_encode(file_get_contents($request->file('image')));
        }

        $project = ProjectList::create($data);
        $project->tags()->sync($request->tags);

        return redirect()->route('projects.index')->with('success', 'Project created successfully.');
    }

    public function edit($id)
    {
        $project = ProjectList::with('tags')->findOrFail($id);
        $tags = Tag::all();
        $projects = ProjectList::with('tags')->get();
        return view('projectEdit.index', compact('project', 'tags', 'projects'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'tags' => 'array',
            'tags.*' => 'exists:tags,id',
            'image' => 'nullable|image|max:2048',
        ]);

        $project = ProjectList::findOrFail($id);

        $data = $request->only(['name', 'description', 'date']);
        if ($request->hasFile('image')) {
            $data['image'] = base64_encode(file_get_contents($request->file('image')));
        }

        $project->update($data);
        $project->tags()->sync($request->tags);

        return redirect()->route('projects.index')->with('success', 'Project updated successfully.');
    }

    public function destroy($id)
    {
        $project = ProjectList::findOrFail($id);
        $project->delete();

        return redirect()->route('projects.index')->with('success', 'Project deleted successfully');
    }

    public function show($id)
{
    $project = ProjectList::with('portfolios')->findOrFail($id);
    $portfolioCount = $project->portfolios->count();
    return view('projects.show', compact('project', 'portfolioCount'));
}

}
