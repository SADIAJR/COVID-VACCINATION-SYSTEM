<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Vaccine;
use Illuminate\Http\Request;

class VaccineController extends Controller
{
    public function index()
    {
        $vaccines = Vaccine::all();
        return view('admin.vaccines.index', ['vaccines' => $vaccines]);
    }

    public function create()
    {
        return view('admin.vaccines.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'manufacturer' => 'required|string|max:255',
            'doses_required' => 'required|integer|min:1',
            'stock' => 'required|integer|min:0',
        ]);

        Vaccine::create($validated);

        return redirect()->route('admin.vaccines.index')->with('success', 'Vaccine added successfully.');
    }

    public function edit(Vaccine $vaccine)
    {
        return view('admin.vaccines.edit', ['vaccine' => $vaccine]);
    }

    public function update(Request $request, Vaccine $vaccine)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'manufacturer' => 'required|string|max:255',
            'doses_required' => 'required|integer|min:1',
            'stock' => 'required|integer|min:0',
        ]);

        $vaccine->update($validated);

        return redirect()->route('admin.vaccines.index')->with('success', 'Vaccine updated successfully.');
    }

    public function destroy(Vaccine $vaccine)
    {
        $vaccine->delete();
        return redirect()->route('admin.vaccines.index')->with('success', 'Vaccine deleted successfully.');
    }
}