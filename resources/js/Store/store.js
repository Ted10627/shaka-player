// store.js
import { defineStore } from 'pinia';

export const useDropdownStore = defineStore('dropdown', {
  state: () => ({
    currentOpenDropdown: '',
  }),
  actions: {
    toggleDropdown(name) {
      this.currentOpenDropdown = this.currentOpenDropdown === name ? '' : name;
    },
    closeDropdown() {
      this.currentOpenDropdown = '';
    },
  },
});
