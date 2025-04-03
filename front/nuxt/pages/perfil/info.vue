<template>
    <div v-if="clientData" class="max-w-4xl mx-auto p-6 bg-white rounded-lg shadow-md">
        <h1 class="text-3xl font-semibold text-gray-800 mb-6">Datos del Cliente</h1>

        <div class="space-y-4">
            <div>
                <span class="font-medium text-gray-600">Nombre:</span>
                <p class="text-lg text-gray-800">
                    {{ clientData.cliente.apellidos }}, {{ clientData.cliente.nombre || 'No disponible' }}
                </p>
            </div>

            <div>
                <span class="font-medium text-gray-600">Email:</span>
                <p class="text-lg text-gray-800">{{ clientData.cliente.email }}</p>
            </div>

            <div>
                <span class="font-medium text-gray-600">Teléfono:</span>
                <p class="text-lg text-gray-800">{{ clientData.cliente.phone }}</p>
            </div>

            <div>
                <span class="font-medium text-gray-600">Dirección:</span>
                <p class="text-lg text-gray-800">{{ clientData.cliente.street_address }}</p>
            </div>

            <div>
                <span class="font-medium text-gray-600">Ciudad:</span>
                <p class="text-lg text-gray-800">{{ clientData.cliente.ciudad }}</p>
            </div>

            <div>
                <span class="font-medium text-gray-600">Provincia:</span>
                <p class="text-lg text-gray-800">{{ clientData.cliente.provincia }}</p>
            </div>

            <div>
                <span class="font-medium text-gray-600">Código Postal:</span>
                <p class="text-lg text-gray-800">{{ clientData.cliente.codigo_postal }}</p>
            </div>

            <div>
                <span class="font-medium text-gray-600">Número de Planta:</span>
                <p class="text-lg text-gray-800">{{ clientData.cliente.numero_planta }}</p>
            </div>

            <div>
                <span class="font-medium text-gray-600">Número de Puerta:</span>
                <p class="text-lg text-gray-800">{{ clientData.cliente.numero_puerta }}</p>
            </div>
        </div>
    </div>

    <div v-else class="max-w-4xl mx-auto p-6 bg-white rounded-lg shadow-md text-center">
        <p class="text-xl text-gray-500">Cargando...</p>
    </div>
</template>

<script setup>
definePageMeta({
    layout: 'footer-only'
});

import { ref, onMounted } from 'vue';
import { useAuthStore } from '../../stores/authStore';

const { $communicationManager } = useNuxtApp();

const clientData = ref(null);
const authStore = useAuthStore();

onMounted(async () => {
    const clienteId = authStore.user.id;
    const token = authStore.token;

    if (clienteId && token) {
        clientData.value = await $communicationManager.getDatosCliente(clienteId);
    } else {
        console.error("ID de cliente o token no disponibles");
    }
});
</script>