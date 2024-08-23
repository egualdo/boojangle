@extends('panel.layouts.authentication.master')
@section('title', 'Forget-password')

@section('css')
@endsection

@section('style')
@endsection


@section('content')
<!-- tap on top starts-->
<div class="tap-top"><i data-feather="chevrons-up"></i></div>
<!-- tap on tap ends-->
<!-- page-wrapper Start-->
<div class="page-wrapper">
   <div class="container-fluid p-0">
      <div class="row">
         <div class="col-12">
            <div class="login-card">
               <div>
                  <div><a class="logo" href="{{ route('index') }}"><img class="img-fluid for-light" src="{{asset('assets/images/logo/login.png')}}" alt="looginpage"><img class="img-fluid for-dark" src="{{asset('assets/images/logo/logo_dark.png')}}" alt="looginpage"></a></div>
                  <div class="login-main">
                     @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="theme-form" method="POST" action="{{ route('password.email') }}">
                        @csrf
                    
                        <h4>{{ __('Reset Password') }}</h4>
                        <div class="form-group">
                            
                           <label class="col-form-label">{{ __('Email Address') }}</label>
                           <div class="row">
                              <div class="col-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                              </div>

                              <div class="col-12">
                                 <button class="btn btn-primary btn-block m-t-10" type="submit"> {{ __('Send Password Reset Link') }}</button>
                              </div>
                           </div>
                        </div>
                        <p class="mt-4 mb-0">Already have an password?<a class="ms-2" href="{{ route('login') }}">{{ __('Login') }}</a></p>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection

@section('script')
<script src="{{ asset('assets/js/sidebar-menu.js')}}"></script>
@endsection