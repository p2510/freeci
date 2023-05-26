@extends('layouts.freelancer')
@section('title')
    Freeci-Toutes mes missions
@endsection
@section('addTailwind')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
@endsection
@section('content')
    <!-- Dashboard Container -->
    <div class="dashboard-container">




        <!-- Dashboard Content
                         ================================================== -->
        <div class="dashboard-content-container" data-simplebar>
            <div class="dashboard-content-inner">

                <!-- Dashboard Headline -->
                <div class="dashboard-headline">
                    <h3>Toutes mes missions</h3>
                </div>

                @if (Session::has('update-budget'))
                    <x-alert-success message="Votre budget a été modifié" />
                @endif
                @if (Session::has('delete-applicant'))
                    <x-alert-danger message="Votre candidature a été supprimé" />
                @endif
                <x-input-error :messages="$errors->get('budget')" class="mt-2" />

                <!-- Row -->
                <div class="row">

                    <!-- Dashboard Box -->
                    <div class="col-xl-12">
                        <div class="dashboard-box margin-top-0">

                            <!-- Headline -->
                            <div class="headline">
                                <h3><i class="icon-material-outline-gavel"></i> Mes candidatures </h3>
                            </div>

                            <div class="content">
                                <ul class="dashboard-box-list">
                                    @foreach ($datas as $data)
                                        <li>
                                            <!-- Job Listing -->
                                            <div class="job-listing width-adjustment">

                                                <!-- Job Listing Details -->
                                                <div class="job-listing-details">

                                                    <!-- Details -->
                                                    <div class="job-listing-description">
                                                        <h3 class="job-listing-title"><a
                                                                href="{{ route('mission.show', $data->title) }}">{{ $data->title }}</a>
                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Task Details -->
                                            <ul class="dashboard-task-info">
                                                <li><strong>{{ $data->budget }} F</strong><span>Votre budget</span></li>
                                                <li><strong> @if($data->accepted==1) Offre accepté @else Pas de réponse  @endif</strong><span>État</span></li>
                                            </ul>

                                            <!-- Buttons -->
                                            <div class="buttons-to-right always-visible">

                                                <form action="{{ route('applicant.mission.delete', $data->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button href="#small-dialog"
                                                        class="popup-with-zoom-anim button dark ripple-effect ico edit-btn"
                                                        title="Modifier" data-tippy-placement="top"
                                                        id="{{ $data->budget }} {{ $data->id }} {{ $data->mission_id }}"><i
                                                            class="icon-feather-edit"></i></button>
                                                    <button type="submit" class=" button red ripple-effect ico"
                                                        title="Supprimer" data-tippy-placement="top"><i
                                                            class="icon-feather-trash-2"></i></button>
                                                </form>

                                            </div>
                                        </li>
                                    @endforeach
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
        </div>
        <!-- Dashboard Content / End -->

    </div>
    <!-- Dashboard Container / End -->

    </div>
    <!-- Wrapper / End -->


    <!-- Edit Bid Popup
                        ================================================== -->
    <div id="small-dialog" class="zoom-anim-dialog mfp-hide dialog-with-tabs">

        <!--Tabs -->
        <div class="sign-in-form">

            <ul class="popup-tabs-nav">
                <li><a href="#tab">Modifier </a></li>
            </ul>

            <div class="popup-tabs-container">

                <!-- Tab -->
                <form action="{{ route('applicant.mission.update') }}" method="post" class="popup-tab-content"
                    id="tab">
                    @csrf
                    @method('patch')
                    <!-- Bidding -->
                    <div class="bidding-widget">
                        <!-- Headline -->
                        <span class="bidding-detail">Changer <strong>Votre budget en (fcfa) </strong></span>

                        <!-- Price Slider -->

                        <input type="text" class="budget" name="budget" value="" placeholder='Votre budget' />
                        <input type="hidden" class="applicant-mission-id" name="id" value="" />
                        <input type="hidden" class="mission-id" name="mission_id" value="" />

                    </div>

                    <!-- Button -->
                    <button type="sbumit" class="button full-width button-sliding-icon ripple-effect"
                        type="submit">Valider les
                        modifications <i class="icon-material-outline-arrow-right-alt"></i></button>

                </form>

            </div>
        </div>
    </div>


    <script>
        let editBtn = document.querySelectorAll('.edit-btn');
        let budget = document.querySelector('.budget');
        let applicantMissionId = document.querySelector('.applicant-mission-id');
        let missionId = document.querySelector('.mission-id');
        editBtn.forEach(btn => {
            btn.addEventListener('click', () => {
                let val = btn.id.split(' ')

                budget.value = val[0]
                applicantMissionId.value = val[1]
                missionId.value = val[2]
            })
        });
    </script>
@endsection
