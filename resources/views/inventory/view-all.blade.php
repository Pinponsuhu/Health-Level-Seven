@extends('layouts.hospital.app')

@section('content')
<main class="w-full h-screen  overflow-y-scroll">
    @include('layouts.hospital.nav')
    <div class="mt-4 px-4 md:px-8">
        <div class="p-6 bg-white rounded-md shadow-md">
            <h1 class="font-bold text-2xl text-green-500 text-center mb-4">All Items In Stock</h1>
        <div class="px-3 md:px-6 overflow-x-scroll">
            <form action="/search/items" class="md:w-8/12 mx-auto grid capitalize grid-cols-4 gap-x-3 items-center my-3" method="get">
                @csrf
                <input type="search" id="search" name="search" placeholder="Search Here" class="bg-green-500 col-span-3 outline-none rounded-md shadow-md px-3 h-12 py-3 text-white placeholder-green-50 block">
                <button type="submit" class="w-full rounded-md shadow-md bg-green-500 block h-12 text-white"><span class="hidden md:flex justify-center items-center font-bold">Search</span> <i class="fa fa-search text-lg md:hidden"></i></button>
            </form>
            <table class="w-full mt-3">
                <thead>
                    <tr class="text-white">
                        <td class="bg-green-500 py-3 text-center border-r-4 border-green-200">Item ID</td>
                        <td class="bg-green-500 py-3 text-center border-r-4 border-green-200">Item Name</td>
                        <td class="bg-green-500 py-3 text-center border-r-4 border-green-200">Category</td>
                        <td class="bg-green-500 py-3 text-center border-r-4 border-green-200">Shelf</td>
                        <td class="bg-green-500 py-3 text-center border-r-4 border-green-200">Total Quantity</td>
                        <td class="bg-green-500 py-3 text-center border-r-4 border-green-200">Serial Number</td>
                        <td class="bg-green-500 py-3 text-center border-r-4 border-green-200">Condition</td>
                        <td class="bg-green-500 py-3 text-center border-r-4 border-green-200">Expiry Date</td>
                    </tr>
                </thead>
                @foreach ($items as $item)
                <tr>
                    <td class=" py-3 bg-green-100 px-3 text-center capitalize italic underline"><a href="/item/details/{{ Crypt::encrypt($item->id) }}">{{ $item->item_id}}</a></td>
                    <td class=" py-3 bg-white px-3 text-center">{{ $item->name }}</td>
                    <td class=" py-3 bg-green-100 px-3 text-center">{{ $item->item_category }}</td>
                    <td class=" py-3 bg-white px-3 text-center">{{ $item->shelf_no }}</td>
                    <td class=" py-3 bg-green-100 px-3 text-center capitalize">{{ $item->quantity }}</td>
                    <td class=" py-3 bg-white px-3 text-center">{{ $item->serial_number}}</td>
                    <td class=" py-3 bg-white px-3 text-center capitalize">{{ $item->item_condition }}</td>
                    <td class=" py-3 bg-green-100 px-3 text-center capitalize">{{ date('d-m-Y',strtotime($item->expiry_date)) }}</td>
                </tr>
                @endforeach
            </table>
        </div>
        <div>
            {{ $items->links() }}
        </div>
    </div>
    </div>
</main>
@endsection
