<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register new Hospital</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="bg-gray-100">
    <main class="w-11/12 mx-auto mt-4">
        <form action="/super/admin/store/new" class="w-8/12 mb-6 grid grid-cols-2 mx-auto gap-x-5 px-8 py-5 rounded-md shadow-md mt-8 bg-white" method="post" enctype="multipart/form-data">
            @csrf
            <h1 class="col-span-2 text-2xl font-semibold text-green-600 mb-3">Register new Hospital</h1>
            <div class="my-2">
                <label class="font-semibold text-md block mb-1">Hospital Logo</label>
                <input type="file" value="{{ old('hospital_logo') }}" name="hospital_logo" placeholder="Enter Patient's Surname" class="capitalize border-l-4 border-green-500 w-full rounded-md p-3 shadow-md outline-none block">
                @error('hospital_logo')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="my-2">
                <label class="font-semibold text-md block mb-1">Hospital Name</label>
                <input type="text" value="{{ old('hospital_name') }}" name="hospital_name" placeholder="Enter Patient's Surname" class="capitalize border-l-4 border-green-500 w-full rounded-md p-3 shadow-md outline-none block">
                @error('hospital_name')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="my-2">
                <label class="font-semibold text-md block mb-1">Hospital CEO</label>
                <input type="text" value="{{ old('head_of_hospital') }}" name="head_of_hospital" placeholder="Enter Patient's Surname" class="capitalize border-l-4 border-green-500 w-full rounded-md p-3 shadow-md outline-none block">
                @error('head_of_hospital')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="my-2">
                <label class="font-semibold text-md block mb-1">Hospital Email Address</label>
                <input type="text" value="{{ old('email_address') }}" name="email_address" placeholder="Enter Patient's Surname" class="capitalize border-l-4 border-green-500 w-full rounded-md p-3 shadow-md outline-none block">
                @error('email_address')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="my-2">
                <label class="font-semibold text-md block mb-1">Hospital Phone Number</label>
                <input type="text" value="{{ old('phone_number') }}" name="phone_number" placeholder="Enter Patient's Surname" class="capitalize border-l-4 border-green-500 w-full rounded-md p-3 shadow-md outline-none block">
                @error('phone_number')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="my-2">
                <label class="font-semibold text-md block mb-1">Hospital Address</label>
                <input type="text" value="{{ old('hospital_address') }}" name="hospital_address" placeholder="Enter Patient's Surname" class="capitalize border-l-4 border-green-500 w-full rounded-md p-3 shadow-md outline-none block">
                @error('hospital_address')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="my-2">
                <label class="font-semibold text-md block mb-1">Password</label>
                <input type="text" value="{{ old('password') }}" name="password" placeholder="Enter Patient's Surname" class="border-l-4 border-green-500 w-full rounded-md p-3 shadow-md outline-none block">
                @error('password')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="my-2">
                <label class="font-semibold text-md block mb-1">Confirm Password</label>
                <input type="text" value="{{ old('confirm_password') }}" name="password_confirmation" placeholder="Enter Patient's Surname" class="border-l-4 border-green-500 w-full rounded-md p-3 shadow-md outline-none block">
                @error('confirm_password')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="w-32 py-3 block mx-auto text-center text-white bg-green-600 rounded-md mt-2 shadow-md col-span-2">Register</button>
        </form>
    </main>
</body>
</html>

