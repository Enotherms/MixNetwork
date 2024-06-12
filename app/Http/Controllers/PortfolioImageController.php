<?php

namespace App\Http\Controllers;

use App\Models\PortfolioImage;
use Illuminate\Http\Request;

class PortfolioImageController extends Controller
{
    public function destroy($id)
    {
        $image = PortfolioImage::findOrFail($id);
        $image->delete();

        return redirect()->back()->with('success', 'Image deleted successfully.');
    }
}
