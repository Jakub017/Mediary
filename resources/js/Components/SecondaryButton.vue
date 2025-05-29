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
        class="text-black text-sm bg-gray-300 px-4 py-2 rounded-full flex justify-center items-center gap-2 duration-200 hover:bg-gray-400"
    >
        <slot />
    </button>
</template>
