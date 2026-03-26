<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Snack YAssine | Restaurant Gastronomique</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400;1,600&family=Jost:wght@300;400;500;600&display=swap" rel="stylesheet" />
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            gold: '#C8A96E',
            'gold-h': '#d4b87c',
            dark: '#0B0B0B',
            s1: '#111111',
            s2: '#161616',
            s3: '#1C1C1C',
            cream: '#F5F0E8',
            muted: '#8A7E6E',
            cgreen: '#6EC88A',
            cred: '#C86E6E',
          },
          fontFamily: {
            display: ['"Cormorant Garamond"', 'serif'],
            body: ['Jost', 'sans-serif'],
          },
        }
      }
    }
  </script>
  <style>
    html {
      scroll-behavior: smooth;
    }

    body {
      font-family: 'Jost', sans-serif;
    }

    ::-webkit-scrollbar {
      width: 4px;
    }

    ::-webkit-scrollbar-thumb {
      background: rgba(200, 169, 110, .2);
    }

    @keyframes fadeUp {
      from {
        opacity: 0;
        transform: translateY(28px)
      }

      to {
        opacity: 1;
        transform: translateY(0)
      }
    }

    @keyframes fadeIn {
      from {
        opacity: 0
      }

      to {
        opacity: 1
      }
    }

    @keyframes slideD {
      from {
        opacity: 0;
        transform: translateY(-10px)
      }

      to {
        opacity: 1;
        transform: translateY(0)
      }
    }

    @keyframes ken {
      from {
        transform: scale(1)
      }

      to {
        transform: scale(1.07)
      }
    }

    @keyframes shimmer {
      0% {
        background-position: 200% center
      }

      100% {
        background-position: -200% center
      }
    }

    @keyframes bob {

      0%,
      100% {
        transform: translateX(-50%) translateY(0)
      }

      50% {
        transform: translateX(-50%) translateY(8px)
      }
    }

    @keyframes pulse {

      0%,
      100% {
        opacity: 1
      }

      50% {
        opacity: .35
      }
    }

    .anim-fu {
      animation: fadeUp .7s ease forwards;
      opacity: 0;
    }

    .anim-ken {
      animation: ken 14s ease infinite alternate;
    }

    .anim-bob {
      animation: bob 2s infinite;
    }

    .d1 {
      animation-delay: .08s
    }

    .d2 {
      animation-delay: .2s
    }

    .d3 {
      animation-delay: .32s
    }

    .d4 {
      animation-delay: .44s
    }

    .d5 {
      animation-delay: .56s
    }

    /* shimmer gold logo */
    .logo-text {
      background: linear-gradient(90deg, #C8A96E 0%, #f0d9a8 40%, #C8A96E 60%, #a07840 100%);
      background-size: 200% auto;
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      animation: shimmer 4s linear infinite;
    }

    /* nav link underline */
    .nav-link {
      position: relative;
    }

    .nav-link::after {
      content: '';
      position: absolute;
      bottom: -2px;
      left: 0;
      width: 0;
      height: 1px;
      background: #C8A96E;
      transition: width .3s;
    }

    .nav-link:hover::after {
      width: 100%;
    }

    /* dropdown */
    .dd-menu {
      display: none;
      animation: slideD .22s ease;
    }

    .dd-wrap:hover .dd-menu {
      display: block;
    }

    /* sticky nav */
    .nav-solid {
      background: rgba(11, 11, 11, .97) !important;
      backdrop-filter: blur(12px);
    }

    /* menu card */
    .mc-img {
      transition: transform .6s ease;
    }

    .mc:hover .mc-img {
      transform: scale(1.06);
    }

    .mc::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 0;
      width: 0;
      height: 2px;
      background: #C8A96E;
      transition: width .4s;
    }

    .mc:hover::after {
      width: 100%;
    }

    /* order drawer */
    .drawer {
      transition: transform .35s cubic-bezier(.4, 0, .2, 1);
      transform: translateX(100%);
    }

    .drawer.open {
      transform: translateX(0);
    }

    /* input focus */
    .fld:focus {
      border-color: rgba(200, 169, 110, .6) !important;
      outline: none;
    }

    /* parallax */
    .plx {
      background-attachment: fixed;
    }

    /* menu tab active */
    .mt.on {
      background: #C8A96E;
      color: #0B0B0B;
      font-weight: 600;
    }

    /* badge pulse */
    .badge-pulse {
      animation: pulse 1.5s infinite;
    }
  </style>
</head>

<body class="bg-dark text-cream overflow-x-hidden">

  <!-- ══════════════════════════════════════
     HEADER
══════════════════════════════════════ -->
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


  <!-- ══════════════════════════════════════
     HERO
