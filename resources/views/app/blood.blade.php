@extends('layouts.app.app') @section('content')

<div class="flex flex-col gap-6">
    <div
        class="flex flex-col gap-6 w-full bg-white rounded-md border-[1px] border-slate-200 p-6 h-fit"
    >
        <div class="flex flex-col gap-2">
            <h2 class="text-lg font-medium text-black">Morfologia krwi</h2>
            <span class="text-xs text-gray-400 font-normal"
                >Wirtualny specjalista bierze pod uwagę równiez dane z twojego
                profilu pacjenta.</span
            >
        </div>

        <form
            action="{{ route('blood-test') }}"
            class="w-full flex flex-wrap gap-4"
            method="post"
        >
            @csrf @METHOD('POST')
            <div class="flex flex-col gap-1 text-sm">
                <label for="wbc"
                    >Leukocyty
                    <i
                        data-tooltip="wbc"
                        class="fa-solid fa-circle-info text-sm text-gray-400"
                    ></i
                ></label>
                <input
                    type="number"
                    name="wbc"
                    step="0.01"
                    class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-400 p-2"
                    value="{{ auth()->user()->wbc }}"
                />
            </div>

            <div class="flex flex-col gap-1 text-sm">
                <label for="rbc"
                    >Erytrocyty
                    <i
                        class="fa-solid fa-circle-info text-sm text-gray-400"
                        data-tooltip="rbc"
                    ></i
                ></label>
                <input
                    type="number"
                    name="rbc"
                    step="0.01"
                    class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-400 p-2"
                    value="{{ auth()->user()->rbc }}"
                />
            </div>

            <div class="flex flex-col gap-1 text-sm">
                <label for="hgb"
                    >Hemoglobina
                    <i
                        class="fa-solid fa-circle-info text-sm text-gray-400"
                        data-tooltip="hgb"
                    ></i
                ></label>
                <input
                    type="number"
                    name="hgb"
                    step="0.01"
                    class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-400 p-2"
                    value="{{ auth()->user()->hgb }}"
                />
            </div>

            <div class="flex flex-col gap-1 text-sm">
                <label for="hct"
                    >Hematokryt
                    <i
                        class="fa-solid fa-circle-info text-sm text-gray-400"
                        data-tooltip="hct"
                    ></i
                ></label>
                <input
                    type="number"
                    name="hct"
                    step="0.01"
                    class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-400 p-2"
                    value="{{ auth()->user()->hct }}"
                />
            </div>

            <div class="flex flex-col gap-1 text-sm">
                <label for="mcv"
                    >MCV
                    <i
                        class="fa-solid fa-circle-info text-sm text-gray-400"
                        data-tooltip="mcv"
                    ></i
                ></label>
                <input
                    type="number"
                    name="mcv"
                    step="0.01"
                    class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-400 p-2"
                    value="{{ auth()->user()->mcv }}"
                />
            </div>

            <div class="flex flex-col gap-1 text-sm">
                <label for="mch"
                    >MCH
                    <i
                        class="fa-solid fa-circle-info text-sm text-gray-400"
                        data-tooltip="mch"
                    ></i
                ></label>
                <input
                    type="number"
                    name="mch"
                    step="0.01"
                    class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-400 p-2"
                    value="{{ auth()->user()->mch }}"
                />
            </div>

            <div class="flex flex-col gap-1 text-sm">
                <label for="mchc"
                    >MCHC
                    <i
                        class="fa-solid fa-circle-info text-sm text-gray-400"
                        data-tooltip="mchc"
                    ></i
                ></label>
                <input
                    type="number"
                    name="mchc"
                    step="0.01"
                    class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-400 p-2"
                    value="{{ auth()->user()->mchc }}"
                />
            </div>

            <div class="flex flex-col gap-1 text-sm">
                <label for="plt"
                    >Płytki krwi
                    <i
                        class="fa-solid fa-circle-info text-sm text-gray-400"
                        data-tooltip="plt"
                    ></i
                ></label>
                <input
                    type="number"
                    name="plt"
                    step="0.01"
                    class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-400 p-2"
                    value="{{ auth()->user()->plt }}"
                />
            </div>

            <div class="flex flex-col gap-1 text-sm">
                <label for="rdw_sd"
                    >RDW-SD
                    <i
                        class="fa-solid fa-circle-info text-sm text-gray-400"
                        data-tooltip="rdw_sd"
                    ></i
                ></label>
                <input
                    type="number"
                    name="rdw_sd"
                    step="0.01"
                    class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-400 p-2"
                    value="{{ auth()->user()->rdw_sd }}"
                />
            </div>

            <div class="flex flex-col gap-1 text-sm">
                <label for="rdw_cv"
                    >RDW-CV
                    <i
                        class="fa-solid fa-circle-info text-sm text-gray-400"
                        data-tooltip="rdw_cv"
                    ></i
                ></label>
                <input
                    type="number"
                    name="rdw_cv"
                    step="0.01"
                    class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-400 p-2"
                    value="{{ auth()->user()->rdw_cv }}"
                />
            </div>

            <div class="flex flex-col gap-1 text-sm">
                <label for="pdw"
                    >PDW
                    <i
                        class="fa-solid fa-circle-info text-sm text-gray-400"
                        data-tooltip="pdw"
                    ></i
                ></label>
                <input
                    type="number"
                    name="pdw"
                    step="0.01"
                    class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-400 p-2"
                    value="{{ auth()->user()->pdw }}"
                />
            </div>

            <div class="flex flex-col gap-1 text-sm">
                <label for="mpv"
                    >MPV
                    <i
                        class="fa-solid fa-circle-info text-sm text-gray-400"
                        data-tooltip="mpv"
                    ></i
                ></label>
                <input
                    type="number"
                    name="mpv"
                    step="0.01"
                    class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-400 p-2"
                    value="{{ auth()->user()->mpv }}"
                />
            </div>

            <div class="flex flex-col gap-1 text-sm">
                <label for="p_lcr"
                    >P-LCR
                    <i
                        class="fa-solid fa-circle-info text-sm text-gray-400"
                        data-tooltip="p_lcr"
                    ></i
                ></label>
                <input
                    type="number"
                    name="p_lcr"
                    step="0.01"
                    class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-400 p-2"
                    value="{{ auth()->user()->p_lcr }}"
                />
            </div>

            <div class="flex flex-col gap-1 text-sm">
                <label for="pct"
                    >PCT
                    <i
                        class="fa-solid fa-circle-info text-sm text-gray-400"
                        data-tooltip="pct"
                    ></i
                ></label>
                <input
                    type="number"
                    name="pct"
                    step="0.01"
                    class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-400 p-2"
                    value="{{ auth()->user()->pct }}"
                />
            </div>

            <div class="flex flex-col gap-1 text-sm">
                <label for="neu"
                    >Neutrofile
                    <i
                        class="fa-solid fa-circle-info text-sm text-gray-400"
                        data-tooltip="neu"
                    ></i
                ></label>
                <input
                    type="number"
                    name="neu"
                    step="0.01"
                    class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-400 p-2"
                    value="{{ auth()->user()->neu }}"
                />
            </div>

            <div class="flex flex-col gap-1 text-sm">
                <label for="lym"
                    >Limfocyty
                    <i
                        class="fa-solid fa-circle-info text-sm text-gray-400"
                        data-tooltip="lym"
                    ></i
                ></label>
                <input
                    type="number"
                    name="lym"
                    step="0.01"
                    class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-400 p-2"
                    value="{{ auth()->user()->lym }}"
                />
            </div>

            <div class="flex flex-col gap-1 text-sm">
                <label for="mono"
                    >Monocyty
                    <i
                        class="fa-solid fa-circle-info text-sm text-gray-400"
                        data-tooltip="mono"
                    ></i
                ></label>
                <input
                    type="number"
                    name="mono"
                    step="0.01"
                    class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-400 p-2"
                    value="{{ auth()->user()->mono }}"
                />
            </div>

            <div class="flex flex-col gap-1 text-sm">
                <label for="eos"
                    >Eozynofile
                    <i
                        class="fa-solid fa-circle-info text-sm text-gray-400"
                        data-tooltip="eos"
                    ></i
                ></label>
                <input
                    type="number"
                    name="eos"
                    step="0.01"
                    class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-400 p-2"
                    value="{{ auth()->user()->eos }}"
                />
            </div>

            <div class="flex flex-col gap-1 text-sm">
                <label for="baso"
                    >Bazofile
                    <i
                        class="fa-solid fa-circle-info text-sm text-gray-400"
                        data-tooltip="baso"
                    ></i
                ></label>
                <input
                    type="number"
                    name="baso"
                    step="0.01"
                    class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-400 p-2"
                    value="{{ auth()->user()->baso }}"
                />
            </div>

            <div class="w-full">
                <button
                    class="rounded-md bg-[#49AA39] text-white w-fit px-6 py-2 text-base"
                >
                    Zapisz
                </button>
            </div>
        </form>
    </div>

    <div
        class="flex flex-col gap-8 w-full bg-white rounded-md border-[1px] border-slate-200 p-6 h-fit"
    >
        <h2 class="text-lg font-medium text-black">
            Zalecenia wirtualnego specjalisty<br />
            <span class="text-xs text-gray-400 font-normal"
                >Wirtualny specjalista bierze pod uwagę równiez dane z twojego
                profilu pacjenta.</span
            >
        </h2>
        <div class="text-base leading-6">
            @if(auth()->user()->blood_recommendations) {!!
            auth()->user()->blood_recommendations !!} @else
            <p>Nie znaleziono zaleceń. Wypełnij więcej danych.</p>
            @endif
        </div>
    </div>
