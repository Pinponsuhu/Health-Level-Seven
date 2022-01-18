@extends('layouts.hospital.app')
@section('content')
    <main class="w-full h-screen overflow-y-scroll">
        @include('layouts.hospital.nav')
        <div class="mt-3 px-8">
            <div class="bg-white rounded-md shadow-md p-6">
                <div class="flex justify-between">
                    <h1 class="text-green-500 items-center font-bold text-xl mb-4">All Open Request</h1>
                    <div class="flex items-center gap-x-2">
                        <a href="#" class="py-2 rounded-md px-4 bg-green-400 text-white">Open</a>
                        <a href="#" class="py-2 rounded-md px-6 bg-red-400 text-white">Closed</a>
                    </div>
                </div>
                <div class="mt-4">
                    <div class="py-3 cursor-pointer flex justify-between border-b-2 border-gray-400 hover:bg-gray-100 px-4">
                        <div>
                            <h1 class="text-green-500 font-medium text-lg">Title of request</h1>
                            <p class="text-gray-300">Created at</p>
                        </div>
                        <span class="h-2 w-2 bg-red-400 rounded-full"></span>
                    </div>
                    <div class="py-3 cursor-pointer flex justify-between border-b-2 border-gray-400 hover:bg-gray-100 px-4">
                        <div>
                            <h1 class="text-green-500 font-medium text-lg">Title of request</h1>
                            <p class="text-gray-300">Created at</p>
                        </div>
                        <span class="h-2 w-2 bg-red-400 rounded-full"></span>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
