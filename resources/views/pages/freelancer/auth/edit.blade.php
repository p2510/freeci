@extends('layouts.freelancer')
@section('title')
    Freeci-Paramètre de mon compte
@endsection
@section('content')
    <!-- Dashboard Sidebar
                                                                                                                                 ================================================== -->

    <!-- Dashboard Sidebar / End -->


    <!-- Dashboard Content
                                                                                                                                 ================================================== -->

    <!-- Dashboard Headline -->
    <div class="dashboard-headline">
        <h3>Paramètres</h3>status-information-freelancer
        @if (session('status') === 'profile-updated')
            <x-alert-success message="Vos informations de compte  ont  été mises à jour avec succès " />
        @endif
        @if (session('status') === 'profile-update-information-freelancer')
            <x-alert-success message="Votre profil a   été mis à jour avec succès " />
        @endif
        @if (session('status') === 'password-updated')
            <x-alert-success message="Mot de passe modifié " />

        @endif


    </div>

    <!-- Row -->
    <div class="row">

        <!-- Dashboard Box -->
        <form method="post" action="{{ route('profile.update') }}" class="col-xl-12" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="dashboard-box margin-top-0">

                <!-- Headline -->
                <div class="headline">
                    <h3><i class="icon-material-outline-account-circle"></i> Mon compte</h3>
                </div>

                <div class="content with-padding padding-bottom-0">

                    <div class="row">

                        <div class="col-auto">
                            <h5>Photo de profil</h5>
                            <div class="avatar-wrapper" data-tippy-placement="bottom" title="Changer photo de profile">
                                @if (Auth::user()->profil_photo !== null)
                                    <img class="profile-pic"
                                        src="{{ asset('storage/profil_photo/' . Auth::user()->profil_photo) }}"
                                        alt="Photo de profil de  {{ Auth::user()->name }} sur Freeci">
                                @else
                                    <img class="profile-pic" src=""
                                        alt="Photo de profil de {{ Auth::user()->name }} sur Freeci">
                                @endif

                                <div class="upload-button"></div>
                                <input class="file-upload" name="profil_photo" type="file" accept="image/*" />
                                <x-input-error class="mt-2" :messages="$errors->get('profil_photo')" />

                            </div>
                        </div>

                        <div class="col">
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="submit-field">
                                        <h5>Nom et prénom</h5>
                                        <input type="text" class="with-border" name='name'
                                            value="{{ old('name', $user->name) }}">
                                        <x-input-error class="mt-2" :messages="$errors->get('name')" />

                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="submit-field">
                                        <h5>Email</h5>
                                        <input type="email" class="with-border" name='email'
                                            value="{{ old('email', $user->email) }}">
                                        <x-input-error class="mt-2" :messages="$errors->get('email')" />

                                    </div>
                                </div>



                            </div>
                            <div class="col-xl-4">
                                <button type="submit" class="button ripple-effect big margin-top-30">Mettre
                                    à jour</button>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </form>

        <!-- Dashboard Box -->
        <form method="post" action="{{ route('profil.edit.freelancer_information') }}" class="col-xl-12"
            enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="dashboard-box">

                <!-- Headline -->
                <div class="headline">
                    <h3><i class="icon-material-outline-face"></i> Mon profil</h3>
                </div>
                <div class="content">
                    <ul class="fields-ul">
                        <li>
                            <div class="row">
                                <div class="col-xl-4">
                                    <div class="submit-field">
                                        <div class="bidding-widget">
                                            <!-- Headline -->
                                            <span class="bidding-detail">Définissez votre <strong>taux
                                                    journalier moyen
                                                </strong></span>


                                            <!-- Slider -->
                                            <div class="bidding-value margin-bottom-10"><span id="biddingVal"></span> F
                                            </div>
                                            <input class="bidding-slider" type="text" name="tjm" required
                                                value="@if ($freelancer_information) {{ old('tjm', $freelancer_information->tjm) }} @endif "
                                                data-slider-handle="custom" data-slider-currency="F" data-slider-min="1000"
                                                data-slider-max="50000"
                                                data-slider-value="@if ($freelancer_information) {{ $freelancer_information->tjm }} @endif"
                                                data-slider-step="500" data-slider-tooltip="hide" />
                                            <x-input-error class="mt-2" :messages="$errors->get('tjm')" />

                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4">
                                    <div class="submit-field">
                                        <h5>Compétences<i class="help-icon" data-tippy-placement="right"
                                                title="Ajoutez des compétences"></i></h5>
                                        <x-input-error class="mt-2" :messages="$errors->get('skills')" />


                                        <!-- Skills List -->
                                        <div class="keywords-container">
                                            <div class="keyword-input-container">
                                                <input type="text" class="keyword-input with-border"
                                                    placeholder="Html , Sage 100 , Photoshop ..." />
                                                <button class="keyword-input-button ripple-effect" type="button"><i
                                                        class="icon-material-outline-add"></i></button>
                                            </div>
                                            <div class="keywords-list">
                                                @if (!is_null($freelancer_information))
                                                    @foreach ($freelancer_information->skills as $skill)
                                                        <span class="keyword"><span class="keyword-remove"></span><span
                                                                class="keyword-text">{{ $skill }}</span></span>
                                                    @endforeach
                                                @endif

                                                <input type="hidden" name="skills" class="input-skill">

                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-4">
                                    <div class="submit-field">
                                        <h5>Votre CV</h5>

                                        <!-- Attachments -->
                                        <div class="attachments-container margin-top-0 margin-bottom-0">
                                            @if (!is_null($freelancer_information))
                                                <div class="attachment-box ripple-effect">
                                                    <span>Fichier</span>
                                                    <i><a href='{{ asset('storage/cv/' . $freelancer_information->cv) }}'
                                                            target='_blank'>Voir
                                                            ici</a></i>

                                                    <button id="btn_delete_cv">
                                                        <a data-tippy-placement="top" title="Supprimer"
                                                            class="remove-attachment"
                                                            href="{{ route('delete.cv', $freelancer_information->cv) }}"></a>
                                                    </button>

                                                </div>
                                            @else
                                                <div class="attachment-box ripple-effect">
                                                    <span>Fichier</span>
                                                    <i>indisponible</i>

                                                </div>

                                            @endif
                                        </div>
                                        <div class="clearfix"></div>
                                        <!-- Upload Button -->
                                        @if (!is_null($freelancer_information))
                                            <div class="uploadButton margin-top-0">
                                                <input class="uploadButton-input" type="file" name='cv'
                                                    accept="application/pdf" id="upload" multiple />
                                                <x-input-error class="mt-2" :messages="$errors->get('cv')" />

                                                <label class="uploadButton-button ripple-effect" for="upload">Changer le
                                                    cv </label>
                                                <span class="uploadButton-file-name">Taille maximum : 1
                                                    MB</span>
                                            </div>
                                        @else
                                            <div class="uploadButton margin-top-0">
                                                <input class="uploadButton-input" type="file" name='cv'
                                                    accept="application/pdf" id="upload" multiple />
                                                <x-input-error class="mt-2" :messages="$errors->get('cv')" />

                                                <label class="uploadButton-button ripple-effect" for="upload">Ajouter
                                                    fichier pdf</label>
                                                <span class="uploadButton-file-name">Taille maximum : 1
                                                    MB</span>
                                            </div>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="submit-field">
                                        <h5>Metier</h5>
                                        <input type="text" class="with-border" name="job" required
                                            value="@if ($freelancer_information) {{ old('job', $freelancer_information->job) }} @endif"
                                            placeholder="Développeur web , Photographe ...">
                                        <x-input-error class="mt-2" :messages="$errors->get('job')" />

                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="submit-field">
                                        <h5>Domaine d'activité</h5>
                                        <select name="domain" class="selectpicker with-border" data-size="10"
                                            title="Choisir un domaine" data-live-search="true">
                                            @foreach ($domain as $item)
                                                <option value="{{ $item->name }}"
                                                    @if ($freelancer_information) @if ($freelancer_information->domain == $item->name) selected @endif
                                                    @endif>{{ $item->name }}</option>
                                            @endforeach

                                        </select>
                                        <x-input-error class="mt-2" :messages="$errors->get('domain')" />

                                    </div>
                                </div>

                                <div class="col-xl-12">
                                    <div class="submit-field">
                                        <h5>Présentez-vous</h5>
                                        <textarea name="description" required cols="30" rows="5" class="with-border">
                                          @if ($freelancer_information) {{ old('description', $freelancer_information->description) }} @endif
                                        </textarea>
                                        <x-input-error class="mt-2" :messages="$errors->get('description')" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <button type="submit"
                                    class="button ripple-effect big margin-top-30 submit-profile">Mettre
                                    à jour</button>
                            </div>


                        </li>


                    </ul>

                </div>

            </div>

        </form>

        <!-- Dashboard Box -->
        <form method="post" action="{{ route('password.update') }}" class="col-xl-12">
            @csrf
            @method('put')
            <div id="test1" class="dashboard-box">

                <!-- Headline -->
                <div class="headline">
                    <h3><i class="icon-material-outline-lock"></i> Mot de passe et sécurité</h3>
                </div>

                <div class="content with-padding">
                    <div class="row">
                        <div class="col-xl-4">
                            <div class="submit-field">
                                <h5>Mot de passe actuel</h5>
                                <input type="password" class="with-border" name="current_password" required>
                                <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />

                            </div>
                        </div>

                        <div class="col-xl-4">
                            <div class="submit-field">
                                <h5>Nouveau mot de passe</h5>
                                <input type="password" class="with-border" name="password" required>
                                <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />

                            </div>
                        </div>

                        <div class="col-xl-4">
                            <div class="submit-field">
                                <h5>Confirmer le mot de passe</h5>
                                <input type="password" class="with-border" name="password_confirmation" required>
                                <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />

                            </div>
                        </div>


                    </div>
                    <!-- Button -->
                    <div class="col-xl-12">
                        <button type="submit" class="button ripple-effect big margin-top-30">Mettre à
                            jour</button>
                    </div>
                </div>

            </div>

        </form>



    </div>
    <!-- Row / End -->



    <!-- Dashboard Content / End -->


    <script>
        // seed skill 
        let input = document.querySelector('.keyword-input');
        let inputSkill = document.querySelector('.input-skill');
        let submit = document.querySelector('.submit-profile');

        submit.addEventListener('click', (e) => {
            let skills = document.querySelectorAll('.keyword-text');
            let skillArr = [];
            skills.forEach(skill => {
                skillArr.push(skill.innerHTML)
            });
            inputSkill.value = skillArr
        })
    </script>
@endsection
