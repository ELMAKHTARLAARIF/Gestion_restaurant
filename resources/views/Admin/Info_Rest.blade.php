
<!-- ═══════════════════════════════════
     MAIN
═══════════════════════════════════ -->
@include('Component.header')

  <!-- CONTENT -->
  <div class="flex-1 overflow-y-auto bg-dark">
    <div class="max-w-[1300px] mx-auto p-8 flex flex-col gap-7">

      <!-- ── SECTION TABS ── -->
      <div class="flex items-center gap-0 border-b border-gold/[.1] animate-fu">
        <button onclick="showSection('general',this)"  class="sec-tab on text-[11px] tracking-[.15em] uppercase px-5 py-3 border-b-2 border-transparent text-cream/40 hover:text-cream transition-all bg-transparent cursor-pointer whitespace-nowrap">Informations générales</button>
        <button onclick="showSection('hours',this)"    class="sec-tab text-[11px] tracking-[.15em] uppercase px-5 py-3 border-b-2 border-transparent text-cream/40 hover:text-cream transition-all bg-transparent cursor-pointer whitespace-nowrap">Horaires</button>
        <button onclick="showSection('social',this)"   class="sec-tab text-[11px] tracking-[.15em] uppercase px-5 py-3 border-b-2 border-transparent text-cream/40 hover:text-cream transition-all bg-transparent cursor-pointer whitespace-nowrap">Réseaux sociaux</button>
        <button onclick="showSection('images',this)"   class="sec-tab text-[11px] tracking-[.15em] uppercase px-5 py-3 border-b-2 border-transparent text-cream/40 hover:text-cream transition-all bg-transparent cursor-pointer whitespace-nowrap">Galerie d'images</button>
        <button onclick="showSection('preview',this)"  class="sec-tab text-[11px] tracking-[.15em] uppercase px-5 py-3 border-b-2 border-transparent text-cream/40 hover:text-cream transition-all bg-transparent cursor-pointer whitespace-nowrap">Aperçu public</button>
      </div>


      <!-- ══════════════════════════════
           SECTION 1: GENERAL INFO
      ══════════════════════════════ -->
      <div id="sec-general" class="flex flex-col gap-6 animate-fu2">

        <div class="grid lg:grid-cols-[280px_1fr] gap-6">

          <!-- Logo + Brand card -->
          <div class="flex flex-col gap-4">
            <!-- Logo upload -->
            <div class="bg-s1 border border-gold/[.1]">
              <div class="px-5 py-4 border-b border-gold/[.08]">
                <span class="text-[10px] tracking-[.25em] uppercase text-cream/40">Logo du restaurant</span>
                <span class="text-[9px] text-gold/60 ml-2">· restaurant_informations.logo</span>
              </div>
              <div class="p-5 flex flex-col items-center gap-4">
                <!-- Logo preview circle -->
                <div id="logoPreview" class="w-28 h-28 border-2 border-gold/20 bg-s2 flex items-center justify-center relative overflow-hidden group cursor-pointer" onclick="document.getElementById('logoFile').click()">
                  <img id="logoImg" src="" alt="" class="w-full h-full object-cover hidden"/>
                  <div id="logoPlaceholder" class="flex flex-col items-center gap-2">
                    <span class="font-display text-3xl text-gold gtext">LM</span>
                    <span class="text-[9px] tracking-wide text-cream/25">Logo</span>
                  </div>
                  <div class="absolute inset-0 bg-dark/60 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                    <span class="text-[10px] tracking-wide text-gold uppercase">Changer</span>
                  </div>
                </div>
                <input type="file" id="logoFile" class="hidden" accept="image/*" onchange="previewLogo(this)"/>
                <div class="text-center">
                  <button onclick="document.getElementById('logoFile').click()" class="text-[10px] tracking-[.15em] uppercase text-gold hover:text-gh transition-colors bg-transparent border-0 cursor-pointer">Télécharger un logo</button>
                  <div class="text-[9px] text-cream/20 mt-1">PNG, SVG · max 2 MB</div>
                </div>
              </div>
            </div>

            <!-- Status card -->
            <div class="bg-s1 border border-gold/[.1] p-5 flex flex-col gap-3">
              <div class="text-[10px] tracking-[.25em] uppercase text-cream/40 mb-1">Statut du site</div>
              <div class="flex items-center justify-between">
                <div>
                  <div class="text-[12px] text-cream">Site public visible</div>
                  <div class="text-[10px] text-cream/25 mt-0.5">Accessible aux clients</div>
                </div>
                <div id="togPublic" class="tog-track on" onclick="this.classList.toggle('on')"><div class="tog-thumb"></div></div>
              </div>
              <div class="flex items-center justify-between">
                <div>
                  <div class="text-[12px] text-cream">Réservations ouvertes</div>
                  <div class="text-[10px] text-cream/25 mt-0.5">Formulaire actif</div>
                </div>
                <div id="togRes" class="tog-track on" onclick="this.classList.toggle('on')"><div class="tog-thumb"></div></div>
              </div>
              <div class="flex items-center justify-between">
                <div>
                  <div class="text-[12px] text-cream">Commandes en ligne</div>
                  <div class="text-[10px] text-cream/25 mt-0.5">Panier actif</div>
                </div>
                <div id="togOrder" class="tog-track" onclick="this.classList.toggle('on')"><div class="tog-thumb"></div></div>
              </div>
            </div>
          </div>

          <!-- Main info form -->
          <div class="bg-s1 border border-gold/[.1]">
            <div class="px-6 py-4 border-b border-gold/[.08]">
              <span class="text-[10px] tracking-[.25em] uppercase text-cream/40">Coordonnées principales</span>
              <span class="text-[9px] text-gold/50 ml-2">· restaurant_informations</span>
            </div>
            <div class="p-6 grid md:grid-cols-2 gap-5">

              <!-- name -->
              <div class="md:col-span-2">
                <label class="flex items-center justify-between mb-1.5">
                  <span class="text-[9px] tracking-[.22em] uppercase text-cream/30">Nom du restaurant *</span>
                  <span class="text-[9px] text-gold/50 font-mono">name</span>
                </label>
                <input id="f-name" type="text" value="La Maison" oninput="markUnsaved()" placeholder="Nom du restaurant"
                  class="inp w-full bg-s2 border border-gold/[.1] px-4 py-3 text-[13px] text-cream placeholder-cream/20 font-body transition-all"/>
              </div>

              <!-- address -->
              <div class="md:col-span-2">
                <label class="flex items-center justify-between mb-1.5">
                  <span class="text-[9px] tracking-[.22em] uppercase text-cream/30">Adresse *</span>
                  <span class="text-[9px] text-gold/50 font-mono">address</span>
                </label>
                <input id="f-address" type="text" value="15 Avenue des Arts, Casablanca 20000, Maroc" oninput="markUnsaved()"
                  class="inp w-full bg-s2 border border-gold/[.1] px-4 py-3 text-[13px] text-cream placeholder-cream/20 font-body transition-all"/>
              </div>

              <!-- phone -->
              <div>
                <label class="flex items-center justify-between mb-1.5">
                  <span class="text-[9px] tracking-[.22em] uppercase text-cream/30">Téléphone *</span>
                  <span class="text-[9px] text-gold/50 font-mono">phone</span>
                </label>
                <div class="relative">
                  <svg class="absolute left-3.5 top-1/2 -translate-y-1/2 w-3.5 h-3.5 text-cream/25" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                  <input id="f-phone" type="tel" value="+212 522 000 000" oninput="markUnsaved()"
                    class="inp w-full bg-s2 border border-gold/[.1] pl-9 pr-4 py-3 text-[13px] text-cream placeholder-cream/20 font-body transition-all"/>
                </div>
              </div>

              <!-- email -->
              <div>
                <label class="flex items-center justify-between mb-1.5">
                  <span class="text-[9px] tracking-[.22em] uppercase text-cream/30">Email *</span>
                  <span class="text-[9px] text-gold/50 font-mono">email</span>
                </label>
                <div class="relative">
                  <svg class="absolute left-3.5 top-1/2 -translate-y-1/2 w-3.5 h-3.5 text-cream/25" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                  <input id="f-email" type="email" value="contact@lamaison.ma" oninput="markUnsaved()"
                    class="inp w-full bg-s2 border border-gold/[.1] pl-9 pr-4 py-3 text-[13px] text-cream placeholder-cream/20 font-body transition-all"/>
                </div>
              </div>

              <!-- description -->
              <div class="md:col-span-2">
                <label class="flex items-center justify-between mb-1.5">
                  <span class="text-[9px] tracking-[.22em] uppercase text-cream/30">Description</span>
                  <div class="flex items-center gap-3">
                    <span id="descCount" class="text-[9px] text-cream/25">0 / 500</span>
                    <span class="text-[9px] text-gold/50 font-mono">description</span>
                  </div>
                </label>
                <textarea id="f-desc" rows="4" maxlength="500" oninput="countChars(this,'descCount',500);markUnsaved()"
                  class="inp w-full bg-s2 border border-gold/[.1] px-4 py-3 text-[13px] text-cream placeholder-cream/20 font-body resize-none transition-all"
                  placeholder="Description du restaurant visible sur la page d'accueil…">Restaurant gastronomique au cœur de Casablanca, La Maison offre une expérience culinaire d'exception alliant saveurs marocaines et cuisine française raffinée.</textarea>
              </div>

            </div>
          </div>
        </div>

        <!-- SEO & visibility hint -->
        <div class="bg-s1 border border-gold/[.1] px-6 py-4 flex items-center gap-4">
          <div class="w-8 h-8 bg-cb/10 border border-cb/20 flex items-center justify-center shrink-0">
            <svg class="w-4 h-4 text-cb" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
          </div>
          <div class="flex-1">
            <div class="text-[12px] text-cream/60">Ces informations sont utilisées sur la page d'accueil publique et dans les métadonnées SEO du site.</div>
          </div>
          <div class="flex items-center gap-1.5 text-[10px] text-cream/30">
            <div class="w-2 h-2 rounded-full bg-cg animate-pulse2"></div>
            <span>Synchronisé avec le site public</span>
          </div>
        </div>

      </div>


      <!-- ══════════════════════════════
           SECTION 2: HORAIRES
      ══════════════════════════════ -->
      <div id="sec-hours" class="hidden flex-col gap-6 animate-fu2">

        <div class="grid lg:grid-cols-2 gap-6">

          <!-- Opening / Closing hours -->
          <div class="bg-s1 border border-gold/[.1]">
            <div class="px-6 py-4 border-b border-gold/[.08] flex items-center justify-between">
              <span class="text-[10px] tracking-[.25em] uppercase text-cream/40">Horaires globaux</span>
              <div class="flex items-center gap-2 text-[9px] text-gold/50">
                <span class="font-mono">opening_hours</span> / <span class="font-mono">closing_hours</span>
              </div>
            </div>
            <div class="p-6 flex flex-col gap-5">

              <div class="grid grid-cols-2 gap-4">
                <div>
                  <label class="block text-[9px] tracking-[.22em] uppercase text-cream/30 mb-2">Heure d'ouverture *</label>
                  <div class="relative">
                    <svg class="absolute left-3.5 top-1/2 -translate-y-1/2 w-3.5 h-3.5 text-cream/25" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <input id="f-open" type="time" value="12:00" oninput="markUnsaved()"
                      class="inp w-full bg-s2 border border-gold/[.1] pl-9 pr-4 py-3 text-[13px] text-cream font-body transition-all cursor-pointer"/>
                  </div>
                </div>
                <div>
                  <label class="block text-[9px] tracking-[.22em] uppercase text-cream/30 mb-2">Heure de fermeture *</label>
                  <div class="relative">
                    <svg class="absolute left-3.5 top-1/2 -translate-y-1/2 w-3.5 h-3.5 text-cream/25" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <input id="f-close" type="time" value="23:00" oninput="markUnsaved()"
                      class="inp w-full bg-s2 border border-gold/[.1] pl-9 pr-4 py-3 text-[13px] text-cream font-body transition-all cursor-pointer"/>
                  </div>
                </div>
              </div>

              <!-- Days grid -->
              <div>
                <label class="block text-[9px] tracking-[.22em] uppercase text-cream/30 mb-3">Jours d'ouverture</label>
                <div class="grid grid-cols-7 gap-1.5" id="daysGrid">
                  <!-- Filled by JS -->
                </div>
              </div>

              <!-- Break time -->
              <div class="border-t border-gold/[.07] pt-4">
                <div class="flex items-center justify-between mb-3">
                  <label class="text-[11px] text-cream/50">Coupure (service midi / soir)</label>
                  <div id="togBreak" class="tog-track on" onclick="this.classList.toggle('on');toggleBreak()"><div class="tog-thumb"></div></div>
                </div>
                <div id="breakFields" class="grid grid-cols-2 gap-4">
                  <div>
                    <label class="block text-[9px] tracking-[.2em] uppercase text-cream/30 mb-1.5">Fermeture midi</label>
                    <input type="time" value="15:00" oninput="markUnsaved()" class="inp w-full bg-s2 border border-gold/[.1] px-4 py-2.5 text-[12px] text-cream font-body cursor-pointer"/>
                  </div>
                  <div>
                    <label class="block text-[9px] tracking-[.2em] uppercase text-cream/30 mb-1.5">Réouverture soir</label>
                    <input type="time" value="19:00" oninput="markUnsaved()" class="inp w-full bg-s2 border border-gold/[.1] px-4 py-2.5 text-[12px] text-cream font-body cursor-pointer"/>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Detailed schedule per day -->
          <div class="bg-s1 border border-gold/[.1]">
            <div class="px-6 py-4 border-b border-gold/[.08] flex items-center justify-between">
              <span class="text-[10px] tracking-[.25em] uppercase text-cream/40">Détail par jour</span>
              <button onclick="applyToAll()" class="text-[10px] tracking-[.12em] uppercase text-gold/70 hover:text-gold transition-colors bg-transparent border-0 cursor-pointer">Appliquer à tous</button>
            </div>
            <div class="divide-y divide-gold/[.05]" id="scheduleList">
              <!-- Filled by JS -->
            </div>
          </div>
        </div>

        <!-- Special closings -->
        <div class="bg-s1 border border-gold/[.1]">
          <div class="px-6 py-4 border-b border-gold/[.08] flex items-center justify-between">
            <span class="text-[10px] tracking-[.25em] uppercase text-cream/40">Fermetures exceptionnelles</span>
            <button onclick="addClosure()" class="flex items-center gap-1.5 text-[10px] tracking-[.12em] uppercase text-gold/70 hover:text-gold transition-colors bg-transparent border-0 cursor-pointer">
              <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>Ajouter
            </button>
          </div>
          <div class="p-5" id="closuresList">
            <div class="grid sm:grid-cols-3 gap-3 mb-3">
              <div><label class="block text-[9px] tracking-[.2em] uppercase text-cream/25 mb-1.5">Date</label><input type="date" oninput="markUnsaved()" class="inp w-full bg-s2 border border-gold/[.1] px-3 py-2.5 text-[12px] text-cream font-body cursor-pointer"/></div>
              <div><label class="block text-[9px] tracking-[.2em] uppercase text-cream/25 mb-1.5">Motif</label><input type="text" placeholder="Ex: Jour férié" oninput="markUnsaved()" class="inp w-full bg-s2 border border-gold/[.1] px-3 py-2.5 text-[12px] text-cream placeholder-cream/20 font-body"/></div>
              <div class="flex items-end"><button class="w-full py-2.5 border border-cr/25 text-cr/60 text-[10px] tracking-[.12em] uppercase hover:bg-cr/10 transition-all bg-transparent cursor-pointer">Supprimer</button></div>
            </div>
          </div>
        </div>

      </div>


      <!-- ══════════════════════════════
           SECTION 3: SOCIAL MEDIA
      ══════════════════════════════ -->
      <div id="sec-social" class="hidden flex-col gap-6 animate-fu2">

        <div class="grid lg:grid-cols-2 gap-6">

          <!-- Social links -->
          <div class="bg-s1 border border-gold/[.1]">
            <div class="px-6 py-4 border-b border-gold/[.08] flex items-center justify-between">
              <span class="text-[10px] tracking-[.25em] uppercase text-cream/40">Liens réseaux sociaux</span>
              <span class="text-[9px] text-gold/50 font-mono">social_media_links</span>
            </div>
            <div class="p-6 flex flex-col gap-4">

              <!-- Each social network -->
              <div class="grid grid-cols-[32px_1fr_auto] items-center gap-3">
                <div class="w-8 h-8 bg-[#1877F2]/15 border border-[#1877F2]/25 flex items-center justify-center text-[11px] text-[#1877F2]">f</div>
                <input id="f-fb" type="url" value="https://facebook.com/lamaison" oninput="markUnsaved()" placeholder="https://facebook.com/…"
                  class="inp w-full bg-s2 border border-gold/[.1] px-4 py-3 text-[12px] text-cream placeholder-cream/20 font-body transition-all"/>
                <button onclick="openSocial('f-fb')" class="w-9 h-9 border border-gold/[.12] flex items-center justify-center text-cream/30 hover:border-gold hover:text-gold transition-all bg-transparent cursor-pointer shrink-0">
                  <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                </button>
              </div>

              <div class="grid grid-cols-[32px_1fr_auto] items-center gap-3">
                <div class="w-8 h-8 bg-gradient-to-br from-[#833AB4]/20 to-[#E1306C]/20 border border-[#E1306C]/20 flex items-center justify-center text-[11px] text-[#E1306C]">ig</div>
                <input id="f-ig" type="url" value="https://instagram.com/lamaison.ma" oninput="markUnsaved()" placeholder="https://instagram.com/…"
                  class="inp w-full bg-s2 border border-gold/[.1] px-4 py-3 text-[12px] text-cream placeholder-cream/20 font-body transition-all"/>
                <button onclick="openSocial('f-ig')" class="w-9 h-9 border border-gold/[.12] flex items-center justify-center text-cream/30 hover:border-gold hover:text-gold transition-all bg-transparent cursor-pointer shrink-0">
                  <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                </button>
              </div>

              <div class="grid grid-cols-[32px_1fr_auto] items-center gap-3">
                <div class="w-8 h-8 bg-[#00B900]/15 border border-[#00B900]/20 flex items-center justify-center text-[11px] text-[#00B900]">wa</div>
                <input id="f-wa" type="tel" value="+212 522 000 000" oninput="markUnsaved()" placeholder="+212 6XX XXX XXX"
                  class="inp w-full bg-s2 border border-gold/[.1] px-4 py-3 text-[12px] text-cream placeholder-cream/20 font-body transition-all"/>
                <button class="w-9 h-9 border border-gold/[.12] flex items-center justify-center text-cream/30 hover:border-gold hover:text-gold transition-all bg-transparent cursor-pointer shrink-0">
                  <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                </button>
              </div>

              <div class="grid grid-cols-[32px_1fr_auto] items-center gap-3">
                <div class="w-8 h-8 bg-[#FF4500]/15 border border-[#FF4500]/20 flex items-center justify-center text-[10px] text-[#FF4500]">TA</div>
                <input id="f-ta" type="url" value="" oninput="markUnsaved()" placeholder="https://tripadvisor.com/…"
                  class="inp w-full bg-s2 border border-gold/[.1] px-4 py-3 text-[12px] text-cream placeholder-cream/20 font-body transition-all"/>
                <button onclick="openSocial('f-ta')" class="w-9 h-9 border border-gold/[.12] flex items-center justify-center text-cream/30 hover:border-gold hover:text-gold transition-all bg-transparent cursor-pointer shrink-0">
                  <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                </button>
              </div>

              <div class="grid grid-cols-[32px_1fr_auto] items-center gap-3">
                <div class="w-8 h-8 bg-[#4285F4]/15 border border-[#4285F4]/20 flex items-center justify-center text-[10px] text-[#4285F4]">G</div>
                <input id="f-gm" type="url" value="" oninput="markUnsaved()" placeholder="Lien Google Maps…"
                  class="inp w-full bg-s2 border border-gold/[.1] px-4 py-3 text-[12px] text-cream placeholder-cream/20 font-body transition-all"/>
                <button onclick="openSocial('f-gm')" class="w-9 h-9 border border-gold/[.12] flex items-center justify-center text-cream/30 hover:border-gold hover:text-gold transition-all bg-transparent cursor-pointer shrink-0">
                  <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                </button>
              </div>

            </div>
          </div>

          <!-- Social preview card + stats -->
          <div class="flex flex-col gap-4">
            <!-- Preview card -->
            <div class="bg-s1 border border-gold/[.1]">
              <div class="px-5 py-4 border-b border-gold/[.08]">
                <span class="text-[10px] tracking-[.25em] uppercase text-cream/40">Aperçu partage</span>
              </div>
              <div class="p-5">
                <div class="bg-s2 border border-gold/[.08] overflow-hidden">
                  <div class="h-24 bg-gradient-to-r from-s3 to-s2 flex items-center justify-center">
                    <span class="font-display text-3xl gtext">La Maison</span>
                  </div>
                  <div class="p-3">
                    <div class="text-[12px] text-cream mb-0.5" id="ogTitle">La Maison · Restaurant Gastronomique</div>
                    <div class="text-[10px] text-cream/35 mb-1">lamaison.ma</div>
                    <div class="text-[10px] text-cream/45 leading-relaxed line-clamp-2" id="ogDesc">Restaurant gastronomique au cœur de Casablanca, La Maison offre une expérience culinaire d'exception…</div>
                  </div>
                </div>
                <p class="text-[10px] text-cream/20 mt-3 text-center">Aperçu lors du partage sur les réseaux sociaux</p>
              </div>
            </div>

            <!-- Social links active count -->
            <div class="bg-s1 border border-gold/[.1] p-5">
              <div class="text-[10px] tracking-[.25em] uppercase text-cream/40 mb-4">Liens actifs</div>
              <div class="grid grid-cols-2 gap-3">
                <div class="bg-s2 border border-gold/[.07] px-4 py-3 flex items-center justify-between">
                  <span class="text-[11px] text-cream/50">Configurés</span>
                  <span class="font-display text-xl text-gold">3</span>
                </div>
                <div class="bg-s2 border border-gold/[.07] px-4 py-3 flex items-center justify-between">
                  <span class="text-[11px] text-cream/50">Manquants</span>
                  <span class="font-display text-xl text-cr">2</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


      <!-- ══════════════════════════════
           SECTION 4: IMAGES GALLERY
      ══════════════════════════════ -->
      <div id="sec-images" class="hidden flex-col gap-6 animate-fu2">

        <!-- Upload zone -->
        <div class="bg-s1 border border-gold/[.1]">
          <div class="px-6 py-4 border-b border-gold/[.08] flex items-center justify-between">
            <div>
              <span class="text-[10px] tracking-[.25em] uppercase text-cream/40">Galerie d'images</span>
              <span class="text-[9px] text-gold/50 ml-2">· restaurant_images</span>
            </div>
            <div class="flex items-center gap-2 text-[10px] text-cream/25">
              <span id="imgCount">0</span> / 20 images
            </div>
          </div>
          <!-- Drop zone -->
          <div class="p-6">
            <div id="dropZone"
              class="border border-dashed border-gold/[.2] p-10 text-center cursor-pointer hover:border-gold/50 hover:bg-gd transition-all"
              onclick="document.getElementById('imgFiles').click()"
              ondragover="event.preventDefault();this.classList.add('drag-active')"
              ondragleave="this.classList.remove('drag-active')"
              ondrop="handleDrop(event)">
              <div class="flex flex-col items-center gap-3">
                <div class="w-14 h-14 bg-s2 border border-gold/[.12] flex items-center justify-center">
                  <svg class="w-6 h-6 text-cream/25" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                </div>
                <div>
                  <div class="text-[13px] text-cream/50 mb-1">Glissez des images ici ou <span class="text-gold cursor-pointer">cliquez pour parcourir</span></div>
                  <div class="text-[10px] text-cream/25">JPG, PNG, WEBP · max 5 MB par image · min 800×600px recommandé</div>
                </div>
              </div>
              <input type="file" id="imgFiles" class="hidden" multiple accept="image/*" onchange="handleImgFiles(this)"/>
            </div>
          </div>
        </div>

        <!-- Images grid -->
        <div class="bg-s1 border border-gold/[.1]">
          <div class="px-6 py-4 border-b border-gold/[.08] flex items-center justify-between">
            <span class="text-[10px] tracking-[.25em] uppercase text-cream/40">Images enregistrées</span>
            <div class="flex items-center gap-3">
              <select class="inp bg-s2 border border-gold/[.1] px-3 py-1.5 text-[11px] text-cream/45 font-body cursor-pointer">
                <option class="bg-s2">Toutes</option>
                <option class="bg-s2">Avec description</option>
                <option class="bg-s2">Sans alt text</option>
              </select>
            </div>
          </div>
          <div class="p-5">
            <div id="imagesGrid" class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3"></div>
            <div id="noImages" class="text-center py-12">
              <div class="text-4xl mb-3 opacity-10">🖼</div>
              <div class="text-[12px] text-cream/20">Aucune image enregistrée</div>
              <div class="text-[10px] text-cream/15 mt-1">Téléchargez des images ci-dessus</div>
            </div>
          </div>
        </div>

      </div>


      <!-- ══════════════════════════════
           SECTION 5: PREVIEW
      ══════════════════════════════ -->
      <div id="sec-preview" class="hidden flex-col gap-6 animate-fu2">

        <div class="bg-s1 border border-gold/[.1]">
          <div class="px-6 py-4 border-b border-gold/[.08] flex items-center justify-between">
            <span class="text-[10px] tracking-[.25em] uppercase text-cream/40">Aperçu page publique</span>
            <button class="flex items-center gap-1.5 text-[10px] tracking-[.12em] uppercase text-gold/70 hover:text-gold transition-colors bg-transparent border-0 cursor-pointer">
              <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
              Voir le site public
            </button>
          </div>
          <div class="p-6">
            <!-- Mock website preview -->
            <div class="border border-gold/[.1] bg-dark overflow-hidden">
              <!-- Fake browser bar -->
              <div class="bg-s3 px-4 py-2.5 flex items-center gap-3 border-b border-gold/[.07]">
                <div class="flex gap-1.5"><div class="w-2.5 h-2.5 rounded-full bg-cr/40"></div><div class="w-2.5 h-2.5 rounded-full bg-cy/40"></div><div class="w-2.5 h-2.5 rounded-full bg-cg/40"></div></div>
                <div class="flex-1 bg-s2 border border-gold/[.07] rounded-none px-3 py-1 text-[10px] text-cream/30">https://lamaison.ma</div>
              </div>
              <!-- Fake header -->
              <div class="px-8 py-4 flex items-center justify-between border-b border-gold/[.06]">
                <span id="prev-name" class="font-display text-xl text-gold">La Maison</span>
                <div class="flex gap-5 text-[10px] tracking-[.15em] uppercase text-cream/35">
                  <span>Accueil</span><span>Carte</span><span>Galerie</span><span>Contact</span>
                </div>
                <button class="px-4 py-1.5 bg-gold text-dark text-[9px] tracking-[.15em] uppercase font-semibold">Réserver</button>
              </div>
              <!-- Hero mock -->
              <div class="px-8 py-12 flex flex-col items-center text-center border-b border-gold/[.06]" style="background:linear-gradient(135deg,rgba(200,169,110,.04),transparent)">
                <span class="text-[9px] tracking-[.4em] uppercase text-gold mb-3 border border-gold/20 px-4 py-1">Casablanca · Depuis 2010</span>
                <h2 id="prev-title" class="font-display text-4xl font-light mb-4">L'Art de <em class="italic text-gold">Bien Manger</em></h2>
                <p id="prev-desc" class="text-[12px] text-cream/45 max-w-md leading-loose"></p>
              </div>
              <!-- Info row mock -->
              <div class="px-8 py-4 flex flex-wrap justify-center gap-8 bg-gold/5 border-b border-gold/[.06]">
                <div class="flex items-center gap-2"><div class="w-3.5 h-3.5 text-gold text-xs">📍</div><span id="prev-addr" class="text-[10px] text-cream/50"></span></div>
                <div class="flex items-center gap-2"><div class="w-3.5 h-3.5 text-gold text-xs">📞</div><span id="prev-phone" class="text-[10px] text-cream/50"></span></div>
                <div class="flex items-center gap-2"><div class="w-3.5 h-3.5 text-gold text-xs">✉</div><span id="prev-email" class="text-[10px] text-cream/50"></span></div>
                <div class="flex items-center gap-2"><div class="w-3.5 h-3.5 text-gold text-xs">⏰</div><span id="prev-hours" class="text-[10px] text-cream/50"></span></div>
              </div>
              <div class="px-8 py-3 text-center text-[10px] text-cream/15">© 2025 <span id="prev-copy">La Maison</span>. Tous droits réservés.</div>
            </div>
          </div>
        </div>

      </div>

    </div><!-- end max-w container -->
  </div><!-- end content scroll -->
