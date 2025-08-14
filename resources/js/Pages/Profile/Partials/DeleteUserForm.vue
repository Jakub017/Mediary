<script setup>
import { ref } from "vue";
import { useForm } from "@inertiajs/vue3";
import ActionSection from "@/Components/ActionSection.vue";
import DangerButton from "@/Components/DangerButton.vue";
import DialogModal from "@/Components/DialogModal.vue";
import InputError from "@/Components/InputError.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import TextInput from "@/Components/TextInput.vue";

const confirmingUserDeletion = ref(false);
const passwordInput = ref(null);

const form = useForm({
    password: "",
});

const confirmUserDeletion = () => {
    confirmingUserDeletion.value = true;

    setTimeout(() => passwordInput.value.focus(), 250);
};

const deleteUser = () => {
    form.delete(route("current-user.destroy"), {
        preserveScroll: true,
        onSuccess: () => closeModal(),
        onError: () => passwordInput.value.focus(),
        onFinish: () => form.reset(),
    });
};

const closeModal = () => {
    confirmingUserDeletion.value = false;

    form.reset();
};
</script>

<template>
    <ActionSection icon="trash">
        <template #title> Usuwanie konta </template>

        <template #description> Trwale usuń swoje konto. </template>

        <template #content>
            <div class="max-w-xl text-sm text-gray-600">
                Po usunięciu konta wszystkie jego zasoby i dane zostaną trwale
                usunięte. Przed usunięciem konta prosimy o pobranie wszelkich
                danych lub informacji, które chcesz zachować.
            </div>

            <div class="mt-5">
                <DangerButton @click="confirmUserDeletion">
                    Usuń konto
                </DangerButton>
            </div>

            <!-- Delete Account Confirmation Modal -->
            <DialogModal :show="confirmingUserDeletion" @close="closeModal">
                <template #title> Usuń konto </template>

                <template #content>
                    Czy na pewno chcesz usunąć swoje konto? Po usunięciu konta
                    wszystkie jego zasoby i dane zostaną trwale usunięte.
                    Wprowadź swoje hasło, aby potwierdzić, że chcesz trwale
                    usunąć swoje konto.

                    <div class="mt-4">
                        <TextInput
                            ref="passwordInput"
                            v-model="form.password"
                            type="password"
                            class="mt-1 block w-3/4"
                            placeholder="Hasło"
                            autocomplete="current-password"
                            @keyup.enter="deleteUser"
                        />

                        <InputError
                            :message="form.errors.password"
                            class="mt-2"
                        />
                    </div>
                </template>

                <template #footer>
                    <SecondaryButton @click="closeModal">
                        Anuluj
                    </SecondaryButton>

                    <DangerButton
                        class="ms-3"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                        @click="deleteUser"
                        >Usuń konto
                    </DangerButton>
                </template>
            </DialogModal>
        </template>
    </ActionSection>
</template>
