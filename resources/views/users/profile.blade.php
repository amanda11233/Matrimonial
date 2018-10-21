@extends('layouts.app')
<script>
         function preview_timeline_image(event)
{
var reader = new FileReader();
reader.onload = function()
{
    var output =  document.getElementById('timeline-preview');
    output.src = reader.result;
}
reader.readAsDataURL(event.target.files[0]);
}


function preview_profile_image(event)
{
var reader = new FileReader();
reader.onload = function()
{
  var output = document.getElementById('profile-preview');
  output.src = reader.result;

}
reader.readAsDataURL(event.target.files[0]);

}



</script>
@section('content')

@if($user->gender == 'Male')
<div class = "profilebanner">

</div>
@else
<div class = "profilebanner2">

    </div>
    @endif
    <div class = "container">
        <div class = "row">
            <div class = "col-md-12">
                <div class= "row">
            <div class = "col-md-4">
                    <div class = "profile-section">
                            <div class = "profile-picture">
                        <img src = "{{asset('images/photos/user_id_'. $user->id . '/' . $user->photo)}}">
                            </div>
                        </div>
            </div>
            <div class = "col-md-8 mt-5">
            <h1>{{$user->name}}</h1>
            <h5 class = "font-italic">{{$user->occupation}}</h5>
            </div>
        </div>
            </div>
           
   
        </div>
        
    </div>
    <div class = "container">
        <div class = "row">
          <div class = "col-md-6">
              <div class = "buttons mb-5">
                  @if($user->id != Auth::id())
                      @if($count >= 1)
                      <a href = {{route('likes.edit',  $user->id)}}>  
                              <button class = "btn btn-primary ml-2"><span class = "fa fa-thumbs-down"></span> &nbsp;Unlike</button></a>
                  
                        @else
                        <a href = {{route('likes.show',  $user->id)}}>  
                              <button class = "btn btn-primary ml-2 fav-btn"><span class = "fa fa-thumbs-up"></span> &nbsp;Like</button></a>
                        @endif
                          
                                 
                            
                              @if($reports >= 1)
                              <span class = "alert alert-danger ml-5">You Have Reported This Person</span>
                              @else
                        <a href = "{{route('report.show', $user->id)}}"> <button class = "btn btn-secondary ml-2" onclick = "return confirm('Do You Want To Report This Person?')">Report</button></a>
                                @endif
                  @else
                  <a data-toggle="modal" data-target="#photo-Modal" ><button class = "btn btn-secondary ml-2">Update Photo</button>
                  </a>
                              
              @if($user->status == 'Partner Found')
        
                <a href = "{{route('users.edit',$user->id)}}"><button class = "btn  btn-danger" onclick = "return confirm('Do You Want To Delete Your Account?')"><span class = "fa fa-trash"></span> &nbsp;Delete Account</button></a>
              @else
                <a href = "{{route('users.index')}}"><button class = "btn btn-success ml-2"> Partner Found</button></a>
                @endif
                @endif
                  </div>
                          
          </div>
          <div class = "col-md-6">
                @if($user->status == 'Partner Found')
                <span class = "alert alert-success">Congratulations on finding your partner</span>
                @endif
@if(Session::get('success') != null)

            <span class = "alert alert-success">
{{Session::get('success')}}

</span>
@if(Session::get('report') != null)

<span class = "alert alert-danger">
    {{Session::get('report')}}
