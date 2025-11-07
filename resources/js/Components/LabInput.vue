<template>
    <div class="w-full relative">
        <input
            type="number"
            :step="step"
            class="w-full rounded-md bg-[#FFF] border-[1px] border-slate-300 p-2 pr-14 text-sm"
            :value="displayValue"
            @input="onInput"
        />
        <span
            class="text-xs block w-fit px-2 text-center text-gray-600 border-l border-slate-300 absolute top-1/2 right-0 p-1 rounded-e-md translate-y-1/2 translate-y-[-50%]"
        >
            {{ unit }}
        </span>
    </div>
</template>

<script setup lang="ts">
import { computed } from "vue";

const props = defineProps<{
    unit?: string;
    modelValue: number | string | null | undefined;
    step?: string | number;
}>();

const emit = defineEmits<{
    (e: "update:modelValue", value: number | null): void;
}>();

const unit = props.unit ?? "";
const step = props.step ?? "0.01";

// wartość do wyświetlenia (string), bez zmiany typu w props
const displayValue = computed(() => {
    if (props.modelValue === null || props.modelValue === undefined) return "";
    return String(props.modelValue);
});

// przy wpisywaniu zamieniamy przecinek na kropkę i emitujemy liczbę lub null
function onInput(e: Event) {
    const raw = (e.target as HTMLInputElement).value;
    if (raw.trim() === "") {
        emit("update:modelValue", null);
        return;
    }
    const normalized = raw.replace(",", ".");
    const num = Number(normalized);
    emit("update:modelValue", Number.isFinite(num) ? num : null);
}
</script>
