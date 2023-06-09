@extends('layouts.user')
@section('title')
    Freeci- Tarification
@endsection
@section('addTailwind')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
@endsection
@section('content')
<div class="section padding-top-60 padding-bottom-75">
    <div class="container">
        <div class="row">

            <div class="col-xl-12">
                <!-- Section Headline -->
                <div class="section-headline centered margin-top-0 margin-bottom-35">
                    <h3>Tarification</h3>
                </div>
            </div>


            <div class="col-xl-12">

                <!-- Billing Cycle  -->
                <div class="billing-cycle-radios margin-bottom-70">

                </div>

                <!-- Pricing Plans Container -->
                <div class="pricing-plans-container">

                    <!-- Plan -->
                    <div class="pricing-plan">
                        <h3>Basic </h3>
                        <p class="margin-top-10">Vous commençez en freelance et vous souhaitez essayer , ce pack est
                            pour vous.</p>
                        <div class="pricing-plan-label billed-monthly-label"><strong>1.000 F</strong></div>
                        <div class="pricing-plan-features">
                            <strong>Fonctionnalité du plan Basic</strong>
                            <ul class="list-2">
                                <li>3 Devis</li>
                                <li>Voir les autres dévis</li>
                                <li>Messagerie instantannée</li>

                            </ul>
                        </div>
                        <a href="{{ route('subscription.create', 'basic') }}"
                            class="button full-width margin-top-20">Acheter</a>
                    </div>

                    <!-- Plan -->
                    <div class="pricing-plan recommended">
                        <div class="recommended-badge">Recommandé</div>
                        <h3>Pro</h3>
                        <p class="margin-top-10">Vous avez de l'expérience et vous souhaitez vous mettre dans les
                            meilleures rangées </p>
                        <div class="pricing-plan-label billed-monthly-label"><strong>5.000 F</strong></div>
                        <div class="pricing-plan-features">
                            <strong>Fonctionnalité du plan Pro</strong>
                            <ul class="list-2">
                                <li>8 Devis</li>
                                <li>Badge Pro</li>
                                <li>Contact recruteur</li>
                                <li>Voir les autres dévis</li>
                                <li>Notifications par email</li>
                                <li>Messagerie instantannée</li>
                            </ul>
                        </div>
                        <a href="{{ route('subscription.create', 'pro') }}"
                            class="button full-width margin-top-20">Acheter</a>
                    </div>
                    <!-- Plan -->
                    <div class="pricing-plan">
                        <h3>Expert</h3>
                        <p class="margin-top-10">Mettez vous en tête dans les recherche et dévenez un leader .</p>
                        <div class="pricing-plan-label billed-monthly-label"><strong>8.000 F</strong></div>
                        <div class="pricing-plan-features">
                            <strong>Fonctionnalité du plan Expert</strong>
                            <ul class="list-2">
                                <li>15 Devis</li>
                                <li>Badge Expert</li>
                                <li>Contact recruteur</li>
                                <li>Missions exclusives</li>
                                <li>Voir les autres dévis</li>
                                <li>Notifications par SMS</li>
                                <li>Notifications par email</li>
                                <li>Messagerie instantannée</li>
                                <li>Nombre de vues sur votre profil</li>
                                <li>Bonus du pack : publicité de votre profil</li>

                            </ul>
                        </div>
                        <a href="{{ route('subscription.create', 'expert') }}"
                            class="button full-width margin-top-20">Acheter</a>
                    </div>

                </div>

            </div>

        </div>
    </div>
</div>
@endsection
