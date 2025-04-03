<script setup>
definePageMeta({
    layout: 'footer-only'
});

import { useRuntimeConfig } from "#imports";
const config = useRuntimeConfig();
const baseUrl = config.public.apiBaseUrl;

import { io } from "socket.io-client";
import { computed, onMounted, ref } from 'vue';
import { useAuthStore } from '@/stores/authStore';
import { useComercioStore } from '@/stores/comercioStore';
import { useNuxtApp } from '#app';
import { useRoute, useRouter } from "vue-router";
import shoppingBasketIcon from '../assets/shopping-basket.svg';
import { Socket } from 'socket.io-client';

const route = useRoute();
const router = useRouter();
const comercioStore = useComercioStore();
const { $communicationManager } = useNuxtApp();
// const socket = io("http://localhost:8001");
const socket = io("https://holabarri.cat")

const authStore = useAuthStore();
const errorMessage = ref('');
const formData = reactive({
    email: '',
    password: '',
});

const comercios = ref({});
const groups = reactive([]);
const chooseShipping = ref(false);
const choosed = ref(false);
const payOption = ref(1);
const auth = useAuthStore();
const shipOption = ref(null);
const paymentView = ref(false);
const cistellaView = ref(true);
const isOk = ref(false);
const order_id = ref();
// const shipOption = ref(2);
// const paymentView = ref(true);
// const cistellaView = ref(false);
const isLoggued = computed(() => {
    return auth?.user !== null;
});
const loginVisible = ref(false);

const goBack = () => {
    router.back();
};

// Fetch de los comercios que tienen id en la cesta
onMounted(async () => {
    const uniqueComercioIds = [...new Set(comercioStore.cesta.map(item => item.comercio_id))];
    await Promise.all(uniqueComercioIds.map(async (id) => {
        const comercioData = await $communicationManager.getComercio(id);
        if (comercioData && comercioData.comercio.nombre) {
            comercios.value[id] = comercioData.comercio.nombre;
        }
    }));
});

// Agrupos los productos por el nombre del comercio
const groupedCesta = computed(() => {
    return comercioStore.cesta.reduce((groups, item) => {
        const comercioNombre = comercios.value[item.comercio_id] || 'Cargando...';
        if (!groups[comercioNombre]) {
            groups[comercioNombre] = [];
        }
        groups[comercioNombre].push(item);
        return groups;
    }, {});
});

// Calculate total for a single store
const storeTotal = (storeName) => {
    return groupedCesta.value[storeName].reduce((acc, item) => acc + item.precio * item.cantidad, 0);
};

function toggleCheckout() {
    if (!isLoggued.value) {
        loginVisible.value = !loginVisible.value;
    } else {
        chooseShipping.value = !chooseShipping.value;
        shipOption.value = null;
        choosed.value = false;
    }
}

function togglePayment() {
    paymentView.value = !paymentView.value;
}

const comprar = () => {
    // console.log(groupedCesta.value);
    toggleCheckout();
}

function chooseShip(event) {
    shipOption.value = event.currentTarget.value;
    // console.log("Opción:", shipOption.value);
    choosed.value = shipOption.value !== null;
}

function choosePayment(event) {
    payOption.value = event.target.value;
    // console.log("Opción de pago:", payOption.value);
}

function toPay() {
    chooseShipping.value = !chooseShipping.value;
    togglePayment();
    // console.log(shipOption.value);
}

async function crearComanda() {
    const createdOrder = await $communicationManager.createOrder(orderFiltrada.value);
    if (createdOrder.success) {
        order_id.value = createdOrder.data.order.id;
        const subcomandaInfo = computed(() => {
            return {
                order_id: order_id.value,
                suborders: Object.keys(groupedCesta.value).map(comercio => ({
                    comercio_id: groupedCesta.value[comercio][0].comercio_id,
                    subtotal: storeTotal(comercio),
                    productos: groupedCesta.value[comercio].map(({ id, cantidad, precio }) => ({
                        id,
                        cantidad,
                        precio,
                    })),
                })),
            }
        });
        const createdSuborders = await $communicationManager.createSuborder(subcomandaInfo.value);

        function agruparOrderSuborders(order, suborders) {
            return {
                'order_id': order.data.orderCompleta.id,
                'created_at': order.data.orderCompleta.created_at,
                'tipo_envio': {
                    'id': order.data.orderCompleta.tipo_envio.id,
                    'nombre': order.data.orderCompleta.tipo_envio.nombre,
                },
                'tipo_pago': {
                    'id': order.data.orderCompleta.tipo_pago.id,
                    'nombre': order.data.orderCompleta.tipo_pago.nombre,
                },
                'cliente': {
                    'id': order.data.orderCompleta.cliente.id,
                    'nombre': order.data.orderCompleta.cliente.name,
                    'apellidos': order.data.orderCompleta.cliente.apellidos
                },
                'subcomandes': suborders.data.subcomandes.map(subcomanda => ({
                    'suborder_id': subcomanda.suborder.id,
                    'comercio_id': subcomanda.suborder.comercio_id,
                    'subtotal': subcomanda.suborder.subtotal,
                    'estat_compra': {
                        'id': subcomanda.suborder.estat_compra.id,
                        'nombre': subcomanda.suborder.estat_compra.nombre
                    }
                }))
            }
        }

        if (createdOrder && createdSuborders) {
            const orders = agruparOrderSuborders(createdOrder, createdSuborders);
            socket.emit("nuevaOrden", orders);
        }
    }

    // goBack();
    isOk.value = true;
    comercioStore.emptyBasket();
}