══════════════════════════════════════ -->
  <section id="top" class="relative h-screen flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 overflow-hidden">
      <img src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?w=1920&q=85"
        class="anim-ken w-full h-full object-cover" style="filter:brightness(.27)" alt="" />
    </div>
    <div class="absolute inset-0" style="background:radial-gradient(ellipse at 50% 80%,rgba(200,169,110,.06),transparent 65%)"></div>
    <div class="absolute inset-0" style="background:linear-gradient(to bottom,rgba(11,11,11,.1) 0%,transparent 35%,rgba(11,11,11,.65) 100%)"></div>

    <div class="relative text-center px-6 max-w-4xl mx-auto">
      <div class="anim-fu d1">
        <span class="inline-block text-[10px] tracking-[.45em] uppercase text-gold border border-gold/30 px-5 py-1.5 mb-7">Casablanca · Depuis 2010</span>
      </div>
      <h1 class="anim-fu d2 font-display font-light leading-[.92] mb-7" style="font-size:clamp(4.5rem,12vw,9rem)">
        L'Art de<br><em class="italic text-gold">Bien Manger</em>
      </h1>
      <div class="anim-fu d3 flex items-center justify-center gap-5 mb-10">
        <div class="h-px w-14 bg-gold/40"></div>
        <p class="text-[12px] tracking-[.2em] text-cream/45 uppercase">Une expérience gastronomique d'exception</p>
        <div class="h-px w-14 bg-gold/40"></div>
      </div>
      <div class="anim-fu d4 flex items-center justify-center gap-4 flex-wrap">
        <button onclick="openRes()" class="px-10 py-4 bg-gold text-dark text-[11px] tracking-[.18em] uppercase font-semibold hover:bg-gold-h transition-all border-0 cursor-pointer">Réserver une table</button>
        <a href="#menu" class="px-10 py-4 border border-cream/25 text-cream text-[11px] tracking-[.18em] uppercase hover:border-gold hover:text-gold transition-all no-underline">Voir la carte</a>
      </div>
      <div class="anim-fu d5 flex items-center justify-center gap-8 mt-14">
        <div class="text-center">
          <div class="font-display text-2xl text-gold">★ 4.9</div>
          <div class="text-[9px] tracking-[.2em] uppercase text-cream/25 mt-0.5">Note Google</div>
        </div>
        <div class="w-px h-7 bg-gold/15"></div>
        <div class="text-center">
          <div class="font-display text-2xl text-gold">48</div>
          <div class="text-[9px] tracking-[.2em] uppercase text-cream/25 mt-0.5">Tables</div>
        </div>
        <div class="w-px h-7 bg-gold/15"></div>
        <div class="text-center">
          <div class="font-display text-2xl text-gold">14</div>
          <div class="text-[9px] tracking-[.2em] uppercase text-cream/25 mt-0.5">Années</div>
        </div>
      </div>
    </div>

    <div class="absolute bottom-8 left-1/2 anim-bob flex flex-col items-center gap-2 opacity-30">
      <span class="text-[9px] tracking-[.3em] uppercase">Défiler</span>
      <div class="w-px h-10 bg-cream"></div>
    </div>
  </section>


  <!-- INFO STRIP -->
  <div class="bg-gold flex flex-wrap justify-center gap-x-12 gap-y-2 px-8 py-3">
    <div class="flex items-center gap-2"><svg class="w-3.5 h-3.5 fill-dark shrink-0" viewBox="0 0 24 24">
        <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" />
      </svg><span class="text-[10px] tracking-[.14em] uppercase text-dark font-medium">15 Avenue des Arts, Casablanca</span></div>
    <div class="flex items-center gap-2"><svg class="w-3.5 h-3.5 fill-dark shrink-0" viewBox="0 0 24 24">
        <path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67V7z" />
      </svg><span class="text-[10px] tracking-[.14em] uppercase text-dark font-medium">Mar–Sam · 12h–15h · 19h–23h</span></div>
    <div class="flex items-center gap-2"><svg class="w-3.5 h-3.5 fill-dark shrink-0" viewBox="0 0 24 24">
        <path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z" />
      </svg><span class="text-[10px] tracking-[.14em] uppercase text-dark font-medium">+212 522 000 000</span></div>
  </div>


  <!-- ══════════════════════════════════════
     ABOUT
══════════════════════════════════════ -->
  <section id="about" class="grid md:grid-cols-2">
    <div class="relative overflow-hidden group" style="min-height:480px">
      <img src="https://images.unsplash.com/photo-1414235077428-338989a2e8c0?w=900&q=80" alt="" class="w-full h-full object-cover brightness-[.72] transition-transform duration-700 group-hover:scale-105" />
      <div class="absolute inset-0 m-10 border border-gold/20 pointer-events-none"></div>
      <div class="absolute bottom-10 left-10 right-10 bg-dark/80 backdrop-blur-sm border-l-2 border-gold px-5 py-4">
        <p class="font-display text-base italic text-cream/75 leading-snug mb-1">"La cuisine est l'art le plus ancien, et celui qui contribue le plus au bonheur."</p>
        <span class="text-[9px] tracking-[.2em] uppercase text-gold">— Chef Karim El Fassi</span>
      </div>
    </div>
    <div class="bg-s1 px-10 md:px-16 py-20 flex flex-col justify-center">
      <span class="block text-[10px] tracking-[.4em] uppercase text-gold mb-4">Notre Histoire</span>
      <h2 class="font-display font-light leading-tight mb-6" style="font-size:clamp(2.5rem,5vw,3.5rem)">Une <em class="italic text-gold">passion</em><br>pour l'excellence</h2>
      <p class="text-[13px] leading-loose text-cream/50 mb-4">Fondé en 2010 au cœur de Casablanca, La Maison est né d'une vision : offrir une gastronomie raffinée mêlant savoir-faire français et saveurs marocaines authentiques.</p>
      <p class="text-[13px] leading-loose text-cream/50 mb-8">Notre chef sélectionne personnellement les meilleurs producteurs locaux. Chaque assiette est pensée comme une œuvre, chaque service comme une cérémonie.</p>
      <div class="flex gap-4">
        <button onclick="openRes()" class="px-7 py-3 bg-gold text-dark text-[11px] tracking-[.14em] uppercase font-semibold hover:bg-gold-h transition-all border-0 cursor-pointer">Réserver</button>
        <a href="#menu" class="px-7 py-3 border border-cream/20 text-cream text-[11px] tracking-[.14em] uppercase hover:border-gold hover:text-gold transition-all no-underline">Notre carte</a>
      </div>
      <div class="grid grid-cols-3 gap-4 mt-10 pt-8 border-t border-gold/[.1]">
        <div><span class="font-display text-3xl text-gold block leading-none">14</span><span class="text-[9px] tracking-[.2em] uppercase text-cream/25 mt-1 block">Années</span></div>
        <div><span class="font-display text-3xl text-gold block leading-none">48</span><span class="text-[9px] tracking-[.2em] uppercase text-cream/25 mt-1 block">Tables</span></div>
        <div><span class="font-display text-3xl text-gold block leading-none">★4.9</span><span class="text-[9px] tracking-[.2em] uppercase text-cream/25 mt-1 block">Note</span></div>
      </div>
    </div>
  </section>


  <!-- ══════════════════════════════════════
     MENU
