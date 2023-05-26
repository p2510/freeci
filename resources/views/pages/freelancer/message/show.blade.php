@extends('layouts.freelancer')
@section('title')
    Freeci- Messagerie {{ $currentMission->title }}
@endsection
@section('content')
    <div class="dashboard-container">


        <!-- Dashboard Content
                     ================================================== -->
        <div class="dashboard-content-container" data-simplebar>
            <div class="dashboard-content-inner">
                <!-- Dashboard Headline -->
                <div class="dashboard-headline">
                    <h3>Votre messagerie</h3>

                </div>

                <div class="messages-container margin-top-0">

                    <div class="messages-container-inner">

                        <!-- Messages -->
                        <div class="messages-inbox">
                            <div class="messages-headline">
                                <div class="input-with-icon">
                                    <input id="autocomplete-input" type="text" placeholder="Recherche">
                                    <i class="icon-material-outline-search"></i>
                                </div>
                            </div>

                            <ul>

                                @if (count($missions) > 0)
                                    @foreach ($missions as $mission)
                                        <li @if ($mission->title == $currentMission->title) class="active-message" @endif>
                                            <a href="{{ route('message.show.freelancer', $mission->title) }}">
                                                <div class="message-avatar"><i class="status-icon status-online"></i><img
                                                        src="{{ asset('images/user_avatar_placeholder.png') }}"
                                                        alt="{{ $mission->title }}" /></div>

                                                <div class="message-by">
                                                    <div class="message-by-headline">
                                                        <h5>{{ $mission->title }}</h5>
                                                    </div>
                                                    <p>{{ $mission->description }}</p>
                                                </div>
                                            </a>
                                        </li>
                                    @endforeach
                                @endif

                            </ul>
                        </div>
                        <!-- Messages / End -->

                        <!-- Message Content -->
                        <div class="message-content">

                            <div class="messages-headline">
                                <h4>Message</h4>
                                <a href="#" class="message-action"><i class="icon-feather-trash-2"></i>Vider 
                                    conversation</a>
                            </div>

                            <!-- Message Content Inner -->
                            <div class="message-content-inner">
                                @if (count($missions) > 0)
                                
                                    @php
                                        $initCreatedAt = '';
                                    @endphp
                                    @foreach ($messages as $message)
                                        <!-- Time Sign -->
                                        @if ($message->created_at->format('d-m-Y') !== $initCreatedAt)
                                            <div class="message-time-sign">
                                                <span>{{ $message->created_at->format('d-m-Y') }}</span>
                                            </div>
                                            @php
                                                $initCreatedAt = $message->created_at->format('d-m-Y');
                                            @endphp
                                        @endif

                                        @if ($message->author == 'freelancer')
                                            <div class="message-bubble me">
                                                <div class="message-bubble-inner">
                                                    <div class="message-avatar"><img
                                                            src="{{ asset('storage/profil_photo/' . Auth::user()->profil_photo) }}"
                                                            alt="mon avatar " /></div>
                                                    <div class="message-text">
                                                        <p>{{ $message->content }}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        @else
                                            <div class="message-bubble">
                                                <div class="message-bubble-inner">
                                                    <div class="message-avatar"><img
                                                            src="{{ asset('images/user_avatar_placeholder.png') }}"
                                                            alt="" /></div>
                                                    <div class="message-text">
                                                        <p>{{ $message->content }}</p>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        @endif
                                    @endforeach
                         
                                    @if (count($messages)==0)
                                        <span>Aucun message disponible</span>
                                    @endif
                                @endif
                            </div>
                            <!-- Message Content Inner / End -->
                            <!-- Reply Area -->
                            @if (count($missions) > 0)
                                <form action="{{ route('message.store.freelancer') }}" method="post"class="message-reply">
                                    @csrf
                                    <input type="hidden" name='user_id' value="{{ Auth::user()->id }}">
                                    <input type="hidden" name='mission_id' value="{{ $currentMission->id }}">
                                    <textarea name="content" cols="1" rows="1" placeholder="Votre message" data-autoresize autofocus></textarea>
                                    <button class="button ripple-effect">Envoyer</button>
                                </form>
                            @endif

                        </div>
                        <!-- Message Content -->

                    </div>
                </div>
                <!-- Messages Container / End -->






            </div>
        </div>
        <!-- Dashboard Content / End -->

    </div>
@endsection
