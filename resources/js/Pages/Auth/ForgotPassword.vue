<script setup>
import { Head, useForm, Link } from "@inertiajs/vue3";
import AuthenticationCard from "@/Components/AuthenticationCard.vue";
import AuthenticationCardLogo from "@/Components/AuthenticationCardLogo.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";

defineProps({
    status: String,
});

const form = useForm({
    email: "",
});

const submit = () => {
    form.post(route("password.email"));
};
</script>

<template>
    <Head title="Zapomniane hasło" />

    <div class="flex flex-row min-h-screen">
        <div class="w-full md:w-1/2 flex flex-col justify-center items-center">
            <div
                class="flex w-[90%] h-full justify-center items-center max-w-[500px] flex-col gap-6"
            >
                <form class="w-full" @submit.prevent="submit">
                    <h2
                        class="text-center text-2xl font-semibold mb-4 md:text-3xl"
                    >
                        Zapomniane hasło
                    </h2>
                    <p class="text-center text-sm text-gray-600">
                        Zdarza się każdemu! Wpisz swój e-mail, a pomożemy Ci
                        odzyskać dostęp.
                    </p>
                    <div class="flex flex-col gap-6 mt-6">
                        <div>
                            <label class="text-gray-600 text-xs" for="email"
                                >Adres email</label
                            >
                            <input
                                id="email"
                                v-model="form.email"
                                type="email"
                                class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-300 p-2 text-sm"
                                required
                                autofocus
                                autocomplete="username"
                            />
                            <InputError
                                class="mt-2"
                                :message="form.errors.email"
                            />
                            <div
                                v-if="status"
                                class="mt-2 block text-sm text-green-600"
                            >
                                {{ status }}
                            </div>
                        </div>

                        <PrimaryButton
                            type="submit"
                            class="w-full"
                            :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing"
                        >
                            Wyślij link do resetu hasła
                        </PrimaryButton>
                    </div>
                </form>

                <p class="text-sm text-gray-600">
                    <Link
                        :href="route('login')"
                        class="text-blue-600 duration-200 hover:text-blue-700"
                        >Powrót do logowania</Link
                    >
                </p>
            </div>
        </div>
        <div class="hidden md:flex md:w-1/2 md:h-screen md:p-4">
            <div class="w-full rounded-2xl h-full overflow-hidden">
                <img
                    src="/img/login_screen.jpeg"
                    class="w-full h-full object-cover"
                    alt=""
                />
            </div>
        </div>
    </div>
</template>
