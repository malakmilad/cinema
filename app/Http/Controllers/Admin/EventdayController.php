<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Eventday;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventdayController extends Controller
{
    public function index(){
        return view('admin.eventdays.add');
    }
    public function store(Request $request){
        $request->validate([
            'day'=>'required|unique:eventdays,day'
        ]);
        $eventdays=new Eventday();
        $eventdays->day=$request->day;
        $eventdays->save();
        return redirect()->route('event.show')->with(['success' => 'Eventday Created Successfully']);

    }
    public function show(){
        $eventdays=Eventday::all();
        return view('admin.eventdays.show',compact('eventdays'));
    }
    public function edit($id){
        $eventdays=Eventday::findorfail($id);
        return view('admin.eventdays.edit',compact('eventdays'));

    }
    public function update(Request $request,$id){
        $request->validate([
            'day'=>'required|unique:eventdays,day'
        ]);
        $eventdays=Eventday::findorfail($id);
        $eventdays->day=$request->day;
        $eventdays->save();
        return redirect()->route('event.show')->with(['success' => 'Eventday Updated Successfully']);

    }
    public function delete($id){
        DB::table('eventdays')->where('id',$id)->delete();
        return redirect()->route('event.show');
    }
}
