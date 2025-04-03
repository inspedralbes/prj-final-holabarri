<script setup>

</script>

<template>
    <div class="bg-[#276BF2] w-full h-screen flex flex-col">
        <div class="flex flex-col items-center justify-center w-full h-[20%]"
            :class="{ 'move-up': moveUp, 'container-superior': moveUp, 'activated-sup': shown }">
            <h1 class="font-extrabold text-5xl text-white italic mt-[72vh]">{{ shown ? 'HolaBarri' : displayedText }}</h1>
            <p class="text-white text-xl tracking-wide subtitulo" :class="{ 'show-lema': showLema, 'activaded-subt': shown }">El teu barri a mà</p>
        </div>
        <div class="bg-white rounded-t-xl flex-grow container-form  overflow-scroll"
            :class="{ 'move-up-form': showForm, 'container-form': moveUp, 'activated-form': shown }">
            <div>
                <h3 class="mt-5 text-center font-bold text-3xl">Benvingut</h3>
            </div>
            <div class="sm:mx-auto sm:w-full sm:max-w-md">
                <div class="bg-white px-4 pt-8 sm:rounded-lg sm:px-10 rounded-md mb-8">
                    <form @submit.prevent="login" class="space-y-6">
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Correu
                                electrònic</label>
                            <div class="mt-1">
                                <input id="email" name="email" v-model="formData.email" type="text" data-testid="username"
                                    required=""
                                    class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                            </div>
                        </div>
                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700">Contrasenya</label>
                            <div class="mt-1">
                                <input id="password" name="password" v-model="formData.password" type="password"
                                    data-testid="password" autocomplete="current-password"
                                    class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                            </div>
                        </div>
                        <div class="text-red-600">
                            {{ errorMessage }}
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <input id="remember_me" name="remember_me" type="checkbox"
                                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 disabled:cursor-wait disabled:opacity-50">
                                <label for="remember_me" class="ml-2 block text-sm text-gray-900">Recorda'm</label>
                            </div>
                            <div class="text-sm">
                                <NuxtLink to="/reset" class="font-medium text-indigo-400 hover:text-indigo-500">Has
                                    oblidat la teva contrasenya?</NuxtLink>
                            </div>
                        </div>
                        <div>
                            <ButtonComp test-id="login" @submit.prevent="login">
                                Iniciar sessió
                            </ButtonComp>
                        </div>
                    </form>
                    <div class="mt-6">
                        <div class="relative">
                            <div class="absolute inset-0 flex items-center">
                                <div class="w-full border-t border-gray-300"></div>
                            </div>
                            <div class="relative flex justify-center text-sm">
                                <span class="bg-white px-2 text-gray-500">O continua amb</span>
                            </div>
                        </div>
                        <div class="mt-6">
                            <button @click="loginWithGoogle"
                                class="inline-flex w-full items-center justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-500 shadow-sm hover:bg-gray-50 disabled:cursor-wait disabled:opacity-50">
                                <span class="sr-only">Inicia sessió amb Google</span>
                                <svg class="h-6 w-6" fill="currentColor" viewBox="-3 -2 24 24" aria-hidden="true">
                                    <clipPath id="p.0">
                                        <path d="m0 0l20.0 0l0 20.0l-20.0 0l0 -20.0z" clip-rule="nonzero"></path>
                                    </clipPath>
                                    <g clip-path="url(#p.0)">
                                        <path fill="currentColor" fill-opacity="0.0" d="m0 0l20.0 0l0 20.0l-20.0 0z"
                                            fill-rule="evenodd"></path>
                                        <path fill="currentColor"
                                            d="m19.850197 8.270351c0.8574047 4.880001 -1.987587 9.65214 -6.6881847 11.218641c-4.700598 1.5665016 -9.83958 -0.5449295 -12.08104 -4.963685c-2.2414603 -4.4187555 -0.909603 -9.81259 3.1310139 -12.6801605c4.040616 -2.867571 9.571754 -2.3443127 13.002944 1.2301085l-2.8127813 2.7000687l0 0c-2.0935059 -2.1808972 -5.468274 -2.500158 -7.933616 -0.75053835c-2.4653416 1.74962 -3.277961 5.040613 -1.9103565 7.7366734c1.3676047 2.6960592 4.5031037 3.9843292 7.3711267 3.0285425c2.868022 -0.95578575 4.6038647 -3.8674583 4.0807285 -6.844941z"
                                            fill-rule="evenodd"></path>
                                        <path fill="currentColor"
                                            d="m10.000263 8.268785l9.847767 0l0 3.496233l-9.847767 0z"
                                            fill-rule="evenodd"></path>
                                    </g>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="m-auto mt-6 w-fit md:mt-8">
                        <span class="m-auto">No tens compte?
                            <NuxtLink class="font-semibold text-[#276BF2]" to="/register">Crear compte</NuxtLink>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