══════════════════════════════════════ -->
  <section id="menu" class="py-24 px-6 bg-dark">
    <div class="max-w-6xl mx-auto">
      <div class="text-center mb-12">
        <span class="block text-[10px] tracking-[.4em] uppercase text-gold mb-4">Notre Carte</span>
        <h2 class="font-display font-light" style="font-size:clamp(2.2rem,5vw,3.2rem)">Spécialités <em class="italic text-gold">du Chef</em></h2>
      </div>
      <!-- Tabs -->
      <div class="flex justify-center mb-10">
        <div class="inline-flex border border-gold/20 overflow-hidden flex-wrap">
          <button onclick="setTab(this,'all')" class="mt on px-6 py-3 text-[10px] tracking-[.18em] uppercase transition-all text-cream/45 hover:bg-gold/10 hover:text-cream">Tous</button>
          <button onclick="setTab(this,'entrees')" class="mt px-6 py-3 text-[10px] tracking-[.18em] uppercase transition-all text-cream/45 hover:bg-gold/10 hover:text-cream border-l border-gold/15">🥗 Entrées</button>
          <button onclick="setTab(this,'plats')" class="mt px-6 py-3 text-[10px] tracking-[.18em] uppercase transition-all text-cream/45 hover:bg-gold/10 hover:text-cream border-l border-gold/15">🍖 Plats</button>
          <button onclick="setTab(this,'desserts')" class="mt px-6 py-3 text-[10px] tracking-[.18em] uppercase transition-all text-cream/45 hover:bg-gold/10 hover:text-cream border-l border-gold/15">🍮 Desserts</button>
          <button onclick="setTab(this,'boissons')" class="mt px-6 py-3 text-[10px] tracking-[.18em] uppercase transition-all text-cream/45 hover:bg-gold/10 hover:text-cream border-l border-gold/15">🍷 Boissons</button>
        </div>
      </div>

      <!-- Grid -->
      <form  id="menuGrid" class="grid sm:grid-cols-2 lg:grid-cols-3 gap-px bg-gold/[.07]" method="POST">
        @csrf
        @foreach($items as $item)
        <div class="mc relative bg-s1 flex flex-col overflow-hidden group cursor-pointer" data-cat="plats">
          <div class="overflow-hidden h-56 relative">
            <input type="hidden" name="item_id" value="{{$item->id}}">
            <img src="{{ asset('storage/'.$item->image) }}" class="mc-img w-full h-full object-cover brightness-75" alt="" />
            <div class="absolute top-3 left-3"><span class="bg-gold text-dark text-[9px] tracking-[.1em] uppercase px-2.5 py-1 font-semibold">⭐ Signature</span></div>
            <div class="absolute inset-0 bg-gradient-to-t from-dark/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-400 flex items-end p-4"><button type="submit" class="w-full py-2.5 bg-gold text-dark text-[10px] tracking-[.14em] uppercase font-semibold hover:bg-gold-h transition-all border-0 cursor-pointer">+ Ajouter à la commande</button></div>
          </div>
          <div class="p-6 flex flex-col flex-1"><span class="text-[9px] tracking-[.22em] uppercase text-gold mb-1.5">{{$item->category->name}}</span>
            <h3 class="font-display text-xl leading-tight mb-2">{{$item->name}}</h3>
            <p class="text-[11px] text-cream/40 leading-relaxed flex-1 mb-4">{{$item->description}}</p>
            <div class="flex items-center justify-between pt-3 border-t border-gold/[.08]"><span class="font-display text-xl text-gold">{{$item->prix}} <span class="text-sm text-cream/25">MAD</span></span>
              <div class="flex items-center gap-2"><span class="text-[10px] text-cream/25">⏱ {{$item->temp_prepa}}</span><span class="text-[9px] px-2 py-0.5 border border-gold/20 text-gold/55">🕌 Halal</span></div>
            </div>
          </div>
        </div>
        @endforeach

    </div>
    <div class="text-center mt-10"><a href="#" class="inline-block px-10 py-4 border border-cream/20 text-cream text-[11px] tracking-[.18em] uppercase hover:border-gold hover:text-gold transition-all no-underline">Voir la carte complète</a></div>
    </forom>
  </section>


  <!-- ══════════════════════════════════════
     CTA PARALLAX BANNER
