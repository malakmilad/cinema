@extends('layouts.admin')
@section('content')
<h1>Add EventDay</h1>
<form action="{{route('event.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="card-body">
        <div class="form-group">
            <label for="exampleInputEmail1">EventDay</label>
            <input type="date" class="form-control" name="day" id="exampleInputEmail1" placeholder="Enter day" class="@error('day') is-invalid @enderror" value="{{old('day')}}">
            @error('day')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
          </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
   
</form>
@endsection