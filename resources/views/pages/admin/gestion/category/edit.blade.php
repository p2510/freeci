@extends('layouts.admin')
@section('content')
    <div class="container  py-12 ">
        <h3 class="font-bold text-xl lg:text-3xl">GESTION</h3>
        <ul class="mt-8 flex items-center gap-4 justify-start text-lg ">
            @if (Route::currentRouteName() == 'admin.category.index')
                <a href="{{ route('admin.category.index') }}">
                    <li
                        class=" text-slate-100 hover:text-slate-200  bg-blue-700 p-2 shadow-lg rounded-md   transition duration-300 ease-in-out ">
                        Listes catégories</li>
                </a>
            @else
                <a href="{{ route('admin.category.index') }}">
                    <li
                        class="  hover:text-slate-800   p-2  rounded-md  text-slate-700 transition duration-300 ease-in-out ">
                        Listes catégories</li>
                </a>
            @endif
            @if (Route::currentRouteName() == 'admin.category.create')
                <a href="{{ route('admin.category.create') }}">
                    <li
                        class=" text-slate-100 hover:text-slate-200  bg-blue-700 p-2 shadow-lg rounded-md   transition duration-300 ease-in-out ">
                        Nouvelle catégorie</li>
                </a>
            @else
                <a href="{{ route('admin.category.create') }}">
                    <li
                        class="  hover:text-slate-800   p-2  rounded-md  text-slate-700 transition duration-300 ease-in-out ">
                        Nouvelle catégorie</li>
                </a>
            @endif
        </ul>
        <!-- all categorys -->
        <section class="mt-8">
  

            <form action="{{ route('admin.category.update', $data->name) }}" method="post">

                @csrf
                @method('patch')
                <div class="grid gap-6 mb-6 md:grid-cols-2">

                    <div class="mb-6">
                        <label for="name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom de catégorie</label>
                        <input type="text" name="name" id="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="{{ $data->name }}" required>
                        <x-input-error :messages="$errors->get('name')" class="mt-2 " />

                    </div>
               

                </div>

                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Mettre
                    à jour</button>
            </form>

        </section>
    </div>
@endsection
