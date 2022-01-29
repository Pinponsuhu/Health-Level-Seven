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
        <h1 class="text-xl font-bold text-green-400 mb-3">Reply Complain: "{{ $complain->title }}"</h1>
        <form action="/super/reply/complain/{{ Crypt::encrypt($complain->id) }}" mt-3 class="w-11/12 md:w-7/12" enctype="multipart/form-data" method="post">
            @csrf
            <label class="block font-bold mb-1 mt-2 text-md text-green-800">Message *</label>
            <textarea name="message" placeholder="Send Message" class="outline-none shadow-md w-full block resize-none py-3 px-3 border-l-4 rounded-md border-green-400" id="" cols="30" rows="4">{{ old('message') }}</textarea>
            <label class="block font-bold mb-1 mt-2 text-md text-green-800">File Attachment <span class="font-medium">(Optional)</span></label>
            <input type="file" name="files[]" multiple class="block text-green-500 py-3 px-4 w-full shadow-md rounded-md border-l-4 border-green-400" id="">
            <div class="flex gap-x-2 items-center mt-2">
                <label class="block font-bold mb-1 mt-2 text-md text-green-800">Set Status</label>
                <select name="status">
                    <option value="" selected disabled>--select status</option>
                    <option value="Open">Open</option>
                    <option value="Closed">Closed</option>
                </select>
            </div>
            <button class="block mt-2 w-32 text-center py-3 rounded-md text-white bg-green-500">Submit</button>
        </form>
    </div>

</body>

