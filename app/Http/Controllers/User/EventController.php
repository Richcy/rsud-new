<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventCategory;
use App\Models\RunningText;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    public function index(Request $request)
    {
        // return $request;
        $query = DB::table('events')
        ->join('event_categories', 'event_categories.id', 'events.event_category_id')
        ->select('events.*', 'event_categories.name as category');

        if ($request->filled('category') && $request->category != 'Semua Kategori') {
            $query->where('event_category_id', $request->input('category'));
        }

        if ($request->filled('title')) {
            $query->where('title', 'like', '%' . $request->input('title') . '%');
        }

        $categories = EventCategory::all(); // Assuming you have a Field model for the specializations
        $running_text = RunningText::first();
        $events = $query->orderBy('events.start_date', 'asc')->orderBy('events.title', 'asc')->paginate(6);
        // return $events;
        return view('user.event.index', compact('running_text', 'events', 'categories'));
    }

    public function show(string $slug)
    {
        $event = Event::with('event_category')->where('slug', $slug)->first();
        if(!$event){
            return abort(404);
        }
        $running_text = RunningText::first();
        $categories = EventCategory::all();
        $relatedEvent = DB::table('events')
        ->where('event_category_id', $event->event_category_id)
        ->where('id', '!=', $event->id)
        ->orderBy('created_at', 'DESC')->limit(3)->get();
        // return [$event, $categories, $relatedEvent];

        return view('user.event.show', compact('running_text', 'event', 'categories', 'relatedEvent'));
    }
}
