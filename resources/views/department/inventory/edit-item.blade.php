@extends('layouts.department.app')
@section('content')
    <main class="w-full h-screen overflow-y-scroll">
            @include('layouts.department.nav')
        <form action="/department/store/edit/item/{{ Crypt::encrypt($item->id) }}" class=" w-8/12 mb-6 grid grid-cols-2 mx-auto gap-x-5 px-8 py-5 rounded-md shadow-md mt-8 bg-white" method="post" enctype="multipart/form-data">
            @csrf
            <h1 class="col-span-2 text-2xl font-semibold text-green-600 mb-3">Add Item to Inventory</h1>
            <div class="my-2">
                <label class="font-semibold text-md block mb-1">Name</label>
                <input type="text" value="{{ $item->name }}" name="name" placeholder="Enter Item Name" class="capitalize border-l-4 border-green-500 w-full rounded-md p-3 shadow-md outline-none block">
                @error('name')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="my-2">
                <label class="font-semibold text-md block mb-1">Quantity</label>
                <input type="text" value="{{ $item->quantity }}" name="quantity" class="capitalize border-l-4 border-green-500 w-full rounded-md p-3 shadow-md outline-none block"  placeholder="Enter Item Quantity">
                @error('quantity')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="my-2">
                <label class="font-semibold text-md block mb-1">Shelf Number</label>
                <select name="shelf_number" class="border-l-4 border-green-500 w-full rounded-md p-3 shadow-md outline-none block" id="">
                    <option value="{{ $item->shelf_no }}" selected>{{$item->shelf_no}}</option>
                    @for ($i = 1;$i <= $no; $i++)
                   @if ($i != $item->shelf_no)
                   <option value="{{ $i }}">{{ $i }}</option>
                   @endif
                    @endfor
                </select>
                @error('shelf_number')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="my-2">
                <label class="font-semibold text-md block mb-1">Serial Number</label>
                <input type="text" value="{{ $item->serial_number }}" name="serial_number" class="capitalize border-l-4 border-green-500 w-full rounded-md p-3 shadow-md outline-none block"  placeholder="Enter Item Serial Number">
                @error('serial_number')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="my-2">
                <label class="font-semibold text-md block mb-1">Item Category</label>
                <select name="item_category" id="" class="border-l-4 border-green-500 w-full rounded-md p-3 shadow-md outline-none block">
                    <option value="{{ $item->item_category }}" selected>{{ $item->item_category }}</option>
                    @foreach ($category as $cat)
                        @if ($cat != $item->item_category)
                        <option value="{{ $cat }}">{{ $cat }}</option>
                        @endif
                    @endforeach
                </select>
                @error('item_category')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="my-2">
                <label class="font-semibold text-md block mb-1">Date Brought in</label>
                <input type="date" value="{{ $item->date_brought_in }}" name="date_brought_in" class="border-l-4 border-green-500 w-full rounded-md p-3 shadow-md outline-none block"  placeholder="Enter Patient's Phone Number">
                @error('date_brought_in')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="my-2">
                <label class="font-semibold text-md block mb-1">Delivered By</label>
                <input type="text" value="{{ $item->delivered_by }}" name="delivered_by" class="border-l-4 border-green-500 w-full rounded-md p-3 shadow-md outline-none block"  placeholder="Enter Deliverer Name">
                @error('delivered_by')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="my-2">
                <label class="font-semibold text-md block mb-1">Deliverer Number</label>
                <input type="text" value="{{ $item->deliverer_number }}" name="deliverer_number" class="border-l-4 border-green-500 w-full rounded-md p-3 shadow-md outline-none block"  placeholder="Enter Deliverer Name">
                @error('deliverer_number')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="w-32 py-3 block mx-auto text-center text-white bg-green-600 rounded-md mt-2 shadow-md col-span-2">Register</button>
        </form>
    </main>
@endsection
