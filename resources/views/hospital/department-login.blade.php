@extends('layouts.hospital.app')
@section('content')
    <main class="w-full h-screen overflow-y-scroll">
        @include('layouts.hospital.nav')
        <div class="mt-5 px-8">
            <div class="p-6 bg-white rounded-md shadow-md">
                <h1 class="text-green-500 text-2xl font-bold mb-4">Department Login</h1>
                <form action="/department/login" method="post" class="grid grid-cols-2 gap-x-6">
                    @csrf
                    <div>
                        <label class="font-semibold text-md block mb-1">Department</label>
                        <input type="text" name="name" id="" class="capitalize border-l-4 border-green-500 w-full rounded-md p-3 shadow-md outline-none block" placeholder="Department name">
                    </div>
                    <div>
                        <label class="font-semibold text-md block mb-1">Password</label>
                        <input type="text" name="password" id="" class="capitalize border-l-4 border-green-500 w-full rounded-md p-3 shadow-md outline-none block" placeholder="Department name">
                    </div>
                    <button type="submit" class="w-32 mt-4 py-3 block mx-auto text-center text-white bg-green-600 rounded-md shadow-md col-span-2">Sign in</button>
                </form>
            </div>
        </div>
    </main>
@endsection
