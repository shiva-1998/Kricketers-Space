<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ground;

class GroundController extends Controller
{
    public function index()
    {
        $grounds = Ground::latest()->paginate(8);
        // return $grounds;
        return view('back.grounds.index', compact('grounds'));
    }

    public function create()
    {
        return view('back.grounds.create');
    }
    // STORE FUNCTION
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'city' => 'required',
            'ground_type' => 'required',
            'pitch_type' => 'required',
        ]);

        Ground::create([
            'name' => $request->name,
            'location' => $request->location,
            'city' => $request->city,
            'state' => $request->state,
            'country' => $request->country ?? 'India',
            'pincode' => $request->pincode,
            'capacity' => $request->capacity,
            'ground_type' => $request->ground_type,
            'pitch_type' => $request->pitch_type,
            'boundary_size' => $request->boundary_size,
            'has_floodlights' => $request->has_floodlights ?? 0,
            'has_dressing_room' => $request->has_dressing_room ?? 1,
            'has_parking' => $request->has_parking ?? 0,
            'match_type_supported' => is_array($request->match_type_supported)
                ? implode(',', $request->match_type_supported)
                : $request->match_type_supported,
            'booking_price' => $request->booking_price,
            'status' => $request->status ?? 'available',
            'description' => $request->description,
        ]);

        return redirect()->route('grounds.index')->with('success', 'Ground created successfully');
    }


    public function edit($id)
    {
        $ground = Ground::findOrFail($id);

        return view('back.grounds.edit', compact('ground'));
    }
    // UPDATE FUNCTION
    public function update(Request $request, $id)
    {
        $ground = Ground::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'city' => 'required',
        ]);

        $ground->update([
            'name' => $request->name,
            'location' => $request->location,
            'city' => $request->city,
            'state' => $request->state,
            'country' => $request->country ?? 'India',
            'pincode' => $request->pincode,
            'capacity' => $request->capacity,
            'ground_type' => $request->ground_type,
            'pitch_type' => $request->pitch_type,
            'boundary_size' => $request->boundary_size,
            'has_floodlights' => $request->has_floodlights ?? 0,
            'has_dressing_room' => $request->has_dressing_room ?? 1,
            'has_parking' => $request->has_parking ?? 0,
            'match_type_supported' => is_array($request->match_type_supported)
                ? implode(',', $request->match_type_supported)
                : $request->match_type_supported,
            'booking_price' => $request->booking_price,
            'status' => $request->status,
            'description' => $request->description,
        ]);

        return redirect()->route('grounds.index')->with('success', 'Ground updated successfully');
    }


    public function destroy($id)
    {
        $ground = Ground::findOrFail($id);
        $ground->delete();

        return redirect()->route('grounds.index')
            ->with('success', 'Ground deleted successfully');
    }
}
