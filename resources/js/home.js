// ── Scroll ──
window.addEventListener('scroll', () => {
  document.getElementById('nav')?.classList.toggle('nav-solid', window.scrollY > 70);
});

// ── Mobile nav ──
let mobOpen = false;

window.toggleMob = function () {
  mobOpen = !mobOpen;
  document.getElementById('mobNav')?.classList.toggle('hidden', !mobOpen);
  document.getElementById('h1')?.style && (document.getElementById('h1').style.transform = mobOpen ? 'translateY(6px) rotate(45deg)' : '');
  document.getElementById('h2')?.style && (document.getElementById('h2').style.opacity = mobOpen ? '0' : '1');
  document.getElementById('h3')?.style && (document.getElementById('h3').style.transform = mobOpen ? 'translateY(-6px) rotate(-45deg)' : '');
};

window.closeMob = function () {
  mobOpen = false;
  document.getElementById('mobNav')?.classList.add('hidden');
  document.getElementById('h1')?.style && (document.getElementById('h1').style.transform = '');
  document.getElementById('h3')?.style && (document.getElementById('h3').style.transform = '');
  document.getElementById('h2')?.style && (document.getElementById('h2').style.opacity = '1');
};

// ── Menu tabs ──
window.setTab = function (btn, cat) {
  document.querySelectorAll('.mt').forEach(t => {
    t.classList.remove('on');
    t.classList.add('text-cream/45');
  });

  btn.classList.add('on');
  btn.classList.remove('text-cream/45');

  document.querySelectorAll('#menuGrid .mc').forEach(c => {
    c.style.display = (cat === 'all' || c.dataset.cat === cat) ? '' : 'none';
  });
};

// ── Reservation ──
window.openRes = function () {
  document.getElementById('resModal')?.classList.remove('hidden');
};

window.closeRes = function () {
  document.getElementById('resModal')?.classList.add('hidden');
};

// ── Order drawer ──
window.openDrawer = function () {
  document.getElementById('orderDrawer')?.classList.add('open');
  document.getElementById('drawerBg')?.classList.remove('hidden');
};

window.closeDrawer = function () {
  document.getElementById('orderDrawer')?.classList.remove('open');
  document.getElementById('drawerBg')?.classList.add('hidden');
};

// ── Cart (make sure cart exists!) ──
window.cart = window.cart || [];

window.renderCart = function () {
  const list = document.getElementById('cartList');
  const empty = document.getElementById('emptyCart');
  const foot = document.getElementById('cartFooter');

  if (!cart.length) {
    empty?.classList.remove('hidden');
    list?.classList.add('hidden');
    foot?.classList.add('hidden');
    return;
  }

  empty?.classList.add('hidden');
  list?.classList.remove('hidden');
  foot?.classList.remove('hidden');

  list.innerHTML = cart.map((it, i) => `
    <div class="flex items-center gap-3 py-4">
      <div class="flex-1 min-w-0">
        <div class="text-[13px] text-cream truncate mb-0.5">${it.name}</div>
        <div class="text-[11px] text-gold">${it.price} MAD</div>
      </div>
      <div class="flex items-center gap-1 shrink-0">
        <button onclick="chgQty(${i},-1)">−</button>
        <span>${it.qty}</span>
        <button onclick="chgQty(${i},1)">+</button>
      </div>
      <span>${it.price * it.qty} MAD</span>
      <button onclick="rmItem(${i})">✕</button>
    </div>
  `).join('');

  const s = cart.reduce((a, i) => a + i.price * i.qty, 0);
  const v = Math.round(s * 0.1);

  document.getElementById('sub').textContent = `${s} MAD`;
  document.getElementById('svc').textContent = `${v} MAD`;
  document.getElementById('tot').textContent = `${s + v} MAD`;
};

// ── Toast ──
window.toast = function (icon, title, sub) {
  const t = document.getElementById('toast');

  document.getElementById('tIcon').textContent = icon;
  document.getElementById('tTitle').textContent = title;
  document.getElementById('tSub').textContent = sub;

  t.classList.remove('translate-y-20', 'opacity-0', 'pointer-events-none');
  t.classList.add('translate-y-0', 'opacity-100');

  setTimeout(() => {
    t.classList.add('translate-y-20', 'opacity-0', 'pointer-events-none');
    t.classList.remove('translate-y-0', 'opacity-100');
  }, 3200);
};

// Toast helper
function showToast(message) {
    const toast = document.getElementById('toast');
    const tTitle = document.getElementById('tTitle');
    tTitle.innerText = message;
    toast.classList.remove('-translate-y-20','opacity-0');
    setTimeout(() => {
        toast.classList.add('-translate-y-20','opacity-0');
    }, 3000);
}
///////////////////////////////////////////////

