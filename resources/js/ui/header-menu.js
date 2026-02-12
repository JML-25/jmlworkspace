/**
 * Header menu behaviour (dropdowns + mobile menu)
 * Idempotent: safe to call multiple times.
 */

let isInitialized = false;
console.log("out of the ilitGeaderMenu");

export function initHeaderMenu() {
	console.log("in the ilitGeaderMenu");
  if (isInitialized) return;
  isInitialized = true;

  // --- Dropdown toggle (event delegation) ---
  document.addEventListener('click', (e) => {
    const toggle = e.target.closest('.dropdown-toggle');
    const isDropdownClick = !!toggle;

    // Close all dropdowns if click is outside dropdown toggles/menus
    if (!isDropdownClick) {
      document.querySelectorAll('.dropdown-menu').forEach(menu => {
        menu.classList.add('hidden');
      });
      return;
    }

    // We clicked a dropdown toggle
    const dropdownMenu = toggle.nextElementSibling;
    if (!dropdownMenu || !dropdownMenu.classList.contains('dropdown-menu')) {
      return;
    }

    // Close other open dropdowns
    document.querySelectorAll('.dropdown-menu').forEach(menu => {
      if (menu !== dropdownMenu) menu.classList.add('hidden');
    });

    // Toggle current dropdown
    dropdownMenu.classList.toggle('hidden');
  });

  // --- Mobile menu toggle ---
  document.addEventListener('click', (e) => {
    const btn = e.target.closest('.mobile-menu-button');
    if (!btn) return;

    const mobileMenu = document.querySelector('.navigation-menu');
    if (!mobileMenu) return;

    mobileMenu.classList.toggle('hidden');
  });
}
