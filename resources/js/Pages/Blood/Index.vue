<script setup>
import MainLayout from "@/Layouts/MainLayout.vue";
defineOptions({
    layout: MainLayout,
});

import { useForm, usePage } from "@inertiajs/vue3";
import { computed, onMounted } from "vue";
import { Head } from "@inertiajs/vue3";
import PrimaryButton from "@/Components/PrimaryButton.vue";

const page = usePage();
const user = computed(() => page.props.user);

const form = useForm({
    wbc: user.value.wbc,
    rbc: user.value.rbc,
    hgb: user.value.hgb,
    hct: user.value.hct,
    mcv: user.value.mcv,
    mch: user.value.mch,
    mchc: user.value.mchc,
    plt: user.value.plt,
    rdw_sd: user.value.rdw_sd,
    rdw_cv: user.value.rdw_cv,
    pdw: user.value.pdw,
    mpv: user.value.mpv,
    p_lcr: user.value.p_lcr,
    pct: user.value.pct,
    neu: user.value.neu,
    lym: user.value.lym,
    mono: user.value.mono,
    eos: user.value.eos,
    baso: user.value.baso,
    tsh: user.value.tsh,
    ast: user.value.ast,
    alt: user.value.alt,
    bilirubin: user.value.bilirubin,
    alp: user.value.alp,
    ggtp: user.value.ggtp,
    total_cholesterol: user.value.total_cholesterol,
    hdl_cholesterol: user.value.hdl_cholesterol,
    non_hdl_cholesterol: user.value.non_hdl_cholesterol,
    ldl_cholesterol: user.value.ldl_cholesterol,
    triglycerides: user.value.triglycerides,
});

const submit = () => form.patch(route("blood.update"));

onMounted(() => {
    const dropdownBtns = [...document.querySelectorAll(".dropdown-btn")];
    const dropdownContents = [
        ...document.querySelectorAll(".dropdown-content"),
    ];
    const dropdownArrows = [...document.querySelectorAll(".dropdown-arrow")];

    dropdownBtns.forEach((btn, i) => {
        btn.addEventListener("click", () => {
            dropdownContents[i].classList.toggle("hidden");
            dropdownArrows[i].classList.toggle("rotate-180");
        });
    });
});
</script>

