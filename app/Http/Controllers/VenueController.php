<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Venue;

class VenueController extends Controller
{
    protected $venue;
    protected $result;

    public function __construct()
    {
        $this->venue = new Venue();
    }

    public function index()
    {
        $this->result = $this->venue->get();

        return response()->json([
            'status' => 200,
            'venues' => $this->result]);
    }

    public function store(Request $request)
    {
        $venue = $this->venue->create($request->all());
        $venue->label = $request['name'];
        $venue->save();

        return response()->json([
            'status' => 201
        ]);
    }

    public function update(Request $request, $id)
    {
        $venueEntry = $this->venue->findOrFail($id);
        $venueEntry->update($request->all());

        $venueEntry->label = $request['name'];
        $venueEntry->save();

        return response()->json([
            'status' => 201
        ]);
    }

    public function delete(Request $request, $id)
    {
        $venueEntry = $this->venue->findOrFail($id);
        $venueEntry->delete();
        return response()->json([
            'status' => 204
        ]);
    }

    public function retrieve(Request $request, $id)
    {
        $this->result = $this->venue->findOrFail($id);
        return response()->json([
            'status' => 200,
            'venue' => $this->result
        ]);
    }
}
