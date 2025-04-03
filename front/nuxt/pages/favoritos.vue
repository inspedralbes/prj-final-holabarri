<template>
    <header>
        <h1 class="font-bold text-2xl m-4">Els meus favorits</h1>
    </header>
    <hr class="mb-2">
    <div v-if="authStore.isAuthenticated">
        <div class="flex justify-center my-4">
            <button
                @click="mostrarProductos = true"
                :class="{'bg-[#447EF2] text-white': mostrarProductos, 'bg-gray-200 text-gray-700': !mostrarProductos}"
                class="px-4 py-2 rounded-l-lg focus:outline-none transition-colors duration-200">
                Productes
            </button>
            <button
                @click="mostrarProductos = false"
                :class="{'bg-[#447EF2] text-white': !mostrarProductos, 'bg-gray-200 text-gray-700': mostrarProductos}"
                class="px-4 py-2 rounded-r-lg focus:outline-none transition-colors duration-200">
                Comerços
            </button>
        </div>

        <div v-if="loading" class="flex justify-center items-center">
            <Loading />
        </div>
        <div v-else>
            <!-- Productos Favoritos -->
            <div v-if="mostrarProductos" class="grid grid-cols-2 m-3 gap-2">
                <div v-for="(producto, index) in favoritos" :key="producto.id"
                    class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img :src="`${baseUrl}/storage/${producto.imagen}`" :alt="producto.nombre"
                        class="w-full h-32 object-cover">
                    <div class="p-3">
                        <h3 class="font-medium text-gray-800 text-sm line-clamp-2 break-all">{{ producto.nombre }}</h3>
                        <p class="text-gray-500 text-xs mt-1 line-clamp-2 break-all">{{ producto.descripcion }}</p>
                        <div class="flex justify-between items-center mt-3">
                            <span class="font-semibold text-sm">{{ producto.precio }}€</span>
                            <span @click.stop="toggleFavoritos(producto?.id)">
                                <svg width="1.2em" height="1.2em" viewBox="0 0 24 24" fill="#ea4823" stroke="#ea4823"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    style="position: relative; top: 5px; margin-left: 5px; margin-right: 5px;">
                                    <path
                                        d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                                    </path>
                                </svg>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Comercios Favoritos -->
            <div v-else class="grid grid-cols-2 m-3 gap-2">
                <div v-for="(comercio, index) in comerciosFavoritos" :key="comercio.id"
                    class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img :src="comercio.comercio.imagen" :alt="comercio.comercio.nombre"
                        class="w-full h-32 object-cover">
                    <div class="p-3">
                        <h3 class="font-medium text-gray-800 text-sm line-clamp-2 break-all">{{ comercio.comercio.nombre }}</h3>
                        <p class="text-gray-500 text-xs mt-1 line-clamp-2 break-all">{{ comercio.comercio.descripcion }}</p>
                        <div class="flex justify-between items-center mt-3">
                            <span class="font-semibold text-sm">{{ comercio.comercio.ciudad }}</span>
                            <span @click.stop="toggleFavoritosComercio(comercio?.id)">
                                <svg width="1.2em" height="1.2em" viewBox="0 0 24 24" fill="#ea4823" stroke="#ea4823"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    style="position: relative; top: 5px; margin-left: 5px; margin-right: 5px;">
                                    <path
                                        d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                                    </path>
                                </svg>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div v-else>
        <div class="w-full flex flex-col items-center mt-[180px]">
            <svg width="10em" height="10em" viewBox="0 0 24 24" fill="none" stroke="#ea4823" stroke-width="1.5"
                stroke-linecap="round" stroke-linejoin="round"
                style="position: relative; top: 5px; margin-left: 5px; margin-right: 5px;">
                <path
                    d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                </path>
            </svg>
            <p class="text-2xl font-semibold mt-4">No has iniciat sessió</p>
            <p class="text-base font-normal text-gray-600 text-center">
                És necessari iniciar sessió,<br> per gaudir d'aquesta funcionalitat.
            </p>
            <NuxtLink to="/login">
                <button
                    class="flex mt-4 items-center text-lg font-bold px-3 py-2 rounded-lg mt-2 border-2 text-white border-[#276BF2] bg-[#447EF2]">
                    <span>
                        Iniciar Sessió
                    </span>
                </button>
            </NuxtLink>
        </div>
    </div>
</template>

<script setup>
import { useAuthStore } from '@/stores/authStore';
import Loading from "@/components/loading.vue";

import { useRuntimeConfig } from "#imports";
const config = useRuntimeConfig();
const baseUrl = config.public.apiBaseUrl;

definePageMeta({
    layout: 'default',
});

const authStore = useAuthStore();
const loading = ref(true);
const mostrarProductos = ref(true);
let favoritos = reactive([]);
let comerciosFavoritos = reactive([]);
const { $communicationManager } = useNuxtApp();

async function toggleFavoritos(productoID) {
    try {
        const response = await $communicationManager.updateFavorito(authStore.user.id, productoID);

        if (response) {
            authStore.toggleFavorito(productoID)

            const index = favoritos.findIndex(producto => producto.id === productoID);
            if (index !== -1) {
                favoritos.splice(index, 1);
            }
        }

    } catch (error) {
        console.error("Error en la petición:", error);
    }
}

async function toggleFavoritosComercio(comercioID) {
    try {
        const response = await $communicationManager.updateFavoritoComercio(authStore.user.id, comercioID);

        if (response) {
            authStore.toggleFavoritoComercio(comercioID)

            const index = comerciosFavoritos.findIndex(comercio => comercio.id === comercioID);
            if (index !== -1) {
                comerciosFavoritos.splice(index, 1);
            }
        }

    } catch (error) {
        console.error("Error en la petición:", error);
    }
}

async function getComerciosFavoritos() {
    try {
        const response = await $communicationManager.getComercioFavoritos();

        if (response) {
            Object.assign(comerciosFavoritos, response);
        } else {
            console.log("No se obtuvieron comercios favoritos.");
        }
    } catch (error) {
        console.error("Error en la petición:", error);
    }
}

async function getFavoritos() {
    const response = await $communicationManager.getFavoritosInfo(authStore.user.id);

    if (!response) {
        // console.log('Error al obtenir les dades')
        return;
    }
    Object.assign(favoritos, response);

}

onMounted(() => {
    loading.value = true;
    getFavoritos();
    getComerciosFavoritos();
    loading.value = false;
});
</script>