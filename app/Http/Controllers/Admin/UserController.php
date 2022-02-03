<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::query();
        if(request('search')){
            $users->where('name','LIKE','%'.request('search').'%')->orwhere('roles','LIKE','%'.request('search').'%');   
        }
        return view('contents.admin.user.index',[
            'users' => $users->orderBy('id', 'DESC')->paginate(5)->onEachSide(1)->withQueryString(),
        ]);
    }
    
    public function edit($id)
    {
        $user = User::find($id);

        return view('contents.admin.user.edit',[
            'user' => $user
        ]);
    }
    public function update(Request $request, User $user,$id)
    {
        $request->validate([
            'name' => 'required',
            'roles' => 'required'
        ]);
        $user = User::find($id);

        $user = User::where('id',$user->id)->update([
            'name' => $request->name,
            'roles' => $request->roles
        ]);

        return redirect()->route('user')->with('success','Data Berhasil Diubah');

    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return back()->with('deleted','User Berhasil Dihapus');
    }
}
