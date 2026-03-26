@include('Component.header')

<!-- ══ MAIN ══ -->
<main class="max-w-[1400px] mx-auto px-8 py-10">

    <!-- Page title + stats row -->
    <div class="flex items-end justify-between mb-10">
        <div>
            <span class="block text-[10px] tracking-[.4em] uppercase text-gold mb-2">Catalogue</span>
            <h1 class="font-display font-light text-[2.8rem] leading-none">Tous les <em class="italic text-gold">items</em></h1>
        </div>
        <!-- Mini stats -->
        <div class="flex items-center gap-6 pb-1">
            <div class="text-right">
                <div id="totalCount" class="font-display text-2xl text-gold leading-none">12</div>
                <div class="text-[10px] tracking-[.2em] uppercase text-cream/30 mt-0.5">Total</div>
            </div>
            <div class="w-px h-8 bg-gold/15"></div>
            <div class="text-right">
                <div class="font-display text-2xl text-cgreen leading-none">10</div>
                <div class="text-[10px] tracking-[.2em] uppercase text-cream/30 mt-0.5">Disponibles</div>
            </div>
            <div class="w-px h-8 bg-gold/15"></div>
            <div class="text-right">
                <div class="font-display text-2xl text-cred leading-none">2</div>
                <div class="text-[10px] tracking-[.2em] uppercase text-cream/30 mt-0.5">Indisponibles</div>
            </div>
        </div>
    </div>

    <!-- ── FILTERS + VIEW TOGGLE ── -->
    <div class="flex items-center justify-between mb-8 flex-wrap gap-4">
        <!-- Category filters -->
        <div class="flex items-center gap-2 flex-wrap">
            <button onclick="setFilter('all', this)" class="filter-tab active px-5 py-2 border border-gold/[.15] text-[11px] tracking-[.15em] uppercase text-cream/40 transition-all hover:border-gold/35 hover:text-cream/70">Tous</button>
            <button onclick="setFilter('entrees', this)" class="filter-tab px-5 py-2 border border-gold/[.15] text-[11px] tracking-[.15em] uppercase text-cream/40 transition-all hover:border-gold/35 hover:text-cream/70">🥗 Entrées</button>
            <button onclick="setFilter('plats', this)" class="filter-tab px-5 py-2 border border-gold/[.15] text-[11px] tracking-[.15em] uppercase text-cream/40 transition-all hover:border-gold/35 hover:text-cream/70">🍖 Plats</button>
            <button onclick="setFilter('desserts', this)" class="filter-tab px-5 py-2 border border-gold/[.15] text-[11px] tracking-[.15em] uppercase text-cream/40 transition-all hover:border-gold/35 hover:text-cream/70">🍮 Desserts</button>
            <button onclick="setFilter('boissons', this)" class="filter-tab px-5 py-2 border border-gold/[.15] text-[11px] tracking-[.15em] uppercase text-cream/40 transition-all hover:border-gold/35 hover:text-cream/70">🍷 Boissons</button>
            <button onclick="setFilter('suggestions', this)" class="filter-tab px-5 py-2 border border-gold/[.15] text-[11px] tracking-[.15em] uppercase text-cream/40 transition-all hover:border-gold/35 hover:text-cream/70">⭐ Suggestions</button>
        </div>

        <!-- Sort + View -->
        <div class="flex items-center gap-3">
            <select onchange="sortItems(this.value)" class="bg-s1 border border-gold/[.1] px-4 py-2 text-[11px] text-cream/45 outline-none font-body cursor-pointer hover:border-gold/30 transition-colors">
                <option value="name-asc">Nom A→Z</option>
                <option value="name-desc">Nom Z→A</option>
                <option value="price-asc">Prix croissant</option>
                <option value="price-desc">Prix décroissant</option>
                <option value="newest">Plus récents</option>
            </select>
            <!-- Grid / List toggle -->
            <div class="flex border border-gold/[.1]">
                <button id="gridBtn" onclick="setView('grid')" class="view-btn active w-9 h-9 flex items-center justify-center text-sm transition-all border-r border-gold/[.1]">⊞</button>
                <button id="listBtn" onclick="setView('list')" class="view-btn w-9 h-9 flex items-center justify-center text-sm text-cream/35 transition-all">☰</button>
            </div>
        </div>
    </div>

    <!-- ── EMPTY STATE (hidden by default) ── -->
    <div id="emptyState" class="hidden text-center py-28">
        <div class="text-5xl mb-4 opacity-20">🍽</div>
        <div class="font-display text-2xl text-cream/20 mb-2">Aucun item trouvé</div>
        <div class="text-[12px] text-cream/20">Essayez un autre filtre ou terme de recherche.</div>
    </div>

    <!-- ── GRID VIEW ── -->
    <div id="gridView" class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-px bg-gold/[.08]">

        <!-- CARD 1 -->
        @foreach($items as $item)
        <div class="item-card fade-up relative bg-s1 flex flex-col overflow-hidden group cursor-pointer" data-cat="plats" data-name="Côte de Bœuf" data-price="380">
            <div class="relative overflow-hidden h-52">
                <img src="{{ asset('storage/'.$item->image) }}" class="card-img w-full h-full object-cover brightness-75" />
                <!-- Badges -->
                <div class="absolute top-3 left-3 flex flex-col gap-1.5">
                    <span class="bg-gold text-dark text-[9px] tracking-[.15em] uppercase px-2 py-0.5 font-semibold">⭐ Signature</span>
                </div>
                <div class="absolute top-3 right-3">
                    <span class="bg-cgreen/20 border border-cgreen/40 text-cgreen text-[9px] tracking-wide uppercase px-2 py-0.5 flex items-center gap-1"><span class="pulse w-1.5 h-1.5 rounded-full bg-cgreen"></span>{{$item->status}}</span>
                </div>
                <!-- Hover overlay -->
                <div class="absolute inset-0 bg-gradient-to-t from-dark/90 via-dark/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-400 flex items-end p-4">
                    <div class="flex gap-2 w-full">
                        <button class="flex-1 py-2 bg-gold text-dark text-[10px] tracking-[.15em] uppercase font-semibold hover:bg-gold-h transition-all border-0 cursor-pointer">Modifier</button>
                        <button class="w-9 h-9 border border-cred/40 text-cred text-xs hover:bg-cred/10 transition-all cursor-pointer flex items-center justify-center">🗑</button>
                    </div>
                </div>
            </div>

            <div class="p-5 flex flex-col flex-1">
                <span class="text-[9px] tracking-[.25em] uppercase text-gold mb-1.5">{{$item->category->name}}</span>
                <h3 class="font-display text-lg leading-tight mb-1.5">{{$item->name}}</h3>
                <p class="text-[11px] text-cream/40 leading-relaxed flex-1 mb-4">{{$item->description}}</p>
                <div class="flex items-center justify-between pt-3 border-t border-gold/[.08]">
                    <span class="font-display text-xl text-gold">{{$item->prix}} <span class="text-sm text-cream/30">MAD</span></span>
                    <span class="text-[10px] text-cream/30 tracking-wide">⏱ {{$item->temp_prepa}}</span>
                </div>
            </div>
        </div>
        @endforeach

    </div><!-- end grid -->

    <!-- ── LIST VIEW (hidden by default) ── -->
    <div id="listView" class="hidden flex flex-col divide-y divide-gold/[.06] border border-gold/[.08]">
        <!-- List rows generated by JS -->
    </div>

    <!-- Result count -->
    <div class="mt-8 text-center">
        <span id="resultCount" class="text-[11px] tracking-[.2em] uppercase text-cream/20">12 items affichés</span>
    </div>

