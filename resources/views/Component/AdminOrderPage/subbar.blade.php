  <div class="bg-s2 border-b border-gold/[.08] px-7 py-2.5 flex items-center gap-6 overflow-x-auto shrink-0 animate-fu2">
    <button onclick="filterStatus('pending',this)"   class="sfilter flex items-center gap-2 text-[10px] uppercase tracking-[.12em] whitespace-nowrap cursor-pointer bg-transparent border-0 text-cream/35 hover:text-cream transition-colors">
      <span class="w-2 h-2 rounded-full bg-amber/60"></span>Pending<span class="bg-s3 text-cream/35 text-[9px] px-1.5 py-0.5">{{$counts['pending']}}</span>
    </button>
    <button onclick="filterStatus('confirmed',this)" class="sfilter flex items-center gap-2 text-[10px] uppercase tracking-[.12em] whitespace-nowrap cursor-pointer bg-transparent border-0 text-cream/35 hover:text-cream transition-colors">
      <span class="w-2 h-2 rounded-full bg-sage/60"></span>Confirmed<span class="bg-s3 text-cream/35 text-[9px] px-1.5 py-0.5">{{$counts['confirmed']}}</span>
    </button>
    <button onclick="filterStatus('preparing',this)" class="sfilter flex items-center gap-2 text-[10px] uppercase tracking-[.12em] whitespace-nowrap cursor-pointer bg-transparent border-0 text-cream/35 hover:text-cream transition-colors">
      <span class="w-2 h-2 rounded-full bg-gold/60 animate-p2"></span>Preparing<span class="bg-s3 text-cream/35 text-[9px] px-1.5 py-0.5">{{$counts['preparing']}}</span>
    </button>
    <button onclick="filterStatus('ready',this)"     class="sfilter flex items-center gap-2 text-[10px] uppercase tracking-[.12em] whitespace-nowrap cursor-pointer bg-transparent border-0 text-cream/35 hover:text-cream transition-colors">
      <span class="w-2 h-2 rounded-full bg-sky/60"></span>Ready<span class="bg-s3 text-cream/35 text-[9px] px-1.5 py-0.5">{{$counts['ready']}}</span>
    </button>
    <button onclick="filterStatus('delivered',this)" class="sfilter flex items-center gap-2 text-[10px] uppercase tracking-[.12em] whitespace-nowrap cursor-pointer bg-transparent border-0 text-cream/35 hover:text-cream transition-colors">
      <span class="w-2 h-2 rounded-full bg-mint/60"></span>Delivered<span class="bg-s3 text-cream/35 text-[9px] px-1.5 py-0.5">{{$counts['delivered']}}</span>
    </button>
    <button onclick="filterStatus('completed',this)" class="sfilter flex items-center gap-2 text-[10px] uppercase tracking-[.12em] whitespace-nowrap cursor-pointer bg-transparent border-0 text-cream/35 hover:text-cream transition-colors">
      <span class="w-2 h-2 rounded-full bg-lav/60"></span>Completed<span class="bg-s3 text-cream/35 text-[9px] px-1.5 py-0.5">{{$counts['completed']}}</span>
    </button>
    <button onclick="filterStatus('cancelled',this)" class="sfilter flex items-center gap-2 text-[10px] uppercase tracking-[.12em] whitespace-nowrap cursor-pointer bg-transparent border-0 text-cream/35 hover:text-cream transition-colors">
      <span class="w-2 h-2 rounded-full bg-rose/60"></span>Cancelled<span class="bg-s3 text-cream/35 text-[9px] px-1.5 py-0.5">{{$counts['cancelled']}}</span>
    </button>
    <div class="flex-1"></div>
    <div class="flex items-center gap-3 text-[10px] text-cream/30 shrink-0">
      <span>Total soir :</span>
      <span class="font-display text-base text-gold">14 380 MAD</span>
    </div>
  </div>