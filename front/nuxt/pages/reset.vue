<script setup>
definePageMeta({
    layout: 'authentication',
});

const email = ref();

function reset() {
    alert("Hacer lógica de envío de email");
}
</script>

<template>
    <div class="bg-gray-100">
        <div class="flex min-h-[100vh] flex-col justify-center py-12 sm:px-6 lg:px-8">
            <div class="text-center sm:mx-auto sm:w-full sm:max-w-md">
                <h1 class="text-3xl font-extrabold text-gray-900">
                    Has oblidat la contrasenya?
                </h1>
            </div>
            <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
                <div class="bg-white mx-5 px-4 pb-4 pt-8 sm:rounded-lg sm:px-10 sm:pb-6 sm:shadow rounded-md">
                    <form @submit.prevent="reset" class="space-y-6">
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Correu electrònic</label>
                            <div class="mt-1">
                                <input id="email" v-model="email" type="text" data-testid="username" required=""
                                    class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                            </div>
                        </div>
                        <div>
                            <ButtonComp test-id="reset">
                                Reiniciar contrasenya
                            </ButtonComp>
                        </div>
                    </form>
                    <div class="m-auto mt-6 w-fit md:mt-8">
                        <span class="m-auto">L'has recordat?
                            <NuxtLink class="font-semibold text-indigo-600" to="/login">Inicia sessió</NuxtLink>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>