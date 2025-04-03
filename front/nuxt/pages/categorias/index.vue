<template>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold text-center mb-6 text-gray-900">Categorías</h1>
        <div v-if="loading" class="flex justify-center items-center h-40">
            <Loading />
        </div>
        <div v-else class="grid grid-cols-2 gap-6">
            <div v-for="categoria in categorias" :key="categoria.id" @click="reedireccionar(categoria.id)"
                class="bg-white shadow-md rounded-lg p-4 cursor-pointer">
                <img :src="categoria.imagenes" :alt="categoria.name" class="w-full h-25 object-cover rounded-md" />
                <h2 class="text-lg font-semibold text-center mt-2 text-gray-900">{{ categoria.name }}
                </h2>
            </div>
        </div>
    </div>
</template>

<script setup>
    import { ref, onMounted } from 'vue';
    import { useRouter } from 'vue-router';
    import Loading from "../../components/loading.vue";

    const { $communicationManager } = useNuxtApp();
    const categorias = ref([]);
    const loading = ref(true);
    const router = useRouter();

    onMounted(async () => {
        try {
            const response = await $communicationManager.getCategorias();
            categorias.value = response;
        } catch (error) {
            console.error("Error al obtener categorías", error);
        } finally {
            loading.value = false;
        }
    });

    const reedireccionar = (id) => {
        router.push(`/categorias/${id}`);
    };
</script>