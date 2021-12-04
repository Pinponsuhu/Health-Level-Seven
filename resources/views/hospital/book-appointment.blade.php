@extends('layouts.hospital.app')
@section('content')
<main class="w-full">
    <div class="w-full bg-green-600 flex gap-x-3 py-4 px-6 items-center justify-center">
        <img src="" class="w-12 h-12" alt="">
        <h1 class="font-bold text-white text-2xl">Hospital name</h1>
    </div>
    <form action="{{ route('store_bookings') }}" class="w-8/12 mb-6 grid grid-cols-2 mx-auto gap-x-5 px-8 py-5 rounded-md shadow-md mt-8 bg-white" method="post" enctype="multipart/form-data">
        @csrf
        <h1 class="col-span-2 text-2xl font-semibold text-green-600 mb-3">Book an Appointment</h1>
        <div class="my-2">
            <label class="font-semibold text-md block mb-1">Surname</label>
            <input type="text" name="surname" placeholder="Enter Patient's Surname" class="capitalize border-l-4 border-green-500 w-full rounded-md p-3 shadow-md outline-none block">
        </div>
        <div class="my-2">
            <label class="font-semibold text-md block mb-1">Other names</label>
            <input type="text" name="othernames" class="capitalize border-l-4 border-green-500 w-full rounded-md p-3 shadow-md outline-none block"  placeholder="Enter Patient's Lastname">
        </div>
        <div class="my-2">
            <label class="font-semibold text-md block mb-1">Gender</label>
            <select name="gender" id="" class="border-l-4 border-green-500 w-full rounded-md p-3 shadow-md outline-none block">
                <option disabled selected>--Select Gender--</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
        </div>
        <div class="my-2">
            <label class="font-semibold text-md block mb-1">Appointment type</label>
            <select name="appointment_type" id="" class="border-l-4 border-green-500 w-full rounded-md p-3 shadow-md outline-none block">
                <option disabled selected>--Select appointment type--</option>
                <option value="Pre-booked">Pre-booked</option>
                <option value="Telephone Consultancy">Telephone Consultancy</option>
            </select>
        </div>
        <div class="my-2">
            <label class="font-semibold text-md block mb-1">Phone Number</label>
            <input type="text" name="phone_number" class="border-l-4 border-green-500 w-full rounded-md p-3 shadow-md outline-none block"  placeholder="Enter Patient's Phone Number">
        </div>
        <div class="my-2">
            <label class="font-semibold text-md block mb-1">Email Address</label>
            <input type="email" name="email_address" class="border-l-4 border-green-500 w-full rounded-md p-3 shadow-md outline-none block"  placeholder="Enter Patient's Email Address">
        </div>

        <div class="my-2">
            <label class="font-semibold text-md block mb-1">Date preferred</label>
            <input type="date" name="preferred_date" class="border-l-4 border-green-500 w-full rounded-md p-3 shadow-md outline-none block">
        </div>
        <div class="my-2">
            <label class="font-semibold text-md block mb-1">Type of Doctor</label>
            <select name="doctor_type" id="" class="border-l-4 border-green-500 w-full rounded-md p-3 shadow-md outline-none block">
                <option disabled selected>--Select Doctor Specialty--</option>
                <option value="Dentist">Dentist</option>
                <option value="Clinical Doctor">Clinical Doctor</option>
                <option value="Optician">Optician</option>
            </select>
        </div>
        <button type="submit" class="w-48 py-3 block mx-auto text-center text-white bg-green-600 rounded-md mt-2 shadow-md col-span-2">Book Appointment</button>
    </form>
</main>
@endsection
