<script setup>
import MainLayout from "@/Layouts/MainLayout.vue";
import DeleteUserForm from "@/Pages/Profile/Partials/DeleteUserForm.vue";
import LogoutOtherBrowserSessionsForm from "@/Pages/Profile/Partials/LogoutOtherBrowserSessionsForm.vue";
import SectionBorder from "@/Components/SectionBorder.vue";
import TwoFactorAuthenticationForm from "@/Pages/Profile/Partials/TwoFactorAuthenticationForm.vue";
import UpdatePasswordForm from "@/Pages/Profile/Partials/UpdatePasswordForm.vue";
import UpdateProfileInformationForm from "@/Pages/Profile/Partials/UpdateProfileInformationForm.vue";
import { Head } from "@inertiajs/vue3";

defineOptions({
    layout: MainLayout,
});

defineProps({
    confirmsTwoFactorAuthentication: Boolean,
    sessions: Array,
});
</script>

<template>
    <Head>
        <title>Edytuj konto</title>
    </Head>
    <div>
        <div class="flex flex-col gap-6">
            <div v-if="$page.props.jetstream.canUpdateProfileInformation">
                <UpdateProfileInformationForm :user="$page.props.auth.user" />
            </div>

            <div v-if="$page.props.jetstream.canUpdatePassword">
                <UpdatePasswordForm class="mt-10 sm:mt-0" />
            </div>

            <div v-if="$page.props.jetstream.canManageTwoFactorAuthentication">
                <TwoFactorAuthenticationForm
                    :requires-confirmation="confirmsTwoFactorAuthentication"
                    class="mt-10 sm:mt-0"
                />

                <SectionBorder />
            </div>

            <LogoutOtherBrowserSessionsForm
                :sessions="sessions"
                class="mt-10 sm:mt-0"
            />

            <template v-if="$page.props.jetstream.hasAccountDeletionFeatures">
                <SectionBorder />

                <DeleteUserForm class="mt-10 sm:mt-0" />
            </template>
        </div>
    </div>
</template>
