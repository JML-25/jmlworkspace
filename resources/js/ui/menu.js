let initialized = false;

export function initMenu(rootSelector = '[data-menu-root]') {
  if (initialized) return;
  initialized = true;

  const closeAll = (root) => {
    root.querySelectorAll('[data-menu]').forEach(m => m.classList.add('hidden'));
    root.querySelectorAll('[data-menu-toggle]').forEach(b =>
      b.setAttribute('aria-expanded', 'false')
    );
  };

  document.addEventListener('click', (e) => {
    const root = e.target.closest(rootSelector);
    const toggle = e.target.closest('[data-menu-toggle]');

    // Click outside
    if (!root) {
      document.querySelectorAll(rootSelector).forEach(closeAll);
      return;
    }

    // Mobile toggle
    if (e.target.closest('.mobile-menu-button')) {
      root.querySelector('.navigation-menu')?.classList.toggle('hidden');
      return;
    }

    if (!toggle) return;

    const key = toggle.getAttribute('data-menu-toggle');
    const menu = root.querySelector(`[data-menu="${key}"]`);
    if (!menu) return;

    // Close siblings
    const parent = menu.parentElement.closest('ul');
    parent?.querySelectorAll(':scope > li > [data-menu]').forEach(m => {
      if (m !== menu) m.classList.add('hidden');
    });

    const isOpen = !menu.classList.contains('hidden');
    menu.classList.toggle('hidden');
    toggle.setAttribute('aria-expanded', isOpen ? 'false' : 'true');
  });

  // Escape closes everything
  document.addEventListener('keydown', (e) => {
    if (e.key !== 'Escape') return;
    document.querySelectorAll(rootSelector).forEach(closeAll);
  });
}
