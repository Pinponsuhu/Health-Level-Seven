@extends('layouts.hospital.app')
@section('content')
    <main class="w-full h-screen">
        @include('layouts.hospital.nav')
        <div class="mt-3 px-8">
            <div class="p-6 bg-white rounded-md shadow-md">
                <h1 class="text-xl font-bold text-green-400 mb-3">Reply Complain: "{{ $complain->title }}"</h1>
                <form action="/hospital/reply/complain/{{ Crypt::encrypt($complain->id) }}" mt-3 class="w-7/12" enctype="multipart/form-data" method="post">
                    @csrf
                    <label class="block font-bold mb-1 mt-2 text-md text-green-800">Message *</label>
                    <textarea name="message" placeholder="Send Message" class="outline-none shadow-md w-full block resize-none py-3 px-3 border-l-4 rounded-md border-green-400" id="" cols="30" rows="4">{{ old('content') }}</textarea>
                    <label class="block font-bold mb-1 mt-2 text-md text-green-800">File Attachment <span class="font-medium">(Optional)</span></label>
                    <input type="file" name="files[]" multiple class="block text-green-500 py-3 px-4 w-full shadow-md rounded-md border-l-4 border-green-400" id="">
                    <button class="block mt-2 w-32 text-center py-3 rounded-md text-white bg-green-500">Submit</button>
                </form>
            </div>
        </div>
    </main>
@endsection
