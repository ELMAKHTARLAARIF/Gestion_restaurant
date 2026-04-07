<div id="notifPanel" class="hidden notif-panel fixed top-[60px] right-0 w-80 bg-s1 border-l border-gold/[.12] z-50 overflow-y-auto" style="height:calc(100vh - 60px)">
  <div class="flex items-center justify-between px-6 py-4 border-b border-gold/[.12]">
    <span class="text-[11px] tracking-[.2em] uppercase text-cream/40">Notifications</span>
    <button onclick="toggleNotif()" class="text-cream/35 hover:text-gold transition-colors text-base bg-transparent border-0 cursor-pointer">✕</button>
  </div>

  <div class="divide-y divide-gold/[.05]">
    @forelse($reservations as $res)
    <div class="px-6 py-4 border-l-2 {{ $res->status === 'pending' ? 'border-gold' : 'border-transparent' }} hover:bg-gold/[.04] cursor-pointer transition-colors">
      <div class="text-[13px] mb-1">
        Nouvelle réservation
      </div>
      <div class="text-[11px] text-cream/40">
        {{ $res->customer?->name ?? 'Client inconnu' }} — Table {{ $res->tableNumber }}, {{ $res->numberOfPeaple }} pers.
      </div>
      <div class="text-[10px] text-cream/20 mt-1">
        {{ $res->created_at->diffForHumans() }}
      </div>
    </div>
    @empty
    <div class="px-6 py-4 text-[11px] text-cream/40">
      Pas de réservations pour le moment
    </div>
    @endforelse
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/laravel-echo@1.11.0/dist/echo.iife.js"></script>
<script src="https://js.pusher.com/8.2/pusher.min.js"></script>
<script>
  Pusher.logToConsole = true;
  window.Pusher = Pusher;

  window.Echo = new Echo({
    broadcaster: 'pusher',
    key: "{{ env('PUSHER_APP_KEY') }}", // your pusher key
    cluster: "{{ env('PUSHER_APP_CLUSTER') }}",
    forceTLS: true,
    encrypted: true,
    auth: {
      headers: {
        'X-CSRF-TOKEN': "{{ csrf_token() }}"
      }
    }
  });

  Echo.private('admin-notifications')
    .listen('ReservationCreated', (e) => {
      const container = document.getElementById('notifContainer');
      const html = `
                <div class="px-6 py-4 border-l-2 border-gold hover:bg-gold/[.04] cursor-pointer transition-colors">
                    <div class="text-[13px] mb-1">Nouvelle réservation</div>
                    <div class="text-[11px] text-cream/40">
                        ${e.reservation.customer_name} — Table ${e.reservation.tableNumber}, ${e.reservation.numberOfPeaple} pers.
                    </div>
                    <div class="text-[10px] text-cream/20 mt-1">just now</div>
                </div>
            `;
      container.insertAdjacentHTML('afterbegin', html);
    });

  function toggleNotif() {
    const panel = document.getElementById('notifPanel');
    panel.classList.toggle('hidden');
  }
</script>