@extends('layouts.user')
@section('title')
    Freeci- Faq pour recruteur
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

                    <h2>FAQ - recruteur</h2>


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
                <div class="accordion-header js-accordion-header">Comment fonctionne Freeci?</div>

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
                <div class="accordion-header js-accordion-header">Comment puis-je publier un projet sur Freeci?</div>

                <!-- Accordtion Body -->
                <div class="accordion-body js-accordion-body">

                    <!-- Accordion Content -->
                    <div class="accordion-body__contents">
                        Pour publier un projet, vous n'avez pas besoin de vous inscrire sur Freeci . Vous devez vous rendre
                        dans l'onglet <strong> embauchez </strong> puis continuer vers <strong>Publier un projet</strong> .
                        Pour plus de facilité , nous vous proposons de cliquer <a
                            href="{{ route('mission.create') }}">ICI</a>
                    </div>

                </div>
                <!-- Accordion Body / End -->
            </div>
            <!-- Accordion Item / End -->

            <!-- Accordion Item -->
            <div class="accordion__item js-accordion-item">
                <div class="accordion-header js-accordion-header">Qu'est ce que le code de suivi ?</div>

                <!-- Accordtion Body -->
                <div class="accordion-body js-accordion-body">

                    <!-- Accordion Content -->
                    <div class="accordion-body__contents">
                        Le code de suivi est un code qui permet de vous connecter à votre espace personnel pour la mission
                        afin de suivre l'évolution et les candidats de votre missions . Votre code de mission est disponible
                        une fois que vous publier une mission .

                    </div>

                </div>
                <!-- Accordion Body / End -->
            </div>
            <!-- Accordion Item / End -->

            <!-- Accordion Item -->
            <div class="accordion__item js-accordion-item">
                <div class="accordion-header js-accordion-header">Comment suivre l'évolution de ma mission?</div>

                <!-- Accordtion Body -->
                <div class="accordion-body js-accordion-body">

                    <!-- Accordion Content -->
                    <div class="accordion-body__contents">
                        Pour suivre l'évolution de votre mission , vous devez vous assurer d'avoir votre code de suivi .
                        Vous devez vous rendre
                        dans l'onglet <strong> embauchez </strong> puis continuer vers <strong>Codes suivis</strong> .
                        Pour plus de facilité , nous vous proposons de cliquer <a
                            href="{{ route('follow.search') }}">ICI</a>
                    </div>

                </div>
                <!-- Accordion Body / End -->
            </div>
            <!-- Accordion Item / End -->
            <!-- Accordion Item -->
            <div class="accordion__item js-accordion-item">
                <div class="accordion-header js-accordion-header">Comment puis-je évaluer les compétences d'un freelancer ?
                </div>

                <!-- Accordtion Body -->
                <div class="accordion-body js-accordion-body">
                    <!-- Accordion Content -->
                    <div class="accordion-body__contents">
                        Sur Freeci , les freelancers ont généralement des profils détaillés qui mettent
                        en avant leurs compétences, leur expérience et leurs réalisations passées. Vous pouvez examiner
                        attentivement ces profils pour évaluer les compétences d'un freelancer. De plus, vous pouvez
                        consulter les évaluations et les commentaires laissés par les précédents clients pour avoir une idée
                        de la qualité du travail du freelancer.
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
