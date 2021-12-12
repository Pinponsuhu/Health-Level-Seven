@extends('layouts.hospital.app')
@section('content')
    <main class="w-full h-screen overflow-y-scroll">
            @include('layouts.hospital.nav')
        <div class="mt-4 px-8">
            <div class="bg-white rounded-md  p-6  shadow-md">
                <h1 class="font-bold text-2xl text-green-500  mb-4 col-span-2">Assignment Form</h1>
                <form action="/store/assign" class="gap-x-5 gap-y-2 grid grid-cols-2" method="POST">
                    @csrf
                    <div class="my-2">
                        <label class="font-semibold text-md block mb-1">Item ID:</label>
                        <input type="text" readonly value="{{ $item->id }}" name="item_id_no" placeholder="Enter Item Name" class="capitalize border-l-4 border-green-500 w-full rounded-md p-3 shadow-md outline-none block">
                        @error('item_id_no')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="my-2">
                        <label class="font-semibold text-md block mb-1">Department/Personnel</label>
                        <input type="text" value="{{ old('assigned_to') }}" name="assigned_to" class="capitalize border-l-4 border-green-500 w-full rounded-md p-3 shadow-md outline-none block"  placeholder="Patient/Personnel Name">
                        @error('assigned_to')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="my-2">
                        <label class="font-semibold text-md block mb-1">Number of Assigned Items</label>
                        <select name="number_of_item" class="capitalize border-l-4 border-green-500 w-full rounded-md p-3 shadow-md outline-none block" id="">
                            <option value="" disabled selected>--Select Quantity --</option>
                            @for ($i = 1; $i<= $item->quantity; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                        @error('number_of_item')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="my-2">
                        <label class="font-semibold text-md block mb-1">Issued By:</label>
                        <input type="text" value="{{ old('issued_by') }}" name="issued_by" class="capitalize border-l-4 border-green-500 w-full rounded-md p-3 shadow-md outline-none block"  placeholder="Inventory Personnel">
                        @error('issued_by')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="my-2">
                        <label class="font-semibold text-md block mb-1">Issued To:</label>
                        <input type="text" value="{{ old('issued_to') }}" name="issued_to" class="capitalize border-l-4 border-green-500 w-full rounded-md p-3 shadow-md outline-none block"  placeholder="Recieved By">
                        @error('issued_to')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="col-span-2 bg-green-500 text-white w-28 py-3 text-center mx-auto mt-3 rounded-md">Assign</button>
                </form>
            </div>
        </div>
    </main>
@endsection
