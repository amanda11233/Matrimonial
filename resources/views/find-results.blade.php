@extends('layouts.app')

@section('content')

<div class = "container mt-5 page">
    <div class = "results-panel">
        <div class=  "row">
            @if($users->count() >= 1)
<h1 class = "text-center"><span class = "fa fa-search"> &nbsp; Search Results</span><hr>
@foreach($users as $data)
<div class = "col-md-4 col-sm-4 mt-4">
    <div class = "user-display">
<div class=  "userimage">
<img src = "{{asset('images/photos/user_id_'. $data->id . '/' . $data->photo)}}">
</div>
<div class = "user-details">
<a href = "{{route('users.show', $data->id)}}"><h5 class = "text-center mt-3">
    {{$data->name}}</h5></a>

</div>
    </div>
</div>
@endforeach
@else
<div class = "container mt-5">
<div class = "alert alert-danger"><h1 class = "text-center"><span class = "fa fa-search">No Results</span></h1></div>
</div>
            @endif

        </div>
    </div>
</div>
@endsection