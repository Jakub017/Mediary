<script setup>
defineProps({
    type: {
        type: String,
        default: "submit",
    },
});
</script>

<template>
    <button
        :type="type"
        class="text-white text-sm bg-blue-600 px-4 py-2 rounded-full flex justify-center items-center gap-2 duration-200 hover:bg-blue-700"
    >
        <slot />
    </button>
</template>
