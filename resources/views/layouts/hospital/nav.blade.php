    <div class="w-full bg-green-600 flex py-3 md:px-12 px-6 items-center justify-between">
        <div class="flex justify-between w-full items-center">
            <h1 class="font-bold text-white text-xl md:text-2xl">{{ auth()->user()->hospital_name }}</h1>
            <img onclick="reveal()"  src="{{ asset('/storage/users/' . auth()->user()->hospital_logo) }}" class="w-12 rounded-full h-12" alt="">
        </div>
    </div>
        <div id="navvvv"  onmouseout="disappear()" class="w-52 z-50 rounded-md px-5 py-3 hidden fixed top-16 right-5 shadow-md bg-white">
            <ul class="pl-4 mt-3 py-3 border-b-2">
                <a href="/hospital/changing/password"><li class="flex text-green-500 items-center"><i class="fa fa-lock mr-3 text-xl"></i> <p class="text-sm">Change Password</p></li></a>
            </ul>
            <ul class="pl-4 mt-3 py-3">
                <a href="/logout"><li class="flex text-green-500 items-center"><i class="fa fa-power-off mr-3 text-xl"></i> <p class="text-sm">Logout</p></li></a>
            </ul>
        </div>
        <script>
            function reveal(){
                document.getElementById('navvvv').classList.remove('hidden');
            }
            function disappear(){
                setTimeout(() => {
                    document.getElementById('navvvv').classList.add('hidden');
                }, 1500);
            }
        </script>

