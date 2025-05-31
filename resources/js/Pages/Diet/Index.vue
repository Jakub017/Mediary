<script setup>
import MainLayout from "@/Layouts/MainLayout.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { useForm, Link } from "@inertiajs/vue3";
import { onMounted } from "vue";

defineOptions({
    layout: MainLayout,
});

defineProps({
    diets: Array,
});

const form = useForm({
    name: "",
    type: "",
    calories: "",
    meals: "",
    like: "",
    dislike: "",
    notes: "",
    documents: false,
});

const formatDate = (date) => {
    let newDate = new Date(date);
    return newDate.toLocaleDateString("pl-PL", {
        day: "numeric",
        month: "long",
        year: "numeric",
    });
};

const submit = () => form.post(route("diet.store"));

onMounted(() => {
    const dietContainers = [...document.querySelectorAll(".diet-container")];
    const dietContents = [...document.querySelectorAll(".diet-content")];

    dietContainers.forEach((container, i) => {
        container.addEventListener("click", () => {
            if (!dietContents[i].classList.contains("diet-content-active")) {
                dietContents[i].classList.remove("hidden");
                dietContents[i].classList.add("diet-content-active");
                dietContents[i].classList.add("flex");
            } else {
                dietContents[i].classList.add("hidden");
                dietContents[i].classList.remove("diet-content-active");
                dietContents[i].classList.remove("flex");
            }
        });
    });
});
</script>

