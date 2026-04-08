<header id="hdr" class="fixed inset-x-0 top-0 z-50 transition-all duration-400">
  <nav id="navBar" class="px-6 lg:px-14 h-[64px] flex items-center gap-5 transition-all duration-400 bg-ink/95 backdrop-blur-md border-b border-gold/[.1]">
    <a href="accueil.html" class="no-underline shrink-0">
      <span class="gold-text font-serif text-[1.55rem] tracking-wide">La Maison</span>
    </a>
    <nav class="nav-ul hidden lg:flex flex-1 justify-center items-center gap-1">
      <a href="{{ route('home') }}" class="no-underline text-[11px] tracking-[.16em] uppercase text-ivory/50 hover:text-ivory px-4 py-2 transition-colors">Accueil</a>
      <a href="{{ route('menu') }}" class="no-underline text-[11px] tracking-[.16em] uppercase text-gold px-4 py-2">Notre Carte</a>
      <a href="{{ route('reservation') }}" class="no-underline text-[11px] tracking-[.16em] uppercase text-ivory/50 hover:text-ivory px-4 py-2 transition-colors">Faire une réservation</a>
      <a href="#contact" class="no-underline text-[11px] tracking-[.16em] uppercase text-ivory/50 hover:text-ivory px-4 py-2 transition-colors">Contact</a>
    </nav>
    <div class="flex-1 lg:flex-none"></div>
    <!-- Cart button -->
    <button onclick="openCart()" class="relative flex items-center gap-2.5 border border-gold/35 text-ivory/70 text-[11px] tracking-[.14em] uppercase px-5 py-2.5 hover:border-gold hover:text-gold hover:bg-gd transition-all cursor-pointer bg-transparent group">
      <svg class="w-4 h-4 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-1.4 5.6M17 13l1.4 5.6M9 21a1 1 0 100-2 1 1 0 000 2zm8 0a1 1 0 100-2 1 1 0 000 2z"/></svg>
      Mon Panier
      <span id="cartCount" class="hidden absolute -top-2 -right-2 w-5 h-5 bg-gold text-ink text-[9px] font-bold rounded-full items-center justify-center">0</span>
    </button>
    <!-- Mobile hamburger -->
    <button id="ham" onclick="toggleMob()" class="lg:hidden bg-transparent border-0 cursor-pointer w-9 h-9 flex flex-col justify-center items-center gap-[5px]">
      <span id="hb1" class="block w-6 h-[1.5px] bg-ivory transition-all duration-300 origin-center"></span>
      <span id="hb2" class="block w-6 h-[1.5px] bg-ivory transition-all duration-300"></span>
      <span id="hb3" class="block w-6 h-[1.5px] bg-ivory transition-all duration-300 origin-center"></span>
    </button>
    <a href="{{ route('logout') }}" class="hover:text-yellow-600 no-underline text-[11px] tracking-[.16em] uppercase text-ivory/50 hover:text-ivory px-4 py-2 transition-colors">Se déconnecter</a>
  </nav>
  <!-- Mobile menu -->

  </div>
</header>