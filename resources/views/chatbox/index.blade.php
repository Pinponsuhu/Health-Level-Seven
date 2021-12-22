@extends('layouts.hospital.app')
@section('content')
    <main class="h-screen w-full overflow-y-scroll">
        @include('layouts.hospital.nav')
        <div class="mt-6 px-8 h-full mb-4 overflow-y-scroll">
            <div class="flex h-full rounded-md shadow-md bg-white">
                <div class="w-60 rounded-tl-md rounded-bl-md h-full overflow-y-scroll py-6 bg-green-300">
                    <h1 class="text-2xl font-bold text-white px-4">Department</h1>
                    <form action="" class="px-4" method="get">
                        <input type="search" placeholder="Search Hospital/Department" class="outline-none py-3 my-3 w-full rounded-md px-2 block" name="" id="">
                    </form>
                    <div class="px-2">
                        <div class="hover:bg-green-400 relative rounded-md mb-1 border-b-2 border-white text-lg py-3 px-2 font-medium text-gray-50">
                            <p>Department</p>
                            <div class="p-1 rounded-full bg-red-500 absolute top-2 right-2"></div>
                        </div>
                        <div class="hover:bg-green-400 relative rounded-md mb-1 border-b-2 border-white text-lg py-3 px-2 font-medium text-gray-50">
                            <p>Department</p>
                            <div class="p-1 rounded-full bg-red-500 absolute top-2 right-2"></div>
                        </div>
                        <div class="hover:bg-green-400 relative rounded-md mb-1 border-b-2 border-white text-lg py-3 px-2 font-medium text-gray-50">
                            <p>Department</p>
                            <div class="p-1 rounded-full bg-red-500 absolute top-2 right-2"></div>
                        </div>
                        <div class="hover:bg-green-400 relative rounded-md mb-1 border-b-2 border-white text-lg py-3 px-2 font-medium text-gray-50">
                            <p>Department</p>
                            <div class="p-1 rounded-full bg-red-500 absolute top-2 right-2"></div>
                        </div>
                        <div class="hover:bg-green-400 relative rounded-md mb-1 border-b-2 border-white text-lg py-3 px-2 font-medium text-gray-50">
                            <p>Hospital</p>
                            <div class="p-1 rounded-full bg-red-500 absolute top-2 right-2"></div>
                        </div>
                        <div class="hover:bg-green-400 relative rounded-md mb-1 border-b-2 border-white text-lg py-3 px-2 font-medium text-gray-50">
                            <p>Hospital</p>
                            <div class="p-1 rounded-full bg-red-500 absolute top-2 right-2"></div>
                        </div>
                        <div class="hover:bg-green-400 relative rounded-md mb-1 border-b-2 border-white text-lg py-3 px-2 font-medium text-gray-50">
                            <p>Hospital</p>
                            <div class="p-1 rounded-full bg-red-500 absolute top-2 right-2"></div>
                        </div>
                        <div class="hover:bg-green-400 relative rounded-md mb-1 border-b-2 border-white text-lg py-3 px-2 font-medium text-gray-50">
                            <p>Hospital</p>
                            <div class="p-1 rounded-full bg-red-500 absolute top-2 right-2"></div>
                        </div>
                        <div class="hover:bg-green-400 relative rounded-md mb-1 border-b-2 border-white text-lg py-3 px-2 font-medium text-gray-50">
                            <p>Hospital</p>
                            <div class="p-1 rounded-full bg-red-500 absolute top-2 right-2"></div>
                        </div>
                        <div class="hover:bg-green-400 relative rounded-md mb-1 border-b-2 border-white text-lg py-3 px-2 font-medium text-gray-50">
                            <p>Hospital</p>
                            <div class="p-1 rounded-full bg-red-500 absolute top-2 right-2"></div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="py-10">
                        <h1 class="text-xl text-green-500 font-bold mb-6 text-center mt-28">Start Messaging</h1>
                        <object data="{{ asset('svg/chat.svg') }}" class="block w-6/12 mx-auto" type=""></object>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
