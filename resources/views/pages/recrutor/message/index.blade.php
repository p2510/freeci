@extends('layouts.user')
@section('title')
    Freeci - Mes messages
@endsection
@section('content')
    <div class="dashboard-container">


        <!-- Dashboard Content
                     ================================================== -->
        <div class="dashboard-content-container" data-simplebar>
            <div class="dashboard-content-inner">

                <!-- Dashboard Headline -->
                <div class="dashboard-headline">
                    <h3>Messages</h3>
                </div>

                <div class="messages-container margin-top-0">

                    <div class="messages-container-inner">


                        <!-- Message Content -->
                        <div class="message-content">

                            <div class="messages-headline">
                                <h4>{{ $freelancer->name }}</h4>

                            </div>

                            <!-- Message Content Inner -->
                            <div class="message-content-inner">


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

                                    @if ($message->author == 'recrutor')
                                        <div class="message-bubble me">
                                            <div class="message-bubble-inner">
                                                <div class="message-avatar"><img
                                                        src="{{ asset('images/user_avatar_placeholder.png') }}"
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
                                                        src="{{ asset('storage/profil_photo/' . $freelancer->profil_photo) }}"
                                                        alt="" /></div>
                                                <div class="message-text">
                                                    <p>{{ $message->content }}</p>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    @endif
                                @endforeach




                            </div>
                          
                            <!-- Reply Area -->
                            <form action="{{ route('message.store.recrutor') }}" method="post"class="message-reply">
                                @csrf
                                <input type="hidden" name='user_id' value="{{ $applicant->user_id }}">
                                <input type="hidden" name='mission_id' value="{{ $applicant->mission_id }}">
                                <textarea name="content" cols="1" rows="1" placeholder="Votre message" data-autoresize autofocus></textarea>
                                <button class="button ripple-effect">Envoyer</button>
                            </form>
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
