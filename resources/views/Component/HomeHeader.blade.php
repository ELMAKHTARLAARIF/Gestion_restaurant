  <header id="nav" class="fixed top-0 inset-x-0 z-50 transition-all duration-400" style="background:linear-gradient(to bottom,rgba(11,11,11,.88),transparent)">

    <!-- Announcement ticker -->
    <div class="bg-gold text-dark text-[10px] tracking-[.22em] uppercase text-center py-1.5 font-semibold leading-none">
      🎉 Réservez avant 18h et recevez un apéritif offert &nbsp;·&nbsp; Ouvert mar–sam 12h–23h
    </div>

    <div class="px-6 lg:px-14 h-[66px] flex items-center gap-5">

      <!-- Logo -->
      <a href="#top" class="no-underline flex-shrink-0">
        <span class="logo-text font-display text-[1.6rem] tracking-wider">Snack Yassine</span>
      </a>

      <!-- ── Desktop nav ── -->
      <nav class="hidden lg:flex items-center gap-0.5 flex-1 justify-center">

        <a href="#top" class="nav-link text-[11px] tracking-[.16em] uppercase text-cream/60 hover:text-cream px-4 py-2 transition-colors no-underline">Accueil</a>
        <a href="#about" class="nav-link text-[11px] tracking-[.16em] uppercase text-cream/60 hover:text-cream px-4 py-2 transition-colors no-underline">Notre Histoire</a>

        <!-- Carte dropdown -->
        <div class="dd-wrap relative">
          <button class="nav-link flex items-center gap-1 text-[11px] tracking-[.16em] uppercase text-cream/60 hover:text-cream px-4 py-2 transition-colors bg-transparent border-0 cursor-pointer">
            Notre Carte <span class="text-[8px] text-gold ml-0.5">▼</span>
          </button>
          <div class="dd-menu absolute top-full left-1/2 -translate-x-1/2 mt-2 w-[460px] bg-s1 border border-gold/[.15] shadow-2xl z-50">
            <div class="grid grid-cols-2 gap-px bg-gold/[.07]">
              <a href="#menu" class="bg-s1 p-5 hover:bg-gold/[.05] transition-colors no-underline">
                <div class="text-lg mb-1">🥗</div>
                <div class="text-[10px] tracking-[.15em] uppercase text-gold mb-1">Entrées</div>
                <div class="text-[11px] text-cream/35 leading-relaxed">Carpaccio, Foie Gras, Harira…</div>
              </a>
              <a href="#menu" class="bg-s1 p-5 hover:bg-gold/[.05] transition-colors no-underline">
                <div class="text-lg mb-1">🍖</div>
                <div class="text-[10px] tracking-[.15em] uppercase text-gold mb-1">Plats principaux</div>
                <div class="text-[11px] text-cream/35 leading-relaxed">Côte de Bœuf, Tagine, Briouates…</div>
              </a>
              <a href="#menu" class="bg-s1 p-5 hover:bg-gold/[.05] transition-colors no-underline">
                <div class="text-lg mb-1">🍮</div>
                <div class="text-[10px] tracking-[.15em] uppercase text-gold mb-1">Desserts</div>
                <div class="text-[11px] text-cream/35 leading-relaxed">Fondant chocolat, Millefeuille…</div>
              </a>
              <a href="#menu" class="bg-s1 p-5 hover:bg-gold/[.05] transition-colors no-underline">
                <div class="text-lg mb-1">🍷</div>
                <div class="text-[10px] tracking-[.15em] uppercase text-gold mb-1">Boissons</div>
                <div class="text-[11px] text-cream/35 leading-relaxed">Thé, Jus frais, Vins sélectionnés…</div>
              </a>
            </div>
            <div class="px-5 py-3 border-t border-gold/[.08] flex justify-between items-center">
              <span class="text-[10px] text-cream/20">Carte mise à jour chaque saison</span>
              <a href="#menu" class="text-[10px] tracking-[.12em] uppercase text-gold hover:text-gold-h no-underline">Voir tout →</a>
            </div>
          </div>
        </div>

        <a href="#gallery" class="nav-link text-[11px] tracking-[.16em] uppercase text-cream/60 hover:text-cream px-4 py-2 transition-colors no-underline">Galerie</a>
        <a href="#contact" class="nav-link text-[11px] tracking-[.16em] uppercase text-cream/60 hover:text-cream px-4 py-2 transition-colors no-underline">Contact</a>
      </nav>

      <div class="flex-1 lg:flex-none"></div>

      <!-- ── CTA buttons ── -->
      <div class="hidden md:flex items-center gap-3">
        <!-- Order -->
        <button onclick="openDrawer()" class="relative flex items-center gap-2 px-5 py-[10px] border border-gold/35 text-[11px] tracking-[.14em] uppercase text-cream hover:border-gold hover:text-gold transition-all bg-transparent cursor-pointer">
          🍽 Commander
          <span id="badge" class="badge-pulse hidden absolute -top-1.5 -right-1.5 w-5 h-5 bg-gold text-dark text-[9px] font-bold rounded-full items-center justify-center">0</span>
        </button>
        <!-- Reserve -->
        <button onclick="openRes()" class="flex items-center gap-2 px-5 py-[10px] bg-gold text-dark text-[11px] tracking-[.14em] uppercase font-semibold hover:bg-gold-h transition-all border-0 cursor-pointer">
          🗓 Réserver
        </button>
      </div>

      <!-- Mobile hamburger -->
      <button onclick="toggleMob()" id="hambtn" class="lg:hidden bg-transparent border-0 cursor-pointer flex flex-col gap-[5px] ml-2">
        <span id="h1" class="block w-6 h-px bg-cream transition-all duration-300"></span>
        <span id="h2" class="block w-6 h-px bg-cream transition-all duration-300"></span>
        <span id="h3" class="block w-6 h-px bg-cream transition-all duration-300"></span>
      </button>
    </div>

    <!-- Mobile nav panel -->
    <div id="mobNav" class="hidden lg:hidden bg-s1 border-t border-gold/[.1] px-6 pt-5 pb-6 flex flex-col gap-3">
      <a href="#top" onclick="closeMob()" class="text-[11px] tracking-[.2em] uppercase text-cream/55 hover:text-gold no-underline py-1 transition-colors">Accueil</a>
      <a href="#about" onclick="closeMob()" class="text-[11px] tracking-[.2em] uppercase text-cream/55 hover:text-gold no-underline py-1 transition-colors">Notre Histoire</a>
      <a href="#menu" onclick="closeMob()" class="text-[11px] tracking-[.2em] uppercase text-cream/55 hover:text-gold no-underline py-1 transition-colors">Notre Carte</a>
      <a href="#gallery" onclick="closeMob()" class="text-[11px] tracking-[.2em] uppercase text-cream/55 hover:text-gold no-underline py-1 transition-colors">Galerie</a>
      <a href="#contact" onclick="closeMob()" class="text-[11px] tracking-[.2em] uppercase text-cream/55 hover:text-gold no-underline py-1 transition-colors">Contact</a>
      <div class="pt-4 border-t border-gold/[.08] flex flex-col gap-2.5">
        <button onclick="openDrawer();closeMob()" class="py-3 border border-gold/35 text-[11px] tracking-[.15em] uppercase text-cream hover:border-gold transition-all bg-transparent cursor-pointer">🍽 Commander en ligne</button>
        <button onclick="openRes();closeMob()" class="py-3 bg-gold text-dark text-[11px] tracking-[.15em] uppercase font-semibold hover:bg-gold-h transition-all border-0 cursor-pointer">🗓 Réserver une table</button>
      </div>
    </div>
  </header>