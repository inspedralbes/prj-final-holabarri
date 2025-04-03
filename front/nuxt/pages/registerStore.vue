<script setup>
import 'ol/ol.css';
import { onMounted, reactive, ref, watch } from 'vue';
import { useNuxtApp, navigateTo } from '#app';
import { useAuthStore } from '@/stores/authStore';

const categorias = ref('');
const authStore = useAuthStore();
const listaProvincias = ref([]);
const listaCiudades = ref([]);
const todasLasCiudades = ref([]);
const errorMensaje = ref('');
const imagen = ref(null);

definePageMeta({
    layout: 'authentication',
});

const formData = reactive({
    nombre: '',
    email: '',
    phone: '',
    street_address: '',
    ciudad: '',
    provincia: '',
    codigo_postal: '',
    num_planta: null,
    num_puerta: null,
    descripcion: '',
    categoria: null,
    idUser: null,
    gestion_stock: 0,
    latitude: null,
    longitude: null
});

async function obtenerCoordenadas() {
    const direccion = `${formData.street_address}, ${formData.ciudad}, ${formData.provincia}, ${formData.codigo_postal}`;
    const url = `https://nominatim.openstreetmap.org/search?q=${encodeURIComponent(direccion)}&format=json&addressdetails=1&limit=1`;

    try {
        const response = await fetch(url);
        const data = await response.json();
        if (data.length > 0) {
            errorMensaje.value = '';
            return { lat: data[0].lat, lon: data[0].lon };
        } else {
            errorMensaje.value = "No se encontraron coordenadas.";
            console.error(errorMensaje.value);
            return null;
        }
    } catch (error) {
        errorMensaje.value = "Error al obtener las coordenadas.";
        console.error(errorMensaje.value, error);
        return null;
    }
}

const handleFileUpload = (event) => {
    const file = event.target.files[0];
    if (file) {
        imagen.value = file;
    }
};

async function getCategoriasGenerales() {
    const { $communicationManager } = useNuxtApp();
    categorias.value = await $communicationManager.getCategorias();
}

async function realizarRegistro() {
    const { $communicationManager } = useNuxtApp();

    // Convertir a números si aplica
    formData.codigo_postal = parseInt(formData.codigo_postal) || null;
    formData.num_planta = parseInt(formData.num_planta) || null;
    formData.num_puerta = parseInt(formData.num_puerta) || null;
    formData.categoria = parseInt(formData.categoria) || null;
    formData.gestion_stock = parseInt(formData.gestion_stock);

    if (!formData.idUser) {
        console.error("Error: idUser no está definido.");
        return;
    }

    for (const key in formData) {
        if (formData[key] === null || formData[key] === undefined || formData[key] === '') {
            console.error(`Campo obligatorio faltante: ${key}`);
            return;
        }
    }

    const data = new FormData();
    for (const key in formData) {
        data.append(key, formData[key]);
    }

    if (imagen.value) {
        data.append('imagen', imagen.value);
    }

    try {
        const response = await $communicationManager.registerStore(data);
        if (response) {
            navigateTo('/perfil');
        } else {
            console.error("Error al registrar el comercio.");
        }
    } catch (error) {
        console.error("Error en el proceso de registro:", error);
    }
}

async function register() {
    const coordenadas = await obtenerCoordenadas();
    if (coordenadas) {
        formData.latitude = coordenadas.lat;
        formData.longitude = coordenadas.lon;
        await realizarRegistro();
    } else {
        console.error("No se obtuvieron coordenadas. Registro cancelado.");
    }
}

watch(() => formData.provincia, async (nuevaProvincia) => {
    if (!nuevaProvincia) {
        listaCiudades.value = [];
        return;
    }

    const { $communicationManager } = useNuxtApp();
    const provinciaSeleccionada = listaProvincias.value.find(p => p.label === nuevaProvincia);

    if (provinciaSeleccionada) {
        try {
            const ciudades = await $communicationManager.getCiudades(provinciaSeleccionada.code);
            listaCiudades.value = ciudades || [];
        } catch (error) {
            console.error("Error al obtener las ciudades.");
            listaCiudades.value = [];
        }
    } else {
        listaCiudades.value = [];
    }
});

onMounted(async () => {
    getCategoriasGenerales();
    const { $communicationManager } = useNuxtApp();

    try {
        listaProvincias.value = await $communicationManager.getProvincias() || [];
    } catch (error) {
        console.error("Error al obtener provincias:", error);
    }

    todasLasCiudades.value = await $communicationManager.getCiudades() || [];
    formData.idUser = authStore.user.id;
});
</script>



