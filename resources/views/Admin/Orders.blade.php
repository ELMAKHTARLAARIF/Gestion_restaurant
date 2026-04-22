@include('Component.AdminOrderPage.head')

<body class="bg-ink text-cream font-body flex" style="font-size:13px">

  <!-- ══════════════════ SIDEBAR ══════════════════ -->
  @include('Component.header')


  <!-- ══════════════════ MAIN ══════════════════ -->
  <div class="flex-1 flex flex-col overflow-hidden">

    <!-- ── TOP BAR ── -->
    @include('Component.AdminOrderPage.header')

    <!-- ── SUB-BAR: stats strip ── -->
    @include('Component.AdminOrderPage.subbar')


    <!-- ════════════════════════════
         PIPELINE VIEW (Kanban)
    ════════════════════════════ -->
    <div id="viewKanban" class="flex-1 overflow-x-auto overflow-y-hidden">
      <div class="flex gap-0 h-full min-w-max px-0">

        <!-- ── COL: PENDING ── -->
        <div class="flex flex-col w-72 shrink-0 border-r border-gold/[.07]">
          <div class="col-accent bg-amber"></div>
          <div class="flex items-center justify-between px-4 py-3 bg-s2 border-b border-gold/[.08] shrink-0">
            <div class="flex items-center gap-2">
              <span class="text-[9px] tracking-[.25em] uppercase text-amber">Pending</span>
              <span class="w-5 h-5 bg-amber/15 text-amber text-[10px] font-semibold flex items-center justify-center">{{ $counts['pending'] }}</span>
            </div>
            <span class="text-[9px] text-cream/25">En attente</span>
          </div>
          <div class="col-scroll flex-1 p-3 flex flex-col gap-2.5 bg-s1">

            @foreach($AllOrders as $order)
            @if($order->status == "pending")
            <div class="order-card bg-s2 border border-gold/[.1] p-4 cursor-pointer" onclick="openDetail('{{ $order->id }}')">
              <div class="flex items-start justify-between mb-3">
                <div>
                  <div class="font-display text-sm text-cream mb-0.5">{{ $order->{'N°_commande'} }}</div>
                  <div class="text-[10px] text-cream/38">{{ $order->customer->name }}</div>
                </div>
                <div class="text-right">
                  <div class="font-display text-base text-gold">{{ $order->Total_Price }}</div>
                  <div class="text-[8px] text-cream/25">MAD</div>
                </div>
              </div>
              <div class="flex flex-wrap gap-1 mb-3">
                @foreach($order->items as $item)
                <span class="text-[9px] bg-s3 border border-gold/[.07] px-1.5 py-0.5 text-cream/45">{{ $item->menuItem->name }} × {{ $item->quantity }}</span>
                @endforeach
              </div>
              <div class="flex items-center justify-between">
                <span class="text-[9px] text-cream/28">il y a {{ $order->created_at->diffForHumans() }}</span>
                <button onclick="event.stopPropagation()" class="abtn border-amber/25 text-amber/60 hover:border-amber hover:text-amber hover:bg-amber/07">
                  <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
                  {{ $order->status }}
                </button>
              </div>
            </div>
            @endif
            @endforeach

          </div>
        </div>

        <!-- ── COL: CONFIRMED ── -->
        <div class="flex flex-col w-72 shrink-0 border-r border-gold/[.07]">
          <div class="col-accent bg-sage"></div>
          <div class="flex items-center justify-between px-4 py-3 bg-s2 border-b border-gold/[.08] shrink-0">
            <div class="flex items-center gap-2">
              <span class="text-[9px] tracking-[.25em] uppercase text-sage">Confirmed</span>
              <span class="w-5 h-5 bg-sage/12 text-sage text-[10px] font-semibold flex items-center justify-center">{{ $counts['confirmed'] }}</span>
            </div>
            <span class="text-[9px] text-cream/25">Acceptée</span>
          </div>
          <div class="col-scroll flex-1 p-3 flex flex-col gap-2.5 bg-s1">

            @foreach($AllOrders as $order)
            @if($order->status == "confirmed")
            <div class="order-card bg-s2 border border-gold/[.1] p-4 cursor-pointer animate-fu" onclick="openDetail('{{ $order->id }}')">
              <div class="flex items-start justify-between mb-3">
                <div>
                  <div class="flex items-center gap-2 mb-0.5">
                    <span class="font-display text-sm text-cream">{{ $order->{'N°_commande'} }}</span>
                    <span class="w-1.5 h-1.5 rounded-full bg-rose animate-p2" title="Urgent"></span>
                  </div>
                  <div class="text-[10px] text-cream/38">{{ $order->customer->name }}</div>
                </div>
                <div class="text-right">
                  <div class="font-display text-base text-gold">{{ $order->Total_Price }}</div>
                  <div class="text-[8px] text-cream/25">MAD</div>
                </div>
              </div>
              <div class="flex flex-wrap gap-1 mb-3">
                @foreach($order->items as $item)
                <span class="text-[9px] bg-s3 border border-gold/[.07] px-1.5 py-0.5 text-cream/45">{{ $item->menuItem->name }} × {{ $item->quantity }}</span>
                @endforeach
              </div>
              <div class="flex items-center justify-between">
                <span class="text-[9px] text-cream/28 flex items-center gap-1">
                  <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
                  {{ $order->created_at->diffForHumans() }}
                </span>
                <div class="flex gap-1">
                  <button onclick="event.stopPropagation()" class="abtn border-sage/25 text-sage/60 hover:border-sage hover:text-sage hover:bg-sage/07">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 13l4 4L19 7" />
                    </svg>
                    {{ $order->status }}
                  </button>
                  <button onclick="event.stopPropagation();openModal('cancelModal')" class="abtn border-rose/20 text-rose/50 hover:border-rose hover:text-rose hover:bg-rose/07 px-2">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                  </button>
                </div>
              </div>
            </div>
            @endif
            @endforeach

          </div>
        </div>

        <!-- ── COL: PREPARING ── -->
        <div class="flex flex-col w-72 shrink-0 border-r border-gold/[.07]">
          <div class="col-accent bg-gold"></div>
          <div class="flex items-center justify-between px-4 py-3 bg-s2 border-b border-gold/[.08] shrink-0">
            <div class="flex items-center gap-2">
              <span class="text-[9px] tracking-[.25em] uppercase text-gold">Preparing</span>
              <span class="w-5 h-5 bg-gd text-gold text-[10px] font-semibold flex items-center justify-center animate-p2">{{ $counts['preparing'] }}</span>
            </div>
            <span class="text-[9px] text-cream/25">En cuisine</span>
          </div>
          <div class="col-scroll flex-1 p-3 flex flex-col gap-2.5 bg-s1">

            @foreach($AllOrders as $order)
            @if($order->status == "preparing")
            <div class="order-card bg-s2 border border-gold/[.18] p-4 cursor-pointer" onclick="openDetail('{{ $order->id }}')">
              <div class="flex items-start justify-between mb-2">
                <div>
                  <div class="font-display text-sm text-cream mb-0.5">{{ $order->{'N°_commande'} }}</div>
                  <div class="text-[10px] text-cream/38">M. {{ $order->customer->name }}</div>
                </div>
                <div class="text-right">
                  <div class="font-display text-base text-gold">{{ $order->Total_Price }}</div>
                  <div class="text-[8px] text-cream/25">MAD</div>
                </div>
              </div>
              <!-- Progress -->
              <div class="mb-2.5">
                <div class="flex justify-between text-[8px] text-cream/28 mb-1">
                  <span>Cuisine</span>
                  <span class="text-gold">{{ $order->items->count() }} plats</span>
                </div>
                <div class="h-1 bg-s4">
                  <div class="h-full bg-gold" style="width:50%"></div>
                </div>
              </div>
              <div class="flex flex-wrap gap-1 mb-3">
                @foreach($order->items as $item)
                <span class="text-[9px] bg-s3 border border-sage/18 text-sage/65 px-1.5 py-0.5">✓ {{ $item->menuItem->name }} × {{ $item->quantity }}</span>
                @endforeach
              </div>
              @php
              $minutes = $order->created_at->diffInMinutes(now());
              $hours = floor($minutes / 60);
              $mins = $minutes % 60;
              @endphp
              <div class="flex items-center justify-between">
                <span class="text-[9px] text-cream/28">{{ $hours > 0 ? $hours.'h ' : '' }}{{ $mins }}min en cuisine</span>
                <button onclick="event.stopPropagation()" class="abtn border-sky/25 text-sky/60 hover:border-sky hover:text-sky hover:bg-sky/07">
                  <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
                  Marquer prête
                </button>
              </div>
            </div>
            @endif
            @endforeach

          </div>
        </div>

        <!-- ── COL: READY ── -->
        <div class="flex flex-col w-64 shrink-0 border-r border-gold/[.07]">
          <div class="col-accent bg-sky"></div>
          <div class="flex items-center justify-between px-4 py-3 bg-s2 border-b border-gold/[.08] shrink-0">
            <div class="flex items-center gap-2">
              <span class="text-[9px] tracking-[.25em] uppercase text-sky">Ready</span>
              <span class="w-5 h-5 bg-sky/12 text-sky text-[10px] font-semibold flex items-center justify-center">{{ $counts['ready'] }}</span>
            </div>
            <span class="text-[9px] text-cream/25">À servir</span>
          </div>
          <div class="col-scroll flex-1 p-3 flex flex-col gap-2.5 bg-s1">

            @foreach($AllOrders as $order)
            @if($order->status == "ready")
            <div class="order-card bg-sky/[.04] border border-sky/25 p-4 cursor-pointer" onclick="openDetail('{{ $order->id }}')">
              <div class="flex items-start justify-between mb-2">
                <div>
                  <div class="font-display text-sm text-cream mb-0.5">{{ $order->{'N°_commande'} }}</div>
                  <div class="text-[10px] text-cream/38">{{ $order->customer->name }}</div>
                </div>
                <div class="text-right">
                  <div class="font-display text-base text-gold">{{ $order->Total_Price }}</div>
                  <div class="text-[8px] text-cream/25">MAD</div>
                </div>
              </div>
              <div class="text-[9px] text-sky/60 border border-sky/20 bg-sky/5 px-2 py-1 mb-3 flex items-center gap-1.5">
                <span class="w-1.5 h-1.5 rounded-full bg-sky animate-p2"></span>
                Prête depuis {{ $order->updated_at->diffForHumans() }}
              </div>
              <div class="flex flex-wrap gap-1 mb-3">
                @foreach($order->items as $item)
                <span class="text-[9px] bg-sky/5 border border-sky/18 text-sky/65 px-1.5 py-0.5">{{ $item->menuItem->name }} × {{ $item->quantity }}</span>
                @endforeach
              </div>
              <button onclick="event.stopPropagation()" class="abtn w-full justify-center border-mint/30 text-mint/65 hover:border-mint hover:text-mint hover:bg-mint/07">
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 13l4 4L19 7" />
                </svg>
                Servie au client
              </button>
            </div>
            @endif
            @endforeach

          </div>
        </div>

        <!-- ── COL: DELIVERED ── -->
        <div class="flex flex-col w-60 shrink-0 border-r border-gold/[.07]">
          <div class="col-accent bg-mint"></div>
          <div class="flex items-center justify-between px-4 py-3 bg-s2 border-b border-gold/[.08] shrink-0">
            <div class="flex items-center gap-2">
              <span class="text-[9px] tracking-[.25em] uppercase text-mint">Delivered</span>
              <span class="w-5 h-5 bg-mint/12 text-mint text-[10px] font-semibold flex items-center justify-center">{{ $counts['delivered'] }}</span>
            </div>
            <span class="text-[9px] text-cream/25">Servie</span>
          </div>
          <div class="col-scroll flex-1 p-3 flex flex-col gap-2 bg-s1 opacity-80">

            @foreach($AllOrders as $order)
            @if($order->status == "delivered")
            <div class="order-card bg-s2 border border-gold/[.07] p-3.5 cursor-pointer" onclick="openDetail('{{ $order->id }}')">
              <div class="flex justify-between items-center">
                <div>
                  <div class="font-display text-sm text-cream/70">{{ $order->{'N°_commande'} }}</div>
                  <div class="text-[9px] text-cream/30">{{ $order->customer->name }}</div>
                </div>
                <div class="text-right">
                  <div class="font-display text-sm text-cream/40">{{ $order->Total_Price }} MAD</div>
                  <button onclick="event.stopPropagation()" class="abtn border-lav/22 text-lav/55 hover:border-lav hover:text-lav mt-1 text-[8px] px-2 py-0.5 h-auto hover:bg-lav/07">Compléter</button>
                </div>
              </div>
            </div>
            @endif
            @endforeach

          </div>
        </div>

        <!-- ── COL: COMPLETED ── -->
        <div class="flex flex-col w-56 shrink-0 border-r border-gold/[.07]">
          <div class="col-accent bg-lav"></div>
          <div class="flex items-center justify-between px-4 py-3 bg-s2 border-b border-gold/[.08] shrink-0">
            <div class="flex items-center gap-2">
              <span class="text-[9px] tracking-[.25em] uppercase text-lav">Completed</span>
              <span class="w-5 h-5 bg-lav/12 text-lav text-[10px] font-semibold flex items-center justify-center">{{ $counts['completed'] }}</span>
            </div>
            <span class="text-[9px] text-cream/25">Clôturée</span>
          </div>
          <div class="col-scroll flex-1 p-3 flex flex-col gap-2 bg-s1 opacity-50">

            @foreach($AllOrders as $order)
            @if($order->status == "completed")
            <div class="order-card bg-s2 border border-gold/[.06] p-3 cursor-pointer" onclick="openDetail('{{ $order->id }}')">
              <div class="font-display text-sm text-cream/55 mb-0.5">{{ $order->{'N°_commande'} }} · {{ $order->customer->name }}</div>
              <div class="text-[9px] text-cream/25">{{ $order->Total_Price }} MAD · Payée</div>
            </div>
            @endif
            @endforeach

          </div>
        </div>

        <!-- ── COL: CANCELLED ── -->
        <div class="flex flex-col w-52 shrink-0">
          <div class="col-accent bg-rose"></div>
          <div class="flex items-center justify-between px-4 py-3 bg-s2 border-b border-gold/[.08] shrink-0">
            <div class="flex items-center gap-2">
              <span class="text-[9px] tracking-[.25em] uppercase text-rose">Cancelled</span>
              <span class="w-5 h-5 bg-rose/12 text-rose text-[10px] font-semibold flex items-center justify-center">{{ $counts['cancelled'] }}</span>
            </div>
            <span class="text-[9px] text-cream/25">Annulée</span>
          </div>
          <div class="col-scroll flex-1 p-3 flex flex-col gap-2 bg-s1 opacity-40">

            @foreach($AllOrders as $order)
            @if($order->status == "cancelled")
            <div class="order-card bg-s2 border border-rose/15 p-3 cursor-pointer" onclick="openDetail('{{ $order->id }}')">
              <div class="font-display text-sm text-cream/55 mb-0.5 line-through">{{ $order->{'N°_commande'} }} · {{ $order->customer->name }}</div>
              <div class="text-[9px] text-cream/25">{{ $order->Total_Price }} MAD</div>
            </div>
            @endif
            @endforeach

          </div>
        </div>

      </div>
    </div>


    <!-- ════════════════════════════
         TABLE VIEW (hidden by default)
    ════════════════════════════ -->
    <div id="viewTable" class="hidden flex-1 overflow-y-auto">
      <div class="px-7 py-5">
        <table class="w-full border-collapse">
          <thead>
            <tr class="border-b border-gold/[.08]">
              <th class="text-left px-4 py-3 text-[9px] tracking-[.22em] uppercase text-cream/22 font-normal"><input type="checkbox" class="w-3.5 h-3.5 mr-2" />N° commande</th>
              <th class="text-left px-4 py-3 text-[9px] tracking-[.22em] uppercase text-cream/22 font-normal">Client</th>
              <th class="text-left px-4 py-3 text-[9px] tracking-[.22em] uppercase text-cream/22 font-normal">Table</th>
              <th class="text-left px-4 py-3 text-[9px] tracking-[.22em] uppercase text-cream/22 font-normal">Heure</th>
              <th class="text-left px-4 py-3 text-[9px] tracking-[.22em] uppercase text-cream/22 font-normal">Statut</th>
              <th class="text-left px-4 py-3 text-[9px] tracking-[.22em] uppercase text-cream/22 font-normal">Total</th>
              <th class="text-right px-4 py-3 text-[9px] tracking-[.22em] uppercase text-cream/22 font-normal">Actions</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gold/[.04]">
            @foreach($AllOrders as $order)
            <tr class="trow group">
              <td class="px-4 py-3.5">
                <label class="flex items-center gap-2 cursor-pointer">
                  <input type="checkbox" class="w-3.5 h-3.5" />
                  <span class="font-display text-sm text-cream">{{ $order->{'N°_commande'} }}</span>
                </label>
              </td>
              <td class="px-4 py-3.5">
                <div class="text-[12px] text-cream">{{ $order->customer->name }}</div>
              </td>
              <td class="px-4 py-3.5 text-[12px] text-cream/55">Emporter</td>
              <td class="px-4 py-3.5">
                <div class="font-display text-base text-gold">{{ $order->created_at->format('H:i') }}</div>
              </td>
              <td class="px-4 py-3.5">
                <select onchange="updateStatus(this, '{{ $order->id }}')"
                  class="bg-s2 border border-sky/25 text-sky text-[9px] uppercase px-2 py-1 cursor-pointer font-body">
                  @foreach(['pending', 'confirmed', 'preparing', 'ready', 'delivered', 'completed', 'cancelled'] as $status)
                  <option value="{{ $status }}" {{ $order->status == $status ? 'selected' : '' }}>{{ $status }}</option>
                  @endforeach
                </select>
              </td>
              <td class="px-4 py-3.5">
                <span class="font-display text-base text-gold">{{ $order->Total_Price }}</span>
                <span class="text-[10px] text-cream/25 ml-1">MAD</span>
              </td>
              <td class="px-4 py-3.5">
                <div class="row-acts flex items-center justify-end gap-1.5">

                  <form method="POST" action="{{ route('orders.destroy', $order->id) }}">
                    @csrf
                    @method('DELETE')

                    <button type="submit"
                      onclick="return confirm('Voulez-vous vraiment supprimer cette commande ?')"
                      class="w-7 h-7 border border-gold/[.12] flex items-center justify-center text-cream/28 hover:border-red-500 hover:text-red-500 transition-all bg-transparent cursor-pointer">

                      <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                          d="M6 7h12M9 7V5h6v2m-7 4v6m4-6v6m5-10v12a2 2 0 01-2 2H7a2 2 0 01-2-2V7h14z" />
                      </svg>

                    </button>
                  </form>

                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <div class="flex items-center justify-between py-4 border-t border-gold/[.06] mt-2">
          <span class="text-[11px] text-cream/25">{{ $AllOrders->count() }} commandes</span>
          <div class="flex gap-1.5">
            <button class="w-7 h-7 border border-gold/[.12] text-cream/28 hover:border-gold hover:text-gold transition-all text-xs flex items-center justify-center bg-transparent cursor-pointer">‹</button>
            <span class="w-7 h-7 bg-gold text-ink text-[11px] font-semibold flex items-center justify-center">1</span>
            <button class="w-7 h-7 border border-gold/[.12] text-cream/28 hover:border-gold hover:text-gold transition-all text-xs flex items-center justify-center bg-transparent cursor-pointer">›</button>
          </div>
        </div>
      </div>
    </div>

  </div><!-- /main -->


  <script>
    function updateStatus(select, orderId) {
      let status = select.value;

      fetch(`/Status/Update/${orderId}`, {
          method: 'POST',
          headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json'
          },
          body: new URLSearchParams({
            status: status
          })
        })
        .then(res => res.json())
        .then(data => {
          console.log(data);
          alert('Status updated');
        })
        .catch(error => {
          console.error(error);
          alert('Error updating status');
        });
    }
  </script>

</body>

</html>