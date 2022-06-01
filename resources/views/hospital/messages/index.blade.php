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
            @if ($message->text == 'text')
            <p class="text-md">{{ $message->content }}</p>
            @else
            <a href="/storage/message_file/{{ $message->content }}" download class="text-md">Download</a>
            @endif
            <span class="text-sm">{{ $message->created_at->format("H:i") }}</span>
        </div>
    </div>
    @endforeach
</div>
<script src="{{ asset('js/all.js') }}"></script>
<div class="flex bg-white rounded-md px-3 mt-5 py-3 items-center send-msg">
    <label for="send-file" class="block py-3 px-4 rounded-md shadow-md text-white bg-green-500"><i class="fa fa-file "></i></label>
        <input type="file" class="w-36 hidden" hidden name="files" id="send-file">
    <input type="text" id="send-msg" placeholder="Type message here" class="bg-white block w-full outline-none py-3 px-3">
</div>
<script>
$(document).ready(function() {
    $('#send-file').change(function(){
        var file_data = $('#send-file').prop('files')[0];
        var form_data = new FormData();
        form_data.append('file', file_data);
        form_data.append('reciever', receiver_id);
        $(this).val('');
        $.ajax({
            url: "/hospital/datex/send/file",
            type: "post",
            data: form_data,
            contentType: false,
            cache: false,
            processData:false,
            success: function(data){
                console.log(data);
            }
        });
    });
});
</script>
