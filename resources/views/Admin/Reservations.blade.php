@include('Component.header')
<script>
  tailwind.config = {
    theme: {
      extend: {
        colors: {
          gold: '#C8A96E',
          gh: '#d4b87c',
          gd: 'rgba(200,169,110,0.10)',
          ink: '#0B0B0B',
          s1: '#111111',
          s2: '#161616',
          s3: '#1C1C1C',
          cream: '#F5F0E8',
          sage: '#6EC88A',
          rose: '#C86E6E',
          sky: '#6E9EC8',
          sun: '#C8C26E',
        },
        fontFamily: {
          display: ['"Cormorant Garamond"', 'serif'],
          body: ['Jost', 'sans-serif'],
        },
        keyframes: {
          fadeUp: {
            '0%': {
              opacity: '0',
              transform: 'translateY(18px)'
            },
            '100%': {
              opacity: '1',
              transform: 'translateY(0)'
            }
          },
          fadeIn: {
            '0%': {
              opacity: '0'
            },
            '100%': {
              opacity: '1'
            }
          },
          slideR: {
            '0%': {
              opacity: '0',
              transform: 'translateX(20px)'
            },
            '100%': {
              opacity: '1',
              transform: 'translateX(0)'
            }
          },
          shimmer: {
            '0%': {
              backgroundPosition: '200% center'
            },
            '100%': {
              backgroundPosition: '-200% center'
            }
          },
          pulse2: {
            '0%,100%': {
              opacity: '1'
            },
            '50%': {
              opacity: '.35'
            }
          },
          scaleIn: {
            '0%': {
              opacity: '0',
              transform: 'scale(.95) translateY(12px)'
            },
            '100%': {
              opacity: '1',
              transform: 'scale(1) translateY(0)'
            }
          },
          barIn: {
            '0%': {
              width: '0%'
            },
            '100%': {
              width: '100%'
            }
          },
        },
        animation: {
          'fade-up': 'fadeUp .55s ease both',
          'fade-up-2': 'fadeUp .55s ease both .1s',
          'fade-up-3': 'fadeUp .55s ease both .18s',
          'fade-up-4': 'fadeUp .55s ease both .26s',
          'fade-in': 'fadeIn .4s ease both',
          'slide-r': 'slideR .4s ease both',
          'shimmer': 'shimmer 3s linear infinite',
          'pulse2': 'pulse2 2s infinite',
          'scale-in': 'scaleIn .3s ease both',
          'bar-in': 'barIn .8s ease both',
        },
      }
    }
  }
