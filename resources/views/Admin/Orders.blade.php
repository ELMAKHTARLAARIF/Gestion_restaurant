@include('Component.header')


  <!-- CONTENT -->
  <div class="flex-1 overflow-y-auto bg-ink">
    <div class="p-8 flex flex-col gap-7">


      <!-- ── STAT CARDS ── -->
      <div class="grid grid-cols-2 lg:grid-cols-5 gap-px bg-gold/[.07] animate-fu">
        <div class="stat-c bg-s1 px-6 py-5">
          <div class="flex items-center justify-between mb-2"><span class="text-[10px] tracking-[.2em] uppercase text-cream/30">Nouvelles</span><span class="text-base opacity-35">🆕</span></div>
          <div class="font-display text-[2.2rem] font-light leading-none mb-1.5 text-sage">3</div>
          <div class="flex items-center gap-1.5 text-[10px] text-cream/25"><span class="w-1.5 h-1.5 rounded-full bg-sage animate-pulse2"></span>En attente de traitement</div>
        </div>
        <div class="stat-c bg-s1 px-6 py-5">
          <div class="flex items-center justify-between mb-2"><span class="text-[10px] tracking-[.2em] uppercase text-cream/30">En cuisine</span><span class="text-base opacity-35">👨‍🍳</span></div>
          <div class="font-display text-[2.2rem] font-light leading-none mb-1.5 text-gold">5</div>
          <div class="flex items-center gap-1.5 text-[10px] text-cream/25"><span class="w-1.5 h-1.5 rounded-full bg-gold animate-pulse2"></span>En préparation</div>
        </div>
        <div class="stat-c bg-s1 px-6 py-5">
          <div class="flex items-center justify-between mb-2"><span class="text-[10px] tracking-[.2em] uppercase text-cream/30">Prêtes</span><span class="text-base opacity-35">✅</span></div>
          <div class="font-display text-[2.2rem] font-light leading-none mb-1.5 text-sky">2</div>
          <div class="text-[10px] text-cream/25">À servir</div>
        </div>
        <div class="stat-c bg-s1 px-6 py-5">
          <div class="flex items-center justify-between mb-2"><span class="text-[10px] tracking-[.2em] uppercase text-cream/30">Servies</span><span class="text-base opacity-35">🍽</span></div>
          <div class="font-display text-[2.2rem] font-light leading-none mb-1.5 text-lav">12</div>
          <div class="text-[10px] text-cream/25">Ce soir</div>
        </div>
        <div class="stat-c bg-s1 px-6 py-5">
          <div class="flex items-center justify-between mb-2"><span class="text-[10px] tracking-[.2em] uppercase text-cream/30">Revenus soir</span><span class="text-base opacity-35">💰</span></div>
          <div class="font-display text-[2.2rem] font-light leading-none mb-1.5 text-gold">8 420</div>
          <div class="text-[10px] text-cream/25">MAD · ▲ 8%</div>
        </div>
      </div>


      <!-- ── MAIN LAYOUT: Orders list + Detail panel ── -->
      <div class="grid xl:grid-cols-[1fr_380px] gap-6 animate-fu2">

        <!-- ── LEFT: Orders list ── -->
        <div class="bg-s1 border border-gold/[.1] flex flex-col">

          <!-- Filters row -->
          <div class="flex flex-wrap items-center gap-0 px-6 pt-5 border-b border-gold/[.08]">
            <button onclick="setTab(this,'all')"       class="f-tab on text-[11px] tracking-[.14em] uppercase px-4 pb-4 text-cream/38 hover:text-cream cursor-pointer bg-transparent border-0 whitespace-nowrap">Toutes <span class="text-gold ml-1">22</span></button>
            <button onclick="setTab(this,'new')"       class="f-tab text-[11px] tracking-[.14em] uppercase px-4 pb-4 text-cream/38 hover:text-cream cursor-pointer bg-transparent border-0 whitespace-nowrap">Nouvelles <span class="text-sage ml-1">3</span></button>
            <button onclick="setTab(this,'prep')"      class="f-tab text-[11px] tracking-[.14em] uppercase px-4 pb-4 text-cream/38 hover:text-cream cursor-pointer bg-transparent border-0 whitespace-nowrap">En cuisine <span class="text-gold ml-1">5</span></button>
            <button onclick="setTab(this,'ready')"     class="f-tab text-[11px] tracking-[.14em] uppercase px-4 pb-4 text-cream/38 hover:text-cream cursor-pointer bg-transparent border-0 whitespace-nowrap">Prêtes <span class="text-sky ml-1">2</span></button>
            <button onclick="setTab(this,'served')"    class="f-tab text-[11px] tracking-[.14em] uppercase px-4 pb-4 text-cream/38 hover:text-cream cursor-pointer bg-transparent border-0 whitespace-nowrap">Servies</button>
            <button onclick="setTab(this,'cancelled')" class="f-tab text-[11px] tracking-[.14em] uppercase px-4 pb-4 text-cream/38 hover:text-cream cursor-pointer bg-transparent border-0 whitespace-nowrap">Annulées</button>
            <div class="flex-1"></div>
            <div class="flex items-center gap-2 pb-3">
              <select class="bg-s2 border border-gold/[.1] px-3 py-1.5 text-[11px] text-cream/45 font-body cursor-pointer">
                <option>Heure ↓</option><option>Heure ↑</option><option>Montant ↓</option><option>Table</option>
              </select>
            </div>
          </div>

          <!-- Orders list scroll -->
          <div class="flex-1 overflow-y-auto divide-y divide-gold/[.04]">

            <!-- ── ORDER CARD 1 — New / Urgent ── -->
            <div class="order-card p-urgent px-5 py-4 cursor-pointer" onclick="showDetail('ord-248')">
              <div class="flex items-start gap-4">
                <div class="flex flex-col items-center gap-1 pt-0.5 shrink-0">
                  <div class="w-10 h-10 bg-rose/10 border border-rose/20 flex items-center justify-center font-display text-lg text-rose">M</div>
                  <span class="text-[8px] tracking-wide text-rose/60 uppercase">Urgent</span>
                </div>
                <div class="flex-1 min-w-0">
                  <div class="flex items-center gap-3 mb-1.5 flex-wrap">
                    <span class="font-display text-base text-cream">#0248 — M. Alami</span>
                    <span class="badge b-new"><span class="badge-dot"></span>Nouvelle</span>
                    <span class="text-[10px] text-rose border border-rose/20 bg-rose/5 px-2 py-0.5">⚡ Urgent</span>
                  </div>
                  <div class="flex items-center gap-4 mb-3 text-[11px] text-cream/40">
                    <span class="flex items-center gap-1"><svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-2 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>Table 12</span>
                    <span class="flex items-center gap-1"><svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>il y a 3 min</span>
                    <span>3 articles</span>
                  </div>
                  <!-- Items preview -->
                  <div class="flex flex-wrap gap-1.5 mb-3">
                    <span class="text-[10px] bg-s2 border border-gold/[.08] px-2 py-1 text-cream/50">Côte de Bœuf ×1</span>
                    <span class="text-[10px] bg-s2 border border-gold/[.08] px-2 py-1 text-cream/50">Saint-Jacques ×2</span>
                    <span class="text-[10px] bg-s2 border border-gold/[.08] px-2 py-1 text-cream/50">Thé menthe ×2</span>
                  </div>
                  <div class="flex items-center justify-between">
                    <span class="font-display text-lg text-gold">750 <span class="text-sm text-cream/25">MAD</span></span>
                    <div class="card-actions flex gap-1.5">
                      <button class="act act-ok w-[68px] h-7 text-[9px] tracking-[.12em] uppercase gap-1">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 13l4 4L19 7"/></svg>
                        Accepter
                      </button>
                      <button class="act act-skip w-7 h-7" title="Mettre en attente">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10 9v6m4-6v6m7-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                      </button>
                      <button class="act act-del w-7 h-7" title="Annuler" onclick="openCancel(event)">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 18L18 6M6 6l12 12"/></svg>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- ── ORDER CARD 2 — New ── -->
            <div class="order-card p-high px-5 py-4 cursor-pointer" onclick="showDetail('ord-247')">
              <div class="flex items-start gap-4">
                <div class="flex flex-col items-center gap-1 pt-0.5 shrink-0">
                  <div class="w-10 h-10 bg-gd border border-gold/20 flex items-center justify-center font-display text-lg text-gold">S</div>
                </div>
                <div class="flex-1 min-w-0">
                  <div class="flex items-center gap-3 mb-1.5 flex-wrap">
                    <span class="font-display text-base text-cream">#0247 — Mme Saidi</span>
                    <span class="badge b-new"><span class="badge-dot"></span>Nouvelle</span>
                  </div>
                  <div class="flex items-center gap-4 mb-3 text-[11px] text-cream/40">
                    <span class="flex items-center gap-1"><svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-2 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>Table 5</span>
                    <span class="flex items-center gap-1"><svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>il y a 8 min</span>
                    <span>2 articles</span>
                  </div>
                  <div class="flex flex-wrap gap-1.5 mb-3">
                    <span class="text-[10px] bg-s2 border border-gold/[.08] px-2 py-1 text-cream/50">Harira ×1</span>
                    <span class="text-[10px] bg-s2 border border-gold/[.08] px-2 py-1 text-cream/50">Fondant chocolat ×1</span>
                  </div>
                  <div class="flex items-center justify-between">
                    <span class="font-display text-lg text-gold">190 <span class="text-sm text-cream/25">MAD</span></span>
                    <div class="card-actions flex gap-1.5">
                      <button class="act act-ok w-[68px] h-7 text-[9px] tracking-[.12em] uppercase gap-1"><svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 13l4 4L19 7"/></svg>Accepter</button>
                      <button class="act act-skip w-7 h-7" title="Mettre en attente"><svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10 9v6m4-6v6m7-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg></button>
                      <button class="act act-del w-7 h-7" title="Annuler" onclick="openCancel(event)"><svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 18L18 6M6 6l12 12"/></svg></button>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- ── ORDER CARD 3 — In prep ── -->
            <div class="order-card p-high px-5 py-4 cursor-pointer" onclick="showDetail('ord-246')">
              <div class="flex items-start gap-4">
                <div class="flex flex-col items-center gap-1 pt-0.5 shrink-0">
                  <div class="w-10 h-10 bg-gd border border-gold/20 flex items-center justify-center font-display text-lg text-gold">C</div>
                </div>
                <div class="flex-1 min-w-0">
                  <div class="flex items-center gap-3 mb-1.5 flex-wrap">
                    <span class="font-display text-base text-cream">#0246 — M. Cherkaoui</span>
                    <span class="badge b-prep"><span class="badge-dot"></span>En cuisine</span>
                  </div>
                  <div class="flex items-center gap-4 mb-2 text-[11px] text-cream/40">
                    <span class="flex items-center gap-1"><svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-2 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>Table 22</span>
                    <span class="flex items-center gap-1"><svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>il y a 14 min</span>
                    <span>5 articles</span>
                  </div>
                  <!-- Progress bar -->
                  <div class="mb-3">
                    <div class="flex justify-between text-[9px] text-cream/30 mb-1"><span>Progression cuisine</span><span class="text-gold">3/5 plats</span></div>
                    <div class="h-1 bg-s3 overflow-hidden"><div class="h-full bg-gold" style="width:60%"></div></div>
                  </div>
                  <div class="flex flex-wrap gap-1.5 mb-3">
                    <span class="text-[10px] bg-s2 border border-sage/20 px-2 py-1 text-sage/70">✓ Tagine ×2</span>
                    <span class="text-[10px] bg-s2 border border-sage/20 px-2 py-1 text-sage/70">✓ Harira ×1</span>
                    <span class="text-[10px] bg-s2 border border-gold/[.08] px-2 py-1 text-cream/40">Côte de Bœuf ×2</span>
                  </div>
                  <div class="flex items-center justify-between">
                    <span class="font-display text-lg text-gold">1 145 <span class="text-sm text-cream/25">MAD</span></span>
                    <div class="card-actions flex gap-1.5">
                      <button class="act act-ok w-[68px] h-7 text-[9px] tracking-[.12em] uppercase gap-1"><svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 13l4 4L19 7"/></svg>Prête</button>
                      <button class="act act-del w-7 h-7" title="Annuler" onclick="openCancel(event)"><svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 18L18 6M6 6l12 12"/></svg></button>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- ── ORDER CARD 4 — Ready ── -->
            <div class="order-card p-high px-5 py-4 cursor-pointer bg-sky/[.012]" onclick="showDetail('ord-245')">
              <div class="flex items-start gap-4">
                <div class="flex flex-col items-center gap-1 pt-0.5 shrink-0">
                  <div class="w-10 h-10 bg-sky/10 border border-sky/20 flex items-center justify-center font-display text-lg text-sky">H</div>
                </div>
                <div class="flex-1 min-w-0">
                  <div class="flex items-center gap-3 mb-1.5 flex-wrap">
                    <span class="font-display text-base text-cream">#0245 — M. Hassani</span>
                    <span class="badge b-ready"><span class="badge-dot"></span>Prête à servir</span>
                  </div>
                  <div class="flex items-center gap-4 mb-3 text-[11px] text-cream/40">
                    <span class="flex items-center gap-1"><svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-2 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>Table 8</span>
                    <span class="flex items-center gap-1"><svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>Prête depuis 4 min</span>
                  </div>
                  <div class="flex flex-wrap gap-1.5 mb-3">
                    <span class="text-[10px] bg-sky/5 border border-sky/20 px-2 py-1 text-sky/70">Millefeuille ×1</span>
                    <span class="text-[10px] bg-sky/5 border border-sky/20 px-2 py-1 text-sky/70">Jus grenade ×2</span>
                    <span class="text-[10px] bg-sky/5 border border-sky/20 px-2 py-1 text-sky/70">Foie Gras ×1</span>
                  </div>
                  <div class="flex items-center justify-between">
                    <span class="font-display text-lg text-gold">400 <span class="text-sm text-cream/25">MAD</span></span>
                    <div class="card-actions flex gap-1.5">
                      <button class="act act-ok w-[78px] h-7 text-[9px] tracking-[.12em] uppercase gap-1"><svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 13l4 4L19 7"/></svg>Servie ✓</button>
                      <button class="act act-del w-7 h-7" title="Annuler" onclick="openCancel(event)"><svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 18L18 6M6 6l12 12"/></svg></button>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- ── ORDER CARD 5 — Served ── -->
            <div class="order-card p-normal px-5 py-4 cursor-pointer opacity-70" onclick="showDetail('ord-244')">
              <div class="flex items-start gap-4">
                <div class="w-10 h-10 bg-lav/10 border border-lav/15 flex items-center justify-center font-display text-lg text-lav shrink-0 mt-0.5">I</div>
                <div class="flex-1 min-w-0">
                  <div class="flex items-center gap-3 mb-1.5 flex-wrap">
                    <span class="font-display text-base text-cream/70">#0244 — M. El Idrissi</span>
                    <span class="badge b-served"><span class="badge-dot"></span>Servie</span>
                  </div>
                  <div class="flex items-center gap-4 mb-3 text-[11px] text-cream/30">
                    <span>Table Privée</span><span>Servi il y a 22 min</span><span>8 articles</span>
                  </div>
                  <div class="flex items-center justify-between">
                    <span class="font-display text-lg text-cream/40">2 480 <span class="text-sm text-cream/20">MAD</span></span>
                    <div class="card-actions flex gap-1.5">
                      <button class="act act-ok w-[70px] h-7 text-[9px] tracking-[.12em] uppercase gap-1 text-lav border-lav/20 hover:border-lav hover:text-lav hover:bg-lav/07">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/></svg>
                        Payée
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- ── ORDER CARD 6 — New ── -->
            <div class="order-card p-high px-5 py-4 cursor-pointer" onclick="showDetail('ord-243')">
              <div class="flex items-start gap-4">
                <div class="w-10 h-10 bg-gd border border-gold/20 flex items-center justify-center font-display text-lg text-gold shrink-0 mt-0.5">T</div>
                <div class="flex-1 min-w-0">
                  <div class="flex items-center gap-3 mb-1.5 flex-wrap">
                    <span class="font-display text-base text-cream">#0243 — Mme Tazi</span>
                    <span class="badge b-new"><span class="badge-dot"></span>Nouvelle</span>
                  </div>
                  <div class="flex items-center gap-4 mb-3 text-[11px] text-cream/40">
                    <span class="flex items-center gap-1"><svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-2 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>Table 2</span>
                    <span class="flex items-center gap-1"><svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>il y a 2 min</span>
                    <span>1 article</span>
                  </div>
                  <div class="flex flex-wrap gap-1.5 mb-3">
                    <span class="text-[10px] bg-s2 border border-gold/[.08] px-2 py-1 text-cream/50">Crème brûlée safran ×1</span>
                    <span class="text-[10px] bg-s2 border border-gold/[.08] px-2 py-1 text-cream/50">Thé menthe ×1</span>
                  </div>
                  <div class="flex items-center justify-between">
                    <span class="font-display text-lg text-gold">130 <span class="text-sm text-cream/25">MAD</span></span>
                    <div class="card-actions flex gap-1.5">
                      <button class="act act-ok w-[68px] h-7 text-[9px] tracking-[.12em] uppercase gap-1"><svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 13l4 4L19 7"/></svg>Accepter</button>
                      <button class="act act-skip w-7 h-7" title="Attente"><svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10 9v6m4-6v6m7-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg></button>
                      <button class="act act-del w-7 h-7" title="Annuler" onclick="openCancel(event)"><svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 18L18 6M6 6l12 12"/></svg></button>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- ── ORDER CARD 7 — In Prep ── -->
            <div class="order-card p-high px-5 py-4 cursor-pointer" onclick="showDetail('ord-242')">
              <div class="flex items-start gap-4">
                <div class="w-10 h-10 bg-gd border border-gold/20 flex items-center justify-center font-display text-lg text-gold shrink-0 mt-0.5">B</div>
                <div class="flex-1 min-w-0">
                  <div class="flex items-center gap-3 mb-1.5 flex-wrap">
                    <span class="font-display text-base text-cream">#0242 — M. Berrada</span>
                    <span class="badge b-prep"><span class="badge-dot"></span>En cuisine</span>
                  </div>
                  <div class="flex items-center gap-4 mb-2 text-[11px] text-cream/40">
                    <span>Table 12</span><span>il y a 19 min</span><span>4 articles</span>
                  </div>
                  <div class="mb-3">
                    <div class="flex justify-between text-[9px] text-cream/30 mb-1"><span>Progression</span><span class="text-gold">2/4 plats</span></div>
                    <div class="h-1 bg-s3 overflow-hidden"><div class="h-full bg-gold" style="width:50%"></div></div>
                  </div>
                  <div class="flex items-center justify-between">
                    <span class="font-display text-lg text-gold">870 <span class="text-sm text-cream/25">MAD</span></span>
                    <div class="card-actions flex gap-1.5">
                      <button class="act act-ok w-[68px] h-7 text-[9px] tracking-[.12em] uppercase gap-1"><svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 13l4 4L19 7"/></svg>Prête</button>
                      <button class="act act-del w-7 h-7" onclick="openCancel(event)"><svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 18L18 6M6 6l12 12"/></svg></button>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- ── ORDER CARD 8 — Paid / Closed ── -->
            <div class="order-card p-normal px-5 py-4 cursor-pointer opacity-50" onclick="showDetail('ord-241')">
              <div class="flex items-start gap-4">
                <div class="w-10 h-10 bg-s2 border border-sage/15 flex items-center justify-center font-display text-lg text-sage/50 shrink-0 mt-0.5">M</div>
                <div class="flex-1 min-w-0">
                  <div class="flex items-center gap-3 mb-1.5 flex-wrap">
                    <span class="font-display text-base text-cream/60">#0241 — Mme Moussaoui</span>
                    <span class="badge b-paid"><span class="badge-dot"></span>Payée</span>
                  </div>
                  <div class="flex items-center gap-4 text-[11px] text-cream/25">
                    <span>Table 3</span><span>Clôturée il y a 45 min</span><span>310 MAD</span>
                  </div>
                </div>
              </div>
            </div>

          </div><!-- /orders scroll -->

          <!-- Table footer -->
          <div class="px-6 py-3.5 border-t border-gold/[.07] bg-s2 flex items-center justify-between">
            <span class="text-[11px] text-cream/28">22 commandes ce soir</span>
            <div class="flex items-center gap-1.5">
              <button class="w-7 h-7 border border-gold/[.12] text-cream/30 hover:border-gold hover:text-gold transition-all text-xs flex items-center justify-center bg-transparent cursor-pointer">‹</button>
              <span class="w-7 h-7 bg-gold text-ink text-[11px] font-semibold flex items-center justify-center">1</span>
              <span class="w-7 h-7 border border-gold/[.12] text-cream/35 text-[11px] flex items-center justify-center cursor-pointer hover:border-gold hover:text-gold transition-all">2</span>
              <span class="w-7 h-7 border border-gold/[.12] text-cream/35 text-[11px] flex items-center justify-center cursor-pointer hover:border-gold hover:text-gold transition-all">3</span>
              <button class="w-7 h-7 border border-gold/[.12] text-cream/30 hover:border-gold hover:text-gold transition-all text-xs flex items-center justify-center bg-transparent cursor-pointer">›</button>
            </div>
          </div>
        </div>


        <!-- ── RIGHT: Detail panel ── -->
        <div class="bg-s1 border border-gold/[.1] flex flex-col animate-fu3">

          <!-- Detail header -->
          <div class="px-6 py-5 border-b border-gold/[.08]">
            <div class="flex items-center justify-between mb-1">
              <span class="text-[9px] tracking-[.35em] uppercase text-gold">Détail commande</span>
              <span id="detailRef" class="font-display text-base text-cream">#0248</span>
            </div>
            <div class="flex items-center gap-3 mt-2">
              <span class="badge b-new"><span class="badge-dot"></span>Nouvelle</span>
              <span class="text-[10px] text-rose border border-rose/20 bg-rose/5 px-2 py-0.5">⚡ Urgent</span>
            </div>
          </div>

          <!-- Client + table info -->
          <div class="grid grid-cols-2 gap-px bg-gold/[.06] border-b border-gold/[.07]">
            <div class="px-5 py-3.5 bg-s1">
              <div class="text-[9px] tracking-[.2em] uppercase text-gold mb-1">Client</div>
              <div class="text-[13px] text-cream font-medium">M. Alami</div>
              <div class="text-[10px] text-cream/30 mt-0.5">+212 661 234 567</div>
            </div>
            <div class="px-5 py-3.5 bg-s1">
              <div class="text-[9px] tracking-[.2em] uppercase text-gold mb-1">Table</div>
              <div class="font-display text-xl text-cream">12</div>
              <div class="text-[10px] text-cream/30">4 couverts</div>
            </div>
            <div class="px-5 py-3.5 bg-s1">
              <div class="text-[9px] tracking-[.2em] uppercase text-gold mb-1">Passée à</div>
              <div class="font-display text-xl text-gold">19:42</div>
              <div class="text-[10px] text-cream/30">il y a 3 min</div>
            </div>
            <div class="px-5 py-3.5 bg-s1">
              <div class="text-[9px] tracking-[.2em] uppercase text-gold mb-1">Note client</div>
              <div class="text-[11px] text-cream/55 italic leading-relaxed">Sans noix, allergie crustacés</div>
            </div>
          </div>

          <!-- Order items -->
          <div class="flex-1 overflow-y-auto">
            <div class="px-5 py-3 border-b border-gold/[.06]">
              <span class="text-[9px] tracking-[.25em] uppercase text-cream/30">Articles commandés</span>
            </div>
            <div class="divide-y divide-gold/[.04]">

              <!-- item -->
              <div class="flex items-center gap-4 px-5 py-3.5">
                <div class="w-9 h-9 bg-s2 border border-gold/[.08] flex items-center justify-center text-lg shrink-0">🥩</div>
                <div class="flex-1 min-w-0">
                  <div class="text-[13px] text-cream">Côte de Bœuf Grillée</div>
                  <div class="text-[10px] text-cream/35 mt-0.5">Sans noix · Bien cuit</div>
                </div>
                <div class="text-right shrink-0">
                  <div class="text-[11px] text-cream/40">×1</div>
                  <div class="font-display text-sm text-gold">380 MAD</div>
                </div>
                <div class="flex flex-col gap-1 shrink-0">
                  <div class="w-2 h-2 rounded-full bg-gold animate-pulse2" title="En préparation"></div>
                </div>
              </div>

              <div class="flex items-center gap-4 px-5 py-3.5">
                <div class="w-9 h-9 bg-s2 border border-gold/[.08] flex items-center justify-center text-lg shrink-0">🥗</div>
                <div class="flex-1 min-w-0">
                  <div class="text-[13px] text-cream">Carpaccio de Saint-Jacques</div>
                  <div class="text-[10px] text-cream/35 mt-0.5">Standard</div>
                </div>
                <div class="text-right shrink-0">
                  <div class="text-[11px] text-cream/40">×2</div>
                  <div class="font-display text-sm text-gold">370 MAD</div>
                </div>
                <div class="w-2 h-2 rounded-full bg-gold animate-pulse2 shrink-0"></div>
              </div>

              <div class="flex items-center gap-4 px-5 py-3.5">
                <div class="w-9 h-9 bg-s2 border border-gold/[.08] flex items-center justify-center text-lg shrink-0">🍵</div>
                <div class="flex-1 min-w-0">
                  <div class="text-[13px] text-cream">Thé à la Menthe Royale</div>
                  <div class="text-[10px] text-cream/35 mt-0.5">Sucre à part</div>
                </div>
                <div class="text-right shrink-0">
                  <div class="text-[11px] text-cream/40">×2</div>
                  <div class="font-display text-sm text-gold">90 MAD</div>
                </div>
                <div class="w-2 h-2 rounded-full bg-gold animate-pulse2 shrink-0"></div>
              </div>

            </div>
          </div>

          <!-- Timeline -->
          <div class="px-5 py-4 border-t border-gold/[.07] bg-s2">
            <div class="text-[9px] tracking-[.25em] uppercase text-cream/30 mb-4">Suivi de la commande</div>
            <div class="relative">
              <!-- Connecting line -->
              <div class="absolute left-[7px] top-2 bottom-2 w-px bg-gold/[.12]"></div>
              <div class="space-y-3">
                <div class="tl-done flex items-center gap-3">
                  <div class="tl-dot w-3.5 h-3.5 border-2 shrink-0 z-10 bg-s2"></div>
                  <div class="flex-1 flex items-center justify-between">
                    <span class="text-[11px] text-sage">Commande reçue</span>
                    <span class="text-[10px] text-cream/25">19:42</span>
                  </div>
                </div>
                <div class="tl-active flex items-center gap-3">
                  <div class="tl-dot w-3.5 h-3.5 border-2 shrink-0 z-10 bg-s2"></div>
                  <div class="flex-1 flex items-center justify-between">
                    <span class="text-[11px] text-gold">En préparation cuisine</span>
                    <span class="text-[10px] text-cream/25">19:45</span>
                  </div>
                </div>
                <div class="tl-next flex items-center gap-3">
                  <div class="tl-dot w-3.5 h-3.5 border-2 shrink-0 z-10 bg-s2"></div>
                  <div><span class="text-[11px] text-cream/25">Prête à servir</span></div>
                </div>
                <div class="tl-next flex items-center gap-3">
                  <div class="tl-dot w-3.5 h-3.5 border-2 shrink-0 z-10 bg-s2"></div>
                  <div><span class="text-[11px] text-cream/25">Servie au client</span></div>
                </div>
                <div class="tl-next flex items-center gap-3">
                  <div class="tl-dot w-3.5 h-3.5 border-2 shrink-0 z-10 bg-s2"></div>
                  <div><span class="text-[11px] text-cream/25">Payée &amp; clôturée</span></div>
                </div>
              </div>
            </div>
          </div>

          <!-- Total + actions -->
          <div class="px-5 py-4 border-t border-gold/[.1] bg-s1">
            <div class="flex items-center justify-between mb-4">
              <span class="text-[10px] tracking-[.2em] uppercase text-cream/35">Total commande</span>
              <span class="font-display text-2xl text-gold">750 <span class="text-base text-cream/30">MAD</span></span>
            </div>
            <div class="grid grid-cols-3 gap-2">
              <button class="py-3 bg-gold text-ink text-[10px] tracking-[.12em] uppercase font-semibold hover:bg-gh transition-colors border-0 cursor-pointer col-span-2 flex items-center justify-center gap-2">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 13l4 4L19 7"/></svg>
                Accepter &amp; Envoyer cuisine
              </button>
              <button onclick="openCancel(event)" class="py-3 border border-rose/25 text-rose text-[10px] tracking-[.12em] uppercase hover:bg-rose/10 transition-all bg-transparent cursor-pointer">
                Annuler
              </button>
            </div>
          </div>
        </div><!-- /detail panel -->

      </div><!-- /grid -->


    </div><!-- /p-8 -->
  </div><!-- /content scroll -->
