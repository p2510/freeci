@extends('layouts.user')
@section('title')
    Freeci-Les freelancers en ligne
@endsection
@section('addTailwind')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
@endsection
@section('content')
    <!-- Spacer -->
    <div class="margin-top-90"></div>
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-4">
                <div class="sidebar-container">

                    <!-- Category -->
                    <div class="sidebar-widget">
                        <h3>Categories</h3>
                        <select class="selectpicker default" multiple data-selected-text-format="count" data-size="7"
                            title="Tous">
                            @foreach ($categories as $category)
                                <option>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Keywords -->
                    <div class="sidebar-widget">
                        <h3>Compétences réquis</h3>
                        <div class="keywords-container">
                            <div class="keyword-input-container">
                                <input type="text" class="keyword-input" placeholder="ex: Php , Sage , Photoshop" />
                                <button class="keyword-input-button ripple-effect"><i
                                        class="icon-material-outline-add"></i></button>
                            </div>
                            <div class="keywords-list">
                                <!-- keywords go here -->
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>

                    <!-- Hourly Rate -->
                    <div class="sidebar-widget">
                        <h3>Tarif journalier (xof)</h3>
                        <div class="margin-top-55"></div>

                        <!-- Range Slider -->
                        <input class="range-slider" type="text" value="" data-slider-currency=""
                            data-slider-min="100" data-slider-max="10000000" data-slider-step="100"
                            data-slider-value="[100,10000000]" />
                    </div>

                    <!-- Tags -->
                    <div class="sidebar-widget">

                        <div class="margin-top-15">
                            <button class="button ripple-effect">Recherche</button>
                        </div>
                    </div>
                    <div class="clearfix"></div>

                </div>
            </div>
            <div class="col-xl-9 col-lg-8 content-left-offset">




                <!-- Freelancers List Container -->
                <div class="freelancers-container freelancers-list-layout margin-top-35">

                    @foreach ($freelancers as $freelancer)
                        <!--Freelancer -->
                        <div class="freelancer">

                            <!-- Overview -->
                            <div class="freelancer-overview">
                                <div class="freelancer-overview-inner">

                                    <!-- Bookmark Icon -->
                                    <span class="bookmark-icon"></span>

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
                                        <h4><a href="{{ route('freelancer.show', $freelancer->name) }}">{{ $freelancer->name }}
                                                <img class="flag" src="images/flags/gb.svg" alt=""
                                                    title="United Kingdom" data-tippy-placement="top"></a></h4>
                                        <span>{{ $freelancer->domain }}</span>

                                    </div>
                                </div>
                            </div>

                            <!-- Details -->
                            <div class="freelancer-details">
                                <div class="freelancer-details-list">
                                    <ul>
                                        <li>Disponible<strong><i class="icon-material-outline-location-on"></i>
                                                @if ($freelancer->visibility)
                                                    Oui
                                                @else
                                                    Non
                                                @endif
                                            </strong>
                                        </li>
                                        <li>Tarif<strong>{{ $freelancer->tjm }} f / J</strong></li>

                                    </ul>
                                </div>
                                <a href="{{ route('freelancer.show', $freelancer->name) }}"
                                    class="button button-sliding-icon ripple-effect">Voir le profil <i
                                        class="icon-material-outline-arrow-right-alt"></i></a>
                            </div>
                        </div>
                        <!-- Freelancer / End -->
                    @endforeach






                </div>
                <!-- Tasks Container / End -->


                <!-- Pagination -->
                <div class="clearfix"></div>
                {!! $freelancers->withQueryString()->links() !!}
                <!-- Pagination / End -->
                <div class="pagination-container margin-top-20 margin-bottom-20">

                </div>

            </div>
        </div>
    </div>
@endsection
