  @include('Component.header')

  <section id="menu" class="py-24 px-6 bg-dark">
    <div class="max-w-6xl mx-auto">
      <div class="text-center mb-12">
        <span class="block text-[10px] tracking-[.4em] uppercase text-gold mb-4">Notre Carte</span>
        <h2 class="font-display font-light" style="font-size:clamp(2.2rem,5vw,3.2rem)">Spécialités <em class="italic text-gold">du Chef</em></h2>
      </div>
      <!-- Tabs -->
      <div class="flex justify-center mb-10">
        <div class="inline-flex border border-gold/20 overflow-hidden flex-wrap">
          <button onclick="setTab(this,'all')" class="mt on px-6 py-3 text-[10px] tracking-[.18em] uppercase transition-all text-cream/45 hover:bg-gold/10 hover:text-cream">Tous</button>
          <button onclick="setTab(this,'entrees')" class="mt px-6 py-3 text-[10px] tracking-[.18em] uppercase transition-all text-cream/45 hover:bg-gold/10 hover:text-cream border-l border-gold/15">🥗 Entrées</button>
          <button onclick="setTab(this,'plats')" class="mt px-6 py-3 text-[10px] tracking-[.18em] uppercase transition-all text-cream/45 hover:bg-gold/10 hover:text-cream border-l border-gold/15">🍖 Plats</button>
          <button onclick="setTab(this,'desserts')" class="mt px-6 py-3 text-[10px] tracking-[.18em] uppercase transition-all text-cream/45 hover:bg-gold/10 hover:text-cream border-l border-gold/15">🍮 Desserts</button>
          <button onclick="setTab(this,'boissons')" class="mt px-6 py-3 text-[10px] tracking-[.18em] uppercase transition-all text-cream/45 hover:bg-gold/10 hover:text-cream border-l border-gold/15">🍷 Boissons</button>
        </div>
      </div>

      <!-- Grid -->
      <div id="menuGrid" class="grid sm:grid-cols-2 lg:grid-cols-3 gap-px bg-gold/[.07]">
        @foreach($items as $item)
        <div class="mc relative bg-s1 flex flex-col overflow-hidden group cursor-pointer" data-cat="plats">
          <div class="overflow-hidden h-56 relative">
            <input type="hidden" name="item_id" value="{{$item->id}}">
            <img src="{{ asset('storage/'.$item->image) }}" class="mc-img w-full h-full object-cover brightness-75" alt="" />
            <div class="absolute top-3 left-3"><span class="bg-gold text-dark text-[9px] tracking-[.1em] uppercase px-2.5 py-1 font-semibold">⭐ Signature</span></div>
            <div class="absolute inset-0 bg-gradient-to-t from-dark/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-400 flex items-end p-4"><button type="submit" class="w-full py-2.5 bg-gold text-dark text-[10px] tracking-[.14em] uppercase font-semibold hover:bg-gold-h transition-all border-0 cursor-pointer">+ Ajouter à la commande</button></div>
          </div>
          <div class="p-6 flex flex-col flex-1"><span class="text-[9px] tracking-[.22em] uppercase text-gold mb-1.5">{{$item->category->name}}</span>
            <h3 class="font-display text-xl leading-tight mb-2">{{$item->name}}</h3>
            <p class="text-[11px] text-cream/40 leading-relaxed flex-1 mb-4">{{$item->description}}</p>
            <div class="flex items-center justify-between pt-3 border-t border-gold/[.08]"><span class="font-display text-xl text-gold">{{$item->prix}} <span class="text-sm text-cream/25">MAD</span></span>
              <div class="flex items-center gap-2"><span class="text-[10px] text-cream/25">⏱ {{$item->temp_prepa}}</span><span class="text-[9px] px-2 py-0.5 border border-gold/20 text-gold/55">🕌 Halal</span></div>
            </div>
          </div>
          <div class="absolute top-3 right-3 flex gap-1">
            <!-- Edit button -->
            <a href="{{ route('menu.edit', $item->id) }}" class="px-2 py-1 bg-blue-600 text-white text-[10px] rounded hover:bg-blue-700">Edit</a>

            <!-- Delete button -->
            <form action="{{ route('menu.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?');">
              @csrf
              @method('DELETE')
              <button type="submit" class="px-2 py-1 bg-red-600 text-white text-[10px] rounded hover:bg-red-700">Delete</button>
            </form>

            <!-- Toggle visibility -->
            <form action="{{ route('menu.toggle', $item->id) }}" method="POST">
              @csrf
              <button type="submit" class="px-2 py-1 bg-yellow-500 text-dark text-[10px] rounded hover:bg-yellow-600">
                {{ $item->status === 'active' ? 'Hide' : 'Show' }}
              </button>
            </form>
          </div>
        </div>
        @endforeach

      </div>
      <div class="text-center mt-10"><a href="#" class="inline-block px-10 py-4 border border-cream/20 text-cream text-[11px] tracking-[.18em] uppercase hover:border-gold hover:text-gold transition-all no-underline">Voir la carte complète</a></div>
    </div>
  </section>