</script>
<style>
  html,
  body {
    height: 100%;
    overflow: hidden;
  }

  body {
    font-family: 'Jost', sans-serif;
  }

  ::-webkit-scrollbar {
    width: 3px;
    height: 3px;
  }

  ::-webkit-scrollbar-thumb {
    background: rgba(200, 169, 110, .2);
  }

  /* Sidebar collapse */
  .sb {
    width: 240px;
    min-width: 240px;
    transition: width .32s ease, min-width .32s ease;
  }

  .sb.cx {
    width: 64px;
    min-width: 64px;
  }

  .sb.cx .hc {
    opacity: 0;
    width: 0;
    overflow: hidden;
    pointer-events: none;
  }

  .sb.cx .nb {
    opacity: 0;
  }

  /* Nav item */
  .nav-item {
    border-left: 2px solid transparent;
    transition: all .2s;
  }

  .nav-item:hover {
    background: rgba(200, 169, 110, .06);
  }

  .nav-item.active {
    border-left-color: #C8A96E;
    background: rgba(200, 169, 110, .08);
  }

  .nav-item.active .ni-lbl {
    color: #C8A96E;
  }

  .nav-item.active .ni-ico {
    color: #C8A96E;
  }

  /* Gold shimmer text */
  .gtext {
    background: linear-gradient(90deg, #C8A96E 0%, #f0d9a8 38%, #C8A96E 56%, #a07840 100%);
    background-size: 220% auto;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    animation: shimmer 3s linear infinite;
    background-clip: text;
  }

  /* Table row */
  .res-row {
    transition: background .18s;
  }

  .res-row:hover {
    background: rgba(200, 169, 110, .025);
  }

  .res-row:hover .row-actions {
    opacity: 1;
  }

  .row-actions {
    opacity: 0;
    transition: opacity .2s;
  }

  /* Status badge base */
  .badge {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    font-size: 10px;
    letter-spacing: .08em;
    text-transform: uppercase;
    padding: 3px 10px;
    border-width: 1px;
    border-style: solid;
  }

  .badge-dot {
    width: 6px;
    height: 6px;
    border-radius: 50%;
    flex-shrink: 0;
  }

  .b-confirmed {
    background: rgba(110, 200, 138, .09);
    border-color: rgba(110, 200, 138, .25);
    color: #6EC88A;
  }

  .b-confirmed .badge-dot {
    background: #6EC88A;
    animation: pulse2 2s infinite;
  }

  .b-pending {
    background: rgba(200, 169, 110, .09);
    border-color: rgba(200, 169, 110, .25);
    color: #C8A96E;
  }

  .b-pending .badge-dot {
    background: #C8A96E;
    animation: pulse2 2s infinite;
  }

  .b-cancelled {
    background: rgba(200, 110, 110, .09);
    border-color: rgba(200, 110, 110, .25);
    color: #C86E6E;
  }

  .b-cancelled .badge-dot {
    background: #C86E6E;
  }

  .b-completed {
    background: rgba(110, 158, 200, .09);
    border-color: rgba(110, 158, 200, .25);
    color: #6E9EC8;
  }

  .b-completed .badge-dot {
    background: #6E9EC8;
  }

  /* Action buttons */
  .act-btn {
    width: 30px;
    height: 30px;
    border: 1px solid;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all .2s;
    cursor: pointer;
    background: transparent;
    flex-shrink: 0;
  }

  .act-confirm {
    border-color: rgba(110, 200, 138, .2);
    color: rgba(110, 200, 138, .55);
  }

  .act-confirm:hover {
    border-color: #6EC88A;
    color: #6EC88A;
    background: rgba(110, 200, 138, .06);
  }

  .act-cancel {
    border-color: rgba(200, 200, 110, .2);
    color: rgba(200, 200, 110, .55);
  }

  .act-cancel:hover {
    border-color: #C8C26E;
    color: #C8C26E;
    background: rgba(200, 200, 110, .06);
  }

  .act-delete {
    border-color: rgba(200, 110, 110, .2);
    color: rgba(200, 110, 110, .55);
  }

  .act-delete:hover {
    border-color: #C86E6E;
    color: #C86E6E;
    background: rgba(200, 110, 110, .06);
  }

  .act-view {
    border-color: rgba(200, 169, 110, .15);
    color: rgba(200, 169, 110, .5);
  }

  .act-view:hover {
    border-color: #C8A96E;
    color: #C8A96E;
    background: rgba(200, 169, 110, .06);
  }

  /* Filter tab */
  .f-tab {
    transition: all .2s;
    border-bottom: 2px solid transparent;
  }

  .f-tab.on {
    border-bottom-color: #C8A96E;
    color: #C8A96E;
  }

  /* Input focus */
  input:focus,
  select:focus,
  textarea:focus {
    border-color: rgba(200, 169, 110, .55) !important;
    outline: none;
    box-shadow: 0 0 0 3px rgba(200, 169, 110, .07);
  }

  /* Checkbox accent */
  input[type=checkbox] {
    accent-color: #C8A96E;
  }

  /* Modal bg */
  .modal-bg {
    background: rgba(0, 0, 0, .88);
    backdrop-filter: blur(10px);
  }

  /* Stat card hover underline */
  .stat-card {
    position: relative;
    overflow: hidden;
  }

  .stat-card::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    height: 2px;
    width: 0;
    background: #C8A96E;
    transition: width .45s ease;
  }

  .stat-card:hover::after {
    width: 100%;
  }

  /* Card shine on hover */
  .shine {
    position: relative;
    overflow: hidden;
  }

  .shine::before {
    content: '';
    position: absolute;
    top: 0;
    left: -120%;
    width: 55%;
    height: 100%;
    background: linear-gradient(to right, transparent, rgba(255, 255, 255, .03), transparent);
    transform: skewX(-20deg);
    transition: left .6s;
  }

  .shine:hover::before {
    left: 140%;
  }
