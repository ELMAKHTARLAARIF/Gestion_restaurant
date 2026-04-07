const cur = document.getElementById('cursor');
document.addEventListener('mousemove', e => {
  cur.style.left = e.clientX + 'px';
  cur.style.top = e.clientY + 'px';
});
document.querySelectorAll('a,button,[onclick]').forEach(el => {
  el.addEventListener('mouseenter', () => cur.classList.add('big'));
  el.addEventListener('mouseleave', () => cur.classList.remove('big'));
});

// ── Compute total: sum of (price × qty) for all items ──
function cartTotal() {
  return cart.reduce((sum, i) => sum + i.price * i.qty, 0);
}

// ── Filter / Search / Sort ──
let activeFilter = 'all';
const allProds = () => Array.from(document.querySelectorAll('.prod'));

window.setFilter = function(cat, btn) {
  activeFilter = cat;
  document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('on'));
  btn.classList.add('on');
  applyFilters();
}

function applyFilters() {
  const q = document.getElementById('searchBox')?.value.toLowerCase() || '';
  let vis = 0;
  allProds().forEach(p => {
    const catOk = activeFilter === 'all' || p.dataset.cat === activeFilter;
    const nameOk = p.dataset.name.toLowerCase().includes(q);
    const show = catOk && nameOk;
    p.style.display = show ? '' : 'none';
    if (show) vis++;
  });
  document.getElementById('itemCount').textContent =
    `${vis} plat${vis > 1 ? 's' : ''} affiché${vis > 1 ? 's' : ''}`;
  document.getElementById('emptyState').classList.toggle('hidden', vis > 0);
  document.getElementById('productsGrid').style.display = vis === 0 ? 'none' : '';
}

window.applySort = function(v) {
  const grid = document.getElementById('productsGrid');
  const items = [...grid.querySelectorAll('.prod')];
  items.sort((a, b) => {
    if (v === 'price-asc')  return +a.dataset.price - +b.dataset.price;
    if (v === 'price-desc') return +b.dataset.price - +a.dataset.price;
    if (v === 'name')       return a.dataset.name.localeCompare(b.dataset.name);
    return 0;
  });
  items.forEach(i => grid.appendChild(i));
}

// ── Cart state ──
let cart = [];

window.addToCart = function(card) {
  const id    = card.dataset.id;
  const name  = card.dataset.name;
  const price = +card.dataset.price;
  const ex    = cart.find(i => i.id === id);
  if (ex) ex.qty++;
  else cart.push({ id, name, price, qty: 1 });
  renderAll();
  showCartFab();
  window.toast?.('🍽', name, `Ajouté · ${price} MAD`);
}

function rmItem(idx) {
  cart.splice(idx, 1);
  renderAll();
  showCartFab();
}

window.chg = function(idx, delta) {
  cart[idx].qty += delta;
  if (cart[idx].qty <= 0) rmItem(idx);
  else renderAll();
}

window.clearCart = function() {
  cart = [];
  renderAll();
  showCartFab();
}

// ── Render ──
function renderAll() {
  renderStickyCart();
  renderDrawerCart();
  updateBadge();
}

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

function renderStickyCart() {
  const list    = document.getElementById('sCartList');
  const empty   = document.getElementById('sEmptyMsg');
  const summary = document.getElementById('sCartSummary');

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
  const list  = document.getElementById('dCartList');
  const empty = document.getElementById('dEmptyMsg');
  const foot  = document.getElementById('dCartFoot');

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
  const n  = cart.reduce((a, i) => a + i.qty, 0);
  const b  = document.getElementById('cartCount');
  const fb = document.getElementById('fabBadge');
  if (n > 0) {
    b.textContent = n;
    b.classList.remove('hidden');
    b.classList.add('flex');
    fb.textContent = n;
  } else {
    b.classList.add('hidden');
    b.classList.remove('flex');
  }
  document.getElementById('sCartCount').textContent = n || 0;
}

function showCartFab() {
  const fab = document.getElementById('cartFab');
  fab.classList.toggle('hidden', cart.length === 0);
  fab.classList.toggle('flex',   cart.length > 0);
}

