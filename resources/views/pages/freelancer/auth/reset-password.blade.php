@extends('layouts.user')
@section('title')
    Freeci - mot de passe oublié
@endsection
@section('content')
    <div id="titlebar" class="gradient">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                </div>
            </div>
        </div>
    </div>

    <!-- Page Content
            ================================================== -->
    <div class="container">
        <div class="row">
            <div class="col-xl-5 offset-xl-3">

                <div class="login-register-page">
                    <!-- Welcome Text -->
                    <div class="welcome-text">
                        <h3 style="font-size: 26px;">Nouveau mot de passe !</h3>
                    </div>


                    <!-- Form -->
                    <form method="post" id="register-account-form" action="{{ route('password.store') }}">
                        @csrf
                        <!-- Password Reset Token -->
                        <input type="hidden" name="token" value="{{ $request->route('token') }}">

                        <div class="input-with-icon-left">
                            <i class="icon-material-baseline-mail-outline"></i>
                            <input type="text" class="input-text with-border" name="email" id="emailaddress-register"
                                placeholder="Votre email" value="{{ old('email', $request->email) }}" required autofocus />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        <div class="input-with-icon-left" title="Au minimum 8 caratères" data-tippy-placement="bottom">
                            <i class="icon-material-outline-lock"></i>
                            <input type="password" class="input-text with-border" name="password" id="password-register"
                                placeholder="Mot de passe" value="{{ old('password') }}" required />
                            <x-input-error :messages="$errors->get('password')" class="mt-2 " />

                        </div>
                        <div class="input-with-icon-left" data-tippy-placement="bottom">
                            <i class="icon-material-outline-lock"></i>
                            <input type="password" class="input-text with-border" name="password_confirmation"
                                id="password-register" placeholder="Confirmation mot de passe"
                                value="{{ old('password_confirmation') }}" required />
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 " />

                        </div>

                        <!-- Button -->
                        <button class="button full-width button-sliding-icon ripple-effect margin-top-10"
                            type="submit">Modifier<i class="icon-material-outline-arrow-right-alt"></i></button>
                    </form>



                </div>

            </div>
        </div>
    </div>
    <!-- Spacer -->
    <div class="margin-top-70"></div>
@endsection
