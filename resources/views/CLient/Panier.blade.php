@include('DocHtml.StartDocHtml')
@include('Component.HomeHeader')
<!-- ══════════════════════════════════════
     PAGE CONTENT — starts below fixed header
══════════════════════════════════════ -->
<div class="pt-[64px]">

  <!-- ── HERO BAND ── -->
  <section class="bg-s1 border-b border-gold/[.08]">
    <div class="max-w-6xl mx-auto px-6 lg:px-14 py-10 flex flex-wrap items-end justify-between gap-6">
      <div class="animate-fu">
        <span class="block text-[10px] tracking-[.4em] uppercase text-gold/70 mb-2 font-body">La Maison · Table 12</span>
        <h1 class="font-serif font-light leading-tight" style="font-size:clamp(2rem,5vw,3rem)">
          Mes <em class="italic text-gold">commandes</em>
        </h1>
        <p class="text-[12px] text-ivory/35 mt-2 tracking-wide font-body">Suivez l'avancement de vos plats en temps réel</p>
      </div>

      <!-- Live pill — same style as project -->
      <div class="flex items-center gap-3 bg-s2 border border-gold/[.1] px-5 py-3 animate-fu2">
        <div class="flex items-end gap-[3px] h-4">
          <div class="bar1 w-[3px] h-2 bg-sage rounded-sm animate-wave"></div>
          <div class="bar2 w-[3px] h-3 bg-sage rounded-sm animate-wave"></div>
          <div class="bar3 w-[3px] h-4 bg-sage rounded-sm animate-wave"></div>
          <div class="bar4 w-[3px] h-3 bg-sage rounded-sm animate-wave"></div>
          <div class="bar5 w-[3px] h-2 bg-sage rounded-sm animate-wave"></div>
        </div>
        <div>
          <div class="text-[11px] text-sage font-medium font-body">En direct</div>
          <div class="text-[9px] text-ivory/28 tracking-wide font-body">Mis à jour automatiquement</div>
        </div>
      </div>
    </div>
  </section>


  <div class="max-w-6xl mx-auto px-6 lg:px-14 py-12 flex flex-col gap-14">

    <!-- ═══════════════════════════════
         ACTIVE ORDER
    ═══════════════════════════════ -->
    <section>
      <!-- Section divider — matches project style -->
      <div class="flex items-center gap-4 mb-8 animate-fu3">
        <div class="h-px flex-1 bg-gold/[.1]"></div>
        <span class="text-[9px] tracking-[.4em] uppercase text-gold/60 font-body">Commande en cours</span>
        <div class="h-px flex-1 bg-gold/[.1]"></div>
      </div>

      <!-- Active order card -->
      <div class="bg-s1 border border-gold/[.18] overflow-hidden animate-fu4 shine">
        <!-- top accent bar (same pattern as admin pipeline column) -->
        <div class="h-[3px] bg-gradient-to-r from-amber via-gold to-amber"></div>

        <div class="p-6 md:p-8">

          <!-- Header row -->
          <div class="flex flex-wrap items-start justify-between gap-4 mb-8">
            <div>
              <div class="flex items-center gap-3 mb-1.5 flex-wrap">
                <span class="font-serif text-2xl text-ivory">#0248</span>
                <!-- Pulsing status pill — matches project badge style -->
                <span class="inline-flex items-center gap-2 border border-gold/25 bg-gd text-gold text-[9px] tracking-[.1em] uppercase px-3 py-1">
                  <span class="relative flex w-2 h-2">
                    <span class="absolute inline-flex h-full w-full rounded-full bg-gold/60 animate-ping2"></span>
                    <span class="relative inline-flex rounded-full w-2 h-2 bg-gold"></span>
                  </span>
                  En préparation
                </span>
              </div>
              <p class="text-[11px] text-ivory/32 tracking-wide font-body">Passée il y a 14 min · Table 12 · 4 couverts</p>
            </div>
            <div class="text-right">
              <div class="font-serif text-[2.2rem] font-light text-gold leading-none">750</div>
              <div class="text-[10px] text-ivory/28 tracking-wide font-body mt-0.5">MAD · Total</div>
            </div>
          </div>

          <!-- ── PROGRESS PIPELINE ── -->
          <div class="mb-8">
            <div class="flex items-start justify-between relative">

              <!-- Step 1: Pending ✓ -->
              <div class="flex flex-col items-center flex-1 min-w-0">
                <div class="w-9 h-9 bg-sage border-2 border-sage flex items-center justify-center mb-2">
                  <svg class="w-4 h-4 text-ink" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                  </svg>
                </div>
                <span class="text-[9px] tracking-[.1em] uppercase text-sage text-center font-body">Reçue</span>
                <span class="text-[8px] text-ivory/22 mt-0.5">19:42</span>
              </div>
              <div class="h-[2px] flex-1 bg-sage mt-[18px] mx-1"></div>

              <!-- Step 2: Confirmed ✓ -->
              <div class="flex flex-col items-center flex-1 min-w-0">
                <div class="w-9 h-9 bg-sage border-2 border-sage flex items-center justify-center mb-2">
                  <svg class="w-4 h-4 text-ink" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                  </svg>
                </div>
                <span class="text-[9px] tracking-[.1em] uppercase text-sage text-center font-body">Confirmée</span>
                <span class="text-[8px] text-ivory/22 mt-0.5">19:44</span>
              </div>
              <div class="h-[2px] flex-1 mt-[18px] mx-1" style="background:linear-gradient(to right,#6EC88A,#C8A96E)"></div>

              <!-- Step 3: Preparing — ACTIVE -->
              <div class="flex flex-col items-center flex-1 min-w-0">
                <div class="relative mb-2">
                  <div class="w-9 h-9 bg-gold border-2 border-gold flex items-center justify-center relative z-10">
                    <svg class="w-4 h-4 text-ink animate-spin2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                  </div>
                  <div class="absolute inset-0 border-2 border-gold/40 animate-ping2 rounded-none"></div>
                </div>
                <span class="text-[9px] tracking-[.1em] uppercase text-gold text-center font-body font-medium">En cuisine</span>
                <span class="text-[8px] text-gold/50 animate-p2 mt-0.5">En cours…</span>
              </div>
              <div class="h-[2px] flex-1 bg-gold/[.12] mt-[18px] mx-1"></div>

              <!-- Step 4: Ready -->
              <div class="flex flex-col items-center flex-1 min-w-0">
                <div class="w-9 h-9 bg-s2 border-2 border-gold/[.18] flex items-center justify-center mb-2">
                  <svg class="w-4 h-4 text-ivory/18" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                  </svg>
                </div>
                <span class="text-[9px] tracking-[.1em] uppercase text-ivory/22 text-center font-body">Prête</span>
              </div>
              <div class="h-[2px] flex-1 bg-gold/[.07] mt-[18px] mx-1"></div>

              <!-- Step 5: Delivered -->
              <div class="flex flex-col items-center flex-1 min-w-0">
                <div class="w-9 h-9 bg-s2 border-2 border-gold/[.12] flex items-center justify-center mb-2">
                  <svg class="w-4 h-4 text-ivory/12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-1.4 5.6M17 13l1.4 5.6" />
                  </svg>
                </div>
                <span class="text-[9px] tracking-[.1em] uppercase text-ivory/18 text-center font-body">Servie</span>
              </div>
              <div class="h-[2px] flex-1 bg-gold/[.05] mt-[18px] mx-1"></div>

              <!-- Step 6: Completed -->
              <div class="flex flex-col items-center flex-1 min-w-0">
                <div class="w-9 h-9 bg-s2 border-2 border-gold/[.08] flex items-center justify-center mb-2">
                  <svg class="w-4 h-4 text-ivory/10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
                </div>
                <span class="text-[9px] tracking-[.1em] uppercase text-ivory/15 text-center font-body">Terminée</span>
              </div>

            </div>
          </div>

          <!-- ── ITEMS ── -->
          <div class="grid md:grid-cols-2 gap-3 mb-6">

            <!-- Done item -->
            <div class="flex items-center gap-4 bg-s2 border border-sage/18 px-4 py-3">
              <div class="relative shrink-0">
                <div class="w-10 h-10 bg-s3 border border-gold/[.07] flex items-center justify-center text-lg">🥗</div>
                <div class="absolute -top-1 -right-1 w-4 h-4 bg-sage flex items-center justify-center">
                  <svg class="w-2.5 h-2.5 text-ink" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                  </svg>
                </div>
              </div>
              <div class="flex-1 min-w-0">
                <div class="text-[12px] text-ivory font-body leading-tight">Carpaccio Saint-Jacques</div>
                <div class="text-[9px] text-sage mt-0.5 tracking-wide font-body">✓ Prêt</div>
              </div>
              <div class="text-right shrink-0">
                <div class="text-[9px] text-ivory/28 font-body">×2</div>
                <div class="font-serif text-sm text-gold">370 MAD</div>
              </div>
            </div>

            <!-- Done item -->
            <div class="flex items-center gap-4 bg-s2 border border-sage/18 px-4 py-3">
              <div class="relative shrink-0">
                <div class="w-10 h-10 bg-s3 border border-gold/[.07] flex items-center justify-center text-lg">🍵</div>
                <div class="absolute -top-1 -right-1 w-4 h-4 bg-sage flex items-center justify-center">
                  <svg class="w-2.5 h-2.5 text-ink" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                  </svg>
                </div>
              </div>
              <div class="flex-1 min-w-0">
                <div class="text-[12px] text-ivory font-body leading-tight">Thé à la Menthe Royale</div>
                <div class="text-[9px] text-sage mt-0.5 tracking-wide font-body">✓ Servi</div>
              </div>
              <div class="text-right shrink-0">
                <div class="text-[9px] text-ivory/28 font-body">×2</div>
                <div class="font-serif text-sm text-gold">90 MAD</div>
              </div>
            </div>

            <!-- In progress item -->
            <div class="flex items-center gap-4 bg-s2 border border-gold/[.22] px-4 py-3 relative overflow-hidden">
              <div class="absolute inset-0 bg-gradient-to-r from-transparent via-gold/[.025] to-transparent" style="animation:sh 3s linear infinite;background-size:200% auto"></div>
              <div class="relative shrink-0">
                <div class="w-10 h-10 bg-s3 border border-gold/[.12] flex items-center justify-center text-lg">🥩</div>
                <div class="absolute -top-1 -right-1 w-4 h-4 bg-gold flex items-center justify-center">
                  <svg class="w-2.5 h-2.5 text-ink animate-spin2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
                </div>
              </div>
              <div class="flex-1 min-w-0 relative">
                <div class="text-[12px] text-ivory font-body leading-tight">Côte de Bœuf Grillée</div>
                <div class="text-[9px] text-gold mt-0.5 tracking-wide font-body animate-p2">En préparation…</div>
              </div>
              <div class="text-right shrink-0 relative">
                <div class="text-[9px] text-ivory/28 font-body">×1</div>
                <div class="font-serif text-sm text-gold">380 MAD</div>
              </div>
            </div>

            <!-- Waiting item -->
            <div class="flex items-center gap-4 bg-s2 border border-gold/[.07] px-4 py-3 opacity-45">
              <div class="w-10 h-10 bg-s3 border border-gold/[.06] flex items-center justify-center text-lg shrink-0">🍮</div>
              <div class="flex-1 min-w-0">
                <div class="text-[12px] text-ivory/60 font-body leading-tight">Fondant au Chocolat</div>
                <div class="text-[9px] text-ivory/25 mt-0.5 font-body">En attente…</div>
              </div>
              <div class="text-right shrink-0">
                <div class="text-[9px] text-ivory/22 font-body">×1</div>
                <div class="font-serif text-sm text-ivory/30">95 MAD</div>
              </div>
            </div>

          </div>

          <!-- Progress bar -->
          <div class="mb-6">
            <div class="flex justify-between text-[9px] text-ivory/32 mb-1.5 font-body">
              <span>Progression cuisine</span>
              <span class="text-gold">3 / 4 plats prêts</span>
            </div>
            <div class="h-[3px] bg-s3 overflow-hidden">
              <div class="h-full bg-gradient-to-r from-sage to-gold" style="width:75%;transition:width 1s"></div>
            </div>
          </div>

          <!-- Meta row — matches footer card style -->
          <div class="flex flex-wrap items-center gap-3">
            <div class="flex items-center gap-2.5 border border-gold/[.12] bg-s2 px-4 py-2.5">
              <svg class="w-4 h-4 text-gold/55" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              <div>
                <div class="text-[8px] text-ivory/30 uppercase tracking-[.2em] font-body">Temps estimé</div>
                <div class="text-[13px] text-gold font-body font-medium">~8 min</div>
              </div>
            </div>
            <div class="flex items-center gap-2.5 border border-gold/[.12] bg-s2 px-4 py-2.5">
              <svg class="w-4 h-4 text-gold/55" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-2 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
              </svg>
              <div>
                <div class="text-[8px] text-ivory/30 uppercase tracking-[.2em] font-body">Table</div>
                <div class="text-[13px] text-ivory font-body font-medium">12 · 4 couverts</div>
              </div>
            </div>
            <div class="flex items-center gap-2.5 border border-amber/15 bg-s2 px-4 py-2.5 ml-auto">
              <svg class="w-4 h-4 text-amber/55" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              <div class="text-[10px] text-amber/65 font-body">Allergie fruits de mer signalée</div>
            </div>
          </div>

        </div>
      </div>
    </section>


    <!-- ═══════════════════════════════
         PAST ORDERS
    ═══════════════════════════════ -->
    <section>
      <!-- Header + tabs -->
      <div class="flex flex-wrap items-end justify-between gap-4 mb-8 animate-fu5">
        <div>
          <span class="block text-[9px] tracking-[.4em] uppercase text-gold/60 mb-1 font-body">Mon historique</span>
          <h2 class="font-serif font-light" style="font-size:clamp(1.6rem,3vw,2.2rem)">
            Commandes <em class="italic text-gold">passées</em>
          </h2>
        </div>
        <div class="flex border-b border-gold/[.1]">
          <button onclick="setTab(this,'all')" class="ftab on text-[10px] tracking-[.14em] uppercase px-4 pb-3 text-ivory/35 hover:text-ivory cursor-pointer bg-transparent border-0 font-body whitespace-nowrap">Toutes</button>
          <button onclick="setTab(this,'completed')" class="ftab text-[10px] tracking-[.14em] uppercase px-4 pb-3 text-ivory/35 hover:text-ivory cursor-pointer bg-transparent border-0 font-body whitespace-nowrap">Terminées</button>
          <button onclick="setTab(this,'cancelled')" class="ftab text-[10px] tracking-[.14em] uppercase px-4 pb-3 text-ivory/35 hover:text-ivory cursor-pointer bg-transparent border-0 font-body whitespace-nowrap">Annulées</button>
        </div>
      </div>

      <div class="flex flex-col gap-4">

        @foreach($orders as $order)
        @if($order->status == "completed" || $order->status == "delivered" || $order->status == "confirmed")
        <div class="ocard bg-s1 border border-gold/[.06] p-5 cursor-pointer opacity-50" onclick="openDetail('0229')">
          <div class="flex flex-wrap items-start justify-between gap-4">
            <div class="flex items-start gap-4">
              <div class="w-10 h-10 bg-rose/7 border border-rose/14 flex items-center justify-center shrink-0 mt-0.5">
                <svg class="w-5 h-5 text-rose/65" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 18L18 6M6 6l12 12" />
                </svg>
              </div>
              <div>
                <div class="flex items-center gap-3 mb-1 flex-wrap">
                  <span class="font-serif text-base text-ivory/55 line-through">{{$order-> N°_commande}}</span>
                  <span class="inline-flex items-center gap-1.5 text-[9px] tracking-[.1em] uppercase border border-red-500/20 bg-red-500/10 text-red-500 px-2.5 py-1">
                    <span class="w-1.5 h-1.5 rounded-full bg-red-500 shrink-0"></span>
                    {{$order->status}}
                  </span>
                </div>
                <p class="text-[10px] text-ivory/22 tracking-wide font-body">
                  Il y a {{$order->updated_at->diffForHumans()}}
                </p>
                @foreach($order->items as $item)
                <div class="flex flex-wrap gap-1.5 mt-2">
                  <span class="text-[9px] bg-s2 border border-gold/[.05] px-2 py-0.5 text-ivory/22 font-body">{{$item->menuItem->name}} ×1</span>
                </div>
                @endforeach
              </div>
            </div>
            <div class="flex flex-col items-end gap-3">
              <div class="text-right">
                <div class="font-serif text-[1.8rem] font-light text-ivory/28 leading-none">{{$order->Total_Price}}</div>
                <div class="text-[9px] text-ivory/18 font-body mt-0.5">MAD</div>
              </div>
              <button onclick="event.stopPropagation();openDelete('{{$order->id}}')" class="text-[9px] tracking-[.12em] uppercase px-3 py-2 border border-gold/[.12] text-ivory/22 hover:border-gold/25 hover:text-ivory/35 transition-all bg-transparent cursor-pointer font-body">Supprimer</button>
            </div>
          </div>
        </div>
        @endif
        @endforeach

        <!-- ── Past order 4 — Completed special ── -->

      </div>

      <!-- CTA block — matches footer reservation button style -->
      <div class="mt-14 text-center animate-bob">
        <div class="inline-block border border-gold/[.15] px-8 py-8 bg-s1 max-w-sm w-full">
          <div class="font-serif font-light text-xl mb-2">Envie d'autre chose ?</div>
          <p class="text-[11px] text-ivory/38 mb-6 leading-relaxed font-body">Parcourez notre carte et ajoutez des plats à votre table.</p>
          <!-- Same button style as footer "Réserver une table" -->
          <a href="{{route('menu')}}" class="block w-full py-3 bg-gold text-dark text-[10px] tracking-[.14em] uppercase font-semibold hover:bg-gold-h transition-all no-underline text-center font-body">
            Voir la carte
          </a>
        </div>
      </div>

    </section>

  </div>
