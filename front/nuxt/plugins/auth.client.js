import { useAuthStore } from '@/stores/authStore';

export default defineNuxtPlugin(() => {
  const authStore = useAuthStore();
  authStore.initialize();
});