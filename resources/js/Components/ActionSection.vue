<script setup lang="ts">
import SectionTitle from "./SectionTitle.vue";

defineProps<{
    icon: string;
}>();
</script>

<template>
    <div class="flex flex-col w-full">
        <SectionTitle :icon="icon">
            <template #title>
                <slot name="title" />
            </template>
            <template #description>
                <slot name="description" />
            </template>
        </SectionTitle>

        <div class="mt-4">
            <slot name="content" />
        </div>
    </div>
</template>
