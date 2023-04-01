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

                <!-- Row -->
                <div class="row">

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
                                            <input type="text" class="with-border">
                                        </div>
                                    </div>

                                    <div class="col-xl-4">
                                        <div class="submit-field">
                                            <h5>Type de mission</h5>
                                            <select class="selectpicker with-border" data-size="7" title="Choisir un type">
                                                <option>En ligne</option>
                                                <option>sur place</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xl-4">
                                        <div class="submit-field">
                                            <h5>Catégories de mission</h5>
                                            <select class="selectpicker with-border" data-size="7" title="Choisir une catégorie">
                                                <option>Accounting and Finance</option>
                                                <option>Clerical & Data Entry</option>
                                                <option>Counseling</option>
                                                <option>Court Administration</option>
                                                <option>Human Resources</option>
                                                <option>Investigative</option>
                                                <option>IT and Computers</option>
                                                <option>Law Enforcement</option>
                                                <option>Management</option>
                                                <option>Miscellaneous</option>
                                                <option>Public Relations</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-4">
                                        <div class="submit-field">
                                            <h5>Choisir une ville</h5>
                                            <select class="selectpicker with-border" data-size="7" title="Ville">
                                                <option>Accounting and Finance</option>
                                                <option>Clerical & Data Entry</option>
                                                <option>Counseling</option>
                                                <option>Court Administration</option>
                                                <option>Human Resources</option>
                                                <option>Investigative</option>
                                                <option>IT and Computers</option>
                                                <option>Law Enforcement</option>
                                                <option>Management</option>
                                                <option>Miscellaneous</option>
                                                <option>Public Relations</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xl-4">
                                        <div class="submit-field">
                                            <h5>Votre budget pour cette mission ?</h5>
                                            <div class="row">
                                                <div class="col-xl-6">
                                                    <div class="input-with-icon">
                                                        <input class="with-border" type="text" placeholder="Minimum">
                                                        <i class="currency">F</i>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6">
                                                    <div class="input-with-icon">
                                                        <input class="with-border" type="text" placeholder="Maximum">
                                                        <i class="currency">F</i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="feedback-yes-no margin-top-0">
                                                <div class="radio">
                                                    <input id="radio-1" name="radio" type="radio" checked>
                                                    <label for="radio-1"><span class="radio-label"></span>Projet à prix fixe</label>
                                                </div>
    
                                                <div class="radio">
                                                    <input id="radio-2" name="radio" type="radio">
                                                    <label for="radio-2"><span class="radio-label"></span> Prix  par jour </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-4">
                                        <div class="submit-field">
                                            <h5>Tags <span>(optionnel)</span> <i class="help-icon"
                                                    data-tippy-placement="right" title="Les tags optimise la recherche pour les freelancers"></i></h5>
                                            <div class="keywords-container">
                                                <div class="keyword-input-container">
                                                    <input type="text" class="keyword-input with-border"
                                                        placeholder="e.g. job title, responsibilites" />
                                                    <button class="keyword-input-button ripple-effect"><i
                                                            class="icon-material-outline-add"></i></button>
                                                </div>
                                                <div class="keywords-list">
                                                    <!-- keywords go here -->
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-xl-12">
                                        <div class="submit-field">
                                            <h5>Description de mission</h5>
                                            <textarea cols="30" rows="5" class="with-border"></textarea>
                                            <div class="uploadButton margin-top-30">
                                                <input class="uploadButton-input" type="file"
                                                    accept="image/*, application/pdf" id="upload" multiple />
                                                <label class="uploadButton-button ripple-effect" for="upload">Ajouter un fichier</label>
                                                <span class="uploadButton-file-name">(optionnel )</span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-12">
                        <a href="#" class="button ripple-effect big margin-top-30"><i
                                class="icon-feather-plus"></i> Publier mission</a>
                    </div>

                </div>
                <!-- Row / End -->

            </div>
        </div>
        <!-- Dashboard Content / End -->

    </div>
@endsection
