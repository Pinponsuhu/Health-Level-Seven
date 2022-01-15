<div class="mt-3 bg-white py-4 rounded-md w-full shadow-sm px-4">
    <h1 class="text-green-400 text-xl font-medium">{{ $username->hospital_name }}</h1>
    <p class="text-sm mt-0.5 text-gray-400">{{ $username->HID }}</p>
</div>
<div class="w-full h-96 msg-sec mt-4 flex flex-col gap-y-2 bg-white rounded-md overflow-y-scroll p-4">
    @foreach ($messages as $message)
    <div class="flex @if ($message->from == auth()->user()->id)
        justify-end
    @endif">
        <div class="@if ($message->from == auth()->user()->id)
            bg-green-800 @else bg-green-300
        @endif text-white w-56 rounded-md shadow-sm p-4">
            <p class="text-md">{{ $message->content }}</p>
            <span class="text-sm">11:20pm</span>
        </div>
    </div>
    @endforeach
</div>
<div class="flex bg-white rounded-md px-3 mt-5 py-3 items-center send-msg">
    <input type="file" name="" id="">
    <input type="text" id="send-msg" placeholder="Type message here" class="bg-white block w-full outline-none py-3 px-3">
</div>
