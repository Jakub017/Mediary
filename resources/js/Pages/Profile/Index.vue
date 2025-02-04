<script setup>
import { useForm, usePage } from "@inertiajs/vue3";

const page = usePage();
const user = page.props.user;

const form = useForm({
    location: user.location || "",
    birthday: user.birthday || "",
    gender: user.gender || "",
    weight: user.weight || "",
    height: user.height || "",
    diseases: user.diseases || "",
});

const submit = () => form.patch(route("profile.update", user.id));
</script>

<script>
import MainLayout from "@/Layouts/MainLayout.vue";
export default {
    layout: MainLayout,
    loading: false,
};
</script>

<template>
    <div class="flex flex-wrap gap-4 w-full">
        <div
            class="flex flex-col gap-6 w-full xl:w-[calc(50%-8px)] bg-white rounded-md border-[1px] border-slate-200 p-6 h-fit"
        >
            <div class="flex flex-col gap-2">
                <h2 class="text-lg font-medium text-black">Podstawowe dane</h2>
                <span class="text-xs text-gray-400 font-normal"
                    >W tym miejscu możesz wyprowadzic lub zaktualizowac swoje
                    dane pacjenta.</span
                >
            </div>

            <form @submit.prevent="submit" class="flex flex-wrap gap-4">
                <div class="w-full flex flex-wrap gap-4">
                    <div
                        class="flex flex-col gap-1 w-full lg:w-[calc(33%-12px)] text-sm"
                    >
                        <label for="location" class="dark:text-white"
                            >Miejsce zamieszkania</label
                        >
                        <input
                            type="text"
                            placeholder="Np. Warszawa"
                            class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-400 p-2 text-sm"
                            v-model="form.location"
                        />
                        <span
                            class="text-red-500 text-xs"
                            v-if="form.errors.location"
                            >{{ form.errors.location }}</span
                        >
                    </div>
                    <div
                        class="flex flex-col gap-1 w-full lg:w-[calc(33%-12px)] text-sm"
                    >
                        <label for="birthday" class="dark:text-white"
                            >Data urodzenia</label
                        >
                        <input
                            type="date"
                            placeholder="Twoja waga"
                            class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-400 p-2 text-sm"
                            v-model="form.birthday"
                        />
                        <span
                            class="text-red-500 text-xs"
                            v-if="form.errors.birthday"
                            >{{ form.errors.birthday }}</span
                        >
                    </div>

                    <div
                        class="flex flex-col gap-1 w-full lg:w-[calc(33%-12px)] text-sm"
                    >
                        <label for="gender" class="dark:text-white">Płec</label>
                        <select
                            id="gender"
                            class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-400 p-2 text-sm"
                            v-model="form.gender"
                        >
                            <option value="">Wybierz płec</option>
                            <option value="Kobieta">Kobieta</option>
                            <option value="Mężczyzna">Mężczyzna</option>
                        </select>
                        <span
                            class="text-red-500 text-xs"
                            v-if="form.errors.gender"
                            >{{ form.errors.gender }}</span
                        >
                    </div>
                </div>

                <div class="w-full flex flex-wrap gap-4">
                    <div
                        class="flex flex-col gap-1 w-full lg:w-[calc(33%-12px)] text-sm"
                    >
                        <label for="weight" class="dark:text-white">
                            Waga [kg]
                        </label>
                        <input
                            type="number"
                            placeholder="Twoja waga"
                            class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-400 p-2 text-sm"
                            v-model="form.weight"
                        />
                        <span
                            class="text-red-500 text-xs"
                            v-if="form.errors.weight"
                            >{{ form.errors.weight }}</span
                        >
                    </div>
                    <div
                        class="flex flex-col gap-1 w-full lg:w-[calc(33%-12px)] text-sm"
                    >
                        <label for="height" class="dark:text-white">
                            Wzrost [cm]
                        </label>
                        <input
                            type="number"
                            placeholder="Twój wzrost"
                            class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-400 p-2 text-sm"
                            v-model="form.height"
                        />
                        <span
                            class="text-red-500 text-xs"
                            v-if="form.errors.height"
                            >{{ form.errors.height }}</span
                        >
                    </div>
                </div>

                <div class="w-full flex flex-wrap gap-4">
                    <div class="w-full flex">
                        <div class="flex flex-col gap-1 w-full text-sm">
                            <label for="diseases" class="dark:text-white"
                                >Stwierdzone choroby</label
                            >
                            <textarea
                                type="text"
                                placeholder="Np. cukrzyca, otyłość, nadciśnienie tętnicze..."
                                class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-400 p-2 text-sm resize-none h-28"
                                v-model="form.diseases"
                            ></textarea>
                            <span
                                class="text-red-500 text-xs"
                                v-if="form.errors.diseases"
                                >{{ form.errors.diseases }}</span
                            >
                        </div>
                    </div>
                </div>

                <div class="w-full">
                    <button type="submit">Zapisz</button>
                </div>
            </form>
        </div>
        <div
            class="flex flex-col gap-6 w-full xl:w-[calc(50%-8px)] bg-white rounded-md border-[1px] border-slate-200 p-6 h-fit"
        >
            <div class="flex flex-col gap-2">
                <h2 class="text-lg font-medium text-black">Ostatnie pomiary</h2>
                <span class="text-xs text-gray-400 font-normal"
                    >W tym miejscu mozesz wprowadzac swoje ostatnie pomiary
                    tętna, ciśnienia, czy saturacji krwi.</span
                >
            </div>

            <form action="#" method="POST" class="flex flex-wrap gap-4">
                @csrf @METHOD('POST')

                <div class="w-full flex flex-wrap gap-4">
                    <div
                        class="flex flex-col gap-1 w-full lg:w-[calc(33%-12px)] text-sm"
                    >
                        <label for="measurement_date" class="dark:text-white"
                            >Data pomiaru</label
                        >
                        <input
                            type="date"
                            name="measurement_date"
                            placeholder=""
                            class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-400 p-2 text-sm"
                            value="{{ \Carbon\Carbon::today()->format('Y-m-d') }}"
                        />
                    </div>
                    <div
                        class="flex flex-col gap-1 w-full lg:w-[calc(33%-12px)] text-sm"
                    >
                        <label for="blood_pressure" class="dark:text-white"
                            >Ciśnienie krwi</label
                        >
                        <input
                            type="text"
                            name="blood_pressure"
                            placeholder="Np. 120/60"
                            class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-400 p-2 text-sm"
                        />
                    </div>

                    <div
                        class="flex flex-col gap-1 w-full lg:w-[calc(33%-12px)] text-sm"
                    >
                        <label for="heart_rate" class="dark:text-white"
                            >Tętno</label
                        >
                        <input
                            type="number"
                            name="heart_rate"
                            placeholder="Np. 60"
                            class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-400 p-2 text-sm"
                        />
                    </div>
                </div>

                <div class="w-full flex flex-wrap gap-4">
                    <div
                        class="flex flex-col gap-1 w-full lg:w-[calc(33%-12px)] text-sm"
                    >
                        <label for="saturation" class="dark:text-white">
                            Saturacja krwi
                        </label>
                        <input
                            type="number"
                            name="saturation"
                            placeholder="Np. 99"
                            class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-400 p-2 text-sm"
                        />
                    </div>
                </div>

                <div class="w-full flex flex-wrap gap-4">
                    <x-primary-button>Zapisz</x-primary-button>

                    <x-secondary-button>Eksport do pdf</x-secondary-button>
                </div>
            </form>
        </div>
        <div
            class="flex flex-col gap-6 w-full xl:w-[calc(50%-8px)] bg-white rounded-md border-[1px] border-slate-200 p-6 h-fit"
        >
            <div class="flex flex-col gap-2">
                <h2 class="text-lg font-medium text-black">
                    Dokumentacja medyczna
                </h2>
                <span class="text-xs text-gray-400 font-normal"
                    >W tym miejscu mozesz przesłac pliki twojej dokumentacji
                    medycznej.</span
                >
            </div>
        </div>
    </div>
</template>