</div><!-- /main -->


<!-- ══════════════════════════════
     NEW ORDER MODAL
══════════════════════════════ -->
<div id="newOrderModal" class="hidden fixed inset-0 z-[100] flex items-center justify-center px-4">
  <div class="mbd absolute inset-0" onclick="closeModal('newOrderModal')"></div>
  <div class="relative bg-s1 border border-gold/[.18] w-full max-w-lg shadow-2xl animate-scale-in overflow-y-auto" style="max-height:92vh">
    <div class="sticky top-0 bg-s1 border-b border-gold/[.1] flex items-center justify-between px-7 py-5 z-10">
      <div>
        <span class="block text-[9px] tracking-[.38em] uppercase text-gold mb-0.5">La Maison · Admin</span>
        <h3 class="font-display text-[1.45rem] font-light">Nouvelle <em class="italic text-gold">commande</em></h3>
      </div>
      <button onclick="closeModal('newOrderModal')" class="w-8 h-8 border border-gold/20 flex items-center justify-center text-cream/30 hover:text-gold hover:border-gold transition-all bg-transparent cursor-pointer">✕</button>
    </div>
    <div class="p-7 flex flex-col gap-5">
      <div class="grid grid-cols-2 gap-4">
        <div>
          <label class="block text-[9px] tracking-[.2em] uppercase text-cream/30 mb-1.5">Client *</label>
          <input type="text" placeholder="Nom du client" class="w-full bg-s2 border border-gold/[.1] px-4 py-3 text-[13px] text-cream placeholder-cream/20 font-body"/>
        </div>
        <div>
          <label class="block text-[9px] tracking-[.2em] uppercase text-cream/30 mb-1.5">Table *</label>
          <select class="w-full bg-s2 border border-gold/[.1] px-4 py-3 text-[13px] text-cream font-body cursor-pointer">
            <option class="bg-s2">Table 1</option><option class="bg-s2">Table 2</option><option class="bg-s2">Table 5</option>
            <option class="bg-s2">Table 8</option><option class="bg-s2">Table 12</option><option class="bg-s2">Table 22</option><option class="bg-s2">Salle privée</option>
          </select>
        </div>
      </div>
      <!-- Items selection -->
      <div>
        <label class="block text-[9px] tracking-[.2em] uppercase text-cream/30 mb-3">Articles *</label>
        <div class="space-y-2 max-h-52 overflow-y-auto pr-1">
          <!-- Article row -->
          <div class="flex items-center gap-3 bg-s2 border border-gold/[.08] px-4 py-2.5">
            <input type="checkbox" class="w-4 h-4 shrink-0"/>
            <div class="flex-1 text-[12px] text-cream">Côte de Bœuf Grillée</div>
            <div class="text-[11px] text-gold shrink-0">380 MAD</div>
            <div class="flex items-center gap-1.5 shrink-0">
              <button class="w-6 h-6 border border-gold/20 text-cream/40 hover:border-gold hover:text-gold text-xs flex items-center justify-center bg-transparent cursor-pointer">−</button>
              <span class="w-5 text-center text-[12px]">1</span>
              <button class="w-6 h-6 border border-gold/20 text-cream/40 hover:border-gold hover:text-gold text-xs flex items-center justify-center bg-transparent cursor-pointer">+</button>
            </div>
          </div>
          <div class="flex items-center gap-3 bg-s2 border border-gold/[.08] px-4 py-2.5">
            <input type="checkbox" class="w-4 h-4 shrink-0"/>
            <div class="flex-1 text-[12px] text-cream">Carpaccio de Saint-Jacques</div>
            <div class="text-[11px] text-gold shrink-0">185 MAD</div>
            <div class="flex items-center gap-1.5 shrink-0"><button class="w-6 h-6 border border-gold/20 text-cream/40 hover:border-gold hover:text-gold text-xs flex items-center justify-center bg-transparent cursor-pointer">−</button><span class="w-5 text-center text-[12px]">1</span><button class="w-6 h-6 border border-gold/20 text-cream/40 hover:border-gold hover:text-gold text-xs flex items-center justify-center bg-transparent cursor-pointer">+</button></div>
          </div>
          <div class="flex items-center gap-3 bg-s2 border border-gold/[.08] px-4 py-2.5">
            <input type="checkbox" class="w-4 h-4 shrink-0"/>
            <div class="flex-1 text-[12px] text-cream">Tagine d'Agneau Confit</div>
            <div class="text-[11px] text-gold shrink-0">290 MAD</div>
            <div class="flex items-center gap-1.5 shrink-0"><button class="w-6 h-6 border border-gold/20 text-cream/40 hover:border-gold hover:text-gold text-xs flex items-center justify-center bg-transparent cursor-pointer">−</button><span class="w-5 text-center text-[12px]">1</span><button class="w-6 h-6 border border-gold/20 text-cream/40 hover:border-gold hover:text-gold text-xs flex items-center justify-center bg-transparent cursor-pointer">+</button></div>
          </div>
          <div class="flex items-center gap-3 bg-s2 border border-gold/[.08] px-4 py-2.5">
            <input type="checkbox" class="w-4 h-4 shrink-0"/>
            <div class="flex-1 text-[12px] text-cream">Fondant au Chocolat</div>
            <div class="text-[11px] text-gold shrink-0">95 MAD</div>
            <div class="flex items-center gap-1.5 shrink-0"><button class="w-6 h-6 border border-gold/20 text-cream/40 hover:border-gold hover:text-gold text-xs flex items-center justify-center bg-transparent cursor-pointer">−</button><span class="w-5 text-center text-[12px]">1</span><button class="w-6 h-6 border border-gold/20 text-cream/40 hover:border-gold hover:text-gold text-xs flex items-center justify-center bg-transparent cursor-pointer">+</button></div>
          </div>
          <div class="flex items-center gap-3 bg-s2 border border-gold/[.08] px-4 py-2.5">
            <input type="checkbox" class="w-4 h-4 shrink-0"/>
            <div class="flex-1 text-[12px] text-cream">Thé à la Menthe Royale</div>
            <div class="text-[11px] text-gold shrink-0">45 MAD</div>
            <div class="flex items-center gap-1.5 shrink-0"><button class="w-6 h-6 border border-gold/20 text-cream/40 hover:border-gold hover:text-gold text-xs flex items-center justify-center bg-transparent cursor-pointer">−</button><span class="w-5 text-center text-[12px]">1</span><button class="w-6 h-6 border border-gold/20 text-cream/40 hover:border-gold hover:text-gold text-xs flex items-center justify-center bg-transparent cursor-pointer">+</button></div>
          </div>
          <div class="flex items-center gap-3 bg-s2 border border-gold/[.08] px-4 py-2.5">
            <input type="checkbox" class="w-4 h-4 shrink-0"/>
            <div class="flex-1 text-[12px] text-cream">Harira Gastronomique</div>
            <div class="text-[11px] text-gold shrink-0">95 MAD</div>
            <div class="flex items-center gap-1.5 shrink-0"><button class="w-6 h-6 border border-gold/20 text-cream/40 hover:border-gold hover:text-gold text-xs flex items-center justify-center bg-transparent cursor-pointer">−</button><span class="w-5 text-center text-[12px]">1</span><button class="w-6 h-6 border border-gold/20 text-cream/40 hover:border-gold hover:text-gold text-xs flex items-center justify-center bg-transparent cursor-pointer">+</button></div>
          </div>
        </div>
      </div>
      <div>
        <label class="block text-[9px] tracking-[.2em] uppercase text-cream/30 mb-1.5">Notes cuisine</label>
        <textarea rows="2" placeholder="Allergie, cuisson, présentation…" class="w-full bg-s2 border border-gold/[.1] px-4 py-3 text-[13px] text-cream placeholder-cream/20 font-body resize-none"></textarea>
      </div>
      <!-- Urgency -->
      <div class="flex items-center gap-3">
        <label class="flex items-center gap-2 cursor-pointer">
          <input type="checkbox" class="w-4 h-4"/>
          <span class="text-[11px] text-rose/70">⚡ Marquer comme urgent</span>
        </label>
      </div>
      <div class="flex gap-3 pt-1">
        <button onclick="closeModal('newOrderModal')" class="flex-1 py-3.5 border border-gold/20 text-cream/40 text-[11px] tracking-[.13em] uppercase hover:border-gold hover:text-cream transition-all bg-transparent cursor-pointer">Annuler</button>
        <button onclick="closeModal('newOrderModal')" class="group flex-[2] py-3.5 bg-gold text-ink text-[11px] tracking-[.13em] uppercase font-semibold hover:bg-gh transition-colors border-0 cursor-pointer flex items-center justify-center gap-2">
          <svg class="w-4 h-4 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 13l4 4L19 7"/></svg>
          Envoyer en cuisine
        </button>
      </div>
    </div>
  </div>
