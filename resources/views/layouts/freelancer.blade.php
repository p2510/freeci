<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>


    <!-- Basic Page Needs
================================================== -->
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    @yield('addTailwind')

    <!-- CSS
================================================== -->
    <link rel="stylesheet" href="{{ asset('app-assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('app-assets/css/colors/blue.css') }}">
    <link rel="shortcut icon" href="{{ asset('images/icon.png') }}" type="image/x-icon">
    @livewireStyles


</head>

<body>

    <!-- Wrapper -->
    <div id="wrapper">

        <!-- Header Container
================================================== -->
        <header id="header-container" class="fullwidth">

            <!-- Header -->
            <div id="header">
                <div class="container">

                    <!-- Left Side Content -->
                    <div class="left-side">

                        <!-- Logo -->
                        <div id="logo">
                            <a href="{{ route('home') }}"><img src="{{ asset('images/logo.png') }}" alt=""></a>
                        </div>

                        <!-- Main Navigation -->
                        <nav id="navigation">
                            <ul id="responsive">
                                <li><a href="#">Embauchez</a>
                                    <ul class="dropdown-nav">
                                        <li><a href="{{ route('mission.create') }}">Publier mission</a></li>
                                        <li><a href="dashboard-post-a-task.html">Publier projet</a></li>
                                        <li><a href="{{ route('follow.search') }}">Codes suivis</a></li>
                                        <li><a href="{{ route('freelancer.index') }}">Les freelancers</a>
                                            <ul class="dropdown-nav">
                                                <li><a href="{{ route('freelancer.online') }}">En ligne</a></li>
                                                <li><a href="{{ route('freelancer.new') }}">les nouveaux</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="#">Trouver des emplois</a>
                                    <ul class="dropdown-nav">
                                        <li><a href="{{ route('mission.index') }}">Missions</a></li>
                                        <li><a href="single-task-page.html">Grands projets</a></li>
                                        <li><a href="#">Recherche par</a>
                                            <ul class="dropdown-nav">
                                                <li><a href="{{ route('mission.recent') }}">Plus récents</a></li>
                                                <li><a href="{{ route('mission.featured') }}">En vedette</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="#">Comment ça fonctionne</a>
                                    <ul class="dropdown-nav">
                                        <li><a href="dashboard.html">Tarification</a></li>
                                        <li><a href="dashboard-messages.html">Qui sommes nous ?</a></li>
                                        <li><a href="dashboard-bookmarks.html">Pourquoi Freeci</a></li>
                                        <li><a href="dashboard-reviews.html">Blog</a></li>

                                        <li><a href="dashboard-manage-tasks.html">Faq</a>
                                            <ul class="dropdown-nav">
                                                <li><a href="dashboard-manage-tasks.html">Freelancer</a></li>
                                                <li><a href="dashboard-manage-bidders.html">Recruteur</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="dashboard-settings.html">Support</a></li>

                                    </ul>
                                </li>
                                @guest
                                    <li><a href="#">Compte</a>
                                        <ul class="dropdown-nav">
                                            <li><a href="{{ route('register') }}">Dévenir freelancer</a></li>
                                            <li><a href="{{ route('login') }}">Se connecter</a></li>
                                        </ul>
                                    </li>
                                @endguest
                                <a href="#" class=" button ripple-effect">Publier une mission</a>


                            </ul>
                        </nav>
                        <div class="clearfix"></div>
                        <!-- Main Navigation / End -->

                    </div>
                    <!-- Left Side Content / End -->

                    <!-- Right Side Content / End -->
                    <div class="right-side">

                        @auth
                            <!--  User Notifications -->
                            <div class="header-widget hide-on-mobile">

                                <!-- Notifications -->
                                <div class="header-notifications">

                                    <!-- Trigger -->
                                    <div class="header-notifications-trigger">
                                        <a href="#"><i class="icon-feather-bell"></i><span>{{count($notifications)}}</span></a>
                                    </div>

                                    <!-- Dropdown -->
                                    <div class="header-notifications-dropdown">

                                        <div class="header-notifications-headline">
                                            <h4>Notifications</h4>
                                            <button onClick="window.location.href='{{route('notifcation.readall') }}'" class="mark-as-read ripple-effect-dark" title="tout marquer comme lu"
                                                data-tippy-placement="left">
                                                <i
                                                        class="icon-feather-check-square"></i>
                                            </button>
                                        </div>

                                        <div class="header-notifications-content">
                                            <div class="header-notifications-scroll" data-simplebar>
                                                <ul>
                                                    <!-- Notification -->
                                                    @foreach ($notifications as $notification)
                                                        <li class="notifications-not-read">
                                                            <a href="{{ route('notifcation.read', $notification->id) }}">
                                                                <span class="notification-icon"><i
                                                                        class="icon-material-outline-group"></i></span>
                                                                <span class="notification-text">
                                                                    <strong>{{ $notification->data['title'] }}</strong>
                                                                    <span
                                                                        class="color">{{ $notification->data['description'] }}</span>
                                                                </span>
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                    

                            </div>
                            <!--  User Notifications / End -->

                            <!-- User Menu -->
                            <div class="header-widget">

                                <!-- Messages -->
                                <div class="header-notifications user-menu">
                                    <div class="header-notifications-trigger">
                                        <a href="#">
                                            <div class="user-avatar status-online">
                                                <x-profil-photo />
                                            </div>
                                        </a>
                                    </div>

                                    <!-- Dropdown -->
                                    <div class="header-notifications-dropdown">

                                        <!-- User Status -->
                                        <div class="user-status">

                                            <!-- User Name / Avatar -->
                                            <div class="user-details">
                                                <div class="user-avatar status-online">
                                                    @if (Auth::user()->profil_photo !== null)
                                                        <img src="{{ asset('storage/profil_photo/' . Auth::user()->profil_photo) }}"
                                                            alt="Photo de profile de  {{ Auth::user()->name }} sur Freeci">
                                                    @else
                                                        <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&background=2A41E8&color=fff"
                                                            alt="Photo de profile de {{ Auth::user()->name }} sur Freeci">
                                                    @endif
                                                </div>
                                                <div class="user-name">
                                                    {{ Auth::user()->name }} <span>Freelancer</span>
                                                </div>
                                            </div>

                                            <!-- User Status Switcher -->


                                            @livewire('define-freelancer-visibility')

                                        </div>

                                        <ul class="user-menu-small-nav">
                                            <li><a href="{{ route('dashboard') }}"><i
                                                        class="icon-material-outline-dashboard"></i>
                                                    Dashboard</a></li>
                                            <li><a href="{{ route('profile.edit') }}"><i
                                                        class="icon-material-outline-settings"></i> Paramètres</a></li>
                                            <li>
                                                <form method="post" action="{{ route('logout') }}">
                                                    @csrf
                                                    <button type="submit"><i
                                                            class="icon-material-outline-power-settings-new"></i>
                                                        Deconnexion</button>
                                                </form>
                                            </li>
                                        </ul>

                                    </div>
                                </div>

                            </div>
                        @endauth

                        <!-- User Menu / End -->

                        <!-- Mobile Navigation Button -->
                        <span class="mmenu-trigger">
                            <button class="hamburger hamburger--collapse" type="button">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </span>

                    </div>
                    <!-- Right Side Content / End -->

                </div>
            </div>
            <!-- Header / End -->

        </header>
        <div class="clearfix"></div>
        <div class="dashboard-container">
            <div class="dashboard-sidebar">
                <div class="dashboard-sidebar-inner" data-simplebar>
                    <div class="dashboard-nav-container">
                        <!-- Responsive Navigation Trigger -->
                        <a href="#" class="dashboard-responsive-nav-trigger">
                            <span class="hamburger hamburger--collapse">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </span>
                            <span class="trigger-title">Menu de navigation</span>
                        </a>

                        <!-- Navigation -->
                        <div class="dashboard-nav">
                            <div class="dashboard-nav-inner">

                                <ul data-submenu-title="Démarrer">
                                    <li @if (Route::currentRouteName() == 'dashboard') class="active" @endif><a
                                            href="{{ route('dashboard') }}"><i
                                                class="icon-material-outline-dashboard"></i>
                                            Dashboard</a></li>
                                    <li @if (Route::currentRouteName() == 'message.index.freelancer') class="active" @endif><a
                                            href="{{ route('message.index.freelancer') }}"><i
                                                class="icon-material-outline-question-answer"></i>
                                            Messagerie <span class="nav-tag">{{$countNotificationMessages}}</span></a></li>

                                    <li @if (Route::currentRouteName() == 'review.index') class="active" @endif><a
                                            href="{{ route('review.index') }}"><i
                                                class="icon-material-outline-rate-review"></i>
                                            Commentaire</a></li>
                                </ul>

                                <ul data-submenu-title="Organiser et gérer">
                                    <li @if (Route::currentRouteName() == 'applicant.mission.index') class="active" @endif><a href="#"><i
                                                class="icon-material-outline-business-center"></i>
                                            Archive</a>
                                        <ul>
                                            <li><a href="{{ route('applicant.mission.index') }}">Missions </a></li>
                                            <li><a href="dashboard-manage-candidates.html">Grands projets</a></li>
                                        </ul>
                                    </li>
                                    <li @if (Route::currentRouteName() == 'subscription.create') class="active" @endif><a href="#"><i
                                                class="icon-material-outline-assignment"></i> Achat</a>
                                        <ul>
                                            <li @if (Route::currentRouteName() == 'subscription.create') class="active" @endif><a
                                                    href="{{ route('subscription.create') }}">Abonnement</a></li>
                                            <li><a href="dashboard-post-a-task.html">Règlements</a></li>
                                        </ul>
                                    </li>
                                </ul>
                                <ul data-submenu-title="Compte">
                                    <li @if (Route::currentRouteName() == 'profile.edit') class="active" @endif><a
                                            href="{{ route('profile.edit') }}"><i
                                                class="icon-material-outline-settings"></i>
                                            Paramètre</a></li>

                                </ul>

                            </div>
                        </div>
                        <!-- Navigation / End -->

                    </div>
                </div>
            </div>
            <div class="dashboard-content-container" data-simplebar>

                @yield('content')
            </div>



        </div>




        <!-- Footer
