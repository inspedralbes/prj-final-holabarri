<template>
    <div v-if="loading" class="flex justify-center items-center h-screen text-xl text-gray-600">
        <Loading />
    </div>

    <div v-else class="space-y-6 p-6">
        <h1 class="text-2xl font-bold text-center text-gray-800 mb-6">Compras Realitzades</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div v-for="compra in compras" :key="compra.id"
                class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">

                <div class="flex items-center justify-between mb-4">
                    <p class="text-xl font-semibold text-gray-800">
                        <strong>Data:</strong> {{ compra.created_at }}
                    </p>
                </div>

                <div class="flex items-center mb-4">
                    <div id="estat" :style="{ backgroundColor: compra.estat_compra?.color }"
                        class="w-4 h-4 rounded-full mr-2"></div>
                    <p class="text-lg text-gray-700">
                        <strong>Estat:</strong> {{ compra.estat_compra?.nombre }}
                    </p>
                </div>

                <div class="mb-4">
                    <p class="text-lg text-gray-700">
                        <strong>Preu Total:</strong> <span class="font-bold">{{ compra.total }} €</span>
                    </p>
                </div>

                <div class="mb-4">
                    <p class="text-lg text-gray-700">
                        <strong>Tipus d'enviament:</strong> {{ compra.tipo_envio?.nombre }}
                    </p>
                </div>

                <div class="mt-6 text-center">
                    <button @click="verDetalles(compra.id)"
                        class="bg-indigo-600 text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-indigo-700 transition-colors duration-300">
                        Veure detalls
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
definePageMeta({
    layout: 'footer-only'
});

import { ref, onMounted } from "vue";
import { useRouter } from "vue-router";
import Loading from "../../../components/loading.vue";
import { useAuthStore } from "../../../stores/authStore";

const { $communicationManager } = useNuxtApp();
const compras = ref([]);
const loading = ref(true);
const router = useRouter();
const authStore = useAuthStore();

async function fetchCompras() {
    loading.value = true;
    const clienteId = authStore.user?.id;

    if (clienteId) {
        try {
            const response = await $communicationManager.comprasCliente(clienteId);
            console.log(response);

            if (response) {
                compras.value = response;
            } else {
                console.error("Error al obtenir les compres.");
            }
        } catch (error) {
            console.error("Error en fetchCompras:", error);
        }
    }
    loading.value = false;
}

function verDetalles(compraId) {
    router.push(`/perfil/compras/${compraId}`);
}

onMounted(fetchCompras);
</script>

<style scoped>
#estat {
    width: 15px;
    height: 15px;
    border-radius: 50%;
    margin-left: 10px;
}
</style>