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

        <link rel="stylesheet" href="{{ secure_asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ secure_asset('css/jquery.dataTables.css') }}">

        <script src="{{ secure_asset('js/all.js') }}"></script>
        <script src="{{ secure_asset('js/jquery.js') }}"></script>

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
        <a href="/super/admin/index" class="flex items-center text-lg"><i class=" fa fa-arrow-left"></i><p class="ml-3">Dashboard</p></a>
        <form action="/super/admin/settings/update/profile" class="items-center w-11/12 md:w-10/12 md:grid grid-cols-2 gap-x-4 p-4 mx-auto" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <label class="font-bold mb-2 block">Fullname</label>
                <input type="text" value="{{ $admin->fullname }}" name="fullname" placeholder="Enter Fullname" class="capitalize border-l-4 border-green-500 w-full rounded-md p-3 shadow-md outline-none block">
                    @error('fullname')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
            </div>
            <div class="mt-4">
                <label class="font-bold mb-2 block">Username</label>
                <input type="text" value="{{ $admin->username }}" name="username" placeholder="Enter Username" class="capitalize border-l-4 border-green-500 w-full rounded-md p-3 shadow-md outline-none block">
                    @error('username')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
            </div>
            <div class="mt-4">
                <label class="font-bold mb-2 block">Phone Number</label>
                <input type="text" value="{{ $admin->phone_number }}" name="phone_number" placeholder="Enter Phone Number" class="capitalize border-l-4 border-green-500 w-full rounded-md p-3 shadow-md outline-none block">
                    @error('phone_number')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
            </div>
            <div class="mt-4">
                <label class="font-bold mb-2 block">Email Address</label>
                <input type="email" value="{{ $admin->email_address }}" name="email_address" placeholder="Enter Email Address" class="border-l-4 border-green-500 w-full rounded-md p-3 shadow-md outline-none block">
                    @error('email_address')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
            </div>
            <div class="mt-4">
                <label class="font-bold mb-2 block">Gender</label>
                <select name="gender" id="" class="border-l-4 border-green-500 w-full rounded-md p-3 shadow-md outline-none block">
                    <option value="{{ $admin->gender }}">{{$admin->gender}}</option>
                    @foreach ($gender as $gen)
                        @if ($admin->gender != $gen)
                        <option value="{{ $gen }}">{{$gen}}</option>
                        @endif
                    @endforeach
                </select>
                    @error('gender')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
            </div>
            <button class="col-span-2 w-36 mt-4 block mx-auto px-8 py-3 rounded-md text-white bg-green-500">Submit</button>
        </form>
    </div>
</body>
</html>
