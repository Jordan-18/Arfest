<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Point;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // admin
        $countusers = User::select(DB::raw("COUNT(*) as count"))->pluck('count');
        $countuvents = Event::select(DB::raw("COUNT(*) as count"))->pluck('count');
        $counthorsebow = Point::select(DB::raw("COUNT(*) as count"))
            ->where('jenis_busur','=','Horsebow')
            ->groupBy(DB::raw("DAY(created_at)"))
            ->pluck('count');
        $countstandard = Point::select(DB::raw("COUNT(*) as count"))
            ->where('jenis_busur','=','Standardbow')
            ->groupBy(DB::raw("DAY(created_at)"))
            ->pluck('count');
        $jenis = Point::get()->count();
        $horsebow = Point::where('jenis_busur','=','Horsebow')->count();
        $standard = Point::where('jenis_busur','=','Standardbow')->count();

        // user
        if(Auth::check()){
            $userstandard = Point::select(DB::raw("COUNT(*) as count"))
                ->where('jenis_busur','=','Standardbow')
                ->where('user_id','=',Auth::user()->id)
                ->groupBy(DB::raw("DAY(created_at)"))
                ->pluck('count');
            $userhorsebow = Point::select(DB::raw("COUNT(*) as count"))
                ->where('jenis_busur','=','Horsebow')
                ->where('user_id','=',Auth::user()->id)
                ->groupBy(DB::raw("DAY(created_at)"))
                ->pluck('count');
        }else{
            $userstandard = null;
            $userhorsebow = null;
        }

        return view('contents.dashboard.index', compact(
            'countusers',
            'countuvents',
            'counthorsebow',
            'countstandard',
            'jenis',
            'horsebow',
            'standard',
            'userstandard',
            'userhorsebow'
        ));
    }
}
