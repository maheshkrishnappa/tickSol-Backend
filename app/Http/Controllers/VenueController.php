<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Venue;

class VenueController extends Controller
{

    public function index()
    {
        $venues = Venue::all(array('id', 'name', 'address', 'capacity'));

        foreach ($venues as $venue) {
            $result[] = array('name' => $venue->name, 'address' => $venue->address, 'capacity' => $venue->capacity);
        }

        return response()->json($venues);
    }

    public function show($id)
    {
        $venue = new Venue();
        $result = $venue->findOrFail($id, array('id', 'name', 'address', 'capacity'));

        return response()->json($result);
    }

    public function venuePost(Request $data)
    {
        dd("Venue Name: ".$data['venuename'].", Address: ".$data['venueaddress'].", Capacity: ".$data['capacity']);
    }

    public function store(Request $data)
    {
        $venue = new Venue();
        $newVenue = $venue->create($data->all());
        //$venue->name = $data->name;
        //$venue->address = $data->address;
        //$venue->capacity = $data->capacity;
        //$venue->save();

        return 201;
    }

    public function update(Request $data, $id)
    {
        $venueModel = new Venue();
        $venue = $venueModel->find($id);
        if($venue == null)
        {
            return 404;
        }

        else{
            $venue->update($data->all());
            return $venue;
        }
    }

    public function delete($id)
    {
        $venueModel = new Venue();
        $venue = $venueModel->findOrFail($id);
        $venue->delete();

        return 204;
    }
}
