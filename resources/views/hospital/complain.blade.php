@extends('layouts.hospital.app')
@section('content')
    <main class="w-full h-scrren">
        @include('layouts.hospital.nav')
        <div class="mt-3 px-8">
            <div class="p-6 bg-white rounded-md shadow-md">
                <div class="flex justify-between">
                    <h1 class="text-green-500 items-center font-bold text-xl mb-4">All Active Complain</h1>
                    <div class="flex items-center gap-x-2">
                        <a href="/hospital/new/complain" class="py-2 rounded-md px-4 bg-green-400 text-white">Add new</a>
                        <a href="/hospital/active/complain" class="py-2 rounded-md px-4 bg-blue-400 text-white">Active</a>
                        <a href="/hospital/closed/complain" class="py-2 rounded-md px-6 bg-red-400 text-white">Closed Complaint</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
