@extends('layouts.admin')
@section('content')
    <div class="container  py-12 ">
        <h3 class="font-bold text-xl lg:text-3xl">GESTION</h3>
        <ul class="mt-8 flex items-center gap-4 justify-start text-lg ">
            @if (Route::currentRouteName() == 'admin.code.index')
                <a href="{{ route('admin.code.index') }}">
                    <li
                        class=" text-slate-100 hover:text-slate-200  bg-blue-700 p-2 shadow-lg rounded-md   transition duration-300 ease-in-out ">
                        Listes codes</li>
                </a>
            @else
                <a href="{{ route('admin.code.index') }}">
                    <li
                        class="  hover:text-slate-800   p-2  rounded-md  text-slate-700 transition duration-300 ease-in-out ">
                        Listes codes</li>
                </a>
            @endif
            @if (Route::currentRouteName() == 'admin.code.create')
                <a href="{{ route('admin.code.create') }}">
                    <li
                        class=" text-slate-100 hover:text-slate-200  bg-blue-700 p-2 shadow-lg rounded-md   transition duration-300 ease-in-out ">
                        Nouveau code</li>
                </a>
            @else
                <a href="{{ route('admin.code.create') }}">
                    <li
                        class="  hover:text-slate-800   p-2  rounded-md  text-slate-700 transition duration-300 ease-in-out ">
                        Nouveau code</li>
                </a>
            @endif
        </ul>
        <!-- all codes -->
        <section class="mt-8">
  

            <form action="{{ route('admin.code.store') }}" method="post">

                @csrf
                @method('post')
                <div class="grid gap-6 mb-6 md:grid-cols-2">

                    <div class="mb-6">
                        <label for="email"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">E-mail</label>
                        <input type="email" name="email" id="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="{{old('email')}}" required>
                        <x-input-error :messages="$errors->get('email')" class="mt-2 " />

                    </div>
                    <div>
                        <label for="plan"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Plan</label>
                        <select name="plan" id="plan"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required>

                            <option value="expert"  selected="selected" >Expert
                            </option>
                            <option value="pro" >Pro
                            </option>
                            <option value="basic"   >Basic
                            </option>
                        </select>

                        <x-input-error :messages="$errors->get('plan')" class="mt-2 " />

                    </div>
                    <div>
                        <label for="code"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Code</label>
                        <textarea name="code" id="code"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            cols="30" rows="10" required>{{old('code')}}</textarea>
                        <x-input-error :messages="$errors->get('code')" class="mt-2 " />


                    </div>


                </div>

                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Enregistrer</button>
            </form>

        </section>
    </div>
@endsection
