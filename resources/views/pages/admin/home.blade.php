@extends('layouts.admin')
@section('content')

    <div class="">
        <div class="container mx-auto flex flex-col items-center py-12 sm:py-32">
            <div class="w-11/12 sm:w-2/3 lg:flex justify-center items-center flex-col  mb-5 sm:mb-10">
                <h1
                    class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl xl:text-6xl text-center text-gray-800 dark:text-white font-black leading-7 md:leading-10">
                    Espace administrateur chez 
                    <span class="text-blue-700">Freeci</span>
                    Côte d'Ivoire
                </h1>
                <p class="mt-5 sm:mt-10 lg:w-10/12 text-gray-400 font-normal text-center text-sm sm:text-lg">
                    Nous mettons en relation des  freelancers et des recruteurs en Côte d'Ivoire .  </p>
            </div>
            <div class="flex justify-center items-center">
                <button
                     class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-700 bg-blue-700 transition duration-150 ease-in-out hover:bg-blue-600 lg:text-xl lg:font-bold  rounded text-white px-4 sm:px-10 border border-blue-700 py-2 sm:py-4 text-sm">
                    Statistique</button>
                <button
                    class="ml-4 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-700 bg-transparent transition duration-150 ease-in-out hover:border-blue-600 lg:text-xl lg:font-bold  hover:text-blue-600 rounded border border-blue-700 text-blue-700 px-4 sm:px-10 py-2 sm:py-4 text-sm">
                    Blog</button>
            </div>
        </div>
    </div>
@endsection
