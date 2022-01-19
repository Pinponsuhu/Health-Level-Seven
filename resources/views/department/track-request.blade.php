@extends('layouts.department.app')
@section('content')
    <main class="w-full h-screen pb-8 overflow-y-scroll">
        @include('layouts.department.nav')
        <div class="mt-3 px-8 h-full">
            <div class="bg-white rounded-md shadow-md p-6 h-full overflow-y-scroll">
                <div class="w-11/12 mx-auto">
                    <h1 class="text-2xl mb-0.5 font-bold text-green-400">{{ $req->title }}</h1>
                    <p class="mb-3 text-sm text-gray-600">From: {{ $department->name }}</p>
                    <p>{{ $req->content }}</p>
                    <div class="mt-3 flex gap-x-4 mb-2 items-center">
                        @foreach ($files as $file)
                            <a href="{{ '/storage/requests/' . $file->filename }}"><img class="h-14 w-14 rounded-md shadow-md" src="{{ '/storage/requests/' . $file->filename }}" alt=""></a>
                        @endforeach
                    </div>
                    <a href="#" class="bg-blue-500 block mt-3 w-28 text-center py-2 text-white">Reply</a>
                </div>
            </div>
        </div>
    </main>
@endsection