<template>
    <div class="bg-gray-100">
        <div class="flex min-h-[100vh] flex-col justify-center py-12 sm:px-6 lg:px-8">
            <div class="text-center sm:mx-auto sm:w-full sm:max-w-md">
                <h1 class="text-3xl font-extrabold text-gray-900">
                    Registra't
                </h1>
            </div>
            <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md md:max-w-lg">
                <div class="bg-white mx-5 px-4 pb-4 pt-8 sm:rounded-lg sm:px-10 md:px-12 sm:pb-6 sm:shadow rounded-md">
                    <form @submit.prevent="register" class="space-y-6">
                        <div class="grid grid-cols-2 gapQueFunciona">
                            <div>
                                <label for="nom" class="block text-sm font-medium text-gray-700">Nom</label>
                                <div class="mt-1">
                                    <input id="nom" name="nom" v-model="formData.nombre" type="text" data-testid="nom"
                                        required="" placeholder="Fleca barri"
                                        class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                </div>
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700">Correu
                                    electrònic</label>
                                <div class="mt-1">
                                    <input id="email" v-model="formData.email" type="text" data-testid="email"
                                        required="" placeholder="fleca@barri.com"
                                        class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                </div>
                            </div>
                            <div>
                                <label for="phone" class="block text-sm font-medium text-gray-700">Telèfon</label>
                                <div class="mt-1">
                                    <input id="phone" v-model="formData.phone" type="text" data-testid="phone"
                                        required="" placeholder="396135285"
                                        class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                </div>
                            </div>
                            <div>
                                <label for="street_address"
                                    class="block text-sm font-medium text-gray-700">Adreça</label>
                                <div class="mt-1">
                                    <input id="street_address" name="street_address" v-model="formData.street_address"
                                        type="text" data-testid="street_address" required=""
                                        placeholder="Josep i Puig 4"
                                        class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                </div>
                            </div>



                            <div>
                                <label for="provincia" class="block text-sm font-medium text-gray-700">Provincia</label>
                                <div class="mt-1">
                                    <select id="provincia" v-model="formData.provincia" required
                                        class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 bg-white shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                        <option value="" disabled class="text-gray-400">Seleccione una provincia
                                        </option>
                                        <option v-for="provincia in listaProvincias" :key="provincia.code"
                                            :value="provincia.label">
                                            {{ provincia.label }}
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div>
                                <label for="ciudad" class="block text-sm font-medium text-gray-700">Ciudad</label>
                                <div class="mt-1">
                                    <select id="ciudad" v-model="formData.ciudad" required
                                        class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 bg-white shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                        <option value="" disabled>Seleccione una ciudad</option>
                                        <option v-for="ciudad in listaCiudades" :key="ciudad.code"
                                            :value="ciudad.label">
                                            {{ ciudad.label }}
                                        </option>
                                    </select>
                                </div>
                            </div>





                            <div>
                                <label for="codigo_postal" class="block text-sm font-medium text-gray-700">Codi
                                    Postal</label>
                                <div class="mt-1">
                                    <input id="codigo_postal" name="codigo_postal" v-model="formData.codigo_postal"
                                        type="text" data-testid="codigo_postal" required="" placeholder="07436"
                                        class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                </div>
                            </div>
                            <div>
                                <label for="numero_planta" class="block text-sm font-medium text-gray-700">Número
                                    Planta</label>
                                <div class="mt-1">
                                    <input id="numero_planta" name="numero_planta" v-model="formData.num_planta"
                                        type="number" data-testid="numero_planta" required="" placeholder="9"
                                        class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                </div>
                            </div>
                            <div>
                                <label for="numero_puerta" class="block text-sm font-medium text-gray-700">Número
                                    Porta</label>
                                <div class="mt-1">
                                    <input id="numero_puerta" name="numero_puerta" v-model="formData.num_puerta"
                                        type="number" data-testid="numero_puerta" required="" placeholder="3"
                                        class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                </div>
                            </div>
                            <div>
                                <label for="gestion_stock" class="block text-sm font-medium text-gray-700">Gestionar
                                    Stock</label>
                                <div class="mt-1">
                                    <select id="gestion_stock" v-model="formData.gestion_stock"
                                        data-testid="gestion_stock" required=""
                                        class="block w-full bg-white appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                        <option value="0">No</option>
                                        <option value="1">Sí</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-2">
                            <label for="categoria" class="block text-sm font-medium text-gray-700">Categoria</label>
                            <div class="mt-1">
                                <select id="categoria" v-model="formData.categoria" data-testid="categoria" required=""
                                    class="block w-full bg-white appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                    <option v-for="categoria in categorias" :key="categoria.id" :value="categoria.id">
                                        {{ categoria.name }}
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="col-span-2">
                            <label for="imagen" class="block text-sm font-medium text-gray-700">Imagen</label>
                            <div class="mt-1">
                                <input id="imagen" type="file" @change="handleFileUpload" accept="image/*"
                                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-md cursor-pointer bg-white shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                            </div>
                        </div>


                        <div class="col-span-2">
                            <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripció</label>
                            <div class="mt-1">
                                <textarea id="descripcion" name="descripcion" v-model="formData.descripcion" rows="3"
                                    data-testid="descripcion" required=""
                                    class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"></textarea>
                            </div>
                        </div>
                        <div v-if="errorMensaje" class="mt-2 text-red-500 text-sm">
                            {{ errorMensaje }}
                        </div>

                        <div>
                            <ButtonComp test-id="register" @submit.prevent="register">
                                Registrar-se
                            </ButtonComp>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
.gapQueFunciona {
    gap: 1rem;
}
</style>