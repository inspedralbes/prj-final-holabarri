<template>
    <button :data-testid="testId" :type="type" :class="class" :disabled="disabled">
        <slot></slot>
    </button>
</template>

<script setup>
const props = defineProps({
    testId: {
        type: String,
        default: 'button',
    },
    type: {
        type: String,
        default: 'text',
    },
    class: {
        type: String,
        default: 'group relative flex w-full justify-center rounded-md border border-transparent bg-[#276BF2] px-4 py-2 text-sm font-medium text-white focus:outline-none focus:ring-2 focus:ring-[#276BF2] focus:ring-offset-2 disabled:cursor-wait disabled:opacity-50',
    },
    disabled: {
        type: Boolean,
        default: false,
    },
});
</script>

<style scoped></style>