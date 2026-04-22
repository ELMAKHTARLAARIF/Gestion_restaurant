  <header class="h-[58px] bg-s1 border-b border-gold/[.12] flex items-center px-7 gap-4 shrink-0">
    <div class="flex items-center gap-2.5 animate-fu">
      <span class="text-[10px] text-cream/25">Admin</span>
      <span class="text-cream/15 text-[11px]">/</span>
      <h1 class="font-display text-[1.2rem] font-light">Com<em class="italic text-gold">mandes</em></h1>
    </div>
    <!-- Live pill -->
    <div class="hidden md:flex items-center gap-1.5 border border-sage/20 bg-sage/5 px-2.5 py-1 animate-fu2">
      <span class="w-1.5 h-1.5 rounded-full bg-sage animate-p2"></span>
      <span class="text-[9px] tracking-wide text-sage/65 uppercase">Live</span>
    </div>
    <div class="flex-1">
        @include('Component.HandleMessages')
    </div>

    <!-- Search -->
    <div class="hidden md:flex items-center gap-2 bg-s2 border border-gold/[.1] px-3 py-1.5 w-48 animate-fu2">
      <svg class="w-3.5 h-3.5 text-cream/22 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
      <input type="text" placeholder="Client, table, #ID…" class="bg-transparent border-0 text-[11px] text-cream placeholder-cream/18 w-full font-body"/>
    </div>

    <!-- View toggle -->
    <div class="flex animate-fu3">
      <button id="vKanban" onclick="setView('kanban')" class="vtbtn on">
        <svg class="w-3.5 h-3.5 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="18" rx="0" stroke-width="1.5"/><rect x="14" y="3" width="7" height="11" rx="0" stroke-width="1.5"/></svg>
        Pipeline
      </button>
      <button id="vTable" onclick="setView('table')" class="vtbtn">
        <svg class="w-3.5 h-3.5 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6h16M4 10h16M4 14h16M4 18h16"/></svg>
        Tableau
      </button>
    </div>

    <div class="hidden lg:block text-[10px] text-cream/25 pl-3 border-l border-gold/[.1] whitespace-nowrap" id="dateBadge"></div>
  </header>