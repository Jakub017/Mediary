<nav
    class="w-full border-b-[1px] h-24 flex justify-between gap-6 items-center border-slate-200 p-6"
>
    <h2 class="text-xl">{{ $pageTitle }}</h2>
    <div class="ml-auto flex gap-3 items-center">
        <div
            class="p-2 rounded-md border-[1px] border-slate-200 flex gap-2 justify-between items-center"
        >
            <i class="fa-solid fa-calendar text-slate-500 text-sm"></i>
            <p class="text-sm">
                {{ \Carbon\Carbon::today()->format('d.m.Y') }}
            </p>
        </div>
    </div>
    <div class="w-[1px] h-full bg-slate-200"></div>
    <div class="flex gap-3 items-center">
        <div
            class="w-10 h-10 border-[1px] flex justify-center items-center rounded-full border-slate-200 text-"
        >
            <i class="fa-solid fa-moon text-slate-500"></i>
        </div>
        <div
            class="w-10 h-10 border-[1px] flex justify-center items-center rounded-full border-slate-200 relative"
        >
            <i class="fa-solid fa-bell text-slate-500"></i>
            <span
                class="absolute w-3 h-3 bg-red-600 rounded-full top-0 right-0"
            ></span>
        </div>
    </div>
    <div class="w-[1px] h-full bg-slate-200"></div>
    <div class="flex justify-center items-center gap-2">
        <img
            class="w-12 h-12 rounded-full"
            src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}&length=1&background=1860FC&color=FFFFFF"
            alt=""
        />
        <div class="flex flex-col">
            <h4 class="text-base">{{ auth()->user()->name }}</h4>
            <h6 class="text-xs text-gray-600">{{ auth()->user()->email }}</h6>
        </div>
        <i class="fa-solid fa-chevron-down text-gray-600"></i>
    </div>
</nav>
