@extends('layouts.department.app')
@section('content')
    <main class="w-full">
            @include('layouts.department.nav')
        <div class="px-8 mt-3">
           <div class="bg-white p-6 rounded-md w-full shadow-md">
            <div class="flex justify-between items-center">
                <h1 class="font-bold text-2xl text-green-600 my-5">Telephone Consultancy Appointments</h1>
                <div class="flex items-center gap-x-3">
                    <a href="/department/telephone/appointments/{{ Crypt::encrypt('Cancelled') }}" class="py-2 px-4 rounded-md text-white bg-yellow-400">Cancelled</a>
                    <a href="/department/telephone/appointments/{{ Crypt::encrypt('Active') }}" class="py-2 px-4 rounded-md text-white bg-green-400">Active</a>
                    <a href="/department/telephone/appointments/{{ Crypt::encrypt('Missed') }}" class="py-2 px-4 rounded-md text-white bg-red-400">Missed</a>
                </div>
            </div>
            <p class="text-center text-green-500 font-medium my-2 text-xl">Status: {{ $statuss }}</p>
            <table class="w-full shadow-md display" id="basic-1">
                <thead>
                    <tr class="text-green-50 font-medium text-md">
                        <td class="w-1/5 py-3 border-r-4 border-green-200 bg-green-500 px-3 text-center">Name</td>
                        <td class="w-1/5 py-3 border-r-4 border-green-200 bg-green-500 px-3 text-center">Date</td>
                        <td class="w-1/5 py-3 border-r-4 border-green-200 bg-green-500 px-3 text-center">Status</td>
                        <td class="w-1/5 py-3 border-r-4 border-green-200 bg-green-500 px-3 text-center">Type</td>
                        <td class="w-1/5 py-3 bg-green-500 px-3 text-center">Phone number</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($appointments as $appointment)
                    <tr class="text-green-500 font-medium text-md">
                        <td class="w-1/5 py-3 bg-green-100 px-3 text-center">{{ $appointment->surname . ' ' . $appointment->othernames }}</td>
                        <td class="w-1/5 py-3 bg-gray-100 px-3 text-center">{{ $appointment->preferred_date }}</td>
                        <td class="w-1/5 py-3 bg-green-100 px-3 text-center"><form action="/update/appointment/{{ Crypt::encrypt($appointment->id) }}" method="post">
                            @csrf
                        <select name="status" onchange="this.form.submit()" class="py-3 w-full" id="status">
                        <option value="{{ $appointment->status }}">{{ $appointment->status }}</option>
                        @foreach ($status as $stat)
                            @if ($stat != $appointment->status)
                            <option value="{{ $stat }}">{{ $stat }}</option>
                            @endif
                        @endforeach
                        </select>
                            </form></td>
                        <td class="w-1/5 py-3 bg-gray-100 px-3 text-center">{{ $appointment->appointment_type }}</td>
                        <td class="w-1/5 py-3 bg-green-100 px-3 text-center">{{ $appointment->phone_number }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="px-6 mt-4">
                {{ $appointments->links() }}
            </div>
           </div>
    </div>
    </main>
@endsection
<script>
    $(document).ready( function () {
    $('#basic-1').DataTable();
} );
</script>
