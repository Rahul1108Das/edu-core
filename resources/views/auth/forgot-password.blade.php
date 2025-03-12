{{-- <x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

@extends('frontend.layouts.master')

@section('content')

<section class="wsus__sign_in">
       <div class="row align-items-center">
           <div class="col-xxl-5 col-xl-6 col-lg-6 wow fadeInLeft">
               <div class="wsus__sign_img">
                   <img src="{{ asset('frontend/assets/images/login_img_1.jpg') }}" alt="login" class="img-fluid">
                   <a href="index.html">
                       <img src="{{ asset('frontend/assets/images/logo.png') }}" alt="EduCore" class="img-fluid">
                   </a>
               </div>
           </div>
           <div class="col-xxl-4 col-xl-5 col-lg-6 col-md-9 m-auto wow fadeInRight">
               <div class="wsus__sign_form_area">
                   <div class="tab-content" id="pills-tabContent">
                       <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                           aria-labelledby="pills-home-tab" tabindex="0">
                            <!-- Session Status -->
                            <x-auth-session-status class="mb-4" :status="session('status')" />
                           <form action="{{ route('password.email') }}" method="POST">
                               @csrf
                               <h2>Forget Password<span>!</span></h2>
                               <p class="new_user">Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</p>
                               <div class="row">
                                   <div class="col-xl-12">
                                       <div class="wsus__login_form_input">
                                           <label>Email*</label>
                                           <input type="email" name="email" :value="old('email')" required placeholder="Email">
                                           <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                       </div>
                                   </div>
                                   <div class="col-xl-12">
                                       <div class="wsus__login_form_input">
                                           <button type="submit" class="common_btn">Email Password Reset Link</button>
                                       </div>
                                   </div>
                               </div>
                           </form>
                           {{-- <p class="or">or</p>
                           <ul class="social_login d-flex flex-wrap">
                               <li>
                                   <a href="#">
                                       <span><img src="images/google_icon.png" alt="Google" class="img-fluid"></span>
                                       Google
                                   </a>
                               </li>
                           </ul> --}}
                       </div>
                   </div>
               </div>
           </div>
       </div>
       <a class="back_btn" href="/">Back to Home</a>
   </section>

@endsection