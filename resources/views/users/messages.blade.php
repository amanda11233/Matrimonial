@extends('layouts.app')

@section('content')

<div class= "container mt-5">
<h1 class  = "text-center">Messages From:  {{$name->name}}</h1>
    @foreach($messages as $data)
    <div class = "message-div">
        <div class = "row message-user mt-5">
            
                    <div class = "col-md-2">
                        <div class = "user-img">
                        <img src = "{{asset('images/photos/user_id_' . $data->messageFromUser->id . '/' . $data->messageFromUser->photo)}}">

                        </div>
                    </div>
                    <div class = "col-md-7 mt-4">
                          <h3>{{$data->messageFromUser->name}}</h3>
                        </div>
         
           
        </div>
        <div class = "row message-msg">
<p>{{$data->message}}<p>
        </div>
    </div>
    @endforeach
</div>
@endsection