<template>
    <div v-if="loading" class="flex justify-center items-center">
        <Loading />
    </div>
    <div v-else>
        <header class="flex items-center p-4 max-h-[75px] bg-[#276BF2]">
            <div class="flex items-center text-center">
                <h3 class="text-2xl ml-4 text-white">Perfil</h3>
            </div>
        </header>
        <div class="flex flex-col items-center bg-white min-h-screen">
            <div id="contain-perfil"
                class=" bg-[#276BF2] w-full flex flex-col py-4 border-b rounded-b-xl mb-2 items-center">
                <div class="w-[100px] h-[100px] bg-white rounded-full overflow-hidden">
                    <img src="#" alt="">
                </div>
                <p class="mt-2 text-xl text-white">{{ user.name }} {{ user.apellidos }}</p>
            </div>

            <div class="py-6 px-4 w-full max-w-md text-center">
                <div class="space-y-4">
                    <button class="w-full bg-[#447EF2] text-white py-2 rounded-md" @click="goToInfo">
                        Información personal
                    </button>

                    <button class="w-full bg-[#447EF2] text-white py-2 rounded-md" @click="goToEdit">
                        Editar informació
                    </button>

                    <button class="w-full bg-[#447EF2] text-white py-2 rounded-md"
                        @click="goToCompras">
                        Veure les meves compres
                    </button>

                    <button class="w-full bg-[#447EF2] text-white py-2 rounded-md"
                        @click="goToComercio">
                        {{ hasComercio ? 'Panel de Control del Comercio' : 'Crear Comercio' }}
                    </button>

                    <button class="w-full border border-red-500 text-red-500 py-2 rounded-md hover:bg-gray-50" @click="goToLogout">
                        Tancar sessió
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

import { useAuthStore } from '#imports';
import Loading from "../../../components/loading.vue";

const authStore = useAuthStore();
const hasComercio = ref(false);
const loading = ref(true);
const user = authStore.user;

onMounted(async () => {
    loading.value = true;
    let authS = useAuthStore();
    if (!authS.isAuthenticated) {
        navigateTo('/login');
    }
    hasComercio.value = await checkComercio();
    loading.value = false;
});

function goToInfo() { navigateTo('/perfil/info'); }
function goToEdit() { navigateTo('/perfil/perfilCliente'); }
function goToCompras() { navigateTo('/perfil/compras'); }
async function checkComercio() {
    if (authStore?.user) {
        const { $communicationManager } = useNuxtApp();
        const res = await $communicationManager.checkUserHasComercio(authStore.user.id);

        if (res && res.success) {
            authStore.setComercio(res.comercio);
            return true
        } else {
            return false
        }
    }
}
async function goToLogout() {
    const { $communicationManager } = useNuxtApp();
    await $communicationManager.logout();
    authStore.logout();
    localStorage.removeItem('animationShown');
    navigateTo('/login');
}
function goToComercio() {
    if (hasComercio.value) {
        navigateTo('/admin');
    } else {
        navigateTo('/registerStore');
    }
}
</script>