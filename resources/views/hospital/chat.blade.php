@extends('layouts.hospital.chat-app')
@section('content')
    <main class="w-full flex h-screen">
        <nav id="hospital" class="w-72 md:w-96 bg-green-400 fixed left-0 top-0 md:relative h-full hidden md:flex overflow-y-scroll md:p-4">
            <a href="/hospital/dashboard" class="px-8 py-3 rounded-full text-green-500 bg-white"><i class="fa fa-arrow-left"></i> Back</a>
            <h1 class="font-bold text-2xl text-white mt-3">Data Exchange</h1>
            <p class="font-medium text-white mt-1 text-sm">Hospital ID: {{ auth()->user()->HID }}</p>
            <input type="search" placeholder="Search by Hospital ID" class="px-3 block my-3 w-full py-3 rounded-md">

            <div class=" mt-4 w-full">
                @foreach ($hospitals as $hospital)
                    <div class="py-4 cursor-pointer px-2 flex user gap-x-2 border-b-2 border-white text-white" id="{{ $hospital->id }}">
                        <img src="{{ asset('/storage/users/' . $hospital->hospital_logo) }}" class="w-12 rounded-full h-12" alt="">
                        <div>
                            <h1 class="font-bold">{{ $hospital->hospital_name }}</h1>
                            <p class="text-sm">{{ $hospital->HID }}</p>
                        </div>
                        @if ($hospital->unread)
                    <span class="pending">{{ $hospital->unread }}</span>
                    @endif
                    </div>
                @endforeach
            </div>
        </nav>
        <section class="w-full">
            <div class="bg-green-900 bg-opacity-95 w-full md:p-5 h-full" id="messages">

            </div>
        </section>
    </main>
    <div onclick="all_hospital()" id="nav" class="fixed top-16 p-4 rounded-md bg-white text-green-500">
        <p class="text-xl font-bold">≡</p>
    </div>
    <script>
        function all_hospital(){
            if(document.getElementById('nav').innerText == '≡'){
                document.getElementById('nav').innerText = 'x';
                document.getElementById('hospital').classList.remove('hidden');
            }else{
                document.getElementById('nav').innerText = '≡';
                document.getElementById('hospital').classList.add('hidden');
            }
        }
    </script>
@endsection
