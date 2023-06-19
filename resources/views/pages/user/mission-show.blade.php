@extends('layouts.user')
@section('title')
    Freeci mission- {{ $mission->title }}
@endsection
@section('content')
    <!-- Titlebar
                                                                                    ================================================== -->
    <div class="single-page-header" data-background-image="{{ asset('images/mission_background.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="single-page-header-inner">
                        <div class="left-side">
                            <div class="header-details">
                                <h3>{{ $mission->title }}</h3>
                                <h5>Publié {{ $mission->created_at }}</h5>

                            </div>
                        </div>
                        <div class="right-side">
                            <div class="salary-box">
                                @if ($mission->type_budget == '1')
                                    <div class="salary-type">Budget une fois</div>
                                @else
                                    <div class="salary-type">Budget par jour</div>
                                @endif

                                <div class="salary-amount">{{ $mission->budget_min }}F - {{ $mission->budget_max }}F</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Page Content
                                                                                    ================================================== -->

    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 ">


                @if ($applied != 0)
                    <x-alert-warning message="Vous avez  postulé à cette mission . " />
                @endif
            </div>

            <!-- Content -->
            <div class="col-xl-8 col-lg-8 content-right-offset">

                <!-- Description -->
                <div class="single-page-section">
                    <h3 class="margin-bottom-25">Description du projet</h3>
                    <p>{{ $mission->description }}</p>


                </div>



                <!-- Skills -->
                <div class="single-page-section">
                    <h3>Compétences requis</h3>
                    <div class="task-tags">
                        @foreach ($mission->tags as $tag)
                            <span>{{ $tag }}</span>
                        @endforeach

                    </div>
                </div>
                <div class="clearfix"></div>
      
                <!-- phone
                <div class="single-page-section">
                    <h3>Contact récruteur</h3>

                    @can('check-pro')
                        <div class="task-tags">
                            <span> {{ $mission->phone }}</span>
                        </div>
                    @elsecan('check-expert')
                        <div class="task-tags">
                            <span> {{ $mission->phone }}</span>
                        </div>
                    @else
                        <span>Cette fonctionnalité est accessible aux freelancers pro ou expert</span> <br>
                        <a href="{{ route('subscription.create', 'pro') }}" class="button ripple-effect">Devenez Pro →</a>
                    @endcan


                </div>
                <div class="clearfix"></div>
                -->

                <!-- Freelancers Bidding -->
                <div class="boxed-list margin-bottom-60">
                    <div class="boxed-list-headline">
                        <h3><i class="icon-material-outline-group"></i> Les propositions des autres candidats</h3>
                    </div>

                    @can('check-pro')
                        <ul class="boxed-list-ul">
                            @foreach ($applicants as $applicant)
                                <li>
                                    <div class="bid">
                                        <!-- Avatar -->
                                        <div class="bids-avatar">
                                            <div class="freelancer-avatar">
                                                <div class="verified-badge"></div>
                                                <a href="{{ route('freelancer.show', $applicant->name) }}">
                                                    @if (is_null($applicant->profil_photo))
                                                        <img src="{{ asset('images/user_avatar_placeholder.png') }}"
                                                            alt="Photo de profile de {{ $applicant->name }}">
                                                    @else
                                                        <img src="{{ asset('storage/profil_photo/' . $applicant->profil_photo) }}"
                                                            alt="Photo de profile de {{ $applicant->name }}">
                                                    @endif
                                                </a>
                                            </div>
                                        </div>
                                        <!-- Content -->
                                        <div class="bids-content">
                                            <!-- Name -->
                                            <div class="freelancer-name">
                                                <h4>{{ $applicant->name }}</h4>
                                            </div>
                                        </div>
                                        <!-- Bid -->
                                        <div class="bids-bid">
                                            <div class="bid-rate">
                                                <div class="rate">{{ $applicant->budget }} F</div>

                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @elsecan('check-expert')
                        <ul class="boxed-list-ul">
                            @foreach ($applicants as $applicant)
                                <li>
                                    <div class="bid">
                                        <!-- Avatar -->
                                        <div class="bids-avatar">
                                            <div class="freelancer-avatar">
                                                <div class="verified-badge"></div>
                                                <a href="{{ route('freelancer.show', $applicant->name) }}">
                                                    @if (is_null($applicant->profil_photo))
                                                        <img src="{{ asset('images/user_avatar_placeholder.png') }}"
                                                            alt="Photo de profile de {{ $applicant->name }}">
                                                    @else
                                                        <img src="{{ asset('storage/profil_photo/' . $applicant->profil_photo) }}"
                                                            alt="Photo de profile de {{ $applicant->name }}">
                                                    @endif
                                                </a>
                                            </div>
                                        </div>
                                        <!-- Content -->
                                        <div class="bids-content">
                                            <!-- Name -->
                                            <div class="freelancer-name">
                                                <h4>{{ $applicant->name }}</h4>
                                            </div>
                                        </div>
                                        <!-- Bid -->
                                        <div class="bids-bid">
                                            <div class="bid-rate">
                                                <div class="rate">{{ $applicant->budget }} F</div>

                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <ul class="boxed-list-ul">

                            <li>
                                <span>Cette fonctionnalité est accessible aux freelancers pro ou expert</span> <br>
                                <a href="{{ route('subscription.create', 'pro') }}" class="button ripple-effect">Devenez Pro
                                    →</a>
                            </li>
                        </ul>
                    @endcan



                </div>

            </div>


            <!-- Sidebar -->
            <div class="col-xl-4 col-lg-4">
                <div class="sidebar-container">

                    <div class="countdown green margin-bottom-35">
                        @if ($mission->type_mission == '1')
                            En ligne
                        @else
                            Sur place
                        @endif
                    </div>

                    @if ($applied == 0)
                        <form class="sidebar-widget" method="post"
                            action="{{ route('applicant.mission.store', $mission->title) }}">
                            @csrf
                            <div class="bidding-widget">
                                <div class="bidding-headline">
                                    <h3>Postuler !</h3>
                                </div>
                                <div class="bidding-inner">

                                    <!-- Headline -->
                                    <span class="bidding-detail">Votre prix <strong>minimum</strong></span>

                                    <!-- Price Slider -->
                                    <div class="bidding-value"><span id="biddingVal"></span> F</div>

                                    <input class="bidding-slider" type="text" name="budget" data-slider-handle="custom"
                                        data-slider-currency="F" data-slider-min="{{ $mission->budget_min }}"
                                        data-slider-max="{{ $mission->budget_max }}" data-slider-value="auto"
                                        data-slider-step="100" data-slider-tooltip="hide" />





                                    <!-- Button -->
                                    <button type="submit" id="snackbar-place-bid"
                                        class="button ripple-effect move-on-hover full-width margin-top-30"><span>Postuler</span></button>

                                </div>

                            </div>
                        </form>
                    @endif

                    <!-- Sidebar Widget -->
                    <div class="sidebar-widget">
                        <h3>Partager</h3>

                        <!-- Copy URL -->
                        <div class="copy-url">
                            <input id="copy-url" type="text" value="" class="with-border">
                            <button class="copy-url-button ripple-effect" data-clipboard-target="#copy-url"
                                title="Copier l'url" data-tippy-placement="top"><i
                                    class="icon-material-outline-file-copy"></i></button>
                        </div>

                        <!-- Share Buttons -->
                        <div class="share-buttons margin-top-25">
                            <div class="share-buttons-trigger"><i class="icon-feather-share-2"></i></div>

                            
                            <x-social-share :share-url="$shareUrl"/>

                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
@endsection


