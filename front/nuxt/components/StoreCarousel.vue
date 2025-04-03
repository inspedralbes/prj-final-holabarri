<template>
    <div class="relative w-full overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3">
            <div class="relative">
                <div class="flex transition-transform duration-500 ease-in-out"
                    :style="{ transform: `translateX(-${currentIndex * 100}%)` }">
                    <div v-for="(store, index) in comercios" :key="store.id" class="w-full flex-shrink-0 px-4">
                        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                            <div class="relative h-48 sm:h-64">
                                <!-- <img v-if="store.imagen" :src="store.imagen" :alt="store.nombre" class="w-full h-full object-cover" /> -->
                                <img v-if="store.imagen" :src="imagenes[index]" :alt="store.nombre" class="w-full h-full object-cover" />
                                <div class="absolute inset-0 bg-black bg-opacity-40"></div>
                                <div class="absolute bottom-0 left-0 right-0 p-6 text-white">
                                    <h3 class="text-2xl font-bold mb-2">{{ store.nombre }}</h3>
                                    <button @click="irAlComercio(store.id)"
                                        class="bg-white text-gray-900 px-6 py-2 mb-2 rounded-md text-sm font-medium hover:bg-gray-100 transition-colors duration-200 flex items-center gap-2">
                                        <svg viewBox="0 0 24 24" width="1.15em" height="1.15em" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M7.43526 1.25H16.5647C17.1346 1.24998 17.6186 1.24997 18.0185 1.29132C18.4443 1.33534 18.8378 1.43094 19.2096 1.66071C19.5814 1.89048 19.8429 2.19971 20.0727 2.56088C20.2885 2.9001 20.5049 3.33297 20.7598 3.8428L20.7763 3.87574C20.786 3.89518 20.7949 3.91504 20.8029 3.93526L22.2065 7.4834C22.3735 7.90559 22.5586 8.4323 22.6127 8.97128C22.6681 9.52258 22.5921 10.1541 22.1601 10.7019C21.8068 11.15 21.3155 11.4863 20.75 11.6463V21.25H22C22.4142 21.25 22.75 21.5858 22.75 22C22.75 22.4142 22.4142 22.75 22 22.75H2C1.58579 22.75 1.25 22.4142 1.25 22C1.25 21.5858 1.58579 21.25 2 21.25H3.25V11.6464C2.68446 11.4863 2.19312 11.15 1.83975 10.7019C1.40779 10.1541 1.33182 9.52257 1.38718 8.97127C1.4413 8.43229 1.62639 7.90559 1.7934 7.4834L3.19701 3.93526C3.20501 3.91504 3.21388 3.89518 3.22361 3.87574L3.2401 3.84275C3.49498 3.33295 3.71139 2.90009 3.92723 2.56088C4.15704 2.19971 4.41853 1.89048 4.79031 1.66071C5.16208 1.43094 5.55561 1.33534 5.98142 1.29132C6.38134 1.24997 6.86529 1.24998 7.43526 1.25ZM17.9999 10.8875C18.3359 11.2433 18.7658 11.5096 19.25 11.6465V21.25H15.25L15.25 18.4678C15.25 18.028 15.25 17.6486 15.2218 17.3374C15.192 17.0082 15.1259 16.6822 14.9486 16.375C14.7511 16.033 14.467 15.7489 14.125 15.5514C13.8178 15.3741 13.4918 15.308 13.1627 15.2782C12.8514 15.25 12.472 15.25 12.0322 15.25H11.9678C11.528 15.25 11.1486 15.25 10.8373 15.2782C10.5082 15.308 10.1822 15.3741 9.875 15.5514C9.53296 15.7489 9.24892 16.033 9.05144 16.375C8.87407 16.6822 8.80802 17.0082 8.77818 17.3374C8.74997 17.6486 8.74998 18.028 8.75 18.4677L8.75 21.25H4.75V11.6465C5.23413 11.5095 5.66398 11.2433 5.99992 10.8875C6.5013 11.4186 7.2119 11.75 7.99991 11.75C8.78793 11.75 9.49853 11.4186 9.99992 10.8875C10.5013 11.4186 11.2119 11.75 11.9999 11.75C12.7879 11.75 13.4985 11.4186 13.9999 10.8875C14.5013 11.4186 15.2119 11.75 15.9999 11.75C16.7879 11.75 17.4985 11.4186 17.9999 10.8875ZM10.25 21.25H13.75V18.5C13.75 18.0189 13.7493 17.7082 13.7279 17.4727C13.7075 17.2476 13.6731 17.1659 13.6495 17.125C13.5837 17.011 13.489 16.9163 13.375 16.8505C13.3341 16.8269 13.2524 16.7925 13.0273 16.7721C12.7918 16.7507 12.4811 16.75 12 16.75C11.5189 16.75 11.2082 16.7507 10.9727 16.7721C10.7476 16.7925 10.6659 16.8269 10.625 16.8505C10.511 16.9163 10.4163 17.011 10.3505 17.125C10.3269 17.1659 10.2925 17.2476 10.2721 17.4727C10.2507 17.7082 10.25 18.0189 10.25 18.5V21.25ZM6.74991 9C6.74991 9.69036 7.30956 10.25 7.99991 10.25C8.69027 10.25 9.24991 9.69036 9.24991 9C9.24991 8.58579 9.5857 8.25 9.99991 8.25C10.4141 8.25 10.7499 8.58579 10.7499 9C10.7499 9.69036 11.3096 10.25 11.9999 10.25C12.6903 10.25 13.2499 9.69036 13.2499 9C13.2499 8.58579 13.5857 8.25 13.9999 8.25C14.4141 8.25 14.7499 8.58579 14.7499 9C14.7499 9.69036 15.3096 10.25 15.9999 10.25C16.6903 10.25 17.2499 9.69036 17.2499 9C17.2499 8.58579 17.5857 8.25 17.9999 8.25C18.4141 8.25 18.7499 8.58579 18.7499 9C18.7499 9.69036 19.3096 10.25 19.9999 10.25C20.3979 10.25 20.7522 10.0649 20.9823 9.77305C21.0962 9.62859 21.1513 9.43094 21.1202 9.12114C21.0879 8.79903 20.969 8.43275 20.8117 8.03518L19.4201 4.51739C19.1524 3.98204 18.9735 3.62749 18.8071 3.36612C18.6472 3.1147 18.5325 3.00562 18.421 2.93669C18.3095 2.86776 18.1606 2.81401 17.8642 2.78336C17.5505 2.75093 17.1446 2.75 16.5278 2.75H7.47214C6.85533 2.75 6.4494 2.75093 6.13569 2.78336C5.83927 2.81401 5.69044 2.86776 5.5789 2.93669C5.46737 3.00562 5.35274 3.1147 5.19276 3.36612C5.02646 3.62749 4.84755 3.98204 4.57983 4.51739L3.18823 8.03518C3.03095 8.43275 2.91202 8.79903 2.87967 9.12115C2.84856 9.43095 2.90366 9.62861 3.01759 9.77307C3.2477 10.0649 3.60196 10.25 3.99991 10.25C4.69027 10.25 5.24991 9.69036 5.24991 9C5.24991 8.58579 5.5857 8.25 5.99991 8.25C6.41413 8.25 6.74991 8.58579 6.74991 9Z"
                                                    fill="#000000"></path>
                                            </g>
                                        </svg>
                                        Visitar Comerç
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <button @click="showPrev"
                    class="absolute left-0 top-1/2 -translate-y-1/2 bg-white p-2 rounded-full shadow-lg hover:bg-gray-100 transition-colors duration-200 focus:outline-none">
                    <svg viewBox="0 0 24 24" width="1.3em" height="1.3em" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path
                                d="M14.2893 5.70708C13.8988 5.31655 13.2657 5.31655 12.8751 5.70708L7.98768 10.5993C7.20729 11.3805 7.2076 12.6463 7.98837 13.427L12.8787 18.3174C13.2693 18.7079 13.9024 18.7079 14.293 18.3174C14.6835 17.9269 14.6835 17.2937 14.293 16.9032L10.1073 12.7175C9.71678 12.327 9.71678 11.6939 10.1073 11.3033L14.2893 7.12129C14.6799 6.73077 14.6799 6.0976 14.2893 5.70708Z"
                                fill="#000000"></path>
                        </g>
                    </svg>
                </button>

                <button @click="showNext"
                    class="absolute right-0 top-1/2 -translate-y-1/2 bg-white p-2 rounded-full shadow-lg hover:bg-gray-100 transition-colors duration-200 focus:outline-none">
                    <svg viewBox="0 0 24 24" width="1.3em" height="1.3em" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path
                                d="M9.71069 18.2929C10.1012 18.6834 10.7344 18.6834 11.1249 18.2929L16.0123 13.4006C16.7927 12.6195 16.7924 11.3537 16.0117 10.5729L11.1213 5.68254C10.7308 5.29202 10.0976 5.29202 9.70708 5.68254C9.31655 6.07307 9.31655 6.70623 9.70708 7.09676L13.8927 11.2824C14.2833 11.6729 14.2833 12.3061 13.8927 12.6966L9.71069 16.8787C9.32016 17.2692 9.32016 17.9023 9.71069 18.2929Z"
                                fill="#000000"></path>
                        </g>
                    </svg>
                </button>

                <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-2">
                    <button v-for="(store, index) in comercios" :key="index" @click="currentIndex = index"
                        :class="['w-2 h-2 rounded-full transition-colors duration-200', currentIndex === index ? 'bg-white' : 'bg-white/50']"></button>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { useRouter } from 'vue-router';