================================================== -->
        <footer id="footer">

            <!-- Footer Top Section -->
            <div class="footer-top-section">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">

                            <!-- Footer Rows Container -->
                            <div class="footer-rows-container">

                                <!-- Left Side -->
                                <div class="footer-rows-left">
                                    <div class="footer-row">
                                        <div class="footer-row-inner footer-logo">
                                            <img src="{{ asset('images/logo_white.png') }}" alt="">
                                        </div>
                                    </div>
                                </div>

                                <!-- Right Side -->
                                <div class="footer-rows-right">

                                    <!-- Social Icons -->
                                    <div class="footer-row">
                                        <div class="footer-row-inner">
                                            <ul class="footer-social-links">
                                                <li>
                                                    <a href="#" title="Facebook" data-tippy-placement="bottom"
                                                        data-tippy-theme="light">
                                                        <i class="icon-brand-facebook-f"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" title="Twitter" data-tippy-placement="bottom"
                                                        data-tippy-theme="light">
                                                        <i class="icon-brand-twitter"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" title="Google Plus"
                                                        data-tippy-placement="bottom" data-tippy-theme="light">
                                                        <i class="icon-brand-google-plus-g"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" title="LinkedIn" data-tippy-placement="bottom"
                                                        data-tippy-theme="light">
                                                        <i class="icon-brand-linkedin-in"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>

                                    <!-- Language Switcher -->
                                    <div class="footer-row">
                                        <div class="footer-row-inner">
                                            <select class="selectpicker language-switcher"
                                                data-selected-text-format="count" data-size="5">
                                                <option selected>Français</option>
                                                <option>English</option>

                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- Footer Rows Container / End -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer Top Section / End -->

            <!-- Footer Middle Section -->
            <div class="footer-middle-section">
                <div class="container">
                    <div class="row">

                        <!-- Links -->
                        <div class="col-xl-2 col-lg-2 col-md-3">
                            <div class="footer-links">
                                <h3>Les recruteurs</h3>
                                <ul>
                                    <li><a href="#"><span>Publier mission</span></a></li>
                                    <li><a href="#"><span>Grand projet</span></a></li>
                                </ul>
                            </div>
                        </div>

                        <!-- Links -->
                        <div class="col-xl-2 col-lg-2 col-md-3">
                            <div class="footer-links">
                                <h3>Les freelancers</h3>
                                <ul>
                                    <li><a href="#"><span>Les missions</span></a></li>
                                    <li><a href="#"><span>Grands projets</span></a></li>

                                </ul>
                            </div>
                        </div>

                        <!-- Links -->
                        <div class="col-xl-2 col-lg-2 col-md-3">
                            <div class="footer-links">
                                <h3>À propos</h3>
                                <ul>
                                    <li><a href="#"><span>Tarification</span></a></li>
                                    <li><a href="#"><span>Support</span></a></li>
                                    <li><a href="#"><span>CGV</span></a></li>
                                </ul>
                            </div>
                        </div>

                        <!-- Links -->
                        <div class="col-xl-2 col-lg-2 col-md-3">
                            <div class="footer-links">
                                <h3>Mon compte</h3>
                                <ul>
                                    <li><a href="#"><span>Me connecter</span></a></li>
                                    <li><a href="#"><span>Dévenir freelancer</span></a></li>
                                </ul>
                            </div>
                        </div>

                        <!-- Newsletter -->
                        @livewire('subscription-newsletter')

                    </div>
                </div>
            </div>
            <!-- Footer Middle Section / End -->

            <!-- Footer Copyrights -->
            <div class="footer-bottom-section">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            @php echo(date('Y')) @endphp <strong> Freeci </strong>. Tous droits réservés.
                        </div>
                    </div>
                </div>
            </div>


        </footer>


    </div>



    <!-- Scripts
