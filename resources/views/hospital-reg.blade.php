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
    <body class="antialiased bg-gray-100 flex">
        <nav class="w-80 bg-green-600 h-screen overflow-y-scroll">
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
            <div class="py-4 w-full px-4 bg-green-600 mx-auto ">
                <input type="text" name="" class="w-11/12 py-4 px-3 rounded-lg bg-white placeholder-green-600 text-green-600" placeholder="Search something here..." id="">
            </div>
            <div class="grid grid-cols-2 items-center px-8">
                <h1 class="text-2xl font-medium text-green-600 my-3 text-center col-span-2">Add new hospital</h1>
                <object data="{{ asset('svg/doctor.svg') }}" class="w-8/12 mx-auto" type=""></object>
                <form action="" class="w-11/12 px-6 py-7 mx-auto" enctype="multipart/form-data">
                    @csrf
                    <div id="one">
                    <label for="" class="mt-2 block font-medium">Name of hospital</label>
                    <input type="text" autocomplete="off" name="hospital_name" placeholder="Hospital name" class="px-3 py-3 text-md rounded-md shadow-md bg-white block mt-2 w-full" id="">
                    <label for="" class="mt-2 block font-medium">Head of Hospital</label>
                    <input type="text" autocomplete="off" name="head_of_hospital" placeholder="CEO full name" class="px-3 py-3 text-md rounded-md shadow-md bg-white block mt-2 w-full" id="">
                    <label for="" class="mt-2 block font-medium">Email address</label>
                    <input type="email" autocomplete="off" name="email_address" placeholder="Hospital email address" class="px-3 py-3 text-md rounded-md shadow-md bg-white block mt-2 w-full" id="">
                    <div>
                        <a href="#" onclick="nextOne()" class="w-28 py-3 mx-auto text-center bg-green-600 text-white rounded-md flex items-center justify-center my-3 hover:bg-green-500">Next <i class="fa fa-arrow-right text-sm ml-2"></i></a>
                    </div>
                </div>
                <div class="hidden" id="two">
                    <label for="" class="mt-2 block font-medium">Phone number</label>
                    <input type="text" autocomplete="off" name="phone_number" placeholder="Hospital phone number" class="px-3 py-3 text-md rounded-md shadow-md bg-white block mt-2 w-full" id="">
                    <label for="" class="mt-2 block font-medium">Resident Address</label>
                    <input type="text" autocomplete="off" name="hospital_address" placeholder="Hospital Address" class="px-3 py-3 text-md rounded-md shadow-md bg-white block mt-2 w-full" id="">
                    <label for="" class="mt-2 block font-medium">Hospital logo</label>
                    <input type="file" name="hospital_logo" class="px-3 py-3 text-md rounded-md shadow-md bg-white block mt-2 w-full" id="">
                    <div class="flex justify-center gap-x-2">
                        <a href="#" onclick="prevOne()" class="w-28 py-3 mx-auto text-center bg-green-600 text-white rounded-md flex items-center justify-center my-3 hover:bg-green-500"><i class="fa fa-arrow-left text-sm mr-2"></i>Previous</a>
                        <a href="#" onclick="nextTwo()" class="w-28 py-3 mx-auto text-center bg-green-600 text-white rounded-md flex items-center justify-center my-3 hover:bg-green-500">Next <i class="fa fa-arrow-right text-sm ml-2"></i></a>
                    </div>
                </div>
                <div class="hidden" id="three">
                    <label for="" class="mt-2 block font-medium">Password</label>
                    <input type="password" autocomplete="off" name="phone_number" placeholder="Hospital phone number" class="px-3 py-3 text-md rounded-md shadow-md bg-white block mt-2 w-full" id="">
                    <label for="" class="mt-2 block font-medium">Confirm password</label>
                    <input type="password" autocomplete="off" name="phone_number" placeholder="Hospital phone number" class="px-3 py-3 text-md rounded-md shadow-md bg-white block mt-2 w-full" id="">
                    <div class="flex justify-center gap-x-2">
                        <a href="#" onclick="prevTwo()" class="w-28 py-3 mx-auto text-center bg-green-600 text-white rounded-md flex items-center justify-center my-3 hover:bg-green-500"><i class="fa fa-arrow-left text-sm mr-2"></i>Previous</a>
                        <button class="w-28 py-3 mx-auto text-center bg-green-600 text-white rounded-md flex items-center justify-center my-3 hover:bg-green-500">Register</button>
                    </div>
                </div>

                </form>
            </div>
        </main>
        <div class="p-4 rounded-full bg-green-600 text-white fixed bottom-5 right-7">
            <i class="fa fa-envelope text-3xl"></i>
        </div>
        <script>
            function nextOne(){
                document.getElementById('one').classList.add('hidden');
                document.getElementById('three').classList.add('hidden');
                document.getElementById('two').classList.remove('hidden');
            }
            function nextTwo(){
                document.getElementById('one').classList.add('hidden');
                document.getElementById('three').classList.remove('hidden');
                document.getElementById('two').classList.add('hidden');
            }
            function prevOne(){
                document.getElementById('one').classList.remove('hidden');
                document.getElementById('three').classList.add('hidden');
                document.getElementById('two').classList.add('hidden');
            }
            function prevTwo(){
                document.getElementById('one').classList.add('hidden');
                document.getElementById('three').classList.add('hidden');
                document.getElementById('two').classList.remove('hidden');
            }
        </script>
    </body>
