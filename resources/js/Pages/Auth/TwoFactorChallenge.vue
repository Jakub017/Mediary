<script setup>
import { nextTick, ref } from "vue";
import { Head, useForm } from "@inertiajs/vue3";
import AuthenticationCard from "@/Components/AuthenticationCard.vue";
import AuthenticationCardLogo from "@/Components/AuthenticationCardLogo.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";

const recovery = ref(false);

const form = useForm({
    code: "",
    recovery_code: "",
});

const recoveryCodeInput = ref(null);
const codeInput = ref(null);

const toggleRecovery = async () => {
    recovery.value ^= true;

    await nextTick();

    if (recovery.value) {
        recoveryCodeInput.value.focus();
        form.code = "";
    } else {
        codeInput.value.focus();
        form.recovery_code = "";
    }
};

const submit = () => {
    form.post(route("two-factor.login"));
};
</script>

<template>
    <Head title="Uwierzytelnianie dwuskładnikowe" />

    <div class="flex flex-row min-h-screen">
        <div class="w-full md:w-1/2 flex flex-col justify-center items-center">
            <div
                class="flex w-[90%] h-full justify-center items-center max-w-[500px] flex-col gap-6"
            >
                <form class="w-full" @submit.prevent="submit">
                    <h2
                        class="text-center text-2xl font-semibold mb-4 md:text-3xl"
                    >
                        Weryfikacja dwuetapowa
                    </h2>
                    <p class="text-center text-sm text-gray-600">
                        Wprowadź kod z aplikacji i zaloguj się.
                    </p>
                    <div class="flex flex-col gap-6 mt-6">
                        <div v-if="!recovery">
                            <label class="text-gray-600 text-xs" for="code"
                                >Kod z aplikacji</label
                            >
                            <input
                                id="code"
                                ref="codeInput"
                                v-model="form.code"
                                type="text"
                                inputmode="numeric"
                                autofocus
                                autocomplete="one-time-code"
                                class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-300 p-2 text-sm"
                            />
                            <InputError
                                class="mt-2"
                                :message="form.errors.code"
                            />
                        </div>

                        <div v-else>
                            <label
                                class="text-gray-600 text-xs"
                                for="recovery_code"
                                >Kod odzyskiwania</label
                            >
                            <input
                                id="code"
                                v-model="form.recovery_code"
                                ref="recoveryCodeInput"
                                type="text"
                                autocomplete="one-time-code"
                                class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-300 p-2 text-sm"
                            />
                            <InputError
                                class="mt-2"
                                :message="form.errors.recovery_code"
                            />
                        </div>

                        <button
                            type="button"
                            class="w-full flex gap-2 text-sm border rounded-full px-4 py-2 bg-gray-50 border-slate-300 justify-center items-center duration-200 hover:bg-gray-100"
                            @click.prevent="toggleRecovery"
                        >
                            <template v-if="!recovery">
                                Użyj kodu odzyskiwania
                            </template>

                            <template v-else> Użyj kodu aplikacji </template>
                        </button>
                        <PrimaryButton :type="'submit'" class="w-full"
                            >Zaloguj się</PrimaryButton
                        >
                    </div>
                </form>
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

    <!-- <AuthenticationCard>
        <template #logo>
            <AuthenticationCardLogo />
        </template>

        <div class="mb-4 text-sm text-gray-600">
            <template v-if="! recovery">
                Please confirm access to your account by entering the authentication code provided by your authenticator application.
            </template>

            <template v-else>
                Please confirm access to your account by entering one of your emergency recovery codes.
            </template>
        </div>

        <form @submit.prevent="submit">
            <div v-if="! recovery">
                <InputLabel for="code" value="Code" />
                <TextInput
                    id="code"
                    ref="codeInput"
                    v-model="form.code"
                    type="text"
                    inputmode="numeric"
                    class="mt-1 block w-full"
                    autofocus
                    autocomplete="one-time-code"
                />
                <InputError class="mt-2" :message="form.errors.code" />
            </div>

            <div v-else>
                <InputLabel for="recovery_code" value="Recovery Code" />
                <TextInput
                    id="recovery_code"
                    ref="recoveryCodeInput"
                    v-model="form.recovery_code"
                    type="text"
                    class="mt-1 block w-full"
                    autocomplete="one-time-code"
                />
                <InputError class="mt-2" :message="form.errors.recovery_code" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <button type="button" class="text-sm text-gray-600 hover:text-gray-900 underline cursor-pointer" @click.prevent="toggleRecovery">
                    <template v-if="! recovery">
                        Use a recovery code
                    </template>

                    <template v-else>
                        Use an authentication code
                    </template>
                </button>

                <PrimaryButton class="ms-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Log in
                </PrimaryButton>
            </div>
        </form>
    </AuthenticationCard> -->
</template>
