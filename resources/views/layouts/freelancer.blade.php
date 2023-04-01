<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>


    <!-- Basic Page Needs
================================================== -->
    <title>Freeci </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS
================================================== -->
    <link rel="stylesheet" href="{{ asset('app-assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('app-assets/css/colors/blue.css') }}">

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
                            <a href="index.html"><img src="images/logo.png" alt=""></a>
                        </div>

                        <!-- Main Navigation -->
                        <nav id="navigation">
                            <ul id="responsive">
                                <li><a href="#">Embauchez </a>
                                    <ul class="dropdown-nav">
                                        <li><a href="dashboard-post-a-job.html">Publier mission</a></li>
                                        <li><a href="dashboard-post-a-task.html">Publier  projet</a></li>
                                        <li><a href="#">Les freelancers</a>
                                            <ul class="dropdown-nav">
                                                <li><a href="freelancers-list-layout-1.html">En ligne</a></li>
                                                <li><a href="freelancers-list-layout-2.html">Les mieux notés</a></li>
                                                <li><a href="freelancers-list-layout-1.html">les nouveaux</a></li>
                                            </ul>
                                        </li>
                                    </ul>

                                </li>
                                <li><a href="#">Trouver des emplois</a>
                                    <ul class="dropdown-nav">
                                        <li><a href="single-job-page.html">Missions</a></li>
                                        <li><a href="single-task-page.html">Grands projets</a></li>
                                        <li><a href="#">Recherche par</a>
                                            <ul class="dropdown-nav">
                                                <li><a href="tasks-list-layout-1.html">Plus récents</a></li>
                                                <li><a href="tasks-grid-layout.html">En vedette</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>

                                <li><a href="#">Comment ça fonctionne</a>
                                    <ul class="dropdown-nav">
                                        <li><a href="dashboard.html">Tarification</a></li>
                                        <li><a href="dashboard-messages.html">Qui sommes nous ?</a></li>
                                        <li><a href="dashboard-bookmarks.html">Pourquoi Freci</a></li>
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

                                <li><a href="#">Pages</a>
                                    <ul class="dropdown-nav">
                                        <li>
                                            <a href="#">Open Street Map</a>
                                            <ul class="dropdown-nav">
                                                <li><a href="jobs-list-layout-full-page-map-OpenStreetMap.html">Full
                                                        Page List + Map</a></li>
                                                <li><a href="jobs-grid-layout-full-page-map-OpenStreetMap.html">Full
                                                        Page Grid + Map</a></li>
                                                <li><a href="single-job-page-OpenStreetMap.html">Job Page</a></li>
                                                <li><a href="single-company-profile-OpenStreetMap.html">Company
                                                        Profile</a></li>
                                                <li><a href="pages-contact-OpenStreetMap.html">Contact</a></li>
                                                <li><a href="jobs-list-layout-1-OpenStreetMap.html">Location
                                                        Autocomplete</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="pages-blog.html">Blog</a></li>
                                        <li><a href="pages-pricing-plans.html">Pricing Plans</a></li>
                                        <li><a href="pages-checkout-page.html">Checkout Page</a></li>
                                        <li><a href="pages-invoice-template.html">Invoice Template</a></li>
                                        <li><a href="pages-user-interface-elements.html">User Interface Elements</a>
                                        </li>
                                        <li><a href="pages-icons-cheatsheet.html">Icons Cheatsheet</a></li>
                                        <li><a href="pages-login.html">Login & Register</a></li>
                                        <li><a href="pages-404.html">404 Page</a></li>
                                        <li><a href="pages-contact.html">Contact</a></li>
                                    </ul>
                                </li>

                            </ul>
                        </nav>
                        <div class="clearfix"></div>
                        <!-- Main Navigation / End -->

                    </div>
                    <!-- Left Side Content / End -->


                    <!-- Right Side Content / End -->
                    <div class="right-side">

                        <!--  User Notifications -->
                        <div class="header-widget hide-on-mobile">

                            <!-- Notifications -->
                            <div class="header-notifications">

                                <!-- Trigger -->
                                <div class="header-notifications-trigger">
                                    <a href="#"><i class="icon-feather-bell"></i><span>4</span></a>
                                </div>

                                <!-- Dropdown -->
                                <div class="header-notifications-dropdown">

                                    <div class="header-notifications-headline">
                                        <h4>Notifications</h4>
                                        <button class="mark-as-read ripple-effect-dark" title="Mark all as read"
                                            data-tippy-placement="left">
                                            <i class="icon-feather-check-square"></i>
                                        </button>
                                    </div>

                                    <div class="header-notifications-content">
                                        <div class="header-notifications-scroll" data-simplebar>
                                            <ul>
                                                <!-- Notification -->
                                                <li class="notifications-not-read">
                                                    <a href="dashboard-manage-candidates.html">
                                                        <span class="notification-icon"><i
                                                                class="icon-material-outline-group"></i></span>
                                                        <span class="notification-text">
                                                            <strong>Michael Shannah</strong> applied for a job <span
                                                                class="color">Full Stack Software Engineer</span>
                                                        </span>
                                                    </a>
                                                </li>

                                                <!-- Notification -->
                                                <li>
                                                    <a href="dashboard-manage-bidders.html">
                                                        <span class="notification-icon"><i
                                                                class=" icon-material-outline-gavel"></i></span>
                                                        <span class="notification-text">
                                                            <strong>Gilbert Allanis</strong> placed a bid on your <span
                                                                class="color">iOS App Development</span> project
                                                        </span>
                                                    </a>
                                                </li>

                                                <!-- Notification -->
                                                <li>
                                                    <a href="dashboard-manage-jobs.html">
                                                        <span class="notification-icon"><i
                                                                class="icon-material-outline-autorenew"></i></span>
                                                        <span class="notification-text">
                                                            Your job listing <span class="color">Full Stack PHP
                                                                Developer</span> is expiring.
                                                        </span>
                                                    </a>
                                                </li>

                                                <!-- Notification -->
                                                <li>
                                                    <a href="dashboard-manage-candidates.html">
                                                        <span class="notification-icon"><i
                                                                class="icon-material-outline-group"></i></span>
                                                        <span class="notification-text">
                                                            <strong>Sindy Forrest</strong> applied for a job <span
                                                                class="color">Full Stack Software Engineer</span>
                                                        </span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <!-- Messages -->
                            <div class="header-notifications">
                                <div class="header-notifications-trigger">
                                    <a href="#"><i class="icon-feather-mail"></i><span>3</span></a>
                                </div>

                                <!-- Dropdown -->
                                <div class="header-notifications-dropdown">

                                    <div class="header-notifications-headline">
                                        <h4>Messages</h4>
                                        <button class="mark-as-read ripple-effect-dark" title="Mark all as read"
                                            data-tippy-placement="left">
                                            <i class="icon-feather-check-square"></i>
                                        </button>
                                    </div>

                                    <div class="header-notifications-content">
                                        <div class="header-notifications-scroll" data-simplebar>
                                            <ul>
                                                <!-- Notification -->
                                                <li class="notifications-not-read">
                                                    <a href="dashboard-messages.html">
                                                        <span class="notification-avatar status-online"><img
                                                                src="images/user-avatar-small-03.jpg"
                                                                alt=""></span>
                                                        <div class="notification-text">
                                                            <strong>David Peterson</strong>
                                                            <p class="notification-msg-text">Thanks for reaching out.
                                                                I'm quite busy right now on many...</p>
                                                            <span class="color">4 hours ago</span>
                                                        </div>
                                                    </a>
                                                </li>

                                                <!-- Notification -->
                                                <li class="notifications-not-read">
                                                    <a href="dashboard-messages.html">
                                                        <span class="notification-avatar status-offline"><img
                                                                src="images/user-avatar-small-02.jpg"
                                                                alt=""></span>
                                                        <div class="notification-text">
                                                            <strong>Sindy Forest</strong>
                                                            <p class="notification-msg-text">Hi Tom! Hate to break it
                                                                to you, but I'm actually on vacation until...</p>
                                                            <span class="color">Yesterday</span>
                                                        </div>
                                                    </a>
                                                </li>

                                                <!-- Notification -->
                                                <li class="notifications-not-read">
                                                    <a href="dashboard-messages.html">
                                                        <span class="notification-avatar status-online"><img
                                                                src="images/user-avatar-placeholder.png"
                                                                alt=""></span>
                                                        <div class="notification-text">
                                                            <strong>Marcin Kowalski</strong>
                                                            <p class="notification-msg-text">I received payment. Thanks
                                                                for cooperation!</p>
                                                            <span class="color">Yesterday</span>
                                                        </div>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <a href="dashboard-messages.html"
                                        class="header-notifications-button ripple-effect button-sliding-icon">View All
                                        Messages<i class="icon-material-outline-arrow-right-alt"></i></a>
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
                                        <div class="user-avatar status-online"><img
                                                src="images/user-avatar-small-01.jpg" alt=""></div>
                                    </a>
                                </div>

                                <!-- Dropdown -->
                                <div class="header-notifications-dropdown">

                                    <!-- User Status -->
                                    <div class="user-status">

                                        <!-- User Name / Avatar -->
                                        <div class="user-details">
                                            <div class="user-avatar status-online"><img
                                                    src="images/user-avatar-small-01.jpg" alt=""></div>
                                            <div class="user-name">
                                                Tom Smith <span>Freelancer</span>
                                            </div>
                                        </div>

                                        <!-- User Status Switcher -->
                                        <div class="status-switch" id="snackbar-user-status">
                                            <label class="user-online current-status">Online</label>
                                            <label class="user-invisible">Invisible</label>
                                            <!-- Status Indicator -->
                                            <span class="status-indicator" aria-hidden="true"></span>
                                        </div>
                                    </div>

                                    <ul class="user-menu-small-nav">
                                        <li><a href="dashboard.html"><i class="icon-material-outline-dashboard"></i>
                                                Dashboard</a></li>
                                        <li><a href="dashboard-settings.html"><i
                                                    class="icon-material-outline-settings"></i> Settings</a></li>
                                        <li><a href="index-logged-out.html"><i
                                                    class="icon-material-outline-power-settings-new"></i> Logout</a>
                                        </li>
                                    </ul>

                                </div>
                            </div>

                        </div>
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

        <main>
            @yield('content')
        </main>


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
                                            <img src="images/logo2.png" alt="">
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
                                                <option selected>English</option>
                                                <option>Français</option>
                                                <option>Español</option>
                                                <option>Deutsch</option>
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
                                <h3>For Candidates</h3>
                                <ul>
                                    <li><a href="#"><span>Browse Jobs</span></a></li>
                                    <li><a href="#"><span>Add Resume</span></a></li>
                                    <li><a href="#"><span>Job Alerts</span></a></li>
                                    <li><a href="#"><span>My Bookmarks</span></a></li>
                                </ul>
                            </div>
                        </div>

                        <!-- Links -->
                        <div class="col-xl-2 col-lg-2 col-md-3">
                            <div class="footer-links">
                                <h3>For Employers</h3>
                                <ul>
                                    <li><a href="#"><span>Browse Candidates</span></a></li>
                                    <li><a href="#"><span>Post a Job</span></a></li>
                                    <li><a href="#"><span>Post a Task</span></a></li>
                                    <li><a href="#"><span>Plans & Pricing</span></a></li>
                                </ul>
                            </div>
                        </div>

                        <!-- Links -->
                        <div class="col-xl-2 col-lg-2 col-md-3">
                            <div class="footer-links">
                                <h3>Helpful Links</h3>
                                <ul>
                                    <li><a href="#"><span>Contact</span></a></li>
                                    <li><a href="#"><span>Privacy Policy</span></a></li>
                                    <li><a href="#"><span>Terms of Use</span></a></li>
                                </ul>
                            </div>
                        </div>

                        <!-- Links -->
                        <div class="col-xl-2 col-lg-2 col-md-3">
                            <div class="footer-links">
                                <h3>Account</h3>
                                <ul>
                                    <li><a href="#"><span>Log In</span></a></li>
                                    <li><a href="#"><span>My Account</span></a></li>
                                </ul>
                            </div>
                        </div>

                        <!-- Newsletter -->
                        <div class="col-xl-4 col-lg-4 col-md-12">
                            <h3><i class="icon-feather-mail"></i> Sign Up For a Newsletter</h3>
                            <p>Weekly breaking news, analysis and cutting edge advices on job searching.</p>
                            <form action="#" method="get" class="newsletter">
                                <input type="text" name="fname" placeholder="Enter your email address">
                                <button type="submit"><i class="icon-feather-arrow-right"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer Middle Section / End -->

            <!-- Footer Copyrights -->
            <div class="footer-bottom-section">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            © 2019 <strong>Hireo</strong>. All Rights Reserved.
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
        $('#snackbar-user-status label').click(function() {
            Snackbar.show({
                text: 'Your status has been changed!',
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

    <!-- Google API -->
    <script src="https://maps.googleapis.com/maps/api/js?key=&libraries=places&callback=initAutocomplete"></script>

</body>

</html>
