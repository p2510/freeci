@extends('layouts.user')
@section('title')
    Freeci-votre espace mission
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
                    <h3>{{ $mission->title }}</h3>
                    <span class="margin-top-7">Retrouver tous
                        <a href="#">les candidats à votre mission
                            ( Entre
                            {{ $mission->budget_min }}F - {{ $mission->budget_max }}F
                            )@if ($mission->type_budget == '1')
                                En une
                                fois
                            @else
                                Par jour
                            @endif
                        </a></span>


                </div>

                <!-- Row -->
                <div class="row">

                    <!-- Dashboard Box -->
                    <div class="col-xl-12">
                        <div class="dashboard-box margin-top-0">

                            <!-- Headline -->
                            <div class="headline">
                                <h3><i class="icon-material-outline-supervisor-account"></i> {{ count($applicants) }}
                                    Candidats</h3>

                            </div>

                            <div class="content">
                                <ul class="dashboard-box-list">
                                    @foreach ($applicants as $applicant)
                                        <li>
                                            <!-- Overview -->
                                            <div class="freelancer-overview manage-candidates">
                                                <div class="freelancer-overview-inner">

                                                    <!-- Avatar -->
                                                    <div class="freelancer-avatar">
                                                        <div class="verified-badge"></div>
                                                        <a href="{{ route('freelancer.show', $applicant->name) }}">
                                                            @if ($applicant->profil_photo !== null)
                                                                <img src="{{ asset('storage/profil_photo/' . $applicant->profil_photo) }}"
                                                                    alt="" title="{{ $applicant->name }}"
                                                                    data-tippy-placement="top"
                                                                    alt="Photo de profile de  {{ $applicant->name }} sur Freeci">
                                                            @else
                                                                <img src="https://ui-avatars.com/api/?name={{ $applicant->name }}&background=2A41E8&color=fff"
                                                                    title="{{ $applicant->name }}"
                                                                    alt="Photo de profile de {{ $applicant->name }} sur Freeci">
                                                            @endif
                                                        </a>
                                                    </div>

                                                    <!-- Name -->
                                                    <div class="freelancer-name">
                                                        <h4><a href="{{ route('freelancer.show', $applicant->name) }}">{{ $applicant->name }}<img
                                                                    class="flag" src="images/flags/de.svg" alt=""
                                                                    title="Germany" data-tippy-placement="top"></a></h4>

                                                        <!-- Details -->
                                                        <span class="freelancer-detail-item"><a
                                                                href="mailto:{{ $applicant->email }}"><i
                                                                    class="icon-feather-mail"></i>
                                                                {{ $applicant->email }}</a></span>



                                                        <!-- Bid Details -->
                                                        <ul class="dashboard-task-info bid-info">
                                                            <li><strong>{{ $applicant->budget }} F</strong><span>Son
                                                                    budget</span></li>

                                                        </ul>
                                                        <!-- Buttons -->
                                                        <div
                                                            class="buttons-to-right always-visible margin-top-25 margin-bottom-0">

                                                            <a href="#small-dialog-1"
                                                                id="{{ $applicant->budget }} {{ $applicant->user_id }}"
                                                                class="accept-btn popup-with-zoom-anim button ripple-effect"><i
                                                                    class="icon-material-outline-check"></i>Accepter
                                                                l'offre</a>
                                                            <!-- in deveoppement -->
                                                            <!--
                                                            <a href="#small-dialog-2"  id="{{ $applicant->budget }} {{ $applicant->user_id }}"
                                                                class="message-btn popup-with-zoom-anim button dark ripple-effect"><i
                                                                    class="icon-feather-mail"></i> Envoyer le message</a>
                                                            -->

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach


                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- Row / End -->



            </div>
        </div>
        <!-- Dashboard Content / End -->

    </div>
    <!-- Dashboard Container / End -->

    </div>
    <!-- Wrapper / End -->


    <!-- Bid Acceptance Popup
                                    ================================================== -->
    <div id="small-dialog-1" class="zoom-anim-dialog mfp-hide dialog-with-tabs">

        <!--Tabs -->
        <div class="sign-in-form">

            <ul class="popup-tabs-nav">
                <li><a href="#tab1">Accepter l'offre</a></li>
            </ul>

            <div class="popup-tabs-container">

                <!-- Tab -->
                <div class="popup-tab-content" id="tab">

                    <!-- Welcome Text -->
                    <div class="welcome-text">
                        <h3>Accepter cette offre</h3>
                        <div class="bid-acceptance margin-top-15">
                            0 F
                        </div>

                    </div>



                    <form action="{{ route('follow.accepted') }}" method="post">
                        @csrf
                        @method('patch')
                        <input type="hidden" value="" name="user_id" class="userId">
                        <!-- Button -->
                        <button type="submit"
                            class="margin-top-15 button full-width button-sliding-icon ripple-effect">Accepter <i
                                class="icon-material-outline-arrow-right-alt"></i></button>
                    </form>

                </div>

            </div>
        </div>
    </div>

    <!-- Bid Acceptance Popup / End -->

    <!-- in developpement -->
    <!-- Send Direct Message Popup
    <div id="small-dialog-2" class="zoom-anim-dialog mfp-hide dialog-with-tabs">


        <div class="sign-in-form">

            <ul class="popup-tabs-nav">
                <li><a href="#tab2">Envoyer un Message</a></li>
            </ul>

            <div class="popup-tabs-container">

               
                <form action="{{ route('message.store.recrutor') }}" method="post" class="popup-tab-content" id="tab2">
                    @csrf
                    @method('post')
                   
                    <div class="welcome-text">
                        <h3>Un message direct</h3>
                    </div>

             
                    <div  id="send-pm">

                        <input type="hidden" value="{{ $mission->id }}" name="mission_id">
                        <input type="hidden" value="" name="user_id" class="userId">
                        <textarea name="content" cols="10" placeholder="Votre message" class="with-border" required></textarea>
                        <x-input-error :messages="$errors->get('content')" class="mt-2" />

                    </div >

                 
                    <button type="submit" class="button full-width button-sliding-icon ripple-effect" 
                       >Envoyer <i class="icon-material-outline-arrow-right-alt"></i></button>

                </form>

            </div>
        </div>
    </div>
     ================================================== -->
    <!-- Send Direct Message Popup / End -->

    <script>
        let btns = document.querySelectorAll('.accept-btn');
        let btns_message = document.querySelectorAll('.message-btn');
        let bid = document.querySelector('.bid-acceptance');
        let userId = document.querySelectorAll('.userId');
        btns.forEach(btn => {
            btn.addEventListener('click', () => {
                const customBtn = btn.id.split(' ');
                bid.innerHTML = parseInt(customBtn[0]) + ' F';
                userId.forEach(user => {
                    user.value = parseInt(customBtn[1]);
                });
            })
        });
        btns_message.forEach(btn_message => {
            btn_message.addEventListener('click', () => {
                const customBtn = btn_message.id.split(' ');
                userId.forEach(user => {
                    user.value = parseInt(customBtn[1]);
                    
                });
            })
        });
    </script>
@endsection
