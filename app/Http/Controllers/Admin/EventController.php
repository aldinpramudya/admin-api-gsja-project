<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::latest()->paginate(10);
        return view('event.index', compact('events'));
    }

    public function create()
    {
        return view('event.createEvent');
    }

    public function edit(Event $event)
    {
        return view('event.editEvent', compact('event'));
    }

    public function store(Request $request)
    {
        $request->validate([
            "name_event" => "required|string|max:255",
            "link_event" => "nullable|string",
            "description_event" => "required",
            "event_date" => "required|date",
            "event_place" => "required|string",
            "event_contact" => "required|string",
            "image_banner_event" => "nullable|image|mimes:jpg,jpeg,png,webp|max:2048",
        ]);

        if ($request->hasFile('image_banner_event')) {
            $imagePath = $request->file('image_banner_event')->store('events', 'public');
        } else {
            $imagePath = "default";
        }

        Event::create([
            "name_event" => $request->name_event,
            "slug_event" => Str::slug($request->name_event),
            "image_banner_event" => $imagePath,
            "link_event" => $request->link_event,
            "description_event" => $request->description_event,
            "event_date" => $request->event_date,
            "event_place" => $request->event_place,
            "event_contact" => $request->event_contact,
            "is_visible" => $request->is_visible,
        ]);

        return redirect()->route("admin.event.index")->with('success', 'Event berhasil dibuat');
    }

    public function update(Request $request, Event $event)
    {
        $request->validate([
            "name_event" => "required|string|max:255",
            "link_event" => "nullable|string",
            "description_event" => "required",
            "event_date" => "required|date",
            "event_place" => "required|string",
            "event_contact" => "required|string",
            "image_banner_event" => "nullable|image|mimes:jpg,jpeg,png,webp|max:2048",
        ]);

        $imagePath = $event->image_banner_event;

        if ($request->hasFile('image_banner_event')) {
            if ($event->image_banner_event && str_starts_with($event->image_banner_event, 'events/')) {
                Storage::disk('public')->delete($event->image_banner_event);
            }
            $imagePath = $request->file('image_banner_event')->store('events', 'public');
        }

        $event->update([
            "name_event" => $request->name_event,
            "slug_event" => Str::slug($request->name_event),
            "image_banner_event" => $imagePath,
            "link_event" => $request->link_event,
            "description_event" => $request->description_event,
            "event_date" => $request->event_date,
            "event_place" => $request->event_place,
            "event_contact" => $request->event_contact,
            'is_visible' => $request->has('is_visible'),
        ]);

        return redirect()->route('admin.event.index')->with('success', 'Event berhasil dibuat');
    }

    public function destroy(Event $event)
    {
        if ($event->image_banner_event) {
            Storage::disk('public')->delete($event->image_banner_event);
        }

        $event->delete();
        return redirect()->route('admin.event.index')->with('success', "Artikel Berhasil Dihapus");
    }
}
