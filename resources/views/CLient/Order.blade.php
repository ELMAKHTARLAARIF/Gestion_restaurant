  <div id="drawerBg" class="hidden fixed inset-0 bg-black/65 backdrop-blur-sm z-[80]" onclick="closeDrawer()"></div>
  <div id="orderDrawer" class="drawer fixed top-0 right-0 h-full w-full sm:w-[400px] bg-s1 border-l border-gold/[.12] z-[90] flex flex-col shadow-2xl">
    <div class="flex items-center justify-between px-6 py-5 border-b border-gold/[.1]">
      <div><span class="block text-[9px] tracking-[.3em] uppercase text-gold mb-0.5">Passer commande</span>
        <h3 class="font-display text-xl font-light">Ma <em class="italic text-gold">commande</em></h3>
      </div>
      <button onclick="closeDrawer()" class="w-8 h-8 border border-gold/20 flex items-center justify-center text-cream/30 hover:text-gold hover:border-gold transition-all text-sm bg-transparent cursor-pointer">✕</button>
    </div>
    <!-- Table select -->
    <div class="px-6 py-4 border-b border-gold/[.06] bg-s2">
      <label class="block text-[9px] tracking-[.22em] uppercase text-cream/30 mb-2">Numéro de table</label>
      <select class="fld w-full bg-s1 border border-gold/[.12] px-4 py-2.5 text-[12px] text-cream font-body cursor-pointer">
        <option class="bg-s1">Table 1</option>
        <option class="bg-s1">Table 2</option>
        <option class="bg-s1">Table 3</option>
        <option class="bg-s1">Table 4</option>
        <option class="bg-s1" selected>Table 12</option>
        <option class="bg-s1">Table 22</option>
      </select>
    </div>
    <!-- Items -->
    <div class="flex-1 overflow-y-auto px-6 py-4">
      <div id="emptyCart" class="flex flex-col items-center justify-center h-full text-center py-16">
        <div class="text-4xl mb-4 opacity-15">🍽</div>
        <div class="font-display text-lg text-cream/15 mb-1">Votre commande est vide</div>
        <div class="text-[11px] text-cream/10">Ajoutez des plats depuis la carte</div>
      </div>
      <div id="cartList" class="hidden divide-y divide-gold/[.05]"></div>
    </div>
    <!-- Total -->
    <div id="cartFooter" class="hidden border-t border-gold/[.1] px-6 py-5 bg-s2">
      <div class="flex justify-between mb-1"><span class="text-[11px] text-cream/35">Sous-total</span><span id="sub" class="text-[13px]">0 MAD</span></div>
      <div class="flex justify-between mb-4"><span class="text-[11px] text-cream/35">Service (10%)</span><span id="svc" class="text-[13px]">0 MAD</span></div>
      <div class="flex justify-between items-center py-3 border-t border-gold/[.1] mb-4">
        <span class="text-[11px] tracking-[.15em] uppercase text-gold">Total</span>
        <span id="tot" class="font-display text-xl text-gold">0 MAD</span>
      </div>
      <button onclick="placeOrder()" class="w-full py-4 bg-gold text-dark text-[11px] tracking-[.18em] uppercase font-semibold hover:bg-gold-h transition-all border-0 cursor-pointer">Passer la commande</button>
    </div>
  </div>