<template>
    <div class="layout-container">
        <header class="sticky top-0 left-0 w-full bg-white z-10">
            <div class="mx-auto flex max-w-7xl items-center justify-between p-2 py-4 lg:px-8" aria-label="Global">
                <div class="w-full mx-auto bg-white flex justify-around items-center">
                    <input class="px-5 py-2 mx-5 w-full rounded-full border bg-gray-50 focus:outline-none focus:ring-0"
                        type="text" name="search" id="search" placeholder="Buscar..." v-model="search"
                        @keyup.enter="goSearch()">
                    <div id="redirectToMap" class="rounded-full bg-[#447EF2] p-2 cursor-pointer" @click="redirectToMap">
                        <svg fill="#FFFFFF" width="1.2em" height="1.2em" version="1.1" id="Layer_1I"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            viewBox="0 0 512 512" xml:space="preserve" stroke="#FFFFFF">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <g>
                                    <g>
                                        <path
                                            d="M256,0C154.739,0,72.348,82.386,72.348,183.652c0,70.241,18.514,94.635,169.771,320.929 C245.217,509.217,250.424,512,256,512s10.782-2.783,13.881-7.418c151.251-226.216,169.771-251.423,169.771-320.929 C439.652,82.386,357.261,0,256,0z M256,267.13c-46.032,0-83.478-37.446-83.478-83.478c0-46.032,37.446-83.478,83.478-83.478 s83.478,37.446,83.478,83.478C339.478,229.684,302.032,267.13,256,267.13z">
                                        </path>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </div>
                </div>
            </div>
        </header>
        <main class="flex-grow">
            <slot />
        </main>

        <footer class="sticky bottom-0 left-0 w-full bg-white py-2 border-t">
            <nav class="flex justify-around">
                <NuxtLink to="/" class="flex flex-col items-center">
                    <svg width="1.5em" height="1.5em" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        :stroke="route.path === '/' ? '#276BF2' : '#000000'">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                        </path>
                    </svg>
                    <p class="text-sm" :class="route.path === '/' ? 'text-[#276BF2]' : 'text-[#000000]'">Inici</p>
                </NuxtLink>
                <NuxtLink to="/cistella" class="flex flex-col items-center">
                    <svg width="1.5em" height="1.5em" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path d="M8 12L8 8C8 5.79086 9.79086 4 12 4V4C14.2091 4 16 5.79086 16 8L16 12"
                                :stroke="route.path === '/cistella' ? '#276BF2' : '#000000'" stroke-width="2"
                                stroke-linecap="round"></path>
                            <path
                                d="M3.69435 12.6678C3.83942 10.9269 3.91196 10.0565 4.48605 9.52824C5.06013 9 5.9336 9 7.68053 9H16.3195C18.0664 9 18.9399 9 19.514 9.52824C20.088 10.0565 20.1606 10.9269 20.3057 12.6678L20.8195 18.8339C20.904 19.8474 20.9462 20.3542 20.6491 20.6771C20.352 21 19.8435 21 18.8264 21H5.1736C4.15655 21 3.64802 21 3.35092 20.6771C3.05382 20.3542 3.09605 19.8474 3.18051 18.8339L3.69435 12.6678Z"
                                :stroke="route.path === '/cistella' ? '#276BF2' : '#000000'" stroke-width="2"></path>
                        </g>
                    </svg>
                    <p class="text-sm" :class="route.path === '/cistella' ? 'text-[#276BF2]' : 'text-[#000000]'">
                        Cistella</p>
                </NuxtLink>
                <NuxtLink to="/favoritos" class="flex flex-col items-center text-gray-300 hover:text-white">
                    <svg width="1.5em" height="1.5em" viewBox="0 0 24 24" fill="none" stroke="#000" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path
                            d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                        </path>
                    </svg>
                    <p class="text-sm" :class="route.path === '/favoritos' ? 'text-[#276BF2]' : 'text-[#000000]'">
                        Favorits</p>
                </NuxtLink>
                <NuxtLink to="/perfil" class="flex flex-col items-center text-gray-300 hover:text-white">
                    <svg class="w-6 h-6 mb-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="black">
                        <path
                            d="M5 21C5 17.134 8.13401 14 12 14C15.866 14 19 17.134 19 21M16 7C16 9.20914 14.2091 11 12 11C9.79086 11 8 9.20914 8 7C8 4.79086 9.79086 3 12 3C14.2091 3 16 4.79086 16 7Z"
                            :stroke="route.path === '/perfil' ? '#276BF2' : '#000000'" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                        </path>
                    </svg>
                    <p class="text-sm" :class="route.path === '/perfil' ? 'text-[#276BF2]' : 'text-[#000000]'">Perfil
                    </p>
                </NuxtLink>
            </nav>
        </footer>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import { useRoute, useRouter } from 'vue-router';
const route = useRoute();
const router = useRouter();
const search = ref('');

function goSearch() {
    if (search.value.trim() !== '') {
        navigateTo(`/busquedaGeneral?search=${encodeURIComponent(search.value)}`);
    }
}

function redirectToMap() {
    router.push('/mapa');
}
</script>

<style>
.layout-container {
    display: flex;
    flex-direction: column;
    min-height: 100vh;
}

.flex-grow {
    flex: 1;
}
</style>
