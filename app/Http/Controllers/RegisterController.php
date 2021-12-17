<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('pages.register');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|email:rfc,dns',
            'password' => 'required|min:3|max:255'
        ]);
            // checking, apakah username telah ada atau belum 
            $users = User::where('name', '=', $request->input('name'))->first();
            if ($users === null) {
                $validatedData['password'] = Hash::make($validatedData['password']);

                User::create($validatedData);
        
                $request->session()->flash('success', 'Registration Successfull');
        
                return redirect()->route('login');
            } else {
                $request->session()->flash('failed', 'Registration Failed');
        
                return redirect()->route('register');
            }
    }
}
