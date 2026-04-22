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

<section>
  <div class="flex items-center gap-4 mb-8 animate-fu3">
    <div class="h-px flex-1 bg-gold/[.1]"></div>
    <span class="text-[9px] tracking-[.4em] uppercase text-gold/60 font-body">Commande en cours</span>
    <div class="h-px flex-1 bg-gold/[.1]"></div>
  </div>

  @if($activeOrder)
  <div class="bg-s1 border border-gold/[.18] overflow-hidden animate-fu4 shine">
    <div class="h-[3px] bg-gradient-to-r from-amber via-gold to-amber"></div>

    <div class="p-6 md:p-8">

      {{-- Header row --}}
      <div class="flex flex-wrap items-start justify-between gap-4 mb-8">
        <div>
          <div class="flex items-center gap-3 mb-1.5 flex-wrap">
            <span class="font-serif text-2xl text-ivory">{{ $activeOrder->{'N°_commande'} }}</span>
            <span class="inline-flex items-center gap-2 border border-gold/25 bg-gd text-gold text-[9px] tracking-[.1em] uppercase px-3 py-1">
              <span class="relative flex w-2 h-2">
                <span class="absolute inline-flex h-full w-full rounded-full bg-gold/60 animate-ping2"></span>
                <span class="relative inline-flex rounded-full w-2 h-2 bg-gold"></span>
              </span>
              {{ ucfirst($activeOrder->status) }}
            </span>
          </div>
          <p class="text-[11px] text-ivory/32 tracking-wide font-body">
            Passée {{ \Carbon\Carbon::parse($activeOrder->order_date)->diffForHumans() }}
            · {{ $activeOrder->quantity }} article(s)
          </p>
        </div>
        <div class="text-right">
          <div class="font-serif text-[2.2rem] font-light text-gold leading-none">
            {{ number_format($activeOrder->Total_Price, 0) }}
          </div>
          <div class="text-[10px] text-ivory/28 tracking-wide font-body mt-0.5">MAD · Total</div>
        </div>
      </div>

      {{-- Pipeline steps — static UI, kept exactly as original --}}
      <div class="mb-8">
        <div class="flex items-start justify-between relative">

          @php
            $steps = [
              'pending'     => 0,
              'confirmed'   => 1,
              'preparing'   => 2,
              'in_progress' => 2,
              'ready'       => 3,
              'delivered'   => 4,
              'completed'   => 5,
            ];
            $currentStep = $steps[$activeOrder->status] ?? 0;
          @endphp

          {{-- Step 1: Reçue --}}
          <div class="flex flex-col items-center flex-1 min-w-0">
            <div class="w-9 h-9 flex items-center justify-center mb-2
              {{ $currentStep >= 0 ? 'bg-sage border-2 border-sage' : 'bg-s2 border-2 border-gold/[.18]' }}">
              @if($currentStep >= 0)
                <svg class="w-4 h-4 text-ink" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                </svg>
              @endif
            </div>
            <span class="text-[9px] tracking-[.1em] uppercase text-center font-body {{ $currentStep >= 0 ? 'text-sage' : 'text-ivory/22' }}">Reçue</span>
          </div>
          <div class="h-[2px] flex-1 mt-[18px] mx-1 {{ $currentStep >= 1 ? 'bg-sage' : 'bg-gold/[.1]' }}"></div>

          {{-- Step 2: Confirmée --}}
          <div class="flex flex-col items-center flex-1 min-w-0">
            <div class="w-9 h-9 flex items-center justify-center mb-2
              {{ $currentStep >= 1 ? 'bg-sage border-2 border-sage' : 'bg-s2 border-2 border-gold/[.18]' }}">
              @if($currentStep >= 1)
                <svg class="w-4 h-4 text-ink" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                </svg>
              @endif
            </div>
            <span class="text-[9px] tracking-[.1em] uppercase text-center font-body {{ $currentStep >= 1 ? 'text-sage' : 'text-ivory/22' }}">Confirmée</span>
          </div>
          <div class="h-[2px] flex-1 mt-[18px] mx-1" style="{{ $currentStep >= 2 ? 'background:linear-gradient(to right,#6EC88A,#C8A96E)' : 'background:rgba(200,169,110,.1)' }}"></div>

          {{-- Step 3: En cuisine — ACTIVE --}}
          <div class="flex flex-col items-center flex-1 min-w-0">
            @if($currentStep === 2)
              <div class="relative mb-2">
                <div class="w-9 h-9 bg-gold border-2 border-gold flex items-center justify-center relative z-10">
                  <svg class="w-4 h-4 text-ink animate-spin2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                  </svg>
                </div>
                <div class="absolute inset-0 border-2 border-gold/40 animate-ping2 rounded-none"></div>
              </div>
              <span class="text-[9px] tracking-[.1em] uppercase text-gold text-center font-body font-medium">En cuisine</span>
              <span class="text-[8px] text-gold/50 animate-p2 mt-0.5">En cours…</span>
            @elseif($currentStep > 2)
              <div class="w-9 h-9 bg-sage border-2 border-sage flex items-center justify-center mb-2">
                <svg class="w-4 h-4 text-ink" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                </svg>
              </div>
              <span class="text-[9px] tracking-[.1em] uppercase text-sage text-center font-body">En cuisine</span>
            @else
              <div class="w-9 h-9 bg-s2 border-2 border-gold/[.18] flex items-center justify-center mb-2">
                <svg class="w-4 h-4 text-ivory/18" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
              </div>
              <span class="text-[9px] tracking-[.1em] uppercase text-ivory/22 text-center font-body">En cuisine</span>
            @endif
          </div>
          <div class="h-[2px] flex-1 mt-[18px] mx-1 {{ $currentStep >= 3 ? 'bg-sage' : 'bg-gold/[.07]' }}"></div>

          {{-- Step 4: Prête --}}
          <div class="flex flex-col items-center flex-1 min-w-0">
            <div class="w-9 h-9 flex items-center justify-center mb-2
              {{ $currentStep >= 3 ? 'bg-sage border-2 border-sage' : 'bg-s2 border-2 border-gold/[.18]' }}">
              @if($currentStep >= 3)
                <svg class="w-4 h-4 text-ink" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                </svg>
              @else
                <svg class="w-4 h-4 text-ivory/18" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                </svg>
              @endif
            </div>
            <span class="text-[9px] tracking-[.1em] uppercase text-center font-body {{ $currentStep >= 3 ? 'text-sage' : 'text-ivory/22' }}">Prête</span>
          </div>
          <div class="h-[2px] flex-1 mt-[18px] mx-1 {{ $currentStep >= 4 ? 'bg-sage' : 'bg-gold/[.05]' }}"></div>

          {{-- Step 5: Servie --}}
          <div class="flex flex-col items-center flex-1 min-w-0">
            <div class="w-9 h-9 flex items-center justify-center mb-2
              {{ $currentStep >= 4 ? 'bg-sage border-2 border-sage' : 'bg-s2 border-2 border-gold/[.12]' }}">
              @if($currentStep >= 4)
                <svg class="w-4 h-4 text-ink" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                </svg>
              @else
                <svg class="w-4 h-4 text-ivory/12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-1.4 5.6M17 13l1.4 5.6"/>
                </svg>
              @endif
            </div>
            <span class="text-[9px] tracking-[.1em] uppercase text-center font-body {{ $currentStep >= 4 ? 'text-sage' : 'text-ivory/18' }}">Servie</span>
          </div>
          <div class="h-[2px] flex-1 mt-[18px] mx-1 {{ $currentStep >= 5 ? 'bg-sage' : 'bg-gold/[.05]' }}"></div>

          {{-- Step 6: Terminée --}}
          <div class="flex flex-col items-center flex-1 min-w-0">
            <div class="w-9 h-9 flex items-center justify-center mb-2
              {{ $currentStep >= 5 ? 'bg-sage border-2 border-sage' : 'bg-s2 border-2 border-gold/[.08]' }}">
              @if($currentStep >= 5)
                <svg class="w-4 h-4 text-ink" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                </svg>
              @else
                <svg class="w-4 h-4 text-ivory/10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
              @endif
            </div>
            <span class="text-[9px] tracking-[.1em] uppercase text-center font-body {{ $currentStep >= 5 ? 'text-sage' : 'text-ivory/15' }}">Terminée</span>
          </div>

        </div>
      </div>

      <div class="grid md:grid-cols-2 gap-3 mb-6">
        @foreach($activeOrder->items as $item)
          <div class="flex items-center gap-4 bg-s2 border border-gold/[.12] px-4 py-3">
            <div class="w-10 h-10 bg-s3 border border-gold/[.07] flex items-center justify-center text-lg shrink-0">
              🍽️
            </div>
            <div class="flex-1 min-w-0">
              <div class="text-[12px] text-ivory font-body leading-tight">{{ $item->name }}</div>
              <div class="text-[9px] text-ivory/35 mt-0.5 tracking-wide font-body">
                {{ ucfirst($activeOrder->status) }}
              </div>
            </div>
            <div class="text-right shrink-0">
              <div class="text-[9px] text-ivory/28 font-body">×{{ $item->quantity }}</div>
              <div class="font-serif text-sm text-gold">
                {{ number_format($item->price * $item->quantity, 0) }} MAD
              </div>
            </div>
          </div>
        @endforeach
      </div>

      @php
        $pct = match($activeOrder->status) {
          'pending'     => 10,
          'confirmed'   => 30,
          'preparing', 'in_progress' => 60,
          'ready'       => 80,
          'delivered'   => 95,
          'completed'   => 100,
          default       => 0,
        };
        $totalItems = $activeOrder->items->count();
      @endphp
      <div class="mb-6">
        <div class="flex justify-between text-[9px] text-ivory/32 mb-1.5 font-body">
          <span>Progression cuisine</span>
          <span class="text-gold">{{ $totalItems }} article(s) · {{ ucfirst($activeOrder->status) }}</span>
        </div>
        <div class="h-[3px] bg-s3 overflow-hidden">
          <div class="h-full bg-gradient-to-r from-sage to-gold"></div>
        </div>
      </div>

      {{-- Meta row --}}
      <div class="flex flex-wrap items-center gap-3">
        <div class="flex items-center gap-2.5 border border-gold/[.12] bg-s2 px-4 py-2.5">
          <svg class="w-4 h-4 text-gold/55" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
          </svg>
          <div>
            <div class="text-[8px] text-ivory/30 uppercase tracking-[.2em] font-body">Date commande</div>
            <div class="text-[13px] text-gold font-body font-medium">
              {{ \Carbon\Carbon::parse($activeOrder->order_date)->format('d/m · H:i') }}
            </div>
          </div>
        </div>
        <div class="flex items-center gap-2.5 border border-gold/[.12] bg-s2 px-4 py-2.5">
          <svg class="w-4 h-4 text-gold/55" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
          </svg>
          <div>
            <div class="text-[8px] text-ivory/30 uppercase tracking-[.2em] font-body">Articles</div>
            <div class="text-[13px] text-ivory font-body font-medium">{{ $activeOrder->quantity }} article(s)</div>
          </div>
        </div>
        @if($activeOrder->stripe_payment_intent)
        <div class="flex items-center gap-2.5 border border-gold/[.12] bg-s2 px-4 py-2.5 ml-auto">
          <svg class="w-4 h-4 text-gold/55" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
          </svg>
          <div>
            <div class="text-[8px] text-ivory/30 uppercase tracking-[.2em] font-body">Paiement</div>
            <div class="text-[13px] text-sage font-body font-medium">Confirmé</div>
          </div>
        </div>
        @endif
      </div>

    </div>
  </div>

  @else
  <div class="bg-s1 border border-gold/[.08] p-10 text-center">
    <div class="text-3xl mb-3 opacity-30">🍽️</div>
    <p class="text-[12px] text-ivory/35 font-body">Aucune commande en cours pour le moment.</p>
  </div>
  @endif
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

        @foreach($pastOrders as $order)
