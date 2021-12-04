@extends('layouts.hospital.app')
@section('content')
    <main class="w-full">
        <div>
            <div class="w-full bg-green-600 flex gap-x-3 py-4 px-6 items-center justify-center">
                <img src="" class="w-12 h-12" alt="">
                <h1 class="font-bold text-white text-2xl">Hospital name</h1>
            </div>
        </div>
        <div class="px-8 mt-10">
            <h1 class="text-center font-bold text-2xl text-green-600 my-5">Telephone Consultancy Appointments</h1>
        <table class="w-full shadow-md display" id="basic-1">
            <thead>
                <tr class="text-green-500 border-b-2 border-gray-300 font-medium text-md">
                    <td class="w-1/5 py-2 bg-green-100 px-3 text-center">Name</td>
                    <td class="w-1/5 py-2 bg-gray-100 px-3 text-center">Date</td>
                    <td class="w-1/5 py-2 bg-green-100 px-3 text-center">Status</td>
                    <td class="w-1/5 py-2 bg-gray-100 px-3 text-center">Type</td>
                    <td class="w-1/5 py-2 bg-green-100 px-3 text-center">Phone number</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($appointments as $appointment)
                <tr class="text-green-500 font-medium text-md">
                    <td class="w-1/5 py-2 bg-green-100 px-3 text-center">{{ $appointment->surname . ' ' . $appointment->othernames }}</td>
                    <td class="w-1/5 py-2 bg-gray-100 px-3 text-center">{{ $appointment->preferred_date }}</td>
                    <td class="w-1/5 py-2 bg-green-100 px-3 text-center">{{ $appointment->status }}</td>
                    <td class="w-1/5 py-2 bg-gray-100 px-3 text-center">{{ $appointment->appointment_type }}</td>
                    <td class="w-1/5 py-2 bg-green-100 px-3 text-center">{{ $appointment->phone_number }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </main>
@endsection
<script>
    $(document).ready( function () {
    $('#basic-1').DataTable();
} );
</script>