══════════════════════════════════════ -->
  <section class="relative py-28 overflow-hidden">
    <div class="absolute inset-0 plx bg-cover bg-center" style="background-image:url('https://images.unsplash.com/photo-1550966871-3ed3cdb5ed0c?w=1600&q=80');filter:brightness(.22)"></div>
    <div class="absolute inset-0" style="background:radial-gradient(ellipse at center,rgba(200,169,110,.07),transparent 65%)"></div>
    <div class="relative text-center px-6">
      <span class="block text-[10px] tracking-[.4em] uppercase text-gold mb-4">Expérience privée</span>
      <h2 class="font-display font-light mb-6" style="font-size:clamp(2.2rem,6vw,4rem)">Célébrez vos <em class="italic text-gold">moments</em><br>les plus précieux</h2>
      <p class="text-[13px] text-cream/40 tracking-wide mb-10 max-w-xl mx-auto leading-loose">Anniversaires, mariages, dîners d'affaires — notre équipe crée des expériences sur mesure.</p>
      <button onclick="openRes()" class="px-12 py-4 bg-gold text-dark text-[11px] tracking-[.18em] uppercase font-semibold hover:bg-gold-h transition-all border-0 cursor-pointer">Organiser mon événement</button>
    </div>
  </section>


  <!-- ══════════════════════════════════════
     GALLERY
══════════════════════════════════════ -->
  <section id="gallery" class="bg-dark">
    <div class="text-center pt-20 pb-12 px-6">
      <span class="block text-[10px] tracking-[.4em] uppercase text-gold mb-4">Galerie</span>
      <h2 class="font-display font-light" style="font-size:clamp(2rem,5vw,3rem)">L'ambiance <em class="italic text-gold">La Maison</em></h2>
    </div>
    <div class="grid grid-cols-2 md:grid-cols-4" style="grid-template-rows:repeat(2,220px)">
      <div class="relative overflow-hidden group col-span-2 row-span-2"><img src="https://images.unsplash.com/photo-1550966871-3ed3cdb5ed0c?w=900&q=80" class="w-full h-full object-cover brightness-75 transition-all duration-700 group-hover:scale-105 group-hover:brightness-90" alt="" />
        <div class="absolute inset-0 bg-gradient-to-t from-dark/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex items-end p-6"><span class="text-[10px] tracking-[.25em] uppercase text-gold">La Salle</span></div>
      </div>
      <div class="relative overflow-hidden group"><img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?w=600&q=80" class="w-full h-full object-cover brightness-75 transition-all duration-700 group-hover:scale-105" alt="" />
        <div class="absolute inset-0 bg-gradient-to-t from-dark/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-4"><span class="text-[10px] tracking-[.2em] uppercase text-gold">Nos Plats</span></div>
      </div>
      <div class="relative overflow-hidden group"><img src="https://images.unsplash.com/photo-1467003909585-2f8a72700288?w=600&q=80" class="w-full h-full object-cover brightness-75 transition-all duration-700 group-hover:scale-105" alt="" />
        <div class="absolute inset-0 bg-gradient-to-t from-dark/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-4"><span class="text-[10px] tracking-[.2em] uppercase text-gold">La Cuisine</span></div>
      </div>
      <div class="relative overflow-hidden group"><img src="https://images.unsplash.com/photo-1414235077428-338989a2e8c0?w=600&q=80" class="w-full h-full object-cover brightness-75 transition-all duration-700 group-hover:scale-105" alt="" />
        <div class="absolute inset-0 bg-gradient-to-t from-dark/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-4"><span class="text-[10px] tracking-[.2em] uppercase text-gold">Desserts</span></div>
      </div>
      <div class="relative overflow-hidden group"><img src="https://images.unsplash.com/photo-1559339352-11d035aa65de?w=600&q=80" class="w-full h-full object-cover brightness-75 transition-all duration-700 group-hover:scale-105" alt="" />
        <div class="absolute inset-0 bg-gradient-to-t from-dark/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-4"><span class="text-[10px] tracking-[.2em] uppercase text-gold">Ambiance</span></div>
      </div>
    </div>
  </section>


  <!-- ══════════════════════════════════════
     TESTIMONIALS
