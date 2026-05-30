(function () {
  const menuToggle = document.querySelector('[data-menu-toggle]');
  const nav = document.querySelector('[data-primary-nav]');

  if (menuToggle && nav) {
    menuToggle.addEventListener('click', function () {
      const isOpen = nav.classList.toggle('is-open');
      menuToggle.setAttribute('aria-expanded', String(isOpen));
    });
  }

  const filterWrap = document.querySelector('[data-filters]');
  const productGrid = document.querySelector('[data-product-grid]');

  if (filterWrap && productGrid) {
    filterWrap.addEventListener('click', function (event) {
      const button = event.target.closest('button[data-filter]');
      if (!button) return;

      filterWrap.querySelectorAll('button').forEach((item) => item.classList.remove('is-active'));
      button.classList.add('is-active');

      const filter = button.dataset.filter;
      productGrid.querySelectorAll('[data-category]').forEach((card) => {
        const visible = filter === 'all' || card.dataset.category === filter;
        card.style.display = visible ? '' : 'none';
      });
    });
  }
})();
