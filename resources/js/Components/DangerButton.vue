<script setup>
defineProps({
    type: {
        type: String,
        default: "button",
    },
});
</script>

<template>
    <button
        :type="type"
        class="text-white text-sm bg-red-600 px-4 py-2 rounded-full flex justify-center items-center gap-2 duration-200 hover:bg-red-500"
    >
        <slot />
    </button>
</template>
