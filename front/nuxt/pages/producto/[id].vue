<template>
    <div
        class="min-h-screen bg-gray-100 flex flex-col text-gray-900 transition-colors duration-300">
        <div id="header"
            class="w-full flex items-center justify-between p-4 bg-white fixed top-0 border-b">

            <!-- Botón de retroceso -->
            <div @click="goBack" class="text-xl text-gray-700 cursor-pointer">
                <svg width="1.5em" height="1.5em" viewBox="0 0 1024 1024" class="icon"
                    xmlns="http://www.w3.org/2000/svg" fill="#000000">
                    <g id="SVGRepo_iconCarrier">
                        <path fill="#000000" d="M224 480h640a32 32 0 110 64H224a32 32 0 010-64z"></path>
                        <path fill="#000000"
                            d="M237.248 512l265.408 265.344a32 32 0 01-45.312 45.312l-288-288a32 32 0 010-45.312l288-288a32 32 0 1145.312 45.312L237.248 512z">
                        </path>
                    </g>
                </svg>
            </div>

            <!-- Contenedor del título centrado -->
            <div class="absolute left-1/2 transform -translate-x-1/2">
                <h3 class="text-lg font-semibold truncate">
                    {{ producto?.nombre || 'Fitxa de producte' }}
                </h3>
            </div>

            <div id="corazon" @click="actualizaFavoritos(producto.id)"
                class="w-16 h-8 flex items-center justify-between cursor-pointer">
                <svg v-if="authStore?.favoritos?.has(producto?.id)" width="1.5em" height="1.5em" viewBox="0 0 24 24"
                    fill="#ea4823" stroke="#ea4823" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                    <path
                        d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                    </path>
                </svg>
                <svg v-else width="1.5em" height="1.5em" viewBox="0 0 24 24" fill="none" stroke="#000" stroke-width="1"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path
                        d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                    </path>
                </svg>
                <NuxtLink to="/cistella">
                    <svg width="1.7em" height="1.7em" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_iconCarrier">
                            <path d="M8 12L8 8C8 5.79086 9.79086 4 12 4V4C14.2091 4 16 5.79086 16 8L16 12"
                                stroke="#000000" stroke-width="1.3" stroke-linecap="round"></path>
                            <path
                                d="M3.69435 12.6678C3.83942 10.9269 3.91196 10.0565 4.48605 9.52824C5.06013 9 5.9336 9 7.68053 9H16.3195C18.0664 9 18.9399 9 19.514 9.52824C20.088 10.0565 20.1606 10.9269 20.3057 12.6678L20.8195 18.8339C20.904 19.8474 20.9462 20.3542 20.6491 20.6771C20.352 21 19.8435 21 18.8264 21H5.1736C4.15655 21 3.64802 21 3.35092 20.6771C3.05382 20.3542 3.09605 19.8474 3.18051 18.8339L3.69435 12.6678Z"
                                stroke="#000000" stroke-width="1.3"></path>
                        </g>
                    </svg>
                </NuxtLink>
            </div>
        </div>

        <div class="bg-white rounded-b-md mb-4 mt-[65px]">
            <div id="imgs" class="h-[400px] w-full max-w-[900px] mx-auto overflow-hidden">
                <img :src="producto?.imagen ? `${baseUrl}/storage/${producto.imagen}` : `${baseUrl}/storage/productos/default-image.webp`"
                    alt="Imagen del producto" class="h-full w-full object-contain" />
            </div>

            <div id="infoAdicional" class="p-4 flex flex-col flex-grow">
                <div id="contain-title" class="flex items-center">
                    <h2 class="text-2xl font-bold text-gray-800">
                        {{ producto?.nombre || 'Nombre no disponible' }}
                    </h2>
                    <span class="flex items-center">
                        <svg width="1.5em" height="1.5em" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg"
                            fill="#f7ad23">
                            <g id="SVGRepo_iconCarrier">
                                <path fill="#f7ad23"
                                    d="m512 747.84 228.16 119.936a6.4 6.4 0 0 0 9.28-6.72l-43.52-254.08 184.512-179.904a6.4 6.4 0 0 0-3.52-10.88l-255.104-37.12L517.76 147.904a6.4 6.4 0 0 0-11.52 0L392.192 379.072l-255.104 37.12a6.4 6.4 0 0 0-3.52 10.88L318.08 606.976l-43.584 254.08a6.4 6.4 0 0 0 9.28 6.72L512 747.84z">
                                </path>
                            </g>
                        </svg>
                        <h3 class="ml-1 text-gray-600 font-bold text-xl">{{ producto?.valoracion ||
                            '3.9' }}</h3>
                    </span>
                </div>
                <p class="text-gray-600 mt-2 text-justify">
                    {{ producto?.descripcion || 'Descripción no disponible' }}
                </p>
                <div class="mt-5">
                    <p class="text-xl text-gray-900">Venedor</p>
                    <div @click="irAComercio" id="comercioShop" class="flex h-[120px] mt-3 rounded-md border">
                        <div class="h-full w-[120px] border-r rounded-md bg-gray-200">
                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M4.87617 3.75H19.1238L21 8.86683V10.5C21 11.2516 20.7177 11.9465 20.25 12.4667V21H3.75V12.4667C3.28234 11.9465 3 11.2516 3 10.5V8.86683L4.87617 3.75ZM18.1875 13.3929C18.3807 13.3929 18.5688 13.3731 18.75 13.3355V19.5H15V15H9L9 19.5H5.25V13.3355C5.43122 13.3731 5.61926 13.3929 5.8125 13.3929C6.63629 13.3929 7.36559 13.0334 7.875 12.4667C8.38441 13.0334 9.11371 13.3929 9.9375 13.3929C10.7613 13.3929 11.4906 13.0334 12 12.4667C12.5094 13.0334 13.2387 13.3929 14.0625 13.3929C14.8863 13.3929 15.6156 13.0334 16.125 12.4667C16.6344 13.0334 17.3637 13.3929 18.1875 13.3929ZM10.5 19.5H13.5V16.5H10.5L10.5 19.5ZM19.5 9.75V10.5C19.5 11.2965 18.8856 11.8929 18.1875 11.8929C17.4894 11.8929 16.875 11.2965 16.875 10.5V9.75H19.5ZM19.1762 8.25L18.0762 5.25H5.92383L4.82383 8.25H19.1762ZM4.5 9.75V10.5C4.5 11.2965 5.11439 11.8929 5.8125 11.8929C6.51061 11.8929 7.125 11.2965 7.125 10.5V9.75H4.5ZM8.625 9.75V10.5C8.625 11.2965 9.23939 11.8929 9.9375 11.8929C10.6356 11.8929 11.25 11.2965 11.25 10.5V9.75H8.625ZM12.75 9.75V10.5C12.75 11.2965 13.3644 11.8929 14.0625 11.8929C14.7606 11.8929 15.375 11.2965 15.375 10.5V9.75H12.75Z"
                                        fill="#FFFFFF"></path>
                                </g>
                            </svg>
                        </div>
                        <div class="p-2 text-gray-600">
                            <p class="text-xl text-black">{{ producto?.comercio }}</p>
                            <div class="flex items-center">
                                <p class="text-base font-medium">3.5</p>
                                <PuntuacionComp :rating="3.5" class="mx-1" />
                                <p class="text-base font-medium">(132)</p>
                            </div>
                            <p class="text-base">800 mts</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-t-lg">
            <div class="p-4 flex flex-col flex-grow mb-20">
                <div>
                    <div class="flex items-center">
                        <p class="text-xl text-gray-900">Ressenyes</p>
                        <p class="text-gray-500 ml-1">(34)</p>
                    </div>
                    <div class="mt-3 divide-y divide-gray-200 border-t border-gray-200">
                        <!-- RESEÑA -->
                        <div class="bg-white p-4 max-w-md">
                            <div class="flex justify-between mb-2">
                                <div class="flex items-center">
                                    <div class="bg-gray-200 rounded-full w-[40px] h-[40px] mr-2"></div>
                                    <div>
                                        <p class="font-semibold text-gray-900">Luisa Viñedo Ruiz</p>
                                        <div class="flex items-center">
                                            <span v-for="n in 4" :key="n" class="text-yellow-500">&#9733;</span>
                                            <span class="text-gray-400">&#9733;</span>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-gray-500 text-sm mt-0.5">Mar 5</p>
                            </div>
                            <p class="font-bold text-gray-900 mb-1">Increíble experiencia desde el primer día</p>
                            <p class="text-gray-700 text-sm">
                                Todo ha funcionado perfectamente. La atención ha sido excelente y no he tenido ningún
                                problema hasta ahora.
                            </p>
                        </div>
                        <div class="bg-white p-4 max-w-md">
                            <div class="flex justify-between mb-2">
                                <div class="flex items-center">
                                    <div class="bg-gray-200 rounded-full w-[40px] h-[40px] mr-2"></div>
                                    <div>
                                        <p class="font-semibold text-gray-900">Daniel Montes Pérez</p>
                                        <div class="flex items-center">
                                            <span v-for="n in 3" :key="n" class="text-yellow-500">&#9733;</span>
                                            <span class="text-gray-400">&#9733;</span>
                                            <span class="text-gray-400">&#9733;</span>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-gray-500 text-sm mt-0.5">Gen 12</p>
                            </div>
                            <p class="font-bold text-gray-900 mb-1">Buena calidad y servicio confiable</p>
                            <p class="text-gray-700 text-sm">
                                Me sorprendió lo bien que ha resultado. Definitivamente lo recomendaría a cualquiera que
                                busque algo de calidad.
                            </p>
                        </div>
                        <div class="bg-white p-4 max-w-md">
                            <div class="flex justify-between mb-2">
                                <div class="flex items-center">
                                    <div class="bg-gray-200 rounded-full w-[40px] h-[40px] mr-2"></div>
                                    <div>
                                        <p class="font-semibold text-gray-900">Ana Beltrán García</p>
                                        <div class="flex items-center">
                                            <span v-for="n in 3" :key="n" class="text-yellow-500">&#9733;</span>
                                            <span class="text-gray-400">&#9733;</span>
                                            <span class="text-gray-400">&#9733;</span>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-gray-500 text-sm mt-0.5">Feb 22</p>
                            </div>
                            <p class="font-bold text-gray-900 mb-1">Cumple con lo prometido</p>
                            <p class="text-gray-700 text-sm">
                                Desde el primer momento supe que había hecho una buena elección. No me ha decepcionado
                                en absoluto.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div v-if="producto" id="footer" class="mb-5 fixed bottom-0 left-0 right-0 mx-auto">
            <div id="carrito" class="flex items-center justify-center w-full">
                <button ref="buttonRef" @click="addToBasket(producto)"
                    class="bg-[#276BF2] text-white text-xl font-semibold rounded-xl px-5 py-4 w-[90vw] transition-all duration-150 active:scale-95 relative overflow-hidden">
                    {{ textCistella }}
                    <div class="circle-animation" :class="{ 'active': clicked }"></div>
                </button>
            </div>
        </div>
    </div>
