@extends('layouts.admin')
@section('content')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <div class="container  py-12 ">
        <div class="  mb-5 sm:mb-10">
            <h3 class="font-bold text-xl lg:text-3xl">STATISTIQUES</h3>

            <section class="flex flex-col gap-y-4 mt-8">
                <div class="grid grid-cols-6 m-4 gap-4">
                    <!--card stat -->
                    <div
                        class="col-span-2 p-6 bg-blue-700 flex justify-around items-center text-white drop-shadow-lg rounded-md hover:scale-105 transition duration-500 ease-in-out">
                        <ul class="space-y-2">
                            <li class="font-bold text-2xl">{{ $freelancer }}</li>
                            <li class="font-normal text-lg">Total Freelancer</li>
                            <li>
                                @if ($progressionFreelancer >= 0)
                                    <span
                                        class=" bg-white text-slate-800    drop-shadow-md mr-4 p-1 rounded-lg">{{ $progressionFreelancer }}%</span><span>Ce
                                        mois</span>
                                @else
                                    <span
                                        class="  bg-red-500 text-white  drop-shadow-md mr-4 p-1 rounded-lg">{{ $progressionFreelancer }}%</span><span>Ce
                                        mois</span>
                                @endif
                            </li>
                        </ul>
                        <p>
                            tous
                        </p>
                    </div>
                    <div
                        class="col-span-2 p-6 bg-yellow-700 flex justify-around items-center text-white drop-shadow-lg rounded-md hover:scale-105 transition duration-500 ease-in-out">
                        <ul class="space-y-2">
                            <li class="font-bold text-2xl">{{ $mission }}</li>
                            <li class="font-normal text-lg">Total Mission</li>
                            <li>
                                @if ($progressionMission >= 0)
                                    <span
                                        class=" bg-white text-slate-800  drop-shadow-md mr-4 p-1 rounded-lg">{{ $progressionMission }}%</span><span>Ce
                                        mois</span>
                                @else
                                    <span
                                        class="  bg-red-500 text-white  drop-shadow-md mr-4 p-1 rounded-lg">{{ $progressionMission }}%</span><span>Ce
                                        mois</span>
                                @endif
                            </li>
                        </ul>
                        <p>
                            tous

                        </p>
                    </div>
                    <div
                        class="col-span-2 p-6 bg-green-700 flex justify-around items-center text-white drop-shadow-lg rounded-md hover:scale-105 transition duration-500 ease-in-out">
                        <ul class="space-y-2">
                            <li class="font-bold text-2xl">{{ $applicant }}</li>
                            <li class="font-normal text-lg">Total candidature</li>
                            <li>
                                @if ($progressionApplicant >= 0)
                                    <span
                                        class=" bg-white text-slate-800 drop-shadow-md mr-4 p-1 rounded-lg">{{ $progressionApplicant }}%</span><span>Ce
                                        mois</span>
                            </li>
                        @else
                            <span
                                class="  bg-red-500 text-white  drop-shadow-md mr-4 p-1 rounded-lg">{{ $progressionApplicant }}%</span><span>Ce
                                mois</span>
                            @endif

                        </ul>
                        <p>
                            tous

                        </p>
                    </div>

                    <!--card plan-->
                    <div
                        class="col-span-2 p-6 bg-gray-100 flex justify-between items-center text-white drop-shadow-lg rounded-md  transition duration-500 ease-in-out">
                        <canvas width="10" height="10" id="gatewayType"></canvas>
                    </div>
                    <input type="hidden" value="{{ implode($subscriptionPlan) }}" id="subscriptionPlan">

                    <div
                        class="col-span-4  p-6 bg-white  text-slate-800 drop-shadow-lg rounded-md  transition duration-500 ease-in-out">
                        <div class="flex justify-between  pb-4">
                            <p class="font-bold text-2xl">Evolution budgetaire</p>
                            <p>
                                Cette année
                            </p>
                        </div>
                        <div class="flex items-center gap-4">
                            <div
                                class=" w-full p-6 bg-slate-800  text-white drop-shadow-lg rounded-md hover:scale-105 transition duration-500 ease-in-out">
                                <p class="mb-4">Plan BASIC</p>
                                <p>{{ $subscriptionPlan[0] * 1000 }} F</p>
                            </div>
                            <div
                                class=" w-full p-6 bg-yellow-600  text-white drop-shadow-lg rounded-md hover:scale-105 transition duration-500 ease-in-out">
                                <p class="mb-4">Plan PRO</p>
                                <p>{{ $subscriptionPlan[1] * 5000 }} F</p>
                            </div>
                            <div
                                class=" w-full p-6 bg-blue-700  text-white drop-shadow-lg rounded-md hover:scale-105 transition duration-500 ease-in-out">
                                <p class="mb-4">Plan EXPERT</p>
                                <p>{{ $subscriptionPlan[2] * 8000 }} F</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <script>
        const ctx = document.getElementById('gatewayType');
        const subscriptionPlan = document.getElementById('subscriptionPlan').value;
        console.log(subscriptionPlan.split(''));
        const data = {
            labels: [
                'basic',
                'Pro',
                'Expert'
            ],
            datasets: [{
                label: 'Nombre de freelancer',
                data: subscriptionPlan.split(''),
                backgroundColor: [
                    ' rgb(51 ,65, 85 )',
                    'rgb(202 ,138, 4)',
                    'rgb(29, 78, 216)'
                ],
                hoverOffset: 4
            }]
        };
        new Chart(ctx, {
            type: 'doughnut',
            data: data,
        });
    </script>
@endsection
