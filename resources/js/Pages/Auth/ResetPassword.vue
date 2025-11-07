<script setup>
import { Head, useForm, Link } from "@inertiajs/vue3";
import AuthenticationCard from "@/Components/AuthenticationCard.vue";
import AuthenticationCardLogo from "@/Components/AuthenticationCardLogo.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { onMounted } from "vue";

const props = defineProps({
    email: String,
    token: String,
});

const form = useForm({
    token: props.token,
    email: props.email,
    password: "",
    password_confirmation: "",
});

onMounted(() => {
    const passwordInputs = [...document.querySelectorAll(".password-input")];
    const togglePasswordBtns = [
        ...document.querySelectorAll(".toggle-password"),
    ];
    const toggleIcons = [...document.querySelectorAll(".toggle-icon")];

    togglePasswordBtns.forEach((btn, i) => {
        btn.addEventListener("click", () => {
            if (passwordInputs[i].type === "password") {
                passwordInputs[i].type = "text";
                toggleIcons[i].classList.remove("fa-eye");
                toggleIcons[i].classList.add("fa-eye-slash");
            } else {
                passwordInputs[i].type = "password";
                toggleIcons[i].classList.remove("fa-eye-slash");
                toggleIcons[i].classList.add("fa-eye");
            }
        });
    });
});

const submit = () => {
    form.post(route("password.update"), {
        onSuccess: () => {
            const toastMagic = new ToastMagic();
            toastMagic.success("Success!", "Your password has been reset!");
        },
        onFinish: () => form.reset("password", "password_confirmation"),
    });
};
</script>

<template>
    <Head title="Reset hasła" />

    <div class="flex flex-row min-h-screen">
        <div class="w-full md:w-1/2 flex flex-col justify-center items-center">
            <div
                class="flex w-[90%] h-full justify-center items-center max-w-[500px] flex-col gap-6"
            >
                <form class="w-full" @submit.prevent="submit">
                    <h2
                        class="text-center text-2xl font-semibold mb-4 md:text-3xl"
                    >
                        Reset hasła
                    </h2>
                    <p class="text-center text-sm text-gray-600">
                        Już prawie gotowe! Ustaw nowe hasło, aby zalogować się
                        ponownie.
                    </p>
                    <div class="flex flex-col gap-6 mt-6">
                        <div>
                            <label class="text-gray-600 text-xs" for="password"
                                >Adres email</label
                            >
                            <input
                                id="email"
                                v-model="form.email"
                                type="email"
                                class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-300 p-2 text-sm"
                                required
                                autocomplete="username"
                            />
                            <InputError
                                class="mt-2"
                                :message="form.errors.password"
                            />
                        </div>

                        <div class="relative">
                            <label class="text-gray-600 text-xs" for="password"
                                >Nowe hasło</label
                            >
                            <input
                                id="password"
                                v-model="form.password"
                                type="password"
                                class="password-input w-full rounded-md bg-[#FFF] border-[1px] border-slate-300 p-2 pr-10 text-sm"
                                required
                                autocomplete="new-password"
                            />
                            <button
                                type="button"
                                class="toggle-password absolute top-1/2 right-2"
                            >
                                <i
                                    class="toggle-icon fa-solid fa-eye text-gray-600"
                                ></i>
                            </button>
                            <InputError
                                class="mt-2"
                                :message="form.errors.password"
                            />
                        </div>

                        <div class="relative">
                            <label class="text-gray-600 text-xs" for="password"
                                >Potwierdź nowe hasło</label
                            >
                            <input
                                id="password_confirmation"
                                v-model="form.password_confirmation"
                                type="password"
                                class="password-input w-full rounded-md bg-[#FFF] border-[1px] border-slate-300 p-2 pr-10 text-sm"
                                required
                                autocomplete="new-password"
                            />
                            <button
                                type="button"
                                class="toggle-password absolute top-1/2 right-2"
                            >
                                <i
                                    class="toggle-icon fa-solid fa-eye text-gray-600"
                                ></i>
                            </button>
                            <InputError
                                class="mt-2"
                                :message="form.errors.password"
                            />
                        </div>

                        <PrimaryButton
                            :type="'submit'"
                            class="w-full"
                            :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing"
                            >Ustaw nowe hasło</PrimaryButton
                        >
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

    <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
        {{ status }}
    </div>

    <!-- <AuthenticationCard>
        <template #logo>
            <AuthenticationCardLogo />
        </template>

        <form @submit.prevent="submit">
            <div>
                <InputLabel for="email" value="Email" />
                <TextInput
                    id="email"
                    v-model="form.email"
                    type="email"
                    class="mt-1 block w-full"
                    required
                    autofocus
                    autocomplete="username"
                />
                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="mt-4">
                <InputLabel for="password" value="Password" />
                <TextInput
                    id="password"
                    v-model="form.password"
                    type="password"
                    class="mt-1 block w-full"
                    required
                    autocomplete="new-password"
                />
                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="mt-4">
                <InputLabel
                    for="password_confirmation"
                    value="Confirm Password"
                />
                <TextInput
                    id="password_confirmation"
                    v-model="form.password_confirmation"
                    type="password"
                    class="mt-1 block w-full"
                    required
                    autocomplete="new-password"
                />
                <InputError
                    class="mt-2"
                    :message="form.errors.password_confirmation"
                />
            </div>

            <div class="flex items-center justify-end mt-4">
                <PrimaryButton
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                >
                    Reset Password
                </PrimaryButton>
            </div>
        </form>
    </AuthenticationCard> -->
</template>
