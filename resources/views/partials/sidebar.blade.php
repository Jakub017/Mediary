<div class="min-w-64 bg-[#F9F9F9] min-h-screen border-[1px] border-slate-200">
    <div class="flex flex-col items-center justify-center p-6 gap-8">
        <div class="flex justify-between w-full items-center">
            <img
                src="{{ asset('img/logo-white.png') }}"
                class="w-36 hidden"
                alt=""
            />
            <img src="{{ asset('img/logo-dark.png') }}" class="w-36" alt="" />
        </div>
        <div class="flex flex-col items-center justify-center gap-4 w-full">
            <a
                href="{{ route('index') }}"
                class="w-full flex p-3 rounded-md text-sm justify-start items-center gap-2 duration-200 hover:bg-blue-100 {{ request()->routeIs('index') ? 'bg-blue-100  text-blue-500' : 'text-slate-900 ' }}"
            >
                <i class="fa-solid fa-house text-base"></i> Pulpit</a
            >

            <a
                href="{{ route('profile.index') }}"
                class="w-full  flex p-3 rounded-md text-sm justify-start items-center gap-2 duration-200 hover:bg-blue-100 {{ request()->routeIs('profile.index') ? 'bg-blue-100 text-blue-500' : 'text-slate-900' }}"
            >
                <i class="fa-solid fa-hospital-user text-base"></i> Profil
                pacjenta</a
            >

            <a
                href="{{ route('doctor.index') }}"
                class="w-full flex p-3 rounded-md text-sm justify-start items-center gap-2 duration-200 hover:bg-blue-100 {{ request()->routeIs('doctor.index') ? 'bg-blue-100 text-blue-500' : 'text-slate-900' }}"
            >
                <i class="fa-solid fa-user-doctor text-base"></i> Specjaliści
            </a>

            <a
                href="{{ route('blood.index') }}"
                class="w-full flex p-3 rounded-md text-sm justify-start items-center gap-2 duration-200 hover:bg-blue-100 {{ request()->routeIs('blood.index') ? 'bg-blue-100 text-blue-500' : 'text-slate-900' }}"
            >
                <i class="fa-solid fa-droplet text-base"></i> Badania krwi</a
            >

            <a
                href="{{ route('diet.index') }}"
                class="w-full  flex p-3 rounded-md text-sm justify-start items-center gap-2 duration-200 hover:bg-blue-100 {{ request()->routeIs('diet.index') ? 'bg-blue-100 text-blue-500' : 'text-slate-900' }}"
            >
                <i class="fa-solid fa-utensils text-base"></i> Dieta</a
            >

            <a
                href="{{ route('workout.index') }}"
                class="w-full flex p-3 rounded-md text-sm justify-start items-center gap-2 duration-200 hover:bg-blue-100 {{ request()->routeIs('workout.index') ? 'bg-blue-100 text-blue-500' : 'text-slate-900' }}"
            >
                <i class="fa-solid fa-dumbbell text-base"></i> Ćwiczenia</a
            >
        </div>

        <div class="flex flex-col items-start justify-center gap-4 w-full">
            <h4 class="text-slate-900 text-sm">Ustawienia i pomoc</h4>
            <a
                href="{{ route('profile.show') }}"
                class="w-full flex p-3 rounded-md text-sm justify-start items-center gap-2 duration-200 hover:bg-blue-100 {{ request()->routeIs('profile.show') ? 'bg-blue-100 text-blue-500' : 'text-slate-900' }}"
            >
                <i class="fa-solid fa-gear text-base"></i> Ustawienia</a
            >
            <a
                href="{{ route('index') }}"
                class="w-full text-slate-900 flex p-3 rounded-md text-sm justify-start items-center gap-2 duration-200 hover:bg-blue-100"
            >
                <i class="fa-solid fa-circle-question text-base"></i> Pomoc</a
            >
        </div>
    </div>
</div>
