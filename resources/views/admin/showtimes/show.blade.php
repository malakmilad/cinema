@extends('layouts.admin')
@section('content')
<h1>All ShowTimes</h1>
@if (Session::has('success'))
  <p class="alert {{Session::get('alert-class','alert-info')}}">
  {{Session::get('success')}}</p>
  @endif
        <table class="table table-bordered">
          <thead>
            <tr>
              <th style="width: 10px">id</th>
              <th>showtime</th>
              <th>eventday_id</th>
              <th>movie_id</th>
            </tr>
          </thead>
          <tbody>
            <a href="{{route('showtime.add')}}" class="btn btn-success">ADD Showtimes</a><br><br>
            @foreach ($showtimes as $s)
            <tr>
                <td>{{$s->id}}</td>
                <td>{{$s->time}}</td>
                <td>{{$s->eventday_id}}</td>
                <td>{{$s->movie_id}}</td>
                <td>
                  <a href="{{route('showrtime.edit',$s->id)}}" class="btn btn-info">edit</a>
                  <a href="{{route('showrtime.delete',$s->id)}}" class="btn btn-success">delete</a>
                </td>
              </tr>
                
            @endforeach
          </tbody>
        </table>
@endsection