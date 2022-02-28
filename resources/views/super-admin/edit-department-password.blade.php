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
        <h1 class="text-xl font-bold mb-4 text-green-500">Change Password</h1>
        <form action="/super/admin/department/password/{{ $id }}" class="md:w-5/12 mx-auto" method="POST">
            @csrf
            <input type="text" autocomplete="off" name="password" placeholder="New password" class="border-l-4 outline-none border-green-500 px-3 py-3 text-md rounded-md shadow-md bg-white block mt-3 w-full" id="">
            @error('new_password')
            <p class="text-sm text-red-500">{{ $message }}</p>
        @enderror
            <input type="text" autocomplete="off" name="password_confirmation" placeholder="Confirm New password" class="border-l-4 outline-none border-green-500 px-3 py-3 text-md rounded-md shadow-md bg-white block mt-3 w-full" id="">
            <button type="submit" class="mt-3 rounded-md bg-green-500 text-white py-3 px-8 flex justify-center">Change Password</button>
        </form>
    </div>

</body>