══════════════════════════════════════ -->
  <section class="py-24 px-6 bg-s1">
    <div class="max-w-5xl mx-auto">
      <div class="text-center mb-14">
        <span class="block text-[10px] tracking-[.4em] uppercase text-gold mb-4">Avis clients</span>
        <h2 class="font-display font-light" style="font-size:clamp(2rem,4vw,2.8rem)">Ce que disent nos <em class="italic text-gold">convives</em></h2>
      </div>
      <div class="grid md:grid-cols-3 gap-px bg-gold/[.07]">
        <div class="bg-s1 p-8">
          <div class="text-gold text-lg mb-4">★★★★★</div>
          <p class="font-display text-base italic text-cream/65 leading-relaxed mb-5">"Une expérience gastronomique inoubliable. Le service, l'ambiance, les plats — tout était parfait."</p>
          <div class="flex items-center gap-3">
            <div class="w-8 h-8 bg-gold/15 border border-gold/20 flex items-center justify-center text-[10px] text-gold">SA</div>
            <div>
              <div class="text-[12px] text-cream">Sofia Alami</div>
              <div class="text-[10px] text-cream/25">Casablanca</div>
            </div>
          </div>
        </div>
        <div class="bg-s1 p-8">
          <div class="text-gold text-lg mb-4">★★★★★</div>
          <p class="font-display text-base italic text-cream/65 leading-relaxed mb-5">"Le meilleur restaurant de Casablanca. La Côte de Bœuf est tout simplement exceptionnelle."</p>
          <div class="flex items-center gap-3">
            <div class="w-8 h-8 bg-gold/15 border border-gold/20 flex items-center justify-center text-[10px] text-gold">KM</div>
            <div>
              <div class="text-[12px] text-cream">Kamal Mansouri</div>
              <div class="text-[10px] text-cream/25">Marrakech</div>
            </div>
          </div>
        </div>
        <div class="bg-s1 p-8">
          <div class="text-gold text-lg mb-4">★★★★★</div>
          <p class="font-display text-base italic text-cream/65 leading-relaxed mb-5">"L'alliance parfaite entre cuisine française et marocaine. Nous revenons dès que possible."</p>
          <div class="flex items-center gap-3">
            <div class="w-8 h-8 bg-gold/15 border border-gold/20 flex items-center justify-center text-[10px] text-gold">LB</div>
            <div>
              <div class="text-[12px] text-cream">Leila Bensouda</div>
              <div class="text-[10px] text-cream/25">Paris</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- ══════════════════════════════════════
     CONTACT
══════════════════════════════════════ -->
  <section id="contact" class="py-24 px-6 bg-dark">
    <div class="max-w-5xl mx-auto grid md:grid-cols-2 gap-16">
      <div>
        <span class="block text-[10px] tracking-[.4em] uppercase text-gold mb-4">Nous trouver</span>
        <h2 class="font-display font-light mb-8" style="font-size:clamp(2rem,4vw,2.8rem)">Venez nous <em class="italic text-gold">rendre visite</em></h2>
        <div class="space-y-5">
          <div class="flex items-start gap-4">
            <div class="w-8 h-8 border border-gold/20 flex items-center justify-center text-gold flex-shrink-0 text-sm">📍</div>
            <div>
              <div class="text-[10px] tracking-[.2em] uppercase text-gold mb-1">Adresse</div>
              <div class="text-[13px] text-cream/50 leading-loose">15 Avenue des Arts<br>Casablanca 20000, Maroc</div>
            </div>
          </div>
          <div class="flex items-start gap-4">
            <div class="w-8 h-8 border border-gold/20 flex items-center justify-center text-gold flex-shrink-0 text-sm">⏰</div>
            <div>
              <div class="text-[10px] tracking-[.2em] uppercase text-gold mb-1">Horaires</div>
              <div class="text-[13px] text-cream/50 leading-loose">Mar–Ven : 12h–15h · 19h–23h<br>Sam : 12h–23h · Dim–Lun : Fermé</div>
            </div>
          </div>
          <div class="flex items-start gap-4">
            <div class="w-8 h-8 border border-gold/20 flex items-center justify-center text-gold flex-shrink-0 text-sm">📞</div>
            <div>
              <div class="text-[10px] tracking-[.2em] uppercase text-gold mb-1">Téléphone</div>
              <div class="text-[13px] text-cream/50">+212 522 000 000</div>
            </div>
          </div>
          <div class="flex items-start gap-4">
            <div class="w-8 h-8 border border-gold/20 flex items-center justify-center text-gold flex-shrink-0 text-sm">✉</div>
            <div>
              <div class="text-[10px] tracking-[.2em] uppercase text-gold mb-1">Email</div>
              <div class="text-[13px] text-cream/50">contact@lamaison.ma</div>
            </div>
          </div>
        </div>
      </div>
      <div>
        <span class="block text-[10px] tracking-[.4em] uppercase text-gold mb-4">Message</span>
        <h2 class="font-display font-light mb-8" style="font-size:clamp(2rem,4vw,2.8rem)">Écrivez-<em class="italic text-gold">nous</em></h2>
        <div class="flex flex-col gap-3">
          <input type="text" placeholder="Votre nom" class="fld bg-s1 border border-gold/[.12] px-5 py-3.5 text-[13px] text-cream placeholder-cream/20 font-body transition-colors" />
          <input type="email" placeholder="Votre email" class="fld bg-s1 border border-gold/[.12] px-5 py-3.5 text-[13px] text-cream placeholder-cream/20 font-body transition-colors" />
          <textarea rows="4" placeholder="Votre message…" class="fld bg-s1 border border-gold/[.12] px-5 py-3.5 text-[13px] text-cream placeholder-cream/20 font-body resize-none transition-colors"></textarea>
          <button class="py-4 bg-gold text-dark text-[11px] tracking-[.18em] uppercase font-semibold hover:bg-gold-h transition-all border-0 cursor-pointer">Envoyer le message</button>
        </div>
      </div>
    </div>
  </section>


  <!-- FOOTER -->
  <footer class="bg-[#060606] px-6 md:px-12 pt-16 pb-8">
    <div class="grid md:grid-cols-4 gap-10 mb-12">
      <div><span class="font-display text-3xl text-gold block mb-3">La Maison</span>
        <p class="text-[12px] text-cream/30 leading-loose mb-5">Restaurant gastronomique au cœur de Casablanca.</p>
        <div class="flex gap-3"><a href="#" class="w-8 h-8 border border-gold/15 flex items-center justify-center text-cream/25 hover:border-gold hover:text-gold transition-all no-underline text-sm">f</a><a href="#" class="w-8 h-8 border border-gold/15 flex items-center justify-center text-cream/25 hover:border-gold hover:text-gold transition-all no-underline text-xs">ig</a></div>
      </div>
      <div>
        <div class="text-[9px] tracking-[.3em] uppercase text-gold mb-5">Navigation</div>
        <ul class="space-y-2.5 list-none p-0">
          <li><a href="#top" class="text-[12px] text-cream/30 hover:text-cream no-underline transition-colors">Accueil</a></li>
          <li><a href="#about" class="text-[12px] text-cream/30 hover:text-cream no-underline transition-colors">Notre Histoire</a></li>
          <li><a href="#menu" class="text-[12px] text-cream/30 hover:text-cream no-underline transition-colors">Notre Carte</a></li>
          <li><a href="#gallery" class="text-[12px] text-cream/30 hover:text-cream no-underline transition-colors">Galerie</a></li>
          <li><a href="#contact" class="text-[12px] text-cream/30 hover:text-cream no-underline transition-colors">Contact</a></li>
        </ul>
      </div>
      <div>
        <div class="text-[9px] tracking-[.3em] uppercase text-gold mb-5">Horaires</div>
        <ul class="space-y-2 list-none p-0">
          <li><span class="text-[12px] text-cream/30">Mar–Ven</span><br><span class="text-[11px] text-cream/15">12h–15h · 19h–23h</span></li>
          <li><span class="text-[12px] text-cream/30">Samedi</span><br><span class="text-[11px] text-cream/15">12h–23h</span></li>
          <li><span class="text-[12px] text-cream/30">Dim & Lun</span><br><span class="text-[11px] text-cream/15">Fermé</span></li>
        </ul>
      </div>
      <div>
        <div class="text-[9px] tracking-[.3em] uppercase text-gold mb-5">Réservation</div>
        <p class="text-[12px] text-cream/30 mb-4 leading-relaxed">Réservez votre table en ligne ou appelez-nous.</p><button onclick="openRes()" class="w-full py-3 bg-gold text-dark text-[10px] tracking-[.14em] uppercase font-semibold hover:bg-gold-h transition-all border-0 cursor-pointer mb-3">Réserver une table</button><a href="tel:+212522000000" class="block py-3 border border-gold/15 text-cream/35 text-[10px] tracking-[.14em] uppercase text-center hover:border-gold/35 hover:text-cream transition-all no-underline">+212 522 000 000</a>
      </div>
    </div>
    <div class="border-t border-gold/[.07] pt-8 flex flex-wrap justify-between items-center gap-4">
      <span class="text-[10px] text-cream/15">© 2025 La Maison. Tous droits réservés.</span>
      <div class="flex gap-5"><a href="#" class="text-[10px] tracking-[.14em] uppercase text-cream/15 hover:text-gold no-underline transition-colors">Instagram</a><a href="#" class="text-[10px] tracking-[.14em] uppercase text-cream/15 hover:text-gold no-underline transition-colors">Facebook</a><a href="#" class="text-[10px] tracking-[.14em] uppercase text-cream/15 hover:text-gold no-underline transition-colors">TripAdvisor</a></div>
    </div>
  </footer>


  <!-- ══════════════════════════════════════
     RESERVATION MODAL
