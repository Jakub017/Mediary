<x-app-layout>
    <div class="flex flex-wrap gap-6">
        <div
            class="flex flex-col gap-6 w-full xl:w-[calc(50%-12px)] bg-white rounded-md border-[1px] border-slate-200 p-6 h-fit"
        >
            <form
                action="{{ route('blood.store') }}"
                class="w-full flex flex-col gap-8"
                method="post"
            >
                @csrf @METHOD('POST')
                <div class="flex flex-col w-full gap-4">
                    <div class="w-full flex justify-between items-center">
                        <div class="flex flex-col gap-2 w-full">
                            <h2 class="text-lg font-medium text-black">
                                Morfologia krwi
                            </h2>
                            <span class="text-xs text-gray-400 font-normal"
                                >Twoje kluczowe parametry krwi w jednym
                                miejscu.</span
                            >
                        </div>
                        <button>
                            <i
                                class="dropdown-button fa-solid fa-chevron-down text-2xl duration-300"
                            ></i>
                        </button>
                    </div>

                    <div
                        class="dropdown-content w-full flex flex-wrap gap-4 h-0 overflow-hidden"
                    >
                        <div class="flex flex-col gap-1 text-sm">
                            <label for="wbc" class="dark:text-white"
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
                                class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-400 p-2 text-sm"
                                value="{{ auth()->user()->wbc }}"
                            />
                        </div>

                        <div class="flex flex-col gap-1 text-sm">
                            <label for="rbc" class="dark:text-white"
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
                                class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-400 p-2 text-sm"
                                value="{{ auth()->user()->rbc }}"
                            />
                        </div>

                        <div class="flex flex-col gap-1 text-sm">
                            <label for="hgb" class="dark:text-white"
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
                                class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-400 p-2 text-sm"
                                value="{{ auth()->user()->hgb }}"
                            />
                        </div>

                        <div class="flex flex-col gap-1 text-sm">
                            <label for="hct" class="dark:text-white"
                                >Hematokryt
                                <i
                                    class="fa-solid fa-circle-info text-gray-400 text-sm"
                                    data-tooltip="hct"
                                ></i
                            ></label>
                            <input
                                type="number"
                                name="hct"
                                step="0.01"
                                class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-400 p-2 text-sm"
                                value="{{ auth()->user()->hct }}"
                            />
                        </div>

                        <div class="flex flex-col gap-1 text-sm">
                            <label for="mcv" class="dark:text-white"
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
                                class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-400 p-2 text-sm"
                                value="{{ auth()->user()->mcv }}"
                            />
                        </div>

                        <div class="flex flex-col gap-1 text-sm">
                            <label for="mch" class="dark:text-white"
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
                                class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-400 p-2 text-sm"
                                value="{{ auth()->user()->mch }}"
                            />
                        </div>

                        <div class="flex flex-col gap-1 text-sm">
                            <label for="mchc" class="dark:text-white"
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
                                class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-400 p-2 text-sm"
                                value="{{ auth()->user()->mchc }}"
                            />
                        </div>

                        <div class="flex flex-col gap-1 text-sm">
                            <label for="plt" class="dark:text-white"
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
                                class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-400 p-2 text-sm"
                                value="{{ auth()->user()->plt }}"
                            />
                        </div>

                        <div class="flex flex-col gap-1 text-sm">
                            <label for="rdw_sd" class="dark:text-white"
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
                                class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-400 p-2 text-sm"
                                value="{{ auth()->user()->rdw_sd }}"
                            />
                        </div>

                        <div class="flex flex-col gap-1 text-sm">
                            <label for="rdw_cv" class="dark:text-white"
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
                                class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-400 p-2 text-sm"
                                value="{{ auth()->user()->rdw_cv }}"
                            />
                        </div>

                        <div class="flex flex-col gap-1 text-sm">
                            <label for="pdw" class="dark:text-white"
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
                                class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-400 p-2 text-sm"
                                value="{{ auth()->user()->pdw }}"
                            />
                        </div>

                        <div class="flex flex-col gap-1 text-sm">
                            <label for="mpv" class="dark:text-white"
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
                                class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-400 p-2 text-sm"
                                value="{{ auth()->user()->mpv }}"
                            />
                        </div>

                        <div class="flex flex-col gap-1 text-sm">
                            <label for="p_lcr" class="dark:text-white"
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
                                class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-400 p-2 text-sm"
                                value="{{ auth()->user()->p_lcr }}"
                            />
                        </div>

                        <div class="flex flex-col gap-1 text-sm">
                            <label for="pct" class="dark:text-white"
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
                                class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-400 p-2 text-sm"
                                value="{{ auth()->user()->pct }}"
                            />
                        </div>

                        <div class="flex flex-col gap-1 text-sm">
                            <label for="neu" class="dark:text-white"
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
                                class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-400 p-2 text-sm"
                                value="{{ auth()->user()->neu }}"
                            />
                        </div>

                        <div class="flex flex-col gap-1 text-sm">
                            <label for="lym" class="dark:text-white"
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
                                class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-400 p-2 text-sm"
                                value="{{ auth()->user()->lym }}"
                            />
                        </div>

                        <div class="flex flex-col gap-1 text-sm">
                            <label for="mono" class="dark:text-white"
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
                                class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-400 p-2 text-sm"
                                value="{{ auth()->user()->mono }}"
                            />
                        </div>

                        <div class="flex flex-col gap-1 text-sm">
                            <label for="eos" class="dark:text-white"
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
                                class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-400 p-2 text-sm"
                                value="{{ auth()->user()->eos }}"
                            />
                        </div>

                        <div class="flex flex-col gap-1 text-sm">
                            <label for="baso" class="dark:text-white"
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
                                class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-400 p-2 text-sm"
                                value="{{ auth()->user()->baso }}"
                            />
                        </div>
                    </div>
                </div>

                <div class="flex flex-col w-full gap-4">
                    <div class="w-full flex justify-between items-center">
                        <div class="flex flex-col gap-2">
                            <h2 class="text-lg font-medium text-black">
                                Próby wątrobowe
                            </h2>
                            <span class="text-xs text-gray-400 font-normal"
                                >Monitoruj swoje zdrowie wątroby.</span
                            >
                        </div>
                        <button>
                            <i
                                class="dropdown-button fa-solid fa-chevron-down text-2xl duration-300"
                            ></i>
                        </button>
                    </div>
                    <div
                        class="dropdown-content w-full flex flex-wrap gap-4 h-0 overflow-hidden"
                    >
                        <div class="flex flex-col gap-1 text-sm">
                            <div class="flex flex-col gap-1 text-sm">
                                <label for="tsh" class="dark:text-white"
                                    >TSH
                                    <i
                                        data-tooltip="tsh"
                                        class="fa-solid fa-circle-info text-sm text-gray-400"
                                    ></i
                                ></label>
                                <input
                                    type="number"
                                    name="tsh"
                                    step="0.01"
                                    class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-400 p-2 text-sm"
                                    value="{{ auth()->user()->tsh }}"
                                />
                            </div>
                        </div>
                        <div class="flex flex-col gap-1 text-sm">
                            <div class="flex flex-col gap-1 text-sm">
                                <label for="ast" class="dark:text-white"
                                    >AST
                                    <i
                                        data-tooltip="ast"
                                        class="fa-solid fa-circle-info text-sm text-gray-400"
                                    ></i
                                ></label>
                                <input
                                    type="number"
                                    name="ast"
                                    step="0.01"
                                    class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-400 p-2 text-sm"
                                    value="{{ auth()->user()->ast }}"
                                />
                            </div>
                        </div>
                        <div class="flex flex-col gap-1 text-sm">
                            <div class="flex flex-col gap-1 text-sm">
                                <label for="alt" class="dark:text-white"
                                    >ALT
                                    <i
                                        data-tooltip="alt"
                                        class="fa-solid fa-circle-info text-sm text-gray-400"
                                    ></i
                                ></label>
                                <input
                                    type="number"
                                    name="alt"
                                    step="0.01"
                                    class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-400 p-2 text-sm"
                                    value="{{ auth()->user()->alt }}"
                                />
                            </div>
                        </div>
                        <div class="flex flex-col gap-1 text-sm">
                            <div class="flex flex-col gap-1 text-sm">
                                <label for="bilirubin" class="dark:text-white"
                                    >Bilirubina całkowita
                                    <i
                                        data-tooltip="bilirubin"
                                        class="fa-solid fa-circle-info text-sm text-gray-400"
                                    ></i
                                ></label>
                                <input
                                    type="number"
                                    name="bilirubin"
                                    step="0.01"
                                    class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-400 p-2 text-sm"
                                    value="{{ auth()->user()->bilirubin }}"
                                />
                            </div>
                        </div>
                        <div class="flex flex-col gap-1 text-sm">
                            <div class="flex flex-col gap-1 text-sm">
                                <label for="alp" class="dark:text-white"
                                    >Fosfataza zasadowa
                                    <i
                                        data-tooltip="alp"
                                        class="fa-solid fa-circle-info text-sm text-gray-400"
                                    ></i
                                ></label>
                                <input
                                    type="number"
                                    name="alp"
                                    step="0.01"
                                    class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-400 p-2 text-sm"
                                    value="{{ auth()->user()->alp }}"
                                />
                            </div>
                        </div>
                        <div class="flex flex-col gap-1 text-sm">
                            <div class="flex flex-col gap-1 text-sm">
                                <label for="ggtp" class="dark:text-white"
                                    >GGTP
                                    <i
                                        data-tooltip="ggtp"
                                        class="fa-solid fa-circle-info text-sm text-gray-400"
                                    ></i
                                ></label>
                                <input
                                    type="number"
                                    name="ggtp"
                                    step="0.01"
                                    class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-400 p-2 text-sm"
                                    value="{{ auth()->user()->ggtp }}"
                                />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col w-full gap-4">
                    <div class="w-full flex justify-between items-center">
                        <div class="flex flex-col gap-2">
                            <h2 class="text-lg font-medium text-black">
                                Lipidogram
                            </h2>
                            <span class="text-xs text-gray-400 font-normal"
                                >Monitoruj swoje poziomy cholesterolu i zdrowie
                                serca.</span
                            >
                        </div>
                        <button>
                            <i
                                class="dropdown-button fa-solid fa-chevron-down text-2xl duration-300"
                            ></i>
                        </button>
                    </div>
                    <div
                        class="dropdown-content w-full flex flex-wrap gap-4 h-0 overflow-hidden"
                    >
                        <div class="flex flex-col gap-1 text-sm">
                            <div class="flex flex-col gap-1 text-sm">
                                <label
                                    for="total_cholesterol"
                                    class="dark:text-white"
                                    >Cholesterol całkowity
                                    <i
                                        data-tooltip="total_cholesterol"
                                        class="fa-solid fa-circle-info text-sm text-gray-400"
                                    ></i
                                ></label>
                                <input
                                    type="number"
                                    name="total_cholesterol"
                                    step="0.01"
                                    class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-400 p-2 text-sm"
                                    value="{{ auth()->user()->total_cholesterol }}"
                                />
                            </div>
                        </div>
                        <div class="flex flex-col gap-1 text-sm">
                            <div class="flex flex-col gap-1 text-sm">
                                <label
                                    for="hdl_cholesterol"
                                    class="dark:text-white"
                                    >Cholesterol HDL
                                    <i
                                        data-tooltip="hdl_cholesterol"
                                        class="fa-solid fa-circle-info text-sm text-gray-400"
                                    ></i
                                ></label>
                                <input
                                    type="number"
                                    name="hdl_cholesterol"
                                    step="0.01"
                                    class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-400 p-2 text-sm"
                                    value="{{ auth()->user()->hdl_cholesterol }}"
                                />
                            </div>
                        </div>
                        <div class="flex flex-col gap-1 text-sm">
                            <div class="flex flex-col gap-1 text-sm">
                                <label
                                    for="non_hdl_cholesterol"
                                    class="dark:text-white"
                                    >Cholesterol nie-HDL
                                    <i
                                        data-tooltip="non_hdl_cholesterol"
                                        class="fa-solid fa-circle-info text-sm text-gray-400"
                                    ></i
                                ></label>
                                <input
                                    type="number"
                                    name="non_hdl_cholesterol"
                                    step="0.01"
                                    class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-400 p-2 text-sm"
                                    value="{{ auth()->user()->non_hdl_cholesterol }}"
                                />
                            </div>
                        </div>
                        <div class="flex flex-col gap-1 text-sm">
                            <div class="flex flex-col gap-1 text-sm">
                                <label
                                    for="ldl_cholesterol"
                                    class="dark:text-white"
                                    >Cholesterol LDL
                                    <i
                                        data-tooltip="ldl_cholesterol"
                                        class="fa-solid fa-circle-info text-sm text-gray-400"
                                    ></i
                                ></label>
                                <input
                                    type="number"
                                    name="ldl_cholesterol"
                                    step="0.01"
                                    class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-400 p-2 text-sm"
                                    value="{{ auth()->user()->ldl_cholesterol }}"
                                />
                            </div>
                        </div>
                        <div class="flex flex-col gap-1 text-sm">
                            <div class="flex flex-col gap-1 text-sm">
                                <label
                                    for="triglycerides"
                                    class="dark:text-white"
                                    >Triglicerydy
                                    <i
                                        data-tooltip="triglycerides"
                                        class="fa-solid fa-circle-info text-sm text-gray-400"
                                    ></i
                                ></label>
                                <input
                                    type="number"
                                    name="triglycerides"
                                    step="0.01"
                                    class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-400 p-2 text-sm"
                                    value="{{ auth()->user()->triglycerides }}"
                                />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="w-full">
                    <button
                        class="rounded-md bg-blue-600 text-white w-fit px-6 py-2 text-base duration-200 hover:bg-blue-700"
                    >
                        Zapisz
                    </button>
                </div>
            </form>
        </div>

        <div
            class="flex flex-col gap-8 w-full xl:w-[calc(50%-12px)] bg-white rounded-md border-[1px] border-slate-200 p-6 h-fit"
        >
            <h2 class="text-lg font-medium text-black">
                Zalecenia wirtualnego specjalisty<br />
                <span class="text-xs text-gray-400 font-normal"
                    >Wirtualny specjalista bierze pod uwagę równiez dane z
                    twojego profilu pacjenta.</span
                >
            </h2>
            <div class="text-sm leading-6">
                @if(auth()->user()->blood_recommendations) {!!
                auth()->user()->blood_recommendations !!} @else
                <p class="text-gray-400 text-xs">
                    Nie znaleziono zaleceń. Wypełnij więcej danych.
                </p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
