<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Votre facture freeci</title>
	<link rel="stylesheet" href="{{ asset('app-assets/css/invoice.css') }}">
</head> 

<body>

<!-- Print Button -->
<div class="print-button-container">
	<a href="javascript:window.print()" class="print-button">Imprimer la facture</a>
</div>

@foreach ($data as $item)
	
<!-- Invoice -->
<div id="invoice">

	<!-- Header -->
	<div class="row">
		<div class="col-xl-6">
			<div id="logo"><img src="{{asset('images/logo.png')}}" alt="le logo de freeci"></div>
		</div>

		<div class="col-xl-6">	

			<p id="details">
				<strong>Date :</strong> {{$item->created_at}} <br>
				<strong>Commande :</strong> #{{$item->id}} <br>
				
				
			</p>
		</div>
	</div>


	<!-- Client & Supplier -->
	<div class="row">
		<div class="col-xl-12">
			<h2>Facture</h2>
		</div>
		

		<div class="col-xl-6">	
			<strong class="margin-bottom-5">Fournisseur</strong>
			<p>
				Freeci  <br>
				Côte D'ivoire <br>
				Abidjan <br>
			</p>
		</div>

		<div class="col-xl-6">	
			<strong class="margin-bottom-5">Client</strong>
			<p>
				{{Auth::user()->name}}<br>
				{{$item->email}} <br>
			</p>
		</div>
	</div>


	<!-- Invoice -->
	<div class="row">
		<div class="col-xl-12">
			<table class="margin-top-20">
				<tr>
					<th>Description</th>
					<th>Prix</th>
					<th>Total</th>
				</tr>

				<tr>
					<td>Plan {{$item->plan}}</td> 

					<td>{{$pricing}}F</td>
					<td>{{$pricing}} F</td>
				</tr>
			</table>
		</div>
		
		<div class="col-xl-4 col-xl-offset-8">	
			<table id="totals">
				<tr>
					<th>Total </th> 
					<th><span>{{$pricing}} F</span></th>
				</tr>
			</table>
		</div>
	</div>


	<!-- Footer -->
	<div class="row">
		<div class="col-xl-12">
			<ul id="footer">
				<li><span>www.freeci.ci</span></li>
				<li>support@freeci.ci</li>
				<li>+225 01 01 23 33 78</li>
			</ul>
		</div>
	</div>
		
</div>
@endforeach



</body>
</html>
