// ╔══════════════════════════════════════════════════════════════╗
// ║  La Maison — Menu.js  (full working version)                ║
// ║  Stripe flow: createPaymentIntent → confirmCardPayment       ║
// ╚══════════════════════════════════════════════════════════════╝

// ── Cart State ───────────────────────────────────────────────────
let cart = [];

function cartTotal() {
  return cart.reduce((sum, i) => sum + i.price * i.qty, 0);
}

// ── Cart HTML ────────────────────────────────────────────────────
function cartItemsHTML() {
  return cart.map((it, i) => `
    <div class="flex items-center gap-3 py-3.5">
      <div class="flex-1 min-w-0">
        <div class="text-[12px] text-ivory truncate leading-tight">${it.name}</div>
        <div class="text-[10px] text-gold mt-0.5">${it.price} MAD / unité</div>
      </div>
      <div class="flex items-center gap-1.5 shrink-0">
        <button onclick="chg(${i},-1)" class="w-6 h-6 border border-gold/20 text-ivory/30 hover:border-gold hover:text-gold text-xs flex items-center justify-center bg-transparent cursor-pointer transition-all">−</button>
        <span class="w-5 text-center text-[12px] text-ivory font-medium">${it.qty}</span>
        <button onclick="chg(${i},+1)" class="w-6 h-6 border border-gold/20 text-ivory/30 hover:border-gold hover:text-gold text-xs flex items-center justify-center bg-transparent cursor-pointer transition-all">+</button>
      </div>
      <span class="text-[12px] text-ivory/40 w-16 text-right shrink-0 font-medium">${it.price * it.qty} MAD</span>
      <button onclick="rmItem(${i})" class="text-ivory/15 hover:text-rose transition-colors bg-transparent border-0 cursor-pointer ml-1 text-xs">✕</button>
    </div>`).join('');
}

// ── Render ───────────────────────────────────────────────────────
function renderAll() {
  renderStickyCart();
  renderDrawerCart();
  updateBadge();
}

function renderStickyCart() {
  const list = document.getElementById('sCartList');
  const empty = document.getElementById('sEmptyMsg');
  const summary = document.getElementById('sCartSummary');
  if (!list) return;
  if (!cart.length) {
    empty.classList.remove('hidden');
    list.classList.add('hidden');
    summary.classList.add('hidden');
    return;
  }
  empty.classList.add('hidden');
  list.classList.remove('hidden');
  summary.classList.remove('hidden');
  list.innerHTML = cartItemsHTML();
  document.getElementById('sTot').textContent = `${cartTotal()} MAD`;
  document.getElementById('sCartCount').textContent = cart.reduce((a, i) => a + i.qty, 0);
}

function renderDrawerCart() {
  const list = document.getElementById('dCartList');
  const empty = document.getElementById('dEmptyMsg');
  const foot = document.getElementById('dCartFoot');
  if (!list) return;
  if (!cart.length) {
    empty.classList.remove('hidden');
    list.classList.add('hidden');
    foot.classList.add('hidden');
    return;
  }
  empty.classList.add('hidden');
  list.classList.remove('hidden');
  foot.classList.remove('hidden');
  list.innerHTML = cartItemsHTML();
  document.getElementById('dTot').textContent = `${cartTotal()} MAD`;
}

function updateBadge() {
  const n = cart.reduce((a, i) => a + i.qty, 0);
  const b = document.getElementById('cartCount');
  const fb = document.getElementById('fabBadge');
  if (b) {
    b.textContent = n;
    b.classList.toggle('hidden', n === 0);
    b.classList.toggle('flex', n > 0);
  }
  if (fb) fb.textContent = n;
  const sc = document.getElementById('sCartCount');
  if (sc) sc.textContent = n;
}

function showCartFab() {
  const fab = document.getElementById('cartFab');
  if (!fab) return;
  fab.classList.toggle('hidden', cart.length === 0);
  fab.classList.toggle('flex', cart.length > 0);
}

