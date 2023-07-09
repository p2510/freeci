@extends('layouts.user')
@section('title')
    Freeci-Les nouveaux freelancers
@endsection
@section('addTailwind')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
@endsection
@section('content')
    <!-- Spacer -->
    <div class="margin-top-90"></div>
    <div class="container">
        <div class="row">
         
            <div class="col-xl-12 col-lg-12 content-left-offset">




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
                                                     title="{{ $freelancer->name }}"
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
              
                <!-- Pagination / End -->
                <div class="pagination-container margin-top-20 margin-bottom-20">

                </div>

            </div>
        </div>
    </div>
@endsection
