<?php

namespace App\Http\Controllers;

use App\Models\Point;

class PointController extends Controller
{
    public function index()
    {
        $points = Point::all();
        return view('contents.point.index', [
            "points" => $points
        ]);
    }

    public function create()
    {
        $date = date('Y-m-d H:i:s');    
        return view('contents.point.create', compact('date'));
    }

}
