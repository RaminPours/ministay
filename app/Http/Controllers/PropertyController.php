<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;

class PropertyController extends Controller
{
    public function index()
    {
        $properties = Property::all();

        return view('properties.index', compact('properties'));
    }

    public function show(Property $property)

    {
        return view('properties.show', compact('property'));
    }


}