definePageMeta({
    layout: false,
});

import { navigateTo } from '#app';
import { useAuthStore } from '@/stores/authStore';
import { errorMessages } from 'vue/compiler-sfc';

import { useRuntimeConfig } from "#imports";
const config = useRuntimeConfig();
const baseUrl = config.public.apiBaseUrl;

const authStore = useAuthStore();
const errorMessage = ref('');
const formData = reactive({
    email: '',
    password: '',
});

const fullText = 'HolaBarri';
const displayedText = ref('');
const moveUp = ref(false);
const showForm = ref(false);
const showLema = ref(false);
const shown = ref(true);

async function login() {
    const { $communicationManager } = useNuxtApp(); // Acceder al communicationManager

    // Verificar si los campos están vacíos
    if (!formData.email || !formData.password) {
        console.error('És necessari completar tots els camps');
        errorMessage.value = 'És necessari completar tots els camps';
        return;
    }

    // Verificar que la contraseña tenga al menos 8 caracteres
    if (formData.password.length < 8) {
        console.error('La contrasenya es incorrecta');
        errorMessage.value = 'La contrasenya es incorrecta';
        return;
    }
    // Llamar al plugin communicationManager para registrar
    const response = await $communicationManager.login(formData);

    if (response) {
        authStore.login(response.user, response.token, response.comercio);
        const res = await $communicationManager.getFavoritos(response.user.id);
        authStore.setFavoritos(res);
        navigateTo('/');
    } else {
        errorMessage.value = 'Hi ha hagut algun error, revisi les seves dades';
    }
}

function loginWithGoogle() {
    window.location.href = `${baseUrl}/auth/google`;
};

const typeWriter = (index) => {
    if (index < fullText.length) {
        setTimeout(() => {
            displayedText.value += fullText[index];
            typeWriter(index + 1);
        }, 90);
    }
};

onMounted(() => {
    if (!localStorage.getItem("animationShown")) {
        typeWriter(0);
        setTimeout(() => {
            moveUp.value = true;
            showForm.value = true;
            setTimeout(() => {
                showLema.value = true;
            }, 200);
        }, fullText.length * 90 + 500);
        shown.value = false;
        localStorage.setItem("animationShown", "true");
    }
});
</script>

<style scoped>
.container-superior {
    transition: transform 0.8s ease-in-out;
}

.move-up {
    transform: translateY(-36.5vh);
}

.activated-sup {
    transform: translateY(-36.5vh);
}

.container-form {
    transform: translateY(100%);
    transition: transform 0.8s ease-in-out;
}

.move-up-form {
    transform: translateY(0%);
}

.activated-form {
    transform: translateY(0%);
}

.subtitulo {
    visibility: hidden;
    opacity: 0;
    transition: opacity 0.6s ease-in-out;
    will-change: opacity;
}

.show-lema {
    visibility: visible;
    opacity: 1;
}

.activaded-subt {
    visibility: visible;
    opacity: 1;
}
</style>