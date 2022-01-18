@extends('layouts.hospital.app')
@section('content')
    <main class="w-full h-screen overflow-y-scroll">
        @include('layouts.hospital.nav')
        <div class="mt-3 px-8">
            <div class="bg-white rounded-md shadow-md p-6">
                <h1 class="text-green-500 font-bold text-xl mb-4">Open Request</h1>
                <div class="mt-4">
                    <div class="py-3 border-b-2 mb-0.5 border-gray-400 bg-gray-50 px-4">
                        <h1 class="text-green-500 font-medium text-lg">Title of request</h1>
                        <p class="mt-0.5 text-gray-300">Created at</p>
                    </div>
                    <div class="py-3 border-b-2 border-gray-400 bg-gray-50 px-4">
                        <h1 class="text-green-500 font-medium text-lg">Title of request</h1>
                        <p class="mt-0.5 text-gray-300">Created at</p>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
