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
        <div class="w-7/12 mx-auto grid grid-cols-3 gap-y-6 mt-5">
            <h1 class="col-span-3 text-center mb-1 text-2xl font-medium text-green-600">Welcome, <u>{{ auth()->guard('superadmin')->user()->fullname }}</u></h1>
            <a href="/super/admin/hospital/list" class="w-56 mx-auto py-5 px-4 rounded-md hover:bg-green-600 hover:text-white bg-white text-green-600 shadow-md">
                <div class="mt-5">
                    <i class="fa fa-building text-4xl block text-center mx-auto"></i>
                    <div>
                        <h2 class="text-xl mt-3 font-medium text-center ">All <br> Hospitals</h2>
                    </div>
                </div>
            </a>
            <a href="#" class="w-56 mx-auto py-5 px-4 rounded-md hover:bg-green-600 hover:text-white bg-white text-green-600 shadow-md">
                <div class="mt-5">
                    <i class="fa fa-envelope text-4xl block text-center mx-auto"></i>
                    <div>
                        <h2 class="text-xl mt-3 font-medium text-center ">Complaints</h2>
                    </div>
                </div>
            </a>
            <a href="/super/admin/new/hospital" class="w-56 mx-auto py-5 px-4 rounded-md hover:bg-green-600 hover:text-white bg-white text-green-600 shadow-md">
                <div class="mt-5">
                    <i class="fa fa-user-injured text-4xl block text-center mx-auto"></i>
                    <div>
                        <h2 class="text-xl mt-3 font-medium text-center">Register <br>Hospitals</h2>
                    </div>
                </div>
            </a>
            <a href="#" class="w-56 mx-auto py-5 px-4 rounded-md hover:bg-green-600 hover:text-white bg-white text-green-600 shadow-md">
                <div class="mt-5">
                    <i class="fa fa-cog text-4xl block text-center mx-auto"></i>
                    <div>
                        <h2 class="text-xl mt-3 font-medium text-center ">Settings</h2>
                    </div>
                </div>
            </a>
            <a href="" class="w-56 mx-auto py-5 px-4 rounded-md hover:bg-green-600 hover:text-white bg-white text-green-600 shadow-md">
                <div class="mt-5">
                    <i class="fa fa-user-cog text-4xl block text-center mx-auto"></i>
                    <div>
                        <h2 class="text-xl mt-3 font-medium text-center ">All <br> Admins</h2>
                    </div>
                </div>
            </a>
            <a href="/super/add/admin" class="w-56 mx-auto py-5 px-4 rounded-md hover:bg-green-600 hover:text-white bg-white text-green-600 shadow-md">
                <div class="mt-5">
                    <i class="fa fa-plus text-4xl block text-center mx-auto"></i>
                    <div>
                        <h2 class="text-xl mt-3 font-medium text-center ">Add <br> Admin</h2>
                    </div>
                </div>
            </a>

            <a href="#" class="col-span-3 block w-36 text-center py-3 bg-green-500 text-white rounded-md shadow-md mx-auto">Logout</a>
        </div>
    </body>
</html>
