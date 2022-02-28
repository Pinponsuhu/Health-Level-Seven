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

        <link rel="stylesheet" href="{{ secure_asset('css/app.css') }}">

        <script src="{{ secure_asset('js/all.js') }}"></script>

        <!-- Styles -->

        <style>
            body {
                font-family: 'Cabin', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased bg-gray-100 flex">
        <nav class="w-80 bg-green-600 fixed h-screen overflow-y-scroll">
            <div class="w-full bg-white flex gap-x-3 py-7 px-6 items-center justify-center">
                <img src="" class="w-14 h-14" alt="">
                <h1 class="font-bold text-2xl">Super Admin</h1>
            </div>
            <ul class="pl-4 mt-3 pt-3">
                <li class="flex text-gray-50 items-center px-3"><i class="fa fa-user-plus mr-5 text-2xl"></i> <p class="text-lg">Registration</p></li>
                <li class="text-md py-2 ml-16 text-white">Hospital</li>
            </ul>
            <ul class="pl-4 mt-3 py-3">
                <li class="flex text-gray-50 items-center px-3"><i class="fa fa-user-md mr-7 text-2xl"></i> <p class="text-md">Clinical</p></li>
            </ul>
            <ul class="pl-4 mt-3 py-3">
                <li class="flex text-gray-50 items-center px-3"><i class="fa fa-x-ray mr-5 text-2xl"></i> <p class="text-md">Radiology Upload</p></li>
            </ul>
            <ul class="pl-4 mt-3 py-3">
                <li class="flex text-gray-50 items-center px-3"><i class="fa fa-user-injured mr-8 text-2xl"></i> <p class="text-md">Patient documents</p></li>
            </ul>
            <ul class="pl-4 mt-3 py-3">
                <li class="flex text-gray-50 items-center px-3"><i class="fa fa-procedures mr-5 text-2xl"></i> <p class="text-md">Bed Management</p></li>
            </ul>
            <ul class="pl-4 mt-3 py-3">
                <li class="flex text-gray-50 items-center px-3"><i class="fa fa-user-cog mr-5 text-2xl"></i> <p class="text-md">Admin</p></li>
            </ul>
            <ul class="pl-4 mt-3 py-3">
                <li class="flex text-gray-50 items-center px-3"><i class="fa fa-calendar-check mr-7 text-2xl"></i> <p class="text-md">Appointment</p></li>
            </ul>
            <ul class="pl-4 mt-3 py-3">
                <li class="flex text-gray-50 items-center px-3"><i class="fa fa-clipboard-list mr-7 text-2xl"></i> <p class="text-md">Inventory</p></li>
            </ul>
            <ul class="pl-4 mt-3 py-3">
                <li class="flex text-gray-50 items-center px-3"><i class="fa fa-building mr-7 text-2xl"></i> <p class="text-md">Building</p></li>
            </ul>
        </nav>
        <main class="w-full">

        </main>
        <div class="p-4 rounded-full bg-green-600 text-white fixed bottom-5 right-7">
            <i class="fa fa-envelope text-3xl"></i>
        </div>
    </body>