</div><!-- end main -->


<!-- ═══════════════════════════════════
     IMAGE DETAIL MODAL
═══════════════════════════════════ -->
<div id="imgModal" class="hidden fixed inset-0 z-[100] flex items-center justify-center px-4">
  <div class="modal-bg absolute inset-0" onclick="closeImgModal()"></div>
  <div class="relative bg-s1 border border-gold/[.18] w-full max-w-md shadow-2xl animate-scale-in">
    <div class="flex items-center justify-between px-6 py-5 border-b border-gold/[.1]">
      <div><span class="block text-[9px] tracking-[.35em] uppercase text-gold mb-0.5">restaurant_images</span><h3 class="font-display text-xl font-light">Détails de <em class="italic text-gold">l'image</em></h3></div>
      <button onclick="closeImgModal()" class="w-8 h-8 border border-gold/20 flex items-center justify-center text-cream/30 hover:text-gold hover:border-gold transition-all bg-transparent cursor-pointer">✕</button>
    </div>
    <div class="p-6 flex flex-col gap-4">
      <img id="modalImgPreview" src="" alt="" class="w-full h-44 object-cover border border-gold/[.1]"/>
      <div>
        <label class="block text-[9px] tracking-[.2em] uppercase text-cream/30 mb-1.5">Description <span class="text-gold/50 font-mono">description</span></label>
        <input id="modalDesc" type="text" placeholder="Ex: Salle principale du restaurant" class="inp w-full bg-s2 border border-gold/[.1] px-4 py-3 text-[13px] text-cream placeholder-cream/20 font-body transition-all"/>
      </div>
      <div>
        <label class="block text-[9px] tracking-[.2em] uppercase text-cream/30 mb-1.5">Texte alternatif (SEO) <span class="text-gold/50 font-mono">alt_text</span></label>
        <input id="modalAlt" type="text" placeholder="Description pour les moteurs de recherche" class="inp w-full bg-s2 border border-gold/[.1] px-4 py-3 text-[13px] text-cream placeholder-cream/20 font-body transition-all"/>
      </div>
      <div class="flex items-center justify-between bg-s2 border border-gold/[.08] px-4 py-3">
        <div><div class="text-[11px] text-cream/55">Image principale (couverture)</div><div class="text-[9px] text-cream/25 mt-0.5">Utilisée sur la page d'accueil</div></div>
        <div id="togCover" class="tog-track" onclick="this.classList.toggle('on')"><div class="tog-thumb"></div></div>
      </div>
      <div class="flex gap-3 pt-1">
        <button id="deleteImgBtn" class="flex-1 py-3 border border-cr/25 text-cr/60 text-[10px] tracking-[.12em] uppercase hover:bg-cr/10 transition-all bg-transparent cursor-pointer">Supprimer</button>
        <button onclick="saveImgMeta()" class="flex-[2] py-3 bg-gold text-dark text-[10px] tracking-[.12em] uppercase font-semibold hover:bg-gh transition-colors border-0 cursor-pointer">Enregistrer</button>
      </div>
    </div>
  </div>
