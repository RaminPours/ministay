<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PropertyController extends Controller
{
    public function index(): View
    {
        return view('properties.index', [
            'properties' => Property::latest()->get(),
        ]);
    }

    public function show(Property $property): View
    {
        return view('properties.show', compact('property'));
    }

    public function create(): View
    {
        return view('properties.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $property = $request->user()->properties()->create($request->validate([
            'titel' => ['required', 'string', 'max:120'],
            'beschrijving' => ['required', 'string', 'max:2000'],
            'stad' => ['required', 'string', 'max:100'],
            'prijs_per_nacht' => ['required', 'numeric', 'min:1'],
            'aantal_slaapkamers' => ['required', 'integer', 'min:0'],
            'aantal_bedden' => ['required', 'integer', 'min:1'],
            'aantal_badkamers' => ['required', 'integer', 'min:0'],
        ]));

        return redirect()->route('properties.show', $property)
            ->with('status', 'Je woning is toegevoegd.');
    }
}
