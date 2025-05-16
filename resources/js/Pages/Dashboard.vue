<script setup>
import { Link, usePage } from "@inertiajs/vue3";
import ApexCharts from "apexcharts";
import { computed } from "vue";

const page = usePage();
const user = computed(() => page.props.user);

const props = defineProps({
    weights: Array,
    dates: Array,
    systolics: Array,
    diastolics: Array,
    blood_dates: Array,
    last_pressure: Object,
});

var options = {
    series: [
        {
            name: "Waga",
            data: props.weights,
        },
    ],

    chart: {
        type: "area",
        height: 180,
        zoom: {
            enabled: false,
        },
        toolbar: {
            show: false,
        },
        tooltip: {
            enabled: false,
        },
        locales: [
            {
                name: "en",
                options: {
                    months: [
                        "Styczeń",
                        "Luty",
                        "Marzec",
                        "Kwiecień",
                        "Maj",
                        "Czerwiec",
                        "Lipiec",
                        "Sierpień",
                        "Wrzesień",
                        "Październik",
                        "Listopad",
                        "Grudzień",
                    ],
                    shortMonths: [
                        "Sty",
                        "Lut",
                        "Mar",
                        "Kwi",
                        "Maj",
                        "Cze",
                        "Lip",
                        "Sie",
                        "Wrz",
                        "Paź",
                        "Lis",
                        "Gru",
                    ],
                    days: [
                        "Niedziela",
                        "Poniedziałek",
                        "Wtorek",
                        "Środa",
                        "Czwartek",
                        "Piątek",
                        "Sobota",
                    ],
                    shortDays: ["Nd", "Pn", "Wt", "Śr", "Cz", "Pt", "Sb"],
                },
            },
        ],
    },
    dataLabels: {
        enabled: false,
    },
    stroke: {
        curve: "smooth",
        width: 3,
    },

    labels: props.dates,
    xaxis: {
        type: "category",
    },
    yaxis: {
        opposite: true,
    },
    legend: {
        horizontalAlign: "left",
    },
};

var optionsHeart = {
    colors: ["#be3434", "#e2bebe"],

    legend: {
        show: false,
    },
    series: [
        {
            name: "Ciśnienie skurczowe",
            data: props.systolics,
        },
        {
            name: "Ciśnienie rozkurczowe",
            data: props.diastolics,
        },
    ],
    chart: {
        height: 180,
        type: "line",
        zoom: {
            enabled: false,
        },
        toolbar: {
            show: false,
        },
    },
    dataLabels: {
        enabled: false,
    },
    stroke: {
        curve: "straight",
        width: 3,
    },
    labels: props.blood_dates,
    xaxis: {
        type: "category",
    },
};

onMounted(() => {
    var chart = new ApexCharts(document.querySelector("#chart"), options);
    chart.render();

    var chartHeart = new ApexCharts(
        document.querySelector("#chart-heart"),
        optionsHeart
    );
    chartHeart.render();
});
</script>

<script>
import MainLayout from "@/Layouts/MainLayout.vue";
import { onMounted } from "vue";
export default {
    layout: MainLayout,
    loading: false,
};
</script>

