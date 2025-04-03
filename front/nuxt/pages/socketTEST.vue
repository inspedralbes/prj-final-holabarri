<script setup>
import { ref, onMounted } from "vue";
// import { io } from "socket.io-client";

// const socket = io("http://localhost:8001");
// const mensajes = ref([]);
// const nuevoMensaje = ref("");

// onMounted(() => {
//   socket.on("mensaje", (data) => {
//     mensajes.value.push(data);
//   });
// });

// const enviarMensaje = () => {
//   if (nuevoMensaje.value.trim()) {
//     socket.emit("mensaje", nuevoMensaje.value);
//     nuevoMensaje.value = "";
//   }
// };
</script>

<template>
  <div>
    <h2>Chat en Tiempo Real</h2>
    <ul>
      <li v-for="(msg, index) in mensajes" :key="index">{{ msg }}</li>
    </ul>
    <input v-model="nuevoMensaje" placeholder="Escribe un mensaje..." />
    <button @click="enviarMensaje">Enviar</button>
  </div>
</template>
