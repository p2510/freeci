@extends('layouts.user')
@section('title')
    Freeci - Les missions récentes
@endsection
@section('addTailwind')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
@endsection
@section('content')
    <div class="full-page-container">
   
       

        <!-- Full Page Content -->
        <div class="full-page-content-container" data-simplebar>
            <div class="full-page-content-inner">

                <h3 class="page-title">Les missions récentes</h3>

                <!-- Tasks Container -->
                <div class="tasks-list-container tasks-grid-layout margin-top-35">

                    <!-- Task -->


                    @foreach ($missions as $mission)
                        <a href="{{ route('mission.show', $mission->title) }}" class="task-listing">

                            <!-- Job Listing Details -->
                            <div class="task-listing-details">

                                <!-- Details -->
                                <div class="task-listing-description">
                                    <h3 class="task-listing-title">{{ $mission->title }}</h3>
                                    <ul class="task-icons">
                                        <li><i class="icon-material-outline-location-on"></i>
                                            @if ($mission->type_mission == '1')
                                                En ligne
                                            @else
                                                Sur place
                                            @endif
                                        </li>
                                        <li><i class="icon-material-outline-access-time"></i> {{ $mission->created_at }}
                                        </li>
                                    </ul>
                                </div>

                            </div>

                            <div class="task-listing-bid">
                                <div class="task-listing-bid-inner">
                                    <div class="task-offers">
                                        <strong> {{ $mission->budget_min }}F - {{ $mission->budget_max }}F</strong>
                                        <span>
                                            @if ($mission->type_budget == '1')
                                                En une fois
                                            @else
                                                Par jour
                                            @endif
                                        </span>
                                    </div>
                                    <span class="button button-sliding-icon ripple-effect">Postuler <i
                                            class="icon-material-outline-arrow-right-alt"></i></span>
                                </div>
                            </div>
                        </a>
                    @endforeach


                </div>
                <!-- Tasks Container / End -->

                <!-- Pagination -->
                <div class="clearfix"></div>

                

                <div class="pagination-container margin-top-20 margin-bottom-20">

                </div>
                <div class="clearfix"></div>

                <!-- Pagination / End -->

            </div>
        </div>
        <!-- Full Page Content / End -->

    </div>
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
@endsection
