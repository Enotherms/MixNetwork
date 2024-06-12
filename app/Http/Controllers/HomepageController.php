<?php

namespace App\Http\Controllers;

use App\Models\CarouselImage;
use App\Models\ProjectList;
use App\Models\Partner;
use App\Models\AboutUs;
use App\Models\Service;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
        $images = CarouselImage::where('is_active', true)->get();
        $projects = ProjectList::all();
        $partners = Partner::all();

        // Check if AboutUs exists, if not, create a default one
        $aboutUs = AboutUs::firstOrCreate([], ['content' => 'Default About Us content']);
        $services = Service::all();

        return view('home', compact('images', 'projects', 'partners', 'aboutUs', 'services'));
    }

    public function edit()
    {
        $aboutUs = AboutUs::first();
        $services = Service::all();

        return view('homepageEdit.index', compact('aboutUs', 'services'));
    }

    public function updateAboutUs(Request $request)
    {
        $aboutUs = AboutUs::firstOrCreate([]);
        $aboutUs->update($request->validate(['content' => 'required|string']));

        return redirect()->route('homepage.edit')->with('success', 'About Us updated successfully.');
    }

    public function updateServices(Request $request)
    {
        foreach ($request->services as $id => $serviceData) {
            if ($id === 'new') {
                Service::create($serviceData);
            } else {
                $service = Service::findOrFail($id);
                $service->update($serviceData);
            }
        }

        return redirect()->route('homepage.edit')->with('success', 'Services updated successfully.');
    }

    public function destroyService($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

        return redirect()->route('homepage.edit')->with('success', 'Service deleted successfully.');
    }
}
