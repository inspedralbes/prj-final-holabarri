import { useComercioStore } from '@/stores/comercioStore';

export default defineNuxtPlugin(() => {
  const comercioStore = useComercioStore();
  comercioStore.initialize();
});