</div>


<!-- ══════════════════════════════
     CANCEL CONFIRM MODAL
══════════════════════════════ -->
<div id="cancelModal" class="hidden fixed inset-0 z-[110] flex items-center justify-center px-4">
  <div class="mbd absolute inset-0" onclick="closeModal('cancelModal')"></div>
  <div class="relative bg-s1 border border-rose/20 w-full max-w-sm shadow-2xl animate-scale-in p-8 text-center">
    <div class="w-14 h-14 bg-rose/10 border border-rose/20 flex items-center justify-center mx-auto mb-5">
      <svg class="w-6 h-6 text-rose" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
    </div>
    <h3 class="font-display text-xl mb-2">Annuler la <em class="italic text-rose">commande</em> ?</h3>
    <p class="text-[12px] text-cream/38 mb-5 leading-relaxed">La commande sera annulée et le client sera notifié. Cette action ne peut pas être annulée.</p>
    <div>
      <label class="block text-[9px] tracking-[.2em] uppercase text-cream/30 mb-1.5 text-left">Motif d'annulation</label>
      <select class="w-full bg-s2 border border-gold/[.1] px-4 py-3 text-[12px] text-cream font-body cursor-pointer mb-5">
        <option class="bg-s2">Article indisponible</option>
        <option class="bg-s2">Demande du client</option>
        <option class="bg-s2">Erreur de commande</option>
        <option class="bg-s2">Problème cuisine</option>
      </select>
    </div>
    <div class="flex gap-3">
      <button onclick="closeModal('cancelModal')" class="flex-1 py-3 border border-gold/20 text-cream/40 text-[11px] tracking-[.12em] uppercase hover:border-gold hover:text-cream transition-all bg-transparent cursor-pointer">Retour</button>
      <button onclick="closeModal('cancelModal')" class="flex-1 py-3 bg-rose text-cream text-[11px] tracking-[.12em] uppercase font-semibold hover:bg-red-700 transition-colors border-0 cursor-pointer">Confirmer annulation</button>
    </div>
  </div>
</div>


<script>
  // Date badge
  document.getElementById('dateBadge').textContent =
    new Date().toLocaleDateString('fr-FR',{weekday:'long',day:'numeric',month:'long'});

  // Filter tabs
  function setTab(btn, val) {
    document.querySelectorAll('.f-tab').forEach(b => b.classList.remove('on'));
    btn.classList.add('on');
  }

  // Modal helpers
  function openNewOrder() {
    document.getElementById('newOrderModal').classList.remove('hidden');
    document.body.style.overflow = 'hidden';
  }
  function openCancel(e) {
    e.stopPropagation();
    document.getElementById('cancelModal').classList.remove('hidden');
    document.body.style.overflow = 'hidden';
  }
  function closeModal(id) {
    document.getElementById(id).classList.add('hidden');
    document.body.style.overflow = '';
  }

  // Detail panel: update order ref (stub — in Laravel this would be server-rendered)
  function showDetail(ref) {
    document.getElementById('detailRef').textContent = '#' + ref.replace('ord-','0');
  }

  // Escape key closes modals
  document.addEventListener('keydown', e => {
    if (e.key === 'Escape') {
      ['newOrderModal','cancelModal'].forEach(id => closeModal(id));
    }
  });
</script>
</body>
</html>