// ── Cart Actions ─────────────────────────────────────────────────
function addToCart(card) {
  const id = card.dataset.id;
  const name = card.dataset.name;
  const price = +card.dataset.price;
  const ex = cart.find(i => i.id === id);
  if (ex) ex.qty++;
  else cart.push({ id, name, price, qty: 1 });
  renderAll();
  showCartFab();
  toast('🍽', name, `Ajouté · ${price} MAD`);
}

function rmItem(idx) {
  cart.splice(idx, 1);
  renderAll();
  showCartFab();
}

function chg(idx, delta) {
  cart[idx].qty += delta;
  if (cart[idx].qty <= 0) rmItem(idx);
  else renderAll();
}

function clearCart() {
  cart = [];
  renderAll();
  showCartFab();
}

// ── Filters / Search / Sort ──────────────────────────────────────
let activeFilter = 'all';
const allProds = () => Array.from(document.querySelectorAll('.prod'));

function setFilter(cat, btn) {
  activeFilter = cat;
  document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('on'));
  btn.classList.add('on');
  applyFilters();
}

function applyFilters() {
  const q = document.getElementById('searchBox')?.value.toLowerCase() || '';
  let vis = 0;
  allProds().forEach(p => {
    const show = (activeFilter === 'all' || p.dataset.cat === activeFilter)
      && p.dataset.name.toLowerCase().includes(q);
    p.style.display = show ? '' : 'none';
    if (show) vis++;
  });
  const ic = document.getElementById('itemCount');
  if (ic) ic.textContent = `${vis} plat${vis > 1 ? 's' : ''} affiché${vis > 1 ? 's' : ''}`;
  document.getElementById('emptyState')?.classList.toggle('hidden', vis > 0);
  const pg = document.getElementById('productsGrid');
  if (pg) pg.style.display = vis === 0 ? 'none' : '';
}

function applySort(v) {
  const grid = document.getElementById('productsGrid');
  if (!grid) return;
  const items = [...grid.querySelectorAll('.prod')];
  items.sort((a, b) => {
    if (v === 'price-asc') return +a.dataset.price - +b.dataset.price;
    if (v === 'price-desc') return +b.dataset.price - +a.dataset.price;
    if (v === 'name') return a.dataset.name.localeCompare(b.dataset.name);
    return 0;
  });
  items.forEach(i => grid.appendChild(i));
}

// ── Cart Drawer (mobile) ─────────────────────────────────────────
function openCart() {
  document.getElementById('cartDrawer').classList.add('open');
  document.getElementById('cartBg').classList.remove('hidden');
  document.body.style.overflow = 'hidden';
}

function closeCart() {
  document.getElementById('cartDrawer').classList.remove('open');
  document.getElementById('cartBg').classList.add('hidden');
  document.body.style.overflow = '';
}

// ── Payment Modal ────────────────────────────────────────────────
let curStep = 1;

function openPayModal() {
  if (!cart.length) return toast('⚠️', 'Panier vide', 'Ajoutez des plats avant de payer.');
  renderPayRecap();
  document.getElementById('payModal').classList.remove('hidden');
  document.body.style.overflow = 'hidden';
  closeCart();
  goStep(1);
}

function closePayModal() {
  document.getElementById('payModal').classList.add('hidden');
  document.body.style.overflow = '';
}

function goStep(n) {
  curStep = n;
  [1, 2, 3, 4].forEach(s => {
    document.getElementById('step' + s)?.classList.toggle('hidden', s !== n);
    const dot = document.getElementById('dot' + s);
    if (!dot) return;
    if (s < n) {
      dot.className = 'w-7 h-7 bg-gold/30 text-gold/60 flex items-center justify-center text-[11px]';
      dot.textContent = '✓';
    } else if (s === n) {
      dot.className = 'w-7 h-7 bg-gold text-ink flex items-center justify-center text-[11px] font-bold';
      dot.textContent = s === 4 ? '✓' : s;
    } else {
      dot.className = 'w-7 h-7 bg-s2 border border-gold/20 text-ivory/30 flex items-center justify-center text-[11px]';
      dot.textContent = s;
    }
  });
  if (n === 3) {
    const el = document.getElementById('payAmt');
    if (el) el.textContent = `· ${cartTotal()} MAD`;
  }
  document.getElementById('payBox')?.scrollTo(0, 0);
}

