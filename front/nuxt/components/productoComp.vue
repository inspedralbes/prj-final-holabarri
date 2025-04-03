<template>
    <div id="producto" :data-testid="testId">
        <div id="contain-image" :class="customClass">
            <img :src="img">
            <span id="contain-fav">
                <svg v-if="false" width="1.2em" height="1.2em" viewBox="0 0 24 24" fill="#ea4823"
                    stroke="#ea4823" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    style="position: relative; top: 5px; margin-left: 5px; margin-right: 5px;">
                    <path
                        d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                    </path>
                </svg>
                <svg width="1.2em" height="1.2em" viewBox="0 0 24 24" fill="none" stroke="#333" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round"
                    style="position: relative; top: 5px; margin-left: 5px; margin-right: 5px;">
                    <path
                        d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                    </path>
                </svg>
            </span>
            <span id="contain-nom" v-if="comercio">
                <h3>{{ comercio }}</h3>
            </span>
        </div>
        <div style="width: 185px;">
            <h3 id="title" class="truncate">{{ title }}</h3>
            <h2 id="price">{{ price }}€</h2>
        </div>
    </div>
</template>

<style scoped>
#producto {
    width: 100%;
    display: flex;
    flex-direction: column;
    overflow: hidden;
}

#title {
    font-weight: 500;
    color: #1a1b1b;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

#price {
    font-weight: 700;
    font-size: 18px;
    margin-bottom: 0;
}

#contain-image {
    height: 160px;
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
    overflow: hidden;
    border-radius: 10px;
    border: 1px solid #dde0e2;
}

img {
    max-width: 100%; /* Limita el ancho al tamaño del contenedor */
    max-height: 100%; /* Limita la altura al tamaño del contenedor */
    object-fit: contain; /* Mantiene la proporción de la imagen */
    object-position: center; /* Centra la imagen dentro del contenedor */
}

#contain-fav {
    position: absolute;
    top: 10px;
    right: 10px;
    width: 30px;
    height: 30px;
    background-color: #dde0e2;
    border-radius: 8px;
}

#contain-nom {
    position: absolute;
    bottom: 10px;
    left: 10px;
    background-color: #276BF2;
    border-radius: 3px;
    color: white;
    padding: 2px 5px;
    max-width: 150px;
}

#contain-nom h3{
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}
</style>

<script setup>
const props = defineProps({
    testId: {
        type: String,
        default: 'a',
    },
    img: {
        type: String,
        required: true,
    },
    title: {
        type: String,
        required: true,
    },
    price: {
        type: Number,
        // required: true,
    },
    comercio: {
        type: String,
    },
    customClass: {
        type: String,
        default: ''
    }
});
</script>



<!-- <template>
    <div id="producto" :data-testid="testId">
        <div id="contain-image" :class="customClass">
            <img :src="img">
            <span @click.stop="actualizaFavoritos(productoId)" id="contain-fav">
                <svg v-if="authStore?.favoritos?.has(productoId)" width="1.2em" height="1.2em" viewBox="0 0 24 24" fill="#ea4823"
                    stroke="#ea4823" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    style="position: relative; top: 5px; margin-left: 5px; margin-right: 5px;">
                    <path
                        d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                    </path>
                </svg>
                <svg v-else width="1.2em" height="1.2em" viewBox="0 0 24 24" fill="none" stroke="#333" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round"
                    style="position: relative; top: 5px; margin-left: 5px; margin-right: 5px;">
                    <path
                        d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                    </path>
                </svg>
            </span>
            <span id="contain-nom">
                <h3>{{ comercio }}</h3>
            </span>
        </div>
        <div style="width: 185px;">
            <h3 id="title" class="truncate">{{ title }}</h3>
            <h2 id="price">{{ price }}€</h2>
        </div>
    </div>
</template>

<style scoped>
#producto {
    width: 100%;
    display: flex;
    flex-direction: column;
    overflow: hidden;
}

#title {
    font-weight: 500;
    color: #1a1b1b;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

#price {
    font-weight: 700;
    font-size: 18px;
    margin-bottom: 0;
}

#contain-image {
    height: 160px;
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
    overflow: hidden;
    border-radius: 10px;
    border: 1px solid #dde0e2;
}

img {
    max-width: 100%; /* Limita el ancho al tamaño del contenedor */
    max-height: 100%; /* Limita la altura al tamaño del contenedor */
    object-fit: contain; /* Mantiene la proporción de la imagen */
    object-position: center; /* Centra la imagen dentro del contenedor */
}

#contain-fav {
    position: absolute;
    top: 10px;
    right: 10px;
    width: 30px;
    height: 30px;
    background-color: #dde0e2;
    border-radius: 8px;
}

#contain-nom {
    position: absolute;
    bottom: 10px;
    left: 10px;
    background-color: #276BF2;
    border-radius: 3px;
    color: white;
    padding: 2px 5px;
    max-width: 150px;
}

#contain-nom h3{
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}
</style>

<script setup>
const props = defineProps({
    testId: {
        type: String,
        default: 'a',
    },
    img: {
        type: String,
        required: true,
    },
    title: {
        type: String,
        required: true,
    },
    price: {
        type: Number,
        // required: true,
    },
    comercio: {
        type: String,
        required: true,
    },
    customClass: {
        type: String,
        default: ''
    }
});

import { useAuthStore } from '../../stores/authStore';

const authStore = useAuthStore();

async function actualizaFavoritos(productoID) {
    const { $communicationManager } = useNuxtApp();

    try {
        const response = await $communicationManager.updateFavorito(authStore.user.id, productoID);

        if (response) {
            authStore.toggleFavorito(productoID)
        }

    } catch (error) {
        console.error("Error en la petición:", error);
    }
}
</script> -->