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
        </style>
    </head>
    <body class="antialiased bg-gray-100">
        <form action="/loging" class="w-4/12 mx-auto bg-white shadow-md rounded-md pb-6 mt-14">
            <h1 class="w-full bg-green-600 text-white py-3 text-center rounded-tr-md rounded-tl-md text-xl mb-4 font-semibold">Login</h1>
            <div class="px-7">
                <label for="" class="mt-2 block font-medium">Hospital ID</label>
                <input type="text" autocomplete="off" name="HID" placeholder="Hospital ID" class="border-4 border-green-600 px-3 py-3 text-md rounded-md shadow-md bg-white block mt-2 w-full" id="">
                <label for="" class="mt-2 block font-medium">Password</label>
                <input type="text" autocomplete="off" name="password" placeholder="Hospital password" class="border-4 border-green-600 px-3 py-3 text-md rounded-md shadow-md bg-white block mt-2 w-full" id="">
                <button class="w-28 py-3 mx-auto text-center bg-green-600 text-white rounded-md flex items-center justify-center my-3 hover:bg-green-500">Sign In</button>
            </div>
        </form>
    </body>
