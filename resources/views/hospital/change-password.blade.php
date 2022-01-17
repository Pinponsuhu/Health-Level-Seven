@extends('layouts.hospital.app')
@section('content')
    <main class="w-full h-screen">
        @include('layouts.hospital.nav')
        <div class=" mt-5 px-8">
            <div class="p-6 bg-white rounded-md shadow-md">
                <h1 class="text-2xl font-bold text-green-500 mb-2">Change Password</h1>
                <form action="/hospital/changing/password/{{ auth()->user()->id }}" class="w-5/12 mx-auto" method="POST">
                    @csrf
                    <input type="text" autocomplete="off" name="old_password" placeholder="Old password" class="border-l-4 outline-none border-green-500 px-3 py-3 text-md rounded-md shadow-md bg-white block mt-3 w-full" id="">
                    @error('old_password')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
                    <input type="text" autocomplete="off" name="password" placeholder="New password" class="border-l-4 outline-none border-green-500 px-3 py-3 text-md rounded-md shadow-md bg-white block mt-3 w-full" id="">
                    @error('new_password')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
                    <input type="text" autocomplete="off" name="password_confirmation" placeholder="Confirm New password" class="border-l-4 outline-none border-green-500 px-3 py-3 text-md rounded-md shadow-md bg-white block mt-3 w-full" id="">
                    <button type="submit" class="mt-3 rounded-md bg-green-500 text-white py-3 px-8 flex justify-center">Change Password</button>
                </form>
            </div>
        </div>
    </main>
@endsection
