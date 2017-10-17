<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Venue;

class EventVenueController extends Controller
{
    protected $event;
    protected $venue;
    protected $result;

    public function __construct()
    {
        $this->event = new Event();
        $this->venue = new Venue();
    }

    public function eventsForVenue(Request $request, $id)
    {
        $venueObject = $this->venue->findOrFail($id);
        $events = array();
        foreach ($venueObject->events as $event)
        {
            $events[] = $event;
        }
        $this->result = $events;
        return response()->json([
            'status' => 200,
            'events' => $this->result
        ]);
    }

    public function venuesForEvent(Request $request, $id)
    {
        $eventObject = $this->event->findOrFail($id);
        $venues = array();
        foreach ($eventObject->venues as $venue)
        {
            $venues[] = $venue;
        }

        $this->result = $venues;
        return response()->json([
           'status' => 200,
           'venues' => $this->result
        ]);
    }

    public function getEventsVenues(Request $request)
    {
        $venues = $this->venue->get();
        $events = $this->event->get();

        $this->result = array_merge($venues->toArray(), $events->toArray());

        return response()->json([
           'status' => 200,
           'result' => $this->result
        ]);
    }

    public function calendarDetails(Request $request)
    {
        $venuesList = $this->venue->get(['id', 'name']);

        $result = array();
        foreach ($venuesList as $venue)
        {
            foreach ($venue->events as $event)
            {
                $result['event_id'] = $event->id;
                $result['venue_id'] = $venue->id;
                $result['title'] = $event->name;

                $result['date_YY'] = $this->parseString($event->pivot->conduct_date, "-")[0];
                $result['date_MM'] = $this->parseString($event->pivot->conduct_date, "-")[1];
                $result['date_DD'] = $this->parseString($event->pivot->conduct_date, "-")[2];

                $result['start_time_HH'] = $this->parseString($event->pivot->start_time, ":")[0];
                $result['start_time_MM'] = $this->parseString($event->pivot->start_time, ":")[1];
                $result['start_time_SS'] = $this->parseString($event->pivot->start_time, ":")[2];

                $result['end_time_HH'] = $this->parseString($event->pivot->end_time, ":")[0];
                $result['end_time_MM'] = $this->parseString($event->pivot->end_time, ":")[1];
                $result['end_time_SS'] = $this->parseString($event->pivot->end_time, ":")[2];

                $this->result[] = $result;
            }
        }
        return response()->json([
            'status' => 200,
            'events' => $this->result
        ]);
    }

    private function parseString($input, $delimiter)
    {
        $result = explode($delimiter, $input);
        return $result;
    }
}
