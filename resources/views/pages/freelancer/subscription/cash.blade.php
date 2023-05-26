@extends('layouts.freelancer')
@section('title')
    Freeci-valider votre code
@endsection
@section('content')
    <div class="container">

        <div class="row">
            <div class="col-xl-12">

                <section id="not-found" class="center margin-top-50 margin-bottom-25">
                    <p>Vous devez saisir le code que vous avez reçu sur whatsapp . </p>
                </section>
                @if (Session::has('code_status'))
                    @if (Session::get('code_status') == 'invalide')
                        <x-alert-warning message="Votre code de validation est invalide" />
                    @else
                        <x-alert-success
                            message="Votre abonnement a été effectué avec succès . Merci de votre confiance  " />
                    @endif
                @endif


                <div class="row">
                    <form action="{{ route('cash.code.validation') }}" method='post' class="col-xl-8 offset-xl-2">
                        @csrf
                        @method('post')
                        <div class="intro-banner-search-form not-found-search margin-bottom-50">
                            <!-- Search Field -->
                            <div class="intro-search-field ">
                                <input id="intro-keywords" type="text" placeholder="saisir le code ?" name="code"
                                    autofocus>

                            </div>

                            <!-- Button -->
                            <div class="intro-search-button">
                                <button type="submit" class="button ripple-effect">Valider</button>
                            </div>
                        </div>
                        <x-input-error :messages="$errors->get('code')" class="mt-2" />
                    </form>
                </div>
                @if (Session::has('code_status'))
                    @if (Session::get('code_status') == 'valide')
                        <a href="{{ route('invoice') }}" target="_blank"
                            class="button ripple-effect-dark button-sliding-icon margin-top-30">Voir la facture<i
                                class="icon-material-outline-arrow-right-alt"></i></a>
                    @endif
                @endif



            </div>
        </div>

    </div>
@endsection
