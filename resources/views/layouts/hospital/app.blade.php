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
        <link rel="stylesheet" href="{{ asset('css/jquery.dataTables.css') }}">

        <script src="{{ asset('js/all.js') }}"></script>
        <script src="{{ asset('js/jquery.js') }}"></script>

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
    <body class="antialiased bg-gray-200 flex">
        <nav class="w-80 bg-green-600 h-screen hidden md:block overflow-y-scroll py-3">
            <h1 class="uppercase text-3xl font-bold text-white text-center pb-4">Menu</h1>
            <a href="/hospital/dashboard"><li class="flex text-gray-50 items-center pl-7 mt-3"><i class="fa fa-chart-pie mr-6 text-2xl"></i> <p class="text-lg">Dashboard</p></li></a>
            <ul class="pl-4 mt-3 py-3">
                <li class="flex text-gray-50 items-center px-3"><i class="fa fa-user-md mr-7 text-2xl"></i> <p class="text-md">Clinical</p></li>
            </ul>
            <ul class="pl-4 mt-3 py-3">
                <li class="flex text-gray-50 items-center px-3"><i class="fa fa-x-ray mr-5 text-2xl"></i> <p class="text-md">Radiology Upload</p></li>
                <a href="/hospital/new/patient"><li class="text-md py-2 ml-16 text-white">All Uploads</li></a>
                <a href="/hospital/new/radiology/upload"><li class="text-md py-2 ml-16 text-white">Add New</li></a>
            </ul>
            <ul class="pl-4 mt-3 py-3">
                <li class="flex text-gray-50 items-center px-3"><i class="fa fa-user-injured mr-8 text-2xl"></i> <p class="text-md">Patient management</p></li>
                <a href="/view/all/patient"><li  class="text-md py-2 ml-16 text-white">All Patient</li></a>
                <a href="/hospital/new/patient"><li class="text-md py-2 ml-16 text-white">New Patient</li></a>
            </ul>
            <ul class="pl-4 mt-3 py-3">
                <li class="flex text-gray-50 items-center px-3"><i class="fa fa-procedures mr-5 text-2xl"></i> <p class="text-md">Bed Management</p></li>
                <a href="/bed/management"><li class="text-md py-2 ml-16 text-white">Overview</li></a>
                    <a href="/bed/history"><li class="text-md py-2 ml-16 text-white">View All</li></a>
            </ul>
            <ul class="pl-4 mt-3 py-3">
                <li class="flex text-gray-50 items-center px-3"><i class="fa fa-user-cog mr-5 text-2xl"></i> <p class="text-md">Admin</p></li>
            </ul>
            <ul class="pl-4 mt-3 py-3">
                <li class="flex text-gray-50 items-center px-3"><i class="fa fa-calendar-check mr-7 text-2xl"></i> <p class="text-md">Appointment</p></li>
                <li class="text-md py-2 ml-16 text-white">Routine</li>
                <li class="text-md py-2 ml-16 text-white"><a href="/prebooked/appointment">Pre-Booked</a></li>
                <a href="/telephone/appointments"><li class="text-md py-2 ml-16 text-white">Telephone consultation</li></a>
                <a href="/book/appointment"><li class="text-md py-2 ml-16 text-white">Add new</li></a>
            </ul>
            <ul class="pl-4 mt-3 py-3">
                <li class="flex text-gray-50 items-center px-3"><i class="fa fa-clipboard-list mr-7 text-2xl"></i> <p class="text-md">Inventory</p></li>
                <a href="/inventory/dashboard"><li class="text-md py-2 ml-16 text-white">Overview</li></a>
                <a href="#"><li class="text-md py-2 ml-16 text-white">In Stock</li></a>
                <a href="/all/items"><li class="text-md py-2 ml-16 text-white">All Items</li></a>
            </ul>
            <ul class="pl-4 mt-3 py-3">
                <li class="flex text-gray-50 items-center px-3"><i class="fa fa-building mr-7 text-2xl"></i> <p class="text-md">Department</p></li>
            </ul>
        </nav>
        @yield('content')

        <div class="p-4 rounded-full bg-green-600 text-white fixed bottom-5 right-7">
            <i class="fa fa-envelope text-2xl"></i>
        </div>
    </body>