</style>
<!-- ── CONTENT SCROLL ── -->
<div class="flex-1 overflow-y-auto bg-ink">
  <div class="p-8 flex flex-col gap-7">


    <!-- ── STAT CARDS ── -->
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-px bg-gold/[.07] animate-fade-up">

      <div class="stat-card shine bg-s1 px-7 py-6">
        <div class="flex items-center justify-between mb-3">
          <span class="text-[10px] tracking-[.22em] uppercase text-cream/30">Total aujourd'hui</span>
          <span class="text-base opacity-35">🗓</span>
        </div>
        <div class="font-display text-[2.5rem] font-light leading-none mb-2">{{ $TotalDays->sum('count') }}</div>
        <div class="flex items-center gap-1.5 text-[11px] text-sage">
          <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
          </svg>
          12% vs hier
        </div>
      </div>

      <div class="stat-card shine bg-s1 px-7 py-6">
        <div class="flex items-center justify-between mb-3">
          <span class="text-[10px] tracking-[.22em] uppercase text-cream/30">En attente</span>
          <span class="text-base opacity-35">⏳</span>
        </div>
        <div class="font-display text-[2.5rem] font-light leading-none mb-2 text-sun">{{ $pendingCount }}</div>
        <div class="flex items-center gap-1.5 text-[11px] text-cream/30">
          <span class="w-1.5 h-1.5 rounded-full bg-sun animate-pulse2"></span>
          Action requise
        </div>
      </div>

      <div class="stat-card shine bg-s1 px-7 py-6">
        <div class="flex items-center justify-between mb-3">
          <span class="text-[10px] tracking-[.22em] uppercase text-cream/30">Confirmées</span>
          <span class="text-base opacity-35">✅</span>
        </div>
        <div class="font-display text-[2.5rem] font-light leading-none mb-2 text-sage">{{ $acceptedCount }}</div>
        <div class="text-[11px] text-cream/30">Ce mois · {{ $allCount }} total</div>
      </div>

      <div class="stat-card shine bg-s1 px-7 py-6">
        <div class="flex items-center justify-between mb-3">
          <span class="text-[10px] tracking-[.22em] uppercase text-cream/30">Annulées</span>
          <span class="text-base opacity-35">✕</span>
        </div>
        <div class="font-display text-[2.5rem] font-light leading-none mb-2 text-rose">{{ $cancelledCount }}</div>
        <div class="flex items-center gap-1.5 text-[11px] text-rose">
          <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
          </svg>
          5% vs hier
        </div>
      </div>
    </div>


    <!-- ── RESERVATIONS CARD ── -->
    <div class="bg-s1 border border-gold/[.1] animate-fade-up-2">

      <!-- Card header: filters + tabs -->
      <div class="flex flex-wrap items-center gap-0 px-6 pt-5 border-b border-gold/[.08]">
        <!-- Status filter tabs -->
        <button onclick="filterTab(this,'all')" class="f-tab on text-[11px] tracking-[.14em] uppercase px-4 pb-4 text-cream/40 hover:text-cream cursor-pointer bg-transparent border-0 whitespace-nowrap">Toutes <span class="text-gold ml-1 text-[10px]"></span></button>
        <button onclick="filterTab(this,'confirmed')" class="f-tab text-[11px] tracking-[.14em] uppercase px-4 pb-4 text-cream/40 hover:text-cream cursor-pointer bg-transparent border-0 whitespace-nowrap">Confirmées <span class="text-sage ml-1 text-[10px]"></span></button>
        <button onclick="filterTab(this,'pending')" class="f-tab text-[11px] tracking-[.14em] uppercase px-4 pb-4 text-cream/40 hover:text-cream cursor-pointer bg-transparent border-0 whitespace-nowrap">En attente <span class="text-sun ml-1 text-[10px]"></span></button>
        <button onclick="filterTab(this,'cancelled')" class="f-tab text-[11px] tracking-[.14em] uppercase px-4 pb-4 text-cream/40 hover:text-cream cursor-pointer bg-transparent border-0 whitespace-nowrap">Annulées <span class="text-rose ml-1 text-[10px]"></span></button>
        <button onclick="filterTab(this,'completed')" class="f-tab text-[11px] tracking-[.14em] uppercase px-4 pb-4 text-cream/40 hover:text-cream cursor-pointer bg-transparent border-0 whitespace-nowrap">Terminées</button>
        <div class="flex-1"></div>
        <!-- Secondary controls -->
        <div class="flex items-center gap-3 pb-3">
          <input type="date" class="bg-s2 border border-gold/[.1] px-3 py-1.5 text-[11px] text-cream font-body cursor-pointer" />
          <select class="bg-s2 border border-gold/[.1] px-3 py-1.5 text-[11px] text-cream/50 font-body cursor-pointer">
            <option>Heure ↑</option>
            <option>Heure ↓</option>
            <option>Nom A→Z</option>
            <option>Couverts ↓</option>
          </select>
        </div>
      </div>

      <!-- Table -->
      <div class="overflow-x-auto">
        <table class="w-full border-collapse">
          <thead>
            <tr class="border-b border-gold/[.07]">
              <th class="text-left px-6 py-3">
                <label class="flex items-center gap-2 cursor-pointer">
                  <input type="checkbox" class="w-3.5 h-3.5" />
                  <span class="text-[9px] tracking-[.22em] uppercase text-cream/20 font-normal">Client</span>
                </label>
              </th>
              <th class="text-left px-4 py-3 text-[9px] tracking-[.22em] uppercase text-cream/20 font-normal">Table</th>
              <th class="text-left px-4 py-3 text-[9px] tracking-[.22em] uppercase text-cream/20 font-normal whitespace-nowrap">Date & Heure</th>
              <th class="text-left px-4 py-3 text-[9px] tracking-[.22em] uppercase text-cream/20 font-normal">Pers.</th>
              <th class="text-left px-4 py-3 text-[9px] tracking-[.22em] uppercase text-cream/20 font-normal">Statut</th>
              <th class="text-left px-4 py-3 text-[9px] tracking-[.22em] uppercase text-cream/20 font-normal hidden xl:table-cell">Demande</th>
              <th class="text-right px-6 py-3 text-[9px] tracking-[.22em] uppercase text-cream/20 font-normal">Actions</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gold/[.04]">

            <!-- ── ROW 1 — Confirmed ── -->
            @foreach($reservations as $reservation)
            <tr class="res-row group">
              <td class="px-6 py-4">
                <label class="flex items-center gap-3 cursor-pointer">
                  <input type="checkbox" class="w-3.5 h-3.5 shrink-0" />
                  <div class="w-8 h-8 bg-gd border border-gold/20 flex items-center justify-center text-[10px] text-gold shrink-0 font-semibold">MA</div>
                  <div>
                    <div class="text-[13px] text-cream font-medium">{{ $reservation->customer->name ?? 'Client non spécifié' }}</div>
                    <div class="text-[10px] text-cream/30">{{ $reservation->customer->phone ?? 'Téléphone non spécifié' }}</div>
                  </div>
                </label>
              </td>
              <td class="px-4 py-4 text-[12px] text-cream/55 whitespace-nowrap">{{ $reservation->tableNumber ?? 'Table non spécifiée' }}</td>
              <td class="px-4 py-4 whitespace-nowrap">
                <div class="text-[12px] text-cream/60">{{ $reservation->reservationDate ?? 'Date non spécifiée' }}</div>
                <div class="font-display text-lg text-gold leading-tight">{{ $reservation->Hour ?? 'Heure non spécifiée' }}</div>
              </td>
              <td class="px-4 py-4">
                <div class="flex items-center gap-1.5 text-[12px] text-cream/55">
                  <svg class="w-3 h-3 text-cream/25" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0" />
                  </svg>
                  {{ $reservation->numberOfPeople ?? 'N/A' }} pers.
                </div>
              </td>
              

              <td class="px-4 py-4">
                @if($reservation->status === 'accepted')
                 <span class="badge b-confirmed"><span class="badge-dot"></span>Confirmée</span>
                @elseif($reservation->status === 'pending')
                 <span class="badge b-pending"><span class="badge-dot"></span>En attente</span>
                @elseif($reservation->status === 'cancelled')
                 <span class="badge b-cancelled"><span class="badge-dot"></span>Annulée</span>
                @elseif($reservation->status === 'completed')
                 <span class="badge b-completed"><span class="badge-dot"></span>Terminée</span>
                @else
                 <span class="text-[11px] text-cream/30">Statut inconnu</span>
                @endif
              </td>
              <td class="px-4 py-4 hidden xl:table-cell text-[11px] text-cream/30 max-w-[160px] truncate">{{ $reservation->special_requests ?? 'Aucune demande' }}</td>
              <td class="px-6 py-4">
                <div class="row-actions flex items-center justify-end gap-1.5">
                  <button onclick="openView(
  '{{ $reservation->id }}',
  '{{ $reservation->customer->name ?? '' }}',
  '{{ $reservation->customer->phone ?? '' }}',
  '{{ $reservation->tableNumber ?? '' }}',
  '{{ $reservation->reservationDate ?? '' }}',
  '{{ $reservation->Hour ?? '' }}',
  '{{ $reservation->numberOfPeople ?? '' }}',
  '{{ $reservation->status ?? '' }}',
  '{{ $reservation->special_requests ?? '' }}',
  '{{ route('admin.reservation.accept', $reservation->id) }}',
  '{{ route('admin.reservations.cancel', $reservation->id) }}',
  '{{ route('admin.reservation.delete', $reservation->id) }}'
)" title="Voir détails" class="act-btn act-view">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                  </button>
                  <a href="{{route('admin.reservation.accept', ['id' => $reservation->id])}}"><button title="Confirmer" class="act-btn act-confirm">
                      <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 13l4 4L19 7" />
                      </svg>
                    </button></a>
                  <a href="{{route('admin.reservations.cancel', ['id' => $reservation->id])}}"><button title="Annuler" class="act-btn act-cancel">
                      <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
                      </svg>
                    </button></a>
                  <a href="{{route('admin.reservation.delete', ['id' => $reservation->id])}}"><button onclick="openDelete()" title="Supprimer" class="act-btn act-delete">
                      <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                      </svg>
                    </button></a>
                </div>
              </td>
            </tr>
            @endforeach

            <!-- ── ROW 2 — Confirmed ── -->


          </tbody>
        </table>
      </div>

      <!-- Table footer -->
      <div class="px-6 py-3.5 border-t border-gold/[.07] bg-s2 flex items-center justify-between flex-wrap gap-3">
        <div class="flex items-center gap-4">
          <span class="text-[11px] text-cream/30">8 réservations affichées</span>
          <!-- Bulk actions -->
          <div class="flex items-center gap-2">
            <button class="text-[10px] tracking-[.12em] uppercase px-3 py-1.5 border border-sage/25 text-sage/60 hover:bg-sage/10 hover:text-sage transition-all bg-transparent cursor-pointer">✓ Confirmer sélection</button>
            <button class="text-[10px] tracking-[.12em] uppercase px-3 py-1.5 border border-rose/25 text-rose/60 hover:bg-rose/10 hover:text-rose transition-all bg-transparent cursor-pointer">✕ Annuler sélection</button>
          </div>
        </div>
        <!-- Pagination -->
        <div class="flex items-center gap-1.5">
          <button class="w-7 h-7 border border-gold/[.12] text-cream/30 hover:border-gold hover:text-gold transition-all text-xs flex items-center justify-center bg-transparent cursor-pointer">‹</button>
          <span class="w-7 h-7 bg-gold text-ink text-[11px] font-semibold flex items-center justify-center">1</span>
          <span class="w-7 h-7 border border-gold/[.12] text-cream/35 text-[11px] flex items-center justify-center cursor-pointer hover:border-gold hover:text-gold transition-all">2</span>
          <span class="w-7 h-7 border border-gold/[.12] text-cream/35 text-[11px] flex items-center justify-center cursor-pointer hover:border-gold hover:text-gold transition-all">3</span>
          <button class="w-7 h-7 border border-gold/[.12] text-cream/30 hover:border-gold hover:text-gold transition-all text-xs flex items-center justify-center bg-transparent cursor-pointer">›</button>
        </div>
      </div>
    </div>


  </div><!-- /p-8 -->
