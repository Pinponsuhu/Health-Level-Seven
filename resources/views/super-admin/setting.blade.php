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
        <h1 class="text-xl font-bold mb-4 text-green-500">Settings</h1>
        <div class="w-9/12 mx-auto grid grid-cols-3 gap-y-6 mt-4">
            <a href="/super/admin/hospital/list" class="w-56 mx-auto py-5 px-4 rounded-md hover:bg-green-600 hover:text-white bg-white text-green-600 shadow-md">
                <div>
                    <i class="fa fa-file-image text-4xl block text-center mx-auto"></i>
                    <div>
                        <h2 class="text-xl mt-3 font-medium text-center ">Change <br> Passport</h2>
                    </div>
                </div>
            </a>
            <a href="/super/admin/hospital/list" class="w-56 mx-auto py-5 px-4 rounded-md hover:bg-green-600 hover:text-white bg-white text-green-600 shadow-md">
                <div>
                    <i class="fa fa-key text-4xl block text-center mx-auto"></i>
                    <div>
                        <h2 class="text-xl mt-3 font-medium text-center ">Change <br> Password</h2>
                    </div>
                </div>
            </a>
            <a href="/super/admin/hospital/list" class="w-56 mx-auto py-5 px-4 rounded-md hover:bg-green-600 hover:text-white bg-white text-green-600 shadow-md">
                <div>
                    <i class="fa fa-user-alt text-4xl block text-center mx-auto"></i>
                    <div>
                        <h2 class="text-xl mt-3 font-medium text-center ">Edit <br> Profile</h2>
                    </div>
                </div>
            </a>
        </div>
    </div>

</body>

