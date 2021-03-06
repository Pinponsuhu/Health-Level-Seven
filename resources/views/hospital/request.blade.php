@extends('layouts.hospital.app')
@section('content')
    <main class="w-full h-screen overflow-y-scroll">
        @include('layouts.hospital.nav')
        <div class="mt-3 px-4 md:px-8">
            <div class="bg-white rounded-md shadow-md p-3 md:p-6">
                <div class="flex justify-between">
                    <h1 class="text-green-500 items-center font-bold text-xl mb-4">All @if ($status == 'Open')
                        Active
                    @else
                        Closed
                    @endif Request</h1>
                    <div class="md:flex hidden items-center gap-x-2">
                        <a href="/request/{{ Crypt::encrypt('Open') }}" class="py-2 rounded-md px-4 bg-green-400 text-white">Open</a>
                        <a href="/request/{{ Crypt::encrypt('Closed') }}" class="py-2 rounded-md px-6 bg-red-400 text-white">Closed</a>
                    </div>
                </div>
                <div class="flex md:hidden items-center gap-x-2">
                    <a href="/request/{{ Crypt::encrypt('Open') }}" class="py-2 rounded-md px-4 bg-green-400 text-white">Open</a>
                    <a href="/request/{{ Crypt::encrypt('Closed') }}" class="py-2 rounded-md px-6 bg-red-400 text-white">Closed</a>
                </div>
                <div class="mt-4">
                    @foreach ($reqs as $req)
                    <a href="/request/track/{{ Crypt::encrypt($req->id) }}">
                        <div class="py-3 cursor-pointer flex justify-between border-b-2 border-gray-200 hover:bg-gray-100 px-4">
                            <div>
                                <h1 class="text-green-500 font-medium text-lg">{{ $req->title }}</h1>
                                <p class="text-gray-300">{{ $req->created_at->diffForHumans() }}</p>
                            </div>
                            {{-- <span class="h-2 w-2 bg-red-400 rounded-full"></span> --}}
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </main>
@endsection
