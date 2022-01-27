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
        <div class="flex gap-x-2 items-center mb-4">
            <a href="/super/hospital/change/password/{{ Crypt::encrypt($hospital->id) }}" class="px-8 py-3 bg-green-500 text-white rounded-md">Change Password</a>
            <a href="/super/admin/edit/hospital/{{ Crypt::encrypt($hospital->id) }}" class="px-8 py-3 bg-blue-500 text-white rounded-md">Edit <i class="fa fa-pen"></i></a>
            <a href="/super/hospital/delete/{{ Crypt::encrypt($hospital->id) }}" class="px-8 py-3 bg-red-400 text-white rounded-md">Delete <i class="fa fa-trash"></i></a>
        </div>
        <div class="px-8 mt-2">
            <div class="flex gap-x-4 bg-white shadow-md rounded-md px-6 py-4 mt-4">
                <div class="w-72 h-full">
                    <img src="{{ asset('/storage/users/' . $hospital->hospital_logo) }}" class="w-72 block rounded shadow-md h-auto" alt="">
                    <a href="/super/admin/change/logo/{{ Crypt::encrypt($hospital->id) }}" class="text-md font-medium block mt-2 text-center text-green-500">Change Hospital logo</a>
                </div>
                <div class="w-full h-full">
                    <h1 class="text-3xl font-bold text-gray-900">{{ $hospital->hospital_name }}</h1>
                    <p class="flex items-center gap-x-2 mt-1"><span class="text-md"><b>CEO:</b> {{ $hospital->head_of_hospital }}</span></p>

                    <div class="flex gap-x-2 mt-3">
                        <label class="text-green-500 text-md font-semibold">Email Address: </label>
                        <p class="text-md font-medium">{{ $hospital->email_address }}</p>
                    </div>
                    <div class="flex gap-x-2 mt-2">
                        <label class="text-green-500 text-md font-semibold">Phone Number: </label>
                        <p class="text-md font-medium">{{ $hospital->phone_number }}</p>
                    </div>
                    <div class="flex gap-x-2 mt-2 mb-5">
                        <label class="text-green-500 text-md font-semibold">Hospital Address: </label>
                        <p class="text-md font-medium">{{ $hospital->hospital_address }}</p>
                    </div>
                    <div class="border-t-2 border-gray-300">
                        <h1 class="text-xl font-bold text-green-500 my-2">Departments</h1>
                        <div class="my-4">
                            @foreach ($departments as $department)
                            <div class="py-3 border-b-2 border-gray-200 flex justify-between items-center">
                                <form action="" method="post">
                                    <input type="text" name="department" value="{{ $department->name }}" disabled id="">
                                </form>
                                <div class="flex gap-x-5">
                                    <a href="#"><i class="fa fa-pen"></i></a>
                                    <a href="#"><i class="fa fa-trash text-red-400"></i></a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
           </div>
    </div>
</body>
