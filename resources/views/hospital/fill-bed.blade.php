@extends('layouts.hospital.app')
@section('content')
    <main class="w-full overflow-y-scroll h-screen pb-6">
        <div>
            <div class="w-full bg-green-600 flex gap-x-3 py-4 px-6 items-center justify-center">
                <img src="" class="w-12 h-12" alt="">
                <h1 class="font-bold text-white text-2xl">Hospital name</h1>
            </div>
        </div>
        <div class="h-screen">
            <form action="/bed/space" class=" w-8/12 mb-6 grid grid-cols-2 mx-auto gap-x-5 px-8 py-5 rounded-md shadow-md mt-8 bg-white" method="post" enctype="multipart/form-data">
                @csrf
                <h1 class="col-span-2 text-2xl font-semibold text-green-600 mb-3">Patient in bed</h1>
                <div class="my-2">
                    <label class="font-semibold text-md block mb-1">Surname</label>
                    <input type="text" name="surname" placeholder="Enter Patient's Surname" class="capitalize border-l-4 border-green-500 w-full rounded-md p-3 shadow-md outline-none block">
                    @error('surname')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="my-2">
                    <label class="font-semibold text-md block mb-1">Other names</label>
                    <input type="text" name="othernames" class="capitalize border-l-4 border-green-500 w-full rounded-md p-3 shadow-md outline-none block"  placeholder="Enter Patient's Other Names">
                    @error('othernames')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label>Patient Status</label>
                    <select name="status" id="" class="border-l-4 border-green-500 w-full rounded-md p-3 shadow-md outline-none block">
                        <option disabled selected>--Select Patient's Status--</option>
                        <option value="Undetermined">Undetermined</option>
                        <option value="Good">Good</option>
                        <option value="Fair">Fair</option>
                        <option value="Serious">Serious</option>
                        <option value="Critical">Critical</option>
                        <option value="Released">Released</option>
                        <option value="Deceased">Deceased</option>
                    </select>
                    @error('status')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="my-2">
                    <label class="font-semibold text-md block mb-1">Gender</label>
                    <select name="gender" id="" class="border-l-4 border-green-500 w-full rounded-md p-3 shadow-md outline-none block">
                        <option disabled selected>--Select Gender--</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                    @error('gender')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="my-2">
                    <label class="font-semibold text-md block mb-1">Phone Number of Next of Kin</label>
                    <input type="text" name="phone_number" class="border-l-4 border-green-500 w-full rounded-md p-3 shadow-md outline-none block"  placeholder="Enter Patient's Phone Number">
                    @error('phone_number')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="my-2">
                    <label class="font-semibold text-md block mb-1">Date Checked in</label>
                    <input type="date" name="checked_in_date" class="border-l-4 border-green-500 w-full rounded-md p-3 shadow-md outline-none block"  placeholder="Enter Patient's Phone Number">
                    @error('checked_in_date')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="my-2">
                    <label class="font-semibold text-md block mb-1">Time Checked in</label>
                    <input type="time" name="checked_in_time" class="border-l-4 border-green-500 w-full rounded-md p-3 shadow-md outline-none block"  placeholder="Enter Patient's Phone Number">
                    @error('checked_in_time')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="my-2">
                    <label class="font-semibold text-md block mb-1">Bed Number</label>
                    <input type="text" name="bed_number" class="border-l-4 border-green-500 w-full rounded-md p-3 shadow-md outline-none block"  placeholder="Bed Number">
                    @error('bed_number')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="my-2">
                    <label class="font-semibold text-md block mb-1">Ward</label>
                    <input type="text" name="ward" class="border-l-4 border-green-500 w-full rounded-md p-3 shadow-md outline-none block"  placeholder="Ward name here">
                    @error('ward')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="my-2">
                    <label class="font-semibold text-md block mb-1">Next of Kin Name</label>
                    <input type="text" name="next_of_kin" class="border-l-4 border-green-500 w-full rounded-md p-3 shadow-md outline-none block"  placeholder="Next of Kin Name Here">
                    @error('next_of_kin')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="my-2">
                    <label class="font-semibold text-md block mb-1">Next of Kin Phone Number</label>
                    <input type="text" name="next_of_kin_number" class="border-l-4 border-green-500 w-full rounded-md p-3 shadow-md outline-none block"  placeholder="Next of Kin Phone Number Here">
                    @error('next_of_kin_number')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="my-2">
                    <label class="font-semibold text-md block mb-1">Last Checked By</label>
                    <input type="text" name="doctor_name" class="border-l-4 border-green-500 w-full rounded-md p-3 shadow-md outline-none block"  placeholder="Doctor's Name">
                    @error('doctor_name')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
                </div>
                <button type="submit" class="w-32 py-3 block mx-auto text-center text-white bg-green-600 rounded-md mt-2 shadow-md col-span-2">Register</button>
            </form>
        </div>
    </main>
@endsection
