@extends('layouts.hospital.app')
@section('content')
    <main class="w-full h-screen overflow-y-scroll">
        @include('layouts.hospital.nav')
        <div class="mt-6 px-8">
            <div class="rounded-md shadow-md bg-white p-6">
                <h1 class="text-2xl font-bold text-green-500">Workforce overview</h1>
                <div class="grid grid-cols-4 gap-x-4 mt-6">
                    <a href="/all/departments">
                    <div class="bg-blue-200 h-32 flex justify-between shadow-md gap-x-2 rounded-md py-4 px-5">
                        <div>
                            <h1 class="text-3xl font-extrabold mb-3 text-blue-500">{{ $department }}</h1>
                            <p class="text-lg font-medium leading-5 text-gray-500">Department</p>
                        </div>
                        <div class="w-12 flex justify-center items-center h-12 rounded-full bg-blue-600 ">
                            <i class="fa fa-building text-xl text-gray-200"></i>
                        </div>
                    </div>
                </a>
                    <a href="/all/staffs">
                    <div class="bg-red-200 h-32 flex justify-between shadow-md gap-x-2 rounded-md py-4 px-5">
                        <div>
                            <h1 class="text-3xl font-extrabold mb-3 text-red-500">{{ $staff }}</h1>
                            <p class="text-lg font-medium leading-5 text-gray-500">Total <br> Staff</p>
                        </div>
                        <div class="w-12 flex justify-center items-center h-12 rounded-full bg-red-600 ">
                            <i class="fa fa-user-md text-xl text-gray-200"></i>
                        </div>
                    </div>
                    </a>
                </div>
            </div>
        </div>
    </main>
@endsection
