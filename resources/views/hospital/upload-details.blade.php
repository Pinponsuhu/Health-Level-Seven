@extends('layouts.hospital.app')
@section('content')
    <main class="w-full h-screen overflow-y-scroll">
        @include('layouts.hospital.nav')
        <div class="px-4 md:px-8 mt-3">
            <div class="p-2 md:p-8 bg-white rounded-md shadow-md">
                <div class="flex justify-between items-center">
                    <h1 class="text-xl font-bold text-green-500 md:mb-3">Test Details</h1>
                    <a href="#" onclick="add_result()" class="px-8 py-2 bg-green-500 text-white rounded-md items-center"><i class="fa fa-plus"></i> Add result</a>
                </div>
                <div class="w-full h-full grid col-span-2 items-center gap-x-4">
                    <h1 class="text-3xl font-bold md:col-span-2 text-gray-900">{{ $upload->full_name}}</h1>

                    <div class="flex gap-x-2 mt-4">
                        <label class="text-green-500 text-md font-semibold">Patient ID: </label>
                        <p class="text-md font-medium">@if ( $upload->PID == NULL)
                            Not registered as a patient
                        @else
                        {{ $upload->PID }}
                        @endif</p>
                    </div>
                    <div class="flex gap-x-2 mt-2">
                        <label class="text-green-500 text-md font-semibold">Gender: </label>
                        <p class="text-md font-medium">{{ $upload->gender }}</p>
                    </div>
                    <div class="flex gap-x-2 mt-2">
                        <label class="text-green-500 text-md font-semibold">Test Type: </label>
                        <p class="text-md font-medium">{{ $upload->test_type }}</p>
                    </div>
                    <div class="flex gap-x-2 mt-2">
                        <label class="text-green-500 text-md font-semibold">Email Address: </label>
                        <p class="text-md font-medium">{{ $upload->email_address }}</p>
                    </div>
                    <div class="flex gap-x-2 mt-2">
                        <label class="text-green-500 text-md font-semibold">Phone Number: </label>
                        <p class="text-md font-medium">{{ $upload->phone_number }}</p>
                    </div>
                    <div class="flex gap-x-2 mt-2">
                        <label class="text-green-500 text-md font-semibold">Initiated Date: </label>
                        <p class="text-md font-medium">{{ date($upload->created_at) }}</p>
                    </div>

                    <h1 class="md:col-span-2 text-xl font-bold text-green-500 my-4">Result Section</h1>
                    <div class="flex flex-col gap-y-5">
                        @foreach ($files as $file)
                    <div class="flex gap-x-6 justify-between items-center">
                        <p>{{ $file->created_at }}</p>
                        <div class="flex items-center gap-x-4">
                            <a href="{{ asset('/storage/results/' . $file->file_path) }}" download class="px-6 py-3 bg-blue-500 rounded-md flex items-center text-white">View <i class="fa fa-arrow-right ml-4"></i></a>
                        <a href="/delete/radiology/file/{{ Crypt::encrypt($file->id) }}"><i class="fa fa-trash text-red-400"></i></a>
                        </div>
                    </div>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>

    </main>
    <div class="fixed w-screen hidden h-screen bg-black bg-opacity-80" id="result">
        <div class="mt-20 w-80 md:w-96 mx-auto p-6 bg-white rounded-md">
            <h1 class="text-xl mb-4 font-bold text-green-500 pb-2 border-b-2 border-green-300">Add Result</h1>
            <form action="/add/result/{{ Crypt::encrypt($upload->id) }}" enctype="multipart/form-data" method="POST">
            @csrf
            <input type="file" name="result[]" multiple class="px-3 w-full  py-3 rounded-md shadow-md border-l-4 border-green-500">
            <div class="flex justify-center mt-3 gap-x-4">
                <button class="py-3 px-6 bg-green-500 text-white rounded-md shadow-md flex mt-4 justify-center">Submit</button>
                <a href="#" onclick="add_result()" class="py-3 px-6 bg-red-500 text-white rounded-md shadow-md flex mt-4 justify-center">Close</a>
            </div>
            </form>
        </div>
    </div>
    <script>
        function add_result(){
            document.getElementById('result').classList.toggle('hidden');
        }
    </script>
@endsection


