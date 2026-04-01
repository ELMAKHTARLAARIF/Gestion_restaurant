@include('DocHtml.StartDocHtml')
  <!-- ══════════════════════════════════════
     HEADER
══════════════════════════════════════ -->
  @include('Component.HomeHeader')

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
@include('CLient.About')


  <!-- ══════════════════════════════════════
     MENU
══════════════════════════════════════ -->
@include('Shered.Menu')


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
@include('CLient.Contact')


  <!-- FOOTER -->
@include('Component.footer')

r  <!-- ══════════════════════════════════════
     RESERVATION MODAL
══════════════════════════════════════ -->
  <!-- ══════════════════════════════════════
     ORDER DRAWER (slide-in)
══════════════════════════════════════ -->
@include('CLient.Order')

  <!-- TOAST -->
  <div id="toast" class="fixed bottom-8 left-1/2 -translate-x-1/2 z-[200] bg-s2 border border-cgreen/30 px-6 py-3.5 flex items-center gap-3 translate-y-20 opacity-0 transition-all duration-500 pointer-events-none shadow-xl whitespace-nowrap">
    <span id="tIcon" class="text-cgreen text-lg">✓</span>
    <div>
      <div id="tTitle" class="text-[13px] text-cream"></div>
      <div id="tSub" class="text-[10px] text-cream/35"></div>
    </div>
  </div>
@include('DocHtml.EndDocHtml')
