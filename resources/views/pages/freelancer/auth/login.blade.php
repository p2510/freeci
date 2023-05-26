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
					<h3 style="font-size: 26px;">Nous sommes heureux de vous revoir !</h3>
					<span>Je n'ai pas de compte ? <a href="{{route('register')}}">inscription !</a></span>
				</div>

				<!-- Form -->
				<form method="post" id="register-account-form"  action="{{ route('login') }}">
                    @csrf

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


                    <!-- Button -->
                    <button class="button full-width button-sliding-icon ripple-effect margin-top-10" type="submit" >Me connecter<i class="icon-material-outline-arrow-right-alt"></i></button>
				</form>
				
				
				<!-- Social Login -->
				<div class="social-login-separator"><span>ou</span></div>
				<div class="social-login-buttons">
					<button class="facebook-login ripple-effect"><i class="icon-brand-facebook-f"></i> Connexion via Facebook</button>
					<button class="google-login ripple-effect"><i class="icon-brand-google-plus-g"></i> Connexion via Google+</button>
				</div>
			</div>

		</div>
	</div>
</div>
<!-- Spacer -->
<div class="margin-top-70"></div>

@endsection