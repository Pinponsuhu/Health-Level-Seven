<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data exchange</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
     <!-- Fonts -->

     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Cabin:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

     <link rel="stylesheet" href="{{ secure_asset('css/app.css') }}">

     <script src="{{ secure_asset('js/all.js') }}"></script>
     <script src="{{ secure_asset('js/jquery.js') }}"></script>
    <style>
        body {
            font-family: 'Cabin', sans-serif;
        }
        *::-webkit-scrollbar {
width: 7px;
}

/* Track */
*::-webkit-scrollbar-track {
background: #f1f1f1;
}

/* Handle */
*::-webkit-scrollbar-thumb {
background: rgb(46, 189, 137);
}

/* Handle on hover */
*::-webkit-scrollbar-thumb:hover {
background: #095134;
}

    </style>
</head>
<body class="bg-gradient-to-tl bg-cover bg-no-repeat relative h-screen bg-center from-green-100 to-green-200">
    @yield('content')
</body>
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script>
    var receiver_id = "";
    var my_id = "{{ auth()->user()->id }}";
     $(document).ready(function () {
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
         });
    // Pusher.logToConsole = true;

var pusher = new Pusher('2679c497925c8ac812ee', {
  cluster: 'ap1',
  forceTLS : true
});

var channel = pusher.subscribe('my-channel');
channel.bind('my-event', function(data) {
//   alert(JSON.stringify(data));
  if(my_id == data.from){
    $('#' + data.to).click();
  }
      else if(my_id == data.to){
          if(receiver_id == data.from){
            $('#' + data.from).click();
          } else{
              var pending = parseInt($('#' + data.from).find('.pending').html());
              if(pending){
                  $('#' + data.from).find('.pending').html(pending + 1);
              }else{
                  $('#' + data.from).append('<span class="pending">1</span>');
              }
          }
  }
});

            $('.user').click(function () {
                $('.user').removeClass('bg-green-800');
                $(this).addClass('bg-green-800');
                $(this).find('.pending').remove();

                receiver_id = $(this).attr('id');
                $.ajax({
                    type: "get",
                    url: "/dataex/send/message/" + receiver_id,
                    data: "",
                    cache: false,
                    success: function (data) {
                        $('#messages').html(data);
                        scrollToBottom();
                    }
                });
            });
        $(document).on('keyup','.send-msg #send-msg', function (e) {
            var message = $(this).val();
            if(e.keyCode == 13 && message != '' && receiver_id != ''){
                $(this).val('');
                var datastr = "receiver_id=" + receiver_id + "&message=" + message + "&msg_type= text";
                $.ajax({
                    type: "get",
                    url: "/hospital/dataex/send",
                    cache: false,
                    data: datastr,
                    success: function (data) {

                    },
                    error: function (jqXHR, status, err) {
                        console.log(err);
                    },
                    complete: function(){
                        scrollToBottom();
                    }
                });
            }
        });
        $(document).on('change', '.send-msg #send-file', function(e){
            $(this).closest('form').submit();
            e.preventDefault();
            });
        $(document).on('submit', '#send-files', function(e){
                e.preventDefault();
                // filesssss = $('#send-file').val()
                // alert(filesssss);
                // var form = $('#send-files')[0];
                // console.log(form.val());
            var formdata = new FormData();
            var file_data = $('.send-msg #send-file')[0].files[0];
            // console.log(file_data);
            formdata.append('file', file_data);
            formdata.append('text', 'file_data');
            for (let [key, value] of formdata) {
            console.log(`${key}: ${value}`);
            }
            // console.log(formdata);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
});
            $.ajax({
                url: "/hospital/datex/send",
                method: "get",
                data: formdata,
                contentType: false,
                cache: false,
                processData: false,
                success: function(data){

                },
                error: function(error){
                    console.log(error);
                }
            });

        });
        // $(document).on('change', '.send-msg #send-file',function (e){
        //     // var file_data = $('.send-msg #send-file').prop('file');
        //     // var form_data = new FormData();
        //     // form_data.append('file', file_data);
        //     file = $(".send-msg #send-file").prop('files')[0];
        //     console.log(file);
        //     if(file.length > 0){
        //  var fd = new FormData();

        //  // Append data
        //  fd.append('file',file[0]);
        //  fd.append('_token',CSRF_TOKEN);
        // console.log(fd);
        // $.ajax({
        //    url: "/sendd",
        //    method: 'post',
        //    data: fd,
        //    contentType: false,
        //    processData: false,
        //    dataType: 'json',
        //    success: function(response){}
        // });
        //     }
        // //     $.ajax({
        // //     url: "/send",
        // //     type: "POST",
        // //     data: message,
        // //     contentType: false,
        // //     cache: false,
        // //     processData:false,
        // //     success: function(data){
        // //         console.log(data);
        // //     }
        // // });
        // });
    });
    function scrollToBottom() {
        $('.msg-sec').scrollTop($('.msg-sec')[0].scrollHeight);
    }
</script>
</html>
