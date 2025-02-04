<script setup>
import { useForm, usePage } from "@inertiajs/vue3";

const page = usePage();
const user = page.props.user;

const form = useForm({
    wbc: user.wbc || null,
    rbc: user.rbc || null,
    hgb: user.hgb || null,
    hct: user.hct || null,
    mcv: user.mcv || null,
    mch: user.mch || null,
    mchc: user.mchc || null,
    plt: user.plt || null,
    rdw_sd: user.rdw_sd || null,
    rdw_cv: user.rdw_cv || null,
    pdw: user.pdw || null,
    mpv: user.mpv || null,
    p_lcr: user.p_lcr || null,
    pct: user.pct || null,
    neu: user.neu || null,
    lym: user.lym || null,
    mono: user.mono || null,
    eos: user.eos || null,
    baso: user.baso || null,
    tsh: user.tsh || null,
    ast: user.ast || null,
    alt: user.alt || null,
    bilirubin: user.bilirubin || null,
    alp: user.alp || null,
    ggtp: user.ggtp || null,
    total_cholesterol: user.total_cholesterol || null,
    hdl_cholesterol: user.hdl_cholesterol || null,
    non_hdl_cholesterol: user.non_hdl_cholesterol || null,
    ldl_cholesterol: user.ldl_cholesterol || null,
    triglycerides: user.triglycerides || null,
});

const submit = () => form.patch(route("blood.update", user.id));
</script>

<script>
import MainLayout from "@/Layouts/MainLayout.vue";
export default {
    layout: MainLayout,
    loading: false,
};
</script>

<template>
    <div class="flex flex-wrap gap-6">
        <div
            class="flex flex-col gap-6 w-full xl:w-[calc(50%-12px)] bg-white rounded-md border-[1px] border-slate-200 p-6 h-fit"
        >
            <form class="w-full flex flex-col gap-8" @submit.prevent="submit">
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
                    </div>

                    <div class="dropdown-content w-full flex flex-wrap gap-4">
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
                                v-model="form.wbc"
                                step="0.01"
                                class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-400 p-2 text-sm"
                            />
                            <span
                                class="text-red-500 text-xs"
                                v-if="form.errors.wbc"
                                >{{ form.errors.wbc }}</span
                            >
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
                                v-model="form.rbc"
                                step="0.01"
                                class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-400 p-2 text-sm"
                            />
                            <span
                                class="text-red-500 text-xs"
                                v-if="form.errors.rbc"
                                >{{ form.errors.rbc }}</span
                            >
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
                                step="0.01"
                                class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-400 p-2 text-sm"
                                v-model="form.hgb"
                            />
                            <span
                                class="text-red-500 text-xs"
                                v-if="form.errors.hgb"
                                >{{ form.errors.hgb }}</span
                            >
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
                                step="0.01"
                                class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-400 p-2 text-sm"
                                v-model="form.hct"
                            />
                            <span
                                class="text-red-500 text-xs"
                                v-if="form.errors.hct"
                                >{{ form.errors.hct }}</span
                            >
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
                                step="0.01"
                                class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-400 p-2 text-sm"
                                v-model="form.mcv"
                            />
                            <span
                                class="text-red-500 text-xs"
                                v-if="form.errors.mcv"
                                >{{ form.errors.mcv }}</span
                            >
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
                                step="0.01"
                                class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-400 p-2 text-sm"
                                v-model="form.mch"
                            />
                            <span
                                class="text-red-500 text-xs"
                                v-if="form.errors.mch"
                                >{{ form.errors.mch }}</span
                            >
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
                                step="0.01"
                                class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-400 p-2 text-sm"
                                v-model="form.mchc"
                            />
                            <span
                                class="text-red-500 text-xs"
                                v-if="form.errors.mchc"
                                >{{ form.errors.mchc }}</span
                            >
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
                                step="0.01"
                                class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-400 p-2 text-sm"
                                v-model="form.plt"
                            />
                            <span
                                class="text-red-500 text-xs"
                                v-if="form.errors.plt"
                                >{{ form.errors.plt }}</span
                            >
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
                                step="0.01"
                                class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-400 p-2 text-sm"
                                v-model="form.rdw_sd"
                            />
                            <span
                                class="text-red-500 text-xs"
                                v-if="form.errors.rdw_sd"
                                >{{ form.errors.rdw_sd }}</span
                            >
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
                                step="0.01"
                                class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-400 p-2 text-sm"
                                v-model="form.rdw_cv"
                            />
                            <span
                                class="text-red-500 text-xs"
                                v-if="form.errors.rdw_cv"
                                >{{ form.errors.rdw_cv }}</span
                            >
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
                                step="0.01"
                                class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-400 p-2 text-sm"
                                v-model="form.pdw"
                            />
                            <span
                                class="text-red-500 text-xs"
                                v-if="form.errors.pdw"
                                >{{ form.errors.pdw }}</span
                            >
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
                                step="0.01"
                                class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-400 p-2 text-sm"
                                v-model="form.mpv"
                            />
                            <span
                                class="text-red-500 text-xs"
                                v-if="form.errors.mpv"
                                >{{ form.errors.mpv }}</span
                            >
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
                                step="0.01"
                                class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-400 p-2 text-sm"
                                v-model="form.p_lcr"
                            />
                            <span
                                class="text-red-500 text-xs"
                                v-if="form.errors.p_lcr"
                                >{{ form.errors.p_lcr }}</span
                            >
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
                                step="0.01"
                                class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-400 p-2 text-sm"
                                v-model="form.pct"
                            />
                            <span
                                class="text-red-500 text-xs"
                                v-if="form.errors.pct"
                                >{{ form.errors.pct }}</span
                            >
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
                                step="0.01"
                                class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-400 p-2 text-sm"
                                v-model="form.neu"
                            />
                            <span
                                class="text-red-500 text-xs"
                                v-if="form.errors.neu"
                                >{{ form.errors.neu }}</span
                            >
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
                                step="0.01"
                                class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-400 p-2 text-sm"
                                v-model="form.lym"
                            />
                            <span
                                class="text-red-500 text-xs"
                                v-if="form.errors.lym"
                                >{{ form.errors.lym }}</span
                            >
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
                                step="0.01"
                                class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-400 p-2 text-sm"
                                v-model="form.mono"
                            />
                            <span
                                class="text-red-500 text-xs"
                                v-if="form.errors.mono"
                                >{{ form.errors.mono }}</span
                            >
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
                                step="0.01"
                                class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-400 p-2 text-sm"
                                v-model="form.eos"
                            />
                            <span
                                class="text-red-500 text-xs"
                                v-if="form.errors.eos"
                                >{{ form.errors.eos }}</span
                            >
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
                                step="0.01"
                                class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-400 p-2 text-sm"
                                v-model="form.baso"
                            />
                            <span
                                class="text-red-500 text-xs"
                                v-if="form.errors.baso"
                                >{{ form.errors.baso }}</span
                            >
                        </div>
                    </div>
                </div>

                <div class="w-full">
                    <button
                        type="submit"
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
            <div
                v-if="user.blood_recommendations"
                v-html="user.blood_recommendations"
                class="text-sm leading-6"
            ></div>
        </div>
    </div>
</template>
