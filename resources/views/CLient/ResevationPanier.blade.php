@include('DocHtml.StartDocHtml')

<body class="bg-[#0f0f0f] text-[#f5f5f5] overflow-x-hidden font-[Jost]">


  @include('Component.HomeHeader')

  <div class="pt-[64px]">

    <!-- HERO -->
    <section class="bg-[#111] border-b border-[#C8A96E]/10">
      <div class="max-w-6xl mx-auto px-6 lg:px-14 py-10 flex flex-wrap items-end justify-between gap-6">

        <div>
          <span class="block text-[10px] tracking-[.45em] uppercase text-[#C8A96E]/60 mb-2">
            La Maison · {{Auth::user()->name}}
          </span>
          <h1 class="font-light leading-tight text-[clamp(2rem,5vw,3rem)]">
            Mes <em class="italic text-[#C8A96E]">réservations</em>
          </h1>
          <p class="text-[12px] text-[#f5f5f5]/40 mt-2">
            Consultez et suivez l'état de toutes vos réservations
          </p>
        </div>

        <!-- STATS -->
        <div class="flex items-center gap-4">
          <div class="text-center border border-[#C8A96E]/10 bg-[#1a1a1a] px-5 py-3">
            <div class="text-2xl text-[#C8A96E]">{{$total}}</div>
            <div class="text-[9px] uppercase text-white/30 mt-1">Total</div>
          </div>

          <div class="text-center border border-green-400/20 bg-[#1a1a1a] px-5 py-3">
            <div class="text-2xl text-green-400">{{$confirmed}}</div>
            <div class="text-[9px] uppercase text-white/30 mt-1">Confirmées</div>
          </div>
          <div class="text-center border border-[#C8A96E]/20 bg-[#1a1a1a] px-5 py-3">
            <div class="text-2xl text-[#C8A96E]">{{$pending}}</div>
            <div class="text-[9px] uppercase text-white/30 mt-1">En attente</div>
          </div>
        </div>
      </div>
    </section>

    <div class="max-w-6xl mx-auto px-6 lg:px-14 py-12 flex flex-col gap-16">

      <!-- CURRENT RESERVATIONS -->
      <section>

        <div class="flex items-center gap-4 mb-8">
          <div class="h-px flex-1 bg-[#C8A96E]/10"></div>
          <span class="text-[9px] uppercase text-[#C8A96E]/60 tracking-[.45em]">
            Réservations actuelles
          </span>
          <div class="h-px flex-1 bg-[#C8A96E]/10"></div>
        </div>

        <!-- EMPTY STATE -->
        <div class="text-center py-16 border border-[#C8A96E]/10 bg-[#111]">
          <div class="w-16 h-16 bg-[#1a1a1a] border border-[#C8A96E]/10 flex items-center justify-center mx-auto mb-5 opacity-30">
            🗓
          </div>
          <div class="text-xl text-white/40 mb-2">Aucune réservation en cours</div>
          <p class="text-[12px] text-white/30 mb-7">Vous n'avez pas encore de réservation active.</p>
          <a href="#" class="inline-flex items-center gap-2 bg-[#C8A96E] text-black text-[10px] uppercase px-7 py-3">
            Réserver une table
          </a>
        </div>

        <!-- CARD EXAMPLE -->
        <div class="mt-6 flex flex-col gap-4">

          <div class="bg-[#111] border border-[#C8A96E]/10 p-6 hover:translate-y-[-2px] transition">

            <div class="flex justify-between gap-4 flex-wrap">

              <div class="flex gap-4">
                <div class="w-11 h-11 flex items-center justify-center border border-green-400/30 text-green-400 bg-green-400/10">
                  ✓
                </div>

                <div>
                  <div class="flex items-center gap-3 flex-wrap mb-2">
                    <span class="text-xl">#0001</span>

                    <span class="text-[9px] px-2 py-1 border border-green-400/30 text-green-400 uppercase">
                      Confirmée
                    </span>

                    <span class="text-[9px] px-2 py-1 border border-[#C8A96E]/30 text-[#C8A96E] uppercase">
                      Aujourd'hui
                    </span>
                  </div>

                  <div class="text-[11px] text-white/50 flex gap-4 flex-wrap">
                    <span>12 Mars 2026</span>
                    <span>20:00</span>
                    <span>4 pers.</span>
                    <span>Table VIP</span>
                  </div>

                  <div class="mt-2 text-[10px] text-[#C8A96E]/60 italic">
                    "Anniversaire surprise"
                  </div>
                </div>
              </div>

              <div class="text-right">
                <button class="text-[9px] uppercase px-3 py-2 border border-red-400/30 text-red-400 hover:bg-red-400/10">
                  Annuler
                </button>
              </div>

            </div>

          </div>

        </div>

      </section>

      <!-- HISTORY -->
      <section>

        <div class="flex justify-between items-end mb-8 flex-wrap gap-4">
          <div>
            <span class="text-[9px] uppercase text-[#C8A96E]/60">Historique</span>
            <h2 class="text-2xl font-light">
              Réservations <em class="italic text-[#C8A96E]">passées</em>
            </h2>
          </div>

          <div class="flex gap-2 text-[10px] uppercase">
            <button class="border border-[#C8A96E] text-[#C8A96E] px-3 py-1">Toutes</button>
            <button class="border border-[#C8A96E]/20 text-white/40 px-3 py-1">Terminées</button>
            <button class="border border-[#C8A96E]/20 text-white/40 px-3 py-1">Annulées</button>
          </div>
        </div>

        <!-- HISTORY CARD -->
        @foreach($historic as $his)
        <div class="flex flex-col gap-3">

          <div class="bg-[#111] border border-[#C8A96E]/10 p-4 opacity-80">
            <div class="flex justify-between flex-wrap gap-4">

              <div>
                <div class="flex items-center gap-3 mb-1">
                  <span>#0002</span>
                  @if($his->status == "completed")
                  <span class="text-[9px] border border-[#C8A96E]/20 text-[#C8A96E] px-2 py-1">
                    Terminée
                  </span>
                  @endif
                  @else
                  <span class="text-[9px] border border-[#C8A96E]/20 text-[#C8A96E] px-2 py-1">
                    Cancelled
                  </span>
                </div>

                <div class="text-[10px] text-white/40 flex gap-3 flex-wrap">
                  <span>10 Mars 2026</span>
                  <span>19:00</span>
                  <span>2 pers.</span>
                </div>
              </div>

              <div class="text-[9px] text-white/30">
                Il y a 5 jours
              </div>

            </div>
          </div>

        </div>
        @endforeach

      </section>

      <!-- CTA -->
      <div class="text-center pb-4">
        <div class="border border-[#C8A96E]/20 px-8 py-8 bg-[#111] max-w-sm mx-auto">
          <div class="text-xl mb-2">Prochaine visite ?</div>
          <p class="text-[11px] text-white/40 mb-6">
            Réservez votre table et vivez une nouvelle expérience gastronomique.
          </p>
          <a href="#" class="block w-full py-3 bg-[#C8A96E] text-black text-[10px] uppercase">
            Réserver une table
          </a>
        </div>
      </div>

    </div>
  </div>

  @include('Component.footer')

</body>

</html>