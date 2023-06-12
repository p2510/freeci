@extends('layouts.user')
@section('title')
    Freeci- Faq pour freelancer
@endsection
@section('addTailwind')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
@endsection
@section('content')
    <!-- Titlebar
                                                                                    ================================================== -->
    <div id="titlebar" class="gradient">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <h2>FAQ - freelancer</h2>


                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>

    <div class="container margin-bottom-30">

        <!-- Accordion -->
        <div class="accordion js-accordion">

            <!-- Accordion Item -->
            <div class="accordion__item js-accordion-item">
                <div class="accordion-header js-accordion-header">Qu'est-ce que Freeci ?</div>

                <!-- Accordtion Body -->
                <div class="accordion-body js-accordion-body">

                    <!-- Accordion Content -->
                    <div class="accordion-body__contents">
                        Freeci est une plateforme qui permet aux recruteurs de
                        trouver des travailleurs indépendants pour des projets spécifiques. Freeci
                        offre une large gamme de compétences, allant de la rédaction de contenu à la conception graphique
                        en passant par la programmation...
                    </div>

                </div>
                <!-- Accordion Body / End -->
            </div>
            <!-- Accordion Item / End -->

            <!-- Accordion Item -->
            <div class="accordion__item js-accordion-item active">
                <div class="accordion-header js-accordion-header">Comment fonctionne Freeci ?</div>

                <!-- Accordtion Body -->
                <div class="accordion-body js-accordion-body">

                    <!-- Accordion Content -->
                    <div class="accordion-body__contents">
                        Sur Freeci, les recruteurs peuvent publier des offres de projet détaillées,
                        spécifiant les compétences requises, le budget alloué . Les freelancers intéressés
                        peuvent soumettre leur candidature en fournissant des informations sur leur expérience et leurs
                        compétences. Les recruteurs peuvent examiner les profils des freelancers, évaluer leurs compétences
                        et leur expérience, et choisir le candidat qui correspond le mieux à leurs besoins.
                    </div>


                </div>
                <!-- Accordion Body / End -->
            </div>
            <!-- Accordion Item / End -->

            <!-- Accordion Item -->
            <div class="accordion__item js-accordion-item">
                <div class="accordion-header js-accordion-header">Comment puis-je m'inscrire en tant que freelancer sur
                    Freeci ?</div>

                <!-- Accordtion Body -->
                <div class="accordion-body js-accordion-body">

                    <!-- Accordion Content -->
                    <div class="accordion-body__contents">
                        Pour vous inscrire en tant que freelancer sur Freeci , vous devez créer un compte en
                        fournissant vos informations personnelles, telles que votre nom, votre adresse e-mail ... Une fois
                        inscrit, vous pourrez créer votre profil professionnel en ajoutant des
                        informations sur votre expérience, votre compétences, vos compétences et votre CV.
                    </div>

                </div>
                <!-- Accordion Body / End -->
            </div>
            <!-- Accordion Item / End -->

            <!-- Accordion Item -->
            <div class="accordion__item js-accordion-item">
                <div class="accordion-header js-accordion-header">Comment puis-je trouver des missions sur la plateforme ?
                </div>

                <!-- Accordtion Body -->
                <div class="accordion-body js-accordion-body">

                    <!-- Accordion Content -->
                    <div class="accordion-body__contents">
                        Une fois inscrit sur Freeci, vous pouvez parcourir les offres de projet disponibles en
                        fonction de vos compétences et de vos intérêts. Utilisez les filtres de recherche pour affiner vos
                        résultats et trouver des projets qui correspondent à vos critères.

                    </div>

                </div>
                <!-- Accordion Body / End -->
            </div>
            <!-- Accordion Item / End -->

            <!-- Accordion Item -->
            <div class="accordion__item js-accordion-item">
                <div class="accordion-header js-accordion-header">Comment puis-je augmenter mes chances d'être sélectionné
                    pour un projet ?</div>

                <!-- Accordtion Body -->
                <div class="accordion-body js-accordion-body">

                    <!-- Accordion Content -->
                    <div class="accordion-body__contents">
                        Pour augmenter vos chances d'être sélectionné pour un projet, assurez-vous que votre profil est
                        complet et professionnel. Mettez en valeur vos compétences, votre expérience et vos réalisations
                        passées. Personnalisez votre candidature pour chaque projet en montrant comment vos compétences
                        correspondent aux besoins du client. Vous pouvez passer en mode Premium ou Expert mettre votre
                        profil en avant.
                    </div>

                </div>
                <!-- Accordion Body / End -->
            </div>
            <!-- Accordion Item / End -->
            <!-- Accordion Item -->
            <div class="accordion__item js-accordion-item">
                <div class="accordion-header js-accordion-header"> Comment fixer le prix de mes services en tant que
                    freelancer ?
                </div>

                <!-- Accordtion Body -->
                <div class="accordion-body js-accordion-body">
                    <!-- Accordion Content -->
                    <div class="accordion-body__contents">
                        Fixer le prix de vos services en tant que freelancer peut dépendre de plusieurs facteurs, tels que
                        votre expérience, vos compétences, la complexité du projet et le marché du freelancing. Faites des
                        recherches sur les tarifs pratiqués par d'autres freelancers dans votre domaine pour avoir une idée
                        des prix courants. Soyez transparent sur vos tarifs dans votre profil et lors de la soumission de
                        votre candidature.
                    </div>

                </div>
                <!-- Accordion Body / End -->
            </div>
            <!-- Accordion Item / End -->
            <!-- Accordion Item -->
            <div class="accordion__item js-accordion-item">
                <div class="accordion-header js-accordion-header">Comment fixer un budget pour mon projet ?
                </div>

                <!-- Accordtion Body -->
                <div class="accordion-body js-accordion-body">
                    <!-- Accordion Content -->
                    <div class="accordion-body__contents">
                        Fixer un budget pour votre projet peut dépendre de plusieurs facteurs, tels que la complexité de la
                        tâche, le niveau d'expertise requis et le marché du freelancing. Vous pouvez rechercher des projets
                        similaires sur Freeci et voir quel est le budget moyen proposé. Vous pouvez également
                        discuter avec les freelancers intéressés pour obtenir des estimations de prix. Assurez-vous de fixer
                        un budget réaliste pour attirer des freelancers qualifiés.
                    </div>

                </div>
                <!-- Accordion Body / End -->
            </div>
            <!-- Accordion Item / End -->

            <!-- Accordion Item -->
            <div class="accordion__item js-accordion-item">
                <div class="accordion-header js-accordion-header">J'ai d'autres questions ?
                </div>

                <!-- Accordtion Body -->
                <div class="accordion-body js-accordion-body">
                    <!-- Accordion Content -->
                    <div class="accordion-body__contents">
                        Vous pouvez nous joindre pour vos questions sur ce contact <strong>(+225) 01-01-23-33-78</strong>
                    </div>

                </div>
                <!-- Accordion Body / End -->
            </div>
            <!-- Accordion Item / End -->

        </div>
        <!-- Accordion / End -->

    </div>
@endsection
