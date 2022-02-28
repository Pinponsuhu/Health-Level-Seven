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
        <h1 class="text-xl font-bold mb-4 text-green-500">Department Details</h1>
        <form action="/hospital/edit/department/{{ Crypt::encrypt($department->id) }}" class="w-11/12 mb-6 grid gap-y-3 md:grid-cols-2 mx-auto gap-x-5 mt-4" method="post">
            @csrf
            <div>
                <label  class="font-semibold text-md block mb-1">Name</label>
                <input type="text" autocomplete="off" name="name" value="{{ $department->name }}" placeholder="Department" class="capitalize border-l-4 border-green-500 w-full rounded-md p-3 shadow-md outline-none block">
                @error('name')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <h1 class="text-2xl font-bold text-green-500 md:col-span-2 my-3">Permission</h1>
            <div class="md:col-span-2 flex flex-col md:flex-row gap-x-4">
                <div class="flex gap-x-3 items-center">
                    <label>Radiology</label>
                    <input type="checkbox" @if ($department->radiology_permission == 'on')
                    checked
                    @endif name="radiology" id="">
                </div>
                <div class="flex gap-x-3 items-center">
                    <label>Patient Management</label>
                    <input type="checkbox" @if ($department->patient_permission == 'on')
                    checked
                    @endif name="patient" id="">
                </div>
                <div class="flex gap-x-3 items-center">
                    <label>Appointment Management</label>
                    <input type="checkbox" @if ($department->appointment_permission == 'on')
                    checked
                    @endif name="appointment" id="">
                </div>
                <div class="flex gap-x-3 items-center">
                    <label>Bed Management</label>
                    <input type="checkbox" @if ($department->bed_permission == 'on')
                        checked
                    @endif name="bed" id="">
                </div>
                <div class="flex gap-x-3 items-center">
                    <label>Inventory Management</label>
                    <input type="checkbox" @if ($department->inventory_permission == 'on')
                    checked
                    @endif name="inventory" id="">
                </div>
            </div>
            <input type="submit" class="block md:col-span-2 bg-green-500 rounded-md shadow-md text-center text-white w-32 py-3" value="submit">
        </form>
    </div>

</body>