<template>
    <div class="columns-1 lg:columns-2 gap-6 break-inside-avoid">
        <div
            class="flex flex-col gap-6 bg-white rounded-2xl shadow p-6 mb-6 break-inside-avoid"
        >
            <div class="flex flex-col gap-2">
                <div class="flex gap-2 items-center">
                    <div
                        class="flex justify-center items-center bg-blue-200 size-12 rounded-2xl"
                    >
                        <i
                            class="fa-solid fa-utensils text-blue-600 text-xl"
                        ></i>
                    </div>
                    <h4 class="text-2xl font-normal">Stwórz dietę</h4>
                </div>
                <span class="text-sm text-gray-600"
                    >Dostosuj najważniejsze parametry twojej nowej diety.</span
                >
            </div>

            <form @submit.prevent="submit" class="flex flex-wrap gap-4">
                <div class="w-full flex flex-wrap gap-4">
                    <div class="flex flex-col gap-1 text-sm w-full">
                        <label for="name" class="text-gray-600 text-xs"
                            >Nazwa diety</label
                        >
                        <input
                            id="name"
                            type="text"
                            v-model="form.name"
                            class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-300 p-2 text-sm"
                        />
                        <span
                            class="text-red-500 text-xs"
                            v-if="form.errors.name"
                            >{{ form.errors.name }}</span
                        >
                    </div>
                    <div
                        class="flex flex-col gap-1 w-full lg:w-[calc(33%-12px)] text-sm"
                    >
                        <label for="type" class="text-gray-600 text-xs"
                            >Rodzaj diety</label
                        >
                        <select
                            id="type"
                            v-model="form.type"
                            class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-300 p-2 text-sm"
                        >
                            <option value="">Wybierz rodzaj</option>
                            <option value="klasyczna">Klasyczna</option>
                            <option value="wegetariańska">Wegetariańska</option>
                            <option value="wegańska">Wegańska</option>
                            <option value="bezglutenowa">Bezglutenowa</option>
                        </select>
                        <span
                            class="text-red-500 text-xs"
                            v-if="form.errors.type"
                            >{{ form.errors.type }}</span
                        >
                    </div>

                    <div
                        class="flex flex-col gap-1 w-full lg:w-[calc(33%-12px)] text-sm"
                    >
                        <label for="calories" class="text-gray-600 text-xs"
                            >Ilość kalorii</label
                        >
                        <select
                            id="calories"
                            v-model="form.calories"
                            class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-300 p-2 text-sm"
                        >
                            <option value="">Wybierz kaloryczność</option>
                            <option value="1000">1000</option>
                            <option value="1500">1500</option>
                            <option value="2000">2000</option>
                            <option value="2500">2500</option>
                        </select>
                        <span
                            class="text-red-500 text-xs"
                            v-if="form.errors.calories"
                            >{{ form.errors.calories }}</span
                        >
                    </div>

                    <div
                        class="flex flex-col gap-1 w-full lg:w-[calc(33%-12px)] text-sm"
                    >
                        <label for="meals" class="text-gray-600 text-xs"
                            >Ilość posiłków</label
                        >
                        <select
                            id="meals"
                            v-model="form.meals"
                            class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-300 p-2 text-sm"
                        >
                            <option value="">Wybierz ilość</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                        <span
                            class="text-red-500 text-xs"
                            v-if="form.errors.meals"
                            >{{ form.errors.meals }}</span
                        >
                    </div>

                    <div
                        class="flex flex-col gap-1 w-full lg:w-[calc(50%-12px)] text-sm"
                    >
                        <label for="like" class="text-gray-600 text-xs"
                            >Co lubisz jeść?</label
                        >
                        <textarea
                            id="like"
                            type="text"
                            placeholder=""
                            class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-300 p-2 text-sm resize-none h-28"
                            v-model="form.like"
                        ></textarea>
                        <span
                            class="text-red-500 text-xs"
                            v-if="form.errors.like"
                            >{{ form.errors.like }}</span
                        >
                    </div>

                    <div
                        class="flex flex-col gap-1 w-full lg:w-[calc(50%-12px)] text-sm"
                    >
                        <label for="dislike" class="text-gray-600 text-xs"
                            >Czego nie lubisz jeść?</label
                        >
                        <textarea
                            id="dislike"
                            type="text"
                            placeholder=""
                            class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-300 p-2 text-sm resize-none h-28"
                            v-model="form.dislike"
                        ></textarea>
                        <span
                            class="text-red-500 text-xs"
                            v-if="form.errors.dislike"
                            >{{ form.errors.dislike }}</span
                        >
                    </div>

                    <div class="flex flex-col gap-1 w-full text-sm">
                        <label for="notes" class="text-gray-600 text-xs"
                            >Inne uwagi</label
                        >
                        <textarea
                            id="notes"
                            type="text"
                            placeholder=""
                            class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-300 p-2 text-sm resize-none h-28"
                            v-model="form.notes"
                        ></textarea>
                        <span
                            class="text-red-500 text-xs"
                            v-if="form.errors.notes"
                            >{{ form.errors.notes }}</span
                        >
                    </div>

                    <div class="flex flex-col gap-1 w-full text-sm">
                        <label
                            for="documents"
                            class="text-gray-600 text-xs flex gap-2 items-center hover:cursor-pointer"
                            ><input
                                class="w-4 h-4 hover:cursor-pointer"
                                type="checkbox"
                                v-model="form.documents"
                                id="documents"
                            />Uwzględnić przesłane dokumenty medyczne?</label
                        >
                        <span
                            class="text-red-500 text-xs"
                            v-if="form.errors.documents"
                            >{{ form.errors.documents }}</span
                        >
                    </div>
                </div>

                <div class="w-full">
                    <PrimaryButton :type="'submit'">Stwórz</PrimaryButton>
                </div>
            </form>
        </div>

        <div
            class="flex flex-col gap-6 bg-white rounded-2xl shadow p-6 mb-6 break-inside-avoid"
        >
            <div class="flex flex-col gap-2">
                <div class="flex gap-2 items-center">
                    <div
                        class="flex justify-center items-center bg-blue-200 size-12 rounded-2xl"
                    >
                        <i
                            class="fa-solid fa-list-ul text-blue-600 text-xl"
                        ></i>
                    </div>
                    <h4 class="text-2xl font-normal">Twoje diety</h4>
                </div>
                <span class="text-sm text-gray-600"
                    >Lista wszystkich twoich wygenerowanych diet.</span
                >
            </div>
            <div class="flex flex-col-gap-2" v-if="diets.length > 0">
                <ul
                    role="list"
                    class="divide-y divide-slate-300 overflow-hidden bg-white border border-slate-300 ring-gray-900/5 rounded-xl w-full"
                >
                    <div
                        v-for="diet in diets"
                        :key="diet.id"
                        class="relative flex flex-col justify-between"
                    >
                        <div
                            class="diet-container flex justify-between p-4 duration-200 hover:bg-gray-50 hover:cursor-pointer"
                        >
                            <div class="flex min-w-0 gap-x-4">
                                <div class="min-w-0 flex-auto">
                                    <p class="text-lg">
                                        {{ diet.name }}
                                    </p>
                                    <p
                                        class="mt-1 flex flex-col gap-1 text-sm leading-5 text-gray-600"
                                    >
                                        <span
                                            >Kaloryczność:
                                            <span
                                                class="text-blue-600 font-semibold"
                                                >{{ diet.calories }} kcal</span
                                            ></span
                                        >
                                        <span
                                            >Ilość posiłków:
                                            <span
                                                class="text-blue-600 font-semibold"
                                                >{{ diet.meals }}</span
                                            ></span
                                        >
                                    </p>
                                </div>
                            </div>
                            <div class="flex shrink-0 items-center gap-x-4">
                                <div
                                    class="hidden sm:flex sm:flex-col sm:items-end"
                                >
                                    <p class="text-base leading-6">
                                        Dieta {{ diet.type }}
                                    </p>
                                    <p
                                        class="mt-1 text-sm leading-5 text-gray-600"
                                    >
                                        {{ formatDate(diet.created_at) }}
                                    </p>
                                </div>
                                <!-- <svg
                                    class="h-5 w-5 flex-none text-gray-400"
                                    viewBox="0 0 20 20"
                                    fill="currentColor"
                                    aria-hidden="true"
                                >
                                    <path
                                        fill-rule="evenodd"
                                        d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                                        clip-rule="evenodd"
                                    />
                                </svg> -->
                                <Link
                                    method="DELETE"
                                    :href="route('diet.destroy', diet)"
                                >
                                    <i
                                        class="fa-solid text-red-600 duration-200 hover:text-red-700 fa-trash"
                                    ></i>
                                </Link>
                            </div>
                        </div>
                        <div
                            class="border-t border-slate-300 p-4 diet-content text-sm flex-col gap-4 hidden"
                            v-html="diet.content"
                        ></div>
                    </div>
                </ul>
            </div>
        </div>
    </div>
</template>
