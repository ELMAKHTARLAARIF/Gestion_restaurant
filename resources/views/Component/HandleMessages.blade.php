<div class="flex-1 overflow-y-auto content-scroll">
    <div class="p-8 max-w-[1200px] mx-auto">

        {{-- Success Message --}}
        @if(session('success'))
        <div id="flash-message-success"
             class="mb-4 px-5 py-4 border border-gold/30 bg-s1 text-gold text-[12px] tracking-wide flex items-center gap-3 transition-opacity duration-500">
            
            <div class="w-8 h-8 border border-gold/30 flex items-center justify-center text-gold text-sm">
                ✓
            </div>

            <div>
                <div class="uppercase text-[10px] tracking-[.2em] text-gold/70 mb-1">Success</div>
                <div class="text-cream/80">
                    {{ session('success') }}
                </div>
            </div>
        </div>
        @endif


        {{-- Error Message --}}
        @if(session('error'))
        <div id="flash-message-error"
             class="mb-4 px-5 py-4 border border-cred/40 bg-s1 text-cred text-[12px] tracking-wide flex items-center gap-3 transition-opacity duration-500">

            <div class="w-8 h-8 border border-cred/40 flex items-center justify-center text-cred text-sm">
                ✕
            </div>

            <div>
                <div class="uppercase text-[10px] tracking-[.2em] text-cred/70 mb-1">Error</div>
                <div class="text-cream/80">
                    {{ session('error') }}
                </div>
            </div>
        </div>
        @endif


        {{-- Validation Errors --}}
        @if($errors->any())
        <div id="flash-message-validation"
             class="mb-4 px-5 py-4 border border-cred/40 bg-s1 text-cred text-[12px] tracking-wide">

            <div class="uppercase text-[10px] tracking-[.2em] text-cred/70 mb-2">
                Validation Error
            </div>

            <ul class="list-disc pl-5 text-cream/70 space-y-1">
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

    </div>
</div>
<script>
    function fadeOut(el, duration = 500) {
        el.style.transition = `opacity ${duration}ms ease`;
        el.style.opacity = 0;
        setTimeout(() => {
            if (el.parentNode) {
                el.parentNode.removeChild(el);
            }
        }, duration);
    }

    setTimeout(() => {
        const success = document.getElementById('flash-message-success');
        const error = document.getElementById('flash-message-error');
        const validation = document.getElementById('flash-message-validation');

        if (success) fadeOut(success, 500);
        if (error) fadeOut(error, 500);
        if (validation) fadeOut(validation, 500);
    }, 5000); 
</script>