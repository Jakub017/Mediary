<nav
    class="w-full border-b-[1px] h-24 flex justify-between gap-6 items-center border-slate-200 p-6 dark:border-[#525255]"
>
    <h2 class="text-xl dark:text-white">{{ $pageTitle }}</h2>
    <div class="ml-auto flex gap-3 items-center">
        <div
            class="p-2 rounded-md border-[1px] border-slate-200 flex gap-2 justify-between items-center dark:border-[#525255]"
        >
            <i class="fa-solid fa-calendar text-slate-500 text-sm"></i>
            <p class="text-sm dark:text-white">
                {{ \Carbon\Carbon::today()->format('d.m.Y') }}
            </p>
        </div>
    </div>
    <div class="w-[1px] h-full bg-slate-200 dark:bg-[#525255]"></div>
    <div class="flex gap-3 items-center">
        <div
            class="theme-toggle w-10 h-10 border-[1px] flex justify-center items-center rounded-full border-slate-200 dark:border-[#525255] hover:cursor-pointer duration-200"
        >
            <div class="sun-icon flex justify-center items-center">
                <i class="fa-solid fa-sun text-slate-500"></i>
            </div>
            <div class="moon-icon flex justify-center items-center">
                <i class="fa-solid fa-moon text-slate-500"></i>
            </div>
        </div>
        <div
            class="w-10 h-10 border-[1px] flex justify-center items-center rounded-full border-slate-200 relative dark:border-[#525255] hover:cursor-pointer duration-200"
        >
            <i class="fa-solid fa-bell text-slate-500"></i>
            <span
                class="absolute w-3 h-3 bg-red-600 rounded-full top-0 right-0"
            ></span>
        </div>
    </div>
    <div class="w-[1px] h-full bg-slate-200 dark:bg-[#525255]"></div>
    <div class="flex justify-center items-center gap-2">
        <img
            class="w-12 h-12 rounded-full"
            src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}&length=1&background=2563eb&color=FFFFFF"
            alt=""
        />
        <div class="flex flex-col">
            <h4 class="text-base dark:text-white">
                {{ auth()->user()->name }}
            </h4>
            <h6 class="text-xs text-gray-600 dark:text-[#A0A0A0]">
                {{ auth()->user()->email }}
            </h6>
        </div>
        <i class="fa-solid fa-chevron-down text-gray-600"></i>
    </div>
</nav>
