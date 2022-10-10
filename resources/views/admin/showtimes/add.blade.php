@extends('layouts.admin')
@section('content')
<h1>Add Showtimes</h1>
<form action="{{route('showtime.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="card-body">
        <div class="form-group">
            <label for="exampleInputEmail1">time</label>
            <input type="text" class="form-control" name="time" id="exampleInputEmail1" placeholder="hh:mm--hh:mm" data-slots="hm">
            @error('time')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
    </div>
    <div class="card-body">
        <div class="form-group">
            <label>Eventdays</label>
            <select name="eventday_id" class="form-control">
              @foreach ($eventdays as $e)
              <option value="{{$e->id}}">{{$e->day}}</option>
              @endforeach  
            </select>
          </div>  
    </div>
    <div class="card-body">
        <div class="form-group">
            <label>Movies</label>
            <select name="movie_id" class="form-control">
              @foreach ($movies as $m)
              <option value="{{$m->id}}">{{$m->title}}</option>
              @endforeach  
            </select>
          </div>  
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
   
</form>
<script>
    document.addEventListener('DOMContentLoaded', () => {
    for (const el of document.querySelectorAll("[placeholder][data-slots]")) {
        const pattern = el.getAttribute("placeholder"),
            slots = new Set(el.dataset.slots || "_"),
            prev = (j => Array.from(pattern, (c,i) => slots.has(c)? j=i+1: j))(0),
            first = [...pattern].findIndex(c => slots.has(c)),
            accept = new RegExp(el.dataset.accept || "\\d", "g"),
            clean = input => {
                input = input.match(accept) || [];
                return Array.from(pattern, c =>
                    input[0] === c || slots.has(c) ? input.shift() || c : c
                );
            },
            format = () => {
                const [i, j] = [el.selectionStart, el.selectionEnd].map(i => {
                    i = clean(el.value.slice(0, i)).findIndex(c => slots.has(c));
                    return i<0? prev[prev.length-1]: back? prev[i-1] || first: i;
                });
                el.value = clean(el.value).join``;
                el.setSelectionRange(i, j);
                back = false;
            };
        let back = false;
        el.addEventListener("keydown", (e) => back = e.key === "Backspace");
        el.addEventListener("input", format);
        el.addEventListener("focus", format);
        el.addEventListener("blur", () => el.value === pattern && (el.value=""));
    }
})
</script>
@endsection
