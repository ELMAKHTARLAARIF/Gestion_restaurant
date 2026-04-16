@include('Component.AdminOrderPage.head')

<body class="bg-ink text-cream font-body flex" style="font-size:13px">

  <!-- ══════════════════ SIDEBAR ══════════════════ -->
  @include('Component.AdminOrderPage.aside')


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
              <span class="w-5 h-5 bg-amber/15 text-amber text-[10px] font-semibold flex items-center justify-center">3</span>
            </div>
            <span class="text-[9px] text-cream/25">En attente</span>
          </div>
          <div class="col-scroll flex-1 p-3 flex flex-col gap-2.5 bg-s1">

            @foreach($AllOrders as $index=>$order)
            @if($order->status == "pending")

            <div class="order-card bg-s2 border border-gold/[.1] p-4 cursor-pointer" onclick="openDetail('0244')">
              <div class="flex items-start justify-between mb-3">
                <div>
                  <div class="font-display text-sm text-cream mb-0.5">{{$order->N°_commande}}</div>
                  <div class="text-[10px] text-cream/38">M. El Idrissi · Salle privée</div>
                </div>
                <div class="text-right">
                  <div class="font-display text-base text-gold">{{$order->Total_Price}}</div>
                  <div class="text-[8px] text-cream/25">MAD</div>
                </div>
              </div>
              <div class="flex flex-wrap gap-1 mb-3">
                @foreach($order->items as $item )
                <span class="text-[9px] bg-s3 border border-gold/[.07] px-1.5 py-0.5 text-cream/45"> {{$item->menuItem->name}}× {{$item->quantity}}</span>
                @endforeach
              </div>
              <div class="flex items-center justify-between"><span class="text-[9px] text-cream/28">il y a {{$order->created_at->format('H:i:s')}} min</span><button onclick="event.stopPropagation()" class="abtn border-amber/25 text-amber/60 hover:border-amber hover:text-amber hover:bg-amber/07"><svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>{{$order->status}}</button></div>
            </div>

            @endif

            @endforeach
            <!-- Card P1 -->


          </div>
        </div>

        <!-- ── COL: CONFIRMED ── -->
        <div class="flex flex-col w-72 shrink-0 border-r border-gold/[.07]">
          <div class="col-accent bg-sage"></div>
          <div class="flex items-center justify-between px-4 py-3 bg-s2 border-b border-gold/[.08] shrink-0">
            <div class="flex items-center gap-2"><span class="text-[9px] tracking-[.25em] uppercase text-sage">Confirmed</span><span class="w-5 h-5 bg-sage/12 text-sage text-[10px] font-semibold flex items-center justify-center">4</span></div>
            <span class="text-[9px] text-cream/25">Acceptée</span>
          </div>
          <div class="col-scroll flex-1 p-3 flex flex-col gap-2.5 bg-s1">

            @foreach($AllOrders as $index=>$order)
            @if($order->status == "confirmed")
            <div class="order-card bg-s2 border border-gold/[.1] p-4 cursor-pointer animate-fu" onclick="openDetail('0248')">
              <div class="flex items-start justify-between mb-3">
                <div>


                  <div class="flex items-center gap-2 mb-0.5">
                    <span class="font-display text-sm text-cream">{{$order->N°_commande}}</span>
                    <span class="w-1.5 h-1.5 rounded-full bg-rose animate-p2" title="Urgent"></span>
                  </div>
                  <div class="text-[10px] text-cream/38">{{$order->customer->name}}</div>
                </div>
                <div class="text-right">
                  <div class="font-display text-base text-gold">{{$order->Total_Price}}</div>
                  <div class="text-[8px] text-cream/25">MAD</div>
                </div>
              </div>
              <div class="flex flex-wrap gap-1 mb-3">
                @foreach($order->items as $item )
                <span class="text-[9px] bg-s3 border border-gold/[.07] px-1.5 py-0.5 text-cream/45">{{$item->menuItem->name}} × {{$item->quantity}}</span>
                @endforeach
              </div>
              <div class="flex items-center justify-between">
                <span class="text-[9px] text-cream/28 flex items-center gap-1"><svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>il y a {{$order->created_at->format('H:i:s')}} min</span>
                <div class="flex gap-1">
                  <button onclick="event.stopPropagation()" class="abtn border-sage/25 text-sage/60 hover:border-sage hover:text-sage hover:bg-sage/07">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 13l4 4L19 7" />
                    </svg>
                    {{$order->status}}
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
            <div class="flex items-center gap-2"><span class="text-[9px] tracking-[.25em] uppercase text-gold">Preparing</span><span class="w-5 h-5 bg-gd text-gold text-[10px] font-semibold flex items-center justify-center animate-p2">5</span></div>
            <span class="text-[9px] text-cream/25">En cuisine</span>
          </div>
          <div class="col-scroll flex-1 p-3 flex flex-col gap-2.5 bg-s1">

            @foreach($AllOrders as $order)
            @if($order->status == "preparing")
            <div class="order-card bg-s2 border border-gold/[.18] p-4 cursor-pointer" onclick="openDetail('0242')">
              <div class="flex items-start justify-between mb-2">
                <div>
                  <div class="font-display text-sm text-cream mb-0.5">{{$order->status}}</div>
                  <div class="text-[10px] text-cream/38">M. {{$order->customer->name}} · Table 12</div>
                </div>
                <div class="text-right">
                  <div class="font-display text-base text-gold">{{$order->Total_Price}}</div>
                  <div class="text-[8px] text-cream/25">MAD</div>
                </div>
              </div>
              <!-- Progress -->
              <div class="mb-2.5">
                <div class="flex justify-between text-[8px] text-cream/28 mb-1"><span>Cuisine</span><span class="text-gold">2 / 4</span></div>
                <div class="h-1 bg-s4">
                  <div class="h-full bg-gold" style="width:50%"></div>
                </div>
              </div>
              <div class="flex flex-wrap gap-1 mb-3">
                @foreach($order->items as $item)
                <span class="text-[9px] bg-s3 border border-sage/18 text-sage/65 px-1.5 py-0.5">✓ {{$item->menuItem->name}} ×{{$item->menuItem->quantity}}</span>
                @endforeach
              </div>
              @php
              $minutes = $order->created_at->diffInMinutes($order->updated_at);
              $hours = floor($minutes / 60);
              $mins = $minutes % 60;
              @endphp


              <div class="flex items-center justify-between"><span class="text-[9px] text-cream/28"> {{ $hours }}h {{ $mins }}min en cuisine</span><button onclick="event.stopPropagation()" class="abtn border-sky/25 text-sky/60 hover:border-sky hover:text-sky hover:bg-sky/07"><svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>{{$order->status}}</button></div>
            </div>
            @endif
            @endforeach

            <!-- 3 more compact cards -->

          </div>
        </div>

        <!-- ── COL: READY ── -->
        <div class="flex flex-col w-64 shrink-0 border-r border-gold/[.07]">
          <div class="col-accent bg-sky"></div>
          <div class="flex items-center justify-between px-4 py-3 bg-s2 border-b border-gold/[.08] shrink-0">
            <div class="flex items-center gap-2"><span class="text-[9px] tracking-[.25em] uppercase text-sky">Ready</span><span class="w-5 h-5 bg-sky/12 text-sky text-[10px] font-semibold flex items-center justify-center">2</span></div>
            <span class="text-[9px] text-cream/25">À servir</span>
          </div>
          <div class="col-scroll flex-1 p-3 flex flex-col gap-2.5 bg-s1">
            <div class="order-card bg-sky/[.04] border border-sky/25 p-4 cursor-pointer" onclick="openDetail('0245')">
              <div class="flex items-start justify-between mb-2">
                <div>
                  <div class="font-display text-sm text-cream mb-0.5">#0245</div>
                  <div class="text-[10px] text-cream/38">M. Hassani · Table 8</div>
                </div>
                <div class="text-right">
                  <div class="font-display text-base text-gold">400</div>
                  <div class="text-[8px] text-cream/25">MAD</div>
                </div>
              </div>
              <div class="text-[9px] text-sky/60 border border-sky/20 bg-sky/5 px-2 py-1 mb-3 flex items-center gap-1.5"><span class="w-1.5 h-1.5 rounded-full bg-sky animate-p2"></span>Prête depuis 4 min</div>
              <div class="flex flex-wrap gap-1 mb-3"><span class="text-[9px] bg-sky/5 border border-sky/18 text-sky/65 px-1.5 py-0.5">Millefeuille ×1</span><span class="text-[9px] bg-sky/5 border border-sky/18 text-sky/65 px-1.5 py-0.5">Grenade ×2</span></div>
              <button onclick="event.stopPropagation()" class="abtn w-full justify-center border-mint/30 text-mint/65 hover:border-mint hover:text-mint hover:bg-mint/07"><svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 13l4 4L19 7" />
                </svg>Servie au client</button>
            </div>
            <div class="order-card bg-sky/[.04] border border-sky/25 p-4 cursor-pointer" onclick="openDetail('0237')">
              <div class="flex items-start justify-between mb-2">
                <div>
                  <div class="font-display text-sm text-cream mb-0.5">#0237</div>
                  <div class="text-[10px] text-cream/38">M. Kabbaj · Table 1</div>
                </div>
                <div class="text-right">
                  <div class="font-display text-base text-gold">95</div>
                  <div class="text-[8px] text-cream/25">MAD</div>
                </div>
              </div>
              <div class="text-[9px] text-sky/60 border border-sky/20 bg-sky/5 px-2 py-1 mb-3 flex items-center gap-1.5"><span class="w-1.5 h-1.5 rounded-full bg-sky animate-p2"></span>Prête depuis 7 min</div>
              <div class="flex flex-wrap gap-1 mb-3"><span class="text-[9px] bg-sky/5 border border-sky/18 text-sky/65 px-1.5 py-0.5">Fondant chocolat ×1</span></div>
              <button onclick="event.stopPropagation()" class="abtn w-full justify-center border-mint/30 text-mint/65 hover:border-mint hover:text-mint hover:bg-mint/07"><svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 13l4 4L19 7" />
                </svg>Servie au client</button>
            </div>
          </div>
        </div>

        <!-- ── COL: DELIVERED ── -->
        <div class="flex flex-col w-60 shrink-0 border-r border-gold/[.07]">
          <div class="col-accent bg-mint"></div>
          <div class="flex items-center justify-between px-4 py-3 bg-s2 border-b border-gold/[.08] shrink-0">
            <div class="flex items-center gap-2"><span class="text-[9px] tracking-[.25em] uppercase text-mint">Delivered</span><span class="w-5 h-5 bg-mint/12 text-mint text-[10px] font-semibold flex items-center justify-center">4</span></div>
            <span class="text-[9px] text-cream/25">Servie</span>
          </div>
          <div class="col-scroll flex-1 p-3 flex flex-col gap-2 bg-s1 opacity-80">
            <div class="order-card bg-s2 border border-gold/[.07] p-3.5 cursor-pointer" onclick="openDetail('0234')">
              <div class="flex justify-between items-center">
                <div>
                  <div class="font-display text-sm text-cream/70">#0234</div>
                  <div class="text-[9px] text-cream/30">M. Tazi · Table 4</div>
                </div>
                <div class="text-right">
                  <div class="font-display text-sm text-cream/40">620 MAD</div><button onclick="event.stopPropagation()" class="abtn border-lav/22 text-lav/55 hover:border-lav hover:text-lav mt-1 text-[8px] px-2 py-0.5 h-auto hover:bg-lav/07">Compléter</button>
                </div>
              </div>
            </div>
            <div class="order-card bg-s2 border border-gold/[.07] p-3.5 cursor-pointer" onclick="openDetail('0233')">
              <div class="flex justify-between items-center">
                <div>
                  <div class="font-display text-sm text-cream/70">#0233</div>
                  <div class="text-[9px] text-cream/30">Mme Idrissi · Table 6</div>
                </div>
                <div class="text-right">
                  <div class="font-display text-sm text-cream/40">380 MAD</div><button onclick="event.stopPropagation()" class="abtn border-lav/22 text-lav/55 hover:border-lav hover:text-lav mt-1 text-[8px] px-2 py-0.5 h-auto hover:bg-lav/07">Compléter</button>
                </div>
              </div>
            </div>
            <div class="order-card bg-s2 border border-gold/[.07] p-3.5 cursor-pointer" onclick="openDetail('0230')">
              <div class="flex justify-between items-center">
                <div>
                  <div class="font-display text-sm text-cream/70">#0230</div>
                  <div class="text-[9px] text-cream/30">M. Rami · Table 11</div>
                </div>
                <div class="text-right">
                  <div class="font-display text-sm text-cream/40">950 MAD</div><button onclick="event.stopPropagation()" class="abtn border-lav/22 text-lav/55 hover:border-lav hover:text-lav mt-1 text-[8px] px-2 py-0.5 h-auto hover:bg-lav/07">Compléter</button>
                </div>
              </div>
            </div>
            <div class="order-card bg-s2 border border-gold/[.07] p-3.5 cursor-pointer" onclick="openDetail('0228')">
              <div class="flex justify-between items-center">
                <div>
                  <div class="font-display text-sm text-cream/70">#0228</div>
                  <div class="text-[9px] text-cream/30">Mme Belhaj · Table 14</div>
                </div>
                <div class="text-right">
                  <div class="font-display text-sm text-cream/40">290 MAD</div><button onclick="event.stopPropagation()" class="abtn border-lav/22 text-lav/55 hover:border-lav hover:text-lav mt-1 text-[8px] px-2 py-0.5 h-auto hover:bg-lav/07">Compléter</button>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- ── COL: COMPLETED ── -->
        <div class="flex flex-col w-56 shrink-0 border-r border-gold/[.07]">
          <div class="col-accent bg-lav"></div>
          <div class="flex items-center justify-between px-4 py-3 bg-s2 border-b border-gold/[.08] shrink-0">
            <div class="flex items-center gap-2"><span class="text-[9px] tracking-[.25em] uppercase text-lav">Completed</span><span class="w-5 h-5 bg-lav/12 text-lav text-[10px] font-semibold flex items-center justify-center">3</span></div>
            <span class="text-[9px] text-cream/25">Clôturée</span>
          </div>
          <div class="col-scroll flex-1 p-3 flex flex-col gap-2 bg-s1 opacity-50">
            <div class="order-card bg-s2 border border-gold/[.06] p-3 cursor-pointer" onclick="openDetail('0227')">
              <div class="font-display text-sm text-cream/55 mb-0.5">#0227 · M. Chafik</div>
              <div class="text-[9px] text-cream/25">Table 3 · 1 240 MAD · Payée</div>
            </div>
            <div class="order-card bg-s2 border border-gold/[.06] p-3 cursor-pointer" onclick="openDetail('0225')">
              <div class="font-display text-sm text-cream/55 mb-0.5">#0225 · Mme Bouzidi</div>
              <div class="text-[9px] text-cream/25">Table 10 · 490 MAD · Payée</div>
            </div>
            <div class="order-card bg-s2 border border-gold/[.06] p-3 cursor-pointer" onclick="openDetail('0221')">
              <div class="font-display text-sm text-cream/55 mb-0.5">#0221 · M. Sadki</div>
              <div class="text-[9px] text-cream/25">Salle privée · 3 200 MAD · Payée</div>
            </div>
          </div>
        </div>

        <!-- ── COL: CANCELLED ── -->
        <div class="flex flex-col w-52 shrink-0">
          <div class="col-accent bg-rose"></div>
          <div class="flex items-center justify-between px-4 py-3 bg-s2 border-b border-gold/[.08] shrink-0">
            <div class="flex items-center gap-2"><span class="text-[9px] tracking-[.25em] uppercase text-rose">Cancelled</span><span class="w-5 h-5 bg-rose/12 text-rose text-[10px] font-semibold flex items-center justify-center">1</span></div>
            <span class="text-[9px] text-cream/25">Annulée</span>
          </div>
          <div class="col-scroll flex-1 p-3 flex flex-col gap-2 bg-s1 opacity-40">
            <div class="order-card bg-s2 border border-rose/15 p-3 cursor-pointer" onclick="openDetail('0231')">
              <div class="font-display text-sm text-cream/55 mb-0.5 line-through">#0231 · Mme Bennis</div>
              <div class="text-[9px] text-cream/25">Table 7 · Article indisponible</div>
            </div>
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
              <td class="px-4 py-3.5"><label class="flex items-center gap-2 cursor-pointer"><input type="checkbox" class="w-3.5 h-3.5" /><span class="font-display text-sm text-cream">{{$order->N°_commande}}</span></label></td>
              <td class="px-4 py-3.5">
                <div class="text-[12px] text-cream">M. {{$order->customer->name}}</div>
              </td>
              <td class="px-4 py-3.5 text-[12px] text-cream/55">Emporter</td>
              <td class="px-4 py-3.5">
                <div class="font-display text-base text-gold">19:18</div>
              </td>
              <td class="px-4 py-3.5">
                <select
                  onchange="updateStatus(this, '{{ $order->id }}')"
                  class="bg-s2 border border-sky/25 text-sky text-[9px] uppercase px-2 py-1 cursor-pointer font-body">

                  @foreach(['pending', 'confirmed', 'preparing', 'ready', 'cancelled', 'completed', 'delivered'] as $status)
                  <option value="{{ $status }}" {{ $order->status == $status ? 'selected' : '' }}>
                    {{ $status }}
                  </option>
                  @endforeach

                </select>
              </td>
              <td class="px-4 py-3.5"><span class="font-display text-base text-gold">{{$order->Total_Price}}</span><span class="text-[10px] text-cream/25 ml-1">MAD</span></td>
              <td class="px-4 py-3.5">
                <div class="row-acts flex items-center justify-end gap-1.5"><button onclick="openDetail('0245')" class="w-7 h-7 border border-gold/[.12] flex items-center justify-center text-cream/28 hover:border-gold hover:text-gold transition-all bg-transparent cursor-pointer"><svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg></button></div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <!-- Table pagination -->
        <div class="flex items-center justify-between py-4 border-t border-gold/[.06] mt-2">
          <span class="text-[11px] text-cream/25">22 commandes · page 1 / 3</span>
          <div class="flex gap-1.5">
            <button class="w-7 h-7 border border-gold/[.12] text-cream/28 hover:border-gold hover:text-gold transition-all text-xs flex items-center justify-center bg-transparent cursor-pointer">‹</button>
            <span class="w-7 h-7 bg-gold text-ink text-[11px] font-semibold flex items-center justify-center">1</span>
            <span class="w-7 h-7 border border-gold/[.12] text-cream/32 text-[11px] flex items-center justify-center cursor-pointer hover:border-gold hover:text-gold transition-all">2</span>
            <span class="w-7 h-7 border border-gold/[.12] text-cream/32 text-[11px] flex items-center justify-center cursor-pointer hover:border-gold hover:text-gold transition-all">3</span>
            <button class="w-7 h-7 border border-gold/[.12] text-cream/28 hover:border-gold hover:text-gold transition-all text-xs flex items-center justify-center bg-transparent cursor-pointer">›</button>
          </div>
        </div>
      </div>
    </div>

  </div><!-- /main -->


  <!-- ══════════════════ ORDER DETAIL MODAL ══════════════════ -->
  <div id="detailModal" class="hidden fixed inset-0 z-[100] flex items-end sm:items-center justify-end sm:justify-center px-0 sm:px-4">
    <div class="mbd absolute inset-0" onclick="closeModal('detailModal')"></div>
    <div class="relative bg-s1 border border-gold/[.18] w-full sm:max-w-md h-[90vh] sm:h-auto sm:max-h-[90vh] shadow-2xl animate-siu flex flex-col">
      <!-- Header -->
      <div class="flex items-center justify-between px-6 py-5 border-b border-gold/[.1] shrink-0">
        <div>
          <span class="block text-[8px] tracking-[.38em] uppercase text-gold mb-0.5">Commande</span>
          <h3 class="font-display text-xl font-light">Détail <em class="italic text-gold">#<span id="dRef">0248</span></em></h3>
        </div>
        <button onclick="closeModal('detailModal')" class="w-8 h-8 border border-gold/18 flex items-center justify-center text-cream/28 hover:text-gold hover:border-gold transition-all bg-transparent cursor-pointer">✕</button>
      </div>

      <div class="overflow-y-auto flex-1 p-6 flex flex-col gap-5">
        <!-- Client + Table info -->
        <div class="grid grid-cols-2 gap-px bg-gold/[.06]">
          <div class="bg-s2 px-4 py-3">
            <div class="text-[8px] tracking-[.2em] uppercase text-gold mb-1">Client</div>
            <div class="text-[13px] text-cream">M. Alami</div>
            <div class="text-[10px] text-cream/30">+212 661 234 567</div>
          </div>
          <div class="bg-s2 px-4 py-3">
            <div class="text-[8px] tracking-[.2em] uppercase text-gold mb-1">Table</div>
            <div class="font-display text-xl text-cream">12</div>
            <div class="text-[10px] text-cream/28">4 couverts</div>
          </div>
          <div class="bg-s2 px-4 py-3">
            <div class="text-[8px] tracking-[.2em] uppercase text-gold mb-1">Passée à</div>
            <div class="font-display text-xl text-gold">19:42</div>
          </div>
          <div class="bg-s2 px-4 py-3">
            <div class="text-[8px] tracking-[.2em] uppercase text-gold mb-1">Note</div>
            <div class="text-[11px] text-cream/50 italic">Allergie crustacés</div>
          </div>
        </div>

        <!-- Status change -->
        <div>
          <label class="block text-[8px] tracking-[.2em] uppercase text-cream/30 mb-2">Changer le statut</label>
          <div class="grid grid-cols-4 gap-1.5" id="statusBtns">
            <button class="py-2 border border-amber/30 bg-amber/10 text-amber text-[8px] tracking-[.1em] uppercase cursor-pointer hover:bg-amber/15 transition-all">Pending</button>
            <button class="py-2 border border-gold/[.12] text-cream/25 text-[8px] tracking-[.1em] uppercase cursor-pointer hover:border-sage/30 hover:text-sage transition-all">Confirmed</button>
            <button class="py-2 border border-gold/[.12] text-cream/25 text-[8px] tracking-[.1em] uppercase cursor-pointer hover:border-gold/40 hover:text-gold transition-all">Preparing</button>
            <button class="py-2 border border-gold/[.12] text-cream/25 text-[8px] tracking-[.1em] uppercase cursor-pointer hover:border-sky/30 hover:text-sky transition-all">Ready</button>
            <button class="py-2 border border-gold/[.12] text-cream/25 text-[8px] tracking-[.1em] uppercase cursor-pointer hover:border-mint/30 hover:text-mint transition-all">Delivered</button>
            <button class="py-2 border border-gold/[.12] text-cream/25 text-[8px] tracking-[.1em] uppercase cursor-pointer hover:border-lav/30 hover:text-lav transition-all">Completed</button>
            <button onclick="openModal('cancelModal')" class="py-2 border border-rose/20 text-rose/50 text-[8px] tracking-[.1em] uppercase cursor-pointer hover:border-rose hover:text-rose hover:bg-rose/07 transition-all col-span-2">✕ Cancelled</button>
          </div>
        </div>

        <!-- Items -->
        <div>
          <div class="text-[8px] tracking-[.25em] uppercase text-cream/28 mb-2">Articles</div>
          <div class="divide-y divide-gold/[.04]">
            <div class="flex items-center gap-3 py-2.5">
              <div class="w-8 h-8 bg-s2 border border-gold/[.07] flex items-center justify-center text-base shrink-0">🥩</div>
              <div class="flex-1">
                <div class="text-[12px] text-cream">Côte de Bœuf Grillée</div>
                <div class="text-[9px] text-cream/30">Bien cuit · Sans noix</div>
              </div>
              <div class="text-right shrink-0">
                <div class="text-[9px] text-cream/30">×1</div>
                <div class="font-display text-sm text-gold">380 MAD</div>
              </div>
            </div>
            <div class="flex items-center gap-3 py-2.5">
              <div class="w-8 h-8 bg-s2 border border-gold/[.07] flex items-center justify-center text-base shrink-0">🥗</div>
              <div class="flex-1">
                <div class="text-[12px] text-cream">Carpaccio de Saint-Jacques</div>
                <div class="text-[9px] text-cream/30">Standard</div>
              </div>
              <div class="text-right shrink-0">
                <div class="text-[9px] text-cream/30">×2</div>
                <div class="font-display text-sm text-gold">370 MAD</div>
              </div>
            </div>
            <div class="flex items-center gap-3 py-2.5">
              <div class="w-8 h-8 bg-s2 border border-gold/[.07] flex items-center justify-center text-base shrink-0">🍵</div>
              <div class="flex-1">
                <div class="text-[12px] text-cream">Thé à la Menthe</div>
              </div>
              <div class="text-right shrink-0">
                <div class="text-[9px] text-cream/30">×2</div>
                <div class="font-display text-sm text-gold">90 MAD</div>
              </div>
            </div>
          </div>
        </div>

        <!-- Total -->
        <div class="flex items-center justify-between bg-s2 border border-gold/[.08] px-4 py-3">
          <span class="text-[9px] tracking-[.2em] uppercase text-gold">Total</span>
          <span class="font-display text-xl text-gold">750 <span class="text-sm text-cream/25">MAD</span></span>
        </div>

        <!-- Step timeline -->
        <div>
          <div class="text-[8px] tracking-[.25em] uppercase text-cream/28 mb-3">Progression</div>
          <div class="relative">
            <div class="absolute left-[6px] top-2 bottom-2 w-px bg-gold/[.1]"></div>
            <div class="space-y-3">
              <div class="step done flex items-center gap-3">
                <div class="sdot w-3 h-3 border-2 shrink-0 z-10 bg-s1"></div>
                <div class="flex-1 flex justify-between"><span class="text-[11px] text-sage">Reçue & Pending</span><span class="text-[9px] text-cream/22">19:42</span></div>
              </div>
              <div class="step active flex items-center gap-3">
                <div class="sdot w-3 h-3 border-2 shrink-0 z-10 bg-s1"></div>
                <div class="flex-1 flex justify-between"><span class="text-[11px] text-gold">Pending (actuel)</span><span class="text-[9px] text-cream/22">19:42</span></div>
              </div>
              <div class="step next flex items-center gap-3">
                <div class="sdot w-3 h-3 border-2 shrink-0 z-10 bg-s1"></div>
                <div><span class="text-[11px] text-cream/22">Confirmed</span></div>
              </div>
              <div class="step next flex items-center gap-3">
                <div class="sdot w-3 h-3 border-2 shrink-0 z-10 bg-s1"></div>
                <div><span class="text-[11px] text-cream/22">Preparing</span></div>
              </div>
              <div class="step next flex items-center gap-3">
                <div class="sdot w-3 h-3 border-2 shrink-0 z-10 bg-s1"></div>
                <div><span class="text-[11px] text-cream/22">Ready</span></div>
              </div>
              <div class="step next flex items-center gap-3">
                <div class="sdot w-3 h-3 border-2 shrink-0 z-10 bg-s1"></div>
                <div><span class="text-[11px] text-cream/22">Delivered</span></div>
              </div>
              <div class="step next flex items-center gap-3">
                <div class="sdot w-3 h-3 border-2 shrink-0 z-10 bg-s1"></div>
                <div><span class="text-[11px] text-cream/22">Completed</span></div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Footer actions -->
      <div class="px-6 py-4 border-t border-gold/[.1] bg-s2 shrink-0 grid grid-cols-2 gap-2">
        <button onclick="closeModal('detailModal')" class="py-3 border border-gold/18 text-cream/35 text-[10px] tracking-[.12em] uppercase hover:border-gold hover:text-cream transition-all bg-transparent cursor-pointer">Fermer</button>
        <button onclick="closeModal('detailModal')" class="py-3 bg-gold text-ink text-[10px] tracking-[.12em] uppercase font-semibold hover:bg-gh transition-colors border-0 cursor-pointer">Imprimer ticket</button>
      </div>
    </div>
  </div>


 

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
        alert('Status updated ');
    })
    .catch(error => {
        console.error(error);
        alert('Error updating status ');
    });
}
</script>

</body>

</html>