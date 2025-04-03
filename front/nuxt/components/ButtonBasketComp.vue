<template>
    <button @click="addToBasket">
        <!-- <img :src="shoppingBasketIcon" alt="Icono de carrito" class="svg-icon" /> -->
        <h3 class="text-2xl font-bold">Afegir a la cistella</h3>
    </button>
</template>

<script>
    import shoppingBasketIcon from '../assets/shopping-basket.svg';
    import { useComercioStore } from '@/stores/comercioStore';

    export default {
        props: {
            producto: {
                type: Object,
                // required: true
            }
        },
        data() {
            return {
                shoppingBasketIcon,
            };
        },
        methods: {
            addToBasket() {
                const comercioStore = useComercioStore();
                comercioStore.addToBasket(this.producto);
                if(confirm('¿Quieres ir a la cesta?')){
                    navigateTo('/cistella');
                }
            },
        },
    };
</script>

<style scoped>
    button {
        border: none;
        display: flex;
        color: white;
        cursor: pointer;
        padding: 10px 20px;
        border-radius: 5px;
        align-items: center;
        justify-content: center;
        background-color: #007bff;
    }
    button:hover {
        background-color: #0056b3;
    }

    .svg-icon {
        width: 30px;
        height: 30px;
    }
</style>