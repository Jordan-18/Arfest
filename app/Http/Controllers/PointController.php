<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class PointController extends Controller
{
    public function index(Request $request)
    {
        $date = date('Y-m-d H:i:s');    
        return view('contents.point', compact('date'));
    }

}