</main>

<script>
    let currentFilter = 'all';
    let currentView = 'grid';

    // ── FILTER ──
    function setFilter(cat, btn) {
        currentFilter = cat;
        document.querySelectorAll('.filter-tab').forEach(t => t.classList.remove('active'));
        btn.classList.add('active');
        filterItems();
    }

    function filterItems() {
        const search = document.getElementById('searchInput').value.toLowerCase();
        const cards = document.querySelectorAll('.item-card');
        let visible = 0;

        cards.forEach(card => {
            const catMatch = currentFilter === 'all' || card.dataset.cat === currentFilter;
            const nameMatch = card.dataset.name.toLowerCase().includes(search);
            const show = catMatch && nameMatch;
            card.style.display = show ? '' : 'none';
            if (show) visible++;
        });

        document.getElementById('resultCount').textContent = `${visible} item${visible > 1 ? 's' : ''} affiché${visible > 1 ? 's' : ''}`;
        document.getElementById('emptyState').classList.toggle('hidden', visible > 0);
        document.getElementById('totalCount').textContent = visible;
    }

    // ── SORT ──
    function sortItems(val) {
        const grid = document.getElementById('gridView');
        const cards = [...grid.querySelectorAll('.item-card')];
        cards.sort((a, b) => {
            if (val === 'name-asc') return a.dataset.name.localeCompare(b.dataset.name);
            if (val === 'name-desc') return b.dataset.name.localeCompare(a.dataset.name);
            if (val === 'price-asc') return +a.dataset.price - +b.dataset.price;
            if (val === 'price-desc') return +b.dataset.price - +a.dataset.price;
            return 0;
        });
        cards.forEach(c => grid.appendChild(c));
    }

    // ── VIEW TOGGLE ──
    function setView(view) {
        currentView = view;
        document.getElementById('gridView').classList.toggle('hidden', view !== 'grid');
        document.getElementById('listView').classList.toggle('hidden', view !== 'list');
        document.getElementById('gridBtn').classList.toggle('active', view === 'grid');
        document.getElementById('listBtn').classList.toggle('active', view === 'list');

        if (view === 'list') buildListView();
    }

    function buildListView() {
        const cards = document.querySelectorAll('.item-card');
        const list = document.getElementById('listView');
        list.innerHTML = '';
        cards.forEach(card => {
            if (card.style.display === 'none') return;
            const name = card.dataset.name;
            const price = card.dataset.price;
            const cat = card.dataset.cat;
            const img = card.querySelector('img')?.src || '';
            const isUnavail = card.querySelector('.text-cred') !== null;
            list.innerHTML += `
        <div class="flex items-center gap-6 px-6 py-4 hover:bg-gold/[.03] transition-colors group">
          <img src="${img}" class="w-16 h-16 object-cover flex-shrink-0 ${isUnavail?'opacity-40':'brightness-75'}"/>
          <div class="flex-1 min-w-0">
            <div class="text-[9px] tracking-[.25em] uppercase text-gold mb-0.5">${cat}</div>
            <div class="font-display text-base leading-tight">${name}</div>
          </div>
          <div class="font-display text-lg text-gold flex-shrink-0">${parseInt(price).toLocaleString('fr-FR')} <span class="text-xs text-cream/30">MAD</span></div>
          <div class="flex-shrink-0">
            ${isUnavail
              ? '<span class="text-[9px] tracking-wide uppercase px-3 py-1 border border-cred/25 text-cred">Indisponible</span>'
              : '<span class="text-[9px] tracking-wide uppercase px-3 py-1 border border-cgreen/25 text-cgreen flex items-center gap-1"><span class="w-1.5 h-1.5 rounded-full bg-cgreen inline-block"></span>Disponible</span>'}
          </div>
          <div class="flex gap-1.5 opacity-0 group-hover:opacity-100 transition-opacity flex-shrink-0">
            <button class="w-8 h-8 border border-gold/20 text-cream/35 hover:border-gold hover:text-gold transition-all text-xs flex items-center justify-center">✏</button>
            <button class="w-8 h-8 border border-cred/20 text-cred/40 hover:border-cred hover:text-cred transition-all text-xs flex items-center justify-center">🗑</button>
          </div>
        </div>`;
        });
    }
</script>
</body>

</html>