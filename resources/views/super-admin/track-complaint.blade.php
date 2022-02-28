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
        <a href="/super/admin/index" class="flex gap-x-2 items-center mb-4"><i class="fa fa-arrow-left"></i> Dashboard</a>
        <div class="w-11/12 mx-auto">
            <h1 class="text-2xl mb-0.5 font-bold text-green-400">{{ $req->title }}</h1>
            <p class="mb-3 text-sm text-gray-600">From: {{ $department->hospital_name }}</p>
            <p class="text-md">{{ $req->content }}</p>
            <div class="mt-3 flex gap-x-4 mb-2 border-b-2 border-gray-200 pb-5 items-center">
                @foreach ($files as $file)
                    <a href="{{ '/storage/complains/' . $file->filename }}" target="_blank"><img class="h-14 w-14 rounded-md shadow-md" src="{{ '/storage/complains/' . $file->filename }}" alt=""></a>
                @endforeach
            </div>
            @if ($replies->count() == 0)
            <a href="/super/reply/complain/{{ Crypt::encrypt($req->id) }}" class="bg-blue-500 block mt-3 w-28 text-center py-2 text-white">Reply</a>
            @endif
        </div>
        <div class="mt-4 w-11/12 mx-auto">
            @foreach ($replies as $reply)
                <div class="border-b-2 py-4 border-gray-200">
                    <p class="text-md">{{ $reply->message }}</p>
                    @php
                        $files = \App\Models\ReplyComplainFile::where(['reply_id' => $reply->id])->pluck('filename');
                    @endphp
                    <div class="mt-2 flex gap-x-4">
                        @foreach ($files as $rep_f)
                        <a href="{{ '/storage/complain_reply/' . $rep_f }}" target="_blank"><img class="h-14 w-14 rounded-md shadow-md" src="{{ '/storage/complain_reply/' . $rep_f }}" alt=""></a>
                        @endforeach
                    </div>
                    <p class="mt-0.5 text-sm font-medium text-gray-500">{{ $reply->from }}</p>
                    <span class="text-sm">{{ $reply->created_at->diffForHumans() }}</span>
                </div>
            @endforeach
            @if ($replies->count() != 0)
            <a href="/super/reply/complain/{{ Crypt::encrypt($req->id) }}" class="bg-blue-500 block mt-3 w-28 text-center py-2 text-white">Reply</a>
            @endif
        </div>
    </div>

</body>

