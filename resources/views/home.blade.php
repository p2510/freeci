@extends('layouts.user')
@section('title')
    Freeci
@endsection
@section('content')
    <!-- add class "disable-gradient" to enable consistent background overlay -->
    <div class="intro-banner" data-background-image="{{ asset('images/home-background.jpg') }}">
        <div class="container">

            <!-- Intro Headline -->
            <div class="row">
                <div class="col-md-12">
                    <div class="banner-headline">
                        <h3>
                            <strong>Engagez ou embauché pour n'importe quel travail</strong>
                            <br>
                            <span>Des centaines de personnes utilisent <strong class="color">Freeci</strong> pour
                                concretiser leurs projets.</span>
                        </h3>
                    </div>
                </div>
            </div>

            <!-- Search Bar -->
            <div class="row">
                <div class="col-md-12">
                    <div class="intro-banner-search-form margin-top-95">

                        <!-- Search Field -->
                        <div class="intro-search-field with-autocomplete">
                            <label for="autocomplete-input" class="field-title ripple-effect">Où?</label>
                            <div class="input-with-icon">
                                <input id="autocomplete-input" type="text" placeholder="Localisation">
                                <i class="icon-material-outline-location-on"></i>
                            </div>
                        </div>

                        <!-- Search Field -->
                        <div class="intro-search-field">
                            <label for="intro-keywords" class="field-title ripple-effect">Trouver une mission ?</label>
                            <input id="intro-keywords" type="text" placeholder="Titre de mission or mot clé">
                        </div>

                        <!-- Button -->
                        <div class="intro-search-button">
                            <button class="button ripple-effect"
                                onclick="window.location.href='{{ route('home') }}'">Recherche</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stats -->
            <div class="row">
                <div class="col-md-12">
                    <ul class="intro-stats margin-top-45 hide-under-992px">
                        <li>
                            <strong class="counter">1,586</strong>
                            <span>Missions publiées</span>
                        </li>

                        <li>
                            <strong class="counter">100</strong>
                            <span>Freelancers</span>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
    <!-- Category Boxes -->
    <div class="section margin-top-65">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">

                    <div class="section-headline centered margin-bottom-15">
                        <h3>Catégories populaires</h3>
                    </div>

                    <!-- Category Boxes Container -->
                    <div class="categories-container">

                        <!-- Category Box -->
                        <a href="jobs-grid-layout-full-page.html" class="category-box">
                            <div class="category-box-icon">
                                <i class="icon-line-awesome-file-code-o"></i>
                            </div>
                            <div class="category-box-counter">15</div>
                            <div class="category-box-content">
                                <h3>Data IT & Tech</h3>
                                <p>Développeur web / Développeur Ios & Plus</p>
                            </div>
                        </a>

                        <!-- Category Box -->
                        <a href="jobs-list-layout-full-page-map.html" class="category-box">
                            <div class="category-box-icon">
                                <i class="icon-line-awesome-cloud-upload"></i>
                            </div>
                            <div class="category-box-counter">113</div>
                            <div class="category-box-content">
                                <h3>Data Science & Analyse</h3>
                                <p>Spécialiste data / Science & Plus</p>
                            </div>
                        </a>

                        <!-- Category Box -->
                        <a href="jobs-list-layout-full-page-map.html" class="category-box">
                            <div class="category-box-icon">
                                <i class="icon-line-awesome-suitcase"></i>
                            </div>
                            <div class="category-box-counter">186</div>
                            <div class="category-box-content">
                                <h3>Comptabilité & Consultant</h3>
                                <p>Auditeur, Comptable, Analyste financier & Plus</p>
                            </div>
                        </a>

                        <!-- Category Box -->
                        <a href="jobs-list-layout-1.html" class="category-box">
                            <div class="category-box-icon">
                                <i class="icon-line-awesome-pencil"></i>
                            </div>
                            <div class="category-box-counter">298</div>
                            <div class="category-box-content">
                                <h3>Rédacteurs & Traducteurs</h3>
                                <p>Copywriter, Rédacteur créative, Traducteur & Plus</p>
                            </div>
                        </a>

                        <!-- Category Box -->
                        <a href="jobs-list-layout-2.html" class="category-box">
                            <div class="category-box-icon">
                                <i class="icon-line-awesome-pie-chart"></i>
                            </div>
                            <div class="category-box-counter">549</div>
                            <div class="category-box-content">
                                <h3> Marketing</h3>
                                <p>Manager, Marketeur & Plus</p>
                            </div>
                        </a>

                        <!-- Category Box -->
                        <a href="jobs-list-layout-1.html" class="category-box">
                            <div class="category-box-icon">
                                <i class="icon-line-awesome-image"></i>
                            </div>
                            <div class="category-box-counter">873</div>
                            <div class="category-box-content">
                                <h3>Graphique & Design</h3>
                                <p>Designer, Designer web & Plus</p>
                            </div>
                        </a>

                        <!-- Category Box -->
                        <a href="jobs-list-layout-2.html" class="category-box">
                            <div class="category-box-icon">
                                <i class="icon-line-awesome-bullhorn"></i>
                            </div>
                            <div class="category-box-counter">125</div>
                            <div class="category-box-content">
                                <h3>Marketing digital</h3>
                                <p>Community manager & Plus</p>
                            </div>
                        </a>

                        <!-- Category Box -->
                        <a href="jobs-grid-layout-full-page.html" class="category-box">
                            <div class="category-box-icon">
                                <i class="icon-line-awesome-graduation-cap"></i>
                            </div>
                            <div class="category-box-counter">445</div>
                            <div class="category-box-content">
                                <h3>Education & Entrainement</h3>
                                <p>Professeur , Coach, Répétiteur & Plus</p>
                            </div>
                        </a>

                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Features Jobs -->
    <div class="section gray margin-top-45 padding-top-65 padding-bottom-75">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">

                    <!-- Section Headline -->
                    <div class="section-headline margin-top-0 margin-bottom-35">
                        <h3>Dernières missions</h3>
                        <a href="jobs-list-layout-full-page-map.html" class="headline-link">Voir tous</a>
                    </div>

                    <!-- Jobs Container -->
                    <div class="listings-container compact-list-layout margin-top-35">

                        <!-- Job Listing -->
                        <a href="single-job-page.html" class="job-listing with-apply-button">

                            <!-- Job Listing Details -->
                            <div class="job-listing-details">

                                <!-- Logo -->
                                <div class="job-listing-company-logo">
                                    <img src="images/company-logo-01.png" alt="">
                                </div>

                                <!-- Details -->
                                <div class="job-listing-description">
                                    <h3 class="job-listing-title">Bilingual Event Support Specialist</h3>

                                    <!-- Job Listing Footer -->
                                    <div class="job-listing-footer">
                                        <ul>
                                            <li><i class="icon-material-outline-business"></i> Hexagon <div
                                                    class="verified-badge" title="Verified Employer"
                                                    data-tippy-placement="top"></div>
                                            </li>
                                            <li><i class="icon-material-outline-location-on"></i> San Francissco</li>
                                            <li><i class="icon-material-outline-business-center"></i> Full Time</li>
                                            <li><i class="icon-material-outline-access-time"></i> 2 days ago</li>
                                        </ul>
                                    </div>
                                </div>

                                <!-- Apply Button -->
                                <span class="list-apply-button ripple-effect">Postuler</span>
                            </div>
                        </a>



                    </div>
                    <!-- Jobs Container / End -->

                </div>
            </div>
        </div>
    </div>

    <!-- Highest Rated Freelancers -->
    <div class="section gray padding-top-65 padding-bottom-70 full-width-carousel-fix">
        <div class="container">
            <div class="row">

                <div class="col-xl-12">
                    <!-- Section Headline -->
                    <div class="section-headline margin-top-0 margin-bottom-25">
                        <h3>Freelancers recommandés</h3>
                        <a href="freelancers-grid-layout.html" class="headline-link">Tous les freelancers</a>
                    </div>
                </div>

                <div class="col-xl-12">
                    <div class="default-slick-carousel freelancers-container freelancers-grid-layout">

                        @foreach ($freelancers as $freelancer)
                            <!--Freelancer -->
                            <div class="freelancer">

                                <!-- Overview -->
                                <div class="freelancer-overview">
                                    <div class="freelancer-overview-inner">

                                  
                                        

                                        <!-- Avatar -->
                                        <div class="freelancer-avatar">
                                            <div class="verified-badge"></div>
                                            <a href="single-freelancer-profile.html">
                                                @if ($freelancer->profil_photo !== null)
                                                    <img src="{{ asset('storage/profil_photo/' . $freelancer->profil_photo) }}"
                                                        alt="" title="{{ $freelancer->name }}"
                                                        data-tippy-placement="top"
                                                        alt="Photo de profile de  {{ $freelancer->name }} sur Freeci">
                                                @else
                                                    <img src="https://ui-avatars.com/api/?name={{ $freelancer->name }}&background=2A41E8&color=fff"
                                                        title="{{ $freelancer->name }}"
                                                        alt="Photo de profile de {{ $freelancer->name }} sur Freeci">
                                                @endif
                                            </a>
                                        </div>

                                        <!-- Name -->
                                        <div class="freelancer-name">
                                            <h4><a href="single-freelancer-profile.html"
                                                    class="text-capitalize">{{ $freelancer->name }}
                                                    <img class="flag" src="images/flags/gb.svg" alt=""
                                                        title="United Kingdom" data-tippy-placement="top">
                                                </a></h4>
                                            <span>{{ $freelancer->job }}</span>
                                        </div>

                                        <!-- Rating -->
                                        <div class="freelancer-rating">
                                            <div class="star-rating" data-rating="5.0"></div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Details -->
                                <div class="freelancer-details">
                                    <div class="freelancer-details-list">
                                        <ul>
                                            <li>Disponible <strong><i class="icon-material-outline-location-on"></i>
                                                    @if ($freelancer->visibility)
                                                    Oui
                                                    @else
                                                    Non
                                                    @endif 
                                                </strong>
                                            </li>
                                            <li>Tarif <strong>{{ $freelancer->tjm }} f / J</strong></li>
                                            <li>Certifié <strong class="paid " style="color:white;">Expert </strong></li>
                                        </ul>
                                    </div>
                                    <a href="{{ route('freelancer.show', $freelancer->name) }}"
                                        class="button button-sliding-icon ripple-effect">Voir profil<i
                                            class="icon-material-outline-arrow-right-alt"></i></a>
                                </div>
                            </div>
                            <!-- Freelancer / End -->
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="section padding-top-60 padding-bottom-75">
        <div class="container">
            <div class="row">

                <div class="col-xl-12">
                    <!-- Section Headline -->
                    <div class="section-headline centered margin-top-0 margin-bottom-35">
                        <h3>Devenir Freelancer</h3>
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
                                </ul>
                            </div>
                            <a href="{{route('subscription.create','basic')}}" class="button full-width margin-top-20">Acheter</a>
                        </div>

                        <!-- Plan -->
                        <div class="pricing-plan recommended">
                            <div class="recommended-badge">Recommandé</div>
                            <h3>Pro</h3>
                            <p class="margin-top-10">Vous avez de l'expérience et vous souhaitez vous mettre dans les
                                meilleures rangées </p>
                            <div class="pricing-plan-label billed-monthly-label"><strong>3.000 F</strong></div>
                            <div class="pricing-plan-features">
                                <strong>Fonctionnalité du plan Pro</strong>
                                <ul class="list-2">
                                    <li>8 Devis</li>
                                    <li>Badge Pro</li>
                                    <li>Contact recruteur</li>
                                    <li>Voir les autres dévis</li>
                                    <li>Notifications par email</li>
                                </ul>
                            </div>
                            <a href="{{route('subscription.create','pro')}}" class="button full-width margin-top-20">Acheter</a>
                        </div>

                        <!-- Plan -->
                        <div class="pricing-plan">
                            <h3>Expert</h3>
                            <p class="margin-top-10">Mettez vous en tête dans les recherche et dévenez un leader .</p>
                            <div class="pricing-plan-label billed-monthly-label"><strong>10.000 F</strong></div>
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
                                    <li>Bonus du pack : publicité</li>

                                </ul>
                            </div>
                            <a href="{{route('subscription.create','expert')}}" class="button full-width margin-top-20">Acheter</a>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>


@endsection
