@extends('layouts.adminApp')

@section('content')

<div class = "container-fluid">
@if(Session::get('success') != null)
<span class = "alert alert-success">{{Session::get('success')}}</span>
  @endif

    <table class = "table table-hover mt-5">
<tr>

    <th>SN</th>
    <th>Name</th>
    <th>Address</th>
    <th>Country</th>
    <th>Language</th>
    <th>Email</th>
    <th>Age</th>
    <th>Occupation</th>
    <th>Image</th>
    <th>Status</th>

<th></th>
<th></th>
</tr>
@foreach($users as $key => $data)
<tr>
<td>{{$key+1 }}</td>
<td>{{$data->name}}</td>
<td>{{$data->address}}</td>
<td>{{$data->country}}</td>
<td>{{$data->language}}</td>
<td>{{$data->email}}</td>
<td>{{$data->age}}</td>
<td>{{$data->occupation}}</td>
<td><img src = "{{asset('images/photos/user_id_' . $data->id. '/' . $data->photo)}}" style = "height:100px; width:100px;"></td>
<td>{{$data->status}}</td>

<td>   {!! Form::open(['class'=>'delete_form','method'=>'DELETE','action' =>['Users\UsersController@destroy',$data->id]]) !!}
    <div class="form-group">
            {{Form::button('Delete ',['class'=>'btn btn-danger','type'=>'submit','onclick'=>'return confirm("Do you want to delete")'])}}
    </div>
     {!! Form::close() !!}</td>


</tr>
@endforeach
    </table>

 


</div>

@endsection