</template>

<script setup>
definePageMeta({
    layout: false,
});

import { useNuxtApp } from "#app";
import { ref, onMounted } from "vue";
import { useRoute, useRouter } from "vue-router";
import { useAuthStore } from "#imports";
import PuntuacionComp from "../../components/PuntuacionComp.vue";
import { useComercioStore } from '@/stores/comercioStore';

const { $communicationManager } = useNuxtApp();
const route = useRoute();
const router = useRouter();
const producto = ref(null);
const selectedSize = ref(null);
const selectedColor = ref(null);
const textCistella = ref('');
const buttonRef = ref(null)
const clicked = ref(false);

import { useRuntimeConfig } from "#imports";
const config = useRuntimeConfig();
const baseUrl = config.public.apiBaseUrl;

const authStore = useAuthStore();

const fetchProducto = async () => {
    try {
        const id = route.params.id;
        const response = await $communicationManager.getProductoById(id);
        if (response) {
            producto.value = response;
            textCistella.value = `Afegeix 1 per ${Number(producto.value.precio).toFixed(2)} €`;
            if (producto.value.varientes && producto.value.varientes.length > 0) {
                selectedColor.value = producto.value.varientes[0].color;
                selectedSize.value = producto.value.varientes[0];
            }
        }
    } catch (error) {
        console.error("Error obteniendo el producto:", error);
    }
};

