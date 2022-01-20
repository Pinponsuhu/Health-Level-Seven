@extends('layouts.department.app')
@section('content')
    <main class="w-full h-screen">
        @include('layouts.department.nav')
        <div class="mt-3 px-8">
            <div class="bg-white rounded-md shadow-md p-6">
                <div class="flex justify-between">
                    <h1 class="text-green-500 items-center font-bold text-xl mb-4">All Closed Request</h1>
                    <div class="flex items-center gap-x-2">
                        <a href="/department/new/request" class="py-2 rounded-md px-4 bg-green-400 text-white">Add new</a>
                        <a href="/department/request/all" class="py-2 rounded-md px-4 bg-blue-400 text-white">Active</a>
                        <a href="/department/closed/request" class="py-2 rounded-md px-6 bg-red-400 text-white">Closed Request</a>
                    </div>
                </div>
                <div class="mt-4">
                    @if ($reqs->count() != null)
                        @foreach ($reqs as $req)
                        <a href="/department/request/track/{{ Crypt::encrypt($req->id) }}">
                            <div class="py-3 cursor-pointer flex justify-between border-b-2 border-gray-200 hover:bg-gray-100 px-4">
                                <div>
                                    <h1 class="text-green-500 font-medium text-lg">{{ $req->title }}</h1>
                                    <p class="text-gray-300">{{ $req->created_at->diffForHumans() }}</p>
                                </div>
                                {{-- <span class="h-2 w-2 bg-red-400 rounded-full"></span> --}}
                            </div>
                        </a>
                        @endforeach
                    @else
                    <p class="text-center font-medium italic text-lg text-green-500">No Active Request</p>
                    @endif
                </div>
            </div>
        </div>
    </main>
@endsection
