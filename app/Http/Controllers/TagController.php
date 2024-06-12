<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        return view('tagsEdit.index', compact('tags'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Tag::create([
            'name' => $request->name,
        ]);

        return redirect()->route('tagsEdit.index')->with('success', 'Tag added successfully.');
    }

    public function edit(Tag $tag)
    {
        $tags = Tag::all();
        return view('tagsEdit.edit', compact('tag', 'tags'));
    }

    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $tag->update([
            'name' => $request->name,
        ]);

        return redirect()->route('tagsEdit.index')->with('success', 'Tag updated successfully.');
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('tagsEdit.index')->with('success', 'Tag deleted successfully.');
    }
}
