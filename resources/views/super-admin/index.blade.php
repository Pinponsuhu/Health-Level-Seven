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
    <body class="antialiased bg-gray-100 h-screen py-4">
        <div class="lg:w-10/12 w-9/12 bg-white rounded-md shadow-md mx-auto p-8 h-full overflow-y-scroll">
            <h1 class="flex justify-center gap-x-3 items-center text-center mb-1 text-lg md:text-xl font-medium text-green-600">Welcome,  <img class="w-12 h-12 hidden md:flex rounded-full shadow-lg" src="{{ '/storage/super_admins/' . auth()->guard('superadmin')->user()->passport }}" alt=""> <br class="md:hidden"> <u>{{ auth()->guard('superadmin')->user()->fullname }}</u></h1>
            <div class="grid md:grid-cols-2 lg:col-span-3 lg:w-11/12 gap-y-3 gap-x-3 border-2 border-red-400 py-4 items-center">
                <a href="/super/admin/hospital/list" class="col-span-1 w-56 mx-auto py-5 px-4 rounded-md hover:bg-green-600 hover:text-white bg-white text-green-600 shadow-md">
                    <div class="mt-5">
                        <i class="fa fa-building text-4xl block text-center mx-auto"></i>
                        <div>
                            <h2 class="text-xl mt-3 font-medium text-center ">All <br> Hospitals</h2>
                        </div>
                    </div>
                </a>
                <a href="/super/{{ Crypt::encrypt('Open') }}/complaint" class="col-span-1 w-56  mx-auto py-5 px-4 rounded-md hover:bg-green-600 hover:text-white bg-white text-green-600 shadow-md">
                    <div class="mt-5">
                        <i class="fa fa-envelope text-4xl block text-center mx-auto"></i>
                        <div>
                            <h2 class="text-xl mt-3 font-medium text-center ">All <br> Complaints</h2>
                        </div>
                    </div>
                </a>
                <a href="/super/admin/new/hospital" class="col-span-1 w-56   mx-auto py-5 px-4 rounded-md hover:bg-green-600 hover:text-white bg-white text-green-600 shadow-md">
                    <div class="mt-5">
                        <i class="fa fa-user-injured text-4xl block text-center mx-auto"></i>
                        <div>
                            <h2 class="text-xl mt-3 font-medium text-center">Register <br>Hospitals</h2>
                        </div>
                    </div>
                </a>
                <a href="/super/admin/settings" class="col-span-1 w-56 mx-auto py-5 px-4 rounded-md hover:bg-green-600 hover:text-white bg-white text-green-600 shadow-md">
                    <div class="mt-5">
                        <i class="fa fa-cog text-4xl block text-center mx-auto"></i>
                        <div>
                            <h2 class="text-xl mt-3 font-medium text-center ">My <br> Settings</h2>
                        </div>
                    </div>
                </a>
                @if (auth()->guard('superadmin')->user()->level == 1)
                <a href="/super/admin/all/admins" class="col-span-1 w-56  mx-auto py-5 px-4 rounded-md hover:bg-green-600 hover:text-white bg-white text-green-600 shadow-md">
                    <div class="mt-5">
                        <i class="fa fa-user-cog text-4xl block text-center mx-auto"></i>
                        <div>
                            <h2 class="text-xl mt-3 font-medium text-center ">All <br> Admins</h2>
                        </div>
                    </div>
                </a>
                @endif
                @if (auth()->guard('superadmin')->user()->level == 1)
                <a href="/super/add/admin" class="col-span-1 w-56 mx-auto py-5 px-4 rounded-md hover:bg-green-600 hover:text-white bg-white text-green-600 shadow-md">
                    <div class="mt-5">
                        <i class="fa fa-plus text-4xl block text-center mx-auto"></i>
                        <div>
                            <h2 class="text-xl mt-3 font-medium text-center ">Add <br> Admin</h2>
                        </div>
                    </div>
                </a>
                @endif

                <a href="/super/admin/logout" class="md:col-span-2 lg:col-span-3 block w-36 text-center py-3 bg-green-500 text-white rounded-md shadow-md mx-auto">Logout</a>
            </div>
        </div>
    </body>
</html>
