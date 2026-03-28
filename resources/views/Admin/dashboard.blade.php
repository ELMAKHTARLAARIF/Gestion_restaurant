
@include('Component.header')
  <!-- CONTENT -->
  <div class="flex-1 overflow-y-auto content-scroll p-8 flex flex-col gap-7">

    <!-- STAT CARDS -->
    <div class="grid grid-cols-4 gap-px bg-gold/[.1] fade-up">
      <!-- card 1 -->
      <div class="stat-card relative bg-s1 px-7 py-6 overflow-hidden">
        <div class="flex items-center justify-between mb-3">
          <span class="text-[10px] tracking-[.25em] uppercase text-cream/40">Réservations</span>
          <span class="text-base opacity-50">🗓</span>
        </div>
        <div class="font-display text-[2.4rem] font-light leading-none mb-2">24</div>
        <div class="text-[11px] text-cgreen flex items-center gap-1">▲ 12% <span class="text-cream/25 ml-1">vs hier</span></div>
      </div>
      <!-- card 2 -->
      <div class="stat-card relative bg-s1 px-7 py-6 overflow-hidden">
        <div class="flex items-center justify-between mb-3">
          <span class="text-[10px] tracking-[.25em] uppercase text-cream/40">Revenus</span>
          <span class="text-base opacity-50">💰</span>
        </div>
        <div class="font-display text-[2.4rem] font-light leading-none mb-2 text-gold">8 420</div>
        <div class="text-[11px] text-cgreen flex items-center gap-1">▲ 8.3% <span class="text-cream/25 ml-1">MAD</span></div>
      </div>
      <!-- card 3 -->
      <div class="stat-card relative bg-s1 px-7 py-6 overflow-hidden">
        <div class="flex items-center justify-between mb-3">
          <span class="text-[10px] tracking-[.25em] uppercase text-cream/40">Tables occupées</span>
          <span class="text-base opacity-50">🪑</span>
        </div>
        <div class="font-display text-[2.4rem] font-light leading-none mb-2">18<span class="text-xl text-cream/30">/48</span></div>
        <div class="text-[11px] text-cblue flex items-center gap-1">● 37.5% <span class="text-cream/25 ml-1">taux</span></div>
      </div>
      <!-- card 4 -->
      <div class="stat-card relative bg-s1 px-7 py-6 overflow-hidden">
        <div class="flex items-center justify-between mb-3">
          <span class="text-[10px] tracking-[.25em] uppercase text-cream/40">Satisfaction</span>
          <span class="text-base opacity-50">⭐</span>
        </div>
        <div class="font-display text-[2.4rem] font-light leading-none mb-2 text-cgreen">4.9</div>
        <div class="text-[11px] text-cgreen flex items-center gap-1">▲ 0.1 <span class="text-cream/25 ml-1">ce mois</span></div>
      </div>
    </div>

    <!-- CHART + ACTIVITY -->
    <div class="grid grid-cols-3 gap-6 fade-up">
      <!-- Revenue chart -->
      <div class="col-span-2 bg-s1 border border-gold/[.1]">
        <div class="flex items-center justify-between px-6 py-4 border-b border-gold/[.1]">
          <span class="text-[11px] tracking-[.2em] uppercase text-cream/40">Revenus — 7 derniers jours</span>
          <span class="text-[11px] tracking-[.15em] uppercase text-gold/80 cursor-pointer hover:text-gold transition-colors">Exporter</span>
        </div>
        <div class="p-6"><div class="relative h-52"><canvas id="revenueChart"></canvas></div></div>
      </div>
      <!-- Activity -->
      <div class="bg-s1 border border-gold/[.1]">
        <div class="flex items-center justify-between px-6 py-4 border-b border-gold/[.1]">
          <span class="text-[11px] tracking-[.2em] uppercase text-cream/40">Activité récente</span>
          <span class="text-[11px] tracking-[.15em] uppercase text-gold/80 cursor-pointer hover:text-gold transition-colors">Voir tout</span>
        </div>
        <div class="px-6 py-3 divide-y divide-gold/[.05]">
          <div class="flex items-start gap-3 py-3">
            <div class="w-2 h-2 border border-cgreen bg-cgreen/20 flex-shrink-0 mt-1.5"></div>
            <div class="flex-1 text-[12px] leading-relaxed">Réservation — <span class="text-gold">Table 12</span>, M. Alami (4p)</div>
            <div class="text-[10px] text-cream/20 whitespace-nowrap">5 min</div>
          </div>
          <div class="flex items-start gap-3 py-3">
            <div class="w-2 h-2 border border-gold bg-gold/20 flex-shrink-0 mt-1.5"></div>
            <div class="flex-1 text-[12px] leading-relaxed">Commande <span class="text-gold">#0248</span> — Carpaccio ×2</div>
            <div class="text-[10px] text-cream/20 whitespace-nowrap">12 min</div>
          </div>
          <div class="flex items-start gap-3 py-3">
            <div class="w-2 h-2 border border-cred bg-cred/20 flex-shrink-0 mt-1.5"></div>
            <div class="flex-1 text-[12px] leading-relaxed">Annulation — <span class="text-gold">Table 7</span>, Mme Bennis</div>
            <div class="text-[10px] text-cream/20 whitespace-nowrap">28 min</div>
          </div>
          <div class="flex items-start gap-3 py-3">
            <div class="w-2 h-2 border border-cgreen bg-cgreen/20 flex-shrink-0 mt-1.5"></div>
            <div class="flex-1 text-[12px] leading-relaxed">Paiement — <span class="text-gold">1 240 MAD</span>, Table 3</div>
            <div class="text-[10px] text-cream/20 whitespace-nowrap">41 min</div>
          </div>
          <div class="flex items-start gap-3 py-3">
            <div class="w-2 h-2 border border-gold bg-gold/20 flex-shrink-0 mt-1.5"></div>
            <div class="flex-1 text-[12px] leading-relaxed">Avis ⭐⭐⭐⭐⭐ — <span class="text-gold">«Excellent»</span></div>
            <div class="text-[10px] text-cream/20 whitespace-nowrap">1h</div>
          </div>
          <div class="flex items-start gap-3 py-3">
            <div class="w-2 h-2 border border-cgreen bg-cgreen/20 flex-shrink-0 mt-1.5"></div>
            <div class="flex-1 text-[12px] leading-relaxed">Réservation — <span class="text-gold">Table 22</span>, 6 pers. 20h30</div>
            <div class="text-[10px] text-cream/20 whitespace-nowrap">1h 20</div>
          </div>
        </div>
      </div>
    </div>

    <!-- RESERVATIONS TABLE -->
    <div class="bg-s1 border border-gold/[.1] fade-up">
      <div class="flex items-center justify-between px-6 py-4 border-b border-gold/[.1]">
        <span class="text-[11px] tracking-[.2em] uppercase text-cream/40">Réservations du jour</span>
        <span class="text-[11px] tracking-[.15em] uppercase text-gold/80 cursor-pointer hover:text-gold transition-colors">Ajouter +</span>
      </div>
      <div class="overflow-x-auto">
        <table class="w-full border-collapse">
          <thead>
            <tr class="border-b border-gold/[.08]">
              <th class="text-left px-6 py-3 text-[9px] tracking-[.25em] uppercase text-cream/25 font-normal">Client</th>
              <th class="text-left px-4 py-3 text-[9px] tracking-[.25em] uppercase text-cream/25 font-normal">Table</th>
              <th class="text-left px-4 py-3 text-[9px] tracking-[.25em] uppercase text-cream/25 font-normal">Heure</th>
              <th class="text-left px-4 py-3 text-[9px] tracking-[.25em] uppercase text-cream/25 font-normal">Pers.</th>
              <th class="text-left px-4 py-3 text-[9px] tracking-[.25em] uppercase text-cream/25 font-normal">Statut</th>
              <th class="text-left px-4 py-3 text-[9px] tracking-[.25em] uppercase text-cream/25 font-normal">Demande</th>
              <th class="text-left px-4 py-3 text-[9px] tracking-[.25em] uppercase text-cream/25 font-normal">Actions</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gold/[.05]">
            <!-- row -->
            <tr class="hover:bg-gold/[.02] transition-colors">
              <td class="px-6 py-4">
                <div class="flex items-center gap-3">
                  <div class="w-7 h-7 bg-gold/10 border border-gold/20 flex items-center justify-center text-[10px] text-gold">MA</div>
                  <span class="text-[13px]">M. Alami</span>
                </div>
              </td>
              <td class="px-4 py-4 text-[13px] text-cream/70">Table 12</td>
              <td class="px-4 py-4 text-[13px] text-cream/70">19:00</td>
              <td class="px-4 py-4 text-[13px] text-cream/70">4</td>
              <td class="px-4 py-4"><span class="inline-flex items-center gap-1.5 text-[10px] tracking-wide px-2.5 py-1 bg-cgreen/10 border border-cgreen/20 text-cgreen"><span class="w-1.5 h-1.5 rounded-full bg-cgreen"></span>Confirmé</span></td>
              <td class="px-4 py-4 text-[12px] text-cream/35">Allergie fruits de mer</td>
              <td class="px-4 py-4">
                <div class="flex gap-1.5">
                  <button class="w-7 h-7 border border-gold/[.12] text-cream/35 hover:border-gold hover:text-gold transition-all text-xs flex items-center justify-center">✏</button>
                  <button class="w-7 h-7 border border-gold/[.12] text-cream/35 hover:border-cgreen hover:text-cgreen transition-all text-xs flex items-center justify-center">✓</button>
                  <button class="w-7 h-7 border border-gold/[.12] text-cream/35 hover:border-cred hover:text-cred transition-all text-xs flex items-center justify-center">✕</button>
                </div>
              </td>
            </tr>
            <tr class="hover:bg-gold/[.02] transition-colors">
              <td class="px-6 py-4"><div class="flex items-center gap-3"><div class="w-7 h-7 bg-gold/10 border border-gold/20 flex items-center justify-center text-[10px] text-gold">SB</div><span class="text-[13px]">Mme Saidi</span></div></td>
              <td class="px-4 py-4 text-[13px] text-cream/70">Table 5</td>
              <td class="px-4 py-4 text-[13px] text-cream/70">19:30</td>
              <td class="px-4 py-4 text-[13px] text-cream/70">2</td>
              <td class="px-4 py-4"><span class="inline-flex items-center gap-1.5 text-[10px] tracking-wide px-2.5 py-1 bg-cgreen/10 border border-cgreen/20 text-cgreen"><span class="w-1.5 h-1.5 rounded-full bg-cgreen"></span>Confirmé</span></td>
              <td class="px-4 py-4 text-[12px] text-cream/35">—</td>
              <td class="px-4 py-4"><div class="flex gap-1.5"><button class="w-7 h-7 border border-gold/[.12] text-cream/35 hover:border-gold hover:text-gold transition-all text-xs flex items-center justify-center">✏</button><button class="w-7 h-7 border border-gold/[.12] text-cream/35 hover:border-cgreen hover:text-cgreen transition-all text-xs flex items-center justify-center">✓</button><button class="w-7 h-7 border border-gold/[.12] text-cream/35 hover:border-cred hover:text-cred transition-all text-xs flex items-center justify-center">✕</button></div></td>
            </tr>
            <tr class="hover:bg-gold/[.02] transition-colors">
              <td class="px-6 py-4"><div class="flex items-center gap-3"><div class="w-7 h-7 bg-gold/10 border border-gold/20 flex items-center justify-center text-[10px] text-gold">OC</div><span class="text-[13px]">M. Cherkaoui</span></div></td>
              <td class="px-4 py-4 text-[13px] text-cream/70">Table 22</td>
              <td class="px-4 py-4 text-[13px] text-cream/70">20:30</td>
              <td class="px-4 py-4 text-[13px] text-cream/70">6</td>
              <td class="px-4 py-4"><span class="inline-flex items-center gap-1.5 text-[10px] tracking-wide px-2.5 py-1 bg-gold/10 border border-gold/20 text-gold"><span class="w-1.5 h-1.5 rounded-full bg-gold"></span>En attente</span></td>
              <td class="px-4 py-4 text-[12px] text-cream/35">Menu anniversaire</td>
              <td class="px-4 py-4"><div class="flex gap-1.5"><button class="w-7 h-7 border border-gold/[.12] text-cream/35 hover:border-gold hover:text-gold transition-all text-xs flex items-center justify-center">✏</button><button class="w-7 h-7 border border-gold/[.12] text-cream/35 hover:border-cgreen hover:text-cgreen transition-all text-xs flex items-center justify-center">✓</button><button class="w-7 h-7 border border-gold/[.12] text-cream/35 hover:border-cred hover:text-cred transition-all text-xs flex items-center justify-center">✕</button></div></td>
            </tr>
            <tr class="hover:bg-gold/[.02] transition-colors">
              <td class="px-6 py-4"><div class="flex items-center gap-3"><div class="w-7 h-7 bg-gold/10 border border-gold/20 flex items-center justify-center text-[10px] text-gold">FH</div><span class="text-[13px]">M. Hassani</span></div></td>
              <td class="px-4 py-4 text-[13px] text-cream/70">Table 8</td>
              <td class="px-4 py-4 text-[13px] text-cream/70">21:00</td>
              <td class="px-4 py-4 text-[13px] text-cream/70">3</td>
              <td class="px-4 py-4"><span class="inline-flex items-center gap-1.5 text-[10px] tracking-wide px-2.5 py-1 bg-gold/10 border border-gold/20 text-gold"><span class="w-1.5 h-1.5 rounded-full bg-gold"></span>En attente</span></td>
              <td class="px-4 py-4 text-[12px] text-cream/35">Vue sur jardin</td>
              <td class="px-4 py-4"><div class="flex gap-1.5"><button class="w-7 h-7 border border-gold/[.12] text-cream/35 hover:border-gold hover:text-gold transition-all text-xs flex items-center justify-center">✏</button><button class="w-7 h-7 border border-gold/[.12] text-cream/35 hover:border-cgreen hover:text-cgreen transition-all text-xs flex items-center justify-center">✓</button><button class="w-7 h-7 border border-gold/[.12] text-cream/35 hover:border-cred hover:text-cred transition-all text-xs flex items-center justify-center">✕</button></div></td>
            </tr>
            <tr class="hover:bg-gold/[.02] transition-colors">
              <td class="px-6 py-4"><div class="flex items-center gap-3"><div class="w-7 h-7 bg-gold/10 border border-gold/20 flex items-center justify-center text-[10px] text-gold">NB</div><span class="text-[13px]">Mme Bennis</span></div></td>
              <td class="px-4 py-4 text-[13px] text-cream/70">Table 7</td>
              <td class="px-4 py-4 text-[13px] text-cream/70">20:00</td>
              <td class="px-4 py-4 text-[13px] text-cream/70">2</td>
              <td class="px-4 py-4"><span class="inline-flex items-center gap-1.5 text-[10px] tracking-wide px-2.5 py-1 bg-cred/10 border border-cred/20 text-cred"><span class="w-1.5 h-1.5 rounded-full bg-cred"></span>Annulé</span></td>
              <td class="px-4 py-4 text-[12px] text-cream/35">—</td>
              <td class="px-4 py-4"><div class="flex gap-1.5"><button class="w-7 h-7 border border-gold/[.12] text-cream/35 hover:border-gold hover:text-gold transition-all text-xs flex items-center justify-center">✏</button><button class="w-7 h-7 border border-gold/[.12] text-cream/15 opacity-30 text-xs flex items-center justify-center cursor-not-allowed" disabled>✓</button><button class="w-7 h-7 border border-gold/[.12] text-cream/35 hover:border-cred hover:text-cred transition-all text-xs flex items-center justify-center">🗑</button></div></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <!-- BOTTOM ROW: Tables + Menu perf + Donut + Quick -->
    <div class="grid grid-cols-3 gap-6 fade-up">

      <!-- Table plan -->
      <div class="bg-s1 border border-gold/[.1]">
        <div class="flex items-center justify-between px-6 py-4 border-b border-gold/[.1]">
          <span class="text-[11px] tracking-[.2em] uppercase text-cream/40">Plan des tables</span>
          <span class="text-[11px] tracking-[.15em] uppercase text-gold/80 cursor-pointer hover:text-gold">Modifier</span>
        </div>
        <div class="p-5">
          <div id="tablesGrid" class="grid grid-cols-6 gap-1.5"></div>
          <div class="flex gap-5 mt-4">
            <div class="flex items-center gap-1.5 text-[10px] text-cream/40"><div class="w-2 h-2 rounded-full bg-gold"></div>Occupée</div>
            <div class="flex items-center gap-1.5 text-[10px] text-cream/40"><div class="w-2 h-2 rounded-full bg-cblue"></div>Réservée</div>
            <div class="flex items-center gap-1.5 text-[10px] text-cream/40"><div class="w-2 h-2 rounded-full bg-cgreen"></div>Libre</div>
          </div>
        </div>
      </div>

      <!-- Top dishes -->
      <div class="bg-s1 border border-gold/[.1]">
        <div class="flex items-center justify-between px-6 py-4 border-b border-gold/[.1]">
          <span class="text-[11px] tracking-[.2em] uppercase text-cream/40">Top plats du jour</span>
          <span class="text-[11px] tracking-[.15em] uppercase text-gold/80 cursor-pointer hover:text-gold">Détails</span>
        </div>
        <div class="px-6 py-3 divide-y divide-gold/[.05]">
          <!-- dish rows -->
          <div class="flex items-center gap-3 py-3">
            <span class="font-display text-lg text-gold/30 w-5">1</span>
            <div class="flex-1"><div class="text-[13px] mb-0.5">Côte de Bœuf</div><div class="text-[10px] text-cream/35 tracking-wide">Plats · 380 MAD</div></div>
            <div class="w-20"><div class="h-0.5 bg-gold/10 relative"><div class="h-full bg-gold" style="width:100%"></div></div></div>
            <span class="text-[12px] text-gold w-8 text-right">24</span>
          </div>
          <div class="flex items-center gap-3 py-3">
            <span class="font-display text-lg text-gold/30 w-5">2</span>
            <div class="flex-1"><div class="text-[13px] mb-0.5">Saint-Jacques</div><div class="text-[10px] text-cream/35 tracking-wide">Entrées · 185 MAD</div></div>
            <div class="w-20"><div class="h-0.5 bg-gold/10"><div class="h-full bg-gold" style="width:78%"></div></div></div>
            <span class="text-[12px] text-gold w-8 text-right">19</span>
          </div>
          <div class="flex items-center gap-3 py-3">
            <span class="font-display text-lg text-gold/30 w-5">3</span>
            <div class="flex-1"><div class="text-[13px] mb-0.5">Fondant Chocolat</div><div class="text-[10px] text-cream/35 tracking-wide">Desserts · 95 MAD</div></div>
            <div class="w-20"><div class="h-0.5 bg-gold/10"><div class="h-full bg-gold" style="width:65%"></div></div></div>
            <span class="text-[12px] text-gold w-8 text-right">16</span>
          </div>
          <div class="flex items-center gap-3 py-3">
            <span class="font-display text-lg text-gold/30 w-5">4</span>
            <div class="flex-1"><div class="text-[13px] mb-0.5">Tagine d'Agneau</div><div class="text-[10px] text-cream/35 tracking-wide">Plats · 290 MAD</div></div>
            <div class="w-20"><div class="h-0.5 bg-gold/10"><div class="h-full bg-gold" style="width:54%"></div></div></div>
            <span class="text-[12px] text-gold w-8 text-right">13</span>
          </div>
          <div class="flex items-center gap-3 py-3">
            <span class="font-display text-lg text-gold/30 w-5">5</span>
            <div class="flex-1"><div class="text-[13px] mb-0.5">Harira Gastro.</div><div class="text-[10px] text-cream/35 tracking-wide">Entrées · 95 MAD</div></div>
            <div class="w-20"><div class="h-0.5 bg-gold/10"><div class="h-full bg-gold" style="width:42%"></div></div></div>
            <span class="text-[12px] text-gold w-8 text-right">10</span>
          </div>
        </div>
      </div>

      <!-- Donut + Quick -->
      <div class="flex flex-col gap-5">
        <!-- Donut -->
        <div class="bg-s1 border border-gold/[.1] flex-1">
          <div class="px-6 py-4 border-b border-gold/[.1]">
            <span class="text-[11px] tracking-[.2em] uppercase text-cream/40">Répartition revenus</span>
          </div>
          <div class="p-5">
            <div class="relative h-36 flex items-center justify-center">
              <canvas id="donutChart" width="140" height="140"></canvas>
              <div class="absolute text-center pointer-events-none">
                <div class="font-display text-xl text-gold">8 420</div>
                <div class="text-[9px] tracking-[.2em] uppercase text-cream/35">MAD total</div>
              </div>
            </div>
            <div class="mt-4 space-y-2">
              <div class="flex items-center justify-between"><div class="flex items-center gap-2 text-[11px] text-cream/40"><div class="w-2 h-2 bg-gold"></div>Plats</div><span class="text-[11px] text-cream">54%</span></div>
              <div class="flex items-center justify-between"><div class="flex items-center gap-2 text-[11px] text-cream/40"><div class="w-2 h-2 bg-cblue"></div>Boissons</div><span class="text-[11px] text-cream">28%</span></div>
              <div class="flex items-center justify-between"><div class="flex items-center gap-2 text-[11px] text-cream/40"><div class="w-2 h-2 bg-cgreen"></div>Desserts</div><span class="text-[11px] text-cream">18%</span></div>
            </div>
          </div>
        </div>
        <!-- Quick actions -->
        <div class="bg-s1 border border-gold/[.1]">
          <div class="px-6 py-4 border-b border-gold/[.1]">
            <span class="text-[11px] tracking-[.2em] uppercase text-cream/40">Actions rapides</span>
          </div>
          <div class="p-4 grid grid-cols-2 gap-2">
            <button class="p-3 border border-gold/[.1] text-left hover:bg-gold/[.06] hover:border-gold/30 transition-all flex flex-col gap-1">
              <span class="text-base">🗓</span><span class="text-[11px] text-cream tracking-wide">Réservation</span><span class="text-[10px] text-cream/35">Ajouter</span>
            </button>
            <button class="p-3 border border-gold/[.1] text-left hover:bg-gold/[.06] hover:border-gold/30 transition-all flex flex-col gap-1">
              <span class="text-base">🍽</span><span class="text-[11px] text-cream tracking-wide">Commande</span><span class="text-[10px] text-cream/35">Nouvelle</span>
            </button>
            <button onclick="window.location.href='add-item.html'" class="p-3 border border-gold/[.1] text-left hover:bg-gold/[.06] hover:border-gold/30 transition-all flex flex-col gap-1">
              <span class="text-base">📋</span><span class="text-[11px] text-cream tracking-wide">Item Menu</span><span class="text-[10px] text-cream/35">Ajouter</span>
            </button>
            <button class="p-3 border border-gold/[.1] text-left hover:bg-gold/[.06] hover:border-gold/30 transition-all flex flex-col gap-1">
              <span class="text-base">📤</span><span class="text-[11px] text-cream tracking-wide">Rapport</span><span class="text-[10px] text-cream/35">Exporter</span>
            </button>
          </div>
        </div>
      </div>
    </div>

  </div><!-- end content -->
