<script setup>
import {
    navigateTo
} from '#app';
import {
    useAuthStore
} from '@/stores/authStore';
import { ref } from 'vue';
import Loading from "@/components/loading.vue";

definePageMeta({
    layout: 'footer-only'
});

const authStore = useAuthStore();
const loading = ref(true);
let formData = reactive([]);
const formDataClient = reactive({
    name: '',
    apellidos: '',
    email: '',
    phone: ''
});

const formDataPassword = reactive({
    currentPassword: '',
    newPassword: '',
    confirmPassword: ''
});

const formDataStreet = reactive({
    street_address: '',
    ciudad: '',
    provincia: '',
    codigo_postal: '',
    numero_planta: '',
    numero_puerta: ''
});

const currentSection = ref('personal');

function showSection(section) {
    currentSection.value = section;
}

async function getUserData() {
    loading.value = true;
    const {
        $communicationManager
    } = useNuxtApp();

    const response = await $communicationManager.getUserData(authStore.user.id);

    if (response) {
        formData = response;
        Object.assign(formDataClient, {
            name: formData.name,
            apellidos: formData.apellidos,
            email: formData.email,
            phone: formData.phone
        });

        Object.assign(formDataStreet, {
            street_address: formData.street_address,
            ciudad: formData.ciudad,
            provincia: formData.provincia,
            codigo_postal: formData.codigo_postal,
            numero_planta: formData.numero_planta,
            numero_puerta: formData.numero_puerta
        });
    } else {
        console.log('Hi ha hagut algun error');
    }

    loading.value = false;
}

async function changePassword() {
    const {
        $communicationManager
    } = useNuxtApp();

    if (!formDataPassword.currentPassword || !formDataPassword.newPassword || !formDataPassword.confirmPassword) {
        console.log('És necessari completar tots els camps');
        return;
    }

    if (formDataPassword.newPassword.length < 8) {
        console.log('La contrasenya ha de tenir mínim 8 caràcters');
        return;
    }

    if (formDataPassword.newPassword != formDataPassword.confirmPassword) {
        console.log('Les contrasenyes no coincideixen');
        return;
    }

    if (formDataPassword.currentPassword == formDataPassword.newPassword) {
        console.log(`La nova contrasenya no pot ser igual a l'anterior`)
        return;
    }

    const response = await $communicationManager.changePassword(formDataPassword);

    if (response) {
        console.log(`S'ha canviat la contrasenya correctament.`)
    } else {
        console.log('Hi ha hagut un error, revisi les seves dades')
    }
}

async function updateDatosPersonales() {
    const {
        $communicationManager
    } = useNuxtApp();

    if (
        formDataClient.name === formData.name &&
        formDataClient.apellidos === formData.apellidos &&
        formDataClient.email === formData.email &&
        formDataClient.phone === formData.phone
    ) {
        console.log(`No s'han modificat les dades`);
        return;
    }

    const response = await $communicationManager.updateDatosPersonales(formDataClient, authStore.user.id);

    if (response) {
        formData = response;
        authStore.setUser(response);
        console.log('Dades personals actualitzades correctament');
    } else {
        console.log('Hi ha hagut un error, revisi les seves dades');
    }

}

async function updateDatosFacturacion() {
    const {
        $communicationManager
    } = useNuxtApp();

    if (
        formDataStreet.street_address === formData.street_address &&
        formDataStreet.ciudad === formData.ciudad &&
        formDataStreet.provincia === formData.provincia &&
        formDataStreet.codigo_postal === formData.codigo_postal &&
        formDataStreet.numero_planta === formData.numero_planta &&
        formDataStreet.numero_puerta === formData.numero_puerta
    ) {
        console.log(`No s'han modificat les dades`);
        return;
    }

    const response = await $communicationManager.updateDatosFacturacion(formDataStreet, authStore.user.id);

    if (response) {
        formData = response;
        authStore.setUser(response);
        console.log('Dades personals actualitzades correctament');
    } else {
        console.log('Hi ha hagut un error, revisi les seves dades');
    }

}
onMounted(() => {
    if (!authStore.isAuthenticated) {
        navigateTo('/login');
    }
    getUserData();
});
</script>

