<div class="flex-1 overflow-y-auto content-scroll">
    <div class="p-8 max-w-[1200px] mx-auto">
        {{-- Success Message --}}
        @if(session('success'))
        <div id="flash-message-success"
             class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 transition-opacity duration-500 ease-out"
             role="alert">
            <strong>Success!</strong> {{ session('success') }}
        </div>
        @endif

        {{-- Error Message --}}
        @if(session('error'))
        <div id="flash-message-error"
             class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4 transition-opacity duration-500 ease-out"
             role="alert">
            <strong>Error!</strong> {{ session('error') }}
        </div>
        @endif

        {{-- Validation Errors --}}
        @if($errors->any())
        <div id="flash-message-validation"
             class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4 transition-opacity duration-500 ease-out">
            <ul class="list-disc pl-5">
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

    // Wait 5 seconds and fade out messages
    setTimeout(() => {
        const success = document.getElementById('flash-message-success');
        const error = document.getElementById('flash-message-error');
        const validation = document.getElementById('flash-message-validation');

        if (success) fadeOut(success, 500);
        if (error) fadeOut(error, 500);
        if (validation) fadeOut(validation, 500);
    }, 5000); 
</script>