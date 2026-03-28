  <div id="resModal" class="hidden fixed inset-0 z-[100] flex items-center justify-center px-4">
    <div class="absolute inset-0 bg-black/85 backdrop-blur-sm" onclick="closeRes()"></div>
    <div class="relative bg-s1 border border-gold/20 w-full max-w-lg shadow-2xl" style="animation:fadeUp .3s ease">
      <div class="flex items-center justify-between px-8 py-5 border-b border-gold/[.1]">
        <div><span class="block text-[9px] tracking-[.35em] uppercase text-gold mb-0.5">La Maison</span>
          <h3 class="font-display text-2xl font-light">Réserver une <em class="italic text-gold">table</em></h3>
        </div>
        <button onclick="closeRes()" class="w-8 h-8 border border-gold/20 flex items-center justify-center text-cream/30 hover:text-gold hover:border-gold transition-all text-sm bg-transparent cursor-pointer">✕</button>
      </div>
      <div class="p-8 flex flex-col gap-4">
        <form action="{{route('reservation')}}" method="POST">
          @csrf
          <div class="grid grid-cols-2 gap-4">
            <div><label class="block text-[9px] tracking-[.2em] uppercase text-cream/30 mb-2">Prénom *</label><input name="name" type="text" placeholder="Ahmed" class="fld w-full bg-s2 border border-gold/[.12] px-4 py-3 text-[13px] text-cream placeholder-cream/20 font-body transition-colors" /></div>
            <div><label class="block text-[9px] tracking-[.2em] uppercase text-cream/30 mb-2">Nom *</label><input name="lastName" type="text" placeholder="Benali" class="fld w-full bg-s2 border border-gold/[.12] px-4 py-3 text-[13px] text-cream placeholder-cream/20 font-body transition-colors" /></div>
          </div>
          <div><label class="block text-[9px] tracking-[.2em] uppercase text-cream/30 mb-2">Téléphone *</label><input name="telephone" type="tel" placeholder="+212 6XX XXX XXX" class="fld w-full bg-s2 border border-gold/[.12] px-4 py-3 text-[13px] text-cream placeholder-cream/20 font-body transition-colors" /></div>
          <div class="grid grid-cols-2 gap-4">
            <div><label class="block text-[9px] tracking-[.2em] uppercase text-cream/30 mb-2">Date *</label><input name="reservationDate" type="date" class="fld w-full bg-s2 border border-gold/[.12] px-4 py-3 text-[13px] text-cream font-body transition-colors" /></div>
            <div><label class="block text-[9px] tracking-[.2em] uppercase text-cream/30 mb-2">Heure *</label>
              <select name="Hour" class="fld w-full bg-s2 border border-gold/[.12] px-4 py-3 text-[13px] text-cream font-body cursor-pointer">
                <option class="bg-s2">19:00</option>
                <option class="bg-s2">19:30</option>
                <option class="bg-s2">20:00</option>
                <option class="bg-s2">20:30</option>
                <option class="bg-s2">21:00</option>
              </select>
            </div>
          </div>
          <div><label class="block text-[9px] tracking-[.2em] uppercase text-cream/30 mb-2">Personnes *</label>
            <select name="numberOfPeaple" class="fld w-full bg-s2 border border-gold/[.12] px-4 py-3 text-[13px] text-cream font-body cursor-pointer">
              <option class="bg-s2">1 personne</option>
              <option class="bg-s2" selected>2 personnes</option>
              <option class="bg-s2">3 personnes</option>
              <option class="bg-s2">4 personnes</option>
              <option class="bg-s2">5 personnes</option>
              <option class="bg-s2">6 personnes</option>
              <option class="bg-s2">7 personnes</option>
              <option class="bg-s2">8 personnes</option>

            </select>
          </div>
          <div><label class="block text-[9px] tracking-[.2em] uppercase text-cream/30 mb-2">Numero du Table *</label>
            <select name="tableNumber" class="fld w-full bg-s2 border border-gold/[.12] px-4 py-3 text-[13px] text-cream font-body cursor-pointer">
              <option class="bg-s2">1 </option>
              <option class="bg-s2" selected>2 </option>
              <option class="bg-s2">3 </option>
              <option class="bg-s2">4 </option>
              <option class="bg-s2">5 </option>
              <option class="bg-s2">6</option>
              <option class="bg-s2">7</option>
              <option class="bg-s2">8</option>
              <option class="bg-s2">9</option>
              <option class="bg-s2">10</option>

            </select>
          </div>
          <button class="w-full py-4 bg-gold text-dark text-[11px] tracking-[.18em] uppercase font-semibold hover:bg-gold-h transition-all border-0 cursor-pointer">Confirmer la réservation</button>
          <p class="text-[10px] text-cream/20 text-center">Confirmation par email · Annulation gratuite 24h avant</p>
        </form>
      </div>
    </div>
  </div>