// ── Cart drawer ──
window.openCart = function() {
  document.getElementById('cartDrawer').classList.add('open');
  document.getElementById('cartBg').classList.remove('hidden');
  document.body.style.overflow = 'hidden';
}

window.closeCart = function() {
  document.getElementById('cartDrawer').classList.remove('open');
  document.getElementById('cartBg').classList.add('hidden');
  document.body.style.overflow = '';
}

// ── Payment modal ──
let curStep = 1;

window.openPayModal = function() {
  if (cart.length === 0) {
    window.toast?.('⚠️', 'Panier vide', 'Ajoutez des plats avant de payer.');
    return;
  }
  renderPayRecap();
  document.getElementById('payModal').classList.remove('hidden');
  document.body.style.overflow = 'hidden';
  window.closeCart?.();
  window.goStep(1);
}

window.closePayModal = function() {
  document.getElementById('payModal').classList.add('hidden');
  document.body.style.overflow = '';
}

window.goStep = function(n) {
  curStep = n;
  [1, 2, 3, 4].forEach(s => {
    document.getElementById('step' + s).classList.toggle('hidden', s !== n);
    const dot = document.getElementById('dot' + s);
    if (s < n) {
      dot.className = 'w-7 h-7 bg-gold/30 text-gold/60 flex items-center justify-center text-[11px] transition-all';
      dot.textContent = '✓';
    } else if (s === n) {
      dot.className = 'w-7 h-7 bg-gold text-ink flex items-center justify-center text-[11px] font-bold transition-all';
      dot.textContent = s === 4 ? '✓' : s;
    } else {
      dot.className = 'w-7 h-7 bg-s2 border border-gold/20 text-ivory/30 flex items-center justify-center text-[11px] transition-all';
      dot.textContent = s;
    }
  });

  if (n === 3) {
    document.getElementById('payAmt').textContent = `· ${cartTotal()} MAD`;
  }

  // Scroll modal to top on step change
  const box = document.getElementById('payBox');
  if (box) box.scrollTop = 0;
}

