@extends('layouts.hospital.app')
@section('content')
<main class="w-full overflow-y-scroll h-screen">
    @include('layouts.hospital.nav')
    <form action="{{ route('store_patient') }}" class="w-11/12 md:w-8/12 mb-6 grid md:grid-cols-2 mx-auto gap-x-5 px-8 py-5 rounded-md shadow-md mt-8 bg-white" method="post" enctype="multipart/form-data">
        @csrf
        <h1 class="md:col-span-2 text-xl md:text-2xl font-semibold text-green-600 mb-3">Register New Patient</h1>

        <div class="my-2">
            <label class="font-semibold text-md block mb-1">Passport Photograph</label>
            <input type="file" class="border-l-4 border-green-500 w-full rounded-md p-3 shadow-md outline-none block" name="passport">

            @error('passport')
                <p class="text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="my-2">
            <label class="font-semibold text-md block mb-1">Surname</label>
            <input type="text" value="{{ old('surname') }}" name="surname" placeholder="Enter Patient's Surname" class="capitalize border-l-4 border-green-500 w-full rounded-md p-3 shadow-md outline-none block">

            @error('surname')
                <p class="text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="my-2">
            <label class="font-semibold text-md block mb-1">Other names</label>
            <input type="text" value="{{ old('othernames') }}" name="othernames" class="capitalize border-l-4 border-green-500 w-full rounded-md p-3 shadow-md outline-none block"  placeholder="Enter Patient's Lastname">

            @error('othername')
                <p class="text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="my-2">
            <label class="font-semibold text-md block mb-1">Date of Birth</label>
            <input type="date" value="{{ old('date_of_birth') }}" name="date_of_birth" class="border-l-4 border-green-500 w-full rounded-md p-3 shadow-md outline-none block">

            @error('date_of_birth')
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
            <label class="font-semibold text-md block mb-1">Phone Number</label>
            <input type="text" value="{{ old('phone_number') }}" name="phone_number" class="border-l-4 border-green-500 w-full rounded-md p-3 shadow-md outline-none block"  placeholder="Enter Patient's Phone Number">

            @error('phone_number')
                <p class="text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="my-2">
            <label class="font-semibold text-md block mb-1">Email Address</label>
            <input type="email" value="{{ old('email_address') }}" name="email_address" class="border-l-4 border-green-500 w-full rounded-md p-3 shadow-md outline-none block"  placeholder="Enter Patient's Email Address">

            @error('email_address')
                <p class="text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="my-2">
            <label class="font-semibold text-md block mb-1">State of Origin</label>
            <select name="state_of_origin" class="border-l-4 border-green-500 w-full rounded-md p-3 shadow-md outline-none block">
                <option disabled selected>--Select State--</option>
                <option value="Abia">Abia</option>
                <option value="Adamawa">Adamawa</option>
                <option value="Akwa Ibom">Akwa Ibom</option>
                <option value="Anambra">Anambra</option>
                <option value="Bauchi">Bauchi</option>
                <option value="Bayelsa">Bayelsa</option>
                <option value="Benue">Benue</option>
                <option value="Borno">Borno</option>
                <option value="Cross Rive">Cross River</option>
                <option value="Delta">Delta</option>
                <option value="Ebonyi">Ebonyi</option>
                <option value="Edo">Edo</option>
                <option value="Ekiti">Ekiti</option>
                <option value="Enugu">Enugu</option>
                <option value="FCT">Federal Capital Territory</option>
                <option value="Gombe">Gombe</option>
                <option value="Imo">Imo</option>
                <option value="Jigawa">Jigawa</option>
                <option value="Kaduna">Kaduna</option>
                <option value="Kano">Kano</option>
                <option value="Katsina">Katsina</option>
                <option value="Kebbi">Kebbi</option>
                <option value="Kogi">Kogi</option>
                <option value="Kwara">Kwara</option>
                <option value="Lagos">Lagos</option>
                <option value="Nasarawa">Nasarawa</option>
                <option value="Niger">Niger</option>
                <option value="Ogun">Ogun</option>
                <option value="Ondo">Ondo</option>
                <option value="Osun">Osun</option>
                <option value="Oyo">Oyo</option>
                <option value="Plateau">Plateau</option>
                <option value="Rivers">Rivers</option>
                <option value="Sokoto">Sokoto</option>
                <option value="Taraba">Taraba</option>
                <option value="Yobe">Yobe</option>
                <option value="Zamfara">Zamfara</option>
            </select>

            @error('state_of_origin')
                <p class="text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="my-2">
            <label class="font-semibold text-md block mb-1">Occupation</label>
            <input type="text" value="{{ old('occupation') }}" name="occupation" class="border-l-4 border-green-500 w-full rounded-md p-3 shadow-md outline-none block"  placeholder="Enter Patient's Occupation">

            @error('occupation')
                <p class="text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="md:col-span-2">
            <label class="font-semibold text-md block mb-1">Residential Address</label>
            <textarea name="resident_address" class="outline-none border-l-4 p-4 border-green-500 block mt-3 w-full rounded-md resize-none shadow-md" id="" cols="30" rows="4"  placeholder="Enter Patient's Address">{{ old('resident_address') }}</textarea>


            @error('resident_address')
                <p class="text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>
       <div class="md:col-span-2 my-2 grid md:grid-cols-2 gap-x-3">
           <h1 class="font-bold text-green-600 text-xl md:col-span-2">Next of Kin Details</h1>
        <div class="my-2">
            <label class="font-semibold text-md block mb-1">Name</label>
            <input type="text" value="{{ old('next_of_kin') }}" name="next_of_kin" class="border-l-4 border-green-500 w-full rounded-md p-3 shadow-md outline-none block"  placeholder="Enter Full name">

            @error('next_of_kin')
                <p class="text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="my-2">
            <label class="font-semibold text-md block mb-1">Phone Number 1</label>
            <input type="text" value="{{ old('next_of_kin_number1') }}" name="next_of_kin_number1" class="border-l-4 border-green-500 w-full rounded-md p-3 shadow-md outline-none block"  placeholder="Enter Patient's Number">

            @error('next_of_kin_number1')
                <p class="text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="my-2">
            <label class="font-semibold text-md block mb-1">Phone Number 2</label>
            <input type="text" value="{{ old('next_of_kin_number1') }}" name="next_of_kin_number2" class="border-l-4 border-green-500 w-full rounded-md p-3 shadow-md outline-none block"  placeholder="Enter Patient's Number #2">

            @error('next_of_kin_number2')
                <p class="text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>
       </div>
        <button type="submit" class="w-32 py-3 block mx-auto text-center text-white bg-green-600 rounded-md mt-2 shadow-md md:col-span-2">Register</button>
    </form>
</main>
@endsection
