<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    // Event Admin
    public function index(Request $request)
    {
        $events = Event::query();
        if(request('search')){
            $events->where('name','LIKE','%'.request('search').'%');   
        }
        return view('contents.admin.event.index',[
            'events' => $events->orderBy('id', 'DESC')->paginate(5)->onEachSide(1)->withQueryString(),
        ]);
    }

    // edit for admin
    public function edit($id)
    {
        $event = Event::find($id);

        return view('contents.admin.event.edit',[
            'event' => $event
        ]);
    }
    // Update Admin
    public function update(Request $request, Event $event,$id)
    {
        $request->validate([
            'name' => 'required',
            'status' => 'required'
        ]);
        $event = Event::find($id);

        $event = Event::where('id',$event->id)->update([
            'name' => $request->name,
            'status' => $request->status
        ]);

        return redirect()->route('events')->with('success','Data Berhasil Diubah');

    }

    // delete
    public function destroy($id)
    {
        $user = Event::findOrFail($id);

        $user->delete();

        return back()->with('deleted','User Berhasil Dihapus');
    }
}
