

<nav class="navbar navbar-expand-md navbar-dark bg-dark navbar-laravel fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                    <a class="nav-link" href = "{{route('users.find')}}" >{{ __('Find People') }}</a>
                                 </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    <li class="nav-item">
                        @if (Route::has('register'))
                        <li class="nav-item">
                           <a class="nav-link" href = "" data-toggle = "modal" data-target = "#registerModal">{{ __('Register') }}</a>
                                </li>
                        @endif
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('users.show', Auth::id()) }}">
                                 {{ __(' My Profile') }}
                             </a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout.user') }}" method="GET" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>


 {{-- Add Registration Modal Starts Here --}}

 <div class = "modal fade" id = "registerModal" tabindex = "-1" role = "dialog" aria-labelledby="registerModal">

    <div class = "modal-dialog" role = "document">
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Register Your Account</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                {{-- Add Registration Form --}}
            <form action = "{{route('register')}}" method = "POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label for="account" class="col-md-4 col-form-label text-md-right">{{ __('Account For') }}</label>

                    <div class="col-md-6">
                            <select for = "account" class="form-control" name = "account" id = "account">
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
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

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
                                        <option>Male</option>
                                        <option>Female</option>
                                        <option>Other</option>
                                        
                                        </select>
    
                            
                        </div>
                    </div> 

                    <div class="form-group row">
                            <label for="age" class="col-md-4 col-form-label text-md-right">{{ __('Age') }}</label>

                            <div class="col-md-6">
                                <input id="age" type="number" class="form-control{{ $errors->has('age') ? ' is-invalid' : '' }}" name="age" value="{{ old('age') }}" required autofocus>

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
                                            <input id="phone" type="number" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" required autofocus>
                            
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
                                                <input id="address" type="address" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') }}" required>
                
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
                                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                
                                                @if ($errors->has('email'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                
                                        <div class="form-group row">
                                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                
                                            <div class="col-md-6">
                                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                
                                                @if ($errors->has('password'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                
                                        <div class="form-group row">
                                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                
                                            <div class="col-md-6">
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                            </div>
                                        </div>

                                    <div class="col-md-10 col-form-label ml-5  text-md-left">
                                            <button id = "submit" type="submit" class="btn btn-primary" style = "width:100%;">
                                                {{ __('Register') }}
                                            </button>
                                        </div>
              </form>
            </div>
    
          
            
            <div class="modal-footer">
                   
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
             
            </div>
          </div>
    
    </div>
    
    
    </div>
    
    {{-- Add Registration modal ends here --}}

