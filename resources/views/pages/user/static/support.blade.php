@extends('layouts.user')
@section('title')
    Freeci- Tarification
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

                    <h2>Support</h2>


                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>

    <!-- Container -->
    <div class="container">
        <div class="row">

            <div class="col-xl-12">
                <div class="contact-location-info margin-bottom-50">
                    <div class="contact-address">
                        <ul>
                            <li class="contact-address-headline">Nous joidnre</li>
                            <li>Abidjan, CÔTE D'IVOIRE</li>
                            <li>Tel (+225) 01-01-23-33-78</li>
                            <li><a href="#">contact@freeci.ci</a></li>
                            <li>
                                <div class="freelancer-socials">
                                    <ul>
                                        <li><a href="#" title="linkedin" data-tippy-placement="top"><i
                                                    class="icon-brand-linkedin"></i></a></li>
                                        <li><a href="#" title="facebook" data-tippy-placement="top"><i
                                                    class="icon-brand-facebook"></i></a></li>
                                        <li><a href="#" title="gmail" data-tippy-placement="top"><i
                                                    class="icon-brand-google"></i></a></li>

                                    </ul>
                                </div>
                            </li>
                        </ul>

                    </div>

                    <div id="logo">
                        <img src="{{ asset('images/logo.png') }}" alt="">
                    </div>

                </div>
            </div>

            <div class="col-xl-8 col-lg-8 offset-xl-2 offset-lg-2">

                <section id="contact" class="margin-bottom-60">
                    <h3 class="headline margin-top-15 margin-bottom-35">Des questions? N'hésitez pas à nous contacter!</h3>
                    @if (session('success'))
                        <x-alert-success message="Merci pour votre intérêt , vous serez contacté dans peu de temps . " />
                    @endif

                    <form action="{{ route('static.support.store') }}" method="post" name="contactform" id="contactform"
                        autocomplete="on">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-with-icon-left">
                                    <input class="with-border" name="name" type="text" id="name"
                                        placeholder="Votre nom" required="required" />
                                    <i class="icon-material-outline-account-circle"></i>
                                </div>
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />

                            </div>

                            <div class="col-md-6">
                                <div class="input-with-icon-left">
                                    <input class="with-border" name="email" type="email" id="email"
                                        placeholder="Votre email"
                                        pattern="^[A-Za-z0-9](([_\.\-]?[a-zA-Z0-9]+)*)@([A-Za-z0-9]+)(([\.\-]?[a-zA-Z0-9]+)*)\.([A-Za-z]{2,})$"
                                        required="required" />
                                    <i class="icon-material-outline-email"></i>
                                </div>
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />

                            </div>
                        </div>

                        <div class="input-with-icon-left">
                            <input class="with-border" name="subject" type="text" id="subject" placeholder="Sujet"
                                required="required" />
                            <i class="icon-material-outline-assignment"></i>
                            <x-input-error :messages="$errors->get('subject')" class="mt-2" />

                        </div>

                        <div>
                            <textarea class="with-border" name="message" cols="40" rows="5" id="comments" placeholder="Message"
                                spellcheck="true" required="required"></textarea>
                            <x-input-error :messages="$errors->get('message')" class="mt-2" />

                        </div>


                        <input type="submit" class="submit button margin-top-15" id="submit" value="Envoyer" />

                    </form>
                </section>

            </div>

        </div>
    </div>
    <!-- Container / End -->
@endsection
