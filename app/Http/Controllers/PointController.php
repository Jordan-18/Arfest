<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Point;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PointController extends Controller
{
    public function index()
    {
        if(Auth::user()->roles == "ADMIN"){
            $points = Point::with(['userpoint']);
        }else {
            $points = Point::with(['userpoint'])->where('user_id','=',Auth::user()->id);
        }

        return view('contents.point.index',[
            'points' => $points->orderBy('id', 'DESC')->paginate(8)->onEachSide(1)->withQueryString(),
        ]);
    }

    public function create(Request $request)
    {
        $rambahan = $request->input('rambahan');
        $jumlahAP = $request->input('jumlahAP');
        $date = date('Y-m-d');    
        return view('contents.point.create', compact('date','rambahan','jumlahAP'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'rambahan' => 'required',
            'jumlah-ap' => 'required',
            'jarak' => 'required',
            'jenis' => 'required',
            'form-total' => 'required'
        ]);
        Point::create([
            'user_id' => Auth::user()->id,
            'rambahan' => $request->input('rambahan'),
            'jumAP' => $request->input('jumlah-ap'),
            'jarak' => $request->input('jarak'),
            'jenis_busur' => $request->input('jenis'),
            'total' => $request->input('form-total')
        ]);

        return redirect()->route('point')->with('success','Tetap Semangat ayo tetap fokus!!!');
    }

}