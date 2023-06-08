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
                            <strong>Engager  pour n'importe quel travail</strong>
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
                    <form action="{{route('search')}}" method="post" class="intro-banner-search-form margin-top-95">
                        @csrf
                        @method('post')
                        <!-- Search Field -->
                        <div class="intro-search-field">
                            <label for="intro-keywords" class="field-title ripple-effect">Trouver une mission ?</label>
                            <input id="intro-keywords" value="" name="search" type="text" placeholder="Titre de mission | catégorie | mot clé">
                        </div>

                        <!-- Button -->
                        <div class="intro-search-button">
                            <button type='submit' class="button ripple-effect"
                                >Recherche</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Stats -->
            <div class="row">
                <div class="col-md-12">
                    <ul class="intro-stats margin-top-45 hide-under-992px">
                        <li>
                            <strong class="counter">{{count($missions)}}</strong>
                            <span>Missions publiées</span>
                        </li>

                        <li>
                            <strong class="counter">{{count($freelancers)}}</strong>
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
                        <a href="{{route('category.index','Informatique - Réseaux')}}" class="category-box">
                            <div class="category-box-icon">
                                <i class="icon-line-awesome-file-code-o"></i>
                            </div>
                            <div class="category-box-content">
                                <h3>Informatique - Réseaux</h3>
                                <p>Développeur web / Développeur Ios & Plus</p>
                            </div>
                        </a>

                        <!-- Category Box -->
                        <a href="{{route('category.index','Data - Analyse')}}" class="category-box">
                            <div class="category-box-icon">
                                <i class="icon-line-awesome-cloud-upload"></i>
                            </div>
                            <div class="category-box-content">
                                <h3>Data - Analyse</h3>
                                <p>Spécialiste data / Science & Plus</p>
                            </div>
                        </a>

                        <!-- Category Box -->
                        <a href="{{route('category.index','Banque - Finance - Assurance')}}" class="category-box">
                            <div class="category-box-icon">
                                <i class="icon-line-awesome-suitcase"></i>
                            </div>
                            <div class="category-box-content">
                                <h3>Banque - Finance - Assurance</h3>
                                <p>Auditeur, Comptable, Analyste financier & Plus</p>
                            </div>
                        </a>

                        <!-- Category Box -->
                        <a href="{{route('category.index','Secrétariat')}}" class="category-box">
                            <div class="category-box-icon">
                                <i class="icon-line-awesome-pencil"></i>
                            </div>
                            <div class="category-box-content">
                                <h3>Secrétariat</h3>
                                <p>Copywriter, Rédacteur créative, Traducteur & Plus</p>
                            </div>
                        </a>

                        <!-- Category Box -->
                        <a href="{{route('category.index','Marketing')}}" class="category-box">
                            <div class="category-box-icon">
                                <i class="icon-line-awesome-pie-chart"></i>
                            </div>
                            <div class="category-box-content">
                                <h3>Marketing</h3>
                                <p>Manager, Marketeur & Plus</p>
                            </div>
                        </a>

                        <!-- Category Box -->
                        <a href="{{route('category.index','Graphique - Design')}}" class="category-box">
                            <div class="category-box-icon">
                                <i class="icon-line-awesome-image"></i>
                            </div>
                            <div class="category-box-content">
                                <h3>Graphique - Design</h3>
                                <p>Designer, Designer web & Plus</p>
                            </div>
                        </a>

                        <!-- Category Box -->
                        <a href="{{route('category.index','Communication digital')}}" class="category-box">
                            <div class="category-box-icon">
                                <i class="icon-line-awesome-bullhorn"></i>
                            </div>
                            <div class="category-box-content">
                                <h3>Communication digital</h3>
                                <p>Community manager & Plus</p>
                            </div>
                        </a>

                        <!-- Category Box -->
                        <a href="{{route('category.index','Enseignement - Formation')}}" class="category-box">
                            <div class="category-box-icon">
                                <i class="icon-line-awesome-graduation-cap"></i>
                            </div>
                            <div class="category-box-content">
                                <h3>Enseignement - Formation</h3>
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
                        <a href="{{route('mission.index')}}" class="headline-link">Voir tous</a>
                    </div>

                    <!-- Jobs Container -->
                    <div class="listings-container compact-list-layout margin-top-35">

                        <!-- Job Listing -->
                        @foreach ($missions as $mission)
                            <a href="{{route('mission.show',$mission->title)}}" class="job-listing with-apply-button">

                                <!-- Job Listing Details -->
                                <div class="job-listing-details">

                                    <!-- Details -->
                                    <div class="job-listing-description">
                                        <h3 class="job-listing-title">{{ $mission->title }}</h3>

                                        <!-- Job Listing Footer -->
                                        <div class="job-listing-footer">
                                            <ul>

                                                <li><i class="icon-material-outline-location-on"></i>
                                                    @if ($mission->type_mission == '1')
                                                        En ligne
                                                    @else
                                                        Sur place
                                                    @endif
                                                </li>
                                                <li><i class="icon-material-outline-access-time"></i>
                                                    {{ $mission->created_at }}</li>
                                                <li><i class="icon-material-outline-business-center"></i>
                                                    @if ($mission->type_budget == '1')
                                                        {{ $mission->budget_min }}F - {{ $mission->budget_max }}F En une
                                                        fois
                                                    @else
                                                        {{ $mission->budget_min }}F - {{ $mission->budget_max }}F Par jour
                                                    @endif

                                                </li>

                                            </ul>
                                        </div>
                                    </div>

                                    <!-- Apply Button -->
                                    <span class="list-apply-button ripple-effect">Postuler</span>
                                </div>
                            </a>
                        @endforeach



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
                        <a href="{{route('freelancer.index')}}" class="headline-link">Tous les freelancers</a>
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
                                            <button class="button gray ripple-effect">Membre
                                                {{ $freelancer->created_at }}</button> <br>
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
                                            @if ($freelancer->plan)
                                                <li>Certifié

                                                    @if ($freelancer->plan == 'pro')
                                                        <strong
                                                            style="color:white;text-transform:capitalize;background-color:#febe42;text-align:center;">{{ $freelancer->plan }}</strong>
                                                    @elseif ($freelancer->plan == 'expert')
                                                        <strong
                                                            style="color:white;text-transform:capitalize;background-color:#38b653;text-align:center;">{{ $freelancer->plan }}</strong>
                                                    @endif
                                            @endif

                                            </li>
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