</div><!-- /scroll -->
</div><!-- /main -->


<!-- ══════════════════════════════════════════
     ADD RESERVATION MODAL
══════════════════════════════════════════ -->
<div id="addModal" class="hidden fixed inset-0 z-[100] flex items-center justify-center px-4">
  <div class="modal-bg absolute inset-0" onclick="this.closest('#addModal').classList.add('hidden');document.body.style.overflow=''"></div>
  <div class="relative bg-s1 border border-gold/[.18] w-full max-w-lg shadow-2xl animate-scale-in overflow-y-auto" style="max-height:92vh">
    <!-- Header -->
    <div class="sticky top-0 bg-s1 border-b border-gold/[.1] flex items-center justify-between px-7 py-5 z-10">
      <div>
        <span class="block text-[9px] tracking-[.38em] uppercase text-gold mb-0.5">La Maison · Admin</span>
        <h3 class="font-display text-[1.5rem] font-light">Nouvelle <em class="italic text-gold">réservation</em></h3>
      </div>
      <button onclick="document.getElementById('addModal').classList.add('hidden');document.body.style.overflow=''"
        class="w-8 h-8 border border-gold/20 flex items-center justify-center text-cream/30 hover:text-gold hover:border-gold transition-all bg-transparent cursor-pointer text-base">✕</button>
    </div>
    <!-- Form -->
    <div class="p-7 flex flex-col gap-4">
      <div class="grid grid-cols-2 gap-4">
        <div>
          <label class="block text-[9px] tracking-[.2em] uppercase text-cream/30 mb-1.5">Prénom *</label>
          <input type="text" placeholder="Ahmed" class="w-full bg-s2 border border-gold/[.1] px-4 py-3 text-[13px] text-cream placeholder-cream/20 font-body" />
        </div>
        <div>
          <label class="block text-[9px] tracking-[.2em] uppercase text-cream/30 mb-1.5">Nom *</label>
          <input type="text" placeholder="Benali" class="w-full bg-s2 border border-gold/[.1] px-4 py-3 text-[13px] text-cream placeholder-cream/20 font-body" />
        </div>
      </div>
      <div class="grid grid-cols-2 gap-4">
        <div>
          <label class="block text-[9px] tracking-[.2em] uppercase text-cream/30 mb-1.5">Téléphone *</label>
          <input type="tel" placeholder="+212 6XX XXX XXX" class="w-full bg-s2 border border-gold/[.1] px-4 py-3 text-[13px] text-cream placeholder-cream/20 font-body" />
        </div>
        <div>
          <label class="block text-[9px] tracking-[.2em] uppercase text-cream/30 mb-1.5">Email</label>
          <input type="email" placeholder="email@exemple.com" class="w-full bg-s2 border border-gold/[.1] px-4 py-3 text-[13px] text-cream placeholder-cream/20 font-body" />
        </div>
      </div>
      <div class="grid grid-cols-3 gap-4">
        <div>
          <label class="block text-[9px] tracking-[.2em] uppercase text-cream/30 mb-1.5">Date *</label>
          <input type="date" class="w-full bg-s2 border border-gold/[.1] px-4 py-3 text-[13px] text-cream font-body cursor-pointer" />
        </div>
        <div>
          <label class="block text-[9px] tracking-[.2em] uppercase text-cream/30 mb-1.5">Heure *</label>
          <select class="w-full bg-s2 border border-gold/[.1] px-4 py-3 text-[13px] text-cream font-body cursor-pointer">
            <option class="bg-s2">12:00</option>
            <option class="bg-s2">12:30</option>
            <option class="bg-s2">19:00</option>
            <option class="bg-s2">19:30</option>
            <option class="bg-s2">20:00</option>
            <option class="bg-s2">20:30</option>
            <option class="bg-s2">21:00</option>
            <option class="bg-s2">21:30</option>
          </select>
        </div>
        <div>
          <label class="block text-[9px] tracking-[.2em] uppercase text-cream/30 mb-1.5">Personnes *</label>
          <select class="w-full bg-s2 border border-gold/[.1] px-4 py-3 text-[13px] text-cream font-body cursor-pointer">
            <option class="bg-s2">1</option>
            <option class="bg-s2" selected>2</option>
            <option class="bg-s2">3</option>
            <option class="bg-s2">4</option>
            <option class="bg-s2">5</option>
            <option class="bg-s2">6</option>
            <option class="bg-s2">8+</option>
          </select>
        </div>
      </div>
      <div class="grid grid-cols-2 gap-4">
        <div>
          <label class="block text-[9px] tracking-[.2em] uppercase text-cream/30 mb-1.5">Table</label>
          <select class="w-full bg-s2 border border-gold/[.1] px-4 py-3 text-[13px] text-cream font-body cursor-pointer">
            <option class="bg-s2">Auto-assign</option>
            <option class="bg-s2">Table 1 (2p)</option>
            <option class="bg-s2">Table 5 (4p)</option>
            <option class="bg-s2">Table 12 (6p)</option>
            <option class="bg-s2">Table 22 (8p)</option>
            <option class="bg-s2">Salle privée</option>
          </select>
        </div>
        <div>
          <label class="block text-[9px] tracking-[.2em] uppercase text-cream/30 mb-1.5">Statut</label>
          <select class="w-full bg-s2 border border-gold/[.1] px-4 py-3 text-[13px] text-cream font-body cursor-pointer">
            <option value="confirmed" class="bg-s2">✅ Confirmée</option>
            <option value="pending" class="bg-s2">⏳ En attente</option>
          </select>
        </div>
      </div>
      <div>
        <label class="block text-[9px] tracking-[.2em] uppercase text-cream/30 mb-1.5">Demandes spéciales</label>
        <textarea rows="3" placeholder="Allergie, occasion spéciale, préférence de table…"
          class="w-full bg-s2 border border-gold/[.1] px-4 py-3 text-[13px] text-cream placeholder-cream/20 font-body resize-none"></textarea>
      </div>
      <!-- Occasion badges -->
      <div>
        <label class="block text-[9px] tracking-[.2em] uppercase text-cream/30 mb-2">Occasion</label>
        <div class="flex flex-wrap gap-2">
          <label class="flex items-center gap-1.5 cursor-pointer"><input type="checkbox" class="w-3.5 h-3.5" /><span class="text-[11px] text-cream/50">🎂 Anniversaire</span></label>
          <label class="flex items-center gap-1.5 cursor-pointer"><input type="checkbox" class="w-3.5 h-3.5" /><span class="text-[11px] text-cream/50">💍 Romantique</span></label>
          <label class="flex items-center gap-1.5 cursor-pointer"><input type="checkbox" class="w-3.5 h-3.5" /><span class="text-[11px] text-cream/50">💼 Business</span></label>
          <label class="flex items-center gap-1.5 cursor-pointer"><input type="checkbox" class="w-3.5 h-3.5" /><span class="text-[11px] text-cream/50">🎉 Fête</span></label>
        </div>
      </div>
      <!-- Notification toggle (pure CSS) -->
      <label class="flex items-center justify-between bg-s2 border border-gold/[.08] px-4 py-3 cursor-pointer">
        <div>
          <div class="text-[12px] text-cream/55">Envoyer confirmation SMS / Email</div>
          <div class="text-[10px] text-cream/25 mt-0.5">Notifie automatiquement le client</div>
        </div>
        <input type="checkbox" checked class="w-4 h-4" />
      </label>
      <!-- Buttons -->
      <div class="flex gap-3 pt-1">
        <button onclick="document.getElementById('addModal').classList.add('hidden');document.body.style.overflow=''"
          class="flex-1 py-3.5 border border-gold/20 text-cream/40 text-[11px] tracking-[.13em] uppercase hover:border-gold hover:text-cream transition-all bg-transparent cursor-pointer">Annuler</button>
        <button class="group flex-[2] py-3.5 bg-gold text-ink text-[11px] tracking-[.13em] uppercase font-semibold hover:bg-gh transition-colors border-0 cursor-pointer flex items-center justify-center gap-2">
          <svg class="w-4 h-4 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 13l4 4L19 7" />
          </svg>
          Enregistrer la réservation
        </button>
      </div>
    </div>
  </div>
