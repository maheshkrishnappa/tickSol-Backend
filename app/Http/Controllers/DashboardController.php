<?php

namespace App\Http\Controllers;

use App\Plugin;
use Illuminate\Http\Request;
use App\Venue;
use App\Event;

class DashboardController extends Controller
{
    protected $venue;
    protected $event;
    protected $result;

    public function __construct()
    {
        $this->venue = new Venue();
        $this->event = new Event();
    }

    public function index(Request $request)
    {
        $plugins = new Plugin();
        $this->result['venue_count'] = $this->venue->count();
        $this->result['event_count'] = $this->event->count();
        $this->result['pending_venues'] = $this->venue->where('pending', '=', 1)->get()->count();
        $this->result['plugins_enabled'] = $plugins->where('is_enabled', '=', 1)->get()->count();

        $venueEvents = array();
        $venues = $this->venue->get();
        foreach ($venues as $venue)
        {
            $venueEvents[] = ['venue_id' => $venue->id,
                'venue_name' => $venue->name,
                'events' => $venue->events->count()
                ];
        }

        $this->result['venue_events'] = $venueEvents;

        return response()->json([
            'status' => 200,
            'metrics' => $this->result
        ]);
    }

    public function test()
    {
        $events = $this->event->get();
        $pendingEvents = array();
        foreach ($events as $event)
        {
            if(strtotime($event->start_date) > time())
            {
                if(sizeof($pendingEvents) < 6)
                {
                    $pendingEvents[] = $event;
                }
                else
                {
                    break;
                }
            }
        }

        $this->result = $pendingEvents;

        return response()->json([
            'status' => 200,
            'events' => $this->result
        ]);
    }
}
