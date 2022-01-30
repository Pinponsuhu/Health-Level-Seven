@extends('layouts.hospital.app')
@section('content')
<main class="w-full overflow-y-scroll h-screen">
        @include('layouts.hospital.nav')
        <div class="px-4 md:px-8">
            <div class="p-3 md:p-6 mt-3 bg-white rounded-md shadow-md">
            <h1 class="text-xl font-bold text-center text-green-500 my-4">All Registered Departments</h1>
        <div class="w-full overflow-x-scroll">
            <table class="w-full mx-auto bg-white shadow-md rounded-md mt-2">
                <thead>
                    <tr class="font-medium text-white text-md border-b-2 border-green-600">
                        <td  class=" py-3 bg-green-500 px-3 text-center border-r-4 border-green-100">Department Name</td>
                        <td class="py-3 bg-green-500 px-3 text-center border-r-4 border-green-100">Radiology Access</td>
                        <td class=" py-3 bg-green-500 px-3 text-center border-r-4 border-green-100">Bed Access</td>
                        <td class=" py-3 bg-green-500 px-3 text-center border-r-4 border-green-100">Appointment Access</td>
                        <td class="py-3 bg-green-500 px-3 text-center border-r-4 border-green-100">Patient Access</td>
                        <td class="py-3 bg-green-500 px-3 text-center border-r-4 border-green-100">Inventory Access</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($departments as $department)
                        <tr>
                            <td class=" py-3 bg-green-100 px-3 text-center capitalize"><a href="/department/details/{{ Crypt::encrypt($department->id) }}" class="italic underline">{{ $department->name }}</a></td>
                            <td class=" py-3 bg-white px-3 text-center">@if ($department->radiology_permission == 'on')
                                Yes
                            @else
                                No
                            @endif </td>
                            <td class=" py-3 bg-green-100 px-3 text-center">@if ($department->bed_permission)
                                Yes
                            @else
                                No
                            @endif</td>
                            <td class=" py-3 bg-white px-3 text-center">@if ($department->appointment_permission)
                                Yes
                            @else
                                No
                            @endif</td>
                            <td class=" py-3 bg-green-100 px-3 text-center ">@if ($department->patient_permission)
                                Yes
                            @else
                                No
                            @endif</td>
                            <td class=" py-3 bg-white px-3 text-center">@if ($department->inventory_permission)
                                Yes
                            @else
                                No
                            @endif</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-3">
            {{ $departments->links() }}
        </div>
            </div>
        </div>
</main>
@endsection
