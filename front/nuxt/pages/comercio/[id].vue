<template>
    <loading v-if="isLoading" />

    <div v-if="comercio">
        <div v-if="infoVisible" class="flex items-center justify-center fixed inset-0 z-40">
            <div class="bg-gray-900/50 fixed inset-0 z-40"></div>
            <div class="w-[80vw] max-w-lg bg-white rounded-2xl shadow-xl p-6 z-50 absolute">

                <h2 class="text-2xl font-bold text-gray-800 mb-4">{{ comercio.nombre }}</h2>
                <svg @click="toggleInfo" width="1.5em" height="1.5em" viewBox="-0.5 0 25 25" fill="none"
                    xmlns="http://www.w3.org/2000/svg" class="absolute top-[15px] right-[15px]">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path d="M3 21.32L21 3.32001" stroke="#000000" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                        <path d="M3 3.32001L21 21.32" stroke="#000000" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                    </g>
                </svg>

                <div class="space-y-3">
                    <p class="text-gray-600 items-center">
                        <span class="font-semibold text-gray-800 mr-2">📜 Descripció:</span> {{ comercio.descripcion }}
                    </p>
                    <p class="text-gray-600 items-center">
                        <span class="font-semibold text-gray-800 mr-2">📍 Direcció:</span><br> {{ comercio.calle_num }}
                    </p>
                    <p class="text-gray-600 items-center">
                        <span class="font-semibold text-gray-800 mr-2">📞 Telèfon: </span><br> {{ comercio.phone }}
                    </p>
                    <p class="text-gray-600 items-center">
                        <span class="font-semibold text-gray-800 mr-2">✉️ Email:</span> {{ comercio.email }}
                    </p>
                </div>

                <div class="mt-4">
                    <span class="font-semibold text-gray-800">🕒 Horari:</span>
                    <ul class="mt-2 space-y-2 bg-gray-100 p-3 rounded-lg">
                        <li v-for="(horario, dia) in JSON.parse(comercio.horario)" :key="dia"
                            class="text-gray-700 flex items-center">
                            <strong class="mr-2 text-gray-900">{{ dia }}:</strong> {{ horario }}
                        </li>
                    </ul>
                </div>
            </div>

        </div>

        <div class="bg-[#276BF2] w-full h-[20vh] rounded-b-3xl flex flex-col items-center relative mb-12">
            <div class="flex justify-between items-center p-4 w-full">
                <div class="bg-white rounded-full flex items-center justify-center p-2">
                    <svg @click="goBack" width="2em" height="2em" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path
                                d="M14.2893 5.70708C13.8988 5.31655 13.2657 5.31655 12.8751 5.70708L7.98768 10.5993C7.20729 11.3805 7.2076 12.6463 7.98837 13.427L12.8787 18.3174C13.2693 18.7079 13.9024 18.7079 14.293 18.3174C14.6835 17.9269 14.6835 17.2937 14.293 16.9032L10.1073 12.7175C9.71678 12.327 9.71678 11.6939 10.1073 11.3033L14.2893 7.12129C14.6799 6.73077 14.6799 6.0976 14.2893 5.70708Z"
                                fill="#0F0F0F"></path>
                        </g>
                    </svg>
                </div>
                <p class="font-semibold text-white text-xl">Perfil de comerç</p>
                <div class="bg-white rounded-full flex items-center justify-center p-3"
                    @click="darLikeComercio(comercio.id)">
                    <svg @click="toggleColor" width="1.5em" height="1.5em" viewBox="0 0 24 24" fill="none" stroke="#000"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        :class="isLiked ? 'fill-red-500 stroke-red-500' : 'fill-white stroke-red-500'">
                        <path
                            d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                        </path>
                    </svg>
                </div>

            </div>
            <div class="w-[85vw] bg-white border rounded-md absolute bottom-[-50px] flex items-center p-2">
                <div class="w-[80px] h-[80px] border border-gray-400 rounded-md bg-gray-100 mr-2 overflow-hidden">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTax-ApMm37HSk0kyDBucbsorK56o8DeULcr__CcbkzJoGLRW_YPFG5JVOV3BrUXCsX_uY&usqp=CAU"
                        alt="imagen del comercio" class="w-full h-full object-cover">
                </div>
                <div class="h-full flex-grow">
                    <div class="flex justify-between items-center pr-1">
                        <p class="font-semibold text-lg tracking-wider truncate"> {{ comercio.nombre }}</p>
                        <button @click="toggleInfo">
                            <svg height="1.6em" width="1.6em" fill="#000000" viewBox="-1 0 19 19"
                                xmlns="http://www.w3.org/2000/svg" class="cf-icon-svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path
                                        d="M16.417 9.583A7.917 7.917 0 1 1 8.5 1.666a7.917 7.917 0 0 1 7.917 7.917zM5.85 3.309a6.833 6.833 0 1 0 2.65-.534 6.787 6.787 0 0 0-2.65.534zm2.654 1.336A1.136 1.136 0 1 1 7.37 5.78a1.136 1.136 0 0 1 1.135-1.136zm.792 9.223V8.665a.792.792 0 1 0-1.583 0v5.203a.792.792 0 0 0 1.583 0z">
                                    </path>
                                </g>
                            </svg>
                        </button>
                    </div>
                    <p class="font-light text-base mb-1">Indumentaria</p>
                    <PuntuacionComp :rating="comercio.puntaje_medio" :customClass="'relative w-4 h-4'" />
                </div>
            </div>
        </div>
        <div class="p-5">
            <input class="px-5 py-2 w-full rounded-md border bg-gray-50 focus:outline-none focus:ring-0" type="text"
                name="search" id="search" placeholder="Buscar productes...">

            <div id="subcategorias" v-if="subcategorias.length"
                class="flex space-x-3 items-center overflow-x-auto mt-4">
                <div v-for="subcategoria in subcategorias" :key="subcategoria.id"
                    @click="toggleSubcategoria(subcategoria)"
                    :class="selectedSubcategorias.includes(subcategoria.id) ? 'bg-gray-100 text-white font-semibold' : 'text-gray-700'"
                    class="flex flex-col items-center justify-between cursor-pointer h-[110px] rounded-md">
                    <div class="w-[4em] h-[4em] rounded-full p-2 border bg-gray-50 overflow-hidden">
                        <!-- <img :src="categoria.imagenes" alt="imgCategoria"> -->
                    </div>
                    <p
                        class="flex items-center justify-center text-center mt-1 text-sm font-medium text-gray-800 flex-grow">
                        {{ subcategoria.name }}
                    </p>
                </div>
            </div>

            <div v-if="view === 'productos'">
                <div id="productos" class="grid grid-cols-2 gap-4 mt-4">
                    <productoComp v-for="(producto, index) in filteredProductos" :key="index" :productoId="producto.id"
                        :img="producto.imagen ? `${baseUrl}/storage/${producto.imagen}` : `${baseUrl}/storage/productos/default-image.webp`"
                        :title="producto.nombre" :price="producto.precio" :customClass="'w-full'"
                        price-class="text-gray-900" @click="mostrarIdProducto(producto.producto_id)">
                    </productoComp>
                </div>
            </div>
        </div>
    </div>
