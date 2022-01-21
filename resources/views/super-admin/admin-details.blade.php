<!DOCTYPE html>
<html lang="en">
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
<body class="w-screen bg-gray-100 h-screen p-4 md:p-8">
    <div class="w-11/12 md:w-10/12 overflow-y-scroll h-full mx-auto shadow p-8 rounded-md bg-white text-green-500">
        <a href="/super/admin/index" class="flex gap-x-2 items-center mb-4"><i class="fa fa-arrow-left"></i> Dashboard</a>
        <div class="flex gap-x-2 items-center mb-4">
            <a href="/super/admin/password/{{ Crypt::encrypt($admin->id) }}" class="px-8 py-3 bg-green-500 text-white rounded-md">Change Password</a>
            <a href="/super/admin/edit/{{ Crypt::encrypt($admin->id) }}" class="px-8 py-3 bg-blue-500 text-white rounded-md">Edit <i class="fa fa-pen"></i></a>
            <a href="/super/admin/delete/{{ Crypt::encrypt($admin->id) }}" class="px-8 py-3 bg-red-400 text-white rounded-md">Delete <i class="fa fa-trash"></i></a>
        </div>
        <div class="px-8 mt-2">
            <div class="flex gap-x-4 bg-white shadow-md rounded-md px-6 py-4 mt-4">
                <div class="w-72 h-full">
                    <img src="{{ asset('/storage/super_admins/' . $admin->passport) }}" class="w-72 block rounded shadow-md h-auto" alt="">
                    <a href="/super/admin/admin/change-logo/{{ $admin->id }}" class="text-md font-medium block mt-2 text-center text-green-500">Change admin logo</a>
                </div>
                <div class="w-full h-full">
                    <h1 class="text-3xl font-bold text-gray-900">{{ $admin->fullname }}</h1>

                    <p class="flex items-center gap-x-2 mt-1"><span class="text-md"><b>Username:</b> {{ $admin->username }}</span></p>

                    <div class="flex gap-x-2 mt-3">
                        <label class="text-green-500 text-md font-semibold">Admin Level: </label>
                        <p class="text-md font-medium">{{ $admin->level }}</p>
                    </div>
                    <div class="flex gap-x-2 mt-3">
                        <label class="text-green-500 text-md font-semibold">Email Address: </label>
                        <p class="text-md font-medium">{{ $admin->email_address }}</p>
                    </div>
                    <div class="flex gap-x-2 mt-2">
                        <label class="text-green-500 text-md font-semibold">Phone Number: </label>
                        <p class="text-md font-medium">{{ $admin->phone_number }}</p>
                    </div>
                    <div class="flex gap-x-2 mt-2 mb-5">
                        <label class="text-green-500 text-md font-semibold">Gender: </label>
                        <p class="text-md font-medium">{{ $admin->gender }}</p>
                    </div>
                </div>
            </div>
           </div>
    </div>
</body>
