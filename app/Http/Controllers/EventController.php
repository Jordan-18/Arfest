<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    // Event for user
    public function index(Request $request)
    {
        $events = Event::query()->where('status','=','PUBLISH');
        return view('contents.event.index',[
            'events' => $events->orderBy('id', 'DESC')->paginate(6)->onEachSide(1)->withQueryString(),
        ]);
    }
}