const orderFiltrada = computed(() => ({
    'total': comercioStore.totalPrice.toFixed(2),
    'tipo_envio': shipOption.value,
    'tipo_pago': payOption.value,
}));

const subcomandaInfo = computed(() => {
    return Object.keys(groupedCesta.value).map(comercio => ({
        comercio_id: groupedCesta.value[comercio][0].comercio_id,
        subtotal: storeTotal(comercio),
    }));
});

const seguirComprant = () => {
    router.push('/'); // Ajusta la ruta segons la teva aplicació
};

const veureOrdre = () => {
    router.push(`/perfil/compras/${order_id.value}`); // Ajusta la ruta segons la teva aplicació
};

</script>

<template>
    <header class="border-b flex items-center p-4 max-h-[75px]">
        <div class="flex items-center">
            <h3 class="text-2xl ml-4">Cistella</h3>
        </div>
    </header>
    <div v-if="isOk" class="fixed inset-0 flex items-center justify-center bg-black/50 z-50">
        <div class="bg-white p-6 rounded-2xl shadow-xl max-w-sm text-center animate-fadeIn">
            <!-- Ícono de confirmación -->
            <div class="w-16 h-16 bg-green-500 text-white rounded-full mx-auto mb-4 flex items-center justify-center">
                <span class="text-2xl font-bold">✔</span>
            </div>

            <h2 class="text-2xl font-semibold text-gray-800">Comanda realitzada amb èxit!</h2>
            <p class="text-gray-600 mt-2">Rebràs un correu quan la teva comanda estigui llesta per a recollir.</p>

            <div class="mt-6 flex gap-4">
                <button @click="seguirComprant"
                    class="flex-1 bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium py-2 px-4 rounded-lg">
                    Seguir comprant
                </button>
                <button @click="veureOrdre"
                    class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg">
                    Veure la comanda
                </button>
            </div>
        </div>
    </div>
    <div class="mt-[80px] mb-[80px] w-full">
        <div v-if="Object.keys(groupedCesta).length === 0" class="w-full flex flex-col items-center mt-[180px]">
            <svg width="10em" height="10em" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                <g id="SVGRepo_iconCarrier">
                    <path d="M8 12L8 8C8 5.79086 9.79086 4 12 4V4C14.2091 4 16 5.79086 16 8L16 12" stroke="#276BF2"
                        stroke-width="1.3" stroke-linecap="round"></path>
                    <path
                        d="M3.69435 12.6678C3.83942 10.9269 3.91196 10.0565 4.48605 9.52824C5.06013 9 5.9336 9 7.68053 9H16.3195C18.0664 9 18.9399 9 19.514 9.52824C20.088 10.0565 20.1606 10.9269 20.3057 12.6678L20.8195 18.8339C20.904 19.8474 20.9462 20.3542 20.6491 20.6771C20.352 21 19.8435 21 18.8264 21H5.1736C4.15655 21 3.64802 21 3.35092 20.6771C3.05382 20.3542 3.09605 19.8474 3.18051 18.8339L3.69435 12.6678Z"
                        stroke="#276BF2" stroke-width="1.3"></path>
                </g>
            </svg>
            <p class="text-2xl font-semibold">La teva cistella està buida</p>
            <p class="text-base font-normal text-gray-600 text-center">
                Quan afegeixes nous productes,<br> la teva comanda apareixerà aqui.
            </p>
            <NuxtLink to="/">
                <button
                    class="flex items-center text-lg font-bold px-3 py-2 rounded-lg mt-2 border-2 text-white border-[#276BF2] bg-[#447EF2]">
                    <svg width="1.7em" height="1.7em" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path
                                d="M4.78571 5H18.2251C19.5903 5 20.5542 6.33739 20.1225 7.63246L18.4558 12.6325C18.1836 13.4491 17.4193 14 16.5585 14H6.07142M4.78571 5L4.74531 4.71716C4.60455 3.73186 3.76071 3 2.76541 3H2M4.78571 5L6.07142 14M6.07142 14L6.25469 15.2828C6.39545 16.2681 7.23929 17 8.23459 17H17M17 17C15.8954 17 15 17.8954 15 19C15 20.1046 15.8954 21 17 21C18.1046 21 19 20.1046 19 19C19 17.8954 18.1046 17 17 17ZM11 19C11 20.1046 10.1046 21 9 21C7.89543 21 7 20.1046 7 19C7 17.8954 7.89543 17 9 17C10.1046 17 11 17.8954 11 19Z"
                                stroke="currentColor" stroke-width="1.1" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                        </g>
                    </svg>
                    <span class="ml-1">
                        Començar a comprar
                    </span>
                </button>
            </NuxtLink>
        </div>
        <div v-else>
            <div v-if="loginVisible" class="w-full flex items-center justify-center">
                <div class="bg-gray-900/50 fixed inset-0 z-40"></div>
                <div class="fixed top-0 right-0 z-40 w-full h-screen flex items-center">
                    <div
                        class="bg-white mx-5 px-4 pb-4 pt-4 sm:rounded-lg sm:px-10 sm:pb-6 sm:shadow rounded-md w-full">
                        <h2 class="text-2xl font-bold text-center mb-2">Inicia sessió</h2>
                        <form @submit.prevent="login" class="space-y-6">
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700">Correu
                                    electrònic /
                                    Usuari</label>
                                <div class="mt-1">
                                    <input id="email" v-model="formData.email" type="text" data-testid="username"
                                        required=""
                                        class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                </div>
                            </div>
                            <div>
                                <label for="password"
                                    class="block text-sm font-medium text-gray-700">Contrasenya</label>
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
                            <div class="mt-6 grid grid-cols-2 gap-3">
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
                                <button
                                    class="inline-flex w-full justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-500 shadow-sm hover:bg-gray-50 disabled:cursor-wait disabled:opacity-50">
                                    <span class="sr-only">Inicia sessió amb Facebook</span>
                                    <svg class="h-6 w-6" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                        width="800px" height="800px" viewBox="2 2 28 28" version="1.1">
                                        <path
                                            d="M21.95 5.005l-3.306-.004c-3.206 0-5.277 2.124-5.277 5.415v2.495H10.05v4.515h3.317l-.004 9.575h4.641l.004-9.575h3.806l-.003-4.514h-3.803v-2.117c0-1.018.241-1.533 1.566-1.533l2.366-.001.01-4.256z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="m-auto mt-6 w-fit md:mt-8">
                            <span class="m-auto">No tens compte?
                                <NuxtLink class="font-semibold text-indigo-600" to="/register">Crear compte</NuxtLink>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- PANTALLA DE ELEGIR TIPO DE ENVÍO  -->
            <div v-if="chooseShipping">
                <div class="bg-gray-900/50 fixed inset-0 z-40 animate-appear" @click="toggleCheckout"></div>
                <div id="chooseShipping" class="fixed bottom-0 z-40 flex flex-col items-center justify-center p-4">
                    <h3 class="text-3xl font-semibold text-center" style="color: #1E2026">
                        Com vols rebre la teva comanda?
                    </h3>
                    <div class="flex w-full justify-between contain-buttons mt-3">
                        <button @click="chooseShip" value="1" disabled
                            class="flex items-center rounded-md px-3 py-4 min-w-[48%] text-lg font-bold disabled:opacity-50 cursor-not-allowed"
                            :class="{ 'selected': shipOption === '1', 'noSelected': shipOption !== '1' }">
                            <svg widths="1.8em" height="1.8em" fill="currentColor" version="1.1" id="Layer_1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                viewBox="0 0 512 512" xml:space="preserve" transform="matrix(-1, 0, 0, 1, 0, 0)">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <g>
                                        <g>
                                            <polygon
                                                points="438.32,62.807 438.32,109.573 407.95,109.573 407.95,62.807 343.661,62.807 343.661,192.019 502.609,192.019 502.609,62.807 ">
                                            </polygon>
                                        </g>
                                    </g>
                                    <g>
                                        <g>
                                            <path
                                                d="M486.376,345.54c-1.198-1.768-2.476-3.476-3.833-5.119c-2.035-2.464-4.243-4.779-6.605-6.928 c-11.815-10.741-27.501-17.296-44.688-17.296c-8.021,0-15.714,1.427-22.841,4.041c-25.45,9.337-43.657,33.81-43.657,62.456 c0,2.292,0.116,4.556,0.344,6.79c0.682,6.698,2.363,13.106,4.89,19.07c0.421,0.994,0.866,1.976,1.333,2.945 c5.143,10.657,13.046,19.742,22.776,26.321c4.423,2.99,9.223,5.464,14.313,7.33c7.126,2.614,14.819,4.041,22.841,4.041 c26.355,0,49.178-15.411,59.931-37.694c0.468-0.969,0.912-1.951,1.333-2.945c2.527-5.965,4.207-12.372,4.891-19.07 c0.228-2.233,0.344-4.498,0.344-6.79C497.748,368.943,493.553,356.154,486.376,345.54z M431.249,403.056 c-11.228,0-20.361-9.134-20.361-20.361s9.134-20.361,20.361-20.361c11.228,0,20.361,9.134,20.361,20.361 S442.477,403.056,431.249,403.056z">
                                            </path>
                                        </g>
                                    </g>
                                    <g>
                                        <g>
                                            <path
                                                d="M446.434,256.367v-33.978H259.901v54.282h-81.64V149.607h37.733v-30.37H107.044L35.24,324.023 C14.29,335.229,0,357.321,0,382.695c0,36.667,29.831,66.498,66.498,66.498s66.498-29.831,66.498-66.498 c0-3.845-0.346-7.608-0.976-11.276h172.497h30.525c5.604-48.119,46.608-85.591,96.207-85.591c23.322,0,44.745,8.286,61.482,22.067 L512,284.451C493.705,269.384,471.147,259.321,446.434,256.367z M66.498,403.056c-11.228,0-20.361-9.134-20.361-20.361 c0-11.228,9.134-20.361,20.361-20.361s20.361,9.134,20.361,20.361C86.86,393.923,77.725,403.056,66.498,403.056z">
                                            </path>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                            <h3 class="ml-3">Enviament</h3>
                        </button>
                        <button @click="chooseShip" value="2"
                            class="flex items-center rounded-md px-3 py-4 min-w-[48%] text-lg font-bold disabled:opacity-50"
                            :class="{ 'selected': shipOption === '2', 'noSelected': shipOption !== '2' }">
                            <svg width="1.8em" height="1.8em" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path
                                        d="M16.5276 2H7.47201C6.26919 2 5.66778 2 5.18448 2.2987C4.70117 2.5974 4.43221 3.13531 3.8943 4.21114L2.49068 7.75929C2.16639 8.57905 1.88266 9.54525 2.42854 10.2375C2.79476 10.7019 3.36244 11 3.99978 11C5.10435 11 5.99978 10.1046 5.99978 9C5.99978 10.1046 6.89522 11 7.99978 11C9.10435 11 9.99978 10.1046 9.99978 9C9.99978 10.1046 10.8952 11 11.9998 11C13.1044 11 13.9998 10.1046 13.9998 9C13.9998 10.1046 14.8952 11 15.9998 11C17.1044 11 17.9998 10.1046 17.9998 9C17.9998 10.1046 18.8952 11 19.9998 11C20.6371 11 21.2048 10.7019 21.5711 10.2375C22.117 9.54525 21.8333 8.57905 21.509 7.75929L20.1054 4.21114C19.5674 3.13531 19.2985 2.5974 18.8152 2.2987C18.3319 2 17.7305 2 16.5276 2Z"
                                        fill="currentColor"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M20 21.25H22C22.4142 21.25 22.75 21.5858 22.75 22C22.75 22.4142 22.4142 22.75 22 22.75H2C1.58579 22.75 1.25 22.4142 1.25 22C1.25 21.5858 1.58579 21.25 2 21.25H4L4 12.5C4.74363 12.5 5.43309 12.2681 6 11.8727C6.56692 12.2681 7.25638 12.5 8 12.5C8.74363 12.5 9.43309 12.2681 10 11.8727C10.5669 12.2681 11.2564 12.5 12 12.5C12.7436 12.5 13.4331 12.2681 14 11.8727C14.5669 12.2681 15.2564 12.5 16 12.5C16.7436 12.5 17.4331 12.2681 18 11.8727C18.5669 12.2681 19.2564 12.5 20 12.5L20 21.25ZM9.5 21.25H14.5V18.5C14.5 17.5654 14.5 17.0981 14.299 16.75C14.1674 16.522 13.978 16.3326 13.75 16.2009C13.4019 16 12.9346 16 12 16C11.0654 16 10.5981 16 10.25 16.2009C10.022 16.3326 9.83261 16.522 9.70096 16.75C9.5 17.0981 9.5 17.5654 9.5 18.5V21.25Z"
                                        fill="currentColor"></path>
                                </g>
                            </svg>
                            <h3 class="ml-3">Recollida</h3>
                        </button>
                    </div>
                    <!-- <div id="map-ubi"
                        class="w-full h-[130px] bg-gray-200 mt-3 rounded flex items-center justify-center overflow-hidden">
                        <img src="../assets/mapubi.png" alt="plano ubicación">
                    </div> -->
                    <button :disabled="!choosed" @click="toPay"
                        class="mt-3 w-full h-[60px] justify-center rounded-md border border-transparent px-4 py-2 text-xl font-semibold disabled:cursor-not-allowed"
                        :class="{ 'btn-ok': choosed, 'bg-[#6393F2]': !choosed, 'text-white': !choosed }">
                        <h3>Continuar</h3>
                    </button>
                    <!-- <button @click="toggleCheckout()"
                        class="mt-3 w-full h-[60px] justify-center rounded-md border border-red-300 px-4 py-2 text-xl font-semibold text-red-500">
                        <h3>Cancel·lar</h3>
                    </button> -->
                </div>
            </div>

            <!-- PAYMENT VIEW CON EL SUBTOTAL Y BOTÓN DE PAGAR -->
            <div v-if="paymentView" class="w-full h-screen bg-white fixed inset-0 z-40">
                <div class="flex items-center justify-center p-4 h-[80px] fixed inset-0 z-50 bg-white">
                    <h3 class="text-2xl ml-4">Pagament</h3>
                </div>
                <div class="mt-[80px] pb-[88px] p-2 h-screen bg-gray-100 overflow-scroll">
                    <div id="allOrder" class="rounded-md bg-white p-2">
                        <div class="w-full flex items-center">
                            <svg width="1.5em" height="1.5em" viewBox="0 0 1024 1024" class="icon" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" fill="#000000">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path
                                        d="M533 1024l-147.7-84.8-136.4 78.3h-11.3c-17.3 0-34.2-3.4-50.1-10.1-15.3-6.5-29.1-15.7-40.8-27.6-11.7-11.7-21-25.5-27.5-40.8-6.7-15.9-10.1-32.7-10.1-50.1V128.5c0-17.4 3.4-34.2 10.1-50.1 6.5-15.3 15.8-29.1 27.6-40.8 11.7-11.8 25.5-21 40.8-27.5C203.3 3.4 220.2 0 237.5 0h590.9c17.3 0 34.2 3.4 50.1 10.1 15.3 6.5 29.1 15.7 40.8 27.6 11.7 11.7 21 25.5 27.5 40.8 6.7 15.9 10.1 32.7 10.1 50.1V889c0 17.4-3.4 34.2-10.1 50.1-6.5 15.3-15.8 29.1-27.6 40.8-11.7 11.8-25.5 21-40.8 27.5-15.8 6.7-32.7 10.1-50 10.1h-11.3l-136.4-78.3L533 1024z m147.7-182.6l157.2 90.3c2.5-0.6 5-1.4 7.5-2.4 5.2-2.2 9.9-5.4 13.9-9.4 4.1-4.1 7.2-8.7 9.4-14 2.3-5.3 3.4-11.1 3.4-17V128.5c0-5.9-1.1-11.7-3.4-17-2.2-5.2-5.4-9.9-9.4-13.9-4.1-4.1-8.7-7.2-13.9-9.4-5.4-2.3-11.1-3.4-17-3.4H237.5c-5.9 0-11.6 1.1-17 3.4-5.2 2.2-9.9 5.4-13.9 9.4-4.1 4.1-7.2 8.7-9.4 14-2.3 5.3-3.4 11.1-3.4 17V889c0 5.9 1.1 11.7 3.4 17 2.2 5.2 5.4 9.9 9.4 13.9 4.1 4.1 8.7 7.2 13.9 9.4 2.4 1 4.9 1.8 7.5 2.4l157.2-90.3L533 926.2l147.7-84.8z"
                                        fill="#276BF2"></path>
                                    <path
                                        d="M490.6 310.9H321c-23.4 0-42.4-19-42.4-42.4s19-42.4 42.4-42.4h169.6c23.4 0 42.4 19 42.4 42.4s-19 42.4-42.4 42.4zM702.5 487.6H321c-23.4 0-42.4-19-42.4-42.4s19-42.4 42.4-42.4h381.6c23.4 0 42.4 19 42.4 42.4-0.1 23.4-19 42.4-42.5 42.4z"
                                        fill="#276BF2"></path>
                                </g>
                            </svg>
                            <h3 class="text-xl ml-1">Resum de la comanda</h3>
                        </div>
                        <div class="my-3 max-h-[250px] overflow-scroll">
                            <div v-for="(items) in groupedCesta">
                                <div v-for="item in items" :key="item.id" class="flex mb-1">
                                    <div id="contain-image" class="mr-4 w-[70px] h-[70px] overflow-hidden">
                                        <img :src="`${baseUrl}/storage/${item.imagen}`" alt="" />
                                    </div>
                                    <div class="flex flex-col w-full justify-center">
                                        <div class="flex justify-between">
                                            <div class="w-[75%]">
                                                <h3 class="text-lg font-medium line-clamp-2">{{ item.nombre }}</h3>
                                            </div>
                                            <p class="text-gray-500">x{{ item.cantidad }}</p>
                                        </div>
                                        <p>{{ (item.cantidad * item.precio).toFixed(2) }}€</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr class="border-t-2 border-gray-300 border-dashed">
                        <div id="allTotal" class="mt-3">
                            <div class="w-full flex flex-col">
                                <div class="w-full flex justify-between">
                                    <h3 class="text-base text-gray-500 font-normal">Subtotal</h3>
                                    <h3 class="text-base text-gray-500">{{ comercioStore.totalPrice.toFixed(2) }} €</h3>
                                </div>
                                <div class="w-full flex justify-between">
                                    <h3 class="text-base text-gray-500 font-normal">Descompte</h3>
                                    <h3 class="text-base text-gray-500">0 €</h3>
                                </div>
                                <div v-if="shipOption === 1" class="w-full flex justify-between">
                                    <h3 class="text-base text-gray-500 font-normal">Enviament</h3>
                                    <h3 class="text-base text-gray-500">2,5 €</h3>
                                </div>
                            </div>
                            <div class="border-t border-gray-300 mt-3 flex justify-between w-full">
                                <h3 class="font-medium text-xl">
                                    Total <span class="font-light text-xs text-gray-700">(IVA incl.)</span>
                                </h3>
                                <h3 class="font-medium text-xl">{{ comercioStore.totalPrice.toFixed(2) }} €</h3>
                            </div>
                        </div>
                    </div>
                    <div id="methodsPay" class="mt-3 rounded-md bg-white p-2">
                        <div class="w-full flex items-center mb-3">
                            <svg width="1.7em" height="1.7em" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path
                                        d="M19 8V8C20.1046 8 21 8.89543 21 10V18C21 19.1046 20.1046 20 19 20H6C4.34315 20 3 18.6569 3 17V7C3 5.34315 4.34315 4 6 4H17C18.1046 4 19 4.89543 19 6V8ZM19 8H7M17 14H16"
                                        stroke="#276BF2" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                </g>
                            </svg>
                            <h3 class="ml-1 text-xl">Mètodes de pagament</h3>
                        </div>
                        <div>
                            <label for="efectiu" name="status"
                                class="font-medium text-lg h-14 relative hover:bg-zinc-100 flex items-center pl-3 gap-2 rounded-lg has-[:checked]:text-[#276BF2] has-[:checked]:bg-blue-50 has-[:checked]:ring-[#276BF2] has-[:checked]:ring-1 select-none">
                                <div class="w-5 fill-[#276BF2]">
                                    <svg viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        class="bi bi-cash-coin">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                        </g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path fill-rule="evenodd"
                                                d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0z">
                                            </path>
                                            <path
                                                d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1h-.003zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195l.054.012z">
                                            </path>
                                            <path
                                                d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083c.058-.344.145-.678.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1H1z">
                                            </path>
                                            <path
                                                d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 5.982 5.982 0 0 1 3.13-1.567z">
                                            </path>
                                        </g>
                                    </svg>
                                </div>
                                Efectiu
                                <input checked="" type="radio" name="status"
                                    class="peer/html w-4 h-4 absolute accent-current right-3" id="efectiu" value="1"
                                    @change="choosePayment" />
                            </label>
                            <label for="targeta"
                                class="font-medium text-lg h-14 relative flex items-center pl-3 gap-2 rounded-lg has-[:checked]:text-blue-500 has-[:checked]:bg-blue-50 has-[:checked]:ring-blue-300 has-[:checked]:ring-1 select-none">
                                <div class="w-5">
                                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                        </g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path
                                                d="M3 8C3 6.34315 4.34315 5 6 5H18C19.6569 5 21 6.34315 21 8V16C21 17.6569 19.6569 19 18 19H6C4.34315 19 3 17.6569 3 16V8Z"
                                                stroke="rgb(156 163 175 / var(--tw-text-opacity, 1))" stroke-width="2">
                                            </path>
                                            <path d="M3 10H21" stroke="rgb(156 163 175 / var(--tw-text-opacity, 1))"
                                                stroke-width="2"></path>
                                            <path d="M14 15L17 15" stroke="rgb(156 163 175 / var(--tw-text-opacity, 1))"
                                                stroke-width="2" stroke-linecap="round">
                                            </path>
                                        </g>
                                    </svg>
                                </div>
                                <p class="text-gray-400">Targeta (Pròximament)</p>
                                <input type="radio" disabled name="status"
                                    class="w-4 h-4 absolute accent-current right-3 text-gray-400" id="targeta" value="2"
                                    @change="choosePayment" />
                            </label>
                        </div>
                    </div>
                </div>
                <div class="footer flex items-center justify-between mt-auto border-t border-gray-300 fixed">
                    <button @click="togglePayment"
                        class="btn-cancel w-[39%] h-[60px] justify-center border rounded-md border border-gray-400 px-4 py-2 text-xl text-gray-500 font-medium disabled:cursor-wait ">
                        Cancel·lar
                    </button>
                    <button @click="crearComanda"
                        class="btn-ok w-[59%] h-[60px] justify-center rounded-md border border-transparent px-4 py-2 text-xl font-semibold disabled:cursor-wait disabled:opacity-50">
                        Pagar
                    </button>
                </div>
            </div>

            <!-- CISTELLA VIEW CON TODOS LOS PRODUCTOS -->
            <div class="divide-y divide-gray-300 pb-2">
                <div v-for="(items, storeName) in groupedCesta" :key="storeName" class="px-3 pt-1">
                    <div class="flex justify-between items-center border-b border-gray-200 m-4">
                        <div class="flex items-center">
                            <svg width="1.3em" height="1.3em" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M7.30681 1.24996C6.50585 1.24969 5.95624 1.24951 5.46776 1.38342C4.44215 1.66458 3.58414 2.36798 3.1073 3.31853C2.88019 3.77127 2.77258 4.31024 2.61576 5.0957L1.99616 8.19383C1.76456 9.35186 2.08191 10.4718 2.74977 11.3115L2.74977 14.0564C2.74975 15.8942 2.74974 17.3498 2.9029 18.489C3.06053 19.6614 3.39265 20.6104 4.14101 21.3587C4.88937 22.1071 5.83832 22.4392 7.01074 22.5969C8.14996 22.75 9.60559 22.75 11.4434 22.75H12.5562C14.3939 22.75 15.8496 22.75 16.9888 22.5969C18.1612 22.4392 19.1102 22.1071 19.8585 21.3587C20.6069 20.6104 20.939 19.6614 21.0966 18.489C21.2498 17.3498 21.2498 15.8942 21.2498 14.0564V11.3115C21.9176 10.4718 22.235 9.35187 22.0034 8.19383L21.3838 5.0957C21.227 4.31024 21.1194 3.77127 20.8923 3.31853C20.4154 2.36798 19.5574 1.66458 18.5318 1.38342C18.0433 1.24951 17.4937 1.24969 16.6927 1.24996H7.30681ZM18.2682 12.75C18.7971 12.75 19.2969 12.6435 19.7498 12.4524V14C19.7498 15.9068 19.7482 17.2615 19.61 18.2891C19.4747 19.2952 19.2211 19.8749 18.7979 20.2981C18.3747 20.7213 17.795 20.975 16.7889 21.1102C16.3434 21.1701 15.8365 21.2044 15.2498 21.2239V18.4678C15.2498 18.028 15.2498 17.6486 15.2216 17.3373C15.1917 17.0082 15.1257 16.6822 14.9483 16.375C14.7508 16.0329 14.4668 15.7489 14.1248 15.5514C13.8176 15.3741 13.4916 15.308 13.1624 15.2782C12.8511 15.25 12.4718 15.25 12.032 15.25H11.9675C11.5278 15.25 11.1484 15.25 10.8371 15.2782C10.5079 15.308 10.182 15.3741 9.87477 15.5514C9.53272 15.7489 9.24869 16.0329 9.05121 16.375C8.87384 16.6822 8.80778 17.0082 8.77795 17.3373C8.74973 17.6486 8.74975 18.028 8.74977 18.4678L8.74977 21.2239C8.16304 21.2044 7.6561 21.1701 7.21062 21.1102C6.20453 20.975 5.62488 20.7213 5.20167 20.2981C4.77846 19.8749 4.52479 19.2952 4.38953 18.2891C4.25136 17.2615 4.24977 15.9068 4.24977 14V12.4523C4.70264 12.6435 5.20244 12.75 5.73132 12.75C7.00523 12.75 8.14422 12.1216 8.83783 11.1458C9.54734 12.1139 10.6929 12.75 11.9996 12.75C13.3063 12.75 14.452 12.1138 15.1615 11.1455C15.8551 12.1215 16.9942 12.75 18.2682 12.75ZM10.2498 21.248C10.6382 21.2499 11.0539 21.25 11.4998 21.25H12.4998C12.9457 21.25 13.3614 21.2499 13.7498 21.248V18.5C13.7498 18.0189 13.749 17.7082 13.7277 17.4727C13.7073 17.2476 13.6729 17.1659 13.6493 17.125C13.5835 17.011 13.4888 16.9163 13.3748 16.8505C13.3339 16.8269 13.2522 16.7925 13.027 16.772C12.7916 16.7507 12.4809 16.75 11.9998 16.75C11.5187 16.75 11.208 16.7507 10.9725 16.772C10.7474 16.7925 10.6656 16.8269 10.6248 16.8505C10.5108 16.9163 10.4161 17.011 10.3502 17.125C10.3267 17.1659 10.2922 17.2476 10.2718 17.4727C10.2505 17.7082 10.2498 18.0189 10.2498 18.5V21.248ZM8.67082 2.74999H7.41748C6.46302 2.74999 6.13246 2.75654 5.86433 2.83005C5.24897 2.99874 4.73416 3.42078 4.44806 3.99112C4.3234 4.23962 4.25214 4.56248 4.06496 5.4984L3.46703 8.48801C3.18126 9.91687 4.27415 11.25 5.73132 11.25C6.91763 11.25 7.91094 10.3511 8.02898 9.17063L8.09757 8.48474L8.10155 8.44273L8.67082 2.74999ZM9.59103 8.62499L10.1785 2.74999H13.8208L14.405 8.59198C14.5473 10.0151 13.4298 11.25 11.9996 11.25C10.5804 11.25 9.46911 10.0341 9.59103 8.62499ZM18.1352 2.83005C17.8671 2.75654 17.5365 2.74999 16.5821 2.74999H15.3285L15.9706 9.17063C16.0886 10.3511 17.0819 11.25 18.2682 11.25C19.7254 11.25 20.8183 9.91687 20.5325 8.48801L19.9346 5.4984C19.7474 4.56248 19.6762 4.23962 19.5515 3.99112C19.2654 3.42078 18.7506 2.99874 18.1352 2.83005Z"
                                        fill="#000000"></path>
                                </g>
                            </svg>
                            <h2 class="text-lg ml-2 truncate">{{ storeName }}</h2>
                        </div>
                        <h3 class="font-semibold text-xl">{{ storeTotal(storeName).toFixed(2) }} €</h3>
                    </div>
                    <div v-for="item in items" :key="item.id" class="m-4 flex">
                        <button @click="comercioStore.removeFromBasket(item.id)" class="mr-3">
                            <svg viewBox="0 0 24 24" fill="none" width="1.3em" height="1.3em"
                                xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M7 4C7 2.34315 8.34315 1 10 1H14C15.6569 1 17 2.34315 17 4V5H21C21.5523 5 22 5.44772 22 6C22 6.55228 21.5523 7 21 7H19.9394L19.1153 20.1871C19.0164 21.7682 17.7053 23 16.1211 23H7.8789C6.29471 23 4.98356 21.7682 4.88474 20.1871L4.06055 7H3C2.44772 7 2 6.55228 2 6C2 5.44772 2.44772 5 3 5H7V4ZM9 5H15V4C15 3.44772 14.5523 3 14 3H10C9.44772 3 9 3.44772 9 4V5ZM6.06445 7L6.88085 20.0624C6.91379 20.5894 7.35084 21 7.8789 21H16.1211C16.6492 21 17.0862 20.5894 17.1191 20.0624L17.9355 7H6.06445Z"
                                        fill="#000000"></path>
                                </g>
                            </svg>
                        </button>
                        <div id="contain-image" class="mr-4 w-[80px] h-[100px] overflow-hidden">
                            <img :src="`${baseUrl}/storage/${item.imagen}`" alt="" />
                        </div>
                        <div class="flex flex-col w-full justify-between flex-grow">
                            <div class="flex justify-between">
                                <div class="w-[75%]">
                                    <h3 class="text-lg font-medium line-clamp-2">{{ item.nombre }}</h3>
                                </div>
                                <p>{{ item?.precio?.toFixed(2) }}€</p>
                            </div>
                            <div id="btn-quantity" class="text-lg flex items-center mb-1">
                                <button @click="comercioStore.decreaseProductQuantity(item.id)"
                                    class="border w-[1.5em] h-[1.5em] flex items-center justify-center">
                                    <svg width="1.1em" height="1.1em" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg" fill="#000000">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                        </g>
                                        <g id="SVGRepo_iconCarrier">
                                            <g>
                                                <path fill="none" d="M0 0h24v24H0z"></path>
                                                <path d="M5 11h14v2H5z"></path>
                                            </g>
                                        </g>
                                    </svg>
                                </button>
                                <h4 class="border-t border-b min-w-[1.5em] h-[1.5em] flex items-center justify-center">
                                    {{ item.cantidad }}</h4>
                                <button @click="comercioStore.increaseProductQuantity(item.id)"
                                    class="border w-[1.5em] h-[1.5em] flex items-center justify-center">
                                    <!--
                                        <svg width="1em" height="1em" fill="#000000" viewBox="0 0 1920 1920"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                            </g>
                                            <g id="SVGRepo_iconCarrier">
                                                <path
                                                    d="M91f5.744 213v702.744H213v87.842h702.744v702.744h87.842v-702.744h702.744v-87.842h-702.744V213z"
                                                    fill-rule="evenodd" stroke="black" stroke-width="80" fill="none"></path>
                                            </g>
                                        </svg>
                                    -->
                                    +
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer flex items-center justify-between mt-auto border-t border-gray-300 mb-[60px]">
                <div id="precio" class="font-semibold text-gray-800">
                    <p class="text-gray-600 font-light text-sm">Precio total:</p>
                    <h3 class="text-2xl">
                        <p>{{ comercioStore.totalPrice.toFixed(2) }} €</p>
                    </h3>
                </div>
                <div id="carrito" class="flex items-center space-x-4">
                    <button id="btn-comprar" class="text-xl font-semibold bg-[#276BF2]" @click="toggleCheckout()">
                        Checkout ({{ comercioStore.totalItems }})
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(-10px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-fadeIn {
    animation: fadeIn 0.3s ease-out;
}

#chooseShipping {
    width: 100%;
    height: max-content;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
    background-color: white;
}

.btn-ok {
    background-color: #276BF2;
    color: white;
}

.noSelected {
    background-color: #F2F2F2;
    color: #276BF2;
}

.selected {
    background-color: #276BF2;
    color: white;
}

#btn-quantity {
    width: max-content;
}

#contain-image {
    display: flex;
    justify-content: center;
    align-items: center;
    overflow: hidden;
    border-radius: 5px;
    border: 1px solid #dde0e2;
}

img {
    max-width: 100%;
    max-height: 100%;
    object-fit: contain;
    object-position: center;
}

header {
    height: 80px;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    background-color: white;
}

#btn-comprar {
    border: none;
    display: flex;
    color: white;
    cursor: pointer;
    padding: 10px 20px;
    min-width: 200px;
    border-radius: 5px;
    align-items: center;
    justify-content: center;
}

.footer {
    position: fixed;
    bottom: 0;
    left: 0;
    right: 0;
    background-color: white;
    max-height: 80px;
    box-sizing: border-box;
    padding: 1rem;
}
</style>
