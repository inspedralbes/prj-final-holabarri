<template>
    <main v-if="actualOrder?.order?.cliente">
        <div
            class="pl-4 pt-4 bg-white block sm:flex items-center justify-between border-b border-gray-200 lg:mt-1.5">
            <div class="w-full mt-16">
                <div class="mb-4 flex items-center">
                    <div @click="navigateTo('/admin/comandes')" class="text-xl text-gray-700  cursor-pointer">
                        <svg width="1.5em" height="1.5em" viewBox="0 0 1024 1024" class="icon"
                            xmlns="http://www.w3.org/2000/svg" fill="#000000">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path fill="#000000" d="M224 480h640a32 32 0 110 64H224a32 32 0 010-64z"></path>
                                <path fill="#000000"
                                    d="M237.248 512l265.408 265.344a32 32 0 01-45.312 45.312l-288-288a32 32 0 010-45.312l288-288a32 32 0 1145.312 45.312L237.248 512z">
                                </path>
                            </g>
                        </svg>
                    </div>
                    <h1 class="ml-2 text-xl font-semibold text-gray-900 sm:text-2xl ">Comanda ID: {{
                        actualOrder?.id }}</h1>
                    <h3 class="ml-2 pt-2 text-base font-medium text-gray-900 whitespace-nowrap ">{{
                        formatFecha(actualOrder.created_at) }}</h3>
                </div>
                <!-- Barra de búsqueda + botones -->
            </div>
        </div>


        <div class="px-4 pt-4 grid gap-4 xl:grid-cols-2 2xl:grid-cols-3">
            <div class="2xl:col-span-2">
                <div
                    class="p-4 mb-4 bg-white border border-gray-200 shadow-sm  sm:p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex-shrink-0">
                            <span
                                class="text-xl font-bold leading-none text-gray-900 sm:text-2xl ">Llistat
                                de productes</span>
                            <h3 class="text-base font-light ">Llistat de tots els
                                productes que el cliente ha comprat</h3>
                        </div>
                    </div>
                    <div class="divide-y divide-gray-200 ">
                        <div class="producto" v-for="productoOrder in actualOrder.productos_compra">
                            <div class="flex">
                                <div class="contain-image">
                                    <img class="image object-cover w-full h-full"
                                        :src="`${baseUrl}/storage/${productoOrder.producto.imagen}`"
                                        alt="image">
                                </div>
                                <div class="contain-text">
                                    <h3 class="font-medium text-gray-900 truncate  truncate">{{
                                        productoOrder.producto.nombre }}
                                    </h3>
                                    <h4 class="font-small text-gray-900  truncate">Opciones de producto
                                    </h4>
                                </div>
                            </div>
                            <div class="contain-precio">
                                <h2 class="font-small text-gray-900  truncate">
                                    {{ productoOrder.precio.toFixed(2) }} €</h2>
                                <h2 class="text-base font-semibold text-gray-900 ">
                                    <span class="font-large font-bold text-md  ml-1">
                                        x {{ productoOrder.cantidad }} UDS:
                                    </span>
                                    {{ (productoOrder.precio * productoOrder.cantidad).toFixed(2) }} €
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-4 bg-white border border-gray-200 shadow-sm  sm:p-6">
                    <div class="mb-4">
                        <div class="flex-shrink-0">
                            <span
                                class="text-xl font-bold leading-none text-gray-900 sm:text-2xl  truncate">
                                Total de la comanda
                            </span>
                            <h3 class="text-base font-light  truncate">
                                Desglose completo del importe de la comanda</h3>
                        </div>
                        <div class="flex mt-4">
                            <div class="w-full">
                                <!-- Fila 1 - Subtotal -->
                                <div class="w-full flex justify-between items-center mb-2">
                                    <div class="flex items-center gap-2">
                                        <span class="font-small text-gray-900 ">{{
                                            actualOrder?.productos_compra?.length }} ítems</span>
                                    </div>
                                    <span class="font-small text-gray-900 ">{{ subtotal.toFixed(2) }}
                                        €</span>
                                </div>

                                <!-- Fila 2 - Descuento -->
                                <div class="w-full flex justify-between items-center mb-2">
                                    <span class="font-small text-gray-900 ">Descompte</span>
                                    <span class="font-small text-gray-900 ">0.00 €</span>
                                </div>

                                <!-- Fila 3 - Comisión -->
                                <div class="w-full flex justify-between items-center mb-2">
                                    <span class="font-small text-gray-900 ">Taxes</span>
                                    <span class="font-small text-gray-900 ">0.00 €</span>
                                </div>

                                <!-- Total -->
                                <div class="w-full flex justify-between items-center pt-2 border-t">
                                    <span class="text-xl font-bold text-gray-900 ">Total</span>
                                    <span class="text-xl font-bold text-gray-900 ">{{ subtotal.toFixed(2)
                                        }} €</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 2 columns -->
            <div class="2xl:col-span-1">
                <!-- POR SI DECIDIMOS AÑADIR NOTAS EN UN FUTURO -->
                <!-- <div
                    class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm  sm:p-6">
                    <h3 class="flex items-center mb-4 text-lg font-semibold text-gray-900 ">
                        Notas
                    </h3>
                    <div id="fullWidthTabContent" class="">
                        <div class="pt-4" id="faq" role="tabpanel" aria-labelledby="faq-tab">

                        </div>
                    </div>
                </div> -->
                <div
                    class="p-4 mb-4 bg-white border border-gray-200 shadow-sm  sm:p-6">
                    <h3 class="flex items-center text-lg font-semibold text-gray-900 ">
                        Informació del cliente
                    </h3>
                    <div id="fullWidthTabContent" class="">
                        <div class="pt-2" id="faq" role="tabpanel" aria-labelledby="faq-tab">
                            <h3 class="font-small py-1 text-gray-900  flex items-center truncate">
                                <span class="mr-1">
                                    <svg width="1em" height="1em" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                        </g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path
                                                d="M12.1992 12C14.9606 12 17.1992 9.76142 17.1992 7C17.1992 4.23858 14.9606 2 12.1992 2C9.43779 2 7.19922 4.23858 7.19922 7C7.19922 9.76142 9.43779 12 12.1992 12Z"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
                                            <path
                                                d="M3 22C3.57038 20.0332 4.74796 18.2971 6.3644 17.0399C7.98083 15.7827 9.95335 15.0687 12 15C16.12 15 19.63 17.91 21 22"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
                                        </g>
                                    </svg>
                                </span>
                                {{ actualOrder?.order?.cliente?.name }} {{
                                    formatApellido(actualOrder?.order?.cliente?.apellidos) }}
                            </h3>
                            <h3 class="font-small py-1 text-gray-900  flex items-center truncate">
                                <span class="mr-1">
                                    <svg width="1em" height="1em" fill="currentColor" viewBox="0 0 35 35"
                                        data-name="Layer 2" id="ee13b174-13f0-43ea-b921-f168b1054f8d"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                        </g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path
                                                d="M29.384,30.381H5.615A5.372,5.372,0,0,1,.25,25.015V9.984A5.371,5.371,0,0,1,5.615,4.619H29.384A5.372,5.372,0,0,1,34.75,9.984V25.015A5.372,5.372,0,0,1,29.384,30.381ZM5.615,7.119A2.868,2.868,0,0,0,2.75,9.984V25.015a2.868,2.868,0,0,0,2.865,2.866H29.384a2.869,2.869,0,0,0,2.866-2.866V9.984a2.869,2.869,0,0,0-2.866-2.865Z">
                                            </path>
                                            <path
                                                d="M17.486,20.865a4.664,4.664,0,0,1-2.9-.975L1.218,9.237A1.25,1.25,0,1,1,2.777,7.282L16.141,17.935a2.325,2.325,0,0,0,2.7-.007L32.04,7.287a1.249,1.249,0,1,1,1.569,1.945L20.414,19.873A4.675,4.675,0,0,1,17.486,20.865Z">

                                            </path>
                                        </g>
                                    </svg>
                                </span>
                                {{ actualOrder?.order?.cliente?.email }}
                            </h3>
                            <h3 class="font-small py-1 text-gray-900  flex items-center truncate">
                                <span class="mr-1">
                                    <svg width="1em" height="1em" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                        </g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path
                                                d="M3 5.5C3 14.0604 9.93959 21 18.5 21C18.8862 21 19.2691 20.9859 19.6483 20.9581C20.0834 20.9262 20.3009 20.9103 20.499 20.7963C20.663 20.7019 20.8185 20.5345 20.9007 20.364C21 20.1582 21 19.9181 21 19.438V16.6207C21 16.2169 21 16.015 20.9335 15.842C20.8749 15.6891 20.7795 15.553 20.6559 15.4456C20.516 15.324 20.3262 15.255 19.9468 15.117L16.74 13.9509C16.2985 13.7904 16.0777 13.7101 15.8683 13.7237C15.6836 13.7357 15.5059 13.7988 15.3549 13.9058C15.1837 14.0271 15.0629 14.2285 14.8212 14.6314L14 16C11.3501 14.7999 9.2019 12.6489 8 10L9.36863 9.17882C9.77145 8.93713 9.97286 8.81628 10.0942 8.64506C10.2012 8.49408 10.2643 8.31637 10.2763 8.1317C10.2899 7.92227 10.2096 7.70153 10.0491 7.26005L8.88299 4.05321C8.745 3.67376 8.67601 3.48403 8.55442 3.3441C8.44701 3.22049 8.31089 3.12515 8.15802 3.06645C7.98496 3 7.78308 3 7.37932 3H4.56201C4.08188 3 3.84181 3 3.63598 3.09925C3.4655 3.18146 3.29814 3.33701 3.2037 3.50103C3.08968 3.69907 3.07375 3.91662 3.04189 4.35173C3.01413 4.73086 3 5.11378 3 5.5Z"
                                                stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
                                        </g>
                                    </svg>
                                </span>
                                {{ actualOrder?.order?.cliente?.phone ? actualOrder.order.cliente.phone :
                                    'No tiene número de teléfono' }}
                            </h3>
                        </div>
                    </div>
                </div>
                <div v-if="actualOrder?.order?.tipo_envio?.id === 1"
                    class="p-4 mb-4 bg-white border border-gray-200 shadow-sm  sm:p-6">
                    <h3 class="flex items-center text-lg font-semibold text-gray-900 ">
                        Direcció d'envio
                    </h3>
                    <div id="fullWidthTabContent" class="">
                        <div class="pt-4" id="faq" role="tabpanel" aria-labelledby="faq-tab">
                            <h3 class="font-small py-1 text-gray-900  flex items-center truncate">
                                <span class="mr-1">
                                    <svg width="1.3em" height="1.3em" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                        </g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M21.4498 10.275L11.9998 3.1875L2.5498 10.275L2.9998 11.625H3.7498V20.25H20.2498V11.625H20.9998L21.4498 10.275ZM5.2498 18.75V10.125L11.9998 5.0625L18.7498 10.125V18.75H14.9999V14.3333L14.2499 13.5833H9.74988L8.99988 14.3333V18.75H5.2498ZM10.4999 18.75H13.4999V15.0833H10.4999V18.75Z"
                                                fill="currentColor"></path>
                                        </g>
                                    </svg>
                                </span>
                                {{ actualOrder?.order?.cliente?.street_address }}
                            </h3>
                            <h3 class="font-small py-1 text-gray-900  flex items-center truncate">
                                <span class="mr-1">
                                    <svg width="1.3em" height="1.3em" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                        </g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path
                                                d="M3 21H21M18 21V6.2C18 5.0799 18 4.51984 17.782 4.09202C17.5903 3.71569 17.2843 3.40973 16.908 3.21799C16.4802 3 15.9201 3 14.8 3H9.2C8.0799 3 7.51984 3 7.09202 3.21799C6.71569 3.40973 6.40973 3.71569 6.21799 4.09202C6 4.51984 6 5.0799 6 6.2V21M15 12H15.01"
                                                stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
                                        </g>
                                    </svg>
                                </span>
                                {{ actualOrder?.order?.cliente?.numero_planta }}º planta, puerta
                                {{ actualOrder?.order?.cliente?.numero_puerta }}
                            </h3>
                            <h3 class="font-small py-1 text-gray-900  flex items-center truncate">
                                <span class="mr-1">
                                    <svg width="1.2em" height="1.2em" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                        </g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M4.25 8.51464C4.25 4.45264 7.77146 1.25 12 1.25C16.2285 1.25 19.75 4.45264 19.75 8.51464C19.75 12.3258 17.3871 16.8 13.5748 18.4292C12.574 18.8569 11.426 18.8569 10.4252 18.4292C6.61289 16.8 4.25 12.3258 4.25 8.51464ZM12 2.75C8.49655 2.75 5.75 5.38076 5.75 8.51464C5.75 11.843 7.85543 15.6998 11.0147 17.0499C11.639 17.3167 12.361 17.3167 12.9853 17.0499C16.1446 15.6998 18.25 11.843 18.25 8.51464C18.25 5.38076 15.5034 2.75 12 2.75ZM12 7.75C11.3096 7.75 10.75 8.30964 10.75 9C10.75 9.69036 11.3096 10.25 12 10.25C12.6904 10.25 13.25 9.69036 13.25 9C13.25 8.30964 12.6904 7.75 12 7.75ZM9.25 9C9.25 7.48122 10.4812 6.25 12 6.25C13.5188 6.25 14.75 7.48122 14.75 9C14.75 10.5188 13.5188 11.75 12 11.75C10.4812 11.75 9.25 10.5188 9.25 9ZM3.59541 14.9966C3.87344 15.3036 3.84992 15.7779 3.54288 16.0559C2.97519 16.57 2.75 17.0621 2.75 17.5C2.75 18.2637 3.47401 19.2048 5.23671 19.998C6.929 20.7596 9.31951 21.25 12 21.25C14.6805 21.25 17.071 20.7596 18.7633 19.998C20.526 19.2048 21.25 18.2637 21.25 17.5C21.25 17.0621 21.0248 16.57 20.4571 16.0559C20.1501 15.7779 20.1266 15.3036 20.4046 14.9966C20.6826 14.6895 21.1569 14.666 21.4639 14.9441C22.227 15.635 22.75 16.5011 22.75 17.5C22.75 19.2216 21.2354 20.5305 19.3788 21.3659C17.4518 22.2331 14.8424 22.75 12 22.75C9.15764 22.75 6.54815 22.2331 4.62116 21.3659C2.76457 20.5305 1.25 19.2216 1.25 17.5C1.25 16.5011 1.77305 15.635 2.53605 14.9441C2.84309 14.666 3.31738 14.6895 3.59541 14.9966Z"
                                                fill="currentColor"></path>
                                        </g>
                                    </svg>
                                </span>
                                {{ actualOrder?.order?.cliente?.codigo_postal }}, {{ actualOrder?.order?.cliente?.ciudad
                                }},
                                {{ actualOrder?.order?.cliente?.provincia }}
                            </h3>
                        </div>
                    </div>
                </div>
                <div
                    class="p-4 mb-4 bg-white border border-gray-200 shadow-sm  sm:p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="flex items-center text-lg font-semibold text-gray-900 ">Línia de temps
                        </h3>
                    </div>
                    <ol class="relative border-l border-gray-200  pt-4">
                        <li class="mb-10 ml-4">
                            <div class="absolute w-3 h-3 rounded-full mt-1.5 -left-1.5 border border-white "
                                :class="actualOrder?.estat_compra?.id >= 1 ? 'bg-[#276BF2]' : 'bg-gray-200'">
                            </div>
                            <h3 class="text-lg font-semibold text-gray-900 "
                                :class="actualOrder?.estat_compra?.id >= 1 ? 'font-semibold' : 'font-medium'">
                                Comanda rebuda
                            </h3>
                            <time class="mb-1 text-sm font-normal leading-none text-gray-400 ">

                                Abril 2025
                            </time>
                        </li>
                        <li class="mb-10 ml-4">
                            <div class="absolute w-3 h-3 rounded-full mt-1.5 -left-1.5 border border-white "
                                :class="actualOrder?.estat_compra?.id >= 2 ? 'bg-[#276BF2]' : 'bg-gray-200'">
                            </div>
                            <h3 class="text-lg text-gray-900 "
                                :class="actualOrder?.estat_compra?.id >= 2 ? 'font-semibold' : 'font-medium'">
                                Llest per a recollir
                            </h3>
                            <time class="mb-1 text-sm font-normal leading-none text-gray-400 ">
                                Abril 2023
                            </time>
                        </li>
                        <li class="mb-10 ml-4" v-if="actualOrder?.order?.tipo_envio?.id === 1">
                            <div class="absolute w-3 h-3 rounded-full mt-1.5 -left-1.5 border border-white "
                                :class="actualOrder?.estat_compra?.id >= 3 ? 'bg-[#276BF2]' : 'bg-gray-200'">
                            </div>
                            <h3 class="text-lg text-gray-900 "
                                :class="actualOrder?.estat_compra?.id >= 3 ? 'font-semibold' : 'font-medium'">
                                En repartiment
                            </h3>
                            <time class="mb-1 text-sm font-normal leading-none text-gray-400 ">
                                Abril 2025
                            </time>
                        </li>
                        <li class="ml-4">
                            <div class="absolute w-3 h-3 rounded-full mt-1.5 -left-1.5 border border-white "
                                :class="actualOrder?.estat_compra?.id >= 4 ? 'bg-[#276BF2]' : 'bg-gray-200'">
                            </div>
                            <h3 class="text-lg text-gray-900 "
                                :class="actualOrder?.estat_compra?.id >= 4 ? 'font-semibold' : 'font-medium'">
                                Lliurat
                            </h3>
                            <time class="mb-1 text-sm font-normal leading-none text-gray-400 ">
                                Abril 2023
                            </time>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </main>
