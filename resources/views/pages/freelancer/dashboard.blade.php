@extends('layouts.freelancer')
@section('title')
    Freeci-Bienvenue sur votre espace freeci
@endsection
@section('content')
    <!-- Dashboard Container -->

    <div class="dashboard-content-inner">

        <!-- Dashboard Headline -->
        <div class="dashboard-headline">
            <h3>{{ Auth::user()->name }}</h3>
            <span>Nous sommes heureux de vous revoir!</span>
            @if (count($subscriptionInfo) == 0)
                <x-alert-warning
                    message="Vous n'avez pas encore d'abonnement . Acheter un nouveau abonnement pour commençer l'aventure , pour cela rendez-vous dans l'onglet Achat puis abonnement . " />
            @endif

            <!-- Breadcrumbs -->

        </div>

        <!-- Fun Facts Container -->

        <div class="fun-facts-container">
            <div class="fun-fact" data-fun-fact-color="#36bd78">
                <div class="fun-fact-text">
                    <span>Avis</span>
                    <h4>{{ $recommended }}</h4>
                </div>
                <div class="fun-fact-icon"><i class="icon-material-outline-gavel"></i></div>
            </div>

            <div class="fun-fact" data-fun-fact-color="#b81b7f">
                <div class="fun-fact-text">
                    <span>Devis restant</span>

                    @if (count($subscriptionInfo) != 0)
                        @foreach ($subscriptionInfo as $item)
                            <h4>{{ $item->estimate }}</h4>
                        @endforeach
                    @else
                        <h4>0</h4>
                    @endif
                </div>
                <div class="fun-fact-icon"><i class="icon-material-outline-business-center"></i></div>
            </div>

            <div class="fun-fact" data-fun-fact-color="#efa80f">
                <div class="fun-fact-text">
                    <span>Commentaire</span>
                    <h4>{{ $review }}</h4>
                </div>
                <div class="fun-fact-icon"><i class="icon-material-outline-rate-review"></i></div>
            </div>

            <!-- Last one has to be hidden below 1600px, sorry :( -->
            <div class="fun-fact" data-fun-fact-color="#2a41e6">
                <div class="fun-fact-text">
                    <span>Projets réalisés</span>
                    <h4>{{ $mission }}</h4>
                </div>
                <div class="fun-fact-icon"><i class="icon-feather-trending-up"></i></div>
            </div>
        </div>



        <!-- Row -->
        <div class="row">

            <div class="col-xl-6">

                <!-- Dashboard Box -->
                @can('check-expert')
                    <div class="dashboard-box main-box-in-row">
                        <div class="headline">
                            <h3><i class="icon-feather-bar-chart-2"></i> Nombres de vues sur votre profil</h3>
                            <div class="sort-by">
                                <option value="Année">Cette année </option>
                            </div>

                        </div>
                        <div class="content">
                            <!-- Chart -->
                            <div class="chart">
                                <canvas id="chart" width="100" height="45"></canvas>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="dashboard-box dashboard-box-none main-box-in-row">
                        <div class="headline">
                            <h3><i class="icon-feather-bar-chart-2"></i> Nombres de vues sur votre profil</h3>
                            <div class="sort-by">
                                <option value="Année">Cette année </option>
                            </div>

                        </div>
                        <div class="none-chart">

                            <div class="banner-headline">
                                <h3>
                                    <strong>Accessible seulement au </strong>
                                    <br>
                                    <span>
                                        <strong class="color">Expert</strong>
                                    </span>
                                </h3>
                            </div>


                        </div>
                    </div>
                @endcan
                <!-- Dashboard Box / End -->
            </div>
            <div class="col-xl-6">
                <div class="dashboard-box">
                    <div class="headline">
                        <h3><i class="icon-material-outline-assignment"></i> Suivis des factures </h3>

                    </div>
                    <div class="content">
                        <ul class="dashboard-box-list">
                            @foreach ($invoices as $invoice)
                                <li>
                                    <div class="invoice-list-item">

                                        <strong>Plan {{ $invoice->plan }}</strong>
                                        <ul>
                                            @if ($invoice->is_validated == 0)
                                                <li><span class="paid">Terminé</span></li>
                                            @else
                                                <li><span class="unpaid">En cours</span></li>
                                            @endif

                                            <li>Identifiant : #{{ $invoice->id }}</li>
                                            <li>Date: {{ $invoice->created_at }}</li>
                                        </ul>
                                    </div>
                                    <!-- Buttons -->
                                    @if ($invoice->is_validated == 0)
                                        <div class="buttons-to-right">
                                            <a href="{{ route('invoice', ['id' => $invoice->id]) }}"
                                                class="button gray">Voir
                                                facture</a>
                                        </div>
                                    @else
                                        <div class="buttons-to-right">
                                            <a href="{{ route('cash.code') }}" class="button">Finaliser</a>
                                        </div>
                                    @endif

                                </li>
                            @endforeach


                        </ul>
                    </div>
                </div>
            </div>

        </div>
        <!-- Row / End -->

        <!-- Row -->
        <div class="row">
            <!-- Dashboard Box -->


            <!-- Dashboard Box -->
            <div class="col-xl-12">
                <div class="dashboard-box">
                    <div class="headline">
                        <h3><i class="icon-material-baseline-notifications-none"></i> Notifications</h3>
                        <button class="mark-as-read ripple-effect-dark" data-tippy-placement="left"
                            title="tout marquer comme lu">
                            <i class="icon-feather-check-square"></i>
                        </button>
                    </div>
                    <div class="content">
                        <ul class="dashboard-box-list">
                            <li>
                                <span class="notification-icon"><i class="icon-material-outline-group"></i></span>
                                <span class="notification-text">
                                    <strong>Michael Shannah</strong> applied for a job <a href="#">Full Stack
                                        Software Engineer</a>
                                </span>
                                <!-- Buttons -->
                                <div class="buttons-to-right">
                                    <a href="#" class="button ripple-effect ico" title="Mark as read"
                                        data-tippy-placement="left"><i class="icon-feather-check-square"></i></a>
                                </div>
                            </li>
                            <li>
                                <span class="notification-icon"><i class=" icon-material-outline-gavel"></i></span>
                                <span class="notification-text">
                                    <strong>Gilber Allanis</strong> placed a bid on your <a href="#">iOS App
                                        Development</a> project
                                </span>
                                <!-- Buttons -->
                                <div class="buttons-to-right">
                                    <a href="#" class="button ripple-effect ico" title="Mark as read"
                                        data-tippy-placement="left"><i class="icon-feather-check-square"></i></a>
                                </div>
                            </li>
                            <li>
                                <span class="notification-icon"><i class="icon-material-outline-autorenew"></i></span>
                                <span class="notification-text">
                                    Your job listing <a href="#">Full Stack Software Engineer</a> is expiring
                                </span>
                                <!-- Buttons -->
                                <div class="buttons-to-right">
                                    <a href="#" class="button ripple-effect ico" title="Mark as read"
                                        data-tippy-placement="left"><i class="icon-feather-check-square"></i></a>
                                </div>
                            </li>
                            <li>
                                <span class="notification-icon"><i class="icon-material-outline-group"></i></span>
                                <span class="notification-text">
                                    <strong>Sindy Forrest</strong> applied for a job <a href="#">Full Stack
                                        Software Engineer</a>
                                </span>
                                <!-- Buttons -->
                                <div class="buttons-to-right">
                                    <a href="#" class="button ripple-effect ico" title="Mark as read"
                                        data-tippy-placement="left"><i class="icon-feather-check-square"></i></a>
                                </div>
                            </li>
                            <li>
                                <span class="notification-icon"><i class="icon-material-outline-rate-review"></i></span>
                                <span class="notification-text">
                                    <strong>David Peterson</strong> left you a <span class="star-rating no-stars"
                                        data-rating="5.0"></span> rating after finishing <a href="#">Logo
                                        Design</a> task
                                </span>
                                <!-- Buttons -->
                                <div class="buttons-to-right">
                                    <a href="#" class="button ripple-effect ico" title="Mark as read"
                                        data-tippy-placement="left"><i class="icon-feather-check-square"></i></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>



        </div>
        <!-- Row / End -->

        <!-- Footer -->
        <div class="dashboard-footer-spacer"></div>

        <!-- Footer / End -->

    </div>



    <!-- Apply for a job popup
                                                                                                            ================================================== -->
    <div id="small-dialog" class="zoom-anim-dialog mfp-hide dialog-with-tabs">

        <!--Tabs -->
        <div class="sign-in-form">

            <ul class="popup-tabs-nav">
                <li><a href="#tab">Add Note</a></li>
            </ul>

            <div class="popup-tabs-container">

                <!-- Tab -->
                <div class="popup-tab-content" id="tab">

                    <!-- Welcome Text -->
                    <div class="welcome-text">
                        <h3>Do Not Forget 😎</h3>
                    </div>

                    <!-- Form -->
                    <form method="post" id="add-note">

                        <select class="selectpicker with-border default margin-bottom-20" data-size="7"
                            title="Priority">
                            <option>Low Priority</option>
                            <option>Medium Priority</option>
                            <option>High Priority</option>
                        </select>

                        <textarea name="textarea" cols="10" placeholder="Note" class="with-border"></textarea>

                    </form>

                    <!-- Button -->
                    <button class="button full-width button-sliding-icon ripple-effect" type="submit"
                        form="add-note">Add Note <i class="icon-material-outline-arrow-right-alt"></i></button>

                </div>

            </div>
        </div>
    </div>

    <input type="hidden" value="{{ $views }}" id="views">

    <script src="{{ asset('app-assets/js/chart.min.js') }}"></script>

    <script>
        let views = document.getElementById('views').value;

        Chart.defaults.global.defaultFontFamily = "Nunito";
        Chart.defaults.global.defaultFontColor = '#888';
        Chart.defaults.global.defaultFontSize = '14';

        var ctx = document.getElementById('chart').getContext('2d');

        var chart = new Chart(ctx, {
            type: 'line',

            // The data for our dataset
            data: {
                labels: ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre",
                    "Octobre", 'Novembre', 'Décembre'
                ],
                // Information about the dataset
                datasets: [{
                    label: "vue(s) ",
                    backgroundColor: 'rgba(42,65,232,0.08)',
                    borderColor: '#2a41e8',
                    borderWidth: "3",
                    data: views.split(','),
                    pointRadius: 5,
                    pointHoverRadius: 5,
                    pointHitRadius: 10,
                    pointBackgroundColor: "#fff",
                    pointHoverBackgroundColor: "#fff",
                    pointBorderWidth: "2",
                }]
            },

            // Configuration options
            options: {

                layout: {
                    padding: 10,
                },

                legend: {
                    display: false
                },
                title: {
                    display: false
                },

                scales: {
                    yAxes: [{
                        scaleLabel: {
                            display: false
                        },
                        gridLines: {
                            borderDash: [6, 10],
                            color: "#d8d8d8",
                            lineWidth: 1,
                        },
                    }],
                    xAxes: [{
                        scaleLabel: {
                            display: false
                        },
                        gridLines: {
                            display: false
                        },
                    }],
                },

                tooltips: {
                    backgroundColor: '#333',
                    titleFontSize: 13,
                    titleFontColor: '#fff',
                    bodyFontColor: '#fff',
                    bodyFontSize: 13,
                    displayColors: false,
                    xPadding: 10,
                    yPadding: 10,
                    intersect: false
                }
            },


        });
    </script>
    <style>
        .dashboard-box-none {
            height: 94%;

        }

        .none-chart {
            display: grid;
            place-items: center;
            height: 40vh;
        }

        .none-chart div {
            text-align: center;
        }
    </style>

@endsection
