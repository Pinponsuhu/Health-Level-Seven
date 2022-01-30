@extends('layouts.department.app')
@section('content')
    <main class="w-full h-screen">
        @include('layouts.department.nav')
        <div class="mt-3 px-4 md:px-8">
            <div class="bg-white rounded-md shadow-md p-3 md:p-6">
                <div class="flex justify-between">
                    <h1 class="text-green-500 items-center font-bold text-xl mb-4">All @if ($status == 'Open')
                        Active
                    @else
                        Closed
                    @endif Request</h1>
                    <div class="md:flex hidden items-center gap-x-2">
                        <a href="/department/new/request" class="py-2 rounded-md px-4 bg-green-400 text-white">Add new</a>
                        <a href="/department/request/{{ Crypt::encrypt('Open') }}" class="py-2 rounded-md px-4 bg-blue-400 text-white">Active</a>
                        <a href="/department/request/{{ Crypt::encrypt('Closed') }}" class="py-2 rounded-md px-6 bg-red-400 text-white">Closed Request</a>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-y-2 md:hidden items-center gap-x-2">
                    <a href="/department/new/request" class="py-2 rounded-md px-4 bg-green-400 text-white">Add new</a>
                    <a href="/department/request/{{ Crypt::encrypt('Open') }}" class="py-2 rounded-md px-4 bg-blue-400 text-white">Active</a>
                    <a href="/department/request/{{ Crypt::encrypt('Closed') }}" class="py-2 col-span-2 rounded-md px-6 bg-red-400 text-white">Closed Request</a>
                </div>
                <div class="mt-4">
                    @if ($reqs->count() != null)
                        @foreach ($reqs as $req)
                        <a href="/department/request/track/{{ Crypt::encrypt($req->id) }}">
                            <div class="py-3 cursor-pointer flex justify-between border-b-2 border-gray-400 hover:bg-gray-100 px-4">
                                <div>
                                    <h1 class="text-green-500 font-medium text-lg">{{ $req->title }}</h1>
                                    <p class="text-gray-300">{{ $req->created_at->diffForHumans() }}</p>
                                </div>
                                <span class="h-2 w-2 bg-red-400 rounded-full"></span>
                            </div>
                        </a>
                        @endforeach
                    @else
                    <p class="text-center font-medium italic text-lg text-green-500">No {{ $status }} Request</p>
                    @endif
                </div>
            </div>
        </div>
    </main>
@endsection
