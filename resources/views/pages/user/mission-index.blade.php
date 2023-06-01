@extends('layouts.user')
@section('title')
    Freeci - Recherche 
@endsection
@section('addTailwind')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
@endsection
@section('content')
    <div class="full-page-container">
        <div class="full-page-sidebar">
            <form method="post" action='{{route('mission.search')}}'  class="full-page-sidebar-inner" data-simplebar>
                @csrf 
                <div class="sidebar-container">

                    <!-- Category -->
                    <div class="sidebar-widget">
                        <h3>Categories</h3>
                        <select class="selectpicker default"  data-selected-text-format="count" data-size="7"
                             name="category">
                            <option value="All" selected>Tous</option>
                            @foreach ($categories as $category)
                                <option>{{ $category }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Keywords -->
                    <div class="sidebar-widget">
                        <h3>Compétences réquis</h3>
                        <div class="keywords-container">
                            <div class="keyword-input-container">
                                <input type="text"  class="keyword-input" placeholder="ex: Php , Sage , Photoshop" />
                                <button type="button" class="keyword-input-button ripple-effect"><i
                                        class="icon-material-outline-add"></i></button>
                            </div>
                            <div class="keywords-list">
                                <!-- keywords go here -->
                                <input type="hidden" name="skill" id="inputSkills">

                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="margin-bottom-40"></div>

                </div>
                <!-- Sidebar Container / End -->

                <!-- Search Button -->
                <div class="sidebar-search-button-container">
                    <button type="submit" class="button ripple-effect submit">Recherche</button>
                </div>
                <!-- Search Button / End-->

            </form>
        </div>
        <!-- Full Page Sidebar / End -->

        <!-- Full Page Content -->
        <div class="full-page-content-container" data-simplebar>
            <div class="full-page-content-inner">

                <h3 class="page-title">Toutes les missions</h3>

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

                {!! $missions->withQueryString()->links() !!}

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
      
        let input = document.querySelector('.keyword-input');
        let inputSkills = document.getElementById('inputSkills');
        let submit = document.querySelector('.submit');

        inputSkills.value='dftdf'
        submit.addEventListener('click', (e) => {
            let tags = document.querySelectorAll('.keyword-text');
            let tagsArr = [];
            tags.forEach(tag => {
                tagsArr.push(tag.innerHTML)
            });
            inputSkills.value = tagsArr
        })

    </script>
@endsection
