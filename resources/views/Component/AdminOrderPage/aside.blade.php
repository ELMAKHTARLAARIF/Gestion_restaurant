    <aside id="sidebar" class="sidebar-w relative z-20 h-screen bg-s1 border-r border-gold/[.12] flex flex-col overflow-hidden">
        <!-- Collapse btn -->
        <button id="collapseBtn" onclick="toggleSidebar()"
            class="absolute top-6 -right-3 w-6 h-6 bg-s1 border border-gold/[.12] flex items-center justify-center z-30 text-[10px] text-cream/40 hover:text-gold transition-colors cursor-pointer">◀</button>

        <!-- Logo -->
        <div class="flex items-center gap-3 px-6 py-7 border-b border-gold/[.12]">
            <div class="w-8 h-8 border border-gold/40 flex items-center justify-center text-[11px] text-gold flex-shrink-0">LM</div>
            <span class="hide-collapsed font-display text-xl text-gold tracking-wide whitespace-nowrap">Snack Yassine</span>
        </div>

        <!-- Nav -->
        <nav class="flex-1 overflow-y-auto py-4">
            <div class="nav-label-text px-6 pb-2 text-[9px] tracking-[.3em] uppercase text-cream/20 whitespace-nowrap transition-opacity">Principal</div>

            <a href="{{route('Dashboard')}}" class="nav-item active group flex items-center gap-3 px-6 py-[11px] cursor-pointer border-l-2 border-gold bg-gold/[.08] hover:bg-gold/[.08] transition-all" onclick="setPage('dashboard',this)">
                <span class="w-5 text-center text-gold text-base flex-shrink-0">⊞</span>
                <span class="hide-collapsed text-[12px] tracking-wide text-gold whitespace-nowrap">Tableau de bord</span>
            </a>
            <a href="{{route('admin.reservations')}}" class="nav-item group flex items-center gap-3 px-6 py-[11px] cursor-pointer border-l-2 border-transparent hover:bg-gold/[.06] transition-all" onclick="setPage('reservations',this)">
                <span class="w-5 text-center text-cream/45 text-base flex-shrink-0">🗓</span>
                <span class="hide-collapsed text-[12px] tracking-wide text-cream/45 whitespace-nowrap flex-1">Réservations</span>
                <span class="text-black  nav-badge hide-collapsed bg-gold text-dark text-[9px] font-semibold px-1.5 py-0.5">8</span>
            </a>
            <a href="{{route('admin.orders')}}" class="nav-item group flex items-center gap-3 px-6 py-[11px] cursor-pointer border-l-2 border-transparent hover:bg-gold/[.06] transition-all" onclick="setPage('orders',this)">
                <span class="w-5 text-center text-cream/45 text-base flex-shrink-0">🍽</span>
                <span class="hide-collapsed text-[12px] tracking-wide text-cream/45 whitespace-nowrap flex-1">Commandes</span>
                <span class="text-black nav-badge hide-collapsed bg-gold text-dark text-[9px] font-semibold px-1.5 py-0.5 ">3</span>
            </a>
            <a href="{{route('AddItem')}}">
                <div class="nav-item group flex items-center gap-3 px-6 py-[11px] cursor-pointer border-l-2 border-transparent hover:bg-gold/[.06] transition-all" onclick="window.location.href='add-item.html'">
                    <span class="w-5 text-center text-cream/45 text-base flex-shrink-0">＋</span>
                    <span class="hide-collapsed text-[12px] tracking-wide text-cream/45 whitespace-nowrap">Items</span>
                </div>
            </a>
            <a class="nav-item group flex items-center gap-3 px-6 py-[11px] cursor-pointer border-l-2 border-transparent hover:bg-gold/[.06] transition-all" onclick="setPage('tables',this)">
                <span class="w-5 text-center text-cream/45 text-base flex-shrink-0">🪑</span>
                <span class="hide-collapsed text-[12px] tracking-wide text-cream/45 whitespace-nowrap">Tables</span>
            </a>

            <div class="nav-label-text mt-4 px-6 pb-2 text-[9px] tracking-[.3em] uppercase text-cream/20 whitespace-nowrap transition-opacity">Gestion</div>
            <a href="{{route('show_items')}}" class="nav-item group flex items-center gap-3 px-6 py-[11px] cursor-pointer border-l-2 border-transparent hover:bg-gold/[.06] transition-all">
                <span class="w-5 text-center text-cream/45 text-base flex-shrink-0">📋</span>
                <span class="hide-collapsed text-[12px] tracking-wide text-cream/45 whitespace-nowrap">Menu</span>
            </a>
            <a class="nav-item group flex items-center gap-3 px-6 py-[11px] cursor-pointer border-l-2 border-transparent hover:bg-gold/[.06] transition-all">
                <span class="w-5 text-center text-cream/45 text-base flex-shrink-0">👤</span>
                <span class="hide-collapsed text-[12px] tracking-wide text-cream/45 whitespace-nowrap">Clients</span>
            </a>
            <a class="nav-item group flex items-center gap-3 px-6 py-[11px] cursor-pointer border-l-2 border-transparent hover:bg-gold/[.06] transition-all">
                <span class="w-5 text-center text-cream/45 text-base flex-shrink-0">👥</span>
                <span class="hide-collapsed text-[12px] tracking-wide text-cream/45 whitespace-nowrap">Personnel</span>
            </a>
            <a href="{{route('Restaurant_Info')}}" class="nav-item group flex items-center gap-3 px-6 py-[11px] cursor-pointer border-l-2 border-transparent hover:bg-gold/[.06] transition-all">
                <span class="w-5 text-center text-cream/45 text-base flex-shrink-0">ℹ</span>
                <span class="hide-collapsed text-[12px] tracking-wide text-cream/45 whitespace-nowrap">Informations de Restaurant</span>
            </a>
            <a class="nav-item group flex items-center gap-3 px-6 py-[11px] cursor-pointer border-l-2 border-transparent hover:bg-gold/[.06] transition-all">
                <span class="w-5 text-center text-cream/45 text-base flex-shrink-0">⚙</span>
                <span class="hide-collapsed text-[12px] tracking-wide text-cream/45 whitespace-nowrap">Paramètres</span>
            </a>
        </nav>

        <!-- User -->
        <div class="flex items-center gap-3 px-5 py-4 border-t border-gold/[.12]">
            <div class="w-8 h-8 bg-gold/10 border border-gold/25 flex items-center justify-center text-[10px] text-gold flex-shrink-0">MK</div>
            <div class="hide-collapsed overflow-hidden">
                <div class="text-[12px] text-cream whitespace-nowrap">Laarif</div>
                <div class="text-[10px] text-cream/40">Administrateur</div>
            </div>
        </div>
    </aside>