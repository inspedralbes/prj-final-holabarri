<template>
    <div class="bg-gray-100">
        <div>
            <div class="min-h-screen transition-colors duration-300">
                <StoreCarousel :comercios="comercios.slice(0, 5)" v-if="comercios.length"/>
                <!-- <div id="banner" class="bg-white mt-2 px-4 w-full h-[150px] flex items-center justify-between relative">
                    <div v-if="comercios.length"
                        :style="{ backgroundImage: 'url(' + comercios[currentIndex].imagen + ')', backgroundSize: 'cover' }"
                        class="h-full w-full flex items-center justify-center">
                        <p class="text-white font-bold text-lg px-4 py-1 bg-black bg-opacity-50 shadow-md">
                            {{ comercios[currentIndex].nombre }}
                        </p>
                    </div>
                    <p v-else class="text-gray-500 font-bold text-lg">
                        No s'han trobat comerços propers a la teva ubicació
                    </p>
                    <button v-if="comercios.length" @click="irAlComercio(comercios[currentIndex].id)"
                        class="absolute bottom-2 right-9 bg-white text-black px-3 py-1 shadow-md hover:bg-gray-100">
                        Anar al comerç
                    </button>
                </div> -->
                <img src="https://sl.bing.net/k6Zr6eP9Yu4" alt="">
                <div id="contain-categorias"
                    class="bg-white w-full flex flex-col py-4 border rounded-xl mb-2 scrollbar-none">
                    <div class="flex justify-between mx-4 mb-3">
                        <h2 class="font-semibold text-lg">Categories</h2>
                        <p class="text-gray-500 flex items-center">
                            Veure totes
                            <svg width="1.5em" height="1.5em" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path
                                        d="M9.71069 18.2929C10.1012 18.6834 10.7344 18.6834 11.1249 18.2929L16.0123 13.4006C16.7927 12.6195 16.7924 11.3537 16.0117 10.5729L11.1213 5.68254C10.7308 5.29202 10.0976 5.29202 9.70708 5.68254C9.31655 6.07307 9.31655 6.70623 9.70708 7.09676L13.8927 11.2824C14.2833 11.6729 14.2833 12.3061 13.8927 12.6966L9.71069 16.8787C9.32016 17.2692 9.32016 17.9023 9.71069 18.2929Z"
                                        fill="#6B7280"></path>
                                </g>
                            </svg>
                        </p>
                    </div>
                    <div id="categorias" class="flex space-x-6 px-4 items-center overflow-x-auto">
                        <div v-for="categoria in categorias" :key="categoria.id"
                            class="flex flex-col items-center justify-center cursor-pointer"
                            @click="irACategoria(categoria.id)">
                            <div class="w-[4em] h-[4em] rounded-full p-2 border bg-gray-50 overflow-hidden">
                                <img :src="categoria.imagenes" alt="imgCategoria">
                            </div>
                            <p
                                class="flex items-center justify-center mt-1 text-sm font-medium text-gray-800">
                                {{ categoria.name }}
                            </p>
                        </div>
                    </div>
                </div>

                <div id="contain-productos" class="py-4 bg-white border-t rounded-t-xl">
                    <div class="flex justify-between mx-4 mb-4">
                        <h1 class="text-xl font-semibold text-gray-900">Últimes tendències</h1>
                        <p class="text-gray-500 flex items-ceeminter">
                            Veure totes
                            <svg width="1.5em" height="1.5em" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path
                                        d="M9.71069 18.2929C10.1012 18.6834 10.7344 18.6834 11.1249 18.2929L16.0123 13.4006C16.7927 12.6195 16.7924 11.3537 16.0117 10.5729L11.1213 5.68254C10.7308 5.29202 10.0976 5.29202 9.70708 5.68254C9.31655 6.07307 9.31655 6.70623 9.70708 7.09676L13.8927 11.2824C14.2833 11.6729 14.2833 12.3061 13.8927 12.6966L9.71069 16.8787C9.32016 17.2692 9.32016 17.9023 9.71069 18.2929Z"
                                        fill="#6B7280"></path>
                                </g>
                            </svg>
                        </p>
                    </div>
                    <div class="flex space-x-1 pl-4 items-center overflow-x-auto scrollbar-none">
                        <productoComp v-for="(producto, index) in productos2" :key="index" :id="producto.id"
                            :img="producto.imagen ? `${baseUrl}/storage/${producto.imagen}` : `${baseUrl}/storage/productos/default-image.webp`"
                            :title="producto.nombre" :price="producto.precio" :comercio="producto.comercio"
                            :customClass="'w-[170px]'" price-class="text-gray-900 "
                            @click="mostrarIdProducto(producto.id)"></productoComp>
                    </div>
                    <h1 class="text-xl mt-5 font-semibold text-gray-900 mb-4 ml-4">Productes a prop teu</h1>
                    <div id="productos" class="grid grid-cols-2 gap-4 px-4">
                        <productoComp v-for="(producto, index) in productos" :key="index" :productoId="producto.id"
                            :img="producto.imagen ? `${baseUrl}/storage/${producto.imagen}` : `${baseUrl}/storage/productos/default-image.webp`"
                            :title="producto.nombre" :price="producto.precio" :comercio="producto.comercio_nombre"
                            :customClass="'w-full'" price-class="text-gray-900"
                            @click="mostrarIdProducto(producto.id)">
                        </productoComp>
                        <div v-if="productos.length === 0" class="text-center py-4 text-gray-500">
                            <p>No hi ha productes de comerços a prop teu. Si vols veure la ubicació, accepta la permís de
                                geolocalització.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted, watch } from "vue";
