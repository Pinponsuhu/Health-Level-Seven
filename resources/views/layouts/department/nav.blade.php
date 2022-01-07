    <div class="w-full bg-green-600 flex py-3 md:px-12 px-6 items-center justify-between">
        <div class="flex gap-x-3  items-center">
            <img src="{{ asset('/storage/users/' . auth()->guard('department')->user()->hospital_logo) }}" class="w-12 rounded-full h-12" alt="">
            <h1 class="font-bold text-white text-2xl">{{ auth()->guard('department')->user()->hospital_name }}</h1>
        </div>
    </div>