<template>
    <div v-if="loading" class="flex justify-center items-center">
        <Loading />
    </div>
    <div v-else>
        <div class="bg-gray-100 p-2 h-screen lg:max-w-[700px] mx-auto">
            <div class="flex flex-col mt-4 sm:flex-row gap-2 mb-6 px-4">
                <button @click="showSection('personal')" :class="[
                    'w-full md:w-auto px-4 py-2 text-md font-medium rounded-lg transition-colors duration-200',
                    currentSection === 'personal' ? 'bg-blue-600 text-white' : 'bg-gray-100 text-gray-600 hover:bg-blue-600 hover:text-white'
                ]">
                    Dades Personals
                </button>
                <button @click="showSection('password')" :class="[
                    'w-full md:w-auto px-4 py-2 text-md font-medium rounded-lg transition-colors duration-200',
                    currentSection === 'password' ? 'bg-blue-600 text-white' : 'bg-gray-100 text-gray-600 hover:bg-blue-600 hover:text-white'
                ]">
                    Contrasenya
                </button>
                <button @click="showSection('address')" :class="[
                    'w-full md:w-auto px-4 py-2 text-md font-medium rounded-lg transition-colors duration-200',
                    currentSection === 'address' ? 'bg-blue-600 text-white' : 'bg-gray-100 text-gray-600 hover:bg-blue-600 hover:text-white'
                ]">
                    Direcció
                </button>
            </div>

            <div class="relative">
                <div v-if="currentSection === 'personal'" class="mx-3">
                    <!-- Contenido de Datos Personales -->
                    <div class="space-y-4">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div class="w-full"><label class="block text-md font-medium text-gray-700 mb-1">Nom</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="lucide lucide-user h-5 w-5 text-gray-400">
                                            <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="12" cy="7" r="4"></circle>
                                        </svg></div><input type="text" name="nombre" v-model="formDataClient.name"
                                        class="pl-10 w-full h-12 rounded-lg border border-gray-300 shadow-sm text-sm">
                                </div>
                            </div>
                            <div class="w-full"><label
                                    class="block text-md font-medium text-gray-700 mb-1">Llinatges</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="lucide lucide-user h-5 w-5 text-gray-400">
                                            <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="12" cy="7" r="4"></circle>
                                        </svg></div><input type="text" name="apellidos"
                                        v-model="formDataClient.apellidos"
                                        class="pl-10 w-full h-12 rounded-lg border border-gray-300 shadow-sm text-sm">
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div class="w-full"><label
                                    class="block text-md font-medium text-gray-700 mb-1">Correu</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="lucide lucide-mail h-5 w-5 text-gray-400">
                                            <rect width="20" height="16" x="2" y="4" rx="2"></rect>
                                            <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path>
                                        </svg></div><input type="email" name="email" v-model="formDataClient.email"
                                        class="pl-10 w-full h-12 rounded-lg border border-gray-300 shadow-sm text-sm">
                                </div>
                            </div>
                            <div class="w-full"><label
                                    class="block text-md font-medium text-gray-700 mb-1">Telèfon</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="lucide lucide-phone h-5 w-5 text-gray-400">
                                            <path
                                                d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                            </path>
                                        </svg></div><input type="tel" name="phone" v-model="formDataClient.phone"
                                        class="pl-10 w-full h-12 rounded-lg border border-gray-300 shadow-sm text-sm">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-6 ml-3 mr-3">
                        <button type="submit" class="w-full sm:w-auto px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg 
                shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 
                focus:ring-offset-2 transition duration-200" @click="updateDatosPersonales">
                            Guardar Canvis
                        </button>
                    </div>
                </div>
                <div v-else-if="currentSection === 'password'" class="mx-3">
                    <!-- Contenido de Contraseña -->
                    <div class="space-y-4">
                        <div class="w-full">
                            <label class="block text-md font-medium text-gray-700 mb-1">
                                Contrasenya Actual
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="lucide lucide-lock h-5 w-5 text-gray-400">
                                        <rect width="18" height="11" x="3" y="11" rx="2" ry="2"></rect>
                                        <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                    </svg></div><input type="password" name="currentPassword"
                                    v-model="formDataPassword.currentPassword"
                                    class="pl-10 w-full h-12 rounded-lg border border-gray-300 shadow-sm text-sm">
                            </div>
                        </div>
                        <div class="w-full">
                            <label class="block text-md font-medium text-gray-700 mb-1">
                                Nova Contrasenya
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="lucide lucide-lock h-5 w-5 text-gray-400">
                                        <rect width="18" height="11" x="3" y="11" rx="2" ry="2"></rect>
                                        <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                    </svg></div><input type="password" name="newPassword"
                                    v-model="formDataPassword.newPassword"
                                    class="pl-10 w-full h-12 rounded-lg border border-gray-300 shadow-sm text-sm">
                            </div>
                        </div>
                        <div class="w-full">
                            <label class="block text-md font-medium text-gray-700 mb-1">
                                Confirmar Nova Contrasenya
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="lucide lucide-lock h-5 w-5 text-gray-400">
                                        <rect width="18" height="11" x="3" y="11" rx="2" ry="2"></rect>
                                        <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                    </svg></div><input type="password" name="confirmPassword"
                                    v-model="formDataPassword.confirmPassword"
                                    class="pl-10 w-full h-12 rounded-lg border border-gray-300 shadow-sm text-sm">
                            </div>
                        </div>
                    </div>
                    <div class="mt-6 ml-3 mr-3">
                        <button type="submit" class="w-full sm:w-auto px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg 
                shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 
                focus:ring-offset-2 transition duration-200" @click="changePassword">
                            Canviar Contrasenya
                        </button>
                    </div>
                </div>
                <div v-else-if="currentSection === 'address'" class="mx-3">
                    <!-- Contenido de Dirección -->
                    <div class="space-y-4">
                        <div class="w-full"><label class="block text-md font-medium text-gray-700 mb-1">Direcció</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="lucide lucide-map-pin h-5 w-5 text-gray-400">
                                        <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"></path>
                                        <circle cx="12" cy="10" r="3"></circle>
                                    </svg></div><input type="text" name="street_address"
                                    v-model="formDataStreet.street_address"
                                    class="pl-10 w-full h-12 rounded-lg border border-gray-300 shadow-sm text-sm">
                            </div>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div class="w-full"><label
                                    class="block text-md font-medium text-gray-700 mb-1">Ciutat</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="lucide lucide-building h-5 w-5 text-gray-400">
                                            <rect width="16" height="20" x="4" y="2" rx="2" ry="2"></rect>
                                            <path d="M9 22v-4h6v4"></path>
                                            <path d="M8 6h.01"></path>
                                            <path d="M16 6h.01"></path>
                                            <path d="M12 6h.01"></path>
                                            <path d="M12 10h.01"></path>
                                            <path d="M12 14h.01"></path>
                                            <path d="M16 10h.01"></path>
                                            <path d="M16 14h.01"></path>
                                            <path d="M8 10h.01"></path>
                                            <path d="M8 14h.01"></path>
                                        </svg></div><input type="text" name="ciudad" v-model="formDataStreet.ciudad"
                                        class="pl-10 w-full h-12 rounded-lg border border-gray-300 shadow-sm text-sm">
                                </div>
                            </div>
                            <div class="w-full"><label
                                    class="block text-md font-medium text-gray-700 mb-1">Provincia</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="lucide lucide-map-pin h-5 w-5 text-gray-400">
                                            <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"></path>
                                            <circle cx="12" cy="10" r="3"></circle>
                                        </svg></div><input type="text" name="provincia"
                                        v-model="formDataStreet.provincia"
                                        class="pl-10 w-full h-12 rounded-lg border border-gray-300 shadow-sm text-sm">
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div class="w-full"><label class="block text-md font-medium text-gray-700 mb-1">Codi
                                    Postal</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="lucide lucide-map-pin h-5 w-5 text-gray-400">
                                            <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"></path>
                                            <circle cx="12" cy="10" r="3"></circle>
                                        </svg></div><input type="text" name="codigo_postal"
                                        v-model="formDataStreet.codigo_postal"
                                        class="pl-10 w-full h-12 rounded-lg border border-gray-300 shadow-sm text-sm">
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div class="w-full"><label class="block text-md font-medium text-gray-700 mb-1">Nº
                                        Planta</label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="lucide lucide-building h-5 w-5 text-gray-400">
                                                <rect width="16" height="20" x="4" y="2" rx="2" ry="2"></rect>
                                                <path d="M9 22v-4h6v4"></path>
                                                <path d="M8 6h.01"></path>
                                                <path d="M16 6h.01"></path>
                                                <path d="M12 6h.01"></path>
                                                <path d="M12 10h.01"></path>
                                                <path d="M12 14h.01"></path>
                                                <path d="M16 10h.01"></path>
                                                <path d="M16 14h.01"></path>
                                                <path d="M8 10h.01"></path>
                                                <path d="M8 14h.01"></path>
                                            </svg></div><input type="text" name="numero_planta"
                                            v-model="formDataStreet.numero_planta"
                                            class="pl-10 w-full h-12 rounded-lg border border-gray-300 shadow-sm text-sm">
                                    </div>
                                </div>
                                <div class="w-full"><label class="block text-md font-medium text-gray-700 mb-1">Nº
                                        Porta</label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="lucide lucide-home h-5 w-5 text-gray-400">
                                                <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                                <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                            </svg></div><input type="text" name="numero_puerta"
                                            v-model="formDataStreet.numero_puerta"
                                            class="pl-10 w-full h-12 rounded-lg border border-gray-300 shadow-sm text-sm">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-6 ml-3 mr-3">
                        <button type="submit" class="w-full sm:w-auto px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg 
                shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 
                focus:ring-offset-2 transition duration-200" @click="updateDatosFacturacion">
                            Guardar Canvis
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
