@extends('panel.layouts.authentication.master')
@section('title', 'Login')

@section('css')
<style>

   .body-login {
      background-color: black;
         display: flex;
         align-items: center;
         justify-content: center;
         height: auto;
         font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
         padding: 2rem 0;
   }
      .input-container {
      position: relative;
   }

   .input-container-input {
      color: white;
      padding: 10px;
      border: none;
      border-radius: 4px;
      outline: 2px solid yellow;
      background-color: black !important;
      transition: outline-color 500ms;
      width: 100%
   }

   .input-container-input:is(:focus, :valid) {
      outline-color: yellow;
   }

   .input-container-label {
      position: absolute;
      top: 0;
      left: 0;
      translate: 10px 8px;
      color: yellow;
      transition: translate 500ms, scale 500ms;
   }

   .input-container-input:focus + .input-container-label,
   .input-container-input:valid + .input-container-label {
      padding-inline: 10px;
      translate: 0px -14px;
      scale: 0.8;
      background-color: black;
      font-size: 20px;
   }
</style>
@endsection

@section('style')
@endsection


@section('content')
   @include('layout.inc.linksMeta')
        @include('layout.inc.linksCss')
@include('inc.barratoplogin')
@include('layout.inc.linksJs')
<div class="container-fluid p-0 body-login">
   
   <div class="row m-0">
      <div class="col-12 col-lg-6 p-0 order-1 order-lg-0">
        
         <div class="login-card">
            <div>
               <div>
                  <a class="logo">
                   
                     <img src={{asset('/'."homePublic/imgs/title-center.png")}} >
                  
                  </a>
               </div>
               <div class="login-main">
                  <form class="theme-form" method="POST" action="{{ route('login') }}">
                        @csrf
                     {{-- <div class="form-group"> --}}

                        <div class="input-container">
                           <input type="email" id="email" name="email" class="input-container-input @error('email') is-invalid @enderror" required value="{{ old('email') }}" autofocus/>
                           <label for="email" class="input-container-label">Email</label>
                        </div>
                         @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        {{-- <label class="col-form-label">{{ __('Email Address') }}</label>
                         <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                                     @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror --}}
                     {{-- </div> --}}
                     <br>
                     {{-- <div class="form-group"> --}}

                        <div class="input-container">
                           <input type="password" id="password" name="password" class="input-container-input @error('password') is-invalid @enderror" required/>
                           <label for="password" class="input-container-label">Password</label>
                        </div>

                          @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        <br>
                        {{-- <label class="col-form-label">{{ __('Password') }}</label>
                         <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                              
                        <div class="show-hide"><span class="show">                         </span></div> --}}
                     {{-- </div> --}}
                     {{-- <div class="form-group mb-0"> --}}
                        {{-- <div class="checkbox p-0">
                              <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                           <label class="text-muted" for="remember">{{ __('Remember Me') }}</label>
                        </div> --}}
                        
                                {{-- @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif --}}
                     <div class="input-container">
                        <button class="btn" style="background-color: yellow;width:100%" type="submit"> {{ __('Login') }}</button>
                     </div>
        
                     {{-- <p class="mt-4 mb-0">Don't have account?                                                  --}}
                     {{-- @if (Route::has('register'))
                                    <a class="ms-2" href="{{ route('register') }}">{{ __('Register') }}</a>
                            @endif</p> --}}

                  </form>
               </div>
            </div>
         </div>
      </div>
      <div class="col-12 col-lg-6 p-0 order-0">
         <div class="login-card">         
                     <img src={{asset('/'."homePublic/imgs/login-banner.png")}}>
         </div>

      </div>

   </div>
</div>
@endsection


