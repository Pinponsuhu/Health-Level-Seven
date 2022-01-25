@extends('layouts.hospital.app')
@section('content')
    <main class="w-full h-scrren">
        @include('layouts.hospital.nav')
        <div class="mt-3 px-8">
            <div class="p-6 bg-white rounded-md shadow-md">
                <div class="flex justify-between">
                    <h1 class="text-green-500 items-center font-bold text-xl mb-4">All Active Complaint</h1>
                    <div class="flex items-center gap-x-2">
                        <a href="/hospital/new/complain" class="py-2 rounded-md px-4 bg-green-400 text-white">Add new</a>
                        <a href="/hospital/active/complain" class="py-2 rounded-md px-4 bg-blue-400 text-white">Active</a>
                        <a href="/hospital/closed/complain" class="py-2 rounded-md px-6 bg-red-400 text-white">Closed Complaint</a>
                    </div>
                </div>
                <div class="mt-4">
                    @if ($complaint->count() != null)
                        @foreach ($complaint as $complain)
                        <a href="/hospital/complain/track/{{ Crypt::encrypt($complain->id) }}">
                            <div class="py-3 cursor-pointer flex justify-between border-b-2 border-gray-400 hover:bg-gray-100 px-4">
                                <div>
                                    <h1 class="text-green-500 font-medium text-lg">{{ $complain->title }}</h1>
                                    <p class="text-gray-300">{{ $complain->created_at->diffForHumans() }}</p>
                                </div>
                                <span class="h-2 w-2 bg-red-400 rounded-full"></span>
                            </div>
                        </a>
                        @endforeach
                    @else
                    <p class="text-center font-medium italic text-lg text-green-500">No Active complaint</p>
                    @endif
                </div>
            </div>
        </div>
    </main>
@endsection