</template>


<script setup>
definePageMeta({
    layout: 'footer-only',
});

import { useNuxtApp } from "#app";
import { ref, onMounted, computed } from "vue";
import { useRoute, useRouter } from "vue-router";
import loading from "../../components/loading.vue";

import { useRuntimeConfig } from "#imports";
import PuntuacionComp from "~/components/PuntuacionComp.vue";
const config = useRuntimeConfig();
const baseUrl = config.public.apiBaseUrl;
const backgroundShadow = ref(false);

const route = useRoute();
const productos = ref([]);
const router = useRouter();
const comercio = ref(null);
const isLoading = ref(true);
const subcategorias = ref([]);
const selectedSubcategorias = ref([]);
const view = ref('productos');
const { $communicationManager } = useNuxtApp();
const infoVisible = ref(false);
const tieneLike = ref(false);
const isLiked = ref(false);

const mostrarIdProducto = (id) => {
    console.log("ID del producto:", id);
    router.push(`/producto/${id}`);
};

const darLikeComercio = async (id) => {
    try {
        const response = await $communicationManager.darLikeComercio(id);
        console.log("Like dado al comercio con id:", id);
        console.log(response);
    } catch (error) {
        console.error("Error al dar like al comercio:", error);
    }
};

function toggleColor() {
    isLiked.value = !isLiked.value;
}

const consultarSiTieneLike = async (id) => {
    try {
        const response = await $communicationManager.consultarSiTieneLikeComercio(id);
        tieneLike.value = response;
        console.log("¿El usuario sigue este comercio?", response);
    } catch (error) {
        console.error("Error al consultar si tiene like:", error);
    }
};


const fetchComercio = async () => {
    const id = route.params.id;
    try {
        const response = await $communicationManager.getComercioById(id);

        if (response) {
            comercio.value = response.comercio;
            productos.value = response.productos;

            const subcats = response.productos.map(producto => producto.subcategoria);
            subcategorias.value = [...new Map(subcats.map(sub => [sub.id, sub])).values()];

            isLoading.value = false;
        } else {
            throw new Error("No se pudo obtener el comercio");
        }
    } catch (error) {
        console.error("Error al obtener el comercio:", error);
        isLoading.value = false;
    }
};

const formatPrice = (price) => {
    return parseFloat(price).toFixed(2);
};

const toggleView = (newView) => {
    view.value = newView;
};

const filteredProductos = computed(() => {
    if (selectedSubcategorias.value.length === 0) {
        return productos.value;
    }
    return productos.value.filter(producto =>
        selectedSubcategorias.value.includes(producto.subcategoria.id)
    );
});


const toggleSubcategoria = (subcategoria) => {
    if (selectedSubcategorias.value.includes(subcategoria.id)) {
        selectedSubcategorias.value = selectedSubcategorias.value.filter(id => id !== subcategoria.id);
    } else {
        selectedSubcategorias.value.push(subcategoria.id);
    }
};

function toggleInfo() {
    infoVisible.value = !infoVisible.value;
}

const goBack = () => {
    router.back();
};

onMounted(async () => {
    await fetchComercio();
    if (comercio.value) {
        consultarSiTieneLike(comercio.value.id);
    }
});
</script>