@extends('layouts.department.app');
@section('content')
    <main class="w-full overflow-y-scroll h-screen">
        @include('layouts.department.nav');
        <div class="px-4 md:px-8 mt-3">
            <div class="rounded-md shadow-md bg-white p-3 md:p-6">
                <h1 class="text-xl font-bold mb-3 text-green-500">Update Patient Passport</h1>
                <form action="/department/store/update/{{ Crypt::encrypt($patient->id) }}" class="md:w-6/12" enctype="multipart/form-data" method="POST">
                    @csrf
                    <label class="block font-bold text-green-500">Passport</label>
                    <input type="file" name="passport" class="px-4 mt-1 block w-full border-l-4 border-green-500 py-3 shadow-md rounded-md" >
                    <button type="submit" class="mt-4 w-28 text-white bg-green-500 rounded-md shadow-md block py-3">Update</button>
                </form>
            </div>
        </div>
    </main>
@endsection