</div>


<!-- ══════════════════════════════════════════
     VIEW DETAIL MODAL
══════════════════════════════════════════ -->
<div id="viewModal" class="hidden fixed inset-0 z-[100] flex items-center justify-center px-4">

  <!-- Overlay -->
  <div class="modal-bg absolute inset-0"
    onclick="closeView()"></div>

  <!-- Modal -->
  <div class="relative bg-s1 border border-gold/[.15] w-full max-w-md shadow-2xl animate-scale-in">

    <!-- Header -->
    <div class="flex items-center justify-between px-7 py-5 border-b border-gold/[.1]">
      <div>
        <span class="block text-[9px] tracking-[.35em] uppercase text-gold mb-0.5">
          Réservation #<span id="vm-id"></span>
        </span>

        <h3 class="font-display text-xl font-light">
          M. <em id="vm-name" class="italic text-gold"></em>
        </h3>
      </div>

      <button onclick="closeView()"
        class="w-8 h-8 border border-gold/20 flex items-center justify-center text-cream/30 hover:text-gold hover:border-gold transition-all bg-transparent cursor-pointer">
        ✕
      </button>
    </div>

    <!-- Body -->
    <div class="p-7">

      <!-- Grid -->
      <div class="grid grid-cols-2 gap-3 mb-4">

        <div class="bg-s2 px-4 py-3">
          <div class="text-[9px] uppercase text-gold mb-1">Table</div>
          <div id="vm-table" class="text-[13px] text-cream"></div>
        </div>

        <div class="bg-s2 px-4 py-3">
          <div class="text-[9px] uppercase text-gold mb-1">Heure</div>
          <div id="vm-hour" class="font-display text-xl text-gold"></div>
        </div>

        <div class="bg-s2 px-4 py-3">
          <div class="text-[9px] uppercase text-gold mb-1">Date</div>
          <div id="vm-date" class="text-[13px] text-cream"></div>
        </div>

        <div class="bg-s2 px-4 py-3">
          <div class="text-[9px] uppercase text-gold mb-1">Personnes</div>
          <div id="vm-people" class="text-[13px] text-cream"></div>
        </div>

      </div>

      <!-- Contact -->
      <div class="bg-s2 px-4 py-3 mb-3">
        <div class="text-[9px] uppercase text-gold mb-1">Contact</div>
        <div id="vm-phone" class="text-[13px] text-cream"></div>
      </div>

      <!-- Status -->
      <div class="flex items-center justify-between bg-s2 px-4 py-3 mb-3">
        <span class="text-[9px] uppercase text-gold">Statut</span>
        <span id="vm-status" class="badge"></span>
      </div>

      <!-- Special request -->
      <div class="bg-s2 px-4 py-3 border-l-2 border-gold mb-6">
        <div class="text-[9px] uppercase text-gold mb-1">Demande spéciale</div>
        <div id="vm-note" class="text-[12px] text-cream/55"></div>
      </div>
      <input type="hidden" id="vm-confirm-url">
      <input type="hidden" id="vm-cancel-url">
      <input type="hidden" id="vm-edit-url">
      <!-- Actions -->
      <div class="grid grid-cols-3 gap-2">

        <a id="vm-edit-btn" href="#">
          <button class="w-full py-3 border border-gold/20 text-cream/40 text-[10px] uppercase hover:border-gold hover:text-cream transition-all">
            Delete
          </button>
        </a>

        <a id="vm-confirm-btn" href="#">
          <button class="w-full py-3 border border-sage/30 text-sage text-[10px] uppercase hover:bg-sage/10 transition-all">
            ✓ Confirmer
          </button>
        </a>

        <a id="vm-cancel-btn" href="#">
          <button class="w-full py-3 border border-rose/30 text-rose text-[10px] uppercase hover:bg-rose/10 transition-all">
            ✕ Annuler
          </button>
        </a>

      </div>
    </div>
  </div>
