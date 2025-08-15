<template>
    <div class="w-full relative">
        <input
            type="number"
            step="0.01"
            class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-300 p-2 pr-14 text-sm"
            v-model="props.modelValue"
        />
        <span
            class="text-xs block w-fit px-2 text-center text-gray-600 border-l border-slate-300 absolute top-1/2 right-0 p-1 rounded-e-md translate-y-[-50%]"
        >
            {{ props.unit }}
        </span>
    </div>
</template>

<script setup lang="ts">
const props = defineProps<{
    unit: string;
    modelValue: string;
}>();
</script>
