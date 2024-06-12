<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CarouselImage;
use App\Models\ProjectList;

class DashboardController extends Controller
{
    /**
     * Display the dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Fetch all the necessary data for the dashboard
        $images = CarouselImage::all(); // Adjust to match your model setup
        $projects = ProjectList::all(); // Adjust to match your model setup

        // Pass the data to the view
        return view('dashboard', compact('images', 'projects'));
    }
}