</span>
@endif
@endif
          </div>
        </div>

    </div>
    <div class = "container">
        <div class= "row">
            <div class = "col-md-6">
                
                <div class = "jumbotron">
                        <h5 class = "text-center">About Me</h5><hr>
                <p>{{$user->about_me}}</p>
                </div>
            </div>
       @if($user->id != Auth::id())
       <div class = "col-md-6">
                
            <div class = "message-section">
            <form action = "{{route('users.message', $user->id)}}" method ="POST">
                @csrf
                        <textarea class = "sendmessage" name = "message"></textarea>
                        <button type = "submit" class = "btn btn-success ml-3 mt-4">Send</button>
                    </form>
              </div>
        </div>
       @else
       <div class = "col-md-6">
             
            <a data-toggle="modal" data-target="#update-model" >  <button class = "btn-2">Update Profile</button></a>   
        
         <a  data-toggle="modal" data-target="#message-Modal"> <button class = "btn-2">Messages</button></a>
         
        
        </div>
       @endif
        </div>
        <div class = "row">
                <div class = "col-md-6">
                        <div class = "personal-details">
                          <div class = "row">
                            <div class= "col-md-3">
                                <ul class="nav nav-tabs pd-tabs " id = "tabs">
                                        <li class="">
                                          <a class=" active" href="#personal">Personal</a>
                                        </li>
                                        <li class="">
                                                <a class="" href="#religious">Religious</a>
                                              </li>
                                              <li class="">
                                                    <a class="" href="#family">Family</a>
                                                  </li>
                                                  
                                        <li class="">
                                                <a class="" href="#diet">Diet</a>
                                              </li>
                                        <li class="">
                                          <a class=" " href="#professional">Professional </a>
                                        </li>
        
                                            
                                      </ul>  
                            </div>
                            <div class = "col-md-9  border-left ">
                                <div class="tab-content py-2">
                                        <div class = "tab-pane active tab-size" id = "personal">
                                              <div class = "container">
                                                     <div class = "row">
                                   
                                                    <div class = "col-sm-5"><h6 class = "text-right">Age :</h6></div>
                                                    <div class = "col-sm-7">{{$user->age}}</div>
                                                                             
                                                      <div class = "col-sm-5"><h6 class = "text-right">Height :</h6></div>
                                                     <div class = "col-sm-7">{{$user->height}} ft</div>
                                                                
                                                     <div class = "col-sm-5"><h6 class = "text-right">Gender :</h6></div>
                                                     <div class = "col-sm-7">{{$user->gender}}</div>
                                     
                                                     <div class = "col-sm-5"><h6 class = "text-right">Country :</h6></div>
                                                     <div class = "col-sm-7">{{$user->country}}</div>
                                     
                                                     <div class = "col-sm-5"><h6 class = "text-right">Citizen Status :</h6></div>
                                                     <div class = "col-sm-7">{{$user->citizen_status}}</div>
                                     
                                                     <div class = "col-sm-5"><h6 class = "text-right">Mother Tongue :</h6></div>
                                                     <div class = "col-sm-7">{{$user->language}}</div>
                                     
                                                     <div class = "col-sm-5"><h6 class = "text-right">Married Status :</h6></div>
                                                     <div class = "col-sm-7">{{$user->marital_status}}</div>
                                     
                                                     <div class = "col-sm-5"><h6 class = "text-right">Any Disability :</h6></div>
                                                     <div class = "col-sm-7">{{$user->disability}}</div>
                                                                             </div>
                                     
                                                                     </div>
                                                                 </div>
                                                       <div class = "tab-pane  tab-size" id = "family">
                                                             <div class = "container mt-5">
                                                                     <div class = "row">
                                                           
                                                     
                                                                     <div class = "col-sm-5"><h6 class = "text-right">Family Type :</h6></div>
                                                                     <div class = "col-sm-7">{{$user->family_type}}</div>
                                                     
                                                                     <div class = "col-sm-5"><h6 class = "text-right">Family Status :</h6></div>
                                                                     <div class = "col-sm-7">{{$user->family_status}}</div>
                                                     
                                                                     <div class = "col-sm-5"><h6 class = "text-right">Family Values :</h6></div>
                                                                     <div class = "col-sm-7">{{$user->family_values}}</div>
                                                                                             </div>
                                                       </div>
                                                       </div>
                                                       <div class = "tab-pane  tab-size" id = "religious">
                                                             <div class = "container mt-5">
                                                                     <div class = "row">
                                                           
                                                     
                                                                    <div class = "col-sm-5"><h6 class = "text-right">Religion :</h6></div>
                                                                    <div class = "col-sm-7">{{$user->religion}}</div>
                                                                                        
                                                                    <div class = "col-sm-5"><h6 class = "text-right">Caste :</h6></div>
                                                                    <div class = "col-sm-7">{{$user->caste}}</div>
        
                                                                      <div class = "col-sm-5"><h6 class = "text-right">SubCaste :</h6></div>
                                                                     <div class = "col-sm-7">{{$user->sub_caste}}</div>
                                                     
                                                                   
                                                                     </div>
                                                     
                                                                                             </div>
                                                         </div>
                                                         <div class = "tab-pane  tab-size" id = "professional">
                                                                 <div class = "container mt-5">
                                                                         <div class = "row">
                                                               
                                                         
                                                                        <div class = "col-sm-5"><h6 class = "text-right">Education :</h6></div>
                                                                        <div class = "col-sm-7">{{$user->education}}</div>
                                                                                                 
                                                                          <div class = "col-sm-5"><h6 class = "text-right">College :</h6></div>
                                                                         <div class = "col-sm-7">{{$user->college}}</div>
                                                         
                                                                         <div class = "col-sm-5"><h6 class = "text-right">Occupation :</h6></div>
                                                                         <div class = "col-sm-7">{{$user->occupation}}</div>
                                                         
                                                                         <div class = "col-sm-5"><h6 class = "text-right">Employed In :</h6></div>
                                                                         <div class = "col-sm-7">{{$user->employed_in}}</div>
                                                         
                                                         
                                                                         <div class = "col-sm-5"><h6 class = "text-right">Income :</h6></div>
                                                                         <div class = "col-sm-7">Rs {{$user->income}} per month</div>
                                                         
                                                                                                 </div>
                                                         
                                                                                         </div>
                                                             </div>
                                                             <div class = "tab-pane  tab-size" id = "diet">
                                                                     <div class = "container mt-5">
                                                                             <div class = "row">
                                                                   
                                                             
                                                                            <div class = "col-sm-5"><h6 class = "text-right">Diet :</h6></div>
                                                                            <div class = "col-sm-7">{{$user->diet}}</div>
                                                                                                     
                                                                              <div class = "col-sm-5"><h6 class = "text-right">Smoke :</h6></div>
                                                                             <div class = "col-sm-7">{{$user->smoke}}</div>
                                                             
                                                                             <div class = "col-sm-5"><h6 class = "text-right">Drinks :</h6></div>
                                                                             <div class = "col-sm-7">{{$user->drinks}}</div>
                                                             
        
                                                                             <div class = "col-sm-5"><h6 class = "text-right">Weight :</h6></div>
                                                                             <div class = "col-sm-7">{{$user->weight}} Kgs</div>
                                                             
                                                                 
                                                             
                                                                                                     </div>
                                                             
                                                                                             </div>
                                                                 </div>
                                                     </div>
                        </div>
                          </div>
                        </div>
              
            </div>
            <div class = "col-md-6">
                <div class = "liked-section jumbotron ">
                    <h4 class = "text-center">Liked People</h4><hr>
                    <div class = "row">
                            @foreach($user->liked_user as $data)
                        
                            <div class = "col-sm-3 ">
                                <div class = "fav">
                                <div class = "close-fav-div">
                                   <a href = "{{route('likes.edit', $data->id)}}"> <h1 class = "text-center"><span class = "fa fa-times close-fav"></span></h1></a>
                                </div>
                            
                            <img src = "{{asset('images/photos/user_id_'. $data->id . '/' . $data->photo)}}" class = "fav-img">
                        </div>
                            <a href = "{{route('users.show',$data->id)}}"><h6 class = "text-center">{{$data->name}}</h6></a>
                       
                          </div>
                            @endforeach
                        </div>
                </div>
            </div>
        </div>  </div>

      </div>
