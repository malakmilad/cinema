<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Eventday;
use App\Models\Movie;
use App\Models\Showtime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShowtimeController extends Controller
{
    public function index(){
        $movies=Movie::all();
        $eventdays=Eventday::all();
        return view('admin.showtimes.add',compact('eventdays','movies'));
    }
    public function store(Request $request){
        $request->validate([
            'time' => 'required|unique:showtimes,time',
            'eventday_id'=>'required',
            'movie_id'=>'required',
        ]);
        Showtime::create([
            'time'=>$request->time,
            'eventday_id'=>$request->eventday_id,
            'movie_id'=>$request->movie_id
        ]);
        return redirect()->route('showtime.show')->with(['success' => 'Showtime Created Successfully']);
    }
    public function show(){
        $showtimes=Showtime::all();
        return view('admin.showtimes.show',compact('showtimes'));

    }
    public function edit($id){
        $showtimes=Showtime::findorfail($id);
        $movies=Movie::all();
        $eventdays=Eventday::all();
        return view('admin.showtimes.edit',compact('showtimes','movies','eventdays'));

    }
    public function update(Request $request,$id){
        $request->validate([
            'time' => 'required|unique:showtimes,time',
            'eventday_id'=>'required',
            'movie_id'=>'required',
        ]);
        $showtimes=ShowTime::findorfail($id);
        $showtimes->time = $request->time;
        $showtimes->eventday_id = $request->eventday_id;
        $showtimes->movie_id = $request->movie_id;
        $showtimes->save();
        return redirect()->route('showtime.show')->with(['success' => 'Showtime Updated Successfully']);
    }
    public function delete($id){
        DB::table('showtimes')->where('id',$id)->delete();
        return redirect()->route('showtime.show')->with(['success' => 'Showtime Deleted Successfully']);

    }
}
