@extends('layouts.department.app')

@section('content')
    <main class="w-full h-screen overflow-y-scroll">
            @include('layouts.department.nav')
        <div class="mt-4 px-8">
            <div class="w-full bg-white shadow-md rounded-md p-6">
                <div class="flex justify-end gap-x-5">
                    <a href="/department/edit/item/{{ $item->id }}" class="text-white bg-blue-500 rounded-md px-6 py-3">Edit</a>
                    <a href="/department/assign/item/{{ $item->id }}" class="text-white bg-green-500 rounded-md px-6 py-3">Assign</a>
                    <a href="/department/delete/item/{{ $item->id }}" class="text-white bg-red-500 rounded-md px-6 py-3">Delete</a>
                </div>
                <div class="w-full h-full grid col-span-2 items-center gap-x-4">
                    <h1 class="text-3xl font-bold col-span-2 text-gray-900">{{ $item->name }}</h1>

                    <div class="flex gap-x-2 mt-4">
                        <label class="text-green-500 text-md font-semibold">Item ID: </label>
                        <p class="text-md font-medium">{{ $item->item_id }}</p>
                    </div>
                    <div class="flex gap-x-2 mt-4">
                        <label class="text-green-500 text-md font-semibold">Item Category: </label>
                        <p class="text-md font-medium">{{ $item->item_category }}</p>
                    </div>
                    <div class="flex gap-x-2 mt-2">
                        <label class="text-green-500 text-md font-semibold">Item Category: </label>
                        <p class="text-md font-medium">{{ $item->item_category }}</p>
                    </div>
                    <div class="flex gap-x-2 mt-2">
                        <label class="text-green-500 text-md font-semibold">Item Quantity: </label>
                        <p class="text-md font-medium">{{ $item->quantity }}</p>
                    </div>
                    <div class="flex gap-x-2 mt-2">
                        <label class="text-green-500 text-md font-semibold">Shelf Number: </label>
                        <p class="text-md font-medium">{{ $item->shelf_no }}</p>
                    </div>
                    <div class="flex gap-x-2 mt-2">
                        <label class="text-green-500 text-md font-semibold">Serial Number: </label>
                        <p class="text-md font-medium">{{ $item->serial_number }}</p>
                    </div>
                    <div class="flex gap-x-2 mt-2">
                        <label class="text-green-500 text-md font-semibold">Date brought in: </label>
                        <p class="text-md font-medium">{{ $item->date_brought_in }}</p>
                    </div>
                    <div class="flex gap-x-2 mt-2">
                        <label class="text-green-500 text-md font-semibold">Delivery Agency/Personnel: </label>
                        <p class="text-md font-medium">{{ $item->delivered_by }}</p>
                    </div>
                    <div class="flex gap-x-2 mt-2">
                        <label class="text-green-500 text-md font-semibold">Delivery Agency/Personnel Number: </label>
                        <p class="text-md font-medium">{{ $item->deliverer_number }}</p>
                    </div>
                </div>

                <div class="border-t-4 mt-2 py-4">
                    <h1 class="text-2xl font-bold text-green-500">Assignment History</h1>
                    @if ($history_count == 0)
                    <p class="text-center font-medium text-lg italic text-green-500">No Assignment History</p>
                @else
                @foreach ($history as $histori)
                <div class="border-b-4 py-2">
                    <h1 class="text-xl font-bold text-green-300">{{ $histori->assigned_to }}</h1>
                    <p>{{ $histori->number_of_item }} Quantity was recieved by {{ $histori->issue_to }} on {{ date('d-m-Y',strtotime($histori->created_at)) }}</p>
                </div>
                @endforeach
                @endif

                </div>
            </div>
        </div>
    </main>
@endsection
