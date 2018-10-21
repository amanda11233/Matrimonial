@extends('layouts.adminApp')

@section('content')

<div class = "container-fluid">
@if(Session::get('report') != null)
<div class = "alert alert-success">{{Session::get('report')}}</div>
  @endif

    <table class = "table table-hover">
<tr>

    <th>SN</th>
    <th>Reported User</th>
    <th>Email</th>
    <th>Address</th>
    <th>Image</th>
  

  

<th></th>
<th></th>
</tr>
@foreach($reports as $key => $data)
<tr>
<td>{{$key+1 }}</td>
<td>{{$data->reported->name}}</td>
<td>{{$data->reported->email}}</td>
<td>{{$data->reported->address}}</td>
<td><img style = "width:100px; height:100px;" src = "{{asset('images/photos/user_id_' . $data->reported->id . '/' . $data->reported->photo)}}"></td>




<td>   {!! Form::open(['class'=>'delete_form','method'=>'DELETE','action' =>['Reports\ReportsController@destroy',$data->id]]) !!}
        <div class="form-group">
                {{Form::button('Delete Report ',['class'=>'btn btn-danger','type'=>'submit','onclick'=>'return confirm("Do you want to delete")'])}}
        </div>
         {!! Form::close() !!}</td>
         
         <td><a href = "{{route('block',$data->reported->id)}}"><button class = "btn btn-danger" >Block User</button></a></td>
</tr>
@endforeach
    </table>

 


</div>

@endsection