<template class="overflow-y-auto">
    <Head>
        <title>Wyniki badań</title>
    </Head>
    <div class="flex flex-wrap gap-6">
        <div
            class="flex flex-col gap-6 w-full lg:w-[calc(50%-12px)] bg-white rounded-2xl shadow p-6 h-fit"
        >
            <form class="w-full flex flex-col gap-6" @submit.prevent="submit">
                <div class="flex flex-col w-full gap-6">
                    <div class="flex flex-col gap-2">
                        <div class="flex gap-2 items-center">
                            <div
                                class="flex justify-center items-center bg-blue-200 size-12 rounded-2xl"
                            >
                                <i
                                    class="fa-solid fa-flask text-blue-600 text-xl"
                                ></i>
                            </div>
                            <h4 class="text-2xl font-normal">Wyniki badań</h4>
                        </div>
                        <span class="text-sm text-gray-600"
                            >W tym miejscu mozesz wprowadzic wyniki swoich
                            badań.</span
                        >
                    </div>

                    <div class="w-full flex flex-wrap gap-4">
                        <!-- Morfologia -->
                        <div class="w-full flex justify-between items-center">
                            <h4 class="text-xl font-normal w-full">
                                Morfologia krwi
                            </h4>
                            <button
                                type="button"
                                class="dropdown-btn flex justify-center items-center"
                            >
                                <i
                                    class="dropdown-arrow fa-solid fa-angle-down text-xl"
                                ></i>
                            </button>
                        </div>

                        <div
                            class="dropdown-content w-full grid grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4"
                        >
                            <div class="flex flex-col gap-1 text-sm">
                                <label for="wbc" class="text-gray-600 text-xs"
                                    >Leukocyty (WBC)</label
                                >
                                <div class="w-full relative">
                                    <input
                                        type="number"
                                        v-model="form.wbc"
                                        step="0.01"
                                        class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-300 p-2 pr-14 text-sm"
                                    />
                                    <span
                                        class="text-xs block w-fit px-2 text-center text-gray-600 border-l border-slate-300 absolute top-1/2 right-0 p-1 rounded-e-md translate-y-[-50%]"
                                    >
                                        tys/μl
                                    </span>
                                </div>

                                <span
                                    class="text-red-500 text-xs"
                                    v-if="form.errors.wbc"
                                    >{{ form.errors.wbc }}</span
                                >
                            </div>

                            <div class="flex flex-col gap-1 text-sm">
                                <label for="rbc" class="text-gray-600 text-xs"
                                    >Erytrocyty (RBC)
                                </label>
                                <div class="w-full relative">
                                    <input
                                        type="number"
                                        v-model="form.rbc"
                                        step="0.01"
                                        class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-300 p-2 pr-14 text-sm"
                                    />
                                    <span
                                        class="text-xs block w-fit px-2 text-center text-gray-600 border-l border-slate-300 absolute top-1/2 right-0 p-1 rounded-e-md translate-y-[-50%]"
                                    >
                                        mln/μl
                                    </span>
                                </div>
                                <span
                                    class="text-red-500 text-xs"
                                    v-if="form.errors.rbc"
                                    >{{ form.errors.rbc }}</span
                                >
                            </div>

                            <div class="flex flex-col gap-1 text-sm">
                                <label for="hgb" class="text-gray-600 text-xs"
                                    >Hemoglobina (HGB)
                                </label>
                                <div class="w-full relative">
                                    <input
                                        type="number"
                                        step="0.01"
                                        class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-300 p-2 pr-12 text-sm"
                                        v-model="form.hgb"
                                    />
                                    <span
                                        class="text-xs block w-fit px-2 text-center text-gray-600 border-l border-slate-300 absolute top-1/2 right-0 p-1 rounded-e-md translate-y-[-50%]"
                                    >
                                        g/dl
                                    </span>
                                </div>
                                <span
                                    class="text-red-500 text-xs"
                                    v-if="form.errors.hgb"
                                    >{{ form.errors.hgb }}</span
                                >
                            </div>

                            <div class="flex flex-col gap-1 text-sm">
                                <label for="hct" class="text-gray-600 text-xs"
                                    >Hematokryt (HCT)
                                </label>
                                <div class="w-full relative">
                                    <input
                                        type="number"
                                        step="0.01"
                                        class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-300 p-2 pr-8 text-sm"
                                        v-model="form.hct"
                                    />
                                    <span
                                        class="text-xs block w-fit px-2 text-center text-gray-600 border-l border-slate-300 absolute top-1/2 right-0 p-1 rounded-e-md translate-y-[-50%]"
                                    >
                                        %
                                    </span>
                                </div>
                                <span
                                    class="text-red-500 text-xs"
                                    v-if="form.errors.hct"
                                    >{{ form.errors.hct }}</span
                                >
                            </div>

                            <div class="flex flex-col gap-1 text-sm">
                                <label for="mcv" class="text-gray-600 text-xs"
                                    >MCV
                                </label>
                                <div class="w-full relative">
                                    <input
                                        type="number"
                                        step="0.01"
                                        class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-300 p-2 pr-8 text-sm"
                                        v-model="form.mcv"
                                    />
                                    <span
                                        class="text-xs block w-fit px-2 text-center text-gray-600 border-l border-slate-300 absolute top-1/2 right-0 p-1 rounded-e-md translate-y-[-50%]"
                                    >
                                        fl
                                    </span>
                                </div>
                                <span
                                    class="text-red-500 text-xs"
                                    v-if="form.errors.mcv"
                                    >{{ form.errors.mcv }}</span
                                >
                            </div>

                            <div class="flex flex-col gap-1 text-sm">
                                <label for="mch" class="text-gray-600 text-xs"
                                    >MCH
                                </label>
                                <div class="w-full relative">
                                    <input
                                        type="number"
                                        step="0.01"
                                        class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-300 p-2 pr-9 text-sm"
                                        v-model="form.mch"
                                    />
                                    <span
                                        class="text-xs block w-fit px-2 text-center text-gray-600 border-l border-slate-300 absolute top-1/2 right-0 p-1 rounded-e-md translate-y-[-50%]"
                                    >
                                        pg
                                    </span>
                                </div>
                                <span
                                    class="text-red-500 text-xs"
                                    v-if="form.errors.mch"
                                    >{{ form.errors.mch }}</span
                                >
                            </div>

                            <div class="flex flex-col gap-1 text-sm">
                                <label for="mchc" class="text-gray-600 text-xs"
                                    >MCHC
                                </label>
                                <div class="w-full relative">
                                    <input
                                        type="number"
                                        step="0.01"
                                        class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-300 p-2 pr-10 text-sm"
                                        v-model="form.mchc"
                                    />
                                    <span
                                        class="text-xs block w-fit px-2 text-center text-gray-600 border-l border-slate-300 absolute top-1/2 right-0 p-1 rounded-e-md translate-y-[-50%]"
                                    >
                                        g/dl
                                    </span>
                                </div>
                                <span
                                    class="text-red-500 text-xs"
                                    v-if="form.errors.mchc"
                                    >{{ form.errors.mchc }}</span
                                >
                            </div>

                            <div class="flex flex-col gap-1 text-sm">
                                <label for="plt" class="text-gray-600 text-xs"
                                    >Płytki krwi (PLT)
                                </label>
                                <div class="w-full relative">
                                    <input
                                        type="number"
                                        step="0.01"
                                        class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-300 p-2 pr-14 text-sm"
                                        v-model="form.plt"
                                    />
                                    <span
                                        class="text-xs block w-fit px-2 text-center text-gray-600 border-l border-slate-300 absolute top-1/2 right-0 p-1 rounded-e-md translate-y-[-50%]"
                                    >
                                        tys./μl
                                    </span>
                                </div>
                                <span
                                    class="text-red-500 text-xs"
                                    v-if="form.errors.plt"
                                    >{{ form.errors.plt }}</span
                                >
                            </div>

                            <div class="flex flex-col gap-1 text-sm">
                                <label
                                    for="rdw_sd"
                                    class="text-gray-600 text-xs"
                                    >RDW-SD
                                </label>
                                <div class="w-full relative">
                                    <input
                                        type="number"
                                        step="0.01"
                                        class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-300 p-2 pr-8 text-sm"
                                        v-model="form.rdw_sd"
                                    />
                                    <span
                                        class="text-xs block w-fit px-2 text-center text-gray-600 border-l border-slate-300 absolute top-1/2 right-0 p-1 rounded-e-md translate-y-[-50%]"
                                    >
                                        fl
                                    </span>
                                </div>
                                <span
                                    class="text-red-500 text-xs"
                                    v-if="form.errors.rdw_sd"
                                    >{{ form.errors.rdw_sd }}</span
                                >
                            </div>

                            <div class="flex flex-col gap-1 text-sm">
                                <label
                                    for="rdw_cv"
                                    class="text-gray-600 text-xs"
                                    >RDW-CV
                                </label>
                                <div class="w-full relative">
                                    <input
                                        type="number"
                                        step="0.01"
                                        class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-300 p-2 pr-8 text-sm"
                                        v-model="form.rdw_cv"
                                    />
                                    <span
                                        class="text-xs block w-fit px-2 text-center text-gray-600 border-l border-slate-300 absolute top-1/2 right-0 p-1 rounded-e-md translate-y-[-50%]"
                                    >
                                        %
                                    </span>
                                </div>
                                <span
                                    class="text-red-500 text-xs"
                                    v-if="form.errors.rdw_cv"
                                    >{{ form.errors.rdw_cv }}</span
                                >
                            </div>

                            <div class="flex flex-col gap-1 text-sm">
                                <label for="pdw" class="text-gray-600 text-xs"
                                    >PDW
                                </label>
                                <div class="w-full relative">
                                    <input
                                        type="number"
                                        step="0.01"
                                        class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-300 p-2 pr-8 text-sm"
                                        v-model="form.pdw"
                                    />
                                    <span
                                        class="text-xs block w-fit px-2 text-center text-gray-600 border-l border-slate-300 absolute top-1/2 right-0 p-1 rounded-e-md translate-y-[-50%]"
                                    >
                                        fl
                                    </span>
                                </div>
                                <span
                                    class="text-red-500 text-xs"
                                    v-if="form.errors.pdw"
                                    >{{ form.errors.pdw }}</span
                                >
                            </div>

                            <div class="flex flex-col gap-1 text-sm">
                                <label for="mpv" class="text-gray-600 text-xs"
                                    >MPV
                                </label>
                                <div class="w-full relative">
                                    <input
                                        type="number"
                                        step="0.01"
                                        class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-300 p-2 pr-8 text-sm"
                                        v-model="form.mpv"
                                    />
                                    <span
                                        class="text-xs block w-fit px-2 text-center text-gray-600 border-l border-slate-300 absolute top-1/2 right-0 p-1 rounded-e-md translate-y-[-50%]"
                                    >
                                        fl
                                    </span>
                                </div>
                                <span
                                    class="text-red-500 text-xs"
                                    v-if="form.errors.mpv"
                                    >{{ form.errors.mpv }}</span
                                >
                            </div>

                            <div class="flex flex-col gap-1 text-sm">
                                <label for="p_lcr" class="text-gray-600 text-xs"
                                    >P-LCR
                                </label>
                                <div class="w-full relative">
                                    <input
                                        type="number"
                                        step="0.01"
                                        class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-300 p-2 pr-8 text-sm"
                                        v-model="form.p_lcr"
                                    />
                                    <span
                                        class="text-xs block w-fit px-2 text-center text-gray-600 border-l border-slate-300 absolute top-1/2 right-0 p-1 rounded-e-md translate-y-[-50%]"
                                    >
                                        %
                                    </span>
                                </div>
                                <span
                                    class="text-red-500 text-xs"
                                    v-if="form.errors.p_lcr"
                                    >{{ form.errors.p_lcr }}</span
                                >
                            </div>

                            <div class="flex flex-col gap-1 text-sm">
                                <label for="pct" class="text-gray-600 text-xs"
                                    >PCT
                                </label>
                                <div class="w-full relative">
                                    <input
                                        type="number"
                                        step="0.01"
                                        class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-300 p-2 pr-8 text-sm"
                                        v-model="form.pct"
                                    />
                                    <span
                                        class="text-xs block w-fit px-2 text-center text-gray-600 border-l border-slate-300 absolute top-1/2 right-0 p-1 rounded-e-md translate-y-[-50%]"
                                    >
                                        %
                                    </span>
                                </div>
                                <span
                                    class="text-red-500 text-xs"
                                    v-if="form.errors.pct"
                                    >{{ form.errors.pct }}</span
                                >
                            </div>

                            <div class="flex flex-col gap-1 text-sm">
                                <label for="neu" class="text-gray-600 text-xs"
                                    >Neutrofile (NEU)
                                </label>
                                <div class="w-full relative">
                                    <input
                                        type="number"
                                        step="0.01"
                                        class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-300 p-2 pr-14 text-sm"
                                        v-model="form.neu"
                                    />
                                    <span
                                        class="text-xs block w-fit px-2 text-center text-gray-600 border-l border-slate-300 absolute top-1/2 right-0 p-1 rounded-e-md translate-y-[-50%]"
                                    >
                                        tys./μl
                                    </span>
                                </div>
                                <span
                                    class="text-red-500 text-xs"
                                    v-if="form.errors.neu"
                                    >{{ form.errors.neu }}</span
                                >
                            </div>

                            <div class="flex flex-col gap-1 text-sm">
                                <label for="lym" class="text-gray-600 text-xs"
                                    >Limfocyty (LYM)
                                </label>
                                <div class="w-full relative">
                                    <input
                                        type="number"
                                        step="0.01"
                                        class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-300 p-2 pr-14 text-sm"
                                        v-model="form.lym"
                                    />
                                    <span
                                        class="text-xs block w-fit px-2 text-center text-gray-600 border-l border-slate-300 absolute top-1/2 right-0 p-1 rounded-e-md translate-y-[-50%]"
                                    >
                                        tys./μl
                                    </span>
                                </div>
                                <span
                                    class="text-red-500 text-xs"
                                    v-if="form.errors.lym"
                                    >{{ form.errors.lym }}</span
                                >
                            </div>

                            <div class="flex flex-col gap-1 text-sm">
                                <label for="mono" class="text-gray-600 text-xs"
                                    >Monocyty (MON)
                                </label>
                                <div class="w-full relative">
                                    <input
                                        type="number"
                                        step="0.01"
                                        class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-300 p-2 pr-14 text-sm"
                                        v-model="form.mono"
                                    />
                                    <span
                                        class="text-xs block w-fit px-2 text-center text-gray-600 border-l border-slate-300 absolute top-1/2 right-0 p-1 rounded-e-md translate-y-[-50%]"
                                    >
                                        tys./μl
                                    </span>
                                </div>
                                <span
                                    class="text-red-500 text-xs"
                                    v-if="form.errors.mono"
                                    >{{ form.errors.mono }}</span
                                >
                            </div>

                            <div class="flex flex-col gap-1 text-sm">
                                <label for="eos" class="text-gray-600 text-xs"
                                    >Eozynofile (EOS)
                                </label>
                                <div class="w-full relative">
                                    <input
                                        type="number"
                                        step="0.01"
                                        class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-300 p-2 pr-14 text-sm"
                                        v-model="form.eos"
                                    />
                                    <span
                                        class="text-xs block w-fit px-2 text-center text-gray-600 border-l border-slate-300 absolute top-1/2 right-0 p-1 rounded-e-md translate-y-[-50%]"
                                    >
                                        tys./μl
                                    </span>
                                </div>
                                <span
                                    class="text-red-500 text-xs"
                                    v-if="form.errors.eos"
                                    >{{ form.errors.eos }}</span
                                >
                            </div>

                            <div class="flex flex-col gap-1 text-sm">
                                <label for="baso" class="text-gray-600 text-xs"
                                    >Bazofile (BAS)
                                </label>
                                <div class="w-full relative">
                                    <input
                                        type="number"
                                        step="0.01"
                                        class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-300 p-2 pr-14 text-sm"
                                        v-model="form.baso"
                                    />
                                    <span
                                        class="text-xs block w-fit px-2 text-center text-gray-600 border-l border-slate-300 absolute top-1/2 right-0 p-1 rounded-e-md translate-y-[-50%]"
                                    >
                                        tys./μl
                                    </span>
                                </div>
                                <span
                                    class="text-red-500 text-xs"
                                    v-if="form.errors.baso"
                                    >{{ form.errors.baso }}</span
                                >
                            </div>
                        </div>
                        <!-- Morfologia -->

                        <!-- Próby watrobowe -->
                        <div
                            class="mt-6 w-full flex justify-between items-center"
                        >
                            <h4 class="text-xl font-normal w-full">
                                Próby wątrobowe
                            </h4>
                            <button
                                type="button"
                                class="dropdown-btn flex justify-center items-center"
                            >
                                <i
                                    class="dropdown-arrow fa-solid fa-angle-down text-xl"
                                ></i>
                            </button>
                        </div>

                        <div
                            class="dropdown-content w-full grid gap-4 grid-cols-2 lg:grid-cols-3 xl:grid-cols-4"
                        >
                            <div class="flex flex-col gap-1 text-sm">
                                <label for="wbc" class="text-gray-600 text-xs"
                                    >AST
                                </label>
                                <div class="w-full relative">
                                    <input
                                        type="number"
                                        v-model="form.ast"
                                        step="0.01"
                                        class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-300 p-2 pr-10 text-sm"
                                    />
                                    <span
                                        class="text-xs block w-fit px-2 text-center text-gray-600 border-l border-slate-300 absolute top-1/2 right-0 p-1 rounded-e-md translate-y-[-50%]"
                                    >
                                        U/l
                                    </span>
                                </div>
                                <span
                                    class="text-red-500 text-xs"
                                    v-if="form.errors.ast"
                                    >{{ form.errors.ast }}</span
                                >
                            </div>

                            <div class="flex flex-col gap-1 text-sm">
                                <label for="alt" class="text-gray-600 text-xs"
                                    >ALT
                                </label>
                                <div class="w-full relative">
                                    <input
                                        type="number"
                                        v-model="form.alt"
                                        step="0.01"
                                        class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-300 p-2 pr-10 text-sm"
                                    />
                                    <span
                                        class="text-xs block w-fit px-2 text-center text-gray-600 border-l border-slate-300 absolute top-1/2 right-0 p-1 rounded-e-md translate-y-[-50%]"
                                    >
                                        U/l
                                    </span>
                                </div>
                                <span
                                    class="text-red-500 text-xs"
                                    v-if="form.errors.alt"
                                    >{{ form.errors.alt }}</span
                                >
                            </div>

                            <div class="flex flex-col gap-1 text-sm">
                                <label
                                    for="bilirubin"
                                    class="text-gray-600 text-xs"
                                    >Bilirubina całkowita
                                </label>
                                <div class="w-full relative">
                                    <input
                                        type="number"
                                        step="0.01"
                                        class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-300 p-2 pr-14 text-sm"
                                        v-model="form.bilirubin"
                                    />
                                    <span
                                        class="text-xs block w-fit px-2 text-center text-gray-600 border-l border-slate-300 absolute top-1/2 right-0 p-1 rounded-e-md translate-y-[-50%]"
                                    >
                                        mg/dl
                                    </span>
                                </div>
                                <span
                                    class="text-red-500 text-xs"
                                    v-if="form.errors.bilirubin"
                                    >{{ form.errors.bilirubin }}</span
                                >
                            </div>

                            <div class="flex flex-col gap-1 text-sm">
                                <label for="alp" class="text-gray-600 text-xs"
                                    >Fosfataza zasadowa (ALP)
                                </label>
                                <div class="w-full relative">
                                    <input
                                        type="number"
                                        step="0.01"
                                        class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-300 p-2 pr-10 text-sm"
                                        v-model="form.alp"
                                    />
                                    <span
                                        class="text-xs block w-fit px-2 text-center text-gray-600 border-l border-slate-300 absolute top-1/2 right-0 p-1 rounded-e-md translate-y-[-50%]"
                                    >
                                        U/l
                                    </span>
                                </div>
                                <span
                                    class="text-red-500 text-xs"
                                    v-if="form.errors.alp"
                                    >{{ form.errors.alp }}</span
                                >
                            </div>

                            <div class="flex flex-col gap-1 text-sm">
                                <label for="mcv" class="text-gray-600 text-xs"
                                    >GGTP
                                </label>
                                <div class="w-full relative">
                                    <input
                                        type="number"
                                        step="0.01"
                                        class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-300 p-2 pr-10 text-sm"
                                        v-model="form.ggtp"
                                    />
                                    <span
                                        class="text-xs block w-fit px-2 text-center text-gray-600 border-l border-slate-300 absolute top-1/2 right-0 p-1 rounded-e-md translate-y-[-50%]"
                                    >
                                        U/l
                                    </span>
                                </div>
                                <span
                                    class="text-red-500 text-xs"
                                    v-if="form.errors.ggtp"
                                    >{{ form.errors.ggtp }}</span
                                >
                            </div>
                        </div>
                        <!-- Próby watrobowe -->

                        <!-- Cholesterol -->
                        <div
                            class="mt-6 w-full flex justify-between items-center"
                        >
                            <h4 class="text-xl font-normal w-full">
                                Cholesterol
                            </h4>
                            <button
                                type="button"
                                class="dropdown-btn flex justify-center items-center"
                            >
                                <i
                                    class="dropdown-arrow fa-solid fa-angle-down text-xl"
                                ></i>
                            </button>
                        </div>

                        <div
                            class="dropdown-content w-full grid grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4"
                        >
                            <div class="flex flex-col gap-1 text-sm">
                                <label
                                    for="total_cholesterol"
                                    class="text-gray-600 text-xs"
                                    >Cholesterol całk. (CHOL)
                                </label>
                                <div class="w-full relative">
                                    <input
                                        type="number"
                                        v-model="form.total_cholesterol"
                                        step="0.01"
                                        class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-300 p-2 pr-14 text-sm"
                                    />
                                    <span
                                        class="text-xs block w-fit px-2 text-center text-gray-600 border-l border-slate-300 absolute top-1/2 right-0 p-1 rounded-e-md translate-y-[-50%]"
                                    >
                                        mg/dl
                                    </span>
                                </div>
                                <span
                                    class="text-red-500 text-xs"
                                    v-if="form.errors.total_cholesterol"
                                    >{{ form.errors.total_cholesterol }}</span
                                >
                            </div>

                            <div class="flex flex-col gap-1 text-sm">
                                <label
                                    for="hdl_cholesterol"
                                    class="text-gray-600 text-xs"
                                    >Cholesterol HDL
                                </label>
                                <div class="w-full relative">
                                    <input
                                        type="number"
                                        v-model="form.hdl_cholesterol"
                                        step="0.01"
                                        class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-300 p-2 pr-14 text-sm"
                                    />
                                    <span
                                        class="text-xs block w-fit px-2 text-center text-gray-600 border-l border-slate-300 absolute top-1/2 right-0 p-1 rounded-e-md translate-y-[-50%]"
                                    >
                                        mg/dl
                                    </span>
                                </div>
                                <span
                                    class="text-red-500 text-xs"
                                    v-if="form.errors.hdl_cholesterol"
                                    >{{ form.errors.hdl_cholesterol }}</span
                                >
                            </div>

                            <div class="flex flex-col gap-1 text-sm">
                                <label
                                    for="non_hdl_cholesterol"
                                    class="text-gray-600 text-xs"
                                    >Cholesterol nie-HDL
                                </label>
                                <div class="w-full relative">
                                    <input
                                        type="number"
                                        step="0.01"
                                        class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-300 p-2 pr-14 text-sm"
                                        v-model="form.non_hdl_cholesterol"
                                    />
                                    <span
                                        class="text-xs block w-fit px-2 text-center text-gray-600 border-l border-slate-300 absolute top-1/2 right-0 p-1 rounded-e-md translate-y-[-50%]"
                                    >
                                        mg/dl
                                    </span>
                                </div>
                                <span
                                    class="text-red-500 text-xs"
                                    v-if="form.errors.non_hdl_cholesterol"
                                    >{{ form.errors.non_hdl_cholesterol }}</span
                                >
                            </div>

                            <div class="flex flex-col gap-1 text-sm">
                                <label
                                    for="ldl_cholesterol"
                                    class="text-gray-600 text-xs"
                                    >Cholesterol LDL
                                </label>
                                <div class="w-full relative">
                                    <input
                                        type="number"
                                        step="0.01"
                                        class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-300 p-2 pr-14 text-sm"
                                        v-model="form.ldl_cholesterol"
                                    />
                                    <span
                                        class="text-xs block w-fit px-2 text-center text-gray-600 border-l border-slate-300 absolute top-1/2 right-0 p-1 rounded-e-md translate-y-[-50%]"
                                    >
                                        mg/dl
                                    </span>
                                </div>
                                <span
                                    class="text-red-500 text-xs"
                                    v-if="form.errors.ldl_cholesterol"
                                    >{{ form.errors.ldl_cholesterol }}</span
                                >
                            </div>

                            <div class="flex flex-col gap-1 text-sm">
                                <label
                                    for="triglycerides"
                                    class="text-gray-600 text-xs"
                                    >Triglicerydy (TG)
                                </label>
                                <div class="w-full relative">
                                    <input
                                        type="number"
                                        step="0.01"
                                        class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-300 p-2 pr-14 text-sm"
                                        v-model="form.triglycerides"
                                    />
                                    <span
                                        class="text-xs block w-fit px-2 text-center text-gray-600 border-l border-slate-300 absolute top-1/2 right-0 p-1 rounded-e-md translate-y-[-50%]"
                                    >
                                        mg/dl
                                    </span>
                                </div>
                                <span
                                    class="text-red-500 text-xs"
                                    v-if="form.errors.triglycerides"
                                    >{{ form.errors.triglycerides }}</span
                                >
                            </div>
                        </div>
                        <!-- Cholesterol -->
                    </div>
                </div>

                <div class="w-full">
                    <PrimaryButton
                        :type="'submit'"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                        >Zapisz</PrimaryButton
                    >
                </div>
            </form>
        </div>

        <!-- Zalecenia specjalisty -->
        <div
            class="flex flex-col gap-6 w-full lg:w-[calc(50%-12px)] bg-white rounded-2xl shadow p-6 h-fit sticky lg:top-[87px]"
        >
            <div class="flex flex-col gap-2">
                <div class="flex gap-2 items-center">
                    <div
                        class="flex justify-center items-center bg-blue-200 size-12 rounded-2xl"
                    >
                        <i
                            class="fa-solid fa-user-doctor text-blue-600 text-xl"
                        ></i>
                    </div>
                    <h4 class="text-2xl font-normal">
                        Zalecenia wirtualnego specjalisty
                    </h4>
                </div>
                <span
                    v-if="user.blood_recommendations"
                    class="text-sm text-gray-600"
                    >Ocena na podstawie twoich wyników badań.</span
                >
                <span v-else class="text-sm text-gray-600"
                    >Wypełnij wyniki swoich badań aby uzyskać
                    rekomendacje.</span
                >
            </div>
            <div
                v-if="user.blood_recommendations"
                v-html="user.blood_recommendations"
                class="text-sm leading-6"
            ></div>
        </div>
    </div>
</template>
