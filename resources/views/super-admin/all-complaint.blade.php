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
        <div class="flex justify-between">
            <h1 class="text-green-500 items-center font-bold text-xl mb-4">All Active Complaint</h1>
            <div class="flex items-center gap-x-2">
                <a href="/hospital/active/complain" class="py-2 rounded-md px-4 bg-blue-400 text-white">Active</a>
                <a href="/hospital/closed/complain" class="py-2 rounded-md px-6 bg-red-400 text-white">Closed Complaint</a>
            </div>
        </div>
       <div class="mt-3">
        @if ($complaint->count() != null)
        @foreach ($complaint as $complain)
        <a href="/super/complain/track/{{ Crypt::encrypt($complain->id) }}">
            <div class="py-3 cursor-pointer flex justify-between border-b-2 border-gray-400 hover:bg-gray-100 px-4">
                <div>
                    <h1 class="text-green-500 font-medium text-lg">{{ $complain->title }}</h1>
                    <p class="text-gray-300">{{ $complain->created_at->diffForHumans() }}</p>
                </div>
                <span class="h-2 w-2 bg-red-400 rounded-full"></span>
            </div>
        </a>
        @endforeach
    @else
    <p class="text-center font-medium italic text-lg text-green-500">No Active complaint</p>
    @endif
       </div>
    </div>

</body>