import { useRouter } from "vue-router";
import { useAuthStore } from "~/stores/authStore";
import { useRuntimeConfig } from "#imports";

const config = useRuntimeConfig();
const baseUrl = config.public.apiBaseUrl;
const comercios = ref([]);
const currentIndex = ref(0);

const productos = ref([]);
const productos2 = ref([]);
const categorias = ref([]);
const router = useRouter();
const userLocation = ref(null);
const authStore = useAuthStore();
const { $communicationManager } = useNuxtApp();
// const isDarkMode = ref(window.matchMedia("(prefers-color-scheme: dark)").matches);
const isDarkMode = false;

onMounted(async () => {
    getLocation();
    fetchProductos2();
    fetchCategorias();
    await checkLocationPermission();

    setInterval(() => {
        if (comercios.value.length > 0) {
            currentIndex.value = (currentIndex.value + 1) % comercios.value.length;
        }
    }, 5000);
});

// watch(isDarkMode, (newValue) => {
//     document.body.classList.toggle("dark", newValue);
// });

async function checkLocationPermission() {
    if (localStorage.getItem("locationPermission") === "granted") {
        await getLocation();
    } else {
        requestLocationPermission();
    }
}

async function getLocation() {
    if ("geolocation" in navigator) {
        navigator.geolocation.getCurrentPosition(
            async (position) => {
                const { latitude, longitude } = position.coords;
                userLocation.value = { latitude, longitude };
                localStorage.setItem("locationPermission", "granted");
                await fetchComerciosCercanos(latitude, longitude);
            },
            (error) => {
                console.error("Error al obtener la ubicación:", error);
            }
        );
    } else {
        console.error("Geolocalización no disponible.");
    }
}

async function fetchComerciosCercanos(lat, lon) {
    try {
        const response = await $communicationManager.getComerciosCercanos(lat, lon);
        console.log(response)
        comercios.value = response;

        const idsComercios = response.map(comercio => comercio.id);
        const idsComerciosString = idsComercios.join(',');

        getProductosCercanos(idsComerciosString);
    } catch (error) {
        console.error("Error al obtener comercios cercanos", error);
    }
}

async function getProductosCercanos(comercioIds) {
    try {
        const response = await $communicationManager.getProductosCercanos(comercioIds);
        if (response && response.data) {
            productos.value = response.data;
        }
    } catch (error) {
        console.error("Error al obtener productos cercanos", error);
    }
}

async function fetchProductos2() {
    try {
        const response = await $communicationManager.getProductos();
        if (response && response.data) {
            productos2.value = response.data;
        } else {
            console.error("Error al obtener los productos");
        }
    } catch (error) {
        console.error("Error en la petición:", error);
    }
}

async function fetchCategorias() {
    try {
        const responseCategorias = await $communicationManager.getCategoriasGenerales();
        if (responseCategorias) {
            categorias.value = responseCategorias;
        } else {
            console.error("Error al obtener las categorías");
        }
    } catch (error) {
        console.error("Error en la petición:", error);
    }
}

function irACategoria(id) {
    router.push(`/categorias/${id}`);
}

function mostrarIdProducto(id) {
    router.push(`/producto/${id}`);
}
</script>

<style scoped>
@import '../assets/index.css';
</style>
