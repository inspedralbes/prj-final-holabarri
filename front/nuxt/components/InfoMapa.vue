<template>
    <div v-if="show"
        class="fixed bottom-[12px] left-0 right-0 mx-auto bg-white border border-gray-300 z-50 w-[95%] rounded-xl overflow-hidden p-3">
        <div class="flex gap-4 w-full">
            <div class="mt-1">
                <div class="w-[100px] h-[120px] border rounded-xl overflow-hidden">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTax-ApMm37HSk0kyDBucbsorK56o8DeULcr__CcbkzJoGLRW_YPFG5JVOV3BrUXCsX_uY&usqp=CAU"
                        alt="imagen del comercio" class="w-full h-full object-cover">
                </div>
            </div>
            <div class="w-full font-medium flex flex-col gap-1">
                <div class="flex w-full justify-between items-center">
                    <p class="text-xl font-semibold">{{ info.name }}</p>
                    <svg @click="cerrar" width="1em" height="1em" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path
                                d="M20.7457 3.32851C20.3552 2.93798 19.722 2.93798 19.3315 3.32851L12.0371 10.6229L4.74275 3.32851C4.35223 2.93798 3.71906 2.93798 3.32854 3.32851C2.93801 3.71903 2.93801 4.3522 3.32854 4.74272L10.6229 12.0371L3.32856 19.3314C2.93803 19.722 2.93803 20.3551 3.32856 20.7457C3.71908 21.1362 4.35225 21.1362 4.74277 20.7457L12.0371 13.4513L19.3315 20.7457C19.722 21.1362 20.3552 21.1362 20.7457 20.7457C21.1362 20.3551 21.1362 19.722 20.7457 19.3315L13.4513 12.0371L20.7457 4.74272C21.1362 4.3522 21.1362 3.71903 20.7457 3.32851Z"
                                fill="#0F0F0F"></path>
                        </g>
                    </svg>
                </div>
                <div class="flex items-center gap-1">
                    <svg width="1em" height="1em" version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 64 64" enable-background="new 0 0 64 64"
                        xml:space="preserve" fill="#000000" class="text-yellow-400">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path fill="currentColor"
                                d="M63.893,24.277c-0.238-0.711-0.854-1.229-1.595-1.343l-19.674-3.006L33.809,1.15 C33.479,0.448,32.773,0,31.998,0s-1.48,0.448-1.811,1.15l-8.815,18.778L1.698,22.935c-0.741,0.113-1.356,0.632-1.595,1.343 c-0.238,0.71-0.059,1.494,0.465,2.031l14.294,14.657L11.484,61.67c-0.124,0.756,0.195,1.517,0.822,1.957 c0.344,0.243,0.747,0.366,1.151,0.366c0.332,0,0.666-0.084,0.968-0.25l17.572-9.719l17.572,9.719c0.302,0.166,0.636,0.25,0.968,0.25 c0.404,0,0.808-0.123,1.151-0.366c0.627-0.44,0.946-1.201,0.822-1.957l-3.378-20.704l14.294-14.657 C63.951,25.771,64.131,24.987,63.893,24.277z">
                            </path>
                        </g>
                    </svg>
                    {{ info.puntaje_medio }}
                </div>
                <div class="flex items-center gap-1">
                    <svg width="1em" height="1em" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="-6.4 -6.4 76.80 76.80"
                        enable-background="new 0 0 64 64" xml:space="preserve" fill="#000000">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <g>
                                <circle fill="none" stroke="#000000" stroke-width="4.224" stroke-miterlimit="10" cx="32"
                                    cy="22" r="6"></circle>
                                <path fill="none" stroke="#000000" stroke-width="4.224" stroke-miterlimit="10"
                                    d="M53,22.735C52.948,10.73,43.599,1,32,1 s-21,9.73-21,21.735C11,38.271,31.965,63,31.965,63S53.069,38.271,53,22.735z">
                                </path>
                            </g>
                        </g>
                    </svg>
                    {{ props.info.calle_num }}
                </div>
                <div class="flex items-center gap-1">
                    <svg width="1em" height="1em" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path
                                d="M12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21Z"
                                stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                            <path d="M12 6V12" stroke="#000000" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round"></path>
                            <path d="M16.24 16.24L12 12" stroke="#000000" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round"></path>
                        </g>
                    </svg>
                    {{ props.info.horario[obtenerDiaActual()] }}
                </div>
                <div class="flex items-center gap-1">
                    <svg width="1em" height="1em" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                        </g>
                        <g id="SVGRepo_iconCarrier">
                            <path
                                d="M3 5.5C3 14.0604 9.93959 21 18.5 21C18.8862 21 19.2691 20.9859 19.6483 20.9581C20.0834 20.9262 20.3009 20.9103 20.499 20.7963C20.663 20.7019 20.8185 20.5345 20.9007 20.364C21 20.1582 21 19.9181 21 19.438V16.6207C21 16.2169 21 16.015 20.9335 15.842C20.8749 15.6891 20.7795 15.553 20.6559 15.4456C20.516 15.324 20.3262 15.255 19.9468 15.117L16.74 13.9509C16.2985 13.7904 16.0777 13.7101 15.8683 13.7237C15.6836 13.7357 15.5059 13.7988 15.3549 13.9058C15.1837 14.0271 15.0629 14.2285 14.8212 14.6314L14 16C11.3501 14.7999 9.2019 12.6489 8 10L9.36863 9.17882C9.77145 8.93713 9.97286 8.81628 10.0942 8.64506C10.2012 8.49408 10.2643 8.31637 10.2763 8.1317C10.2899 7.92227 10.2096 7.70153 10.0491 7.26005L8.88299 4.05321C8.745 3.67376 8.67601 3.48403 8.55442 3.3441C8.44701 3.22049 8.31089 3.12515 8.15802 3.06645C7.98496 3 7.78308 3 7.37932 3H4.56201C4.08188 3 3.84181 3 3.63598 3.09925C3.4655 3.18146 3.29814 3.33701 3.2037 3.50103C3.08968 3.69907 3.07375 3.91662 3.04189 4.35173C3.01413 4.73086 3 5.11378 3 5.5Z"
                                stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                        </g>
                    </svg>
                    {{ props.info.telefon }}
                </div>
                <div class="mt-2">
                    <button @click="infoDelComercio" class="bg-[#276BF2] text-white py-2 px-10 rounded-md">Veure el
                        comerç</button>
                </div>
            </div>
        </div>
    </div>