function renderPayRecap() {
  const items = document.getElementById('payCartItems');
  const none = document.getElementById('noPayCart');
  if (!items) return;
  if (!cart.length) {
    items.classList.add('hidden');
    none.classList.remove('hidden');
    document.getElementById('pTot').textContent = '0 MAD';
    return;
  }
  none.classList.add('hidden');
  items.classList.remove('hidden');
  items.innerHTML = cart.map(it => `
    <div class="flex justify-between items-center py-2.5">
      <div class="flex-1">
        <div class="text-[12px] text-ivory">${it.name}</div>
        <div class="text-[10px] text-ivory/30">× ${it.qty} · ${it.price} MAD/u</div>
      </div>
      <span class="text-[13px] text-gold shrink-0 font-medium">${it.price * it.qty} MAD</span>
    </div>`).join('');
  document.getElementById('pTot').textContent = `${cartTotal()} MAD`;
}

// ── Step 2 Validation ────────────────────────────────────────────
function validateStep2() {
  const prenom = document.getElementById('f_prenom').value.trim();
  const nom = document.getElementById('f_nom').value.trim();
  const email = document.getElementById('f_email').value.trim();
  const tel = document.getElementById('f_tel').value.trim();
  if (!prenom || !nom || !email || !tel)
    return toast('⚠', 'Champs obligatoires', 'Veuillez remplir tous les champs requis.');
  if (!/\S+@\S+\.\S+/.test(email))
    return toast('⚠', 'Email invalide', 'Veuillez entrer un email valide.');
  goStep(3);
}

// ── Select Payment Method ────────────────────────────────────────
function selectPay(m) {
  ['card', 'cash', 'mobile'].forEach(p => {
    const el = document.getElementById('pm-' + p);
    if (!el) return;
    el.classList.remove('bg-gold/10', 'border-gold/50');
    el.classList.add('bg-s2', 'border-gold/[.1]');
    el.querySelector('span').className = 'text-[9px] tracking-wide uppercase text-ivory/35';
    el.querySelector('svg').className = 'w-6 h-6 text-ivory/35';
  });
  const sel = document.getElementById('pm-' + m);
  if (sel) {
    sel.classList.remove('bg-s2', 'border-gold/[.1]');
    sel.classList.add('bg-gold/10', 'border-gold/50');
    sel.querySelector('span').className = 'text-[9px] tracking-wide uppercase text-gold';
    sel.querySelector('svg').className = 'w-6 h-6 text-gold';
  }
  document.getElementById('cardForm')?.classList.toggle('hidden', m !== 'card');
  document.getElementById('cashMsg')?.classList.toggle('hidden', m !== 'cash');
  document.getElementById('mobileMsg')?.classList.toggle('hidden', m !== 'mobile');
}

// ── CSRF helper ──────────────────────────────────────────────────
function csrfToken() {
  return document.querySelector('meta[name="csrf-token"]')?.content
    || document.querySelector('input[name="_token"]')?.value
    || '';
}

// ── Button state helpers ─────────────────────────────────────────
function setBtnLoading(btn) {
  if (!btn) return;
  btn.disabled = true;
  btn.innerHTML = `
    <svg class="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24">
      <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
      <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path>
    </svg>&nbsp;Traitement…`;
}

function resetBtn(btn) {
  if (!btn) return;
  btn.disabled = false;
  btn.innerHTML = `Payer maintenant
    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
    </svg>`;
}

