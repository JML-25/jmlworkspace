import './bootstrap';
import { initMenu } from './ui/menu';
import { initHeaderMenu } from './ui/header-menu';

function bootMenus() {
  initMenu();
}

// Safe init (Vite + Livewire)
if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', bootMenus);
} else {
  bootMenus();
}

document.addEventListener('livewire:navigated', bootMenus);



function bootHeaderMenu() {
  initHeaderMenu();
}

// ✅ si le DOM est déjà prêt, on init tout de suite
if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', bootHeaderMenu);
} else {
  bootHeaderMenu();
}

// ✅ optionnel : si tu utilises la navigation Livewire (ou re-renders), on retente
document.addEventListener('livewire:navigated', bootHeaderMenu);


document.addEventListener('alpine:init', () => {
  Alpine.data('ingredientLookup', (items) => ({
    wireId: null,
    items,
    query: '',
    filtered: [],

    applyFilter() {
      const q = this.query.trim().toLowerCase();
      if (q.length < 2) { this.filtered = []; return; }

      this.filtered = this.items
        .filter(i => i.title.toLowerCase().includes(q))
        .slice(0, 10);
    },
  }));
});
