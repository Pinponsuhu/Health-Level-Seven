@extends('layouts.department.app')
@section('content')
        <main class="w-full h-screen overflow-y-scroll">
            @include('layouts.department.nav')
            <div class="mb-5 overflow-y-scroll">
            <div class="h-96 md:grid  mt-3 px-4">
                <section class="col-span-2 h-80 md:h-full p-3 box-border bg-white w-full rounded-md shadow-md">
                    <div class="h-12 w-full">
                        {!! $chart->container() !!}
                    </div>
                </section>
            </div>
            <div class="md:grid md:grid-cols-4 h-56 mt-12 px-4 gap-x-4">
                <section class="bg-white rounded-md shadow-md md:col-span-3 py-3 px-4">
                    <div class="flex items-center py-3 justify-between px-8 mb-4">
                        <p class="text-gray-500 text-lg font-semibold">Today's Appointment</p>
                        <a href="#" class="text-lg font-medium text-green-500">See all</a>
                    </div>
                    <table class="w-full shadow-md">
                        <thead>
                            <tr class="text-green-50 font-medium text-md">
                                <td class="w-1/5 py-2 bg-green-500 px-3 text-center border-r-2 border-green-100">Name</td>
                                <td class="w-1/5 py-2 bg-green-500 px-3 text-center border-r-2 border-green-100">Date</td>
                                <td class="w-1/5 py-2 bg-green-500 px-3 text-center border-r-2 border-green-100">Status</td>
                                <td class="w-1/5 py-2 bg-green-500 px-3 text-center border-r-2 border-green-100">Type</td>
                                <td class="w-1/5 py-2 bg-green-500 px-3 text-center">Phone number</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($appointments as $appointment)
                            <tr class="text-green-500 font-medium text-sm">
                                <td class="w-1/5 py-2 bg-green-100 px-3 text-center">{{ $appointment->surname . ' ' . $appointment->othernames }}</td>
                                <td class="w-1/5 py-2 bg-gray-100 px-3 text-center">{{ $appointment->preferred_date }}</td>
                                <td class="w-1/5 py-2 bg-green-100 px-3 text-center">{{ $appointment->status }}</td>
                                <td class="w-1/5 py-2 bg-gray-100 px-3 text-center">{{ $appointment->appointment_type }}</td>
                                <td class="w-1/5 py-2 bg-green-100 px-3 text-center">{{ $appointment->phone_number }}</td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                </section>
                <a href="/department/covid/tracker">
                    <section class="hidden md:grid bg-gradient-to-br px-6 py-12 from-green-500 to-green-400 rounded-md shadow-md">
                        <object data="{{ asset('svg/covid.svg') }}" class="w-9/12 h-auto mx-auto mb-4" type=""></object>
                        <p class="capitalize text-2xl font-semibold text-center text-white">Covid Tracker</p>
                    </section>
                </a>
            </div>
        </div>
        </main>
        <script src="{{ $chart->cdn() }}"></script>
        {{-- <script src="{{ $chart2->cdn() }}"></script> --}}
         <script src="{{ asset('js/apexcharts.js') }}"></script>

    {{ $chart->script() }}
    {{-- {{ $chart2->script() }} --}}
@endsection

