@extends('layouts.hospital.app')
@section('content')
    <main class="w-full h-screen pb-8 overflow-y-scroll">
        @include('layouts.hospital.nav')
        <div class="mt-3 px-8 h-full">
            <div class="bg-white rounded-md shadow-md p-6 h-full overflow-y-scroll">
                <div class="w-11/12 mx-auto">
                    <h1 class="text-2xl mb-0.5 font-bold text-green-400">{{ $req->title }}</h1>
                    <p class="mb-3 text-sm text-gray-600">From: {{ $department->name }}</p>
                    <p class="text-md">{{ $req->content }}</p>
                    <div class="mt-3 flex gap-x-4 mb-2 border-b-2 border-gray-200 pb-5 items-center">
                        @foreach ($files as $file)
                            <a href="{{ '/storage/requests/' . $file->filename }}" target="_blank"><img class="h-14 w-14 rounded-md shadow-md" src="{{ '/storage/requests/' . $file->filename }}" alt=""></a>
                        @endforeach
                    </div>
                    @if ($replies->count() == 0)
                    <a href="/reply/request/{{ Crypt::encrypt($req->id) }}" class="bg-blue-500 block mt-3 w-28 text-center py-2 text-white">Reply</a>
                    @endif
                </div>
                <div class="mt-4 w-11/12 mx-auto">
                    @foreach ($replies as $reply)
                        <div class="border-b-2 py-4 border-gray-200">
                            <p class="text-md">{{ $reply->message }}</p>
                            @php
                                $files = \App\Models\RequestReplyFiles::where(['reply_id' => $reply->id])->pluck('filename');
                            @endphp
                            <div class="mt-2 flex gap-x-4">
                                @foreach ($files as $rep_f)
                                <a href="{{ '/storage/requests_reply/' . $rep_f }}" target="_blank"><img class="h-14 w-14 rounded-md shadow-md" src="{{ '/storage/requests_reply/' . $rep_f }}" alt=""></a>
                                @endforeach
                            </div>
                            <p class="mt-0.5 text-sm">{{ $reply->from }}</p>
                            <span class="text-sm">{{ $reply->created_at->diffForHumans() }}</span>
                        </div>
                    @endforeach
                    @if ($replies->count() != 0)
                    <a href="/reply/request/{{ Crypt::encrypt($req->id) }}" class="bg-blue-500 block mt-3 w-28 text-center py-2 text-white">Reply</a>
                    @endif
                </div>
            </div>
        </div>
    </main>
@endsection

