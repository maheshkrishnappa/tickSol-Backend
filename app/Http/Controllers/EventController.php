<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;

class EventController extends Controller
{
    protected $event;
    protected $result;

    public function __construct()
    {
        $this->event = new Event();
    }

    public function index()
    {
        $events = $this->event->get();
        foreach ($events as $event)
        {
            $this->result[] = $this->getVenuePivotData($event);
        }

        return response()->json([
            'status' => 200,
            'events' => $events
        ]);
    }

    private function getVenuePivotData($event)
    {
        $eventDetails = array();
        $eventDetails[0] = $event;
        $eventDetails[1] = $event->venues;
        return $eventDetails;
    }

    public function store(Request $request)
    {
        $event = $this->event->create($request->all());

        $event->label = $request['name'];
        $event->save();

        $venueId = $request['venue_id'];
        $conductDate = $request['conduct_date'];
        $startTime = $request['start_time'];
        $endTime = $request['end_time'];

        $event->venues()->attach($venueId,
            ['conduct_date' => $conductDate,
             'start_time' => $startTime,
             'end_time' => $endTime
            ]);

        return response()->json([
            'status' => 201
        ]);
    }

    public function update(Request $request, $id)
    {
        $event = $this->event->findOrFail($id);
        $venueId = 0;

        foreach ($event->venues as $venue)
        {
            $venueId = $venue->id;
            break;
        }
        $newVenueId = $request['venue_id'];
        $conductDate = $request['conduct_date'];
        $startTime = $request['start_time'];
        $endTime = $request['end_time'];

        $event->venues()->updateExistingPivot($venueId,
            [   'venue_id' => $newVenueId,
                'conduct_date' => $conductDate,
                'start_time' => $startTime,
                'end_time' => $endTime
            ]);

        $event->update($request->all());

        $event->label = $request['name'];
        $event->save();

        return response()->json([
            'status' => 201
        ]);
    }

    public function delete(Request $request, $id)
    {
        $eventEntry = $this->event->findOrFail($id);
        $eventEntry->delete($request->all());
        return response()->json([
            'status' => 204
        ]);
    }

    public function retrieve(Request $request, $id)
    {
        $event = $this->event->findOrFail($id);
        $this->result = null;
        $this->result = $event->venues;
        return response()->json([
            'status' => 200,
            'event' => $event
        ]);
    }
}
