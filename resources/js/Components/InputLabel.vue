<script setup>
defineProps({
    value: String,
});
</script>

<template>
    <label class="text-gray-600 text-xs">
        <span v-if="value">{{ value }}</span>
        <span v-else><slot /></span>
    </label>
</template>
