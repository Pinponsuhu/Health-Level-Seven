<div class="md:mt-3 bg-white py-4 rounded-md w-full shadow-sm px-4">
    <h1 class="text-green-400 text-xl font-medium">{{ $username->hospital_name }}</h1>
    <p class="text-sm mt-0.5 text-gray-400">{{ $username->HID }}</p>
</div>
<div class="w-full h-80 msg-sec mt-1 flex flex-col gap-y-2 bg-white rounded-md overflow-y-scroll p-4">
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
    <form class="flex gap-x-2 w-full justify-between" action="" id="formiii" method="POST" class="w-36" enctype="multipart/form-data">
        @csrf
        <div class="flex items-center">
            <label for="upload"><i class="fa fa-user text-2xl p-3 bg-green-500 text-white"></i></label>
        <input type="file" class="hidden" class="w-36 block" name="files" id="upload">
        <input type="text" id="send-msg" name="textt" placeholder="Type message here" class="bg-white block w-full py-3 px-3">
        </div>
        <input type="submit" class="py-2.5 px-8 bg-green-500 text-white" value="submit">
    </form>

</div>
<script src="{{ asset('js/all.js') }}"></script>
