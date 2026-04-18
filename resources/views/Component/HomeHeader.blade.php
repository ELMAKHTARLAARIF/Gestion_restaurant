<header id="hdr" class="fixed inset-x-0 top-0 z-50 transition-all duration-400">
  <nav id="navBar" class="px-6 lg:px-14 h-[64px] flex items-center transition-all duration-400 bg-ink/95 backdrop-blur-md border-b border-gold/[.1]">

    <!-- LOGO -->
    <a href="{{ route('home') }}" class="no-underline shrink-0">
      <span class="gold-text font-serif text-[1.55rem] tracking-wide">
        La Maison
      </span>
    </a>

    @auth
      <nav class="hidden lg:flex flex-1 justify-center items-center gap-1">
        <a href="{{ route('home') }}" class="text-[11px] uppercase tracking-[.16em] text-ivory/50 hover:text-ivory px-4 py-2">
          Accueil
        </a>

        <a href="{{ route('menu') }}" class="text-[11px] uppercase tracking-[.16em] text-gold px-4 py-2">
          Notre Carte
        </a>

        <a href="{{ route('reservation') }}" class="text-[11px] uppercase tracking-[.16em] text-ivory/50 hover:text-ivory px-4 py-2">
          Réservation
        </a>

        <a href="#contact" class="text-[11px] uppercase tracking-[.16em] text-ivory/50 hover:text-ivory px-4 py-2">
          Contact
        </a>
      </nav>
    @endauth

    <div class="flex-1 lg:flex-none"></div>

    @auth

      <a href="{{ route('Client.Panier') }}">
        <button class="relative flex items-center gap-2.5 border border-gold/35 text-ivory/70 text-[11px] uppercase px-5 py-2.5 hover:border-gold hover:text-gold transition-all">

          🛒 Mon Panier

          <span id="cartCountMenu"
                class="hidden absolute -top-2 -right-2 w-5 h-5 bg-gold text-ink text-[9px] font-bold rounded-full items-center justify-center">
            0
          </span>

        </button>
      </a>

      <a href="{{ route('client.reservations') }}">
        <button class="relative flex items-center gap-2.5 border border-gold/35 text-ivory/70 text-[11px] uppercase px-5 py-2.5 hover:border-gold hover:text-gold transition-all">

          📅 Réservation

        </button>
      </a>

      <a href="{{ route('logout') }}"
         class="text-[11px] uppercase tracking-[.16em] text-ivory/50 hover:text-ivory px-4 py-2">
        Se déconnecter
      </a>

    @endauth


    @guest
      <div class="flex items-center gap-4">

        <a href="{{ route('login') }}"
           class="text-[11px] uppercase tracking-[.16em] text-ivory/50 hover:text-ivory px-4 py-2">
          Se connecter
        </a>

        <a href="{{ route('signup') }}"
           class="text-[11px] uppercase tracking-[.16em] text-gold px-4 py-2">
          S'inscrire
        </a>

      </div>
    @endguest

  </nav>
</header>