</div><!-- end main -->

<!-- NOTIFICATIONS PANEL -->
<div id="notifPanel" class="notif-panel fixed top-[60px] right-0 w-80 bg-s1 border-l border-gold/[.12] z-50 overflow-y-auto" style="height:calc(100vh - 60px)">
  <div class="flex items-center justify-between px-6 py-4 border-b border-gold/[.12]">
    <span class="text-[11px] tracking-[.2em] uppercase text-cream/40">Notifications</span>
    <button onclick="toggleNotif()" class="text-cream/35 hover:text-gold transition-colors text-base bg-transparent border-0 cursor-pointer">✕</button>
  </div>
  <div class="divide-y divide-gold/[.05]">
    <div class="px-6 py-4 border-l-2 border-gold hover:bg-gold/[.04] cursor-pointer transition-colors">
      <div class="text-[13px] mb-1">Nouvelle réservation en attente</div>
      <div class="text-[11px] text-cream/40">M. Cherkaoui — Table 22, 6 pers.</div>
      <div class="text-[10px] text-cream/20 mt-1">il y a 12 min</div>
    </div>
    <div class="px-6 py-4 border-l-2 border-gold hover:bg-gold/[.04] cursor-pointer transition-colors">
      <div class="text-[13px] mb-1">Stock faible — Carpaccio</div>
      <div class="text-[11px] text-cream/40">Saint-Jacques : 3 portions restantes</div>
      <div class="text-[10px] text-cream/20 mt-1">il y a 35 min</div>
    </div>
    <div class="px-6 py-4 border-l-2 border-gold hover:bg-gold/[.04] cursor-pointer transition-colors">
      <div class="text-[13px] mb-1">Nouvel avis 5 étoiles</div>
      <div class="text-[11px] text-cream/40">«Service impeccable !»</div>
      <div class="text-[10px] text-cream/20 mt-1">il y a 1h</div>
    </div>
    <div class="px-6 py-4 border-l-2 border-transparent hover:bg-gold/[.04] cursor-pointer transition-colors">
      <div class="text-[13px] mb-1">Rapport journalier généré</div>
      <div class="text-[11px] text-cream/40">Résumé du 12 mars disponible</div>
      <div class="text-[10px] text-cream/20 mt-1">hier, 23:59</div>
    </div>
    <div class="px-6 py-4 border-l-2 border-transparent hover:bg-gold/[.04] cursor-pointer transition-colors">
      <div class="text-[13px] mb-1">Mise à jour système</div>
      <div class="text-[11px] text-cream/40">Version 2.1.4 installée</div>
      <div class="text-[10px] text-cream/20 mt-1">hier, 08:00</div>
    </div>
  </div>
</div>

<script src="{{ asset('js/home.js') }}"></script>
</body>
</html>

