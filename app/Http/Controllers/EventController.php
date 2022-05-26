<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Point;
use App\Models\Relation_user_event;
use Illuminate\Auth\Events\Validated;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Exists;

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
        $fileName = $request->file('file')->store('public/gallery');    
        Event::create([
            'name' => $request->input('name'),
            'user_id' => Auth::user()->id,
            'url' => $fileName,
            'deskripsi' => $request->input('desk'),
            'date_execution' => $request->input('date_execution'),
            'status' => 'PENDING'
        ]);

        return back()->with('success','Penguan akan diproses 1x24 harap bersamar menunggu');
    }

    public function show($id)
    {
        $event = Event::find($id);
        $joins = Relation_user_event::with(['userjoin'])->where('event_id','=',$id)->orderBy('id', 'DESC')->paginate(20);

        return view('contents.event.detail',compact('event','joins'));
    }

    public function join($id)
    {
        Relation_user_event::create([
            'user_id' => Auth::user()->id,
            'event_id' => $id
        ]);
        return back();
    }
}
