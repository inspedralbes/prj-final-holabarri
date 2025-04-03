<template>
    <div>
        <button @click="activarCamara">Abrir Cámara</button>
        <video ref="video" autoplay v-if="camaraActiva"></video>
    </div>
</template>

<script>
export default {
    data() {
        return {
            camaraActiva: false,
        };
    },
    methods: {
        async activarCamara() {
            try {
                this.camaraActiva = true;
                const stream = await navigator.mediaDevices.getUserMedia({ video: true });
                this.$refs.video.srcObject = stream;
            } catch (error) {
                console.error("Error al acceder a la cámara:", error);
            }
        },
    },
};
</script>