</div>


     @include('Component.footer')

     

<!-- ══════════════════════════════════════
     DETAIL MODAL
══════════════════════════════════════ -->
<div id="deleteModal" class="hidden fixed inset-0 z-[100] flex items-end sm:items-center justify-center px-0 sm:px-4">
  <div class="mbd absolute inset-0" onclick="closeDelete()"></div>

  <div class="relative bg-s1 border border-red-500/20 w-full sm:max-w-md shadow-2xl flex flex-col animate-siu">

    <!-- Header -->
    <div class="flex items-center justify-between px-6 py-5 border-b border-red-500/10">
      <div>
        <span class="block text-[8px] tracking-[.38em] uppercase text-red-400 mb-1 font-body">Suppression</span>
        <h3 class="font-serif text-xl font-light text-ivory">
          Supprimer la commande #<span id="dRef">0241</span> ?
        </h3>
      </div>
      <button onclick="closeDelete()" class="w-8 h-8 border border-red-500/20 flex items-center justify-center text-ivory/40 hover:text-red-400 hover:border-red-400 transition-all bg-transparent cursor-pointer">
        ✕
      </button>
    </div>

    <!-- Content -->
    <div class="p-6 flex flex-col gap-4">
      <p class="text-[12px] text-ivory/60 font-body leading-relaxed">
        Cette action est <span class="text-red-400">irréversible</span>.
        La commande sera définitivement supprimée.
      </p>
    </div>

    <!-- Actions -->
    <div class="px-6 py-4 border-t border-red-500/10 bg-s2 grid grid-cols-2 gap-2">
      <button onclick="closeDelete()" class="py-3 border border-red-500/20 text-ivory/40 text-[10px] tracking-[.12em] uppercase hover:border-red-400 hover:text-ivory transition-all bg-transparent cursor-pointer font-body">
        Annuler
      </button>

      <button onclick="confirmDelete()" class="py-3 bg-red-500 text-white text-[10px] tracking-[.12em] uppercase font-semibold hover:bg-red-600 transition-colors border-0 cursor-pointer font-body">
        Supprimer
      </button>
    </div>

  </div>
</div>


<script>
  let currentOrderId = null; // ✅ مهم هنا

  function openDelete(id) {
    currentOrderId = id;
    document.getElementById('dRef').textContent = id;
    document.getElementById('deleteModal').classList.remove('hidden');
    document.body.style.overflow = 'hidden';
  }

  function closeDelete() {
    document.getElementById('deleteModal').classList.add('hidden');
    document.body.style.overflow = '';
  }

  function confirmDelete() {
    console.log("Deleting:", currentOrderId);

    fetch(`/orders/${currentOrderId}`, {
        method: 'DELETE',
        headers: {
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
          'Accept': 'application/json'
        }
      })
      .then(res => {
        console.log("STATUS:", res.status);
        return res.json();
      })
      .then(data => {
        console.log("DATA:", data);
        if (data.success) {
          document.getElementById(`order-${currentOrderId}`)?.remove();
          closeDelete();
        }
      })
      .catch(err => console.error(err));
  }

  document.addEventListener('keydown', e => {
    if (e.key === 'Escape') closeDelete();
  });
</script>
</body>

</html>