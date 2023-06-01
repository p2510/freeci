@extends('layouts.user')
@section('title')
    Freeci-le profil de @foreach ($freelancer as $item)
        {{ $item->name }}
    @endforeach
@endsection
@section('content')
    <!-- alert success -->

    <!-- Titlebar
                                                        ================================================== -->
    @foreach ($freelancer as $item)
        <div class="single-page-header freelancer-header" data-background-image="images/single-freelancer.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="single-page-header-inner">
                            <div class="left-side">
                                <div class="header-image freelancer-avatar">
                                    @if ($item->profil_photo !== null)
                                        <img src="{{ asset('storage/profil_photo/' . $item->profil_photo) }}"
                                            alt="Photo de profile de  {{ $item->name }} sur Freeci">
                                    @else
                                        <img src="https://ui-avatars.com/api/?name={{ $item->name }}&background=2A41E8&color=fff"
                                            alt="Photo de profile de {{ $item->name }} sur Freeci">
                                    @endif
                                </div>
                                <div class="header-details">
                                    <h3>{{ $item->name }} <span>{{ $item->job }}</span></h3>
                                    <ul>
                                        <li>
                                            <div class="star-rating" data-rating="{{ $countRecommended }}"></div>
                                        </li>
                                        <li>
                                            @if ($item->visibility)
                                                Disponible
                                            @else
                                                Indisponible
                                            @endif
                                        </li>
                                        @if ($item->plan)
                                            <li>
                                                @if ($item->plan == 'pro')
                                                    <div
                                                        style="color:white;text-transform:capitalize;background-color:#febe42;text-align:center; padding-left:6px;padding-right:6px;">
                                                        {{ $item->plan }}</div>
                                                @elseif ($item->plan == 'expert')
                                                    <div
                                                        style="color:white;text-transform:capitalize;background-color:#38b653;text-align:center;padding-left:6px;padding-right:6px;">
                                                        {{ $item->plan }}</div>
                                                @endif
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if (session('success'))
            <x-alert-success message="Félicitation !! Vous avez ajouté un nouveau  commentaire . " />
        @endif
        @if ($errors->any())
            <x-alert-danger message="Erreur , renseignez à nouveau les informations du commentaire" />
        @endif

        <!-- Page Content
                                                        ================================================== -->
        <div class="container">
            <div class="row">

                <!-- Content -->
                <div class="col-xl-8 col-lg-8 content-right-offset">

                    <!-- Page Content -->
                    <div class="single-page-section">
                        <h3 class="margin-bottom-25">À propos de moi</h3>
                        <p>{{ $item->description }}</p>
                    </div>

                    <!-- Boxed List -->
                    <div class="boxed-list margin-bottom-60">
                        <div class="boxed-list-headline">
                            <h3><i class="icon-material-outline-thumb-up"></i>Les trois(3) derniers commentaires </h3>
                        </div>
                        <ul class="boxed-list-ul">
                            @foreach ($reviews as $review)
                                <li>
                                    <div class="boxed-list-item">
                                        <!-- Content -->
                                        <div class="boxed-list-item">
                                            <!-- Content -->
                                            <div class="item-content">
                                                <h4>{{ $review->title }}
                                                    <span>
                                                        Par
                                                        @if ($review->name)
                                                            {{ $review->name }}
                                                        @else
                                                        un anonyme
                                                        @endif
                                                    </span>
                                                </h4>
                                                <div class="item-details margin-top-10">
                                                    <div class="star-rating" data-rating="{{ $review->rating }}"></div>
                                                    <div class="detail-item"><i
                                                            class="icon-material-outline-date-range"></i>
                                                        {{ $review->created_at }}</div>
                                                </div>
                                                <div class="item-description">
                                                    <p>{{ $review->message }} </p>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </li>
                            @endforeach


                        </ul>
                 


                    </div>
                    <!-- Boxed List / End -->


                </div>


                <!-- Sidebar -->
                <div class="col-xl-4 col-lg-4">
                    <div class="sidebar-container">

                        <!-- Profile Overview -->
                        <div class="profile-overview">
                            <div class="overview-item"><strong>{{ $item->tjm }} F</strong><span>Tarif par jour</span>
                            </div>
                            <div class="overview-item"><strong>53</strong><span>Projet réalisé</span></div>
                            <div class="overview-item"><strong>{{ $item->created_at }}</strong><span>Inscrit</span></div>
                        </div>

                        <!-- Button -->
                        <a href="#small-dialog" class="apply-now-button popup-with-zoom-anim margin-bottom-50">Laisser un commentaire
                            <i class="icon-material-outline-arrow-right-alt"></i></a>

                        <!-- Freelancer Indicators -->
                        <div class="sidebar-widget">
                            <div class="freelancer-indicators">

                                <!-- Indicator -->
                                <div class="indicator">
                                    <strong>88%</strong>
                                    <div class="indicator-bar" data-indicator-percentage="88"><span></span></div>
                                    <span>Taux de marché</span>
                                </div>

                                <!-- Indicator -->
                                <div class="indicator">
                                    <strong>100%</strong>
                                    <div class="indicator-bar" data-indicator-percentage="100"><span></span></div>
                                    <span>Recommendation</span>
                                </div>


                            </div>
                        </div>

                        <!-- Widget
                                                                <div class="sidebar-widget">
                                                                    <h3>Réseaux sociaux</h3>
                                                                    <div class="freelancer-socials margin-top-25">
                                                                        <ul>
                                                                            <li><a href="#" title="Dribbble" data-tippy-placement="top"><i
                                                                                        class="icon-brand-dribbble"></i></a></li>
                                                                            <li><a href="#" title="Twitter" data-tippy-placement="top"><i
                                                                                        class="icon-brand-twitter"></i></a></li>
                                                                            <li><a href="#" title="Behance" data-tippy-placement="top"><i
                                                                                        class="icon-brand-behance"></i></a></li>
                                                                            <li><a href="#" title="GitHub" data-tippy-placement="top"><i
                                                                                        class="icon-brand-github"></i></a></li>

                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                -->


                        <!-- Widget -->
                        <div class="sidebar-widget">
                            <h3>Compétences</h3>
                            <div class="task-tags">
                                @foreach ($item->skills as $skill)
                                    <span>{{ $skill }}</span>
                                @endforeach

                            </div>
                        </div>

                        <!-- Widget -->
                        <div class="sidebar-widget">
                            <h3>CV</h3>
                            @if (!is_null($item->cv))
                                <div class="attachments-container">
                                    <a href="{{ asset('storage/cv/' . $item->cv) }}" target='_blank'
                                        class="attachment-box ripple-effect"><span>Disponible</span><i>Voir ici</i></a>
                                </div>
                            @else
                                <div class="attachments-container">
                                    <a href="#" class="attachment-box ripple-effect"><span>Indisponible</span></a>
                                </div>
                            @endif
                        </div>







                        <!-- Sidebar Widget -->
                        <div class="sidebar-widget">

                            @livewire('recommend', ['user_id' => $item->id])

                            <!-- Copy URL -->
                            <div class="copy-url">
                                <input id="copy-url" type="text" value="" class="with-border">
                                <button class="copy-url-button ripple-effect" data-clipboard-target="#copy-url"
                                    title="Partager" data-tippy-placement="top"><i
                                        class="icon-material-outline-file-copy"></i></button>
                            </div>


                            <!-- Share Buttons -->


                            <div class="share-buttons margin-top-25">
                                <h3>Partager</h3>
                                <div class="share-buttons-trigger"><i class="icon-feather-share-2"></i></div>
                                <div class="share-buttons-content">
                                    <span>Intéressant? <strong>Partager!</strong></span>
                                    <ul class="share-buttons-icons">
                                        <li><a href="#" data-button-color="#3b5998" title="Partager sur Facebook"
                                                data-tippy-placement="top"><i class="icon-brand-facebook-f"></i></a></li>
                                        <li><a href="#" data-button-color="#1da1f2" title="Partager sur Twitter"
                                                data-tippy-placement="top"><i class="icon-brand-twitter"></i></a></li>
                                        <li><a href="#" data-button-color="#dd4b39"
                                                title="Partager sur Google Plus" data-tippy-placement="top"><i
                                                    class="icon-brand-google-plus-g"></i></a></li>
                                        <li><a href="#" data-button-color="#0077b5" title="Partager sur LinkedIn"
                                                data-tippy-placement="top"><i class="icon-brand-linkedin-in"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    @endforeach
    <!-- Leave a Review Popup
                                ================================================== -->
    <div id="small-dialog" class="zoom-anim-dialog mfp-hide dialog-with-tabs">

        <!--Tabs -->
        <div class="sign-in-form">

            <ul class="popup-tabs-nav">
                <li><a href="#tab">Laisser un commentaire</a></li>
            </ul>

            <div class="popup-tabs-container">

                <!-- Tab -->
                <div class="popup-tab-content" id="tab">

                    <!-- Welcome Text -->
                    <div class="welcome-text">
                        <h3>Combien d'étoile pour {{ $freelancer[0]->name }} ?</h3>

                        <!-- Form -->
                        <form action='{{ route('review.store', $freelancer[0]->name) }}' method="post"
                            id="leave-company-review-form">

                            @csrf
                            @method('post')
                            <!-- Leave Rating -->
                            <div class="clearfix"></div>
                            <div class="leave-rating-container">
                                <div class="leave-rating margin-bottom-5">
                                    <input type="radio" name="rating" id="rating-1" value="1">
                                    <label for="rating-1" class="icon-material-outline-star"></label>
                                    <input type="radio" name="rating" id="rating-2" value="2">
                                    <label for="rating-2" class="icon-material-outline-star"></label>
                                    <input type="radio" name="rating" id="rating-3" value="3">
                                    <label for="rating-3" class="icon-material-outline-star"></label>
                                    <input type="radio" name="rating" id="rating-4" value="4">
                                    <label for="rating-4" class="icon-material-outline-star"></label>
                                    <input type="radio" name="rating" id="rating-5" value="5">
                                    <label for="rating-5" class="icon-material-outline-star"></label>
                                </div>

                            </div>
                            <div class="clearfix"></div>
                            <x-input-error :messages="$errors->get('rating')" class="mt-2" />
                            <!-- Leave Rating / End-->

                    </div>


                    <div class="row">
                        <div class="col-xl-12">
                            <div class="input-with-icon-left"
                                title="Laisser vide pour ajouter un commentaire de manière anonyme"
                                data-tippy-placement="bottom">
                                <i class="icon-material-outline-account-circle"></i>
                                <input type="text" class="input-text with-border" name="name" id="name"
                                    placeholder="Votre nom et prénom" value="{{ old('name') }}" />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />

                            </div>
                        </div>

                        <div class="col-xl-12">
                            <div class="input-with-icon-left">
                                <i class="icon-material-outline-rate-review"></i>
                                <input type="text" class="input-text with-border" value="{{ old('title') }}"
                                    name="title" id="reviewtitle" placeholder="Titre du commentaire" required />
                                <x-input-error :messages="$errors->get('title')" class="mt-2" />

                            </div>
                        </div>
                    </div>


                    <textarea class="with-border" placeholder="Commentaire" value="{{ old('message') }}" name="message" id="message"
                        cols="7" required></textarea>
                    <x-input-error :messages="$errors->get('message')" class="mt-2" />



                    <!-- Button -->
                    <button class="button margin-top-35 full-width button-sliding-icon ripple-effect" type="submit"
                        form="leave-company-review-form">Laisser un commentaire <i
                            class="icon-material-outline-arrow-right-alt"></i></button>

                    </form>


                </div>

            </div>
        </div>
    </div>
    <!-- Leave a Review Popup / End -->
@endsection
