@extends('layouts.app')

@section('content')

    <div class="background">
        <div class="card bg-dark text-white main-card">
        <img src="{{ asset('/img/lawyer.png') }}" class="card-img site-img main-card-img" alt="Lowyer_question">
        <div class="card-img-overlay">
           @guest  
              <div class="container text-center" style="margin-top:30%">
                    <h2 class="d-none d-lg-block">We will give you the best princepal</h2>
                    <p class="d-none d-lg-block">
                        you colud solve you'r legal problem easily
                    </p>
                    <br>
             
                <a class="btn btn-success col-4" href="{{ route('login') }}"><b>{{ __('Login') }}</b></a>
               
                @if (Route::has('register'))
                   
                    <a class="btn btn-outline-danger col-4" href="{{ route('register') }}"><b>{{ __('Register') }}</b></a>
                   
                @endif
              </div>
              @else
              <div class="container text-center" style="margin-top:30%">
              <h3 class="d-none d-lg-block">
                Hello , {{ Auth::user()->fullName }}              
              </h3>
              <a href={{ route('home') }} class="btn btn-success col-6">You'r panel</a>
              </div> 
           @endguest
        </div>
     </div>
    </div>

@endsection