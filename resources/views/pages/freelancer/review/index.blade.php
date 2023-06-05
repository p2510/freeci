@extends('layouts.freelancer')
@section('title')
    Freeci- Commentaire
@endsection
@section('addTailwind')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
@endsection
@section('content')
    <!-- Dashboard Content
     ================================================== -->
    <div class="dashboard-content-container" data-simplebar>
        <div class="dashboard-content-inner">

            <!-- Dashboard Headline -->
            <div class="dashboard-headline">
                <h3>Vos commentaires </h3>


            </div>

            <!-- Row -->
            <div class="row">

                <!-- Dashboard Box -->
                <div class="col-xl-12">
                    <div class="dashboard-box margin-top-0">

                        <!-- Headline -->
                        <div class="headline">
                            <h3><i class="icon-material-outline-business"></i> Listes des commentaires</h3>
                        </div>

                        <div class="content">
                            <ul class="dashboard-box-list">
                                @foreach ($reviews as $review)
                                    <li>
                                        <div class="boxed-list-item">
                                            <!-- Content -->
                                            <div class="item-content">
                                                <h4>
                                                    {{ $review->title }}
                                                    <span>
                                                        Par
                                                        @if ($review->name)
                                                            {{ $review->name }}
                                                        @else
                                                            un anonyme
                                                        @endif
                                                    </span>
                                                </h4>
                                                <div class="item-details margin-top-10">
                                                    <div class="star-rating" data-rating="{{ $review->rating}}"></div>
                                                    <div class="detail-item"><i
                                                            class="icon-material-outline-date-range"></i> {{ $review->created_at }}</div>
                                                </div>
                                                <div class="item-description">
                                                    <p>{{ $review->message}}</p>
                                                </div>
                                            </div>
                                        </div>

                                    </li>
                                @endforeach


                            </ul>
                        </div>
                    </div>

                    <!-- Pagination -->
                    <div class="clearfix"></div>
                    <div class="pagination-container margin-top-40 margin-bottom-0">
                        <nav class="pagination">
                            {!! $reviews->withQueryString()->links() !!}
                        </nav>
                    </div>
                    <div class="clearfix"></div>
                    <!-- Pagination / End -->

                </div>



            </div>
            <!-- Row / End -->



        </div>
    </div>
    <!-- Dashboard Content / End -->
@endsection
