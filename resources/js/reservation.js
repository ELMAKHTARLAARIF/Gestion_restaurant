


var cart = {};

/* ── Toggle order panel ── */
function toggleOrderSection() {
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
function showCat(cat) {
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
function removeItem(key) {
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
