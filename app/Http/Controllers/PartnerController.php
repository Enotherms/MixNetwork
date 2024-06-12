<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::all();
        return view('partnersEdit.index', compact('partners'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'required|image|max:2048',
        ]);

        $logoContent = base64_encode(file_get_contents($request->file('logo')));

        Partner::create([
            'name' => $request->name,
            'logo' => $logoContent,
        ]);

        return redirect()->route('partnersEdit.index')->with('success', 'Partner added successfully.');
    }

    public function update(Request $request, Partner $partner)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|max:2048',
        ]);

        $data = ['name' => $request->name];

        if ($request->hasFile('logo')) {
            $logoContent = base64_encode(file_get_contents($request->file('logo')));
            $data['logo'] = $logoContent;
        }

        $partner->update($data);

        return redirect()->route('partnersEdit.index')->with('success', 'Partner updated successfully.');
    }

    public function destroy(Partner $partner)
    {
        $partner->delete();
        return redirect()->route('partnersEdit.index')->with('success', 'Partner deleted successfully.');
    }
}
