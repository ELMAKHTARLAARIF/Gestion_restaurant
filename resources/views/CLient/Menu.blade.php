<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  {{-- REQUIRED for JS csrfToken() helper --}}
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Notre Carte · La Maison</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://js.stripe.com/v3/"></script>
  <link href="{{ asset('css/Menu.css') }}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,700;1,400;1,500&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet" />
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            gold: '#C9A96E', gh: '#dbbf8a', gd: 'rgba(201,169,110,0.10)',
            ink: '#0A0A0A', s1: '#101010', s2: '#181818', s3: '#202020',
            ivory: '#F7F2EA', sage: '#7EC8A0', rose: '#C87E8A', sky: '#7EAEC8',
          },
          fontFamily: {
            serif: ['"Playfair Display"', 'serif'],
            sans:  ['"DM Sans"', 'sans-serif'],
          },
          keyframes: {
            'fu':        { '0%': { opacity:'0', transform:'translateY(30px)' },  '100%': { opacity:'1', transform:'translateY(0)' } },
            'fi':        { '0%': { opacity:'0' }, '100%': { opacity:'1' } },
            'fl':        { '0%': { opacity:'0', transform:'translateX(-30px)' }, '100%': { opacity:'1', transform:'translateX(0)' } },
            'fr':        { '0%': { opacity:'0', transform:'translateX(30px)' },  '100%': { opacity:'1', transform:'translateX(0)' } },
            'shimmer':   { '0%': { backgroundPosition:'200% center' }, '100%': { backgroundPosition:'-200% center' } },
            'bob':       { '0%,100%': { transform:'translateY(0)' }, '50%': { transform:'translateY(-8px)' } },
            'slide-in':  { '0%': { transform:'translateX(100%)' }, '100%': { transform:'translateX(0)' } },
            'scale-in':  { '0%': { opacity:'0', transform:'scale(.96) translateY(12px)' }, '100%': { opacity:'1', transform:'scale(1) translateY(0)' } },
            'toast':     { '0%': { opacity:'0', transform:'translateY(16px) translateX(-50%)' }, '100%': { opacity:'1', transform:'translateY(0) translateX(-50%)' } },
            'spin-slow': { 'to': { transform:'rotate(360deg)' } },
            'pop':       { '0%': { transform:'scale(1)' }, '40%': { transform:'scale(1.25)' }, '100%': { transform:'scale(1)' } },
          },
          animation: {
            'fu':'fu .65s ease both','fu2':'fu .9s ease both','fi':'fi .5s ease both',
            'fl':'fl .65s ease both','fr':'fr .65s ease both',
            'shimmer':'shimmer 3.5s linear infinite','bob':'bob 3s ease-in-out infinite',
            'slide-in':'slide-in .38s cubic-bezier(.4,0,.2,1)',
            'scale-in':'scale-in .32s ease both','toast':'toast .38s ease both',
            'spin-slow':'spin-slow 18s linear infinite','pop':'pop .3s ease',
          },
        }
      }
    }
  </script>

  <style>
    .step-line::before { content:''; position:absolute; top:14px; left:14px; right:14px; height:1px; background:rgba(201,169,110,0.15); z-index:0; }
    .tab-btn.on { color:#C9A96E !important; border-bottom:1px solid #C9A96E; }
    .shine { position:relative; overflow:hidden; }
    .shine::after { content:''; position:absolute; top:-60%; left:-75%; width:50%; height:200%; background:linear-gradient(105deg,transparent 40%,rgba(201,169,110,0.06) 50%,transparent 60%); transform:skewX(-15deg); transition:left 0.7s ease; pointer-events:none; }
    .shine:hover::after { left:125%; }
    .card-line { border-left:2px solid transparent; transition:border-color 0.3s ease; }
    .card-line:hover { border-color:#C9A96E; }
    .img-z img { transition:transform 0.6s cubic-bezier(0.25,0.46,0.45,0.94),filter 0.5s ease; }
    .img-z:hover img { transform:scale(1.04); }
    .no-scrollbar::-webkit-scrollbar { display:none; }
    .no-scrollbar { -ms-overflow-style:none; scrollbar-width:none; }
    .cart-drawer { transform:translateX(100%); transition:transform 0.38s cubic-bezier(0.4,0,0.2,1); }
    .cart-drawer.open { transform:translateX(0); }
    .inp:focus { outline:none; border-color:rgba(201,169,110,0.45) !important; box-shadow:0 0 0 3px rgba(201,169,110,0.07); }
    .reveal { opacity:0; transform:translateY(22px); transition:opacity 0.55s ease,transform 0.55s ease; }
    .reveal.visible { opacity:1; transform:translateY(0); }
    .stg .reveal:nth-child(1)  { transition-delay:0.04s; }
    .stg .reveal:nth-child(2)  { transition-delay:0.10s; }
    .stg .reveal:nth-child(3)  { transition-delay:0.16s; }
    .stg .reveal:nth-child(4)  { transition-delay:0.22s; }
    .stg .reveal:nth-child(5)  { transition-delay:0.28s; }
    .stg .reveal:nth-child(6)  { transition-delay:0.34s; }
    .stg .reveal:nth-child(7)  { transition-delay:0.40s; }
    .stg .reveal:nth-child(8)  { transition-delay:0.46s; }
    .stg .reveal:nth-child(n+9){ transition-delay:0.50s; }
    #cursor { pointer-events:none; position:fixed; top:0; left:0; width:18px; height:18px; border:1px solid rgba(201,169,110,0.5); border-radius:50%; transform:translate(-50%,-50%); transition:transform 0.08s ease,width 0.2s ease,height 0.2s ease,background 0.2s ease; z-index:9999; mix-blend-mode:difference; }
    /* Stripe card element base styling */
    .StripeElement { padding: 12px 16px; }
    .StripeElement--focus { border-color: rgba(201,169,110,0.45) !important; box-shadow: 0 0 0 3px rgba(201,169,110,0.07); }
    .StripeElement--invalid { border-color: #C87E8A !important; }
  </style>
</head>

<body class="bg-ink text-ivory font-sans overflow-x-hidden" style="font-size:14px">

  <div id="cursor"></div>

  @include('Component.HomeHeader')

  <!-- ═══════════════════════════════════════════
       HERO
  ════════════════════════════════════════════ -->
  <section class="relative h-[52vh] min-h-[380px] flex items-end overflow-hidden">
    <div class="absolute inset-0">
      <img src="https://images.unsplash.com/photo-1414235077428-338989a2e8c0?w=1800&q=85"
           class="w-full h-full object-cover brightness-[.22]" style="animation:fu2 1s ease both" alt="" />
    </div>
    <div class="absolute inset-0 bg-gradient-to-r from-ink/80 via-ink/30 to-transparent"></div>
    <div class="absolute inset-0 bg-gradient-to-t from-ink via-transparent to-ink/30"></div>
    <div class="absolute right-[8%] top-[15%] w-72 h-72 border border-gold/[.07] rounded-full hidden xl:block" style="animation:spin-slow 18s linear infinite"></div>
    <div class="absolute right-[10.5%] top-[20%] w-52 h-52 border border-gold/[.05] rounded-full hidden xl:block" style="animation:spin-slow 28s linear infinite reverse"></div>
    <div class="relative px-8 lg:px-16 pb-14 w-full max-w-7xl mx-auto">
      <div class="animate-fl" style="animation-delay:.1s">
        <span class="inline-flex items-center gap-2 text-[10px] tracking-[.42em] uppercase text-gold border border-gold/25 px-4 py-1.5 mb-5">
          <span class="w-1.5 h-1.5 bg-gold rounded-full"></span>
          Casablanca · Carte saison 2025
        </span>
      </div>
      <h1 class="font-serif font-normal leading-tight animate-fl" style="font-size:clamp(3rem,8vw,6rem);animation-delay:.22s">
        Notre <em class="italic text-gold">Carte</em>
      </h1>
      <p class="text-[13px] text-ivory/45 max-w-md mt-4 leading-loose tracking-wide animate-fl" style="animation-delay:.34s">
        Des créations qui marient gastronomie française et saveurs marocaines. Tout est fait maison, chaque jour.
      </p>
    </div>
  </section>

  <!-- ═══════════════════════════════════════════
       STICKY FILTER BAR
  ════════════════════════════════════════════ -->
  <div id="filterBar" class="sticky top-[64px] z-40 bg-ink/97 backdrop-blur-md border-b border-gold/[.1]">
    <div class="max-w-7xl mx-auto px-6 lg:px-14 flex items-center gap-0 overflow-x-auto py-0 no-scrollbar">
      <div class="flex items-center border-r border-gold/[.1] pr-4 mr-4 gap-1 flex-shrink-0 py-3">
        <button onclick="setFilter('all',this)"      class="tab-btn on text-[10px] tracking-[.14em] uppercase px-4 py-2 transition-all text-ivory/45 hover:text-ivory whitespace-nowrap">Tous</button>
        <button onclick="setFilter('entrees',this)"  class="tab-btn text-[10px] tracking-[.14em] uppercase px-4 py-2 transition-all text-ivory/45 hover:text-ivory whitespace-nowrap">🥗 Entrées</button>
        <button onclick="setFilter('plats',this)"    class="tab-btn text-[10px] tracking-[.14em] uppercase px-4 py-2 transition-all text-ivory/45 hover:text-ivory whitespace-nowrap">🍖 Plats</button>
        <button onclick="setFilter('desserts',this)" class="tab-btn text-[10px] tracking-[.14em] uppercase px-4 py-2 transition-all text-ivory/45 hover:text-ivory whitespace-nowrap">🍮 Desserts</button>
        <button onclick="setFilter('boissons',this)" class="tab-btn text-[10px] tracking-[.14em] uppercase px-4 py-2 transition-all text-ivory/45 hover:text-ivory whitespace-nowrap">🍷 Boissons</button>
      </div>
      <div class="relative flex-shrink-0 py-2.5">
        <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-3.5 h-3.5 text-ivory/25" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
        </svg>
        <input id="searchBox" type="text" placeholder="Rechercher un plat…" oninput="applyFilters()"
          class="inp bg-s2 border border-gold/[.1] pl-8 pr-4 py-2 w-52 text-[12px] text-ivory placeholder-ivory/20 transition-all font-sans" />
      </div>
      <div class="flex-1"></div>
      <div class="flex-shrink-0 py-2.5">
        <select onchange="applySort(this.value)" class="inp bg-s2 border border-gold/[.1] px-3 py-2 text-[11px] text-ivory/50 font-sans cursor-pointer">
          <option value="default">Ordre par défaut</option>
          <option value="price-asc">Prix croissant</option>
          <option value="price-desc">Prix décroissant</option>
          <option value="name">Nom A→Z</option>
        </select>
      </div>
    </div>
    <div class="bg-s2 px-6 lg:px-14 py-1.5 flex items-center justify-between max-w-7xl mx-auto w-full">
      <span id="itemCount" class="text-[10px] text-ivory/25 tracking-wide">— plats affichés</span>
      <span class="text-[10px] text-ivory/20 tracking-wide hidden md:block">Cliquez sur un plat pour l'ajouter au panier</span>
    </div>
  </div>

  <!-- ═══════════════════════════════════════════
       MENU GRID
  ════════════════════════════════════════════ -->
  <section id="menu-section" class="py-12 px-6 lg:px-14 bg-ink">
    <div class="max-w-7xl mx-auto flex gap-8 items-start">

      <div class="flex-1 min-w-0">
        <div class="reveal mb-10">
          <div class="flex items-center gap-4 mb-1">
            <div class="h-px w-8 bg-gold"></div>
            <span class="text-[10px] tracking-[.4em] uppercase text-gold">Notre Sélection</span>
          </div>
          <h2 class="font-serif font-normal" style="font-size:clamp(2rem,4vw,2.8rem)">
            Tous les <em class="italic text-gold">plats</em>
          </h2>
        </div>

        <div id="emptyState" class="hidden text-center py-24">
          <div class="text-5xl mb-4 opacity-10">🍽</div>
          <div class="font-serif text-xl text-ivory/15 mb-2">Aucun plat trouvé</div>
          <div class="text-[12px] text-ivory/10">Essayez un autre filtre ou terme de recherche.</div>
        </div>

        <div id="productsGrid" class="grid sm:grid-cols-2 xl:grid-cols-3 gap-px bg-gold/[.06] stg">
          @foreach($items as $item)
          <article class="prod shine card-line relative bg-s1 flex flex-col overflow-hidden group reveal cursor-pointer"
            data-id="{{ $item->id }}"
            data-cat="{{ strtolower($item->category->name) }}"
            data-name="{{ $item->name }}"
            data-price="{{ $item->prix }}"
            onclick="addToCart(this)">
            <div class="img-z h-52 relative">
              <img src="{{ asset('storage/'.$item->image) }}"
                   class="w-full h-full object-cover brightness-75 group-hover:brightness-90 transition-all duration-500"
                   alt="{{ $item->name }}" />
              <div class="absolute inset-0 bg-gradient-to-t from-ink/80 via-ink/[.05] to-transparent"></div>
              <div class="absolute inset-0 bg-ink/55 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-400">
                <div class="flex flex-col items-center gap-2">
                  <div class="w-12 h-12 bg-gold rounded-full flex items-center justify-center shadow-lg">
                    <svg class="w-5 h-5 text-ink" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                  </div>
                  <span class="text-[10px] tracking-[.15em] uppercase text-ivory font-medium">Ajouter au panier</span>
                </div>
              </div>
            </div>
            <div class="p-5 flex flex-col flex-1">
              <span class="text-[9px] tracking-[.22em] uppercase text-gold mb-1.5">{{ $item->category->name }}</span>
              <h3 class="font-serif text-[1.15rem] leading-tight mb-2 group-hover:text-gold transition-colors duration-300">{{ $item->name }}</h3>
              <div class="flex items-center gap-2 mb-3">
                <span class="text-[10px] tracking-[.15em] uppercase text-ivory/20 bg-s2 px-2 py-1 rounded">{{ $item->status }}</span>
              </div>
              <p class="text-[11px] text-ivory/40 leading-relaxed flex-1 mb-4">{{ $item->description }}</p>
              <div class="flex items-center justify-between pt-3.5 border-t border-gold/[.07]">
                <span class="font-serif text-xl text-gold">{{ $item->prix }} <span class="text-sm text-ivory/20">MAD</span></span>
                <div class="flex items-center gap-3">
                  <span class="text-[10px] text-ivory/20">⏱ {{ $item->temp_prepa }} min</span>
                  <button onclick="event.stopPropagation();addToCart(this.closest('.prod'))"
                    class="w-8 h-8 bg-gold text-ink flex items-center justify-center hover:bg-gh transition-colors border-0 cursor-pointer shadow-md">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                  </button>
                </div>
              </div>
            </div>
          </article>
          @endforeach
        </div>
      </div>

      <!-- ── STICKY CART (desktop) ── -->
      <aside id="stickyCart" class="hidden xl:flex flex-col w-[320px] shrink-0 sticky top-[128px] bg-s1 border border-gold/[.12] shadow-2xl">
        <div class="flex items-center justify-between px-5 py-4 border-b border-gold/[.1]">
          <div>
            <div class="text-[9px] tracking-[.3em] uppercase text-gold mb-0.5">Votre sélection</div>
            <h3 class="font-serif text-lg font-normal">Mon <em class="italic text-gold">Panier</em></h3>
          </div>
          <span id="sCartCount" class="w-7 h-7 bg-gd border border-gold/25 flex items-center justify-center text-[11px] text-gold font-semibold">0</span>
        </div>
        <div id="sCartItems" class="flex-1 overflow-y-auto max-h-[360px] px-5 py-3">
          <div id="sEmptyMsg" class="flex flex-col items-center justify-center py-12 text-center">
            <div class="text-4xl mb-3 opacity-[.1]">🛒</div>
            <div class="text-[12px] text-ivory/15">Votre panier est vide</div>
            <div class="text-[10px] text-ivory/10 mt-1">Cliquez sur un plat pour l'ajouter</div>
          </div>
          <div id="sCartList" class="hidden divide-y divide-gold/[.05]"></div>
        </div>
        <div id="sCartSummary" class="hidden border-t border-gold/[.1] px-5 py-4 bg-s2">
          <div class="flex justify-between items-center py-3 border-b border-gold/[.1] mb-4">
            <span class="text-[10px] tracking-[.15em] uppercase text-gold">Total</span>
            <span id="sTot" class="font-serif text-xl text-gold">0 MAD</span>
          </div>
          <button onclick="openPayModal()"
            class="group w-full py-3.5 bg-gold text-ink text-[11px] tracking-[.15em] uppercase font-semibold hover:bg-gh transition-colors border-0 cursor-pointer flex items-center justify-center gap-2.5 mb-2">
            <svg class="w-4 h-4 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
            </svg>
            Payer en ligne
          </button>
          <button onclick="clearCart()" class="w-full py-2 text-[10px] tracking-[.12em] uppercase text-ivory/20 hover:text-rose transition-colors bg-transparent border-0 cursor-pointer">
            Vider le panier
          </button>
        </div>
      </aside>

    </div>
  </section>

  <!-- ═══════════════════════════════════════════
       MOBILE CART DRAWER
  ════════════════════════════════════════════ -->
  <div id="cartBg" class="hidden fixed inset-0 bg-ink/80 backdrop-blur-sm z-[80]" onclick="closeCart()"></div>
  <div id="cartDrawer" class="cart-drawer fixed top-0 right-0 h-full w-full sm:w-[380px] bg-s1 border-l border-gold/[.1] z-[90] flex flex-col shadow-2xl xl:hidden">
    <div class="flex items-center justify-between px-6 py-5 border-b border-gold/[.1]">
      <div>
        <div class="text-[9px] tracking-[.3em] uppercase text-gold mb-0.5">Votre sélection</div>
        <h3 class="font-serif text-xl font-normal">Mon <em class="italic text-gold">Panier</em></h3>
      </div>
      <button onclick="closeCart()" class="w-8 h-8 border border-gold/20 flex items-center justify-center text-ivory/30 hover:text-gold hover:border-gold transition-all bg-transparent cursor-pointer text-sm">✕</button>
    </div>
    <div class="px-6 py-3 border-b border-gold/[.07] bg-s2">
      <label class="block text-[9px] tracking-[.2em] uppercase text-ivory/25 mb-1.5">Table</label>
      <select id="tableSelect" class="inp w-full bg-s1 border border-gold/[.1] px-3 py-2.5 text-[12px] text-ivory font-sans cursor-pointer">
        <option class="bg-s1">Table 1</option>
        <option class="bg-s1">Table 2</option>
        <option class="bg-s1" selected>Table 12</option>
      </select>
    </div>
    <div class="flex-1 overflow-y-auto px-6 py-4">
      <div id="dEmptyMsg" class="flex flex-col items-center justify-center py-16 text-center">
        <div class="text-5xl mb-4 opacity-[.1]">🛒</div>
        <div class="text-[13px] text-ivory/15">Votre panier est vide</div>
      </div>
      <div id="dCartList" class="hidden divide-y divide-gold/[.05]"></div>
    </div>
    <div id="dCartFoot" class="hidden border-t border-gold/[.1] px-6 py-5 bg-s2">
      <div class="flex justify-between items-center py-3 border-b border-gold/[.1] mb-4">
        <span class="text-[10px] tracking-[.15em] uppercase text-gold">Total</span>
        <span id="dTot" class="font-serif text-xl text-gold">0 MAD</span>
      </div>
      <button onclick="openPayModal()" class="group w-full py-4 bg-gold text-ink text-[11px] tracking-[.15em] uppercase font-semibold hover:bg-gh transition-colors border-0 cursor-pointer flex items-center justify-center gap-2.5">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
        </svg>
        Payer en ligne
      </button>
    </div>
  </div>

  <!-- ═══════════════════════════════════════════
       PAYMENT MODAL
  ════════════════════════════════════════════ -->
  <div id="payModal" class="hidden fixed inset-0 z-[100] flex items-center justify-center px-4 py-8">
    <div class="absolute inset-0 bg-ink/92 backdrop-blur-md" onclick="closePayModal()"></div>
    <div id="payBox" class="relative bg-s1 border border-gold/[.18] w-full max-w-lg shadow-2xl animate-scale-in overflow-y-auto" style="max-height:92vh">

      {{-- Modal header --}}
      <div class="sticky top-0 bg-s1 border-b border-gold/[.1] flex items-center justify-between px-7 py-5 z-10">
        <div>
          <span class="block text-[9px] tracking-[.4em] uppercase text-gold mb-0.5">La Maison · Paiement sécurisé</span>
          <h3 class="font-serif text-[1.45rem] font-normal">Payer ma <em class="italic text-gold">commande</em></h3>
        </div>
        <button onclick="closePayModal()" class="w-8 h-8 border border-gold/20 flex items-center justify-center text-ivory/30 hover:text-gold hover:border-gold transition-all bg-transparent cursor-pointer text-base">✕</button>
      </div>

      {{-- Step indicator --}}
      <div class="px-7 py-5 border-b border-gold/[.08]">
        <div class="relative step-line flex items-start justify-between">
          <div class="flex flex-col items-center gap-2 z-10">
            <div id="dot1" class="w-7 h-7 bg-gold text-ink flex items-center justify-center text-[11px] font-bold transition-all">1</div>
            <span class="text-[9px] tracking-[.15em] uppercase text-gold">Récap</span>
          </div>
          <div class="flex flex-col items-center gap-2 z-10">
            <div id="dot2" class="w-7 h-7 bg-s2 border border-gold/20 text-ivory/30 flex items-center justify-center text-[11px] transition-all">2</div>
            <span class="text-[9px] tracking-[.15em] uppercase text-ivory/25">Livraison</span>
          </div>
          <div class="flex flex-col items-center gap-2 z-10">
            <div id="dot3" class="w-7 h-7 bg-s2 border border-gold/20 text-ivory/30 flex items-center justify-center text-[11px] transition-all">3</div>
            <span class="text-[9px] tracking-[.15em] uppercase text-ivory/25">Paiement</span>
          </div>
          <div class="flex flex-col items-center gap-2 z-10">
            <div id="dot4" class="w-7 h-7 bg-s2 border border-gold/20 text-ivory/30 flex items-center justify-center text-[11px] transition-all">✓</div>
            <span class="text-[9px] tracking-[.15em] uppercase text-ivory/25">Confirmation</span>
          </div>
        </div>
      </div>

      {{-- ── STEP 1: Cart recap ── --}}
      <div id="step1" class="px-7 py-6">
        <div class="text-[10px] tracking-[.3em] uppercase text-gold mb-4">Récapitulatif de la commande</div>
        <div id="payCartItems" class="divide-y divide-gold/[.05] mb-5 max-h-56 overflow-y-auto"></div>
        <div id="noPayCart" class="hidden text-center py-8">
          <div class="text-[13px] text-ivory/20">Votre panier est vide.</div>
          <p class="text-[11px] text-ivory/15 mt-1">Ajoutez des plats depuis la carte.</p>
        </div>
        <div class="bg-s2 px-4 py-4 border border-gold/[.07] flex justify-between items-center mb-5">
          <span class="text-[10px] tracking-[.15em] uppercase text-gold">Total à payer</span>
          <span id="pTot" class="font-serif text-xl text-gold">0 MAD</span>
        </div>
        <button onclick="goStep(2)"
          class="group w-full py-3.5 bg-gold text-ink text-[11px] tracking-[.13em] uppercase font-semibold hover:bg-gh transition-colors border-0 cursor-pointer flex items-center justify-center gap-2">
          Continuer
          <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
          </svg>
        </button>
      </div>

      {{-- ── STEP 2: Delivery info ── --}}
      <div id="step2" class="hidden px-7 py-6">
        <div class="text-[10px] tracking-[.3em] uppercase text-gold mb-5">Informations de livraison</div>
        <div class="flex flex-col gap-3.5">
          <div class="grid grid-cols-2 gap-3">
            <div>
              <label class="block text-[9px] tracking-[.2em] uppercase text-ivory/25 mb-1.5">Prénom *</label>
              <input id="f_prenom" type="text" placeholder="Ahmed"
                class="inp w-full bg-s2 border border-gold/[.1] px-4 py-3 text-[13px] text-ivory placeholder-ivory/20 font-sans transition-all" />
            </div>
            <div>
              <label class="block text-[9px] tracking-[.2em] uppercase text-ivory/25 mb-1.5">Nom *</label>
              <input id="f_nom" type="text" placeholder="Benali"
                class="inp w-full bg-s2 border border-gold/[.1] px-4 py-3 text-[13px] text-ivory placeholder-ivory/20 font-sans transition-all" />
            </div>
          </div>
          <div>
            <label class="block text-[9px] tracking-[.2em] uppercase text-ivory/25 mb-1.5">Email *</label>
            <input id="f_email" type="email" placeholder="vous@exemple.com"
              class="inp w-full bg-s2 border border-gold/[.1] px-4 py-3 text-[13px] text-ivory placeholder-ivory/20 font-sans transition-all" />
          </div>
          <div>
            <label class="block text-[9px] tracking-[.2em] uppercase text-ivory/25 mb-1.5">Téléphone *</label>
            <input id="f_tel" type="tel" placeholder="+212 6XX XXX XXX"
              class="inp w-full bg-s2 border border-gold/[.1] px-4 py-3 text-[13px] text-ivory placeholder-ivory/20 font-sans transition-all" />
          </div>
          <div>
            <label class="block text-[9px] tracking-[.2em] uppercase text-ivory/25 mb-1.5">Notes spéciales</label>
            <textarea id="f_notes" rows="2" placeholder="Allergie, demande particulière…"
              class="inp w-full bg-s2 border border-gold/[.1] px-4 py-3 text-[13px] text-ivory placeholder-ivory/20 font-sans resize-none transition-all"></textarea>
          </div>
        </div>
        <div class="flex gap-3 mt-5">
          <button onclick="goStep(1)"
            class="flex-1 py-3.5 border border-gold/20 text-ivory/45 text-[11px] tracking-[.13em] uppercase hover:border-gold hover:text-ivory transition-all bg-transparent cursor-pointer">← Retour</button>
          <button onclick="validateStep2()"
            class="group flex-1 py-3.5 bg-gold text-ink text-[11px] tracking-[.13em] uppercase font-semibold hover:bg-gh transition-colors border-0 cursor-pointer flex items-center justify-center gap-2">
            Continuer
            <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
            </svg>
          </button>
        </div>
      </div>

      {{-- ── STEP 3: Payment ── --}}
      <div id="step3" class="hidden px-7 py-6">
        <div class="flex items-center justify-between mb-5">
          <div class="text-[10px] tracking-[.3em] uppercase text-gold">Méthode de paiement</div>
          <span id="payAmt" class="font-serif text-gold text-[13px]"></span>
        </div>

        <div class="grid grid-cols-3 gap-2 mb-6">
          <label id="pm-card" class="flex flex-col items-center gap-2 bg-gold/10 border border-gold/50 p-3 cursor-pointer transition-all" onclick="selectPay('card')">
            <input type="radio" name="pay" value="card" checked class="hidden" />
            <svg class="w-6 h-6 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
            </svg>
            <span class="text-[9px] tracking-wide uppercase text-gold">Carte</span>
          </label>
          <label id="pm-cash" class="flex flex-col items-center gap-2 bg-s2 border border-gold/[.1] p-3 cursor-pointer hover:border-gold/30 transition-all" onclick="selectPay('cash')">
            <input type="radio" name="pay" value="cash" class="hidden" />
            <svg class="w-6 h-6 text-ivory/35" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/>
            </svg>
            <span class="text-[9px] tracking-wide uppercase text-ivory/35">Espèces</span>
          </label>
          <label id="pm-mobile" class="flex flex-col items-center gap-2 bg-s2 border border-gold/[.1] p-3 cursor-pointer hover:border-gold/30 transition-all" onclick="selectPay('mobile')">
            <input type="radio" name="pay" value="mobile" class="hidden" />
            <svg class="w-6 h-6 text-ivory/35" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/>
            </svg>
            <span class="text-[9px] tracking-wide uppercase text-ivory/35">Mobile</span>
          </label>
        </div>

        {{-- Stripe card element (only one, only here) --}}
        <div id="cardForm" class="flex flex-col gap-3">
          <div>
            <label class="block text-[9px] tracking-[.2em] uppercase text-ivory/25 mb-1.5">Numéro de carte *</label>
            <div id="card-element" class="bg-s2 border border-gold/[.1] transition-all"></div>
            <div id="card-errors" role="alert" class="text-[10px] text-rose mt-1 min-h-[16px]"></div>
          </div>
        </div>

        {{-- Cash message --}}
        <div id="cashMsg" class="hidden bg-s2 border border-gold/[.07] px-5 py-4 text-[12px] text-ivory/50 leading-relaxed">
          Vous réglerez en espèces à la livraison. Merci de prévoir l'appoint.
        </div>

        {{-- Mobile payment message --}}
        <div id="mobileMsg" class="hidden bg-s2 border border-gold/[.07] px-5 py-4 text-[12px] text-ivory/50 leading-relaxed">
          Paiement mobile accepté (CIH, Attijariwafa, etc.).<br>Vous recevrez les instructions par SMS après confirmation.
        </div>

        <div class="flex gap-3 mt-5">
          <button onclick="goStep(2)"
            class="flex-1 py-3.5 border border-gold/20 text-ivory/45 text-[11px] tracking-[.13em] uppercase hover:border-gold hover:text-ivory transition-all bg-transparent cursor-pointer">← Retour</button>
          <button id="payBtn" onclick="confirmPay()"
            class="group flex-1 py-3.5 bg-gold text-ink text-[11px] tracking-[.13em] uppercase font-semibold hover:bg-gh transition-colors border-0 cursor-pointer flex items-center justify-center gap-2">
            Payer maintenant
            <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
            </svg>
          </button>
        </div>
      </div>

      {{-- ── STEP 4: Success ── --}}
      <div id="step4" class="hidden px-7 py-10 text-center">
        <div class="w-16 h-16 bg-sage/15 border border-sage/30 rounded-full flex items-center justify-center mx-auto mb-6">
          <svg class="w-8 h-8 text-sage" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
          </svg>
        </div>
        <h3 class="font-serif text-2xl mb-3">Commande <em class="italic text-gold">confirmée !</em></h3>
        <p class="text-[13px] text-ivory/45 leading-loose mb-2">
          Votre commande a été enregistrée avec succès.<br>Un email de confirmation vous sera envoyé.
        </p>
        <div class="inline-block bg-s2 border border-gold/[.15] px-6 py-3 mb-8">
          <div class="text-[9px] tracking-[.25em] uppercase text-gold mb-0.5">Référence commande</div>
          {{-- id="orderRefNum" targeted directly by JS --}}
          <div id="orderRefNum" class="font-serif text-lg text-ivory">#LM-2025-0000</div>
        </div>
        <div class="flex flex-col gap-3">
          <button onclick="closePayModal()" class="w-full py-4 bg-gold text-ink text-[11px] tracking-[.15em] uppercase font-semibold hover:bg-gh transition-colors border-0 cursor-pointer">Retour à la carte</button>
          <button onclick="closePayModal()" class="w-full py-3 border border-gold/20 text-ivory/40 text-[11px] tracking-[.12em] uppercase hover:border-gold hover:text-ivory transition-all bg-transparent cursor-pointer">Suivre ma commande</button>
        </div>
      </div>

    </div>
  </div>

  <!-- ═══════════════════════════════════════════
       TOAST
  ════════════════════════════════════════════ -->
  <div id="toast" class="hidden fixed bottom-8 left-1/2 z-[200] bg-s2 border border-sage/30 px-6 py-3.5 flex items-center gap-3 shadow-2xl -translate-x-1/2 animate-toast">
    <span id="tIcon" class="text-sage text-lg">✓</span>
    <div>
      <div id="tTitle" class="text-[13px] text-ivory leading-tight"></div>
      <div id="tSub" class="text-[10px] text-ivory/35 mt-0.5"></div>
    </div>
  </div>

  <!-- ═══════════════════════════════════════════
       FAB (mobile cart button)
  ════════════════════════════════════════════ -->
  <button id="cartFab" onclick="openCart()" class="xl:hidden hidden fixed bottom-6 right-6 z-40 w-14 h-14 bg-gold text-ink rounded-full flex items-center justify-center shadow-xl hover:bg-gh transition-colors cursor-pointer border-0 group">
    <svg class="w-5 h-5 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-1.4 5.6M17 13l1.4 5.6M9 21a1 1 0 100-2 1 1 0 000 2zm8 0a1 1 0 100-2 1 1 0 000 2z"/>
    </svg>
    <span id="fabBadge" class="absolute -top-1 -right-1 w-5 h-5 bg-rose text-ivory text-[9px] font-bold rounded-full flex items-center justify-center">0</span>
  </button>

  <script src="{{ asset('js/Menu.js') }}"></script>

</body>
</html>