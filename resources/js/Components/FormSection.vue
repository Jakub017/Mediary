<script setup lang="ts">
import { computed, useSlots } from "vue";
import SectionTitle from "./SectionTitle.vue";

defineEmits(["submitted"]);

const hasActions = computed(() => !!useSlots().actions);

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
            <form @submit.prevent="$emit('submitted')">
                <div
                    class=""
                    :class="
                        hasActions
                            ? 'sm:rounded-tl-md sm:rounded-tr-md'
                            : 'sm:rounded-md'
                    "
                >
                    <div class="grid grid-cols-6 gap-4">
                        <slot name="form" />
                    </div>
                </div>

                <div v-if="hasActions" class="items-center justify-start mt-4">
                    <slot name="actions" />
                </div>
            </form>
        </div>
    </div>
</template>
