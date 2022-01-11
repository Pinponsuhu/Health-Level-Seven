@extends('layouts.department.app')
@section('content')
    <main class="w-full h-screen">
        @include('layouts.department.nav')
        <div class="mt-5 px-8">
            <div class="bg-white rounded-md shadow-md p-6">
                <div class="w-full py-4 gap-y-3 flex flex-wrap gap-x-2 overflow-x-scroll">
                    @foreach ($departments as $department)
                    <a href="/department/chat/message/box/{{ $department->id }}">
                        <div class="py-0.5 px-8 rounded-full bg-green-500 flex gap-x-3 items-center justify-center text-white">
                            {{ $department->name }}
                            <p class="p-1 bg-red-400 rounded-full"></p>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </main>
@endsection