</div>


<!-- ══════════════════════════════════════════
     DELETE CONFIRM MODAL
══════════════════════════════════════════ -->
<div id="deleteModal" class="hidden fixed inset-0 z-[110] flex items-center justify-center px-4">
  <div class="modal-bg absolute inset-0" onclick="this.closest('#deleteModal').classList.add('hidden');document.body.style.overflow=''"></div>
  <div class="relative bg-s1 border border-rose/20 w-full max-w-sm shadow-2xl animate-scale-in p-8 text-center">
    <div class="w-14 h-14 bg-rose/10 border border-rose/20 flex items-center justify-center mx-auto mb-5">
      <svg class="w-6 h-6 text-rose" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
      </svg>
    </div>
    <h3 class="font-display text-xl mb-3">Supprimer cette <em class="italic text-rose">réservation</em> ?</h3>
    <p class="text-[12px] text-cream/40 mb-7 leading-relaxed">Cette action est irréversible. La réservation sera définitivement supprimée du système.</p>
    <div class="flex gap-3">
      <button onclick="document.getElementById('deleteModal').classList.add('hidden');document.body.style.overflow=''"
        class="flex-1 py-3 border border-gold/20 text-cream/40 text-[11px] tracking-[.12em] uppercase hover:border-gold hover:text-cream transition-all bg-transparent cursor-pointer">Annuler</button>
      <button onclick="document.getElementById('deleteModal').classList.add('hidden');document.body.style.overflow=''"
        class="flex-1 py-3 bg-rose text-cream text-[11px] tracking-[.12em] uppercase font-semibold hover:bg-red-700 transition-colors border-0 cursor-pointer">Supprimer</button>
    </div>
  </div>
