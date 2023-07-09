<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Libre+Franklin&display=swap');

        * {
            font-family: 'Libre Franklin', sans-serif;
        }
    </style>
    <div class="w-full h-screen grid grid-cols-10 ">
        <nav class="sm:col-span-3 lg:col-span-2 bg-slate-800 w-5/6 ">
            <a href="{{ route('admin.home') }}" class="flex justify-center">
                <img src="{{ asset('images/logo.png') }}" class="w-30 h-20" alt="">
            </a>

            <hr class="mt-4 mb-6">
            <ul class="flex flex-col w-full gap-y-4">
                <li class="indent-6 text-slate-50 opacity-50 text-sm">INFORMATIONS</li>
                <li>
                    <a class="flex gap-x-2 items-center cursor-pointer justify-start pl-10"
                        href="{{ route('admin.statistique') }}"><span class="bg-white p-2 rounded-full"><img
                                src="{{ asset('images/icons/statistique.png') }}" class="w-6 h-6"
                                alt="Statistique"></span> <i
                            class="w-3/4 text-center not-italic text-white text-md p-2 rounded-md bg-slate-600 hover:bg-slate-700 transition duration-500 ease-in-out cursor-pointer">Statistiques</i>
                    </a>
                </li>
                <li>
                    <a class="flex gap-x-2 items-center cursor-pointer justify-start pl-10" href=""><span
                            class="bg-white p-2 rounded-full"><img src="{{ asset('images/icons/freelancer.png') }}"
                                class="w-6 h-6" alt="Statistique"></span> <i
                            class="w-3/4 text-center not-italic text-white text-md p-2 rounded-md bg-slate-600 hover:bg-slate-700 transition duration-500 ease-in-out cursor-pointer">Freelancers</i>
                    </a>
                </li>
                <li>
                    <a class="flex gap-x-2 items-center cursor-pointer justify-start pl-10" href=""><span
                            class="bg-white p-2 rounded-full"><img src="{{ asset('images/icons/mission.png') }}"
                                class="w-6 h-6" alt="Statistique"></span> <i
                            class="w-3/4 text-center  not-italic text-white text-md p-2 rounded-md bg-slate-600 hover:bg-slate-700 transition duration-500 ease-in-out cursor-pointer">Missions</i>
                    </a>
                </li>


            </ul>
            <ul class="flex flex-col w-full gap-y-4 mt-4">
                <li class="indent-6 text-slate-50 opacity-50 text-sm">GESTION</li>
                <li>
                    <a class="flex gap-x-2 items-center cursor-pointer justify-start pl-10" href="{{route('admin.code.index')}}"><span
                            class="bg-white p-2 rounded-full"><img src="{{ asset('images/icons/code.png') }}"
                                class="w-6 h-6" alt="Statistique"></span> <i
                            class="w-3/4 text-center not-italic text-white text-md p-2 rounded-md bg-slate-600 hover:bg-slate-700 transition duration-500 ease-in-out cursor-pointer">Code
                            abonnement</i>
                    </a>
                </li>
                <li>
                    <a class="flex gap-x-2 items-center cursor-pointer justify-start pl-10" href="{{route('admin.category.index')}}"><span
                            class="bg-white p-2 rounded-full"><img src="{{ asset('images/icons/categorie.png') }}"
                                class="w-6 h-6" alt="Statistique"></span> <i
                            class="w-3/4 text-center not-italic text-white text-md p-2 rounded-md bg-slate-600 hover:bg-slate-700 transition duration-500 ease-in-out cursor-pointer">Catégories
                            missions</i>
                    </a>
                </li>
            </ul>
            <ul class="flex flex-col w-full gap-y-4 mt-4">
                <li class="indent-6 text-slate-50 opacity-50 text-sm">BLOG</li>
                <li>
                    <a class="flex gap-x-2 items-center cursor-pointer justify-start pl-10" href=""><span
                            class="bg-white p-2 rounded-full"><img src="{{ asset('images/icons/blog.png') }}"
                                class="w-6 h-6" alt="Statistique"></span> <i
                            class="w-3/4 text-center not-italic text-white text-md p-2 rounded-md bg-slate-600 hover:bg-slate-700 transition duration-500 ease-in-out cursor-pointer">Nouveau
                            blog</i>
                    </a>
                </li>
                <li>
                    <a class="flex gap-x-2 items-center cursor-pointer justify-start pl-10" href=""><span
                            class="bg-white p-2 rounded-full"><img src="{{ asset('images/icons/liste-blog.png') }}"
                                class="w-6 h-6" alt="Statistique"></span> <i
                            class="w-3/4 text-center not-italic text-white text-md p-2 rounded-md bg-slate-600 hover:bg-slate-700 transition duration-500 ease-in-out cursor-pointer">Les
                            blogs</i>
                    </a>
                </li>
            </ul>
            <ul class="flex flex-col w-full gap-y-4 mt-4">
                <li class="indent-6 text-slate-50 opacity-50 text-sm">RÉQUÊTES</li>
                <li>
                    <a class="flex gap-x-2 items-center cursor-pointer justify-start pl-10" href=""><span
                            class="bg-white p-2 rounded-full"><img src="{{ asset('images/icons/requete.png') }}"
                                class="w-6 h-6" alt="Statistique"></span> <i
                            class="w-3/4 text-center not-italic text-white text-md p-2 rounded-md bg-slate-600 hover:bg-slate-700 transition duration-500 ease-in-out cursor-pointer">récupération
                            données</i>
                    </a>
                </li>
                <li>
                    <a class="flex gap-x-2 items-center cursor-pointer justify-start pl-10"
                        href="{{ route('logout') }}"><span class="bg-white p-2 rounded-full"><img
                                src="{{ asset('images/icons/deconnexion.png') }}" class="w-6 h-6"
                                alt="Deconnexion"></span> <i
                            class="w-3/4 text-center not-italic text-white text-md p-2 rounded-md bg-slate-600 hover:bg-slate-700 transition duration-500 ease-in-out cursor-pointer">Déconnexion</i>
                    </a>
                </li>
            </ul>

        </nav>
        <main class="sm:col-span-7 lg:col-span-8">
            @yield('content')
        </main>
    </div>
</body>

</html>
