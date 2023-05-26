@extends('layouts.user')
@section('title')
    Freeci-Mission déjà accepté
@endsection
@section('content')
<div class="container margin-top-30">
	<div class="row">
		<div class="col-md-12">

			<div class="order-confirmation-page">
				<div class="breathing-icon"><i class="icon-feather-check"></i></div>
				<h2 class="margin-top-30">Vous avez  accepté un candidat!</h2>
				<p>Accéder à votre messagerie.</p>
				<a href="{{route('message.index.recrutor',$mission_title)}}" class="button ripple-effect-dark button-sliding-icon margin-top-30">Messagerie<i class="icon-material-outline-arrow-right-alt"></i></a>
			</div>

		</div>
	</div>
</div>
@endsection
