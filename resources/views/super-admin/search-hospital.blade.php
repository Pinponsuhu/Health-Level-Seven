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
        <div class="flex justify-between items-center my-2">
            <h1 class="text-xl font-bold mb-4 text-green-500">All Hospitals</h1>
            <a href="/super/admin/new/hospital" class="py-2 px-5 bg-green-400 text-white font-medium">New Hospital</a>
        </div>
        <div>
            <form action="/super/admin/hospital/search" method="get">
                @csrf
                <input type="search" name="search" class="block w-10/12 md:6/12 mx-auto px-1 bg-green-500 text-white py-3 rounded-md placeholder-white" placeholder="Search by Hospital name or Hospital ID">
            </form>
        </div>
        <div class="w-full overflow-x-scroll">
            <table class="w-full mx-auto bg-white shadow-md rounded-md mt-2">
                <thead>
                    <tr class="font-medium text-white text-md border-b-2 border-green-600">
                        <td  class=" py-3 bg-green-500 px-3 text-center border-r-4 border-green-100">Hospital Name</td>
                        <td  class=" py-3 bg-green-500 px-3 text-center border-r-4 border-green-100">Hospital ID</td>
                        <td  class=" py-3 bg-green-500 px-3 text-center border-r-4 border-green-100">Head Of Hospital</td>
                        <td class="py-3 bg-green-500 px-3 text-center border-r-4 border-green-100">Phone Number</td>
                        <td class=" py-3 bg-green-500 px-3 text-center border-r-4 border-green-100">Email Address</td>
                        <td class="py-3 bg-green-500 px-3 text-center border-r-4 border-green-100">Action</td>
                    </tr>
                </thead>
                <tbody>
                        <tr>
                            <td class=" py-3 bg-green-100 px-3 text-center capitalize">{{ $hospital->hospital_name }}</td>
                            <td class=" py-3 bg-green-100 px-3 text-center capitalize">{{ $hospital->HID }}</td>
                            <td class=" py-3 bg-white px-3 text-center capitalize">{{ $hospital->head_of_hospital }}</td>
                            <td class=" py-3 bg-green-100 px-3 text-center">{{ $hospital->phone_number }}</td>
                            <td class=" py-3 bg-white px-3 text-center">{{ $hospital->email_address }}</td>
                            <td class="px-3 bg-green-100"><a href="/super/admin/hospital/details/{{ Crypt::encrypt($hospital->id) }}" class="px-5 py-2 bg-blue-500 text-white rounded-md">More</a></td>
                        </tr>
                </tbody>
            </table>
        </div>
    </div>

</body>

