<template>
    <div v-if="loading" class="flex justify-center items-center h-screen text-xl text-gray-600">
        <Loading />
    </div>

    <div v-else class="space-y-6 p-6">
        <h1 class="text-2xl font-bold text-center text-gray-800 mb-6">Detalls de la Compra</h1>

        <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
            <div class="mb-4">
                <p class="text-xl font-semibold text-gray-800">
                    <strong>Data de Compra:</strong> {{ compras.created_at }}
                </p>
                <div class="flex items-center">
                    <div :style="{ backgroundColor: compras.estat_compra?.color }" class="w-4 h-4 rounded-full mr-2">
                    </div>
                    <p class="text-lg text-gray-700">
                        <strong>Estat:</strong> {{ compras.estat_compra?.nombre }}
                    </p>
                </div>
            </div>

            <div v-for="order in compras.order_comercios" :key="order.id" class="border-t pt-4 mt-4">
                <h2 class="text-lg font-semibold text-gray-800 mb-4">{{ order.comercio.nombre }}</h2>

                <div v-for="producto in order.productos_compra" :key="producto.id" class="mb-4">
                    <p class="text-lg text-gray-700">
                        <strong>Producto:</strong> {{ producto.producto.nombre }} <br>
                        <strong>Quantitat:</strong> {{ producto.cantidad }} <br>
                        <strong>Preu per unitat:</strong> {{ producto.precio }} € <br>
                    </p>
                    <div class="flex items-center">
                        <div :style="{ backgroundColor: order.estat_compra?.color }" class="w-4 h-4 rounded-full mr-2">
                        </div>
                        <p class="text-lg text-gray-700">
                            <strong>Estat:</strong> {{ order.estat_compra?.nombre }}
                        </p>
                    </div>
                </div>

                <div class="text-lg text-gray-700 mb-4">
                    <strong>Subtotal:</strong> {{ order.subtotal }} €
                </div>
            </div>

            <div class="mt-6 text-xl font-semibold text-gray-800">
                <strong>Total de la Compra:</strong> {{ compras.total }} €
            </div>
        </div>
    </div>
</template>


<script setup>
definePageMeta({
    layout: 'footer-only'
});

import { ref, onMounted } from "vue";
import { useRouter, useRoute } from "vue-router";
import Loading from "../../../components/loading.vue";
import { useAuthStore } from "../../../stores/authStore";

const { $communicationManager } = useNuxtApp();
const compras = ref({});
const loading = ref(true);
const router = useRouter();
const route = useRoute();
const authStore = useAuthStore();

async function fetchCompraDetalles() {
    loading.value = true;
    const clienteId = authStore.user?.id;
    const compraId = route.params.id;

    if (clienteId && compraId) {
        try {
            const response = await $communicationManager.detalleCompra(compraId);
            console.log("Detalle de la compra:", response);

            if (response) {
                compras.value = response;
            } else {
                console.error("Error al obtenir els detalls de la compra.");
            }
        } catch (error) {
            console.error("Error en fetchCompraDetalles:", error);
        }
    }
    loading.value = false;
}

onMounted(fetchCompraDetalles);
</script>

<style scoped>
#estat {
    width: 15px;
    height: 15px;
    border-radius: 50%;
    margin-left: 10px;
}
</style>