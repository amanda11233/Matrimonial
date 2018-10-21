@extends('layouts.app')

@section('content')


<div class = "banner">
    
</div>
<div class = "container mt-5 ">
    <h1 class = "text-center">Welcome To Our Site</h1>
    <div class = "jumbotron about-us">
        <div class = "row">
            <div class = "col-md-6">
<p>Matchmaking.com, the world's oldest and most successful 
    matchmaking service, has been trusted since 1996 by 
    people all over the world to help them find their soulmates. 
    Today, hundreds of thousands of people have met their life partners through our
     revolutionary matchmaking service and countless others have made some very special friends.</p>
            </div>

            <div class = "col-md-6">
                <p>
                        Matchmaking.com was founded by me in 1996 with one simple objective - to provide
                         a superior matchmaking experience
                         by expanding the opportunities available to meet potential life 
                    partners. Since then we have created a world renowned service that has
                     touched the lives of millions of people all over the world. We have, however,
                      never rested on our laurels
                </p>
                </div>
        </div>
    </div>
  
</div><hr>
<div class = "container-fluid">
        <div class  = "services">
    <h1 class = "text-center">Services</h1>
    <div class = "row mt-5">
        <div class = "col-md-4">
            <div class = "service-item">
                    <h3 class = "text-center">Register</h3>
            </div>
            
        </div>
        <div class = "col-md-4">
                <div class = "service-item">
                        <h3 class = "text-center">Find People</h3>
                </div>
            </div>
            <div class = "col-md-4">
                    <div class = "service-item">
                            <h3 class = "text-center">Connect</h3>
                    </div>
                </div>
    </div>
        </div>
    </div><hr>
<div class = "welcome-image mt-4">
    
    </div>
<hr>

<div class = "container mt-5">
    <div class = "stories">
        <h1 class = "text-center">Happy Customers</h1>
        <div class = "row">
            <div class = "col-md-4 mt-3">
                <div class  = "story-img">
                <img src = "{{asset('images/couple1.jpg')}}">
                </div>
                <div class = "story-details p-3">
                    <p class = "text-justify">We would like 
                        to thank Shaadi.com for playing cupid in our lives.
                         Our journey to find true ends, as our journey to 
                        cherish true love begins.... Ritesh and I met on 22nd January 2016. </p>
                </div>
            </div>
            <div class = "col-md-4 mt-3">
                    <div class  = "story-img">
                    <img src = "{{asset('images/couple2.jpg')}}">
                    </div>
                    <div class = "story-details p-3">
                        <p class = "text-justify">It was a kind of astonishment 
                            for me that I found my significant other on Matchmaking.com within a week of making my profile 
                            on the site. We exchanged our
                             contact numbers and emails on Matchmaking.com itself</p>
                    </div>
                </div>
                <div class = "col-md-4 mt-3">
                        <div class  = "story-img">
                        <img src = "{{asset('images/couple3.jpg')}}">
                        </div>
                        <div class = "story-details p-3">
                            <p class = "text-justify">Hello, 
                                myself Gurminder Singh from Auckland, New Zealand. 
                                I am really thankful to WaheGuru Ji, God for blessing me and my family. 
                                I got married to my wife Rajbir Kaur on 24th July 2016 </p>
                        </div>
                    </div>
        </div>
    </div>
</div><hr>

@endsection