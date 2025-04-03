<template>
    <div>
        <Loading />
    </div>
</template>

<script>
import { useAuthStore } from '@/stores/authStore';
import Loading from '@/components/loading.vue';

const loading = ref(true);

definePageMeta({
    layout: 'authentication',
});
export default {
    setup() {
        const authStore = useAuthStore();

        // Procesar el token del callback
        async function handleCallback() {
            loading.value = true;
            const urlParams = new URLSearchParams(window.location.search);
            const userParam = urlParams.get('user');

            if (userParam) {
                try {
                    const userData = JSON.parse(decodeURIComponent(userParam));
                    const { token, ...user } = userData;

                    // Guardar token y usuario en el store
                    authStore.login(user, token, '');
                    loading.value = false;
                    navigateTo('/');
                } catch (error) {
                    console.log('Hubo un problema con el inicio de sesión.');
                    loading.value = false;
                    navigateTo('/login');
                }
            } else {
                console.log('Inicio de sesión fallido.');
                loading.value = false;
                navigateTo('/login');
            }
        }

        handleCallback();

        return {};
    },
};
</script>