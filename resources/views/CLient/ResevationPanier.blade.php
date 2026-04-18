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
      @include('Component.HandleMessages')

      <!-- CURRENT RESERVATIONS -->
      <section>

        <div class="flex items-center gap-4 mb-8">
          <div class="h-px flex-1 bg-[#C8A96E]/10"></div>
          <span class="text-[9px] uppercase text-[#C8A96E]/60 tracking-[.45em]">
            Réservations actuelles
          </span>
          <div class="h-px flex-1 bg-[#C8A96E]/10"></div>
        </div>

        @if($reservations->whereIn('status', ['pending','accepted'])->count() == 0)

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

        @else

        <div class="mt-6 flex flex-col gap-4">

          @foreach($reservations->whereIn('status', ['pending','accepted']) as $res)

          <div class="bg-[#111] border border-[#C8A96E]/10 p-6 hover:translate-y-[-2px] transition">

            <div class="flex justify-between gap-4 flex-wrap">

              <div class="flex gap-4">
                <div class="w-11 h-11 flex items-center justify-center
                @if($res->status == 'accepted')
                  border border-green-400/30 text-green-400 bg-green-400/10
                @else
                  border border-[#C8A96E]/30 text-[#C8A96E] bg-[#C8A96E]/10
                @endif">
                  {{ $res->status == 'accepted' ? '✓' : '⏳' }}
                </div>

                <div>
                  <div class="flex items-center gap-3 flex-wrap mb-2">
                    <span class="text-xl">#{{ $res->id }}</span>

                    @if($res->status == 'accepted')
                    <span class="text-[9px] px-2 py-1 border border-green-400/30 text-green-400 uppercase">
                      Confirmée
                    </span>
                    @else
                    <span class="text-[9px] px-2 py-1 border border-[#C8A96E]/30 text-[#C8A96E] uppercase">
                      En attente
                    </span>
                    @endif

                    @if(\Carbon\Carbon::parse($res->date)->isToday())
                    <span class="text-[9px] px-2 py-1 border border-[#C8A96E]/30 text-[#C8A96E] uppercase">
                      Aujourd'hui
                    </span>
                    @endif
                  </div>

                  <div class="text-[11px] text-white/50 flex gap-4 flex-wrap">
                    <span>{{ \Carbon\Carbon::parse($res->date)->format('d M Y') }}</span>
                    <span>{{ $res->time }}</span>
                    <span>{{ $res->numberOfPeople}} pers.</span>
                    <span>{{ $res->special_requests ?? 'Standard' }}</span>
                  </div>

                  @if($res->note)
                  <div class="mt-2 text-[10px] text-[#C8A96E]/60 italic">
                    "{{ $res->note }}"
                  </div>
                  @endif
                </div>
              </div>

              <div class="text-right">
                <form action="{{route('reservation.panier.cancel',$res->id)}}" method="POST">
                  @csrf
                  <button class="text-[9px] uppercase px-3 py-2 border border-red-400/30 text-red-400 hover:bg-red-400/10">
                    Annuler
                  </button>
                </form>
              </div>

            </div>

          </div>

          @endforeach

        </div>

        @endif

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
            <button id="filter-all" class="border border-[#C8A96E] text-[#C8A96E] px-3 py-1">Toutes</button>
            <button id="filter-completed" class="border border-[#C8A96E]/20 text-white/40 px-3 py-1">Terminées</button>
            <button id="filter-cancelled" class="border border-[#C8A96E]/20 text-white/40 px-3 py-1">Annulées</button>
          </div>
        </div>

        @foreach($historic as $his)

        <div class="flex flex-col gap-3 history-item" data-status="{{ $his->status }}">

          <div class="bg-[#111] border border-[#C8A96E]/10 p-4 opacity-80">
            <div class="flex justify-between flex-wrap gap-4">

              <div>
                <div class="flex items-center gap-3 mb-1">
                  <span>#{{ $his->id }}</span>

                  @if($his->status == "completed")
                  <span class="text-[9px] border border-[#C8A96E]/20 text-[#C8A96E] px-2 py-1">
                    Terminée
                  </span>
                  @elseif($his->status == "cancelled")
                  <span class="text-[9px] border border-red-400/30 text-red-400 px-2 py-1">
                    Annulée
                  </span>
                  @endif
                </div>

                <div class="text-[10px] text-white/40 flex gap-3 flex-wrap">
                  <span>{{ \Carbon\Carbon::parse($his->date)->format('d M Y') }}</span>
                  <span>{{ $his->time }}</span>
                  <span>{{ $his->guests }} pers.</span>
                </div>
              </div>

              <div class="text-[9px] text-white/30">
                {{ \Carbon\Carbon::parse($his->date)->diffForHumans() }}
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
          <a href="{{route('reservation')}}" class="block w-full py-3 bg-[#C8A96E] text-black text-[10px] uppercase">
            Réserver une table
          </a>
        </div>
      </div>

    </div>
  </div>
  @include('Component.footer')
<script>
document.addEventListener("DOMContentLoaded", function () {

  const items = document.querySelectorAll(".history-item");

  const buttons = {
    all: document.getElementById("filter-all"),
    completed: document.getElementById("filter-completed"),
    cancelled: document.getElementById("filter-cancelled"),
  };

  function setActive(activeBtn) {
    Object.values(buttons).forEach(btn => {
      btn.classList.remove("border-[#C8A96E]", "text-[#C8A96E]");
      btn.classList.add("border-[#C8A96E]/20", "text-white/40");
    });

    activeBtn.classList.add("border-[#C8A96E]", "text-[#C8A96E]");
    activeBtn.classList.remove("border-[#C8A96E]/20", "text-white/40");
  }

  function filter(status) {
    items.forEach(item => {
      if (status === "all" || item.dataset.status === status) {
        item.style.display = "flex";
      } else {
        item.style.display = "none";
      }
    });
  }

  buttons.all.addEventListener("click", () => {
    setActive(buttons.all);
    filter("all");
  });

  buttons.completed.addEventListener("click", () => {
    setActive(buttons.completed);
    filter("completed");
  });

  buttons.cancelled.addEventListener("click", () => {
    setActive(buttons.cancelled);
    filter("cancelled");
  });

});
</script>
</body>

</html>