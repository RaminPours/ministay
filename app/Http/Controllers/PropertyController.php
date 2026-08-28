<?php

namespace App\Http\Controllers;

use App\Models\Property;
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
}
