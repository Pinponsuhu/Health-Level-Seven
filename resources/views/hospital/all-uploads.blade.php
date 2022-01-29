@extends('layouts.hospital.app')
@section('content')
    <main class="w-full h-screen overflow-y-scroll">
        @include('layouts.hospital.nav')
        <div class="px-8 w-full overflow-x-scroll">
            <table class="w-full mx-auto bg-white shadow-md rounded-md mt-2">
                <thead>
                    <tr class="font-medium text-white text-md border-b-2 border-green-600">
                        <td  class=" py-3 bg-green-500 px-3 text-center border-r-4 border-green-100">Name</td>
                        <td class="py-3 bg-green-500 px-3 text-center border-r-4 border-green-100">Phone Number</td>
                        <td class=" py-3 bg-green-500 px-3 text-center border-r-4 border-green-100">Email Address</td>
                        <td class=" py-3 bg-green-500 px-3 text-center border-r-4 border-green-100">Test Type</td>
                        <td class="py-3 bg-green-500 px-3 text-center border-r-4 border-green-100">Gender</td>
                        <td class="py-3 bg-green-500 px-3 text-center border-r-4 border-green-100">Action</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($uploads as $upload)
                        <tr>
                            <td class=" py-3 bg-green-100 px-3 text-center capitalize">{{ $upload->full_name }}</td>
                            <td class=" py-3 bg-white px-3 text-center">{{ $upload->phone_number }}</td>
                            <td class=" py-3 bg-green-100 px-3 text-center">{{ $upload->email_address }}</td>
                            <td class=" py-3 bg-white px-3 text-center">{{ $upload->test_type }}</td>
                            <td class=" py-3 bg-green-100 px-3 text-center capitalize">{{ $upload->gender }}</td>
                            <td class="px-3"><a href="/upload/details/{{ Crypt::encrypt($upload->id) }}" class="px-5 py-2 bg-blue-500 text-white rounded-md">More</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-4 px-8">
                    {{ $uploads->links() }}
            </div>
        </div>
    </main>
@endsection
