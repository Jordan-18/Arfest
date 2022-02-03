<?php

namespace App\Http\Controllers;

use App\Models\Point;
use Illuminate\Http\Request;

class PointController extends Controller
{
    public function index()
    {
        $points = Point::query();
        return view('contents.point.index',[
            'points' => $points->orderBy('id', 'DESC')->paginate(6)->onEachSide(1)->withQueryString(),
        ]);
    }

    public function create(Request $request)
    {
        $rambahan = $request->input('rambahan');
        $jumlahAP = $request->input('jumlah-ap');
        $date = date('Y-m-d');    
        return view('contents.point.create', compact('date','rambahan','jumlahAP'));
    }

}