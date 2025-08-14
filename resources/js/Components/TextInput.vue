<script setup>
import { onMounted, ref } from "vue";

defineProps({
    modelValue: String,
});

defineEmits(["update:modelValue"]);

const input = ref(null);

onMounted(() => {
    if (input.value.hasAttribute("autofocus")) {
        input.value.focus();
    }
});

defineExpose({ focus: () => input.value.focus() });
</script>

<template>
    <input
        ref="input"
        class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-300 p-2 text-sm"
        :value="modelValue"
        @input="$emit('update:modelValue', $event.target.value)"
    />
</template>
