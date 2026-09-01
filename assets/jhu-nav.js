/* MEU shared header/nav — jhu-nav.js */
(function () {
  function el(id) { return document.getElementById(id); }

  function openPane(which) {
    var s = el('sidep'), sh = el('shade');
    if (!s || !sh) return;
    document.querySelectorAll('.pane').forEach(function (p) { p.classList.remove('on'); });
    var pane = el('pane-' + which);
    if (pane) pane.classList.add('on');
    s.classList.add('open'); sh.classList.add('open');
    s.setAttribute('aria-hidden', 'false');
  }
  function closePane() {
    var s = el('sidep'), sh = el('shade');
    if (!s || !sh) return;
    s.classList.remove('open'); sh.classList.remove('open');
    s.setAttribute('aria-hidden', 'true');
  }
  window.openPane = openPane;
  window.closePane = closePane;

  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape') closePane();
  });

  /* scroll -> collapse header, reveal the hamburger */
  function onScroll() {
    var y = window.pageYOffset || document.documentElement.scrollTop || 0;
    document.body.classList.toggle('hdr-stuck', y > 90);
  }
  window.addEventListener('scroll', onScroll, { passive: true });

  /* manual collapse toggle (the floating "Hide / Menu" button) */
  function buildTabToggle() {
    if (document.querySelector('.tabtoggle')) return;
    var KEY = 'meu16_tabs_off';
    var b = document.createElement('button');
    b.type = 'button';
    b.className = 'tabtoggle';
    function paint() {
      var off = document.body.classList.contains('tabs-off');
      b.innerHTML = off ? '<span>☰ Menu</span>' : '<span>✕ Hide</span>';
      b.setAttribute('aria-label', off ? 'Show quick menu' : 'Hide quick menu');
      b.setAttribute('aria-expanded', off ? 'false' : 'true');
    }
    try { if (localStorage.getItem(KEY) === '1') document.body.classList.add('tabs-off'); } catch (e) {}
    b.addEventListener('click', function () {
      var off = document.body.classList.toggle('tabs-off');
      try { localStorage.setItem(KEY, off ? '1' : '0'); } catch (e) {}
      paint();
    });
    document.body.appendChild(b);
    paint();
  }

  function init() {
    onScroll();
    buildTabToggle();
  }
  if (document.readyState !== 'loading') init();
  else document.addEventListener('DOMContentLoaded', init);
})();