<div id="update-model" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg" >

      <div class="modal-content">
        <div class="modal-header">
          
          <h4 class="modal-title">About Me</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
         
  
  <br>
  <span id = "messege"></span>
  
  <form action= "{{route('users.update', $user->id)}}" enctype="multipart/form-data" method = "post">
    @csrf
    {!! method_field('patch') !!}
<div class = "container">
    <div class = "Initial">
        <h3>Initial info</h3>
    <div class="form-group row">
        <label for="account" class="col-md-4 col-form-label text-md-right">{{ __('Account For') }}</label>

        <div class="col-md-6">
                <select for = "account" class="form-control" name = "account" id = "account">
                <option>{{$user->account_for}}</option>
                        <option>Myself</option>
                        <option>Son</option>
                        <option>Daughter</option>
                        <option>Brother</option>
                        <option>Sister</option>
                        <option>Friends</option>
                        <option>Relatives</option>
                        
                        </select>

            
        </div>
    </div> 
    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

        <div class="col-md-6">
            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $user->name}}" required autofocus>

            @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
            <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gernder') }}</label>

            <div class="col-md-6">
                    <select for = "gender" class="form-control" name = "gender" id = "gender">
                    <option>{{$user->gender}}</option>
                            <option>Male</option>
                            <option>Female</option>
                            <option>Other</option>
                            
                            </select>

                
            </div>
        </div> 

        <div class="form-group row">
                <label for="age" class="col-md-4 col-form-label text-md-right">{{ __('Age') }}</label>

                <div class="col-md-6">
                    <input id="age" type="number" class="form-control{{ $errors->has('age') ? ' is-invalid' : '' }}" name="age" value="{{ $user->age }}" required autofocus>

                    @if ($errors->has('age'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('age') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                    <label for="religion" class="col-md-4 col-form-label text-md-right">{{ __('Religion') }}</label>
        
                    <div class="col-md-6">
                            <select for = "religion" class="form-control" name = "religion" id = "religion">
                            <option>{{$user->religion}}</option>     
                              <option>Hindu</option>
                                    <option>Buddist</option>
                                    <option>Christain</option>
                                    <option>Muslim</option>
                                    </select>
                    </div>
                </div> 

                <div class="form-group row">
                        <label for="language" class="col-md-4 col-form-label text-md-right">{{ __('Motther Tongue') }}</label>
    
                        <div class="col-md-6">
                                <select for = "language" class="form-control" name = "language" id = "language">
                                      
                                <option>{{$user->language}}</option>
                                    <option>Nepali</option>
                                        <option>English</option>
                                        <option>Hindi</option>
                                        <option>French</option>
                                        </select>
                        </div>
                    </div>  

                    <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>
                
                            <div class="col-md-6">
                                <input id="phone" type="number" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ $user->phone }}" required autofocus>
                
                                @if ($errors->has('phone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                                <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>
    
                                <div class="col-md-6">
                                    <input id="address" type="address" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ $user->address}}" required>
    
                                    @if ($errors->has('address'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('address') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
    
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $user->email }}" required>
    
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
</div></div><hr>
            <div class = "container">
                    <div class = "religion">
                        <h3>Religion</h3>
                            <div class="form-group row">
                                    <label for="caste" class="col-md-3 col-form-label text-md-right">{{ __('Caste') }}</label>
                        
                                    <div class="col-md-7">
                                        <input id="caste" type="caste" class="form-control{{ $errors->has('caste') ? ' is-invalid' : '' }}" name="caste" value="{{ $user->caste}}" required>
                        
                                        @if ($errors->has('caste'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('caste') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                        <label for="sub-caste" class="col-md-3 col-form-label text-md-right">{{ __('Subcaste ') }}</label>
                            
                                        <div class="col-md-7">
                                                <select for = "sub-caste" class="form-control" name = "sub_caste">
                                                <option>{{$user->sub_caste}}</option>
                                                        <option>Bawun</option>
                                                        <option>Newar</option>
                                                      
                                                        <option>Muslim</option>
                                                        </select>
                                        </div>
                                    </div> 
                      </div>
                      <hr>

                      <div class = "personal mt-5">
                          <h3>Personal Info</h3>
                            <div class="form-group row">
                                    <label for="country" class="col-md-3 col-form-label text-md-right">{{ __('Country You Live In') }}</label>
                
                                    <div class="col-md-7">
                                            <select for = "country" class="form-control" name = "country">
                                            <option>{{$user->country}}</option>     
                                              <option>Nepal</option>
                                                    <option>America</option>
                                                    <option>India</option>
                                                    <option>France</option>
                                                    <option>Japan</option>
                                                    </select>
                                    </div>
                                </div>  
                                        {{-- Citizen--}}
                            <div class="form-group row">
                                    <label for="citizen" class="col-md-3 col-form-label text-md-right">{{ __('Citizen Status') }}</label>
                
                                    <div class="col-md-7">
                                            <select for = "citizen" class="form-control" name = "citizen">
                                            <option>{{$user->citizen_status}}</option>
                                                    <option>Citizen</option>
                                                    <option>Not Citizen</option>
                                                    </select>
                                    </div>
                                </div>  
                         
                                    {{-- Married Status --}}
                            <div class="form-group row">
                                    <label for="married" class="col-md-3 col-form-label text-md-right">{{ __('Married Status') }}</label>
                
                                    <div class="col-md-7">
                                            <select for = "married" class="form-control" name = "married">
                                            <option>{{$user->marital_status}}</option>
                                                    <option>Never Married</option>
                                                    <option>Divorced</option>
                                                    <option>Awaited Divorce</option>
                                                    <option>Widowed</option>
                                                    <option>Annulled</option>
                                                    </select>
                                    </div>
                                </div>   
                                   {{-- Disability Status --}}
                            <div class="form-group row">
                                    <label for="disability" class="col-md-3 col-form-label text-md-right">{{ __('Any Disability') }}</label>
                
                                    <div class="col-md-7">
                                            <select for = "disability" class="form-control" name = "disability">
                                              <option>{{$user->disability}}</option>
                                                    <option>None</option>
                                                    <option>Physically Challanged</option>
                                                    
                                                    </select>
                                    </div>
                                </div> 

                                <div class="form-group row">
                                        <label for="family" class="col-md-3 col-form-label text-md-right">{{ __('Family Type') }}</label>
                                
                                        <div class="col-md-7">
                                                <select for = "family" class="form-control" name = "family">
                                                <option>{{$user->family_type}}</option>
                                                        <option>Joint</option>
                                                        <option>Nuclear</option>
                                                        
                                                        </select>
                                        </div>
                                    </div>    
                                      {{-- Family Affluence --}}
                                 <div class="form-group row">
                                        <label for="family-status" class="col-md-3 col-form-label text-md-right">{{ __('Family Status') }}</label>
                                
                                        <div class="col-md-7">
                                                <select for = "family-status" class="form-control" name = "family_status">
                                                <option>{{$user->family_status}}</option>
                                                        <option>Middle Class</option>
                                                        <option>Upper Middle Class</option>
                                                        <option>Rich</option>
                                                        <option>Afflucent</option>
                                                        </select>
                                        </div>
                                    </div>  
                                    <div class="form-group row">
                                            <label for="family_values" class="col-md-3 col-form-label text-md-right">{{ __('Family Values') }}</label>
                                    
                                            <div class="col-md-7">
                                                    <select for = "family_values" class="form-control" name = "family_values">
                                                    <option>{{$user->family_values}}</option>
                                                            <option>Orthodox</option>
                                                            <option>Traditional</option>
                                                            <option>Moderate</option>
                                                            <option>Liberal</option>
                                                            </select>
                                            </div>
                                        </div>    
                      </div>
<hr>
<div class = "professional">
    <h3>Professional </h3>
        <div class="form-group row">
                <label for="education" class="col-md-3 col-form-label text-md-right">{{ __('Education Level ') }}</label>
    
                <div class="col-md-7">
                        <select for = "education" class="form-control" name = "education">
                        <option>{{$user->education}}</option>
                                <option>HighSchool</option>
                                <option>Bachelore</option>
                                <option>Masters</option>
                                <option>PHD</option>
                                </select>
                </div>
            </div> 
            <div class="form-group row">
                    <label for="college" class="col-md-3 col-form-label text-md-right">{{ __('College You Attend') }}</label>
    
                    <div class="col-md-7">
                        <input id="college" type="text" class="form-control{{ $errors->has('college') ? ' is-invalid' : '' }}" name="college" value="{{ $user->college}}" required autofocus>
    
                        @if ($errors->has('college'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('college') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

       
             <div class="form-group row">
                    <label for="job" class="col-md-3 col-form-label text-md-right">{{ __('Occupation') }}</label>
    
                    <div class="col-md-7">
                        <input id="job" type="text" class="form-control{{ $errors->has('job') ? ' is-invalid' : '' }}" name="job" value="{{ $user->occupation}}" required autofocus>
    
                        @if ($errors->has('job'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('job') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

<div class="form-group row">
        <label for="emp" class="col-md-3 col-form-label text-md-right">{{ __('Employed To') }}</label>

        <div class="col-md-7">
                <select for = "emp" class="form-control" name = "emp">
                <option>{{$user->employed_in}}</option>
                        <option>Government</option>
                        <option>Private</option>
                        <option>Business</option>
                        <option>Self-employed</option>
                        <option>Not Working</option>
                        </select>
        </div>
    </div>
</div>
<div class="form-group row">
        <label for="income" class="col-md-3 col-form-label text-md-right">{{ __('Income') }}</label>

        <div class="col-md-7">
                <input id="income" step="any" type="number" class="form-control{{ $errors->has('income') ? ' is-invalid' : '' }}" name="income" value="{{ $user->income }}" required autofocus>
    
                        @if ($errors->has('income'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('income') }}</strong>
                            </span>
                        @endif
                      
                      
        </div>
    </div>
<hr>
<div class = "health">  
    <h3>Health</h3>
        <div class="form-group row">
                <label for="diet" class="col-md-3 col-form-label text-md-right">{{ __('Your Diet') }}</label>
        
                <div class="col-md-7">
                        <select for = "diet" class="form-control" name = "diet">
                        <option>{{$user->diet}}</option>
                                <option>Veg</option>
                                <option>Non-Veg</option>
                                </select>
                </div>
            </div>
            
          
        <div class="form-group row">
                <label for="smoke" class="col-md-3 col-form-label text-md-right">{{ __('Smoke') }}</label>
                <div class="col-md-7">
                        <select for = "smoke" class="form-control" name = "smoke">
                        <option>{{$user->smoke}}</option>
                                <option>Yes</option>
                                <option>No</option>
                                </select>
                </div>
            </div>
            
        <div class="form-group row">
                <label for="drinks" class="col-md-3 col-form-label text-md-right">{{ __('Drinks') }}</label>
                <div class="col-md-7">
                        <select for = "drinks" class="form-control" name = "drinks">
                        <option>{{$user->drinks}}</option>
                                <option>Yes</option>
                                <option>No</option>
                                </select>
                </div>
            </div>
            <div class="form-group row">
                    <label for="height" class="col-md-3 col-form-label text-md-right">{{ __('Height') }}</label>

                    <div class="col-md-7">
                        <input id="height" step="any" type="number" class="form-control{{ $errors->has('height') ? ' is-invalid' : '' }}" name="height" value="{{ $user->height}}" required autofocus>

                        @if ($errors->has('height'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('height') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>   
                <div class="form-group row">
                        <label for="weight" class="col-md-3 col-form-label text-md-right">{{ __('Weight') }}</label>

                        <div class="col-md-7">
                            <input id="weight"  step="any" type="number" class="form-control{{ $errors->has('weight') ? ' is-invalid' : '' }}" name="weight" value="{{ $user->weight }}" required autofocus>

                            @if ($errors->has('weight'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('weight') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>   


</div>
<hr>
<div class = "about-me">
        
            <div class="form-group row">
                    <label for="height" class="col-md-3 col-form-label text-md-right">{{ __('About Me') }}</label>
    
                    <div class="col-md-7">
                   <textarea class = "about-me" name = "about">
{{$user->about_me}}
                   </textarea>
                    </div>
                </div>
</div>
<div class="form-group row ml-5">

        <div class="col-md-7 col-form-label text-md-left">
            <button type="submit" class="btn btn-primary">
                {{ __('Update') }}
            </button>
        </div>
    </div>
                    </div>
    </form>
            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
  
    </div>
  </div>


  {{-- Message modal --}}
  <div id="message-Modal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg" >

      <div class="modal-content">
        <div class="modal-header">
          
          <h4 class="modal-title">Messages</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
         @foreach($message as $value)
  <div class = "message-notif">
     <div class = "container">
         <div class = "row">
             <div class = "col-md-2">
<div class = "message-img">
<img src = "{{asset('images/photos/user_id_' . $value->messageFromUser->id . '/' . $value->messageFromUser->photo)}}">
</div>
             </div>
             <div class = "col-md-6">
                 <div class = "message-name">
                 <a href = "{{route('users.show',$value->messageFromUser->id)}}" >  <h4>{{$value->messageFromUser->name}}</h4></a>
                 </div>
                </div>
                <div class = "col-md-4">
                        <div class = "message-name">
                                <a href = "{{route('users.message.show',$value->messageFromUser->id)}}" ><button class = "btn btn-primary">Show Messages</button></a>
                        </div>
                       </div>
         </div>
     </div>
   
  </div><hr>
  @endforeach
  <br>
  <span id = "messege"></span>
  
            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
  
    </div>
  </div>



  <div id="photo-Modal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg" >

      <div class="modal-content">
        <div class="modal-header">
          
          <h4 class="modal-title">About Me</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <div class="row">
              <div class="col-sm-6">
    
    <br>
    <span id = "messege"></span>
    
                <!-- Image Upload FORM -->
       
              <form action = "{{route('users.pic')}}" method = "post" enctype = "multipart/form-data">
               @csrf 
     



     <div class = "form-group">
          <label>Profile Picture: </label>
          <input type = "file" name = "profileupload" id = "profile-upload" onchange = "preview_profile_image(event);">
     </div> 

      <button type="submit" id = "upload" class="btn btn-default">Submit</button>
    </form>
              </div>
             
    <div class = "col-sm-6">
        <h1 class = "text-center">Preview</h1>
        <div class = "picture-preview" >
        
            <div class = "profile-preview">
          
            <img src = "{{ asset('images/photos/user_id_'.$user->id.'/'.$user->photo)}}" id = "profile-preview" >
              
            </div>
        </div>
        
    </div>
  
    
          </div>
          </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
  
    </div>
  </div>

<script>
    
    $(document).ready(function(){
              $('.fav-btn').click(function(){
                 alert('Added to Favourites.');
              });
              $('.rep-btn').click(function(){
                 alert('Reported.');
              });
$('.fav').mouseenter(function(){
    $(this).children(".close-fav-div").css({"display":"block"});
});

$('.fav').mouseleave(function(){
  $(this).children('.close-fav-div').css('display','none');
});
        
          $(".nav-tabs a").click(function(){
                $(this).tab('show');
            });
            $('.nav-tabs a').on('shown.bs.tab', function(event){
                var x = $(event.target).text();         
                var y = $(event.relatedTarget).text();  
                $(".act span").text(x);
                $(".prev span").text(y);
            });
        });

   </script>
@endsection