</div>

<!-- TOAST -->
<div id="toast" class="hidden fixed bottom-6 right-6 z-[200] bg-s2 border px-5 py-3.5 flex items-center gap-3 shadow-2xl animate-slide-up">
  <span id="tIcon" class="text-lg">✓</span>
  <div><div id="tTitle" class="text-[13px] text-cream"></div><div id="tSub" class="text-[10px] text-cream/35 mt-0.5"></div></div>
</div>

<script>
  // ── DATE ──
  document.getElementById('topDate').textContent = new Date().toLocaleDateString('fr-FR',{weekday:'long',day:'numeric',month:'long'});

  // ── SIDEBAR ──
  let sbOpen=true;
  function toggleSB(){
    sbOpen=!sbOpen;
    document.getElementById('sb').classList.toggle('cx',!sbOpen);
    document.getElementById('cbtn').textContent=sbOpen?'◀':'▶';
  }

  // ── SECTION TABS ──
  function showSection(id,btn){
    ['general','hours','social','images','preview'].forEach(s=>{
      const el=document.getElementById('sec-'+s);
      el.classList.add('hidden'); el.classList.remove('flex');
    });
    const target=document.getElementById('sec-'+id);
    target.classList.remove('hidden'); target.classList.add('flex');
    document.querySelectorAll('.sec-tab').forEach(b=>b.classList.remove('on'));
    btn.classList.add('on');
    if(id==='preview') updatePreview();
  }

  // ── UNSAVED STATE ──
  let unsaved=false;
  function markUnsaved(){
    if(!unsaved){
      unsaved=true;
      document.getElementById('unsavedIndicator').classList.remove('hidden');
      document.getElementById('unsavedIndicator').classList.add('flex');
    }
  }
  function clearUnsaved(){
    unsaved=false;
    document.getElementById('unsavedIndicator').classList.add('hidden');
    document.getElementById('unsavedIndicator').classList.remove('flex');
  }

  // ── CHAR COUNTER ──
  function countChars(el,countId,max){
    const len=el.value.length;
    const el2=document.getElementById(countId);
    el2.textContent=`${len} / ${max}`;
    el2.classList.toggle('char-warn',len>max*0.9);
  }
  // Init desc count
  window.addEventListener('DOMContentLoaded',()=>{
    const d=document.getElementById('f-desc');
    if(d)countChars(d,'descCount',500);
  });

  // ── LOGO PREVIEW ──
  function previewLogo(input){
    if(!input.files||!input.files[0])return;
    const r=new FileReader();
    r.onload=e=>{
      document.getElementById('logoImg').src=e.target.result;
      document.getElementById('logoImg').classList.remove('hidden');
      document.getElementById('logoPlaceholder').classList.add('hidden');
    };
    r.readAsDataURL(input.files[0]);
    markUnsaved();
  }

  // ── DAYS GRID ──
  const DAYS=[{s:'L',f:'Lundi'},{s:'M',f:'Mardi'},{s:'M',f:'Mercredi'},{s:'J',f:'Jeudi'},{s:'V',f:'Vendredi'},{s:'S',f:'Samedi'},{s:'D',f:'Dimanche'}];
  const activeDays=[true,true,true,true,true,true,false]; // Closed Sunday

  function buildDaysGrid(){
    const g=document.getElementById('daysGrid');
    g.innerHTML=DAYS.map((d,i)=>`
      <div class="day-btn flex flex-col items-center gap-1 cursor-pointer" onclick="toggleDay(${i},this)">
        <div class="w-9 h-9 border flex items-center justify-center text-[11px] transition-all ${activeDays[i]?'border-gold bg-gd text-gold':'border-gold/[.12] text-cream/30'}">${d.s}</div>
        <span class="text-[8px] ${activeDays[i]?'text-gold/60':'text-cream/20'}">${d.f.slice(0,3)}</span>
      </div>`).join('');
  }
  function toggleDay(i,el){
    activeDays[i]=!activeDays[i];
    buildDaysGrid();
    buildSchedule();
    markUnsaved();
  }

  // ── SCHEDULE LIST ──
  function buildSchedule(){
    const sl=document.getElementById('scheduleList');
    sl.innerHTML=DAYS.map((d,i)=>`
      <div class="flex items-center gap-4 px-6 py-3.5 ${activeDays[i]?'':'opacity-40'}">
        <div class="w-20 shrink-0 text-[12px] ${activeDays[i]?'text-cream':'text-cream/30'}">${d.f}</div>
        ${activeDays[i]?`
          <input type="time" value="12:00" oninput="markUnsaved()" class="inp bg-s2 border border-gold/[.1] px-3 py-1.5 text-[12px] text-cream font-body w-28 cursor-pointer"/>
          <span class="text-cream/25 text-sm">→</span>
          <input type="time" value="23:00" oninput="markUnsaved()" class="inp bg-s2 border border-gold/[.1] px-3 py-1.5 text-[12px] text-cream font-body w-28 cursor-pointer"/>
        `:`<span class="text-[11px] text-cr/60 border border-cr/20 px-3 py-1">Fermé</span>`}
        <div class="flex-1"></div>
        <div class="tog-track ${activeDays[i]?'on':''} shrink-0" onclick="toggleDayFromSchedule(${i},this)"><div class="tog-thumb"></div></div>
      </div>`).join('');
  }
  function toggleDayFromSchedule(i,tog){
    activeDays[i]=!activeDays[i];
    tog.classList.toggle('on',activeDays[i]);
    buildDaysGrid();
    buildSchedule();
    markUnsaved();
  }
  function toggleBreak(){markUnsaved();}
  function applyToAll(){
    const o=document.querySelector('#scheduleList input[type=time]')?.value||'12:00';
    const c=document.querySelectorAll('#scheduleList input[type=time]')[1]?.value||'23:00';
    document.querySelectorAll('#scheduleList input[type=time]').forEach((el,i)=>{el.value=i%2===0?o:c;});
    markUnsaved();
    toast('✓','Horaires appliqués','Les mêmes horaires ont été appliqués à tous les jours actifs.','border-cg/30');
  }

  // ── CLOSURES ──
  function addClosure(){
    const cl=document.getElementById('closuresList');
    const div=document.createElement('div');
    div.className='grid sm:grid-cols-3 gap-3 mb-3 animate-fu';
    div.innerHTML=`
      <div><label class="block text-[9px] tracking-[.2em] uppercase text-cream/25 mb-1.5">Date</label><input type="date" oninput="markUnsaved()" class="inp w-full bg-s2 border border-gold/[.1] px-3 py-2.5 text-[12px] text-cream font-body cursor-pointer"/></div>
      <div><label class="block text-[9px] tracking-[.2em] uppercase text-cream/25 mb-1.5">Motif</label><input type="text" placeholder="Ex: Jour férié" oninput="markUnsaved()" class="inp w-full bg-s2 border border-gold/[.1] px-3 py-2.5 text-[12px] text-cream placeholder-cream/20 font-body"/></div>
      <div class="flex items-end"><button onclick="this.closest('div.grid').remove();markUnsaved()" class="w-full py-2.5 border border-cr/25 text-cr/60 text-[10px] tracking-[.12em] uppercase hover:bg-cr/10 transition-all bg-transparent cursor-pointer">Supprimer</button></div>`;
    cl.appendChild(div);
    markUnsaved();
  }

  // ── IMAGES ──
  let images=[];
  let editImgIdx=null;

  function handleImgFiles(input){
    [...input.files].forEach(file=>addImage(file));
  }
  function handleDrop(e){
    e.preventDefault();
    document.getElementById('dropZone').classList.remove('drag-active');
    [...e.dataTransfer.files].filter(f=>f.type.startsWith('image/')).forEach(f=>addImage(f));
  }
  function addImage(file){
    const r=new FileReader();
    r.onload=ev=>{
      images.push({src:ev.target.result,name:file.name,size:(file.size/1024).toFixed(0)+' KB',desc:'',alt:'',cover:false});
      renderImages();
      markUnsaved();
    };
    r.readAsDataURL(file);
  }

  function renderImages(){
    const grid=document.getElementById('imagesGrid');
    const noImg=document.getElementById('noImages');
    document.getElementById('imgCount').textContent=images.length;
    if(!images.length){grid.innerHTML='';noImg.classList.remove('hidden');return;}
    noImg.classList.add('hidden');
    grid.innerHTML=images.map((img,i)=>`
      <div class="img-card relative bg-s2 border border-gold/[.08] overflow-hidden group cursor-pointer" onclick="openImgModal(${i})">
        <div class="h-36 overflow-hidden relative">
          <img src="${img.src}" alt="${img.alt||img.name}" class="w-full h-full object-cover transition-transform duration-500"/>
          <div class="img-overlay absolute inset-0 bg-dark/60 opacity-0 transition-opacity flex flex-col items-center justify-center gap-2">
            <svg class="w-6 h-6 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
            <span class="text-[10px] tracking-[.15em] uppercase text-ivory">Modifier</span>
          </div>
          ${img.cover?`<span class="absolute top-2 left-2 bg-gold text-dark text-[8px] tracking-wide uppercase px-1.5 py-0.5 font-semibold">Couverture</span>`:''}
        </div>
        <div class="p-2.5">
          <div class="text-[10px] text-cream/50 truncate">${img.desc||img.name}</div>
          <div class="text-[9px] text-cream/25 mt-0.5">${img.size}</div>
        </div>
      </div>`).join('');
  }

  function openImgModal(idx){
    editImgIdx=idx;
    const img=images[idx];
    document.getElementById('modalImgPreview').src=img.src;
    document.getElementById('modalDesc').value=img.desc;
    document.getElementById('modalAlt').value=img.alt;
    const tc=document.getElementById('togCover');
    img.cover?tc.classList.add('on'):tc.classList.remove('on');
    document.getElementById('deleteImgBtn').onclick=()=>{images.splice(idx,1);renderImages();closeImgModal();markUnsaved();toast('🗑','Image supprimée','','border-cr/30');};
    document.getElementById('imgModal').classList.remove('hidden');
  }
  function closeImgModal(){document.getElementById('imgModal').classList.add('hidden');}
  function saveImgMeta(){
    if(editImgIdx===null)return;
    images[editImgIdx].desc=document.getElementById('modalDesc').value;
    images[editImgIdx].alt=document.getElementById('modalAlt').value;
    images[editImgIdx].cover=document.getElementById('togCover').classList.contains('on');
    if(images[editImgIdx].cover) images.forEach((im,i)=>{if(i!==editImgIdx)im.cover=false;});
    renderImages();
    closeImgModal();
    markUnsaved();
    toast('✓','Métadonnées enregistrées','Description et alt text mis à jour.','border-cg/30');
  }

  // ── SOCIAL ──
  function openSocial(id){const url=document.getElementById(id)?.value;if(url)window.open(url,'_blank');}

  // ── PREVIEW ──
  function updatePreview(){
    const name=document.getElementById('f-name')?.value||'';
    const desc=document.getElementById('f-desc')?.value||'';
    const addr=document.getElementById('f-address')?.value||'';
    const phone=document.getElementById('f-phone')?.value||'';
    const email=document.getElementById('f-email')?.value||'';
    const open=document.getElementById('f-open')?.value||'';
    const close=document.getElementById('f-close')?.value||'';
    document.getElementById('prev-name').textContent=name;
    document.getElementById('prev-title').innerHTML=`${name} <em class="italic text-gold">Gastronomique</em>`;
    document.getElementById('prev-desc').textContent=desc;
    document.getElementById('prev-addr').textContent=addr;
    document.getElementById('prev-phone').textContent=phone;
    document.getElementById('prev-email').textContent=email;
    document.getElementById('prev-hours').textContent=open&&close?`${open} – ${close}`:'';
    document.getElementById('prev-copy').textContent=name;
    document.getElementById('ogTitle').textContent=name+' · Restaurant Gastronomique';
    document.getElementById('ogDesc').textContent=desc.slice(0,120)+(desc.length>120?'…':'');
  }

  // ── SAVE ALL ──
  function saveAll(){
    const btn=document.getElementById('saveBtn');
    btn.textContent='Enregistrement…';
    btn.disabled=true;
    setTimeout(()=>{
      btn.innerHTML=`<svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 13l4 4L19 7"/></svg> Enregistrer tout`;
      btn.disabled=false;
      clearUnsaved();
      toast('✓','Modifications enregistrées','Toutes les informations ont été mises à jour avec succès.','border-cg/30');
    },900);
  }

  // ── RESET ──
  function resetForm(){
    if(!confirm('Réinitialiser toutes les modifications non enregistrées ?'))return;
    document.getElementById('f-name').value='La Maison';
    document.getElementById('f-address').value='15 Avenue des Arts, Casablanca 20000, Maroc';
    document.getElementById('f-phone').value='+212 522 000 000';
    document.getElementById('f-email').value='contact@lamaison.ma';
    document.getElementById('f-desc').value='Restaurant gastronomique au cœur de Casablanca…';
    countChars(document.getElementById('f-desc'),'descCount',500);
    clearUnsaved();
    toast('↺','Réinitialisé','Les données originales ont été restaurées.','border-cy/30');
  }

  // ── TOAST ──
  let toastT;
  function toast(icon,title,sub,borderCls='border-gold/30'){
    clearTimeout(toastT);
    const t=document.getElementById('toast');
    document.getElementById('tIcon').textContent=icon;
    document.getElementById('tTitle').textContent=title;
    document.getElementById('tSub').textContent=sub;
    t.className=`fixed bottom-6 right-6 z-[200] bg-s2 border ${borderCls} px-5 py-3.5 flex items-center gap-3 shadow-2xl animate-slide-up`;
    t.classList.remove('hidden');
    toastT=setTimeout(()=>t.classList.add('hidden'),3500);
  }

  // ── INIT ──
  buildDaysGrid();
  buildSchedule();
  countChars(document.getElementById('f-desc'),'descCount',500);

  // Seed 3 demo images
  const demoImgs=[
    {src:'https://images.unsplash.com/photo-1414235077428-338989a2e8c0?w=400&q=70',name:'salle.jpg',size:'142 KB',desc:'Salle principale',alt:'Intérieur du restaurant La Maison',cover:true},
    {src:'https://images.unsplash.com/photo-1504674900247-0877df9cc836?w=400&q=70',name:'plat.jpg',size:'98 KB',desc:'Côte de Bœuf signature',alt:'Côte de bœuf grillée La Maison',cover:false},
    {src:'https://images.unsplash.com/photo-1559339352-11d035aa65de?w=400&q=70',name:'ambiance.jpg',size:'115 KB',desc:'Ambiance soir',alt:'Ambiance soirée restaurant La Maison',cover:false},
  ];
  images=[...demoImgs];
  renderImages();
</script>
</body>
</html>