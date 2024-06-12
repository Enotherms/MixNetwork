<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CarouselImage;

class CarouselImageController extends Controller
{
    public function create()
    {
        return view('carousel.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    // Reading the image file
    $imageFile = $request->file('image');
    $imageData = file_get_contents($imageFile);
    $base64Encoded = base64_encode($imageData);  // Encode the image data

    CarouselImage::create([
        'base64_image' => $base64Encoded  // Store the base64 string in the database
    ]);

    return back()->with('success', 'You have successfully uploaded an image.');
}


    public function index()
    {
        $images = CarouselImage::all();
        return view('carouselEdit.index', compact('images'));
    }

    public function destroy($id)
    {
        $image = CarouselImage::findOrFail($id);
        $image->delete();

        return back()->with('success', 'Image deleted successfully.');
    }

    public function toggleActive($id)
    {
        $image = CarouselImage::findOrFail($id);
        $image->is_active = !$image->is_active;
        $image->save();

        return back()->with('success', 'Image visibility toggled.');
    }
}
