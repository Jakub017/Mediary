<script setup>
import MainLayout from "@/Layouts/MainLayout.vue";
import { Head } from "@inertiajs/vue3";

defineOptions({
    layout: MainLayout,
});

import { Link, usePage, useForm } from "@inertiajs/vue3";
import ApexCharts from "apexcharts";

import { computed, onMounted } from "vue";

const page = usePage();
const user = computed(() => page.props.user);

const props = defineProps({
    weights: Array,
    dates: Array,
    systolics: Array,
    diastolics: Array,
    blood_dates: Array,
    last_pressure: Object,
    files: Array,
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

const form = useForm({
    file: null,
});

const upload = () => {
    form.post(route("file.store"), {
        onSuccess: () => {
            form.reset();
            document.querySelector("#add-file-modal").classList.add("hidden");
            document
                .querySelector("#add-file-background")
                .classList.add("hidden");
        },
    });
};

const addFile = (e) => {
    form.file = e.target.files[0];
    if (form.file) {
        upload();
    }
};

const formatDate = (myDate) => {
    let customDate = new Date(myDate);
    return customDate.toLocaleDateString("pl-PL", {
        day: "numeric",
        month: "long",
        year: "numeric",
    });
};

onMounted(() => {
    var chart = new ApexCharts(document.querySelector("#chart"), options);
    chart.render();

    var chartHeart = new ApexCharts(
        document.querySelector("#chart-heart"),
        optionsHeart
    );
    chartHeart.render();

    const addFileBtn = document.querySelector("#add-file");
    const addFileBackground = document.querySelector("#add-file-background");
    const addFileModal = document.querySelector("#add-file-modal");
    const closeModalBtn = document.querySelector("#close-file-modal");

    addFileBtn.addEventListener("click", () => {
        addFileModal.classList.remove("hidden");
        addFileBackground.classList.remove("hidden");
    });

    closeModalBtn.addEventListener("click", () => {
        addFileModal.classList.add("hidden");
        addFileBackground.classList.add("hidden");
    });

    addFileBackground.addEventListener("click", () => {
        if (!addFileModal.classList.contains("hidden")) {
            addFileModal.classList.add("hidden");
            addFileBackground.classList.add("hidden");
        }
    });
});
</script>

<template>
    <Head>
        <title>Pulpit</title>
    </Head>
    <!-- Start popup -->
    <div
        id="add-file-background"
        class="hidden fixed w-full h-full top-0 left-0 bg-black opacity-35 z-50"
    ></div>

    <div
        id="add-file-modal"
        class="hidden fixed bg-white rounded-2xl top-1/2 left-1/2 translate-x-[-50%] translate-y-[-50%] p-4 z-[51] w-[90%] max-w-[600px]"
    >
        <div class="flex justify-between items-center">
            <h2 for="cover-photo" class="text-xl font-normal">Prześlij plik</h2>
            <button id="close-file-modal">
                <i
                    class="fa-solid fa-xmark text-xl text-gray-300 duration-200 hover:text-gray-400"
                ></i>
            </button>
        </div>

        <form @submit.prevent="upload" class="mt-2 flex flex-col gap-2">
            <div
                class="text-center flex flex-col justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10"
            >
                <i class="fa-solid fa-file text-4xl text-gray-200"></i>
                <div
                    class="mt-4 flex text-sm leading-6 text-gray-600 justify-center"
                >
                    <label
                        for="file"
                        class="relative cursor-pointer text-center rounded-md bg-white font-semibold duration-200 text-blue-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-blue-600 focus-within:ring-offset-2 hover:text-blue-500"
                    >
                        <span class="text-sm">Wybierz plik z urządzenia</span>
                        <input
                            id="file"
                            @change="addFile"
                            type="file"
                            class="sr-only"
                        />
                    </label>
                </div>
                <p class="text-xs leading-5 text-gray-600">
                    Pliki .pdf, .doc, .docx do 10MB
                </p>
                <span class="text-xs text-red-500" v-if="form.errors.file">{{
                    form.errors.file
                }}</span>
            </div>
            <!-- <label for="scan" class="text-sm text-gray-500"
                ><input
                    disabled
                    class="rounded-md h-4 w-4"
                    type="checkbox"
                    v-model="scan"
                    id="scan"
                />
                Wgrwyam skan
                <span class="text-blue-600 font-semibold">Wkrótce</span>
            </label> -->
        </form>
    </div>
    <!-- End popup -->

    <div class="flex flex-col mb-6">
        <h1 class="text-4xl font-normal">Dzień dobry, {{ user.name }}!</h1>
    </div>
    <div class="flex flex-col xl:flex-row lg:items-start gap-6">
        <div
            class="flex flex-col w-full xl:w-2/3 lg:flex-row items-start flex-wrap gap-6"
        >
            <div
                class="w-full h-fit lg:w-[calc(50%-12px)] flex bg-white shadow rounded-2xl p-4 flex-col gap-2"
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
                <div
                    class="flex justify-between flex-col gap-4 items-start lg:flex-row lg:items-end"
                >
                    <p v-if="user.weight" class="text-6xl font-light">
                        {{ user.weight
                        }}<span class="text-base font-ligh">kg</span>
                    </p>
                    <p v-else class="text-2xl font-light">
                        brak danych<span class="text-base font-ligh"></span>
                    </p>
                    <Link
                        :href="route('profile.index')"
                        class="text-white text-sm bg-blue-600 px-4 py-2 rounded-full flex justify-center items-center gap-2"
                    >
                        Dodaj pomiar <i class="fa-solid fa-plus"></i>
                    </Link>
                </div>
            </div>
            <div
                class="w-full lg:w-[calc(50%-12px)] h-fit flex bg-white shadow rounded-2xl p-4 flex-col gap-2"
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
                    >Twoje ciśnienie powinno mieścić się w granicach 90–129 /
                    60–84 mmHg.</span
                >
                <div id="chart-heart"></div>
                <div
                    class="flex justify-between flex-col gap-4 items-start lg:flex-row lg:items-end"
                >
                    <p v-if="props.last_pressure" class="text-6xl font-light">
                        {{ props.last_pressure.systolic }}/{{
                            props.last_pressure.diastolic
                        }}<span class="text-base font-ligh">mmHg</span>
                    </p>
                    <p v-else class="text-2xl font-light">
                        brak danych<span class="text-base font-ligh"></span>
                    </p>
                    <Link
                        :href="route('profile.index')"
                        class="text-white text-sm bg-red-600 px-4 py-2 rounded-full flex justify-center items-center gap-2"
                    >
                        Dodaj pomiar <i class="fa-solid fa-plus"></i>
                    </Link>
                </div>
            </div>
            <div
                class="w-full h-fit flex bg-white shadow rounded-2xl p-4 flex-col gap-2 mt-0"
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
                <span
                    v-if="user.blood_recommendations"
                    class="text-sm text-gray-600"
                    >Ocena na podstawie twoich wyników badań.</span
                >
                <span v-else class="text-sm text-gray-600">
                    <Link class="text-blue-600" :href="route('blood.index')"
                        >Wypełnij wyniki</Link
                    >
                    swoich badań aby uzyskać rekomendacje.</span
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
                class="w-full flex bg-white shadow rounded-2xl p-4 flex-col gap-2"
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
                        id="add-file"
                        class="text-white text-sm bg-blue-600 size-9 ml-auto mr-0 rounded-full flex justify-center items-center"
                    >
                        <i class="fa-solid fa-plus text-base"></i>
                    </button>
                </div>
                <div class="flex flex-col gap-4 w-full">
                    <div
                        v-for="file in files"
                        :key="file.id"
                        class="flex gap-4 items-start mt-4 w-full border-b border-gray-200 pb-4 last:border-none"
                    >
                        <!-- Ikona -->
                        <div
                            class="flex-shrink-0 size-12 rounded-2xl bg-gray-100 flex justify-center items-center"
                        >
                            <i
                                v-if="file.type == 'doc'"
                                class="fa-solid fa-file text-blue-600 text-xl"
                            ></i>
                            <i
                                v-if="file.type == 'pdf'"
                                class="fa-solid fa-file-pdf text-blue-600 text-xl"
                            ></i>
                        </div>

                        <!-- Nazwa i rozmiar -->
                        <div class="flex-grow flex flex-col overflow-hidden">
                            <Link
                                :href="route('file.show', file.id)"
                                class="text-base font-normal mb-0 break-words"
                            >
                                {{ file.filename }}
                            </Link>
                            <span class="text-xs text-gray-600"
                                >{{ file.size }} MB</span
                            >
                        </div>

                        <!-- Data -->
                        <div class="w-[100px] text-sm text-gray-600 text-right">
                            {{ formatDate(file.created_at) }}
                        </div>

                        <!-- Opcje -->
                        <div class="ml-2 flex-shrink-0">
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
