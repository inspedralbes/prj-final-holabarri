<template>
    <ClientOnly>
        <div>
            <MapComponent />
        </div>
    </ClientOnly>
</template>

<script setup>
import MapComponent from '../components/MapComponent.vue';

definePageMeta({
    layout: false,
});
</script>
