<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class EventController extends Controller
{
    // Event for user
    public function index(Request $request)
    {
        $events = Event::query()->where('status','=','PUBLISH');
        return view('contents.event.index',[
            'events' => $events->orderBy('updated_at', 'DESC')->paginate(6)->onEachSide(1)->withQueryString(),
        ]);
    }

    public function create()
    {
        return view('contents.event.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'date_execution' => 'required',
            'desk' => 'required'
        ]);
        // dd($request->input('date_execution'));
        $fileName = $request->file('file')->store('public/gallery');
        Event::create([
            'name' => $request->input('name'),
            'url' => $fileName,
            'deskripsi' => $request->input('desk'),
            'date_execution' => $request->input('date_execution'),
            'status' => 'PENDING'
        ]);

        return back()->with('success','Penguan akan diproses 1x24 harap bersamar menunggu');
    }
}
