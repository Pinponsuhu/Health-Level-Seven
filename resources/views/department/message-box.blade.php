@extends('layouts.department.app')
@section('content')
    <main class="w-full h-screen">
        @include('layouts.department.nav')
        <div class="mt-5 px-8">
            <div class="bg-white rounded-md shadow-md h-full p-6">
                <div class="w-full py-4 relative">
                    <div class="py-4 w-full sticky top-0 items-center px-6 text-green-500 bg-gray-100 shadow-lg flex gap-x-4">
                        <i class="fa fa-arrow-left"></i>
                        <div class="flex flex-col">
                            <h1 class="text-lg font-bold">{{ $profile->name }}</h1>
                            <p class="text-gray-500 text-sm">Last seen: 19:23pm</p>
                        </div>
                    </div>
                    <div class="w-full h-64 mt-6 px-4 flex flex-col  overflow-y-scroll gap-y-4">

                        <div class="flex">
                            <div class="bg-green-500 w-56 rounded-lg text-white p-4">
                                <p>Message from Test</p>
                                <span>11:20pm</span>
                            </div>
                        </div>
                        <div class="flex justify-end">
                            <div class="bg-gray-300 w-56 rounded-lg text-white p-4">
                                <p>Message from Test</p>
                                <span>11:20pm</span>
                            </div>
                        </div>
                        <div class="flex">
                            <div class="bg-green-500 w-56 rounded-lg text-white p-4">
                                <p>Message from Test</p>
                                <span>11:20pm</span>
                            </div>
                        </div>
                        <div class="flex justify-end">
                            <div class="bg-gray-300 w-56 rounded-lg text-white p-4">
                                <p>Message from Test</p>
                                <span>11:20pm</span>
                            </div>
                        </div>
                        {{-- <h1 class="text-2xl italic text-green-500 text-center">No Conversation yet</h1> --}}
                    </div>
                </div>
            </div>
            <div class="mt-3 bg-white w-full items-center flex">
                <input type="text" placeholder="Input message here..." class="p-3 w-full bg-white outline-none text-green-500 flex">
                <button class="px-6 py-3 bg-green-500 text-white rounded-md">Send</button>
            </div>
        </div>

    </main>
@endsection
