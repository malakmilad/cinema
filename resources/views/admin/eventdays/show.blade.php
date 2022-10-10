@extends('layouts.admin')
@section('content')
<h1>All Event Days</h1>
@if (Session::has('success'))
<p class="alert {{Session::get('alert-class','alert-info')}}">
{{Session::get('success')}}</p>
@endif
        <table class="table table-bordered">
          <thead>
            <tr>
              <th style="width: 10px">id</th>
              <th>eventday</th>
            </tr>
          </thead>
          <tbody>
            <a href="{{route('event.add')}}" class="btn btn-success">ADD eventdays</a><br><br>
            @foreach ($eventdays as $e)
            <tr>
                <td>{{$e->id}}</td>
                <td>{{$e->day}}</td>
                <td>
                  <a href="{{route('event.edit',$e->id)}}" class="btn btn-info">edit</a>
                  <a href="{{route('event.delete',$e->id)}}" class="btn btn-success">delete</a>
                </td>
              </tr>
                
            @endforeach
          </tbody>
        </table>
@endsection