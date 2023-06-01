@extends('layouts.user')
@section('title')
    Freeci - Créer une mission
@endsection
@section('content')
    <div class="dashboard-container">




        <!-- Dashboard Content
                             ================================================== -->
        <div class="dashboard-content-container" data-simplebar>
            <div class="dashboard-content-inner">

                <!-- Dashboard Headline -->
                <div class="dashboard-headline">
                    <h3>Publier une mission</h3>
                </div>
                <!-- alert success -->
                @if (session('code'))
                    <x-alert-success
                        message="Votre mission a été publié ,  copier votre code dans un brouillon .  Code de suivi :  {{ session('code') }}" />
                @endif

                <!-- Row -->
                <form action="{{ route('mission.store') }}" method="post" class="row">
                    @csrf
                    <!-- Dashboard Box -->
                    <div class="col-xl-12">
                        <div class="dashboard-box margin-top-0">

                            <!-- Headline -->
                            <div class="headline">
                                <h3><i class="icon-feather-folder-plus"></i>Formulaire de mission</h3>
                            </div>

                            <div class="content with-padding padding-bottom-10">
                                <div class="row">

                                    <div class="col-xl-4">
                                        <div class="submit-field">
                                            <h5>Titre de mission</h5>
                                            <input type="text" class="with-border" name="title"
                                                value="{{ old('title') }}">

                                        </div>
                                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                                    </div>

                                    <div class="col-xl-4">
                                        <div class="submit-field">
                                            <h5>Type de mission</h5>
                                            <select class="selectpicker with-border" data-size="7" title="Choisir un type"
                                                name="type_mission" value="{{ old('type_mission') }}">
                                                <option value="1">En ligne</option>
                                                <option value="2">sur place</option>
                                            </select>

                                        </div>
                                        <x-input-error :messages="$errors->get('type_mission')" class="mt-2" />
                                    </div>

                                    <div class="col-xl-4">
                                        <div class="submit-field">
                                            <h5>Catégories de mission</h5>
                                            <select class="selectpicker with-border" data-size="7"
                                                title="Choisir une catégorie" name="category" value="{{ old('category') }}">
                                                @foreach ($categories as $category)
                                                    <option>{{ $category }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                        <x-input-error :messages="$errors->get('category')" class="mt-2" />

                                    </div>


                                    <div class="col-xl-4">
                                        <div class="submit-field">
                                            <h5>Votre budget pour cette mission ?</h5>
                                            <div class="row">
                                                <div class="col-xl-6">
                                                    <div class="input-with-icon">
                                                        <input class="with-border" type="text" placeholder="Minimum"
                                                            name="budget_min" value="{{ old('budget_min') }}">
                                                        <i class="currency">F</i>
                                                    </div>
                                                </div>

                                                <div class="col-xl-6">
                                                    <div class="input-with-icon">
                                                        <input class="with-border" type="text" placeholder="Maximum"
                                                            name="budget_max" value="{{ old('budget_max') }}">
                                                        <i class="currency">F</i>
                                                    </div>
                                                </div>

                                            </div>
                                            <x-input-error :messages="$errors->get('budget_max')" class="mt-2" />
                                            <x-input-error :messages="$errors->get('budget_min')" class="mt-2" />
                                            <div class="feedback-yes-no margin-top-0">
                                                <div class="radio">
                                                    <input id="radio-1" name="type_budget" value="1" type="radio"
                                                        checked>
                                                    <label for="radio-1"><span class="radio-label"></span>Projet à prix
                                                        fixe</label>
                                                </div>

                                                <div class="radio">
                                                    <input id="radio-2" name="type_budget" value="2" type="radio">
                                                    <label for="radio-2"><span class="radio-label"></span> Prix par jour
                                                    </label>
                                                </div>
                                            </div>
                                            <x-input-error :messages="$errors->get('type_budget')" class="mt-2" />
                                        </div>

                                    </div>

                                    <div class="col-xl-4">
                                        <div class="submit-field">
                                            <h5>Compétences requis<span>(optionnel)</span> <i class="help-icon"
                                                    data-tippy-placement="right"
                                                    title="Les tags optimise la recherche pour les freelancers"></i></h5>
                                            <div class="keywords-container">
                                                <div class="keyword-input-container">
                                                    <input type="text" class="keyword-input with-border"
                                                        placeholder="ex: Php, Sage , Photoshop" />
                                                    <button type="button" class="keyword-input-button ripple-effect"><i
                                                            class="icon-material-outline-add"></i></button>
                                                </div>
                                                <div class="keywords-list">
                                                    <input type="hidden" name="tags" class="inputTags">
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>

                                        </div>
                                        <x-input-error :messages="$errors->get('tags')" class="mt-2" />

                                    </div>
                                    <div class="col-xl-4">
                                        <div class="submit-field">
                                            <h5>Téléphone ( 10 chiffres ) </h5>
                                            <input type="text" class="with-border" name="phone"
                                                placeholder='ex : 0101198482' value="{{ old('phone') }}">

                                        </div>
                                        <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                                    </div>

                                    <div class="col-xl-12">
                                        <div class="submit-field">
                                            <h5>Description de mission</h5>
                                            <textarea cols="30" rows="5" class="with-border" name="description">{{ old('description') }}</textarea>

                                        </div>
                                        <x-input-error :messages="$errors->get('description')" class="mt-2" />

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-12">
                        <button type="submit" class="button ripple-effect big margin-top-30 submit "><i
                                class="icon-feather-plus"></i> Publier mission</button>
                    </div>

                </form>
                <!-- Row / End -->

            </div>
        </div>
        <!-- Dashboard Content / End -->

    </div>

    <script>
        // seed tags
        let input = document.querySelector('.keyword-input');
        let inputTags = document.querySelector('.inputTags');
        let submit = document.querySelector('.submit');

        submit.addEventListener('click', (e) => {
            let tags = document.querySelectorAll('.keyword-text');
            let tagsArr = [];
            tags.forEach(tag => {
                tagsArr.push(tag.innerHTML)
            });
            inputTags.value = tagsArr
        })
    </script>
@endsection