</div>

@endsection @section('scripts')
<script>
    tippy("[data-tooltip='wbc']", {
        content:
            "Białe krwinki odpowiedzialne za obronę organizmu przed infekcjami.",
        placement: "right",
        theme: "light",
    });

    tippy("[data-tooltip='rbc']", {
        content:
            "Czerwone krwinki odpowiedzialne za transport tlenu z płuc do tkanek i dwutlenku węgla z tkanek do płuc.",
        placement: "right",
        theme: "light",
    });

    tippy("[data-tooltip='hgb']", {
        content:
            "Białko zawarte w erytrocytach, które wiąże tlen i umożliwia jego transport.",
        placement: "right",
        theme: "light",
    });

    tippy("[data-tooltip='hct']", {
        content: "Procentowy udział erytrocytów w objętości krwi.",
        placement: "right",
        theme: "light",
    });

    tippy("[data-tooltip='mcv']", {
        content: "Średnia objętość pojedynczego erytrocytu.",
        placement: "right",
        theme: "light",
    });

    tippy("[data-tooltip='mch']", {
        content: "Średnia masa hemoglobiny w pojedynczym erytrocycie.",
        placement: "right",
        theme: "light",
    });

    tippy("[data-tooltip='mchc']", {
        content: "Średnie stężenie hemoglobiny w erytrocycie.",
        placement: "right",
        theme: "light",
    });

    tippy("[data-tooltip='plt']", {
        content: "Komórki biorące udział w procesie krzepnięcia krwi.",
        placement: "right",
        theme: "light",
    });

    tippy("[data-tooltip='rdw_sd']", {
        content: "Miara zróżnicowania objętości erytrocytów.",
        placement: "right",
        theme: "light",
    });

    tippy("[data-tooltip='rdw_cv']", {
        content: "Procentowy wskaźnik zróżnicowania objętości erytrocytów.",
        placement: "right",
        theme: "light",
    });

    tippy("[data-tooltip='pdw']", {
        content: "Miara zróżnicowania objętości płytek krwi.",
        placement: "right",
        theme: "light",
    });

    tippy("[data-tooltip='mpv']", {
        content: "Średnia objętość płytek krwi.",
        placement: "right",
        theme: "light",
    });

    tippy("[data-tooltip='p_lcr']", {
        content: "Procent płytek krwi o dużej objętości.",
        placement: "right",
        theme: "light",
    });

    tippy("[data-tooltip='pct']", {
        content: "Procent objętości krwi zajmowany przez płytki krwi.",
        placement: "right",
        theme: "light",
    });

    tippy("[data-tooltip='neu']", {
        content:
            "Rodzaj białych krwinek odpowiedzialnych za zwalczanie bakterii.",
        placement: "right",
        theme: "light",
    });

    tippy("[data-tooltip='lym']", {
        content:
            "Rodzaj białych krwinek odpowiedzialnych za odpowiedź immunologiczną.",
        placement: "right",
        theme: "light",
    });

    tippy("[data-tooltip='mono']", {
        content:
            "Rodzaj białych krwinek odpowiedzialnych za zwalczanie patogenów i usuwanie martwych komórek.",
        placement: "right",
        theme: "light",
    });

    tippy("[data-tooltip='eos']", {
        content:
            "Rodzaj białych krwinek biorących udział w reakcjach alergicznych i zwalczaniu pasożytów.",
        placement: "right",
        theme: "light",
    });

    tippy("[data-tooltip='baso']", {
        content:
            "Rodzaj białych krwinek biorących udział w reakcjach alergicznych i zapalnych.",
        placement: "right",
        theme: "light",
    });
</script>
@endsection
