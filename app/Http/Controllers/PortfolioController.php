<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Models\PortfolioImage;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Models\ProjectList;

class PortfolioController extends Controller
{
    public function index(Request $request)
    {
        $portfolios = Portfolio::with('tags', 'images', 'project')->get();
        $tags = Tag::all();
        $projects = ProjectList::all();
        $portfolio = null;

        if ($request->has('id')) {
            $portfolio = Portfolio::with('tags', 'images')->find($request->id);
        }

        return view('portfolioEdit.index', compact('portfolios', 'tags', 'projects', 'portfolio'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'tags' => 'required|array',
            'tags.*' => 'exists:tags,id',
            'images.*' => 'image|max:2048', // Validate each image
            'project_id' => 'nullable|exists:project_list,id',
        ]);

        $portfolio = Portfolio::create([
            'name' => $request->name,
            'description' => $request->description,
            'project_id' => $request->project_id,
        ]);

        $portfolio->tags()->attach($request->tags);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageContent = base64_encode(file_get_contents($image));
                PortfolioImage::create([
                    'portfolio_id' => $portfolio->id,
                    'image' => $imageContent,
                ]);
            }
        }

        return redirect()->route('portfolios.index')->with('success', 'Portfolio created successfully.');
    }

    public function update(Request $request, Portfolio $portfolio)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'tags' => 'required|array',
        'tags.*' => 'exists:tags,id',
        'images.*' => 'image|max:2048', // Validate each image
        'existing_images.*' => 'image|max:2048', // Validate each existing image
        'project_id' => 'nullable|exists:projects,id',
    ]);

    $portfolio->update([
        'name' => $request->name,
        'description' => $request->description,
        'project_id' => $request->project_id,
    ]);

    $portfolio->tags()->sync($request->tags);

    if ($request->hasFile('existing_images')) {
        foreach ($request->file('existing_images') as $imageId => $image) {
            $imageContent = base64_encode(file_get_contents($image));
            $portfolioImage = PortfolioImage::findOrFail($imageId);
            $portfolioImage->update([
                'image' => $imageContent,
            ]);
        }
    }

    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
            $imageContent = base64_encode(file_get_contents($image));
            PortfolioImage::create([
                'portfolio_id' => $portfolio->id,
                'image' => $imageContent,
            ]);
        }
    }

    return redirect()->route('portfolios.index')->with('success', 'Portfolio updated successfully.');
}


    public function destroy(Portfolio $portfolio)
    {
        $portfolio->delete();
        return redirect()->route('portfolios.index')->with('success', 'Portfolio deleted successfully.');
    }

    public function destroyImage($id)
    {
        $image = PortfolioImage::findOrFail($id);
        $image->delete();

        return redirect()->route('portfolios.index')->with('success', 'Image deleted successfully.');
    }

    public function public(Request $request)
{
    $query = Portfolio::query();

    if ($request->filled('search')) {
        $query->where('name', 'like', '%' . $request->search . '%');
    }

    if ($request->filled('tags')) {
        $tags = $request->input('tags');
        $query->whereHas('tags', function ($q) use ($tags) {
            $q->whereIn('tags.id', $tags);
        });
    }

    $portfolios = $query->with('images', 'tags')->paginate(12);
    $tags = Tag::all();

    return view('portfolio', compact('portfolios', 'tags'));
}


    public function show($id)
    {
        $portfolio = Portfolio::with('images', 'tags')->findOrFail($id);
        $primaryImage = $portfolio->images->first(); // Get the first image
        return view('portfolio.content', compact('portfolio', 'primaryImage'));
    }

    public function manage(Request $request)
    {
        $portfolio = null;
        if ($request->has('id')) {
            $portfolio = Portfolio::with('images', 'tags')->find($request->id);
        }

        $portfolios = Portfolio::with('images', 'tags')->get();
        $tags = Tag::all(); // Fetch tags here

        return view('portfolioEdit.index', compact('portfolio', 'portfolios', 'tags'));
    }

    public function filter(Request $request)
{
    $query = Portfolio::query();

    if ($request->filled('search')) {
        $query->where('name', 'like', '%' . $request->search . '%');
    }

    if ($request->filled('tags')) {
        $tags = $request->input('tags');
        $query->whereHas('tags', function ($q) use ($tags) {
            $q->whereIn('tags.id', $tags);
        });
    }

    $portfolios = $query->with('images', 'tags')->paginate(12);

    return view('portfolio.list', compact('portfolios'))->render();
}

}