const goBack = () => {
    router.back();
};

const irAComercio = () => {
    if (producto.value && producto.value.comercio_id) {
        router.push(`/comercio/${producto.value.comercio_id}`);
    } else {
        console.error("No se encontró el ID del comercio.");
    }
};

async function actualizaFavoritos(productoID) {
    const { $communicationManager } = useNuxtApp();
    console.log(productoID) 
    try {
        const response = await $communicationManager.updateFavorito(authStore?.user?.id, productoID);

        if (response) {
            authStore.toggleFavorito(productoID)
        }

    } catch (error) {
        console.error("Error en la petición:", error);
    }
}

function addToBasket(producto) {
    if(!clicked.value){
        if (buttonRef.value) {
            buttonRef.value.classList.add('scale-90');
            buttonRef.value.classList.add('bg-green-500');
            setTimeout(() => {
                buttonRef.value.classList.remove('scale-90')
            }, 150)
        }
        const comercioStore = useComercioStore();
        comercioStore.addToBasket(producto);
        textCistella.value = 'Veure la cistella'
        clicked.value = true;
    } else {
        router.push('/cistella');
    }
}

onMounted(() => {
    fetchProducto();
});
</script>


<style scoped>
@import '../../assets/productoConcreto.css';
@import '../../assets/productoConcreto.css';
</style>