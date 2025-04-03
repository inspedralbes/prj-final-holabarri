<template>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link
    href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
    rel="stylesheet">
  <div>
    <Alert v-if="showAlert" :title="'Nova comanda rebuda'" :text="'Vols veure\'l?'" @confirmed="handleConfirmed"
      @canceled="handleCanceled" />
    <NuxtRouteAnnouncer />
    <NuxtLayout>
      <NuxtPage />
    </NuxtLayout>
  </div>
</template>

<style>
body {
  font-family: "Lato", serif;
  font-display: swap;
}

.color-principal-1 {
  color: #276BF2;
}

.color-principal-2 {
  color: #447EF2;
}

.color-principal-3 {
  color: #6393F2;
}

.color-secundario-1 {
  color: #000000;
}

.color-secundario-2 {
  color: #1E2026;
}

.color-secundario-3 {
  color: #F2F2F2;
}

</style>

<script setup>
import { onMounted } from 'vue';
import { useAuthStore } from '../../stores/authStore';
import { useRoute, useRouter } from "vue-router";
import { io } from "socket.io-client";
import Alert from "@/components/Alert.vue";

const auth = useAuthStore();
const route = useRoute();
const router = useRouter();
// const socket = io("http://localhost:8001");
const socket = io("https://holabarri.cat")
const showAlert = ref(false);
const orden = ref(null);

onMounted(() => {
  // auth.checkAuth();

  if (auth?.comercio) {
    socket.on("connect", () => {
      socket.emit("identificarUsuario", { user_id: auth.user.id });
    });

  socket.on("nuevaOrdenRecibida", (newOrden) => {
    // console.log(newOrden);
    orden.value = newOrden;
    showAlert.value = true;
  });
}});

// Función para manejar la confirmación
const handleConfirmed = () => {
  setTimeout(() => {
    if (orden?.value?.id) {
      router.push(`/admin/comandes/${orden?.value?.id}`);
    }
  }, 500);
  showAlert.value = false;  // Ocultar la alerta después de la acción
};

// Función para manejar la cancelación
const handleCanceled = () => {
  showAlert.value = false; // Ocultar la alerta después de la acción
};
</script>