══════════════════════════════════════ -->
  <div id="resModal" class="hidden fixed inset-0 z-[100] flex items-center justify-center px-4">
    <div class="absolute inset-0 bg-black/85 backdrop-blur-sm" onclick="closeRes()"></div>
    <div class="relative bg-s1 border border-gold/20 w-full max-w-lg shadow-2xl" style="animation:fadeUp .3s ease">
      <div class="flex items-center justify-between px-8 py-5 border-b border-gold/[.1]">
        <div><span class="block text-[9px] tracking-[.35em] uppercase text-gold mb-0.5">La Maison</span>
          <h3 class="font-display text-2xl font-light">Réserver une <em class="italic text-gold">table</em></h3>
        </div>
        <button onclick="closeRes()" class="w-8 h-8 border border-gold/20 flex items-center justify-center text-cream/30 hover:text-gold hover:border-gold transition-all text-sm bg-transparent cursor-pointer">✕</button>
      </div>
      <div class="p-8 flex flex-col gap-4">
        <form action="{{route('reservation')}}" method="POST">
          @csrf
          <div class="grid grid-cols-2 gap-4">
            <div><label class="block text-[9px] tracking-[.2em] uppercase text-cream/30 mb-2">Prénom *</label><input name="name" type="text" placeholder="Ahmed" class="fld w-full bg-s2 border border-gold/[.12] px-4 py-3 text-[13px] text-cream placeholder-cream/20 font-body transition-colors" /></div>
            <div><label class="block text-[9px] tracking-[.2em] uppercase text-cream/30 mb-2">Nom *</label><input name="lastName" type="text" placeholder="Benali" class="fld w-full bg-s2 border border-gold/[.12] px-4 py-3 text-[13px] text-cream placeholder-cream/20 font-body transition-colors" /></div>
          </div>
          <div><label class="block text-[9px] tracking-[.2em] uppercase text-cream/30 mb-2">Téléphone *</label><input name="telephone" type="tel" placeholder="+212 6XX XXX XXX" class="fld w-full bg-s2 border border-gold/[.12] px-4 py-3 text-[13px] text-cream placeholder-cream/20 font-body transition-colors" /></div>
          <div class="grid grid-cols-2 gap-4">
            <div><label class="block text-[9px] tracking-[.2em] uppercase text-cream/30 mb-2">Date *</label><input name="reservationDate" type="date" class="fld w-full bg-s2 border border-gold/[.12] px-4 py-3 text-[13px] text-cream font-body transition-colors" /></div>
            <div><label class="block text-[9px] tracking-[.2em] uppercase text-cream/30 mb-2">Heure *</label>
              <select name="Hour" class="fld w-full bg-s2 border border-gold/[.12] px-4 py-3 text-[13px] text-cream font-body cursor-pointer">
                <option class="bg-s2">19:00</option>
                <option class="bg-s2">19:30</option>
                <option class="bg-s2">20:00</option>
                <option class="bg-s2">20:30</option>
                <option class="bg-s2">21:00</option>
              </select>
            </div>
          </div>
          <div><label class="block text-[9px] tracking-[.2em] uppercase text-cream/30 mb-2">Personnes *</label>
            <select name="numberOfPeaple" class="fld w-full bg-s2 border border-gold/[.12] px-4 py-3 text-[13px] text-cream font-body cursor-pointer">
              <option class="bg-s2">1 personne</option>
              <option class="bg-s2" selected>2 personnes</option>
              <option class="bg-s2">3 personnes</option>
              <option class="bg-s2">4 personnes</option>
              <option class="bg-s2">5 personnes</option>
              <option class="bg-s2">6+ personnes</option>
            </select>
          </div>
          <div><label class="block text-[9px] tracking-[.2em] uppercase text-cream/30 mb-2">Numero du Table *</label>
            <select name="tableNumber" class="fld w-full bg-s2 border border-gold/[.12] px-4 py-3 text-[13px] text-cream font-body cursor-pointer">
              <option class="bg-s2">1 </option>
              <option class="bg-s2" selected>2 </option>
              <option class="bg-s2">3 </option>
              <option class="bg-s2">4 </option>
              <option class="bg-s2">5 </option>
              <option class="bg-s2">6</option>
              <option class="bg-s2">7</option>
              <option class="bg-s2">8</option>
              <option class="bg-s2">9</option>
              <option class="bg-s2">10</option>

            </select>
          </div>
          <button class="w-full py-4 bg-gold text-dark text-[11px] tracking-[.18em] uppercase font-semibold hover:bg-gold-h transition-all border-0 cursor-pointer">Confirmer la réservation</button>
          <p class="text-[10px] text-cream/20 text-center">Confirmation par email · Annulation gratuite 24h avant</p>
        </form>
      </div>
    </div>
  </div>

  <!-- ══════════════════════════════════════
     ORDER DRAWER (slide-in)
