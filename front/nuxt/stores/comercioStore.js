import { defineStore } from 'pinia';
import { watch } from 'vue';

export const useComercioStore = defineStore('comercio', {
  state: () => ({
    cesta: [], 
  }),
  getters: {
    totalItems: (state) => state.cesta.length,
    totalPrice: (state) => state.cesta.reduce((acc, item) => acc + item.precio * item.cantidad, 0),
  },
  actions: {
    addToBasket(item) {
      const existingItem = this.cesta.find((i) => i.id === item.id);
      
      if (existingItem) {
        existingItem.cantidad += 1;
      } else {
        this.cesta.push({ ...item, cantidad: 1 });
      }
      sessionStorage.setItem('cestaStorage', JSON.stringify(this.cesta));
    },
    removeFromBasket(id) {
      const index = this.cesta.findIndex((item) => item.id === id);
      if (index !== -1) {
        this.cesta.splice(index, 1);
      }
      sessionStorage.setItem('cestaStorage', JSON.stringify(this.cesta));
    },
    emptyBasket() {
      this.cesta = [];
      sessionStorage.setItem('cestaStorage', JSON.stringify(this.cesta));
    },
    increaseProductQuantity(id) {
        const index = this.cesta.findIndex((item) => item.id === id);
        this.cesta[index].cantidad += 1;
        sessionStorage.setItem('cestaStorage', JSON.stringify(this.cesta));
    },
    decreaseProductQuantity(id) {
        const index = this.cesta.findIndex((item) => item.id === id);
        if (this.cesta[index].cantidad > 1) {
            this.cesta[index].cantidad -= 1;
        } else if (this.cesta[index].cantidad === 1) {
          this.removeFromBasket(id);
        }
        sessionStorage.setItem('cestaStorage', JSON.stringify(this.cesta));
    },
    initialize(){
        if (typeof window !== 'undefined') {
            const cestaStorage = sessionStorage.getItem('cestaStorage');
            if (cestaStorage) {
            this.cesta = JSON.parse(cestaStorage);
            }
        }
    },
  },
  persist: {
    enabled: true,
    strategies: [
      {
        key: 'cestaStorage', 
        storage: typeof window !== 'undefined' ? sessionStorage : null,
      },
    ],
  },
});