async function confirmPay() {
  const payMethod = document.querySelector('input[name="pay"]:checked')?.value || 'card';
  const btn = document.getElementById('payBtn');

  setBtnLoading(btn);

  const payload = {
    prenom: document.getElementById('f_prenom').value.trim(),
    nom: document.getElementById('f_nom').value.trim(),
    email: document.getElementById('f_email').value.trim(),
    telephone: document.getElementById('f_tel').value.trim(),
    notes: document.getElementById('f_notes')?.value || '',
    payment_method: payMethod,
    items: cart.map(i => ({
      id: i.id,
      price: i.price,
      qty: i.qty
    }))
  };

  try {
    // ───── CARD FLOW ─────
    if (payMethod === 'card') {
      // 1. Create Stripe PaymentIntent
      const resIntent = await fetch('/order/payment-intent', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': csrfToken(),
          'Accept': 'application/json'
        },
        body: JSON.stringify(payload)
      });

      const dataIntent = await resIntent.json();
      if (!dataIntent.success) throw new Error(dataIntent.message || 'Erreur création paiement');

      // 2. Confirm payment
      const { error, paymentIntent } = await stripe.confirmCardPayment(dataIntent.clientSecret, {
        payment_method: {
          card: cardEl,
          billing_details: { name: payload.prenom + ' ' + payload.nom }
        }
      });

      if (error) throw new Error(error.message);

      payload.stripe_payment_intent = paymentIntent.id;
    }

    // ───── SAVE ORDER ─────
    const resOrder = await fetch('/order/store', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': csrfToken(),
        'Accept': 'application/json'
      },
      body: JSON.stringify(payload)
    });

    const dataOrder = await resOrder.json();

    if (!dataOrder.success) throw new Error(dataOrder.message || 'Erreur lors de la commande');

    alert("✅ Commande passée : " + dataOrder.order_ref);

  } catch (e) {
    console.error(e);
    alert(e.message);
  } finally {
    resetBtn(btn);
  }
}

function setOrderRef(ref) {
  const el = document.getElementById('orderRefNum');
  if (el) el.textContent = ref || ('#LM-2025-' + String(Math.floor(Math.random() * 9000) + 1000));
}

// ── Toast ────────────────────────────────────────────────────────
let toastTimer;
function toast(icon, title, sub) {
  clearTimeout(toastTimer);
  const t = document.getElementById('toast');
  if (!t) return;
  document.getElementById('tIcon').textContent = icon;
  document.getElementById('tTitle').textContent = title;
  document.getElementById('tSub').textContent = sub;
  t.classList.remove('hidden');
  t.classList.add('flex');
  toastTimer = setTimeout(() => {
    t.classList.add('hidden');
    t.classList.remove('flex');
  }, 3200);
}

// ── Scroll reveal ────────────────────────────────────────────────
const revealObserver = new IntersectionObserver(entries => {
  entries.forEach(e => { if (e.isIntersecting) e.target.classList.add('visible'); });
}, { threshold: 0.1 });
document.querySelectorAll('.reveal').forEach(el => revealObserver.observe(el));

// ── Custom cursor ────────────────────────────────────────────────
document.addEventListener('mousemove', e => {
  const c = document.getElementById('cursor');
  if (c) { c.style.left = e.clientX + 'px'; c.style.top = e.clientY + 'px'; }
});

// ── Init ─────────────────────────────────────────────────────────
applyFilters();

// Stripe public key (publishable — safe to be here)
// Secret key stays in .env as STRIPE_KEY / STRIPE_SECRET
const stripe = Stripe('pk_test_51TIvanRtuUXIHoAkSaFhpgFWwGByA6hPWEBhFNWfqTx04hHRH9SVrGO0yUMfanNntAVKiG4J6JJZqXvOvRbWkMrL00vIVIUkeQ');
const elements = stripe.elements();
const cardEl = elements.create('card', {
  style: {
    base: {
      color: '#F7F2EA',
      fontFamily: '"DM Sans", sans-serif',
      fontSize: '13px',
      '::placeholder': { color: 'rgba(247,242,234,0.2)' }
    },
    invalid: { color: '#C87E8A' }
  }
});
cardEl.mount('#card-element');

// Show Stripe validation errors in real time
cardEl.on('change', ({ error }) => {
  const el = document.getElementById('card-errors');
  if (el) el.textContent = error ? error.message : '';
});