<template>
    <div class="flex flex-wrap gap-6">
        <div
            class="flex flex-col gap-6 w-full lg:w-[calc(50%-12px)] bg-white rounded-2xl border-[1px] border-slate-200 p-6 h-fit"
        >
            <div class="flex flex-col gap-2">
                <div class="flex gap-2 items-center">
                    <div
                        class="flex justify-center items-center bg-blue-200 size-12 rounded-2xl"
                    >
                        <i
                            class="fa-solid fa-circle-info text-blue-600 text-xl"
                        ></i>
                    </div>
                    <h4 class="text-2xl font-normal">Informacje o pliku</h4>
                </div>
                <span class="text-sm text-gray-600"
                    >Lorem ipsum dolor sit amet consectetur adipisicing
                    elit.</span
                >
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="col-span-3 md:col-span-1 flex flex-col gap-1">
                    <span class="text-sm font-semibold text-blue-600"
                        >Nazwa pliku</span
                    >
                    <span class="text-sm">{{ file.filename }}</span>
                </div>

                <div class="col-span-3 md:col-span-1 flex flex-col gap-1">
                    <span class="text-sm font-semibold text-blue-600"
                        >Data przesłania</span
                    >
                    <span class="text-sm">{{
                        formatDate(file.created_at)
                    }}</span>
                </div>

                <div class="col-span-3 md:col-span-1 flex flex-col gap-1">
                    <span class="text-sm font-semibold text-blue-600"
                        >Rozmiar pliku</span
                    >
                    <span class="text-sm">{{ file.size }} MB</span>
                </div>

                <div class="col-span-1 md:col-span-3 flex flex-col gap-1">
                    <span class="text-sm font-semibold text-blue-600"
                        >Podsumowanie</span
                    >
                    <div
                        v-html="file.review"
                        class="text-sm flex flex-col gap-2"
                    ></div>
                </div>
            </div>
        </div>

        <div
            class="flex flex-col gap-6 w-full max-h-[700px] lg:w-[calc(50%-12px)] bg-white rounded-2xl border-[1px] border-slate-200 p-6 h-fit"
        >
            <div class="flex flex-col gap-2">
                <div class="flex gap-2 items-center">
                    <div
                        class="flex justify-center items-center bg-blue-200 size-12 rounded-2xl"
                    >
                        <i class="fa-solid fa-file text-blue-600 text-xl"></i>
                    </div>
                    <h4 class="text-2xl font-normal">Podgląd pliku</h4>
                </div>
                <span class="text-sm text-gray-600"
                    >Lorem ipsum dolor sit amet consectetur adipisicing
                    elit.</span
                >
            </div>
            <div class="w-full max-h-full">
                <VPdfViewer class="max-h-full" :src="'/storage/' + file.path" />
            </div>
        </div>
    </div>
</template>

<script setup>
import MainLayout from "@/Layouts/MainLayout.vue";
import { VPdfViewer } from "@vue-pdf-viewer/viewer";
defineOptions({
    layout: MainLayout,
});

const props = defineProps({
    file: Object,
});

const formatDate = (date) => {
    let newDate = new Date(date);
    return newDate.toLocaleDateString("pl-PL", {
        day: "numeric",
        month: "long",
        year: "numeric",
    });
};
</script>
