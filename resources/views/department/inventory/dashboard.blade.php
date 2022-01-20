@extends('layouts.department.app')
@section('content')
    <main class="w-full h-screen overflow-y-scroll">
            @include('layouts.department.nav')
        <div class="px-6 mt-4">
            <div class="px-4 py-6 bg-white rounded-md shadow-md">
                <div class="flex justify-between items-center mb-4">
                    <h1 class="text-3xl font-bold text-green-500">Inventory Overview</h1>
                    <a href="/department/add/item" class="text-white bg-green-500 py-2 px-5 rounded-md shadow-md">Add new</a>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-y-6 lg:grid-cols-4 gap-x-8">
                    <div class="bg-green-200 h-32 flex justify-between shadow-md gap-x-2 rounded-md py-4 px-5">
                        <div>
                            <h1 class="text-3xl font-extrabold mb-3 text-green-500">{{ $stock_count }}</h1>
                            <p class="text-lg font-medium leading-5 text-gray-500">Total <br> stock</p>
                        </div>
                        <div class="w-12 flex justify-center items-center h-12 rounded-full bg-green-600 ">
                            <i class="fa fa-boxes text-xl text-gray-200"></i>
                        </div>
                    </div>
                    <div class="bg-red-200 h-32 flex justify-between shadow-md gap-x-2 rounded-md py-4 px-5">
                        <div>
                            <h1 class="text-3xl font-extrabold mb-3 text-red-500">{{ $meds }}</h1>
                            <p class="text-lg font-medium leading-5 text-gray-500">Total <br> Medicine</p>
                        </div>
                        <div class="w-12 flex justify-center items-center h-12 rounded-full bg-red-600 ">
                            <i class="fa fa-pills text-xl text-gray-200"></i>
                        </div>
                    </div>
                    <div class="bg-blue-200 h-32 flex justify-between shadow-md gap-x-2 rounded-md py-4 px-5">
                        <div>
                            <h1 class="text-3xl font-extrabold mb-3 text-blue-500">{{ $stationery }}</h1>
                            <p class="text-lg font-medium leading-5 text-gray-500">Total <br> Stationery</p>
                        </div>
                        <div class="w-12 flex justify-center items-center h-12 rounded-full bg-blue-600 ">
                            <i class="fa fa-chair text-xl text-gray-200"></i>
                        </div>
                    </div>
                    <div class="bg-indigo-200 h-32 flex justify-between shadow-md gap-x-2 rounded-md py-4 px-5">
                        <div>
                            <h1 class="text-3xl font-extrabold mb-3 text-indigo-500">{{ $assign_count }}</h1>
                            <p class="text-lg font-medium leading-5 text-gray-500">Total <br> Assigned</p>
                        </div>
                        <div class="w-12 flex justify-center items-center h-12 rounded-full bg-indigo-600 ">
                            <i class="fa fa-dolly text-xl text-gray-200"></i>
                        </div>
                    </div>
                    <div class="bg-yellow-200 h-32 flex justify-between shadow-md gap-x-2 rounded-md py-4 px-5">
                        <div>
                            <h1 class="text-3xl font-extrabold mb-3 text-yellow-500">10</h1>
                            <p class="text-lg font-medium leading-5 text-gray-500">Number of Shelves</p>
                        </div>
                        <div class="w-12 flex justify-center items-center h-12 rounded-full bg-yellow-600 ">
                            <i class="fa fa-box text-xl text-gray-200"></i>
                        </div>
                    </div>
                </div>
                <hr class="border-2 border-green-2 mt-8">
                <div class="flex justify-between mt-4 items-center">
                    <h1 class="text-xl font-bold text-gray-500 ml-6">Goods in stock</h1>

                </div>
                <div class="px-6 overflow-x-scroll">
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
                            <td class=" py-3 bg-green-100 px-3 text-center capitalize italic underline"><a href="/department/item/details/{{ Crypt::encrypt($item->id) }}">{{ $item->item_id}}</a></td>
                            <td class=" py-3 bg-white px-3 text-center">{{ $item->name }}</td>
                            <td class=" py-3 bg-green-100 px-3 text-center">{{ $item->item_category }}</td>
                            <td class=" py-3 bg-white px-3 text-center">{{ $item->shelf_no }}</td>
                            <td class=" py-3 bg-green-100 px-3 text-center capitalize">{{ $item->quantity }}</td>
                            <td class=" py-3 bg-white px-3 text-center">{{ $item->serial_number}}</td>
                            <td class=" py-3 bg-green-100 px-3 text-center capitalize">{{ $item->item_condition }}</td>
                            <td class=" py-3 bg-green-100 px-3 text-center capitalize">{{ date('d-m-Y',strtotime($item->expiry_date)) }}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                <a href="/department/all/items" class="text-lg text-center text-green-500 block font-semibold">View All</a>
                </div>
            </div>
    </main>
@endsection
