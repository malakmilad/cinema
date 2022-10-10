<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Eventday;
use App\Models\Realation;
use App\Models\Showtime;
use Illuminate\Http\Request;

class RealationController extends Controller
{
    public function index(){
        $eventdays=Eventday::all();
        $showtimes=Showtime::all();
        return view('admin.realations.add',compact('eventdays','showtimes'));

    }
    public function store(Request $request){
        $realations=new Realation();
        $realations->eventday_id=$request->eventday_id;
        $realations->showtime_id=$request->showtime_id;
        $realations->save();
        return redirect()->route('real.show');
    }
    public function show(){
        $realations=Realation::all();
        return view('admin.realations.show',compact('realations'));

    }
}
