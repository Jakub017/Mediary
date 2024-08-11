@extends('layouts.app.app') @section('content')

<div class="flex gap-4 flex-wrap">
    <div class="w-full">
        <h2 class="text-lg font-medium text-black">
            Wyszukaj lekarzy
        </h2>
    </div>
    <div class="w-full">
        <form action="#" class="w-full flex flex-wrap gap-2">
            <div class="w-full lg:w-[calc(45%-12px)] relative">
                <i
                    class="fa-solid fa-stethoscope absolute top-1/2 translate-y-[-50%] left-2 text-slate-400"
                ></i>
                <input
                    type="text"
                    class="text-sm p-2 rounded-md w-full border-[1px] border-slate-200 pl-8"
                    placeholder="Specjalizacja, badanie..."
                />
            </div>
            <div class="w-full lg:w-[calc(45%-12px)] relative">
                <i
                    class="fa-solid fa-house-medical absolute top-1/2 translate-y-[-50%] left-2 text-slate-400"
                ></i>
                <input
                    type="text"
                    class="text-sm p-2 rounded-md border-[1px] border-slate-200 w-full pl-8"
                    placeholder="Miasto"
                    value="{{ auth()->user()->location }}"
                />
            </div>
            <button
                class="text-sm text-white bg-blue-600 px-4 py-2 rounded-md duration-200 hover:bg-blue-700 flex items-center justify-center gap-2 w-fit lg:w-[calc(10%-12px)]"
            >
                <i class="fa-solid fa-magnifying-glass"></i> Szukaj
            </button>
        </form>
    </div>
    <div
        class="p-4 rounded-md flex gap-6 border-[1px] border-slate-200 w-full md:w-[calc(50%-12px)] xl:w-[calc(33%-12px)] flex-wrap"
    >
        <div class="flex gap-4 justify-between items-start">
            <img
                src="{{ asset('img/doctor.jpeg') }}"
                alt=""
                class="w-20 h-20 rounded-full"
            />
            <div class="flex flex-col gap-1">
                <h2 class="text-base font-medium m-0">
                    Ddr n. med. Agata Malenda
                </h2>
                <p class="text-sm font-light m-0">
                    <i class="fa-solid fa-stethoscope"></i> Hematolog,
                    internista
                </p>
                <p class="text-sm font-light m-0">
                    <i class="fa-solid fa-house-medical"></i>
                    Sierakowskiego 4 lok.U3, Warszawa
                </p>

                <div class="flex gap-1 items-center">
                    <div class="flex gap-0">
                        <i class="fa-solid fa-star text-blue-600"></i
                        ><i class="fa-solid fa-star text-blue-600"></i>
                        <i class="fa-solid fa-star text-blue-600"></i>
                        <i class="fa-solid fa-star text-blue-600"></i>
                        <i class="fa-solid fa-star text-blue-600"></i>
                    </div>
                    <p class="text-sm mt-1 font-normal">32 opinie</p>
                </div>
            </div>
        </div>
        <div class="flex flex-wrap gap-2 w-full">
            <a
                href="#"
                class="text-sm text-white bg-blue-600 px-4 py-2 rounded-md duration-200 hover:bg-blue-700 flex items-center gap-2"
            >
                <i class="fa-solid fa-calendar text-white text-sm"></i> Umów
                wizytę</a
            >
            <a
                href="#"
                class="text-sm text-white bg-[#00c3a5] px-4 py-2 rounded-md duration-200 hover:bg-[#00a183] flex items-center gap-2"
            >
                <img
                    class="w-4 h-4"
                    src="{{ asset('img/znanylekarz-logo.png') }}"
                    alt=""
                />
                Profil w znanylekarz.pl</a
            >
        </div>
    </div>
    <div
        class="p-4 rounded-md flex gap-6 border-[1px] border-slate-200 w-full md:w-[calc(50%-12px)] xl:w-[calc(33%-12px)] flex-wrap"
    >
        <div class="flex gap-4 justify-between items-start">
            <img
                src="{{ asset('img/doctor.jpeg') }}"
                alt=""
                class="w-20 h-20 rounded-full"
            />
            <div class="flex flex-col gap-1">
                <h2 class="text-base font-medium m-0">
                    Ddr n. med. Agata Malenda
                </h2>
                <p class="text-sm font-light m-0">
                    <i class="fa-solid fa-stethoscope"></i> Hematolog,
                    internista
                </p>
                <p class="text-sm font-light m-0">
                    <i class="fa-solid fa-house-medical"></i>
                    Sierakowskiego 4 lok.U3, Warszawa
                </p>

                <div class="flex gap-1 items-center">
                    <div class="flex gap-0">
                        <i class="fa-solid fa-star text-blue-600"></i
                        ><i class="fa-solid fa-star text-blue-600"></i>
                        <i class="fa-solid fa-star text-blue-600"></i>
                        <i class="fa-solid fa-star text-blue-600"></i>
                        <i class="fa-solid fa-star text-blue-600"></i>
                    </div>
                    <p class="text-sm mt-1 font-normal">32 opinie</p>
                </div>
            </div>
        </div>
        <div class="flex flex-wrap gap-2 w-full">
            <a
                href="#"
                class="text-sm text-white bg-blue-600 px-4 py-2 rounded-md duration-200 hover:bg-blue-700 flex items-center gap-2"
            >
                <i class="fa-solid fa-calendar text-white text-sm"></i> Umów
                wizytę</a
            >
            <a
                href="#"
                class="text-sm text-white bg-[#00c3a5] px-4 py-2 rounded-md duration-200 hover:bg-[#00a183] flex items-center gap-2"
            >
                <img
                    class="w-4 h-4"
                    src="{{ asset('img/znanylekarz-logo.png') }}"
                    alt=""
                />
                Profil w znanylekarz.pl</a
            >
        </div>
    </div>
    <div
        class="p-4 rounded-md flex gap-6 border-[1px] border-slate-200 w-full md:w-[calc(50%-12px)] xl:w-[calc(33%-12px)] flex-wrap"
    >
        <div class="flex gap-4 justify-between items-start">
            <img
                src="{{ asset('img/doctor.jpeg') }}"
                alt=""
                class="w-20 h-20 rounded-full"
            />
            <div class="flex flex-col gap-1">
                <h2 class="text-base font-medium m-0">
                    Ddr n. med. Agata Malenda
                </h2>
                <p class="text-sm font-light m-0">
                    <i class="fa-solid fa-stethoscope"></i> Hematolog,
                    internista
                </p>
                <p class="text-sm font-light m-0">
                    <i class="fa-solid fa-house-medical"></i>
                    Sierakowskiego 4 lok.U3, Warszawa
                </p>

                <div class="flex gap-1 items-center">
                    <div class="flex gap-0">
                        <i class="fa-solid fa-star text-blue-600"></i
                        ><i class="fa-solid fa-star text-blue-600"></i>
                        <i class="fa-solid fa-star text-blue-600"></i>
                        <i class="fa-solid fa-star text-blue-600"></i>
                        <i class="fa-solid fa-star text-blue-600"></i>
                    </div>
                    <p class="text-sm mt-1 font-normal">32 opinie</p>
                </div>
            </div>
        </div>
        <div class="flex flex-wrap gap-2 w-full">
            <a
                href="#"
                class="text-sm text-white bg-blue-600 px-4 py-2 rounded-md duration-200 hover:bg-blue-700 flex items-center gap-2"
            >
                <i class="fa-solid fa-calendar text-white text-sm"></i> Umów
                wizytę</a
            >
            <a
                href="#"
                class="text-sm text-white bg-[#00c3a5] px-4 py-2 rounded-md duration-200 hover:bg-[#00a183] flex items-center gap-2"
            >
                <img
                    class="w-4 h-4"
                    src="{{ asset('img/znanylekarz-logo.png') }}"
                    alt=""
                />
                Profil w znanylekarz.pl</a
            >
        </div>
    </div>
</div>

@endsection
