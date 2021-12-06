@extends('layouts.hospital.app')
@section('content')
    <main class="w-full overflow-y-scroll h-screen pb-67">
        <div>
            <div class="w-full bg-green-600 flex gap-x-3 py-4 px-6 items-center justify-center">
                <img src="" class="w-12 h-12" alt="">
                <h1 class="font-bold text-white text-2xl">Hospital name</h1>
            </div>
        </div>
        <div class="h-screen">
            <form action="/existing/store/{{ $patient->id }}" class=" w-8/12 mb-6 grid grid-cols-2 mx-auto gap-x-5 px-8 py-5 rounded-md items-center shadow-md mt-8 bg-white" method="post" enctype="multipart/form-data">
                @csrf
                <h1 class="col-span-2 text-2xl font-semibold text-green-600 mb-3">Patient in bed</h1>
                <div class="my-2">
                    <label class="font-semibold text-md block mb-1">Surname</label>
                    <input type="text" readonly value="{{ $patient->surname }}" name="surname" placeholder="Enter Patient's Surname" class="capitalize border-l-4 border-green-500 w-full rounded-md p-3 shadow-md outline-none block">
                    @error('surname')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="my-2">
                    <label class="font-semibold text-md block mb-1">Other names</label>
                    <input type="text"readonly value="{{ $patient->othernames }}" name="othernames" class="capitalize border-l-4 border-green-500 w-full rounded-md p-3 shadow-md outline-none block"  placeholder="Enter Patient's Other Names">
                    @error('othernames')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="my-2">
                    <label class="font-semibold text-md block mb-1">Phone Number</label>
                    <input type="text" readonly value="{{ $patient->phone_number }}" name="phone_number" class="capitalize border-l-4 border-green-500 w-full rounded-md p-3 shadow-md outline-none block"  placeholder="Enter Patient's Phone Number">
                    @error('phone_mumber')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label>Patient Status</label>
                    <select name="status" id="" class="border-l-4 border-green-500 w-full rounded-md p-3 shadow-md outline-none block">
                        <option readonly selected>--Select Patient's Status--</option>
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
                    <select name="gender" readonly id="" class="border-l-4 border-green-500 w-full rounded-md p-3 shadow-md outline-none block">
                            <option value="{{ $patient->gender }}">{{ $patient->gender }}</option>
                    </select>
                    @error('gender')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="my-2">
                    <label class="font-semibold text-md block mb-1">Date Checked in</label>
                    <input type="date" value="{{ old('checked_in_date') }}" name="checked_in_date" class="border-l-4 border-green-500 w-full rounded-md p-3 shadow-md outline-none block"  placeholder="Enter Patient's Phone Number">
                    @error('checked_in_date')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="my-2">
                    <label class="font-semibold text-md block mb-1">Time Checked in</label>
                    <input type="time" value="{{ old('checked_in_time') }}" name="checked_in_time" class="border-l-4 border-green-500 w-full rounded-md p-3 shadow-md outline-none block"  placeholder="Enter Patient's Phone Number">
                    @error('checked_in_time')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="my-2">
                    <label class="font-semibold text-md block mb-1">Bed Number</label>
                    <select name="bed_number" class="border-l-4 border-green-500 w-full rounded-md p-3 shadow-md outline-none block" id="">
                        <option readonly selected>--Select Bed Number--</option>
                        @for ($i = 1; $i <= 50; $i++)
                    @if (!in_array($i, $actives))
                       <option value="{{ $i }}">{{ $i }}</option>
                    @endif
                @endfor
                    </select>
                    @error('bed_number')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="my-2">
                    <label class="font-semibold text-md block mb-1">Ward</label>
                    <input type="text" value="{{ old('ward') }}" name="ward" class="capitalize border-l-4 border-green-500 w-full rounded-md p-3 shadow-md outline-none block"  placeholder="Ward name here">
                    @error('ward')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="my-2">
                    <label class="font-semibold text-md block mb-1">Next of Kin Name</label>
                    <input type="text" readonly value="{{ $patient->next_of_kin }}" name="next_of_kin" class="capitalize border-l-4 border-green-500 w-full rounded-md p-3 shadow-md outline-none block"  placeholder="Next of Kin Name Here">
                    @error('next_of_kin')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="my-2">
                    <label class="font-semibold text-md block mb-1">Next of Kin Phone Number</label>
                    <input type="text" readonly value="{{ $patient->next_of_kin_number1 }}" name="next_of_kin_number" class="border-l-4 border-green-500 w-full rounded-md p-3 shadow-md outline-none block"  placeholder="Next of Kin Phone Number Here">
                    @error('next_of_kin_number')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="my-2">
                    <label class="font-semibold text-md block mb-1">Last Checked By</label>
                    <input type="text" name="doctor_name" value="{{ old('doctor_name') }}" class="capitalize border-l-4 border-green-500 w-full rounded-md p-3 shadow-md outline-none block"  placeholder="Doctor's Name">
                    @error('doctor_name')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
                </div>
                <button type="submit" class="w-32 py-3 block mx-auto text-center text-white bg-green-600 rounded-md mt-2 shadow-md col-span-2">Register</button>
            </form>
        </div>
    </main>
@endsection
