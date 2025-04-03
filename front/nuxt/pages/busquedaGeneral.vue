<template>
    <div v-if="loading" class="flex justify-center items-center">
        <Loading />
    </div>
    <div v-else>
        <nav class="sticky top-[76px] z-50 flex justify-center w-full bg-white text-lg border-b border-gray-300">
            <div class="flex justify-around w-[60vw]">
                <button class="border-b-2" :class="{
                    'text-black': currentSection === 'productos', 'border-[#276BF2]': currentSection === 'productos',
                    'text-gray-400': currentSection !== 'productos', 'border-white': currentSection !== 'productos'
                }"
                    @click="showSection('productos'), getProductsBySearch()">
                    Productes
                </button>
                <button
                    class="hover:text-black hover:border-b-2 hover:border-blue-500 text-gray-400 border-b-2 border-white"
                    @click="showSection('comercios'); getComerciosBySearch()">
                    Comerços
                </button>
            </div>
        </nav>
        <div v-if="currentSection === 'productos'" class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div v-if="Object.values(productos).length > 0">
                <div v-for="(product, index) in Object.values(productos)" :key="index"
                    class="p-4 border rounded shadow-md">
                    <div class="flex h-50px] items-center">
                        <img :src="`${baseUrl}/storage/${product.imagen}`" class="h-[180px] w-[150px] border" />
                        <div class="flex flex-col ml-5">
                            <h2 class="text-xl font-bold mb-2 line-clamp-2 break-all">{{ product.nombre }}</h2>
                            <div class="flex mt-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="#e9ec27"
                                    class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="#e9ec27"
                                    class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="#e9ec27"
                                    class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="#e9ec27"
                                    class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="#e9ec27"
                                    class="bi bi-star-half" viewBox="0 0 16 16">
                                    <path
                                        d="M5.354 5.119 7.538.792A.52.52 0 0 1 8 .5c.183 0 .366.097.465.292l2.184 4.327 4.898.696A.54.54 0 0 1 16 6.32a.55.55 0 0 1-.17.445l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256a.5.5 0 0 1-.146.05c-.342.06-.668-.254-.6-.642l.83-4.73L.173 6.765a.55.55 0 0 1-.172-.403.6.6 0 0 1 .085-.302.51.51 0 0 1 .37-.245zM8 12.027a.5.5 0 0 1 .232.056l3.686 1.894-.694-3.957a.56.56 0 0 1 .162-.505l2.907-2.77-4.052-.576a.53.53 0 0 1-.393-.288L8.001 2.223 8 2.226z" />
                                </svg>
                            </div>
                            <p class="mt-3 text-xl">{{ product.precio }} €</p>
                            <button @click="addToBasket(product)"
                                class="pt-1 pb-1 pl-2 pr-2 mt-4 w-fit bg-[#276BF2] rounded-lg text-white">Afegir a la
                                cistella</button>
                        </div>
                    </div>
                </div>
            </div>
            <div v-else>
                <p class="text-center text-lg mt-4">No hay coincidencias</p>
            </div>
        </div>
        <div v-else v-if="currentSection === 'comercios'">
            <div v-if="Object.values(comercios).length > 0">
                <div v-for="(comercio, index) in Object.values(comercios)" :key="index"
                    @click="navigateTo('comercio/' + comercio.id)"
                    class="relative border rounded shadow-md m-4 overflow-visible">
                    <img src="" class="w-full h-[250px] object-cover" />
                    <div class="absolute bottom-0 left-0 w-full bg-gray-200 bg-opacity-70 p-4 h-fit">
                        <h3 class="text-center">{{ comercio.nombre }}</h3>
                        <h5 class="text-center">{{ getNombreCategoria(comercio.categoria_id) }}</h5>
                        <div class="flex items-left justify-between">
                            <div class="flex items-center">
                                <p>{{ comercio.puntaje_medio }}</p>
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="#e9ec27"
                                    class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                </svg>
                            </div>
                            <div class="flex text-right items-center">
                                <div :style="{ backgroundColor: getOpenState(comercio.horario) === 'cerrado' ? 'red' : 'green' }"
                                    class="w-4 h-4 rounded-full mr-2">
                                </div>
                                <p>{{ getOpenState(comercio.horario) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div v-else>
                <p class="text-center text-lg mt-4">No hay coincidencias</p>
            </div>
        </div>
    </div>
</template>

<script setup>
import Loading from "@/components/loading.vue";
import { useRoute } from '#imports';
import { useComercioStore } from '@/stores/comercioStore';

import { useRuntimeConfig } from "#imports";
const config = useRuntimeConfig();
const baseUrl = config.public.apiBaseUrl;

definePageMeta({
    layout: 'default',
});

const loading = ref(true);
let productos = reactive({});
const comercios = reactive({});
const categorias = ref([]);
const route = useRoute();
let searchQuery = route.query.search || '';
const currentSection = ref('productos');

function addToBasket(producto) {
    const comercioStore = useComercioStore();
    comercioStore.addToBasket(producto);
    if (confirm('¿Quieres ir a la cesta?')) {
        navigateTo('/cistella');
    }
}

function showSection(section) {
    currentSection.value = section;
}

function getNombreCategoria(categoria_id) {
    if (!Array.isArray(categorias.value)) return 'Categoría no encontrada'; // Previene el error
    const categoria = categorias.value.find((c) => c.id === categoria_id);
    return categoria ? categoria.name : 'Categoría no encontrada';
}

async function getProductsBySearch() {
    const { $communicationManager } = useNuxtApp();

    const response = await $communicationManager.busquedaProductos(searchQuery);

    Object.keys(productos).forEach(key => delete productos[key]);
    if (response.data) {
        Object.assign(productos, response.data);
    }
}

async function getComerciosBySearch() {
    const { $communicationManager } = useNuxtApp();

    const response = await $communicationManager.busquedaComercios(searchQuery);
    Object.keys(comercios).forEach(key => delete comercios[key]);
    if (response) {
        Object.assign(comercios, response.data);
    }
}

async function getCategorias() {
    const { $communicationManager } = useNuxtApp();
    categorias.value = await $communicationManager.getCategorias();
}

function getOpenState(horario) {
    if (!horario) return 'Cerrado';
    const schedule = typeof horario === 'string' ? JSON.parse(horario) : horario;
    const dayOfWeek = new Date().toLocaleString('es-ES', { weekday: 'long' }).toLowerCase();

    if (!schedule[dayOfWeek] || schedule[dayOfWeek].toLowerCase().includes('cerrado')) {
        return 'Cerrado';
    }
    const [openTime, closeTime] = schedule[dayOfWeek].split('-').map(t => t.trim());
    const [openHour, openMinute] = openTime.split(':').map(Number);
    const [closeHour, closeMinute] = closeTime.split(':').map(Number);

    const now = new Date();
    const currentMinutes = now.getHours() * 60 + now.getMinutes();
    const startMinutes = openHour * 60 + openMinute;
    const endMinutes = closeHour * 60 + closeMinute;

    return currentMinutes >= startMinutes && currentMinutes <= endMinutes ? 'Abierto' : 'Cerrado';
}

onMounted(() => {
    loading.value = true;
    if (currentSection.value === 'productos') {
        getProductsBySearch();
    } else if (currentSection.value === 'comercios') {
        getCategorias();
        getComerciosBySearch();
    }
    loading.value = false;
});

// Observa cambios en `route.query.search`
watch(() => route.query.search, (newSearch) => {
    loading.value = true;
    searchQuery = newSearch || '';
    if (currentSection.value === 'productos') {
        getProductsBySearch();
    } else if (currentSection.value === 'comercios') {
        getCategorias();
        getComerciosBySearch();
    }
    loading.value = false;
});
</script>
