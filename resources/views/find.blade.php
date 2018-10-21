@extends('layouts.app')

@section('content')

<div class = "container mt-5">
    <h1 class = "text-center"><span class = "fa fa-search"></span> Quick Search</h1><hr>
    <div class = "search-panel mt-5">
    <form class = "search-form" action = "{{route('users.search')}}" method = "POST" >
    @csrf
    <div class = "row form-group">
        <div  class = "form-label col-md-4">
            <label>Gender</label>

        </div>
        <div class = " col-md-6">
            <select name = "gender" id = "gender" class = "form-control">
                <option>Male</option>
                <option>Female</option>
            </select>
        </div>
    </div>
    <div class = "row form-group">
            <div  class = "form-label col-md-4">
                <label>Age</label>
    
            </div>
            <div class = " col-md-6">
               <div class = "row">
                   <div class = "col-sm-4">
                       <input type= "number" class = "form-control" name = "age1" id = "age1" value = "18" required>
                   </div>
                   
                       <label class = "form-label">TO</label>
                   
                   <div class = "col-sm-4">
                       <input type= "number" class = "form-control" name = "age2" id = "age2" value = "40" required>
                   </div>
               </div>
            </div>
        </div>
        <div class = "row form-group">
                <div  class = "form-label col-md-4">
                    <label>Religion</label>
        
                </div>
                <div class = " col-md-6">
                    <select name = "religion" id = "religion" class = "form-control">
                            <option>Hindu</option>
                            <option>Buddist</option>
                            <option>Christain</option>
                            <option>Muslim</option>
                    </select>
                </div>
            </div>
            <div class = "row form-group">
                    <div  class = "form-label col-md-4">
                        <label>Caste</label>
            
                    </div>
                    <div class = " col-md-6">
                      <input type = "text" name = "caste" id = "caste" class = "form-control" required>
                    </div>
                </div>
                <div class = "row form-group">
                    <div class = "col-md-4"></div>
                    <div class = "col-md-6">
                        <button type = "submit" style = "width:100%;" class = "btn btn-success">Search</button>
                    </div>

                </div>
</form>
    </div>
</div>

@endsection