<div id="order-{{ $order->id }}" class="ocard bg-s1 border border-gold/[.06] p-5 cursor-pointer opacity-50">
  <div class="flex flex-wrap items-start justify-between gap-4">
    <div class="flex items-start gap-4">

      {{-- Icon: green check for completed/delivered, red X for cancelled --}}
      @if($order->status === 'cancelled')
      <div class="w-10 h-10 bg-red-500/7 border border-red-500/14 flex items-center justify-center shrink-0 mt-0.5">
        <svg class="w-5 h-5 text-red-500/65" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 18L18 6M6 6l12 12"/>
        </svg>
      </div>
      @else
      <div class="w-10 h-10 bg-sage/7 border border-sage/14 flex items-center justify-center shrink-0 mt-0.5">
        <svg class="w-5 h-5 text-sage/65" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 13l4 4L19 7"/>
        </svg>
      </div>
      @endif

      <div>
        <div class="flex items-center gap-3 mb-1 flex-wrap">
          <span class="font-serif text-base text-ivory/55">{{ $order->{'N°_commande'} }}</span>
          <span class="inline-flex items-center gap-1.5 text-[9px] tracking-[.1em] uppercase px-2.5 py-1
            {{ $order->status === 'cancelled'
              ? 'border border-red-500/20 bg-red-500/10 text-red-500'
              : 'border border-sage/20 bg-sage/10 text-sage' }}">
            <span class="w-1.5 h-1.5 rounded-full shrink-0
              {{ $order->status === 'cancelled' ? 'bg-red-500' : 'bg-sage' }}"></span>
            {{ ucfirst($order->status) }}
          </span>
        </div>
        <p class="text-[10px] text-ivory/22 tracking-wide font-body">
          {{ $order->updated_at->diffForHumans() }}
        </p>
        <div class="flex flex-wrap gap-1.5 mt-2">
          @foreach($order->items as $item)
            <span class="text-[9px] bg-s2 border border-gold/[.05] px-2 py-0.5 text-ivory/22 font-body">
              {{ $item->name }} ×{{ $item->quantity }}
            </span>
          @endforeach
        </div>
      </div>
    </div>

    <div class="flex flex-col items-end gap-3">
      <div class="text-right">
        <div class="font-serif text-[1.8rem] font-light text-ivory/28 leading-none">
          {{ number_format($order->Total_Price, 0) }}
        </div>
        <div class="text-[9px] text-ivory/18 font-body mt-0.5">MAD</div>
      </div>
      <button onclick="event.stopPropagation();openDelete('{{ $order->id }}')"
        class="text-[9px] tracking-[.12em] uppercase px-3 py-2 border border-gold/[.12] text-ivory/22 hover:border-gold/25 hover:text-ivory/35 transition-all bg-transparent cursor-pointer font-body">
        Supprimer
      </button>
    </div>
  </div>
</div>
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