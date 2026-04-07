  <section id="contact" class="py-24 px-6 bg-dark">
    <div class="max-w-5xl mx-auto grid md:grid-cols-2 gap-16">
      <div>
        <span class="block text-[10px] tracking-[.4em] uppercase text-gold mb-4">Nous trouver</span>
        <h2 class="font-display font-light mb-8" style="font-size:clamp(2rem,4vw,2.8rem)">Venez nous <em class="italic text-gold">rendre visite</em></h2>
        <div class="space-y-5">
          <div class="flex items-start gap-4">
            <div class="w-8 h-8 border border-gold/20 flex items-center justify-center text-gold flex-shrink-0 text-sm">📍</div>
            <div>
              <div class="text-[10px] tracking-[.2em] uppercase text-gold mb-1">Adresse</div>
              <div class="text-[13px] text-cream/50 leading-loose">15 Avenue des Arts<br>Casablanca 20000, Maroc</div>
            </div>
          </div>
          <div class="flex items-start gap-4">
            <div class="w-8 h-8 border border-gold/20 flex items-center justify-center text-gold flex-shrink-0 text-sm">⏰</div>
            <div>
              <div class="text-[10px] tracking-[.2em] uppercase text-gold mb-1">Horaires</div>
              <div class="text-[13px] text-cream/50 leading-loose">Mar–Ven : 12h–15h · 19h–23h<br>Sam : 12h–23h · Dim–Lun : Fermé</div>
            </div>
          </div>
          <div class="flex items-start gap-4">
            <div class="w-8 h-8 border border-gold/20 flex items-center justify-center text-gold flex-shrink-0 text-sm">📞</div>
            <div>
              <div class="text-[10px] tracking-[.2em] uppercase text-gold mb-1">Téléphone</div>
              <div class="text-[13px] text-cream/50">+212 522 000 000</div>
            </div>
          </div>
          <div class="flex items-start gap-4">
            <div class="w-8 h-8 border border-gold/20 flex items-center justify-center text-gold flex-shrink-0 text-sm">✉</div>
            <div>
              <div class="text-[10px] tracking-[.2em] uppercase text-gold mb-1">Email</div>
              <div class="text-[13px] text-cream/50">contact@lamaison.ma</div>
            </div>
          </div>
        </div>
      </div>
      <div>
        <span class="block text-[10px] tracking-[.4em] uppercase text-gold mb-4">Message</span>
        <h2 class="font-display font-light mb-8" style="font-size:clamp(2rem,4vw,2.8rem)">Écrivez-<em class="italic text-gold">nous</em></h2>
        <div class="flex flex-col gap-3">
          <form action="{{ route('contact') }}" method="POST">
            @csrf
            <input type="text" placeholder="Votre nom" name="name" class="fld bg-s1 border border-gold/[.12] px-5 py-3.5 text-[13px] text-cream placeholder-cream/20 font-body transition-colors" />
            <input type="email" placeholder="Votre email" name="email" class="fld bg-s1 border border-gold/[.12] px-5 py-3.5 text-[13px] text-cream placeholder-cream/20 font-body transition-colors" />
            <textarea rows="4" placeholder="Votre message…" name="message" class="fld bg-s1 border border-gold/[.12] px-5 py-3.5 text-[13px] text-cream placeholder-cream/20 font-body resize-none transition-colors"></textarea>
            <button type="submit" class="py-4 bg-gold text-dark text-[11px] tracking-[.18em] uppercase font-semibold hover:bg-gold-h transition-all border-0 cursor-pointer">Envoyer le message</button>
          </form>
        </div>
      </div>
    </div>
  </section>