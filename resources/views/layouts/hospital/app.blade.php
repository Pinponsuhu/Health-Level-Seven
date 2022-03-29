<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ auth()->user()->hospital_name }}</title>

        {{-- code to disable inspect element --}}
        {{-- <script>
            document.onkeydown = function (e) {
                if (event.keyCode == 123) {
                    return false;
                }
                if (e.ctrlKey && e.shiftKey && (e.keyCode == 'I'.charCodeAt(0) || e.keyCode == 'i'.charCodeAt(0))) {
                    return false;
                }
                if (e.ctrlKey && e.shiftKey && (e.keyCode == 'C'.charCodeAt(0) || e.keyCode == 'c'.charCodeAt(0))) {
                    return false;
                }
                if (e.ctrlKey && e.shiftKey && (e.keyCode == 'J'.charCodeAt(0) || e.keyCode == 'j'.charCodeAt(0))) {
                    return false;
                }
                if (e.ctrlKey && (e.keyCode == 'U'.charCodeAt(0) || e.keyCode == 'u'.charCodeAt(0))) {
                    return false;
                }
                if (e.ctrlKey && (e.keyCode == 'S'.charCodeAt(0) || e.keyCode == 's'.charCodeAt(0))) {
                    return false;
                }
            }
        </script> --}}

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

    {{-- oncontext menu is to disable inspect element --}}
    {{-- oncontextmenu="return false;" --}}
    <body  class="antialiased bg-gray-200 flex">
        <nav id="nav-sec" class="z-50 w-80 bg-green-600 md:relative h-screen hidden md:block overflow-y-scroll py-3">
            <h1 class="uppercase text-3xl font-bold text-white text-center pb-4">Menu</h1>
            <a href="/hospital/dashboard"><li class="flex text-gray-50 items-center pl-7 mt-3"><i class="fa fa-chart-pie mr-6 text-2xl"></i> <p class="text-sm">Dashboard</p></li></a>
            <ul class="pl-4 mt-3 py-3">
                <li class="flex text-gray-50 items-center px-3"><i class="fa fa-x-ray mr-5 text-2xl"></i> <p class="text-sm">Radiology Upload</p></li>
                <a href="/track/uploads"><li class="text-sm py-2 ml-16 text-white">Track Uploads</li></a>
                <a href="/upload/radiology"><li class="text-sm py-2 ml-16 text-white">Add New</li></a>
            </ul>
            <ul class="pl-4 mt-3 py-3">
                <li class="flex text-gray-50 items-center px-3"><i class="fa fa-user-injured mr-8 text-2xl"></i> <p class="text-sm">Patient management</p></li>
                <a href="/view/all/patient"><li  class="text-sm py-2 ml-16 text-white">All Patient</li></a>
                <a href="/hospital/new/patient"><li class="text-sm py-2 ml-16 text-white">New Patient</li></a>
            </ul>
            <ul class="pl-4 mt-3 py-3">
                <li class="flex text-gray-50 items-center px-3"><i class="fa fa-procedures mr-5 text-2xl"></i> <p class="text-sm">Bed Management</p></li>
                <a href="/bed/management"><li class="text-sm py-2 ml-16 text-white">Overview</li></a>
                    <a href="/bed/history"><li class="text-sm py-2 ml-16 text-white">View All</li></a>
            </ul>
            <ul class="pl-4 mt-3 py-3">
                <li class="flex text-gray-50 items-center px-3"><i class="fa fa-user-cog mr-5 text-2xl"></i> <p class="text-sm">Admin</p></li>
                <li class="text-sm py-2 ml-16 text-white"><a href="/admin/overview">Overview</a></li>
                <li class="text-sm py-2 ml-16 text-white"><a href="/add/department">Departments</a></li>
                <li class="text-sm py-2 ml-16 text-white"><a href="/staff/registration">Staff Registration</a></li>
            </ul>
            <ul class="pl-4 mt-3 py-3">
                <li class="flex text-gray-50 items-center px-3"><i class="fa fa-calendar-check mr-7 text-2xl"></i> <p class="text-sm">Appointment</p></li>
                <li class="text-sm py-2 ml-16 text-white"><a href="/routine/appointment/{{ Crypt::encrypt('Active') }}">Routine</a></li>
                <li class="text-sm py-2 ml-16 text-white"><a href="/prebooked/appointment/{{ Crypt::encrypt('Active') }}">Pre-Booked</a></li>
                <a href="/telephone/appointments/{{ Crypt::encrypt('Active') }}"><li class="text-sm py-2 ml-16 text-white">Telephone consultation</li></a>
                <a href="/book/appointment"><li class="text-sm py-2 ml-16 text-white">Add new</li></a>
            </ul>
            <ul class="pl-4 mt-3 py-3">
                <li class="flex text-gray-50 items-center px-3"><i class="fa fa-clipboard-list mr-7 text-2xl"></i> <p class="text-sm">Inventory</p></li>
                <a href="/inventory/dashboard"><li class="text-sm py-2 ml-16 text-white">Overview</li></a>
                <a href="/all/items"><li class="text-sm py-2 ml-16 text-white">All Items</li></a>
            </ul>
            <ul class="pl-4 mt-3 py-3">
                <a href="/request/{{ Crypt::encrypt('Open') }}"><li class="flex text-gray-50 items-center px-3"><i class="fa fa-envelope mr-7 text-2xl"></i> <p class="text-sm">Request</p></li></a>
            </ul>
            <ul class="pl-4 mt-3 py-3">
                <a href="/hospital/data/exchange"><li class="flex text-gray-50 items-center px-3"><i class="fa fa-envelope mr-7 text-2xl"></i> <p class="text-sm">Chatbox</p></li></a>
            </ul>
            <ul class="pl-4 mt-3 py-3">
                <a href="/hospital/changing/password"><li class="flex text-gray-50 items-center px-3"><i class="fa fa-lock mr-7 text-2xl"></i> <p class="text-sm">Change Password</p></li></a>
            </ul>
            <ul class="pl-4 mt-3 py-3">
                <a href="/logout"><li class="flex text-gray-50 items-center px-3"><i class="fa fa-power-off mr-7 text-2xl"></i> <p class="text-sm">Logout</p></li></a>
            </ul>
        </nav>
        @yield('content')

        <div class="w-16 flex justify-center items-center fixed bottom-4 right-5 shadow-md h-16 rounded-full bg-green-600  text-white">
            <a href="/hospital/{{ Crypt::encrypt('all') }}/complain">
                <i class="fa fa-envelope text-2xl"></i>
            </a>

        </div>

        <div id="nav-btn" onclick="open_menu()" class="fixed z-50 top-20 right-1 md:hidden bg-green-500 p-3 rounded-md text-white">
            <p class="text-4xl font-bold">≡</p>
        </div>
        <script>
            function open_menu(){
                if(document.getElementById('nav-btn').innerText == '≡'){
                    document.getElementById('nav-sec').classList.remove('hidden');
                    document.getElementById('nav-sec').classList.add('fixed','top-0','left-0','h-screen','overflow-y-scroll');
                    document.getElementById('nav-btn').innerText = 'x';
                }else{
                    document.getElementById('nav-sec').classList.add('hidden');
                    document.getElementById('nav-sec').classList.remove('fixed','top-0','left-0','h-screen','overflow-y-scroll');
                    document.getElementById('nav-btn').innerText = '≡';
                }
            }
        </script>
    </body>
