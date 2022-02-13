<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function profile($id)
    {
        $user = User::find($id);
        return view('contents.profile.edit',[
            'user' => $user
        ]);
    }
    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);
        $data = User::find($id);
        if($request->file('file') == null){
            $profileimg = $data->url;
        }else{
            if($request->input('oldfile') == 'public/img/undraw_profile.svg'){

            }else{
                Storage::delete($request->input('oldfile'));
            }
            $profileimg = $request->file('file')->store('public/gallery');
        }

        $password = Hash::make($request->input('password'));
        User::where('id', $id)->update([
            'name' => $request->name,
            'password' => $password,
            'email' => $request->email,
            'url' => $profileimg
        ]);
        return redirect()->route('index');
    }
}