function renderPayRecap() {
  const items = document.getElementById('payCartItems');
  const none  = document.getElementById('noPayCart');

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

// ── Step 2 validation ──
window.validateStep2 = function() {
  const prenom = document.getElementById('f_prenom').value.trim();
  const nom    = document.getElementById('f_nom').value.trim();
  const email  = document.getElementById('f_email').value.trim();
  const tel    = document.getElementById('f_tel').value.trim();

  if (!prenom || !nom || !email || !tel) {
    window.toast?.('⚠', 'Champs obligatoires', 'Veuillez remplir tous les champs requis.');
    ['f_prenom','f_nom','f_email','f_tel'].forEach(id => {
      const el = document.getElementById(id);
      if (el && !el.value.trim()) {
        el.style.borderColor = 'rgba(200,126,138,0.6)';
        el.addEventListener('input', () => el.style.borderColor = '', { once: true });
      }
    });
    return;
  }
  if (!/\S+@\S+\.\S+/.test(email)) {
    window.toast?.('⚠', 'Email invalide', 'Veuillez entrer un email valide.');
    return;
  }
  window.goStep(3);
}

// ── Payment method toggle ──
window.selectPay = function(m) {
  ['card', 'cash', 'mobile'].forEach(p => {
    const el = document.getElementById('pm-' + p);
    el.classList.remove('bg-gold/10', 'border-gold/50');
    el.classList.add('bg-s2', 'border-gold/[.1]');
    el.querySelector('span').className = 'text-[9px] tracking-wide uppercase text-ivory/35';
    el.querySelector('svg').className  = 'w-6 h-6 text-ivory/35';
  });
  const sel = document.getElementById('pm-' + m);
  sel.classList.remove('bg-s2', 'border-gold/[.1]');
  sel.classList.add('bg-gold/10', 'border-gold/50');
  sel.querySelector('span').className = 'text-[9px] tracking-wide uppercase text-gold';
  sel.querySelector('svg').className  = 'w-6 h-6 text-gold';

  document.getElementById('cardForm').classList.toggle('hidden',  m !== 'card');
  document.getElementById('cashMsg').classList.toggle('hidden',   m !== 'cash');
  document.getElementById('mobileMsg').classList.toggle('hidden', m !== 'mobile');
}

// ── Confirm & submit ──
window.confirmPay = function() {
  const total     = cartTotal();
  const payMethod = document.querySelector('input[name="pay"]:checked')?.value || 'card';
  const mode      = document.querySelector('input[name="mode"]:checked')?.value || 'table';

  document.getElementById('hd_prenom').value     = document.getElementById('f_prenom').value.trim();
  document.getElementById('hd_nom').value        = document.getElementById('f_nom').value.trim();
  document.getElementById('hd_email').value      = document.getElementById('f_email').value.trim();
  document.getElementById('hd_tel').value        = document.getElementById('f_tel').value.trim();
  document.getElementById('hd_mode').value       = mode;
  document.getElementById('hd_notes').value      = document.getElementById('f_notes').value.trim();
  document.getElementById('hd_pay_method').value = payMethod;
  document.getElementById('hd_tot').value        = total;

  const itemsPayload = cart.map(it => ({
    id:          it.id,
    name:        it.name,
    quantity:    it.qty,
    unit_price:  it.price,
    total_price: it.price * it.qty,
  }));
  document.getElementById('hd_items').value = JSON.stringify(itemsPayload);

  window.goStep(4);
  const ref = '#LM-2025-' + String(Math.floor(Math.random() * 9000) + 1000);
  document.getElementById('orderRef').querySelector('.font-serif').textContent = ref;

  
setTimeout(async () => {

  try {
    const res = await fetch("{{ route('order.store') }}", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
        "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value
      },
      body: JSON.stringify({
        prenom: f_prenom.value,
        nom: f_nom.value,
        email: f_email.value,
        telephone: f_tel.value,
        notes: f_notes.value,
        payment_method: document.querySelector('input[name="pay"]:checked').value,
        total: cartTotal(),
        items: cart
      })
    });

    const data = await res.json();

    // ❌ VALIDATION ERROR (Laravel)
    if (!res.ok) {
      if (data.errors) {
        showLaravelErrors(data.errors);
        goStep(2); // go back to form
      }
      return;
    }

    // ✅ SUCCESS
    if (data.success) {
      goStep(4);

      // ✅ CLEAR CART ONLY AFTER SUCCESS
      cart = [];
      renderAll();
      showCartFab();
    }

  } catch (err) {
    window.toast?.(err, 'Erreur serveur', 'Réessayez plus tard');
  }

}, 2200);

}


////




// ── Formatters ──
window.fmtCard = function(el) {
  let v = el.value.replace(/\D/g, '').substring(0, 16);
  el.value = v.match(/.{1,4}/g)?.join(' ') || v;
}

window.fmtExp = function(el) {
  let v = el.value.replace(/\D/g, '').substring(0, 4);
  if (v.length >= 3) v = v.substring(0, 2) + ' / ' + v.substring(2);
  el.value = v;
}

window.toggleCvv = function() {
  const i = document.getElementById('cvvInp');
  i.type = i.type === 'password' ? 'text' : 'password';
}

// ── Toast ──
let toastTimer;
window.toast = function(icon, title, sub) {
  clearTimeout(toastTimer);
  const t = document.getElementById('toast');
  document.getElementById('tIcon').textContent  = icon;
  document.getElementById('tTitle').textContent = title;
  document.getElementById('tSub').textContent   = sub;
  t.classList.remove('hidden');
  t.classList.add('flex');
  toastTimer = setTimeout(() => {
    t.classList.add('hidden');
    t.classList.remove('flex');
  }, 3200);
}

// ── Intersection Observer (reveal animations) ──
const io = new IntersectionObserver(
  es => es.forEach(e => { if (e.isIntersecting) e.target.classList.add('on', 'visible'); }),
  { threshold: 0.1 }
);
document.querySelectorAll('.reveal,.reveal-l,.reveal-r').forEach(el => io.observe(el));

applyFilters();