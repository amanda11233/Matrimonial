@extends('layouts.app')

@section('content')
<div class = "container mt-5">
    <div class = "alert alert-warning"><h3 class = "text-center">Please Fill Out All The Form</h3></div>
<form action= "{{route('users.store')}}" enctype="multipart/form-data" method = "post">
    @csrf


            <div class = "container">
                    <div class = "religion">
                        <h3>Religion</h3>
                            <div class="form-group row">
                                    <label for="caste" class="col-md-3 col-form-label text-md-right">{{ __('Caste') }}</label>
                        
                                    <div class="col-md-7">
                                        <input id="caste" type="caste" class="form-control{{ $errors->has('caste') ? ' is-invalid' : '' }}" name="caste" value="{{ old('caste') }}" required>
                        
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
                                                    <option>Citizen</option>
                                                    
                                                    </select>
                                    </div>
                                </div>  
                                {{-- Mother Tongue --}}
                            <div class="form-group row">
                                    <label for="language" class="col-md-3 col-form-label text-md-right">{{ __('Motther Tongue') }}</label>
                
                                    <div class="col-md-7">
                                            <select for = "language" class="form-control" name = "language">
                                                    <option>Nepali</option>
                                                    <option>English</option>
                                                    <option>Hindi</option>
                                                    <option>French</option>
                                                    </select>
                                    </div>
                                </div>     
                                    {{-- Married Status --}}
                            <div class="form-group row">
                                    <label for="married" class="col-md-3 col-form-label text-md-right">{{ __('Married Status') }}</label>
                
                                    <div class="col-md-7">
                                            <select for = "married" class="form-control" name = "married">
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
                                                    <option>None</option>
                                                    <option>Physically Challanged</option>
                                                    
                                                    </select>
                                    </div>
                                </div> 

                                <div class="form-group row">
                                        <label for="family" class="col-md-3 col-form-label text-md-right">{{ __('Family Type') }}</label>
                                
                                        <div class="col-md-7">
                                                <select for = "family" class="form-control" name = "family">
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
                        <input id="college" type="text" class="form-control{{ $errors->has('college') ? ' is-invalid' : '' }}" name="college" value="{{ old('college') }}" required autofocus>
    
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
                        <input id="job" type="text" class="form-control{{ $errors->has('job') ? ' is-invalid' : '' }}" name="job" value="{{ old('job') }}" required autofocus>
    
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
                <input id="income" step="any" type="number" class="form-control{{ $errors->has('income') ? ' is-invalid' : '' }}" name="income" value="{{ old('income') }}" required autofocus>
    
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
                                <option>Veg</option>
                                <option>Non-Veg</option>
                                </select>
                </div>
            </div>
            
          
        <div class="form-group row">
                <label for="smoke" class="col-md-3 col-form-label text-md-right">{{ __('Smoke') }}</label>
                <div class="col-md-7">
                        <select for = "smoke" class="form-control" name = "smoke">
                                <option>Yes</option>
                                <option>No</option>
                                </select>
                </div>
            </div>
            
        <div class="form-group row">
                <label for="drinks" class="col-md-3 col-form-label text-md-right">{{ __('Drinks') }}</label>
                <div class="col-md-7">
                        <select for = "drinks" class="form-control" name = "drinks">
                                <option>Yes</option>
                                <option>No</option>
                                </select>
                </div>
            </div>
            <div class="form-group row">
                    <label for="height" class="col-md-3 col-form-label text-md-right">{{ __('Height') }}</label>

                    <div class="col-md-7">
                        <input id="height" step="any" type="number" class="form-control{{ $errors->has('height') ? ' is-invalid' : '' }}" name="height" value="{{ old('height') }}" required autofocus>

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
                            <input id="weight"  step="any" type="number" class="form-control{{ $errors->has('weight') ? ' is-invalid' : '' }}" name="weight" value="{{ old('weight') }}" required autofocus>

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
                <label for="height" class="col-md-3 col-form-label text-md-right">{{ __('Profile Picture') }}</label>

                <div class="col-md-7">
                 <input type = "file" name = "photo">
                </div>
            </div>
            <div class="form-group row">
                    <label for="height" class="col-md-3 col-form-label text-md-right">{{ __('About Me') }}</label>
    
                    <div class="col-md-7">
                   <textarea class = "about-me" name = "about">

                   </textarea>
                    </div>
                </div>
</div>
<div class="form-group row ml-5">

        <div class="col-md-7 col-form-label text-md-left">
            <button type="submit" class="btn btn-primary">
                {{ __('Finish Registration') }}
            </button>
        </div>
    </div>
                    </div>
    </form>
     
</div>
@endsection
