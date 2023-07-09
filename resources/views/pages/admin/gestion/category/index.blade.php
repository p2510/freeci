@extends('layouts.admin')
@section('content')
    <div class="container  py-12 ">
        <h3 class="font-bold text-xl lg:text-3xl">GESTION</h3>
        <ul class="mt-8 flex items-center gap-4 justify-start text-lg ">
            @if (Route::currentRouteName() == 'admin.category.index')
                <a href="{{ route('admin.category.index') }}">
                    <li
                        class=" text-slate-100 hover:text-slate-200  bg-blue-700 p-2 shadow-lg rounded-md   transition duration-300 ease-in-out ">
                        Listes categories</li>
                </a>
            @else
                <a href="{{ route('admin.category.index') }}">
                    <li
                        class="  hover:text-slate-800   p-2  rounded-md  text-slate-700 transition duration-300 ease-in-out ">
                        Listes categories</li>
                </a>
            @endif
            @if (Route::currentRouteName() == 'admin.category.create')
                <a href="{{ route('admin.category.create') }}">
                    <li
                        class=" text-slate-100 hover:text-slate-200  bg-blue-700 p-2 shadow-lg rounded-md   transition duration-300 ease-in-out ">
                        Nouvelle categorie</li>
                </a>
            @else
                <a href="{{ route('admin.category.create') }}">
                    <li
                        class="  hover:text-slate-800   p-2  rounded-md  text-slate-700 transition duration-300 ease-in-out ">
                        Nouvelle categorie</li>
                </a>
            @endif
        </ul>
        <!-- all categorys -->
        <section class="mt-8">
            <!-- alert success -->
            @if (session('updated'))
                <P class="bg-yellow-700 text-white text-md p-2 w-full rounded-lg my-2 ">Mise à jour effectuée avec succès</P>
            @endif
            @if (session('created'))
                <P class="bg-green-700 text-white text-md p-2 w-full rounded-lg my-2 ">Nouvelle categorie ajoutée</P>
            @endif
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                           
                            <th scope="col" class="px-6 py-3">
                                categorie
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Modifier
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $data)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                
                                <td class="px-6 py-4">
                                    {{ $data->name }}
                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('admin.category.edit', $data->name) }}"
                                        class="bg-blue-700 text-white rounded-md p-2 hover:shadow-lg transition duration-300 ease-in-out">Modifier
                                    </a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

        </section>
    </div>
@endsection
