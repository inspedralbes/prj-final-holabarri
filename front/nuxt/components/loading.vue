<template>
    <div class="loader"></div>
</template>

<style scoped>
    .loader {
        position: relative;
        width: 300px;
        height: 3px;
        background: linear-gradient(to right, transparent, #0044ff, transparent);
        overflow: hidden;
    }

    .loader::after {
        content: '';
        position: absolute;
        translate: -200px 0;
        width: 150px;
        height: 100%;
        background: linear-gradient(to right, transparent, #ffffff, transparent);
        animation: slide 1s infinite;
    }

    @keyframes slide {
        100% {
            translate: 300px 0;
        }
    }
</style>