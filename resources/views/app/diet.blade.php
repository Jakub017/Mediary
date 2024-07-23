@extends('layouts.app.app') @section('content')

<div
    class="flex flex-col gap-6 w-full bg-white rounded-md border-[1px] border-slate-200 p-6 h-fit"
>
    <div class="flex flex-col gap-2">
        <h2 class="text-lg font-medium text-black">Dostosuj nową dietę</h2>
        <span class="text-xs text-gray-400 font-normal"
            >Dostosuj parametry swojej diety. Wirtualny asystent bierze pod
            uwagę również dane z twojego profilu pacjenta.</span
        >
    </div>

    <form
        action="{{ route('create-diet') }}"
        class="w-full flex flex-col gap-4"
        method="post"
    >
        @csrf @METHOD('POST')
        <div class="flex flex-wrap w-full gap-4 max-w-4xl">
            <div class="flex flex-col gap-1 text-sm w-full">
                <label for="name">nazwa diety</label>
                <input
                    type="text"
                    name="name"
                    class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-400 p-2"
                />
            </div>
        </div>
        <div class="flex flex-wrap w-full gap-4 max-w-4xl">
            <div
                class="flex flex-col gap-1 text-sm w-full lg:w-[calc(50%-8px)]"
            >
                <label for="kcal"
                    >Ilość kcal
                    <i
                        data-tooltip="kcal"
                        class="fa-solid fa-circle-info text-sm text-gray-400"
                    ></i
                ></label>
                <select
                    type="number"
                    name="kcal"
                    step="100"
                    class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-400 p-2"
                >
                    <option value="">Wybierz ilość kalorii</option>
                    <option value="1500">1500</option>
                    <option value="2000">2000</option>
                    <option value="2500">2500</option>
                    <option value="3000">3000</option>
                </select>
            </div>
            <div
                class="flex flex-col gap-1 text-sm w-full lg:w-[calc(50%-8px)]"
            >
                <label for="dishes_count"
                    >Ilość posiłków
                    <i
                        data-tooltip="dishes_count"
                        class="fa-solid fa-circle-info text-sm text-gray-400"
                    ></i
                ></label>
                <select
                    type="number"
                    name="dishes_count"
                    step="100"
                    class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-400 p-2"
                >
                    <option value="">Wybierz ilość posiłków</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
        </div>
        <div class="flex flex-wrap w-full gap-4 max-w-4xl">
            <div
                class="flex flex-col gap-1 w-full text-sm lg:w-[calc(50%-8px)]"
            >
                <label for="like">Podaj składniki, które lubisz jeść</label>
                <textarea
                    type="number"
                    name="like"
                    step="100"
                    class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-400 p-2 resize-none h-24"
                ></textarea>
            </div>
            <div
                class="flex flex-col gap-1 w-full text-sm lg:w-[calc(50%-8px)]"
            >
                <label for="not_like"
                    >Podaj składniki, których nie lubisz jeść</label
                >
                <textarea
                    type="number"
                    name="not_like"
                    step="100"
                    class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-400 p-2 resize-none h-24"
                ></textarea>
            </div>
        </div>
        <div class="w-full">
            <button
                class="rounded-md bg-[#49AA39] text-white w-fit px-6 py-2 text-base"
            >
                Stwórz
            </button>
        </div>
    </form>
</div>

<div
    class="flex flex-col gap-6 w-full bg-white rounded-md border-[1px] border-slate-200 p-6 h-fit"
>
    <div class="flex flex-col gap-2">
        <h2 class="text-lg font-medium text-black">Twoje diety</h2>
        <span class="text-xs text-gray-400 font-normal"
            >Lista twoich zapisanych diet.</span
        >
    </div>

    <div class="flex flex-wrap gap-4">
        @forelse($diets as $diet)
        <div
            class="w-full max-w-md border-[1px] border-slate-200 p-4 rounded-md flex flex-col gap-4 shadow-sm"
        >
            <h2 class="text-lg font-semibold text-[#49AA39]">
                {{ $diet->name }}
            </h2>
            <div class="flex flex-col gap-2">
                <p class="text-sm flex items-center w-full justify-start gap-1">
                    <span class="font-medium"
                        ><i class="fa-solid fa-bolt text-[#49AA39]"></i> Ilość
                        kalorii:
                    </span>
                    {{ $diet->kcal }}
                </p>
                <p class="text-sm flex items-center w-full justify-start gap-1">
                    <span class="font-medium"
                        ><i class="fa-solid fa-bowl-food text-[#49AA39]"></i>
                        Ilość posiłków:</span
                    >
                    {{ $diet->dishes_count }}
                </p>
                <p class="text-sm flex items-center w-full justify-start gap-1">
                    <span class="font-medium"
                        ><i class="fa-solid fa-heart text-[#49AA39]"></i>
                        Składniki, które lubię:</span
                    >
                    <span class="lowercase">{{ $diet->like }}</span>
                </p>
                <p class="text-sm flex items-center w-full justify-start gap-1">
                    <span class="font-medium"
                        ><i class="fa-solid fa-circle-xmark text-[#49AA39]"></i>
                        Składniki, których nie lubię:</span
                    >
                    <span class="lowercase">{{ $diet->not_like }}</span>
                </p>
            </div>

            <div class="flex flex-wrap gap-2">
                <button
                    class="see-diet rounded-md bg-[#49AA39] text-white px-6 py-2 text-base w-28 duration-200 hover:bg-[#2E8B56]"
                >
                    Zobacz
                </button>
                <button class="ml-auto flex justify-center items-center">
                    <i class="fa-solid fa-print text-2xl text-blue-600"></i>
                </button>
                <form
                    class="flex justify-center items-center"
                    action="{{ route('delete-diet', $diet) }}"
                    method="post"
                >
                    @csrf @METHOD('DELETE')
                    <button class="flex justify-center items-center">
                        <i class="fa-solid fa-trash text-2xl text-red-600"></i>
                    </button>
                </form>
            </div>
        </div>
        @empty
        <div class="w-full text-gray-400">Brak zapisanych diet.</div>
        @endforelse
    </div>

    
</div>

@endsection