══════════════════════════════════════ -->
  <div id="drawerBg" class="hidden fixed inset-0 bg-black/65 backdrop-blur-sm z-[80]" onclick="closeDrawer()"></div>
  <div id="orderDrawer" class="drawer fixed top-0 right-0 h-full w-full sm:w-[400px] bg-s1 border-l border-gold/[.12] z-[90] flex flex-col shadow-2xl">
    <div class="flex items-center justify-between px-6 py-5 border-b border-gold/[.1]">
      <div><span class="block text-[9px] tracking-[.3em] uppercase text-gold mb-0.5">Passer commande</span>
        <h3 class="font-display text-xl font-light">Ma <em class="italic text-gold">commande</em></h3>
      </div>
      <button onclick="closeDrawer()" class="w-8 h-8 border border-gold/20 flex items-center justify-center text-cream/30 hover:text-gold hover:border-gold transition-all text-sm bg-transparent cursor-pointer">✕</button>
    </div>
    <!-- Table select -->
    <div class="px-6 py-4 border-b border-gold/[.06] bg-s2">
      <label class="block text-[9px] tracking-[.22em] uppercase text-cream/30 mb-2">Numéro de table</label>
      <select class="fld w-full bg-s1 border border-gold/[.12] px-4 py-2.5 text-[12px] text-cream font-body cursor-pointer">
        <option class="bg-s1">Table 1</option>
        <option class="bg-s1">Table 2</option>
        <option class="bg-s1">Table 3</option>
        <option class="bg-s1">Table 4</option>
        <option class="bg-s1" selected>Table 12</option>
        <option class="bg-s1">Table 22</option>
      </select>
    </div>
    <!-- Items -->
    <div class="flex-1 overflow-y-auto px-6 py-4">
      <div id="emptyCart" class="flex flex-col items-center justify-center h-full text-center py-16">
        <div class="text-4xl mb-4 opacity-15">🍽</div>
        <div class="font-display text-lg text-cream/15 mb-1">Votre commande est vide</div>
        <div class="text-[11px] text-cream/10">Ajoutez des plats depuis la carte</div>
      </div>
      <div id="cartList" class="hidden divide-y divide-gold/[.05]"></div>
    </div>
    <!-- Total -->
    <div id="cartFooter" class="hidden border-t border-gold/[.1] px-6 py-5 bg-s2">
      <div class="flex justify-between mb-1"><span class="text-[11px] text-cream/35">Sous-total</span><span id="sub" class="text-[13px]">0 MAD</span></div>
      <div class="flex justify-between mb-4"><span class="text-[11px] text-cream/35">Service (10%)</span><span id="svc" class="text-[13px]">0 MAD</span></div>
      <div class="flex justify-between items-center py-3 border-t border-gold/[.1] mb-4">
        <span class="text-[11px] tracking-[.15em] uppercase text-gold">Total</span>
        <span id="tot" class="font-display text-xl text-gold">0 MAD</span>
      </div>
      <button onclick="placeOrder()" class="w-full py-4 bg-gold text-dark text-[11px] tracking-[.18em] uppercase font-semibold hover:bg-gold-h transition-all border-0 cursor-pointer">Passer la commande</button>
    </div>
  </div>

  <!-- TOAST -->
  <div id="toast" class="fixed bottom-8 left-1/2 -translate-x-1/2 z-[200] bg-s2 border border-cgreen/30 px-6 py-3.5 flex items-center gap-3 translate-y-20 opacity-0 transition-all duration-500 pointer-events-none shadow-xl whitespace-nowrap">
    <span id="tIcon" class="text-cgreen text-lg">✓</span>
    <div>
      <div id="tTitle" class="text-[13px] text-cream"></div>
      <div id="tSub" class="text-[10px] text-cream/35"></div>
    </div>
  </div>

  <script>
    // ── NAV scroll ──
    window.addEventListener('scroll', () => {
      document.getElementById('nav').classList.toggle('nav-solid', window.scrollY > 70);
    });

    // ── Mobile nav ──
    let mobOpen = false;

    function toggleMob() {
      mobOpen = !mobOpen;
      document.getElementById('mobNav').classList.toggle('hidden', !mobOpen);
      document.getElementById('h1').style.transform = mobOpen ? 'translateY(6px) rotate(45deg)' : '';
      document.getElementById('h2').style.opacity = mobOpen ? '0' : '1';
      document.getElementById('h3').style.transform = mobOpen ? 'translateY(-6px) rotate(-45deg)' : '';
    }

    function closeMob() {
      mobOpen = false;
      document.getElementById('mobNav').classList.add('hidden');
      document.getElementById('h1').style.transform = document.getElementById('h3').style.transform = '';
      document.getElementById('h2').style.opacity = '1';
    }

    // ── Menu tabs ──
    function setTab(btn, cat) {
      document.querySelectorAll('.mt').forEach(t => {
        t.classList.remove('on');
        t.classList.add('text-cream/45');
      });
      btn.classList.add('on');
      btn.classList.remove('text-cream/45');
      document.querySelectorAll('#menuGrid .mc').forEach(c => {
        c.style.display = (cat === 'all' || c.dataset.cat === cat) ? '' : 'none';
      });
    }

    // ── Reservation ──
    function openRes() {
      document.getElementById('resModal').classList.remove('hidden');
    }

    function closeRes() {
      document.getElementById('resModal').classList.add('hidden');
    }

    // ── Order drawer ──

    function openDrawer() {
      document.getElementById('orderDrawer').classList.add('open');
      document.getElementById('drawerBg').classList.remove('hidden');
    }

    function closeDrawer() {
      document.getElementById('orderDrawer').classList.remove('open');
      document.getElementById('drawerBg').classList.add('hidden');
    }



    function renderCart() {
      const list = document.getElementById('cartList');
      const empty = document.getElementById('emptyCart');
      const foot = document.getElementById('cartFooter');
      if (!cart.length) {
        empty.classList.remove('hidden');
        list.classList.add('hidden');
        foot.classList.add('hidden');
        return;
      }
      empty.classList.add('hidden');
      list.classList.remove('hidden');
      foot.classList.remove('hidden');
      list.innerHTML = cart.map((it, i) => `
      <div class="flex items-center gap-3 py-4">
        <div class="flex-1 min-w-0"><div class="text-[13px] text-cream truncate mb-0.5">${it.name}</div><div class="text-[11px] text-gold">${it.price} MAD</div></div>
        <div class="flex items-center gap-1 shrink-0">
          <button onclick="chgQty(${i},-1)" class="w-6 h-6 border border-gold/20 text-cream/35 hover:border-gold hover:text-gold text-xs flex items-center justify-center bg-transparent cursor-pointer transition-all">−</button>
          <span class="w-6 text-center text-[12px]">${it.qty}</span>
          <button onclick="chgQty(${i},1)"  class="w-6 h-6 border border-gold/20 text-cream/35 hover:border-gold hover:text-gold text-xs flex items-center justify-center bg-transparent cursor-pointer transition-all">+</button>
        </div>
        <span class="text-[12px] text-cream/40 w-14 text-right shrink-0">${it.price*it.qty} MAD</span>
        <button onclick="rmItem(${i})" class="text-cream/15 hover:text-cred transition-colors bg-transparent border-0 cursor-pointer text-xs ml-1">✕</button>
      </div>`).join('');
      const s = cart.reduce((a, i) => a + i.price * i.qty, 0);
      const v = Math.round(s * .1);
      document.getElementById('sub').textContent = `${s} MAD`;
      document.getElementById('svc').textContent = `${v} MAD`;
      document.getElementById('tot').textContent = `${s+v} MAD`;
    }


    // ── Toast ──
    function toast(icon, title, sub) {
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
    }
  </script>
</body>

</html>