@section('scripts')
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

    tippy("[data-tooltip='tsh']", {
        content:
            "Hormon stymulujący tarczycę, odpowiedzialny za regulację produkcji hormonów tarczycy (T3 i T4). Poziom TSH jest używany do oceny funkcji tarczycy.",
        placement: "right",
        theme: "light",
    });

    tippy("[data-tooltip='ast']", {
        content:
            "Enzym występujący głównie w wątrobie, sercu i mięśniach. Podwyższony poziom AST może wskazywać na uszkodzenie wątroby lub mięśnia sercowego.",
        placement: "right",
        theme: "light",
    });

    tippy("[data-tooltip='alt']", {
        content:
            "Enzym wątrobowy, który jest wskaźnikiem zdrowia wątroby. Wysoki poziom ALT może świadczyć o uszkodzeniu wątroby, takim jak zapalenie wątroby.",
        placement: "right",
        theme: "light",
    });

    tippy("[data-tooltip='bilirubin']", {
        content:
            "Bilirubina jest produktem rozpadu hemoglobiny. Jej podwyższony poziom może świadczyć o problemach z wątrobą, takich jak żółtaczka.",
        placement: "right",
        theme: "light",
    });

    tippy("[data-tooltip='alp']", {
        content:
            "Enzym występujący w kościach i wątrobie. Podwyższony poziom ALP może wskazywać na choroby wątroby, dróg żółciowych lub kości.",
        placement: "right",
        theme: "light",
    });

    tippy("[data-tooltip='ggtp']", {
        content:
            "Enzym związany z wątrobą i drogami żółciowymi. Wysoki poziom GGTP może świadczyć o chorobach wątroby, takich jak stłuszczenie wątroby lub marskość.",
        placement: "right",
        theme: "light",
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        dropdownBtns = [...document.querySelectorAll(".dropdown-button")];
        dropdownContents = [...document.querySelectorAll(".dropdown-content")];

        dropdownBtns.forEach((btn, index) => {
            btn.addEventListener("click", (e) => {
                e.preventDefault();
                btn.classList.toggle("rotate-180");
                dropdownContents[index].classList.toggle("h-0");
                dropdownContents[index].classList.toggle("overflow-hidden");
            });
        });
    });
</script>
@endsection