</template>


<script setup>
import { ref, computed } from 'vue';
import { useRouter } from 'vue-router';

const props = defineProps({
    info: Object
});

const emit = defineEmits(['cerrarPopup']);
const router = useRouter();
const show = ref(true);

const infoDelComercio = () => {
    if (props.info?.id) {
        router.push(`/comercio/${props.info.id}`);
    } else {
        alert("Error: No se encontró el ID del comercio.");
    }
};

const imagenLimpia = computed(() => {
    if (!props.info?.imagen) return '';
    return props.info.imagen.replace(/^"|"$/g, '');
});


const obtenerDiaActual = () => {
    const dias = ["lunes", "martes", "miércoles", "jueves", "viernes", "sábado", "domingo"];
    const fecha = new Date();
    const dia = fecha.getDay();
    return dias[dia === 0 ? 6 : dia - 1];
};

const horarioDelDia = computed(() => {
    if (props.info.horario) {
        const diaActual = obtenerDiaActual();
        return props.info.horario[diaActual] || 'Cerrado';
    }
    return 'No disponible';
});

const estadoLocal = computed(() => {
    if (!horarioDelDia.value || horarioDelDia.value === 'Cerrado' || horarioDelDia.value === 'No disponible') {
        return 'Cerrado';
    }

    const ahora = new Date();
    const horaActual = ahora.getHours() * 60 + ahora.getMinutes(); // Minutos desde la medianoche

    const horarioMatch = horarioDelDia.value.match(/(\d{2}):(\d{2})\s*-\s*(\d{2}):(\d{2})/);

    if (!horarioMatch) return 'Cerrado';

    const apertura = parseInt(horarioMatch[1]) * 60 + parseInt(horarioMatch[2]);
    const cierre = parseInt(horarioMatch[3]) * 60 + parseInt(horarioMatch[4]);

    return horaActual >= apertura && horaActual <= cierre ? 'Abierto' : 'Cerrado';
});

const cerrar = () => {
    show.value = false;
    console.log(props.info);
    emit('cerrarPopup');
};
</script>

<style scoped>
#cerrar {
    top: 0;
    right: 10px;
    color: red;
    font-weight: 900;
    font-size: 20px;
    position: absolute;
    border-radius: 1000px;
}
</style>