</div>


<script>
  // ── Date badge ──
  document.getElementById('dateBadge').textContent =
    new Date().toLocaleDateString('fr-FR', {
      weekday: 'long',
      day: 'numeric',
      month: 'long'
    });

  // ── Sidebar toggle ──
  // (inline onclick on the button handles it)

  // ── Filter tabs ──
  function filterTab(btn, tab) {
    document.querySelectorAll('.f-tab').forEach(b => b.classList.remove('on'));
    btn.classList.add('on');
  }

  // ── Open modals ──
  function openView(
    id, name, phone, table, date, hour, people, status, special_requests,
    confirmUrl, cancelUrl, editUrl
  ) {
    document.getElementById('viewModal').classList.remove('hidden');
    document.body.style.overflow = 'hidden';

    // Fill data
    document.getElementById('vm-id').textContent = id || '---';
    document.getElementById('vm-name').textContent = name || 'N/A';
    document.getElementById('vm-table').textContent = table || 'N/A';
    document.getElementById('vm-hour').textContent = hour || 'N/A';
    document.getElementById('vm-date').textContent = date || 'N/A';
    document.getElementById('vm-people').textContent = people ? people + ' pers.' : 'N/A';
    document.getElementById('vm-phone').textContent = phone || 'N/A';
    document.getElementById('vm-note').textContent = special_requests || 'Aucune demande';

    // Status
    const statusEl = document.getElementById('vm-status');
    statusEl.className = 'badge';

   if(status === 'accepted') {
      statusEl.classList.add('b-confirmed');
      statusEl.innerHTML = '<span class="badge-dot"></span>Confirmée';
    } else if (status === 'pending') {
      statusEl.classList.add('b-pending');
      statusEl.innerHTML = '<span class="badge-dot"></span>En attente';
    } else if (status === 'cancelled') {
      statusEl.classList.add('b-cancelled');
      statusEl.innerHTML = '<span class="badge-dot"></span>Annulée';
    } else if (status === 'completed') {
      statusEl.classList.add('b-completed');
      statusEl.innerHTML = '<span class="badge-dot"></span>Terminée';
    } else {
      statusEl.textContent = 'Statut inconnu';
    }
    document.getElementById('vm-confirm-btn').href = confirmUrl;
    document.getElementById('vm-cancel-btn').href = cancelUrl;
    document.getElementById('vm-edit-btn').href = editUrl;
  }


  // Close modal
  function closeView() {
    document.getElementById('viewModal').classList.add('hidden');
    document.body.style.overflow = '';
  }


  function closeView() {
    document.getElementById('viewModal').classList.add('hidden');
    document.body.style.overflow = '';
  }

  function openDelete() {
    document.getElementById('deleteModal').classList.remove('hidden');
    document.body.style.overflow = 'hidden';
  }

  // ── Close on Escape ──
  document.addEventListener('keydown', e => {
    if (e.key === 'Escape') {
      ['addModal', 'viewModal', 'deleteModal'].forEach(id =>
        document.getElementById(id).classList.add('hidden'));
      document.body.style.overflow = '';
    }
  });
</script>
</body>

</html>