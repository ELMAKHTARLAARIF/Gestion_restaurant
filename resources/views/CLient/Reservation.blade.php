@include('DocHtml.StartDocHtml')
@include('Component.HomeHeader')

<main class="min-h-screen bg-dark text-cream" style="padding-top: 80px;">
  @include('Component.HandleMessages')

  <!-- Background atmosphere -->
  <div class="fixed inset-0 pointer-events-none" style="z-index:0">
    <div style="position:absolute;inset:0;background:radial-gradient(ellipse at 70% 20%,rgba(200,169,110,.05),transparent 60%)"></div>
    <div style="position:absolute;inset:0;background:radial-gradient(ellipse at 20% 80%,rgba(200,169,110,.03),transparent 50%)"></div>
  </div>

  <div class="relative" style="z-index:1">

    <!-- ── Page Header ── -->
    <section class="text-center py-20 px-6 border-b border-gold/[.08]">
      <span class="inline-block text-[9px] tracking-[.45em] uppercase text-gold border border-gold/25 px-5 py-1.5 mb-7">La Maison · Casablanca</span>
      <h1 class="font-display font-light leading-tight mb-5" style="font-size:clamp(3rem,8vw,6rem)">
        Réserver une <em class="italic text-gold">table</em>
      </h1>
      <div class="flex items-center justify-center gap-5">
        <div class="h-px w-12 bg-gold/30"></div>
        <p class="text-[11px] tracking-[.2em] text-cream/35 uppercase">Une expérience gastronomique d'exception</p>
        <div class="h-px w-12 bg-gold/30"></div>
      </div>
    </section>

    <!-- ── Main Content ── -->
    <div class="max-w-6xl mx-auto px-6 py-16 grid lg:grid-cols-5 gap-0">

      <!-- Left: Info panel -->
      <div class="lg:col-span-2 pr-0 lg:pr-12 mb-12 lg:mb-0 border-b lg:border-b-0 lg:border-r border-gold/[.08] pb-12 lg:pb-0">

        <h2 class="font-display font-light text-2xl mb-8">Informations <em class="italic text-gold">pratiques</em></h2>

        <div class="flex flex-col gap-8">
          <!-- Hours -->
          <div class="flex gap-4">
            <div class="w-8 h-8 border border-gold/20 flex items-center justify-center shrink-0 mt-0.5">
              <svg class="w-3.5 h-3.5 fill-gold" viewBox="0 0 24 24">
                <path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67V7z" />
              </svg>
            </div>
            <div>
              <div class="text-[10px] tracking-[.25em] uppercase text-gold mb-1.5">Horaires</div>
              <div class="text-[13px] text-cream/60 leading-relaxed">Mardi – Samedi<br>Déjeuner · 12h00 – 15h00<br>Dîner · 19h00 – 23h00</div>
            </div>
          </div>

          <!-- Address -->
          <div class="flex gap-4">
            <div class="w-8 h-8 border border-gold/20 flex items-center justify-center shrink-0 mt-0.5">
              <svg class="w-3.5 h-3.5 fill-gold" viewBox="0 0 24 24">
                <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5-2.5 1.12-2.5 2.5 1.12 2.5 2.5 2.5z" />
              </svg>
            </div>
            <div>
              <div class="text-[10px] tracking-[.25em] uppercase text-gold mb-1.5">Adresse</div>
              <div class="text-[13px] text-cream/60 leading-relaxed">15 Avenue des Arts<br>Casablanca, Maroc</div>
            </div>
          </div>

          <!-- Phone -->
          <div class="flex gap-4">
            <div class="w-8 h-8 border border-gold/20 flex items-center justify-center shrink-0 mt-0.5">
              <svg class="w-3.5 h-3.5 fill-gold" viewBox="0 0 24 24">
                <path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z" />
              </svg>
            </div>
            <div>
              <div class="text-[10px] tracking-[.25em] uppercase text-gold mb-1.5">Téléphone</div>
              <div class="text-[13px] text-cream/60">+212 522 000 000</div>
            </div>
          </div>
        </div>

        <!-- Divider -->
        <div class="h-px bg-gold/[.08] my-10"></div>

        <!-- Policy note -->
        <div class="bg-s2 border border-gold/[.08] p-5">
          <div class="text-[9px] tracking-[.3em] uppercase text-gold mb-3">Politique de réservation</div>
          <ul class="flex flex-col gap-2">
            <li class="flex items-start gap-2 text-[12px] text-cream/45 leading-relaxed">
              <span class="text-gold mt-0.5">·</span> Confirmation par email sous 24h
            </li>
            <li class="flex items-start gap-2 text-[12px] text-cream/45 leading-relaxed">
              <span class="text-gold mt-0.5">·</span> Annulation gratuite jusqu'à 24h avant
            </li>
            <li class="flex items-start gap-2 text-[12px] text-cream/45 leading-relaxed">
              <span class="text-gold mt-0.5">·</span> Table maintenue 15 minutes après l'heure
            </li>
            <li class="flex items-start gap-2 text-[12px] text-cream/45 leading-relaxed">
              <span class="text-gold mt-0.5">·</span> Pour + de 8 personnes, contactez-nous
            </li>
          </ul>
        </div>
      </div>

      <!-- Right: Form -->
      <div class="lg:col-span-3 lg:pl-12">
        <form method="POST" action="{{ route('reservation_create') }}" class="flex flex-col gap-6" id="reservationForm">
          @csrf

          <!-- Hidden field to carry serialized pre-order cart -->
          <input type="hidden" name="pre_order" id="preOrderData" value="" />

          <!-- Name row -->
          <div class="grid grid-cols-2 gap-4">
            <div>
              <label class="block text-[9px] tracking-[.2em] uppercase text-cream/30 mb-2">Prénom *</label>
              <input name="name" type="text" placeholder="Ahmed"
                class="w-full bg-s2 border border-gold/[.12] px-4 py-3.5 text-[13px] text-cream placeholder-cream/20 font-body transition-colors focus:outline-none focus:border-gold/50"
                required />
            </div>
            <div>
              <label class="block text-[9px] tracking-[.2em] uppercase text-cream/30 mb-2">Nom *</label>
              <input name="lastName" type="text" placeholder="Benali"
                class="w-full bg-s2 border border-gold/[.12] px-4 py-3.5 text-[13px] text-cream placeholder-cream/20 font-body transition-colors focus:outline-none focus:border-gold/50"
                required />
            </div>
          </div>

          <!-- Phone -->
          <div>
            <label class="block text-[9px] tracking-[.2em] uppercase text-cream/30 mb-2">Téléphone *</label>
            <input name="telephone" type="tel" placeholder="+212 6XX XXX XXX"
              class="w-full bg-s2 border border-gold/[.12] px-4 py-3.5 text-[13px] text-cream placeholder-cream/20 font-body transition-colors focus:outline-none focus:border-gold/50"
              required />
          </div>

          <!-- Date & Time -->
          <div class="grid grid-cols-2 gap-4">
            <div>
              <label class="block text-[9px] tracking-[.2em] uppercase text-cream/30 mb-2">Date *</label>
              <input name="reservationDate" type="date"
                class="w-full bg-s2 border border-gold/[.12] px-4 py-3.5 text-[13px] text-cream font-body transition-colors focus:outline-none focus:border-gold/50"
                required />
            </div>
            <div>
              <label class="block text-[9px] tracking-[.2em] uppercase text-cream/30 mb-2">Heure *</label>
              <select name="Hour"
                class="w-full bg-s2 border border-gold/[.12] px-4 py-3.5 text-[13px] text-cream font-body cursor-pointer focus:outline-none focus:border-gold/50"
                required>
                <option class="bg-s2">12:00</option>
                <option class="bg-s2">12:30</option>
                <option class="bg-s2">13:00</option>
                <option class="bg-s2">13:30</option>
                <option class="bg-s2">19:00</option>
                <option class="bg-s2">19:30</option>
                <option class="bg-s2">20:00</option>
                <option class="bg-s2">20:30</option>
                <option class="bg-s2">21:00</option>
              </select>
            </div>
          </div>

          <!-- Guests & Table -->
          <div class="grid grid-cols-2 gap-4">
            <div>
              <label class="block text-[9px] tracking-[.2em] uppercase text-cream/30 mb-2">Personnes *</label>
              <select name="numberOfPeaple"
                class="w-full bg-s2 border border-gold/[.12] px-4 py-3.5 text-[13px] text-cream font-body cursor-pointer focus:outline-none focus:border-gold/50"
                required>
                @for($i=1; $i<=10; $i++)
                  <option class="bg-s2">{{ $i }}</option>
                  @endfor
              </select>
            </div>
            <div>
              <label class="block text-[9px] tracking-[.2em] uppercase text-cream/30 mb-2">Numéro de table *</label>
              <select name="tableNumber"
                class="w-full bg-s2 border border-gold/[.12] px-4 py-3.5 text-[13px] text-cream font-body cursor-pointer focus:outline-none focus:border-gold/50"
                required>
                @for($i=1; $i<=10; $i++)
                  <option class="bg-s2">{{ $i }}</option>
                  @endfor
              </select>
            </div>
          </div>

          <!-- Notes -->
          <div>
            <label class="block text-[9px] tracking-[.2em] uppercase text-cream/30 mb-2">Notes & demandes spéciales</label>
            <textarea name="notes" rows="3"
              placeholder="Allergies, préférences, occasion spéciale…"
              class="w-full bg-s2 border border-gold/[.12] px-4 py-3.5 text-[13px] text-cream placeholder-cream/20 font-body transition-colors focus:outline-none focus:border-gold/50 resize-y"></textarea>
          </div>

          <!-- Divider -->
          <div class="h-px bg-gold/[.08]"></div>

          <!-- ── Optional Pre-Order Section ── -->
          <div>
            <div class="flex items-center justify-between mb-3">
              <div>
                <div class="text-[9px] tracking-[.2em] uppercase text-cream/25 mb-1">Optionnel</div>
                <div class="font-display text-lg font-light">Pré-commander des <em class="italic text-gold">plats</em></div>
              </div>
              <button type="button" id="orderToggle" onclick="toggleOrderSection()"
                class="flex items-center gap-2 border border-gold/25 text-gold text-[10px] tracking-[.2em] uppercase px-4 py-2.5 bg-transparent cursor-pointer transition-all hover:bg-gold/[.07]">
                <span id="toggleIcon" class="text-base leading-none">+</span>
                <span id="toggleLabel">Ajouter une commande</span>
              </button>
            </div>
            <p class="text-[11px] text-cream/25">Sélectionnez vos plats à l'avance — nous les préparerons pour votre arrivée.</p>
          </div>


          <div id="orderSection" style="display:none;" class="bg-s2 border border-gold/[.08] p-5">

            <div class="text-[9px] tracking-[.3em] uppercase text-gold mb-4">Carte du restaurant</div>

            <!-- Category tabs -->
            <div class="flex border-b border-gold/[.08] mb-5">
              <button type="button" onclick="showCat('entrees')" id="tab-entrees"
                class="bg-transparent border-none text-[10px] tracking-[.2em] uppercase px-4 py-2 cursor-pointer"
                style="color:#C8A96E; border-bottom:2px solid #C8A96E;">
                Entrées
              </button>
              <button type="button" onclick="showCat('plats')" id="tab-plats"
                class="bg-transparent border-none text-[10px] tracking-[.2em] uppercase px-4 py-2 cursor-pointer"
                style="color:rgba(240,234,214,.35); border-bottom:2px solid transparent;">
                Plats
              </button>
              <button type="button" onclick="showCat('desserts')" id="tab-desserts"
                class="bg-transparent border-none text-[10px] tracking-[.2em] uppercase px-4 py-2 cursor-pointer"
                style="color:rgba(240,234,214,.35); border-bottom:2px solid transparent;">
                Desserts
              </button>
            </div>


            <!-- Entrées -->
            <div id="cat-entrees" style="display:flex; flex-direction:column; gap:12px;">
              @foreach($items as $item)
              <div style="display:flex; align-items:center; justify-content:space-between; padding:10px 0; border-bottom:1px solid rgba(200,169,110,.05);">
                <input type="hidden" name="menu_items[]" value="{{ $item['id'] }}" />
                <div>
                  <div class="text-[13px] text-cream">{{ $item['name'] }}</div>
                  <div class="text-[11px] text-cream/35">{{ $item['description'] }}</div>
                </div>
                <div style="display:flex; align-items:center; gap:12px; flex-shrink:0; margin-left:16px;">
                  <span class="text-[12px] text-gold">{{ $item['prix'] }} MAD</span>

                  <button type="button"
                    class="btn-add-item"
                    data-id="{{ $item['id'] }}"
                    data-name="{{ $item['name'] }}"
                    data-price="{{ $item['prix'] }}">
                    +
                  </button>
                </div>
              </div>
              @endforeach
            </div>



            <div id="cartSummary" style="display:none; margin-top:20px; border-top:1px solid rgba(200,169,110,.1); padding-top:16px;">

              <!-- Selected items -->
              <div id="cartItems" style="display:flex; flex-direction:column; gap:10px; margin-bottom:15px;"></div>

              <!-- Total -->
              <div style="display:flex; justify-content:space-between; align-items:center; background:rgba(200,169,110,.07); border:1px solid rgba(200,169,110,.2); padding:14px 16px;">
                <span style="font-size:10px; letter-spacing:.25em; text-transform:uppercase; color:#C8A96E;">Total estimé</span>
                <span id="grandTotal" style="font-size:24px; font-weight:300; color:#C8A96E;">0 MAD</span>
              </div>

            </div>
            <!-- ── End Optional Pre-Order ── -->
          </div>
          <!-- Divider -->
          <div class="h-px bg-gold/[.08]"></div>

          <!-- Submit -->
          <button type="submit" id="submitBtn"
            class="w-full py-4 bg-gold text-dark text-[11px] tracking-[.18em] uppercase font-semibold hover:bg-gold-h transition-all border-0 cursor-pointer">
            Confirmer la réservation
          </button>

          <p class="text-[10px] text-cream/20 text-center tracking-wide">
            Confirmation par email · Annulation gratuite 24h avant
          </p>
        </form>
      </div>

    </div>
  </div>
