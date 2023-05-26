@extends('layouts.freelancer')
@section('title')
    Freeci- paiement résussi 
@endsection
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">

			<div class="order-confirmation-page">
				<div class="breathing-icon"><i class="icon-feather-check"></i></div>
				<h2 class="margin-top-30">Nous vous remercions de votre confiance!</h2>
				<p>Votre paiement a été traité avec succès.</p>
				<a href="{{route('invoice')}}" target="_blank" class="button ripple-effect-dark button-sliding-icon margin-top-30">Voir la facture<i class="icon-material-outline-arrow-right-alt"></i></a>
			</div>

		</div>
	</div>
</div>

@endsection 