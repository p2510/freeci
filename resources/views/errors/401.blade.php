@extends('layouts.error')

@section('title')
    Accès interdit
@endsection
@section('content')

<!-- Page Content
================================================== -->
<!-- Container -->
<div class="container">

	<div class="row">
		<div class="col-xl-12">

			<section id="not-found" class="center">
				<h2>401 <i class="icon-line-awesome-question-circle"></i></h2>
				<p>L'accès est interdit . Veillez vous authentifier</p>
			</section>

		</div>
	</div>

</div>
<!-- Container / End -->
@endsection
