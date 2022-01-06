<?php

namespace App\Http\Controllers;

use App\Models\competition;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(Request $request)
    {
        $events = competition::get();
        return view('contents.event.index',compact('events'));
    }
}
