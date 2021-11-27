<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(Request $request)
    {
        return view('contents.dashboard');
    }

    public function register(Request $request)
    {
        return view('pages.register');
    }
    public function login(Request $request)
    {
        return view('pages.login');
    }
    public function forget(Request $request)
    {
        return view('pages.forget');
    }
}
