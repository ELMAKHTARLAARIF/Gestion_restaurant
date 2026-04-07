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

// reservation



var cart = {};

/* ── Toggle order panel ── */
window.toggleOrderSection = function() {
  var sec  = document.getElementById('orderSection');
  var icon = document.getElementById('toggleIcon');
  var lbl  = document.getElementById('toggleLabel');

  if (sec.style.display === 'none') {
    sec.style.display = 'block';
    icon.textContent = '−';
    lbl.textContent  = 'Retirer la commande';
  } else {
    sec.style.display = 'none';
    icon.textContent = '+';
    lbl.textContent  = 'Ajouter une commande';
    cart = {};
    renderCart();
  }
}

/* ── Category tabs ── */
window.showCat = function(cat) {
  ['entrees', 'plats', 'desserts'].forEach(function(c) {
    var panel = document.getElementById('cat-' + c);
    var tab   = document.getElementById('tab-' + c);
    if (c === cat) {
      panel.style.display = 'flex';
      tab.style.color = '#C8A96E';
      tab.style.borderBottomColor = '#C8A96E';
    } else {
      panel.style.display = 'none';
      tab.style.color = 'rgba(240,234,214,.35)';
      tab.style.borderBottomColor = 'transparent';
    }
  });
}

document.addEventListener('click', function(e) {
  var btn = e.target.closest('.btn-add-item');
  if (!btn) return;

  var name  = btn.getAttribute('data-name');   /* browser already decoded &#039; → ' */
  var price = parseFloat(btn.getAttribute('data-price'));
  if (!name || isNaN(price)) return;

  if (cart[name]) {
    cart[name].qty++;
  } else {
    cart[name] = { price: price, qty: 1 };
  }
  renderCart();
});

/* ── Remove / decrement item ── */
window.removeItem = function(key) {
  if (!cart[key]) return;
  cart[key].qty--;
  if (cart[key].qty <= 0) delete cart[key];
  renderCart();
}

/* ── Render cart ── */
function renderCart() {
  var keys    = Object.keys(cart);
  var summary = document.getElementById('cartSummary');
  var itemsEl = document.getElementById('cartItems');

  if (keys.length === 0) {
    summary.style.display = 'none';
    document.getElementById('preOrderData').value = '';
    updateSubmitBtn();
    return;
  }

  summary.style.display = 'block';
  itemsEl.innerHTML = '';
  var sub = 0;

  keys.forEach(function(name) {
    var item = cart[name];
    sub += item.price * item.qty;

    /* Store name as a data attribute on the button to avoid JS string escaping */
    var row = document.createElement('div');
    row.style.cssText = 'display:flex; justify-content:space-between; align-items:center;';

    var removeBtn = document.createElement('button');
    removeBtn.type = 'button';
    removeBtn.setAttribute('data-remove', name);
    removeBtn.style.cssText = 'width:20px; height:20px; border:1px solid rgba(200,169,110,.25); background:transparent; color:#C8A96E; font-size:14px; line-height:1; cursor:pointer; flex-shrink:0;';
    removeBtn.textContent = '−';

    var label = document.createElement('span');
    label.style.cssText = 'font-size:12px; color:rgba(240,234,214,.75); margin-left:8px; flex:1;';
    label.textContent = item.qty + '× ' + name;

    var price = document.createElement('span');
    price.style.cssText = 'font-size:13px; color:#C8A96E; flex-shrink:0;';
    price.textContent = (item.price * item.qty).toFixed(0) + ' MAD';

    var left = document.createElement('div');
    left.style.cssText = 'display:flex; align-items:center;';
    left.appendChild(removeBtn);
    left.appendChild(label);

    row.appendChild(left);
    row.appendChild(price);
    itemsEl.appendChild(row);
  });

  var svc   = Math.round(sub * 0.1);
  var total = sub + svc;

  document.getElementById('subTotal').textContent   = sub.toFixed(0) + ' MAD';
  document.getElementById('svcTotal').textContent   = svc + ' MAD';
  document.getElementById('grandTotal').textContent = total.toFixed(0) + ' MAD';

  document.getElementById('preOrderData').value = JSON.stringify(
    keys.map(function(k) {
      return { name: k, price: cart[k].price, qty: cart[k].qty };
    })
  );

  updateSubmitBtn();
}

/* ── Remove button also via event delegation ── */
document.addEventListener('click', function(e) {
  var btn = e.target.closest('[data-remove]');
  if (!btn) return;
  removeItem(btn.getAttribute('data-remove'));
});

/* ── Update submit button label ── */
function updateSubmitBtn() {
  var sec = document.getElementById('orderSection');
  var btn = document.getElementById('submitBtn');
  if (sec.style.display !== 'none' && Object.keys(cart).length > 0) {
    btn.textContent = 'Confirmer la réservation & la commande';
  } else {
    btn.textContent = 'Confirmer la réservation';
  }
}