</template>

<style scoped>
.producto {
    display: flex;
    padding: 0.85rem;
    /* align-items: center; */
    justify-content: space-between;
}

.contain-text {
    margin-left: 1rem;
}

.contain-image {
    width: 80px;
    height: 80px;
    overflow: hidden;
}

.contain-precio {
    text-align: right;
}
</style>

<script setup>
import { useRoute, useRouter } from 'vue-router';
const { $communicationManager } = useNuxtApp();

definePageMeta({
    layout: 'admin',
});

const route = useRoute();
const router = useRouter();
const actualOrder = reactive({});

const subtotal = computed(() => {
    if (!actualOrder.productos_compra) {
        return 0;
    }
    return actualOrder.productos_compra.reduce((total, productoInfo) => {
        return total + productoInfo.cantidad * productoInfo.precio;
    }, 0);
})

const formatFecha = (fecha) => {
    if (!fecha) return ""; // Manejar el caso de fecha nula o indefinida
    const date = new Date(fecha);

    const dia = String(date.getDate()).padStart(2, "0");
    const mes = String(date.getMonth() + 1).padStart(2, "0"); // Los meses empiezan en 0
    const año = date.getFullYear();

    const horas = String(date.getHours()).padStart(2, "0");
    const minutos = String(date.getMinutes()).padStart(2, "0");

    return `${dia}/${mes}/${año} ${horas}:${minutos}`;
};

const formatApellido = (apellidos) => {
    if (!apellidos) return ""; // Maneja casos donde no hay apellidos
    return `${apellidos[0].toUpperCase()}.`; // Toma la primera letra y agrega un punto
};

const goBack = () => {
    router.back();
};

onBeforeMount(async () => {
    const data = await $communicationManager.infoOrder(route.params.id);
    Object.assign(actualOrder, data.data);
    console.log(actualOrder);
    console.log(actualOrder.estat_compra.id);
})
</script>