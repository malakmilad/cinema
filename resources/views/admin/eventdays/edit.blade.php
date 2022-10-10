@extends('layouts.admin')
@section('content')
<h1>Edit EventDay</h1>
<form action="{{route('event.update',$eventdays->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="card-body">
        <div class="form-group">
            <label for="exampleInputEmail1">EventDay</label>
            <input type="date" class="form-control" name="day" id="exampleInputEmail1" placeholder="Enter day" class="@error('day') is-invalid @enderror" value="{{$eventdays->day}}">
            @error('day')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
          </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
   
</form>
@endsection