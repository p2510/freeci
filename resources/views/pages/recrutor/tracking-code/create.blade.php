@extends('layouts.user')
@section('title')
    Freeci-Votre code de suivis
@endsection
@section('content')
    <div class="container">

        <div class="row">
            <div class="col-xl-12">

                <section id="not-found" class="center margin-top-50 margin-bottom-25">
                    <p>Vous devez saisir votre code de suivis pour avoir accès à votre espace  </p>
                </section>
              


                <div class="row">
                    <form action="{{ route('follow.store') }}" method='post' class="col-xl-8 offset-xl-2">
                        @csrf
                        @method('post')
                        <div class="intro-banner-search-form not-found-search margin-bottom-50">
                            <!-- Search Field -->
                            <div class="intro-search-field ">
                                <input id="intro-keywords" type="text" placeholder="saisir le code de suivis " name="code"
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
   
            </div>
        </div>

    </div>
@endsection