================================================== -->
    <script src="{{ asset('app-assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/jquery-migrate-3.3.2.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/mmenu.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/tippy.all.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/simplebar.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/bootstrap-slider.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/snackbar.js') }}"></script>
    <script src="{{ asset('app-assets/js/clipboard.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/counterup.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/magnific-popup.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/slick.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/custom.js') }}"></script>


    <script>
        // Snackbar for user status switcher
        $('.toggle-btn-status').click(function() {
            Snackbar.show({
                text: 'Votre status a été changé!',
                pos: 'bottom-center',
                showAction: false,
                actionText: "Dismiss",
                duration: 3000,
                textColor: '#fff',
                backgroundColor: '#383838'
            });
        });
    </script>


    <!-- Google Autocomplete -->
    <script>
        function initAutocomplete() {
            var options = {
                types: ['(cities)'],
                // componentRestrictions: {country: "us"}
            };

            var input = document.getElementById('autocomplete-input');
            var autocomplete = new google.maps.places.Autocomplete(input, options);
        }

        // Autocomplete adjustment for homepage
        if ($('.intro-banner-search-form')[0]) {
            setTimeout(function() {
                $(".pac-container").prependTo(".intro-search-field.with-autocomplete");
            }, 300);
        }
    </script>
    @livewireScripts



    <!-- Google API -->
    <script src="https://maps.googleapis.com/maps/api/js?key=&libraries=places&callback=initAutocomplete"></script>

    <!-- Chart.js // documentation: http://www.chartjs.org/docs/latest/ -->




</body>

</html>
