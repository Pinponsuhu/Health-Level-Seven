<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Health Level Seven</title>

        <!-- Fonts -->

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Cabin:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <script src="{{ asset('js/all.js') }}"></script>

        <!-- Styles -->

        <style>
            body {
                font-family: 'Cabin', sans-serif;
            }
            *::-webkit-scrollbar {
    width: 7px;
}

/* Track */
*::-webkit-scrollbar-track {
    background: #f1f1f1;
}

/* Handle */
*::-webkit-scrollbar-thumb {
    background: rgb(46, 189, 137);
}

/* Handle on hover */
*::-webkit-scrollbar-thumb:hover {
    background: #095134;
}

        </style>
    </head>
<body class="bg-gray-100 h-screen">
    <main class="w-11/12 mx-auto h-screen py-4">

        <a href="/super/admin/index" class="flex gap-x-2 items-center mb-4"><i class="fa fa-arrow-left"></i> Dashboard</a>
        <form action="/super/admin/new/hospital" class="w-10/12 md:w-8/12 mb-6 grid md:grid-cols-2 mx-auto gap-x-5 px-8 py-5 rounded-md shadow-md mt-8 bg-white h-full overflow-y-scroll" method="post" enctype="multipart/form-data">
            @csrf
            <h1 class="md:col-span-2 text-2xl font-semibold text-green-600 mb-3">Register new Hospital</h1>
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
                <label class="font-semibold text-md block mb-1">Bed Number</label>
                <input type="text" value="{{ old('hospital_address') }}" name="bed_number" placeholder="Enter Bed Number" class="capitalize border-l-4 border-green-500 w-full rounded-md p-3 shadow-md outline-none block">
                @error('bed_number')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="my-2">
                <label class="font-semibold text-md block mb-1">Shelf Number</label>
                <input type="text" value="{{ old('shelf_number') }}" name="shelf_number" placeholder="Enter Shelf Number" class="capitalize border-l-4 border-green-500 w-full rounded-md p-3 shadow-md outline-none block">
                @error('shelf_number')
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
            <button type="submit" class="w-32 py-1.5 block mx-auto text-center text-white bg-green-600 rounded-md mt-2 shadow-md md:col-span-2">Register</button>
        </form>
    </main>
</body>
</html>

