@extends('layouts.hospital.app')
@section('content')
    <main class="w-full h-screen overflow-y-scroll">
        @include('layouts.hospital.nav')
        <form action="/upload/radiology" class=" w-8/12 mb-6 grid grid-cols-2 mx-auto gap-x-5 px-8 py-5 rounded-md shadow-md mt-8 bg-white" method="post" enctype="multipart/form-data">
            @csrf
            <h1 class="col-span-2 text-2xl font-semibold text-green-600 mb-3">Result Tracker</h1>
            <div class="my-2">
                <label class="font-semibold text-md block mb-1">Full name</label>
                <input type="text" value="{{ old('full_name') }}" name="full_name" placeholder="Enter Patient's fullname" class="capitalize border-l-4 border-green-500 w-full rounded-md p-3 shadow-md outline-none block">
                @error('full_name')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="my-2">
                <label class="font-semibold text-md block mb-1">Phone Number</label>
                <input type="text" value="{{ old('phone_number') }}" name="phone_number" class="capitalize border-l-4 border-green-500 w-full rounded-md p-3 shadow-md outline-none block"  placeholder="Enter Patient's Phone number">
                @error('phone_number')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="my-2">
                <label class="font-semibold text-md block mb-1">Email Address</label>
                <input type="text" value="{{ old('email_address') }}" name="email_address" class="border-l-4 border-green-500 w-full rounded-md p-3 shadow-md outline-none block"  placeholder="Patient's Email Address">

                @error('email_address')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="my-2">
                <label class="font-semibold text-md block mb-1">Test Type</label>
                <input type="text" value="{{ old('test_type') }}" name="test_type" class="capitalize border-l-4 border-green-500 w-full rounded-md p-3 shadow-md outline-none block"  placeholder="Type of test to be conducted">
                @error('test_type')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="my-2">
                <label class="font-semibold text-md block mb-1">Gender</label>
                <select name="gender" id="" class="border-l-4 border-green-500 w-full rounded-md p-3 shadow-md outline-none block">
                    <option disabled selected>--Select Gender--</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
                @error('gender')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="w-32 py-3 block mx-auto text-center text-white bg-green-600 rounded-md mt-2 shadow-md col-span-2">Register</button>
        </form>
    </main>
@endsection