const router = useRouter();
const imagenes = [
    "https://alemarquitectura.com/wp-content/uploads/2022/02/reforma-fachada-local-uai-1066x800.jpg",
    "https://alemarquitectura.com/wp-content/uploads/2022/02/diseno-fachada-visibilidad-uai-1620x1080.jpg",
    "https://paraleloestudio.com/wp-content/uploads/01.jpeg",
    "https://i.pinimg.com/originals/2a/2e/b6/2a2eb662e3f37778b09b5a809f9f00f3.jpg",
    "https://www.imprentaicolor.es/wp-content/uploads/2020/05/local-comercial-icolor.png"
]

const props = defineProps({
    comercios: {
        type: Array,
    }
});

const currentIndex = ref(0);
const isAnimating = ref(false);

const showNext = () => {
    if (!isAnimating.value) {
        isAnimating.value = true;
        currentIndex.value = (currentIndex.value + 1) % props.comercios.length;
        setTimeout(() => (isAnimating.value = false), 500);
    }
};

const showPrev = () => {
    if (!isAnimating.value) {
        isAnimating.value = true;
        currentIndex.value = (currentIndex.value - 1 + props.comercios.length) % props.comercios.length;
        setTimeout(() => (isAnimating.value = false), 500);
    }
};

function irAlComercio(id) {
    router.push(`/comercio/${id}`);
}

onMounted(() => {
    const interval = setInterval(showNext, 5000);
    return () => clearInterval(interval);
});
</script>