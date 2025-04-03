export default defineNuxtPlugin((nuxtApp) => {
    const config = nuxtApp.$config || useRuntimeConfig();

    nuxtApp.provide('imageUrl', (path: string) => `${config.public.apiBaseUrl}`);
});