

@extends('layouts.error')
@section('title')
    Interdit
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
				<p>{{__($exception->getMessage() ?: 'Interdit')}}</p>
			</section>

		</div>
	</div>

</div>
<!-- Container / End -->
@endsection

