import { useAuthStore } from '@/stores/authStore';
import $communicationManager from '../plugins/communicationManager';

export default defineNuxtRouteMiddleware((to) => {
  const authStore = useAuthStore();

  if ((!authStore.isAuthenticated && to.path !== '/login' && to.path !== '/register') ) {
    return navigateTo('/login');
  }

  // if (!authStore.comercio && to.path !== '/admin') {
  //   return navigateTo('/');
  // }
});