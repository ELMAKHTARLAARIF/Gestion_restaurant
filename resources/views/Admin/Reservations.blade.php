@include('Component.header')

  <!-- CONTENT -->
  <div class="flex-1 overflow-y-auto p-7 flex flex-col gap-6">

    <!-- STAT CARDS -->
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-px bg-gold/[.07] animate-fu">
      <div class="sa relative bg-s1 px-6 py-5 overflow-hidden"><div class="flex items-center justify-between mb-3"><span class="text-[10px] tracking-[.22em] uppercase text-cream/35">Aujourd'hui</span><span class="opacity-40">🗓</span></div><div class="font-display text-[2.2rem] font-light leading-none mb-2">24</div><div class="flex items-center gap-1 text-[11px] text-cg">▲ +3 vs hier</div></div>
      <div class="sa relative bg-s1 px-6 py-5 overflow-hidden"><div class="flex items-center justify-between mb-3"><span class="text-[10px] tracking-[.22em] uppercase text-cream/35">En attente</span><span class="opacity-40">⏳</span></div><div class="font-display text-[2.2rem] font-light leading-none mb-2 text-cy">8</div><div class="text-[11px] text-cream/30">À confirmer</div></div>
      <div class="sa relative bg-s1 px-6 py-5 overflow-hidden"><div class="flex items-center justify-between mb-3"><span class="text-[10px] tracking-[.22em] uppercase text-cream/35">Confirmées</span><span class="opacity-40">✓</span></div><div class="font-display text-[2.2rem] font-light leading-none mb-2 text-cg">14</div><div class="text-[11px] text-cream/30">Ce soir</div></div>
      <div class="sa relative bg-s1 px-6 py-5 overflow-hidden"><div class="flex items-center justify-between mb-3"><span class="text-[10px] tracking-[.22em] uppercase text-cream/35">Couverts</span><span class="opacity-40">🍽</span></div><div class="font-display text-[2.2rem] font-light leading-none mb-2 text-gold">87</div><div class="flex items-center gap-1 text-[11px] text-cg">▲ +12%</div></div>
    </div>

    <!-- FILTERS -->
    <div class="flex items-center gap-3 flex-wrap animate-fu" style="animation-delay:.08s">
      <div class="flex border border-gold/[.12] overflow-hidden">
        <button onclick="setStatus('all',this)"       class="tab-btn tab-on text-[10px] tracking-[.14em] uppercase px-4 py-2 transition-all border-r border-gold/[.1] whitespace-nowrap">Toutes</button>
        <button onclick="setStatus('confirmed',this)" class="tab-btn text-[10px] tracking-[.14em] uppercase px-4 py-2 transition-all text-cream/40 hover:text-cream border-r border-gold/[.1] whitespace-nowrap">Confirmées</button>
        <button onclick="setStatus('pending',this)"   class="tab-btn text-[10px] tracking-[.14em] uppercase px-4 py-2 transition-all text-cream/40 hover:text-cream border-r border-gold/[.1] whitespace-nowrap">En attente</button>
        <button onclick="setStatus('cancelled',this)" class="tab-btn text-[10px] tracking-[.14em] uppercase px-4 py-2 transition-all text-cream/40 hover:text-cream whitespace-nowrap">Annulées</button>
      </div>
      <input type="date" id="dateFilter" onchange="applyFilters()" class="inp bg-s1 border border-gold/[.1] px-4 py-2 text-[12px] text-cream/50 font-body cursor-pointer"/>
      <select id="guestFilter" onchange="applyFilters()" class="inp bg-s1 border border-gold/[.1] px-4 py-2 text-[12px] text-cream/50 font-body cursor-pointer">
        <option value="">Tous couverts</option><option value="1-2">1–2 pers.</option><option value="3-4">3–4 pers.</option><option value="5+">5+ pers.</option>
      </select>
      <div class="flex-1"></div>
      <span id="resCount" class="text-[11px] text-cream/25 tracking-wide">24 réservations</span>
      <div class="flex border border-gold/[.1]">
        <button id="vT" onclick="setView('table')" class="w-8 h-8 flex items-center justify-center text-gold bg-gd border-r border-gold/[.1] cursor-pointer text-sm">☰</button>
        <button id="vC" onclick="setView('card')"  class="w-8 h-8 flex items-center justify-center text-cream/35 cursor-pointer text-sm">⊞</button>
      </div>
      <button onclick="exportCSV()" class="flex items-center gap-2 border border-gold/[.15] text-cream/40 text-[10px] tracking-[.13em] uppercase px-4 py-2 hover:border-gold/35 hover:text-gold transition-all cursor-pointer bg-transparent">
        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
        Exporter
      </button>
    </div>

    <!-- TIMELINE STRIP -->
    <div class="bg-s1 border border-gold/[.1] px-6 py-4 animate-fu" style="animation-delay:.12s">
      <div class="flex items-center justify-between mb-3">
        <span class="text-[10px] tracking-[.25em] uppercase text-cream/35">Timeline du soir</span>
        <span class="text-[10px] text-cream/20" id="tlDate"></span>
      </div>
      <div class="flex justify-between mb-2">
        <span class="text-[9px] text-cream/20">18h</span><span class="text-[9px] text-cream/20">19h</span><span class="text-[9px] text-cream/20">20h</span><span class="text-[9px] text-cream/20">21h</span><span class="text-[9px] text-cream/20">22h</span><span class="text-[9px] text-cream/20">23h</span>
      </div>
      <div class="h-8 bg-s2 border border-gold/[.07] relative overflow-hidden">
        <div class="absolute top-1 bottom-1 left-[5%]  w-[12%] bg-cg/20  border border-cg/30  flex items-center px-2"><span class="text-[9px] text-cg truncate">T.5 · 19h</span></div>
        <div class="absolute top-1 bottom-1 left-[20%] w-[14%] bg-gold/20 border border-gold/30 flex items-center px-2"><span class="text-[9px] text-gold truncate">T.12 · 19h30</span></div>
        <div class="absolute top-1 bottom-1 left-[38%] w-[16%] bg-cg/20  border border-cg/30  flex items-center px-2"><span class="text-[9px] text-cg truncate">T.22 · 20h</span></div>
        <div class="absolute top-1 bottom-1 left-[56%] w-[10%] bg-cy/20  border border-cy/30  flex items-center px-2"><span class="text-[9px] text-cy truncate">T.8</span></div>
        <div class="absolute top-1 bottom-1 left-[70%] w-[14%] bg-cr/20  border border-cr/30  flex items-center px-2"><span class="text-[9px] text-cr truncate">T.3 · 21h</span></div>
        <div id="tl" class="absolute top-0 bottom-0 w-px bg-gold/60"></div>
      </div>
    </div>

    <!-- TABLE VIEW -->
    <div id="tableView" class="bg-s1 border border-gold/[.1] animate-fu overflow-hidden" style="animation-delay:.16s">
      <div class="flex items-center justify-between px-6 py-4 border-b border-gold/[.1]">
        <span class="text-[11px] tracking-[.2em] uppercase text-cream/35">Liste des réservations</span>
        <button onclick="cycleSort()" class="flex items-center gap-1.5 text-[10px] tracking-[.12em] uppercase text-cream/30 hover:text-gold transition-colors cursor-pointer bg-transparent border-0">
          <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 4h13M3 8h9m-9 4h6m4 0l4-4m0 0l4 4m-4-4v12"/></svg>
          <span id="sortLbl">Heure ▲</span>
        </button>
      </div>
      <div class="overflow-x-auto">
        <table class="w-full border-collapse">
          <thead>
            <tr class="border-b border-gold/[.07]">
              <th class="text-left px-6 py-3 text-[9px] tracking-[.22em] uppercase text-cream/22 font-normal"><label class="flex items-center gap-2 cursor-pointer"><input type="checkbox" id="selAll" onchange="toggleAll(this)" class="accent-gold"/> Client</label></th>
              <th class="text-left px-4 py-3 text-[9px] tracking-[.22em] uppercase text-cream/22 font-normal">Table</th>
              <th class="text-left px-4 py-3 text-[9px] tracking-[.22em] uppercase text-cream/22 font-normal">Date & Heure</th>
              <th class="text-left px-4 py-3 text-[9px] tracking-[.22em] uppercase text-cream/22 font-normal">Pers.</th>
              <th class="text-left px-4 py-3 text-[9px] tracking-[.22em] uppercase text-cream/22 font-normal">Statut</th>
              <th class="text-left px-4 py-3 text-[9px] tracking-[.22em] uppercase text-cream/22 font-normal">Notes</th>
              <th class="text-left px-4 py-3 text-[9px] tracking-[.22em] uppercase text-cream/22 font-normal">Contact</th>
              <th class="text-left px-4 py-3 text-[9px] tracking-[.22em] uppercase text-cream/22 font-normal">Actions</th>
            </tr>
          </thead>
          <tbody id="tbody" class="divide-y divide-gold/[.04]"></tbody>
        </table>
      </div>
      <div class="flex items-center justify-between px-6 py-4 border-t border-gold/[.07]">
        <span class="text-[11px] text-cream/25" id="pgInfo">Page 1 / 2</span>
        <div class="flex gap-1" id="pgBtns"></div>
      </div>
    </div>

    <!-- CARD VIEW -->
    <div id="cardView" class="hidden grid sm:grid-cols-2 xl:grid-cols-3 gap-4"></div>

  </div>
