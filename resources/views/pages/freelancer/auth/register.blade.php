@extends('layouts.user')
@section('title')
    Freeci - inscription freelancer
@endsection
@section('content')
<div id="titlebar" class="gradient">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h2>Devenir freelancer </h2>


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
					<h3 style="font-size: 26px;">Créons votre compte !</h3>
					<span>Vous avez déjà un compte ? <a href="pages-login.html">Connexion !</a></span>
				</div>

				<!-- Form -->
				<form method="post" id="register-account-form"  action="{{ route('register') }}">
                    @csrf
                    <div class="input-with-icon-left">
						<i class="icon-material-outline-group"></i>
						<input type="text" class="input-text with-border" name="name" id="name" placeholder="Nom et prénom" value="{{old('name')}}" required/>
                        <x-input-error :messages="$errors->get('name')" class="mt-2 " />
					</div>
					<div class="input-with-icon-left">
						<i class="icon-material-baseline-mail-outline"></i>
						<input type="text" class="input-text with-border" name="email" id="emailaddress-register" placeholder="Votre email" value="{{old('email')}}" required/>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
					</div>
					<div class="input-with-icon-left" title="Au minimum 8 caratères" data-tippy-placement="bottom">
						<i class="icon-material-outline-lock"></i>
						<input type="password" class="input-text with-border" name="password" id="password-register" placeholder="Mot de passe" value="{{old('password')}}" required/>
                        <x-input-error :messages="$errors->get('password')" class="mt-2 " />

					</div>

					<div class="input-with-icon-left">
						<i class="icon-material-outline-lock"></i>
						<input type="password" class="input-text with-border" name="password_confirmation" id="password-repeat-register" placeholder="Confirmer mot de passe"  required/>
                        <x-input-error :messages="$errors->get('confirm_password')" class="mt-2 text-danger" />
					</div>
                    <!-- Button -->
                    <button class="button full-width button-sliding-icon ripple-effect margin-top-10" type="submit" >M'inscrire <i class="icon-material-outline-arrow-right-alt"></i></button>
				</form>
				
				
				<!-- Social Login -->
				<div class="social-login-separator"><span>ou</span></div>
				<div class="social-login-buttons">
					<button class="facebook-login ripple-effect"><i class="icon-brand-facebook-f"></i> Inscription via Facebook</button>
					<button class="google-login ripple-effect"><i class="icon-brand-google-plus-g"></i> Inscription via Google+</button>
				</div>
			</div>

		</div>
	</div>
</div>
<!-- Spacer -->
<div class="margin-top-70"></div>

@endsection