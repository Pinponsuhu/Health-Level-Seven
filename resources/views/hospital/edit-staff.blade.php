@extends('layouts.hospital.app')
@section('content')
<main class="w-full overflow-y-scroll h-screen">
    @include('layouts.hospital.nav')
    <form action="/edit/staff/{{ Crypt::encrypt($staff->id) }}" class="w-8/12 mb-6 grid grid-cols-2 mx-auto gap-x-5 px-8 py-5 rounded-md shadow-md mt-8 bg-white" method="post" enctype="multipart/form-data">
        @csrf
        <h1 class="col-span-2 text-2xl font-semibold text-green-600 mb-3">Update Staff Data</h1>
        <div class="my-2">
            <label class="font-semibold text-md block mb-1">Full name</label>
            <input type="text" value="{{ $staff->fullname }}" name="fullname" placeholder="Enter Staff Fullname" class="capitalize border-l-4 border-green-500 w-full rounded-md p-3 shadow-md outline-none block">

            @error('fullname')
                <p class="text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="my-2">
            <label class="font-semibold text-md block mb-1">Date of Birth</label>
            <input type="date" value="{{ $staff->date_of_birth }}" name="date_of_birth" class="border-l-4 border-green-500 w-full rounded-md p-3 shadow-md outline-none block">

            @error('date_of_birth')
                <p class="text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="my-2">
            <label class="font-semibold text-md block mb-1">Gender</label>
            <select name="gender" id="" class="border-l-4 border-green-500 w-full rounded-md p-3 shadow-md outline-none block">
                <option value="{{ $staff->gender }}">{{$staff->gender}}</option>
                @foreach ($gender as $gen)
                    @if ($staff->gender != $gen)
                    <option value="{{ $gen }}">{{$gen}}</option>
                    @endif
                @endforeach
            </select>

            @error('gender')
                <p class="text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="my-2">
            <label class="font-semibold text-md block mb-1">Phone Number</label>
            <input type="text" value="{{ $staff->phone_number }}" name="phone_number" class="border-l-4 border-green-500 w-full rounded-md p-3 shadow-md outline-none block"  placeholder="Enter Staff Phone Number">

            @error('phone_number')
                <p class="text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="my-2">
            <label class="font-semibold text-md block mb-1">Email Address</label>
            <input type="email" value="{{ $staff->email_address }}" name="email_address" class="border-l-4 border-green-500 w-full rounded-md p-3 shadow-md outline-none block"  placeholder="Enter Staff Email Address">

            @error('email_address')
                <p class="text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="my-2">
            <label class="font-semibold text-md block mb-1">State of Origin</label>
            <select name="state_of_origin" class="border-l-4 border-green-500 w-full rounded-md p-3 shadow-md outline-none block">
                <option value="{{ $staff->state_of_origin }}" selected>{{ $staff->state_of_origin }}</option>
                @foreach ($states as $state)
                    @if ($staff->state_of_origin != $state)
                    <option value="{{ $state }}">{{ $state }}</option>
                    @endif
                @endforeach
            </select>

            @error('state_of_origin')
                <p class="text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="my-2">
            <label class="font-semibold text-md block mb-1">Department</label>
            <input type="text" value="{{ $staff->department }}" name="department" class="border-l-4 border-green-500 w-full rounded-md p-3 shadow-md outline-none block"  placeholder="Enter Staff Department">

            @error('department')
                <p class="text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="col-span-2">
            <label class="font-semibold text-md block mb-1">Residential Address</label>
            <textarea name="resident_address" class="outline-none border-l-4 p-4 border-green-500 block mt-3 w-full rounded-md resize-none shadow-md" id="" cols="30" rows="4"  placeholder="Enter Staff Address">{{ $staff->house_address }} </textarea>
            @error('resident_address')
                <p class="text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>
       <div class="col-span-2 my-2 grid grid-cols-2 gap-x-3">
           <h1 class="font-bold text-green-600 text-xl col-span-2">Next of Kin Details</h1>
        <div class="my-2">
            <label class="font-semibold text-md block mb-1">Name</label>
            <input type="text" value="{{ $staff->next_of_kin }}" name="next_of_kin" class="border-l-4 border-green-500 w-full rounded-md p-3 shadow-md outline-none block"  placeholder="Enter Next of kin Fullname">

            @error('next_of_kin')
                <p class="text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="my-2">
            <label class="font-semibold text-md block mb-1">Phone Number</label>
            <input type="text" value="{{ $staff->phone_number }}" name="next_of_kin_number" class="border-l-4 border-green-500 w-full rounded-md p-3 shadow-md outline-none block"  placeholder="Enter Next of kin Number">

            @error('next_of_kin_number')
                <p class="text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>
       </div>
        <button type="submit" class="w-32 py-3 block mx-auto text-center text-white bg-green-600 rounded-md mt-2 shadow-md col-span-2">Register</button>
    </form>
</main>
@endsection
