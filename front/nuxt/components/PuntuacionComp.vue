<script setup>
import { computed } from "vue";

defineProps({
  rating: { type: Number, required: true },
  max: { type: Number, default: 5 },
  customClass: { type: String, default: "relative w-5 h-5" }
});
</script>

<template>
  <div class="flex">
    <template v-for="i in max" :key="i">
      <div :class="customClass">
        <!-- Estrella gris de fondo -->
        <svg class="absolute top-0 left-0 w-full h-full text-gray-300" fill="currentColor" viewBox="0 0 20 20">
          <path
            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.974a1 1 0 00.95.69h4.176c.969 0 1.371 1.24.588 1.81l-3.385 2.46a1 1 0 00-.364 1.118l1.286 3.974c.3.921-.755 1.688-1.539 1.118l-3.385-2.46a1 1 0 00-1.176 0l-3.385 2.46c-.784.57-1.839-.197-1.539-1.118l1.286-3.974a1 1 0 00-.364-1.118l-3.385-2.46c-.784-.57-.381-1.81.588-1.81h4.176a1 1 0 00.95-.69l1.286-3.974z"
          />
        </svg>
        <!-- Estrella dorada superpuesta -->
        <svg
          class="absolute top-0 left-0 w-full h-full text-yellow-400"
          fill="currentColor"
          viewBox="0 0 20 20"
          :style="{ clipPath: `inset(0 ${(1 - Math.max(0, Math.min(1, rating - (i - 1)))) * 100}% 0 0)` }"
        >
          <path
            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.974a1 1 0 00.95.69h4.176c.969 0 1.371 1.24.588 1.81l-3.385 2.46a1 1 0 00-.364 1.118l1.286 3.974c.3.921-.755 1.688-1.539 1.118l-3.385-2.46a1 1 0 00-1.176 0l-3.385 2.46c-.784.57-1.839-.197-1.539-1.118l1.286-3.974a1 1 0 00-.364-1.118l-3.385-2.46c-.784-.57-.381-1.81.588-1.81h4.176a1 1 0 00.95-.69l1.286-3.974z"
          />
        </svg>
      </div>
    </template>
  </div>
</template>