</div>

<!-- DRAWER -->

<!-- DETAIL MODAL -->
<div id="detMd" class="hidden fixed inset-0 z-[100] flex items-center justify-center px-4">
  <div class="absolute inset-0 bg-ink/88 backdrop-blur-md" onclick="closeDetail()"></div>
  <div class="relative bg-s1 border border-gold/[.18] w-full max-w-md shadow-2xl animate-sm">
    <div class="flex items-center justify-between px-7 py-5 border-b border-gold/[.1]">
      <div><span class="block text-[9px] tracking-[.38em] uppercase text-gold mb-0.5">Réservation</span><h3 id="detName" class="font-display text-xl font-light"></h3></div>
      <button onclick="closeDetail()" class="w-8 h-8 border border-gold/20 flex items-center justify-center text-cream/30 hover:text-gold hover:border-gold transition-all bg-transparent cursor-pointer">✕</button>
    </div>
    <div id="detBody" class="px-7 py-6 flex flex-col gap-4"></div>
    <div id="detAct" class="flex gap-2 px-7 pb-6"></div>
  </div>
</div>

<!-- DELETE MODAL -->
<div id="delMd" class="hidden fixed inset-0 z-[110] flex items-center justify-center px-4">
  <div class="absolute inset-0 bg-ink/90 backdrop-blur-md" onclick="closeDel()"></div>
  <div class="relative bg-s1 border border-cr/25 w-full max-w-sm shadow-2xl animate-sm px-7 py-7 text-center">
    <div class="w-12 h-12 bg-cr/10 border border-cr/25 rounded-full flex items-center justify-center mx-auto mb-4 text-xl">🗑</div>
    <h3 class="font-display text-xl mb-2">Supprimer ?</h3>
    <p id="delMsg" class="text-[12px] text-cream/40 mb-6 leading-relaxed"></p>
    <div class="flex gap-3">
      <button onclick="closeDel()" class="flex-1 py-3 border border-gold/[.15] text-cream/40 text-[11px] tracking-[.13em] uppercase hover:border-gold transition-all bg-transparent cursor-pointer">Annuler</button>
      <button onclick="confirmDel()" class="flex-1 py-3 bg-cr text-ivory text-[11px] tracking-[.13em] uppercase font-semibold hover:bg-red-500 transition-colors border-0 cursor-pointer">Supprimer</button>
    </div>
  </div>
</div>

<!-- TOAST -->
<div id="toast" class="hidden fixed bottom-7 right-7 z-[200] bg-s2 px-5 py-3.5 flex items-center gap-3 shadow-xl animate-fu">
  <span id="tIco" class="text-cg text-lg">✓</span>
  <div><div id="tTit" class="text-[13px] text-cream"></div><div id="tSub" class="text-[10px] text-cream/35 mt-0.5"></div></div>
</div>
@include('Admin.NotificationModal')
</body>
</html>