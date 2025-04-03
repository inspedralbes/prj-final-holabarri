<template>
    <div v-if="loading" class="loading-container">
        <h1 ref="textRef" class="font-extrabold text-5xl text-white italic" :class="{ 'move-up': moveUp }">{{ displayedText }}</h1>
    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';

const fullText = 'HolaBarri';
const displayedText = ref('');
const loading = ref(true);
const moveUp = ref(false);

onMounted(() => {
    typeWriter(0);
});

const typeWriter = (index) => {
    if (index < fullText.length) {
        setTimeout(() => {
            displayedText.value += fullText[index];
            typeWriter(index + 1);
        }, 90); // Velocidad de escritura
    } else {
        setTimeout(() => {
            moveUp.value = true;

            setTimeout(() => {
                loading.value = false;
            }, 2500);
        }, 300);
    }
};
</script>

<style scoped>
.loading-container {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100vh;
    align-items: center;
    background-color: #276BF2;
    z-index: 9999;
}

h1{
    transition: transform 0.8s ease-in-out;
}

.move-up {
    transform: translateY(-36.5vh);
}
</style>