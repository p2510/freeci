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
                        <h3 style="font-size: 26px;">Mot de passe oublié !</h3>
                    </div>

                    @if (session('status'))
                        <x-alert-success message="Nous vous avons envoyé par email le lien de réinitialisation du mot de passe !" />
                    @endif

                    <!-- Form -->
                    <form method="post" id="register-account-form" action="{{ route('password.email') }}">
                        @csrf
                        <div class="input-with-icon-left">
                            <i class="icon-material-baseline-mail-outline"></i>
                            <input type="text" class="input-text with-border" name="email" id="emailaddress-register"
                                placeholder="Votre email" value="{{ old('email') }}" required />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        <!-- Button -->
                        <button class="button full-width button-sliding-icon ripple-effect margin-top-10"
                            type="submit">Rénitialisé<i class="icon-material-outline-arrow-right-alt"></i></button>
                    </form>



                </div>

            </div>
        </div>
    </div>
    <!-- Spacer -->
    <div class="margin-top-70"></div>
@endsection
