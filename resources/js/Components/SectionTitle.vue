<template>
    <div class="flex flex-col gap-2">
        <div class="flex gap-3 items-center">
            <div
                class="flex justify-center items-center bg-blue-200 size-12 rounded-2xl"
            >
                <i
                    :class="icons[props.icon]"
                    class="fa-solid text-blue-600 text-xl"
                ></i>
            </div>
            <h4 class="text-2xl font-normal"><slot name="title" /></h4>
        </div>
        <span class="text-sm text-gray-600"><slot name="description" /></span>

        <!-- <div class="px-4 sm:px-0">
            <slot name="aside" />
        </div> -->
    </div>
</template>

<script setup lang="ts">
const props = defineProps<{
    icon: string;
}>();

const icons: Record<string, string> = {
    weight: `fa-weight-scale`,
    password: "fa-key",
    user: "fa-user",
    lock: "fa-lock",
    mobile: "fa-mobile-screen",
    trash: "fa-trash",
};
</script>