<template>
    <div class="flex flex-col mb-6">
        <h1 class="text-4xl font-normal">Dzień dobry, {{ user.name }}!</h1>
    </div>
    <div class="flex flex-col xl:flex-row lg:items-start gap-6">
        <div
            class="flex flex-col w-full xl:w-2/3 lg:flex-row items-start flex-wrap gap-6"
        >
            <div
                class="w-full h-fit lg:w-[calc(50%-12px)] flex bg-white border border-gray-200 rounded-2xl p-4 flex-col gap-2"
            >
                <div class="flex gap-2 items-center">
                    <div
                        class="flex justify-center items-center bg-blue-200 size-12 rounded-2xl"
                    >
                        <i
                            class="fa-solid fa-weight-scale text-blue-600 text-xl"
                        ></i>
                    </div>
                    <h4 class="text-2xl font-normal">Waga</h4>
                </div>
                <span v-if="user.proper_weight" class="text-sm text-gray-600"
                    >Prawidłowy zakres wagi na podstawie twoich danych to
                    {{ user.proper_weight }}</span
                >
                <span v-else class="text-sm text-gray-600"
                    >Uzupełnij
                    <Link class="text-blue-600" :href="route('profile.index')"
                        >podstawowe dane profilu</Link
                    >, aby obliczyć prawidłowy zakres wagi.</span
                >
                <div id="chart"></div>
                <div class="flex justify-between items-end">
                    <p v-if="user.weight" class="text-6xl font-light">
                        {{ user.weight
                        }}<span class="text-base font-ligh">kg</span>
                    </p>
                    <p v-else class="text-2xl font-light">
                        brak danych<span class="text-base font-ligh"></span>
                    </p>
                    <button
                        href=""
                        class="text-white text-sm bg-blue-600 px-4 py-2 rounded-full flex justify-center items-center gap-2"
                    >
                        Dodaj pomiar <i class="fa-solid fa-plus"></i>
                    </button>
                </div>
            </div>
            <div
                class="w-full lg:w-[calc(50%-12px)] h-fit flex bg-white border border-gray-200 rounded-2xl p-4 flex-col gap-2"
            >
                <div class="flex gap-2 items-center">
                    <div
                        class="flex justify-center items-center bg-red-200 size-12 rounded-2xl"
                    >
                        <i class="fa-solid fa-heart text-red-600 text-xl"></i>
                    </div>
                    <h4 class="text-2xl font-normal">Ciśnienie krwi</h4>
                </div>
                <span class="text-sm text-gray-600"
                    >Twoje prawidłowe ciśnienie to 120-130/80-90 mmHg</span
                >
                <div id="chart-heart"></div>
                <div class="flex justify-between items-end">
                    <p v-if="props.last_pressure" class="text-6xl font-light">
                        {{ props.last_pressure.systolic }}/{{
                            props.last_pressure.diastolic
                        }}
                        <span class="text-base font-ligh">mmHg</span>
                    </p>
                    <p v-else class="text-2xl font-light">
                        brak danych<span class="text-base font-ligh"></span>
                    </p>
                    <button
                        href=""
                        class="text-white text-sm bg-red-600 px-4 py-2 rounded-full flex justify-center items-center gap-2"
                    >
                        Dodaj pomiar <i class="fa-solid fa-plus"></i>
                    </button>
                </div>
            </div>
            <div
                class="w-full h-fit flex bg-white border border-gray-200 rounded-2xl p-4 flex-col gap-2 mt-0"
            >
                <div class="flex gap-2 items-center">
                    <div
                        class="flex justify-center items-center bg-green-200 size-12 rounded-2xl"
                    >
                        <i
                            class="fa-solid fa-user-doctor text-green-600 text-xl"
                        ></i>
                    </div>
                    <h4 class="text-2xl font-normal">Wirtualny specjalista</h4>
                </div>
                <span class="text-sm text-gray-600"
                    >Ocena na podstawie twoich wyników badań.</span
                >
                <div class="flex">
                    <div
                        class="mt-2 text-sm"
                        v-html="user.blood_recommendations"
                    ></div>
                </div>
            </div>
        </div>
        <div class="flex w-full xl:w-1/3">
            <div
                class="w-full flex bg-white border border-gray-200 rounded-2xl p-4 flex-col gap-2"
            >
                <div class="flex gap-2 items-center">
                    <div
                        class="flex justify-center items-center bg-blue-200 size-12 rounded-2xl"
                    >
                        <i
                            class="fa-solid fa-folder-open text-blue-600 text-xl"
                        ></i>
                    </div>
                    <h4 class="text-2xl font-normal">Twoje dokumenty</h4>
                    <button
                        class="text-white text-sm bg-blue-600 size-9 ml-auto mr-0 rounded-full flex justify-center items-center"
                    >
                        <i class="fa-solid fa-plus text-base"></i>
                    </button>
                </div>
                <div class="flex flex-col gap-4 w-full">
                    <div
                        class="flex gap-6 justify-between items-center mt-4 w-full border-b border-gray-200 pb-4"
                    >
                        <div class="size-12">
                            <div
                                class="size-12 rounded-2xl bg-gray-100 flex justify-center items-center"
                            >
                                <i
                                    class="fa-solid fa-file-lines text-blue-600 text-2xl"
                                ></i>
                            </div>
                        </div>
                        <div class="flex-grow flex justify-start">
                            <flex class="flex-col">
                                <h4 class="text-base font-normal mb-0">
                                    morfologia_2025.pdf
                                </h4>
                                <span class="text-xs text-gray-600">2 MB</span>
                            </flex>
                        </div>
                        <div class="flex-grow flex justify-end">
                            <span class="text-gray-600 text-sm"
                                >2 Luty 2025</span
                            >
                        </div>
                        <div
                            class="size-4 ml-auto mr-0 flex justify-end items-center"
                        >
                            <button class="text-gray-600">
                                <i class="fa-solid fa-ellipsis"></i>
                            </button>
                        </div>
                    </div>

                    <div
                        class="flex gap-6 justify-between items-center mt-4 w-full border-b border-gray-200 pb-4"
                    >
                        <div class="size-12">
                            <div
                                class="size-12 rounded-2xl bg-gray-100 flex justify-center items-center"
                            >
                                <i
                                    class="fa-solid fa-file-lines text-blue-600 text-2xl"
                                ></i>
                            </div>
                        </div>
                        <div class="flex-grow flex justify-start">
                            <flex class="flex-col">
                                <h4 class="text-base font-normal mb-0">
                                    wyniki_krwi.pdf
                                </h4>
                                <span class="text-xs text-gray-600"
                                    >1.5 MB</span
                                >
                            </flex>
                        </div>
                        <div class="flex-grow flex justify-end">
                            <span class="text-gray-600 text-sm"
                                >28 Styczeń 2025</span
                            >
                        </div>
                        <div class="size-4 mr-0 flex justify-end items-center">
                            <button class="text-gray-600">
                                <i class="fa-solid fa-ellipsis"></i>
                            </button>
                        </div>
                    </div>

                    <div
                        class="flex gap-6 justify-between items-center mt-4 w-full border-b border-gray-200 pb-4"
                    >
                        <div class="size-12">
                            <div
                                class="size-12 rounded-2xl bg-gray-100 flex justify-center items-center"
                            >
                                <i
                                    class="fa-solid fa-file-lines text-blue-600 text-2xl"
                                ></i>
                            </div>
                        </div>
                        <div class="flex-grow flex justify-start">
                            <flex class="flex-col">
                                <h4 class="text-base font-normal mb-0">
                                    badanie_serca.pdf
                                </h4>
                                <span class="text-xs text-gray-600">3 MB</span>
                            </flex>
                        </div>
                        <div class="flex-grow flex justify-end">
                            <span class="text-gray-600 text-sm"
                                >15 Styczeń 2025</span
                            >
                        </div>
                        <div class="size-4 mr-0 flex justify-end items-center">
                            <button class="text-gray-600">
                                <i class="fa-solid fa-ellipsis"></i>
                            </button>
                        </div>
                    </div>

                    <div
                        class="flex gap-6 justify-between items-center mt-4 w-full border-b border-gray-200 pb-4"
                    >
                        <div class="size-12">
                            <div
                                class="size-12 rounded-2xl bg-gray-100 flex justify-center items-center"
                            >
                                <i
                                    class="fa-solid fa-file-lines text-blue-600 text-2xl"
                                ></i>
                            </div>
                        </div>
                        <div class="flex-grow flex justify-start">
                            <flex class="flex-col">
                                <h4
                                    class="text-base font-normal mb-0 text-pretty"
                                >
                                    analiza_hormonalna.pdf
                                </h4>
                                <span class="text-xs text-gray-600"
                                    >2.3 MB</span
                                >
                            </flex>
                        </div>
                        <div class="flex-grow flex justify-end">
                            <span class="text-gray-600 text-sm"
                                >10 Styczeń 2025</span
                            >
                        </div>
                        <div class="size-4 mr-0 flex justify-end items-center">
                            <button class="text-gray-600">
                                <i class="fa-solid fa-ellipsis"></i>
                            </button>
                        </div>
                    </div>

                    <div
                        class="flex gap-6 justify-between items-center mt-4 w-full border-b border-gray-200 pb-4 last:border-0 last:pb-2"
                    >
                        <div class="size-12">
                            <div
                                class="size-12 rounded-2xl bg-gray-100 flex justify-center items-center"
                            >
                                <i
                                    class="fa-solid fa-file-lines text-blue-600 text-2xl"
                                ></i>
                            </div>
                        </div>
                        <div class="flex-grow flex justify-start">
                            <flex class="flex-col">
                                <h4 class="text-base font-normal mb-0">
                                    skan_recepty.pdf
                                </h4>
                                <span class="text-xs text-gray-600">1 MB</span>
                            </flex>
                        </div>
                        <div class="flex-grow flex justify-end">
                            <span class="text-gray-600 text-sm"
                                >5 Styczeń 2025</span
                            >
                        </div>
                        <div class="size-4 mr-0 flex justify-end items-center">
                            <button class="text-gray-600">
                                <i class="fa-solid fa-ellipsis"></i>
                            </button>
                        </div>
                    </div>
                    <div
                        class="flex gap-6 justify-between items-center mt-4 w-full border-b border-gray-200 pb-4 last:border-0 last:pb-2"
                    >
                        <div class="size-12">
                            <div
                                class="size-12 rounded-2xl bg-gray-100 flex justify-center items-center"
                            >
                                <i
                                    class="fa-solid fa-file-lines text-blue-600 text-2xl"
                                ></i>
                            </div>
                        </div>
                        <div class="flex-grow flex justify-start">
                            <flex class="flex-col">
                                <h4 class="text-base font-normal mb-0">
                                    skan_recepty.pdf
                                </h4>
                                <span class="text-xs text-gray-600">1 MB</span>
                            </flex>
                        </div>
                        <div class="flex-grow flex justify-end">
                            <span class="text-gray-600 text-sm"
                                >5 Styczeń 2025</span
                            >
                        </div>
                        <div class="size-4 mr-0 flex justify-end items-center">
                            <button class="text-gray-600">
                                <i class="fa-solid fa-ellipsis"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