</main>
@include('Component.footer')
@include('DocHtml.EndDocHtml')

<script>
  let cart = {};
  let total = 0;

  /* ── Toggle order section ── */
  function toggleOrderSection() {
    let sec = document.getElementById('orderSection');
    let icon = document.getElementById('toggleIcon');
    let lbl = document.getElementById('toggleLabel');

    if (sec.style.display === 'none') {
      sec.style.display = 'block';
      icon.textContent = '−';
      lbl.textContent = 'Retirer la commande';
    } else {
      sec.style.display = 'none';
      icon.textContent = '+';
      lbl.textContent = 'Ajouter une commande';

      cart = {};
      updateCart();
    }
  }

  /* ── Category tabs ── */
  function showCat(cat) {
    ['entrees', 'plats', 'desserts'].forEach(c => {
      let panel = document.getElementById('cat-' + c);
      let tab = document.getElementById('tab-' + c);

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

  /* ── Add item ── */
  document.addEventListener('click', function(e) {
    let btn = e.target.closest('.btn-add-item');
    if (!btn) return;

    let id = btn.dataset.id;
    let name = btn.dataset.name;
    let price = parseFloat(btn.dataset.price);

    if (cart[id]) {
      cart[id].quantity++;
    } else {
      cart[id] = {
        id,
        name,
        price,
        quantity: 1
      };
    }

    updateCart();
  });

  /* ── Change quantity ── */
  function changeQty(id, delta) {
    if (!cart[id]) return;

    cart[id].quantity += delta;

    if (cart[id].quantity <= 0) {
      delete cart[id];
    }

    updateCart();
  }

  /* ── Render cart ── */
  function renderCart() {
    let container = document.getElementById('cartItems');
    container.innerHTML = '';

    Object.values(cart).forEach(item => {
      let div = document.createElement('div');

      div.style.display = 'flex';
      div.style.justifyContent = 'space-between';
      div.style.alignItems = 'center';
      div.style.borderBottom = '1px solid rgba(200,169,110,.05)';
      div.style.padding = '8px 0';

      div.innerHTML = `
      <div>
        <div style="font-size:13px; color:#F0EAD6;">${item.name}</div>
        <div style="font-size:11px; color:rgba(240,234,214,.4);">
          ${item.price} MAD × ${item.quantity}
        </div>
      </div>

      <div style="display:flex; align-items:center; gap:8px;">
        <button onclick="changeQty('${item.id}', -1)"
          style="width:24px;height:24px;border:1px solid #C8A96E;color:#C8A96E;background:none;cursor:pointer;">−</button>

        <span style="font-size:12px;color:#C8A96E;">${item.quantity}</span>

        <button onclick="changeQty('${item.id}', 1)"
          style="width:24px;height:24px;border:1px solid #C8A96E;color:#C8A96E;background:none;cursor:pointer;">+</button>
      </div>
    `;

      container.appendChild(div);
    });
  }

  /* ── Calculate total ── */
  function calculateTotal() {
    total = 0;

    Object.values(cart).forEach(item => {
      total += item.price * item.quantity;
    });

    document.getElementById('grandTotal').innerText =
      total.toFixed(2) + ' MAD';
  }

  /* ── Send to Laravel ── */
  function updateHiddenInput() {
    document.getElementById('preOrderData').value =
      JSON.stringify(cart);
  }

  /* ── Show cart ── */
  function toggleCartSummary() {
    let box = document.getElementById('cartSummary');

    if (Object.keys(cart).length > 0) {
      box.style.display = 'block';
    } else {
      box.style.display = 'none';
    }
  }

  /* ── Update button ── */
  function updateSubmitBtn() {
    let btn = document.getElementById('submitBtn');

    if (Object.keys(cart).length > 0) {
      btn.textContent = 'Confirmer la réservation & la commande';
    } else {
      btn.textContent = 'Confirmer la réservation';
    }
  }

  /* ── Global update ── */
  function updateCart() {
    renderCart();
    calculateTotal();
    updateHiddenInput();
    toggleCartSummary();
    updateSubmitBtn();
  }
</script>