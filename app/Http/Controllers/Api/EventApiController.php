<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventApiController extends Controller
{
    // Get All Events Data
    public function index()
    {
        $events = Event::where('is_visible', true)->latest('event_date')->paginate(10);

        // Transform image URL
        $events->getCollection()->transform(function ($event) {
            $event->image_banner_event = $event->image_banner_event
                ? url('storage/' . $event->image_banner_event)
                : null;
            return $event;
        });

        return response()->json([
            "message" => "Data Events Shown",
            "data" => $events,
        ], 200);
    }

    // Get Event Data By Slugs
    public function show($slug)
    {
        $event = Event::where('slug_event', $slug)
            ->where('is_visible', true)
            ->first();

        if (!$event) {
            return response()->json([
                "message" => "Event not found",
                "data" => null,
            ], 404);
        }

        // Transform image URL
        $event->image_banner_event = $event->image_banner_event
            ? url('storage/' . $event->image_banner_event)
            : null;

        return response()->json([
            "message" => "Event Detail Shown",
            "data" => $event,
        ], 200);
    }
}
