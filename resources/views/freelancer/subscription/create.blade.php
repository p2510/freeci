@extends('layouts.freelancer')
@section('title')
    Freeci-Acheter un pack
@endsection
@section('content')
    <div id="titlebar" class="gradient">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <h2>Acheter un pack</h2>

                </div>
            </div>
        </div>
    </div>


    <!-- Content
                ================================================== -->
    <!-- Container -->


    <!-- Billing Cycle Radios  -->
    @livewire('choose-plan', ['plan' => $plan])
@endsection
