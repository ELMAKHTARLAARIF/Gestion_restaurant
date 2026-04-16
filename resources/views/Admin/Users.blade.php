{{-- resources/views/admin/users.blade.php --}}
@include('Component.header')

<div class="flex-1 overflow-y-auto bg-dark">
  <div class="p-7 flex flex-col gap-6">

    <!-- STAT CARDS -->
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-px bg-gold/[.07] animate-fu">

      <div class="scard relative bg-s1 px-6 py-5 overflow-hidden">
        <div class="flex items-center justify-between mb-3">
          <span class="text-[10px] tracking-[.22em] uppercase text-cream/30">Total clients</span>
          <span class="text-base opacity-30">👤</span>
        </div>

        <div class="font-display text-[2.2rem] font-light leading-none mb-1.5">
          {{ $totalClients }}
        </div>
        <div class="text-[10px] text-cream/25">inscrits</div>
      </div>

      <div class="scard relative bg-s1 px-6 py-5 overflow-hidden">
        <div class="flex items-center justify-between mb-3">
          <span class="text-[10px] tracking-[.22em] uppercase text-cream/30">Actifs</span>
          <span class="text-base opacity-30">✅</span>
        </div>
        <div class="font-display text-[2.2rem] font-light leading-none mb-1.5 text-cgreen">
          {{ $activeClients }}
        </div>
        <div class="text-[10px] text-cream/25">comptes actifs</div>
      </div>

      <div class="scard relative bg-s1 px-6 py-5 overflow-hidden">
        <div class="flex items-center justify-between mb-3">
          <span class="text-[10px] tracking-[.22em] uppercase text-cream/30">Bloqués</span>
          <span class="text-base opacity-30">🚫</span>
        </div>
        <div class="font-display text-[2.2rem] font-light leading-none mb-1.5 text-cred">
          {{ $blockedClients }}
        </div>
        <div class="text-[10px] text-cream/25 flex items-center gap-1.5">
          <span class="w-1.5 h-1.5 rounded-full bg-cred animate-p2"></span>
          comptes bloqués
        </div>
      </div>

      <div class="scard relative bg-s1 px-6 py-5 overflow-hidden">
        <div class="flex items-center justify-between mb-3">
          <span class="text-[10px] tracking-[.22em] uppercase text-cream/30">Ce mois</span>
          <span class="text-base opacity-30">📈</span>
        </div>
        <div class="font-display text-[2.2rem] font-light leading-none mb-1.5 text-gold">
          {{ $newClientsThisMonth }}
        </div>
        <div class="text-[10px] text-cream/25">nouveaux inscrits</div>
      </div>

    </div>

    <!-- TABLE -->
    <div class="bg-s1 border border-gold/[.1] animate-fu2">

      <!-- Header -->
      <div class="flex flex-wrap items-center gap-4 px-6 py-4 border-b border-gold/[.08]">

        <div class="flex border border-gold/[.12] overflow-hidden">
          <a href=""
             class="text-[10px] tracking-[.12em] uppercase px-4 py-2 {{ !request('status') ? 'bg-gold text-dark font-semibold' : 'text-cream/40 hover:text-cream' }}">
            Tous
          </a>

          <a href=""
             class="text-[10px] tracking-[.12em] uppercase px-4 py-2 border-l border-gold/[.1] {{ request('status') === 'active' ? 'bg-cgreen/15 text-cgreen' : 'text-cream/40 hover:text-cream' }}">
            Actifs
          </a>

          <a href=""
             class="text-[10px] tracking-[.12em] uppercase px-4 py-2 border-l border-gold/[.1] {{ request('status') === 'blocked' ? 'bg-cred/12 text-cred' : 'text-cream/40 hover:text-cream' }}">
            Bloqués
          </a>
        </div>

        <div class="flex-1"></div>

        <span class="text-[11px] text-cream/28">
          {{ $users->total() }} clients
        </span>
      </div>

      <!-- TABLE -->
      <div class="overflow-x-auto">
        <table class="w-full border-collapse">

          <thead>
            <tr class="border-b border-gold/[.07]">
              <th class="text-left px-6 py-3">
                <input type="checkbox" class="w-3.5 h-3.5"/>
              </th>
              <th class="text-left px-4 py-3 text-[9px] uppercase text-cream/22">Client</th>
              <th class="text-left px-4 py-3 text-[9px] uppercase text-cream/22 hidden md:table-cell">Email</th>
              <th class="text-left px-4 py-3 text-[9px] uppercase text-cream/22 hidden lg:table-cell">Téléphone</th>
              <th class="text-left px-4 py-3 text-[9px] uppercase text-cream/22">Statut</th>
              <th class="text-right px-6 py-3 text-[9px] uppercase text-cream/22">Actions</th>
            </tr>
          </thead>

          <tbody class="divide-y divide-gold/[.04]">

            @forelse($users as $user)

            <tr class="urow group">

              <td class="px-6 py-3.5">
                <input type="checkbox" class="w-3.5 h-3.5"/>
              </td>

              <td class="px-4 py-3.5 flex items-center gap-3">
                <div class="w-8 h-8 bg-gold/[.08] border border-gold/[.18] flex items-center justify-center text-[10px] text-gold font-semibold">
                  {{ strtoupper(substr($user->name,0,1)) }}
                </div>
                <div class="text-[13px] text-cream">{{ $user->name }}</div>
              </td>

              <td class="px-4 py-3.5 text-[12px] text-cream/45 hidden md:table-cell">
                {{ $user->email }}
              </td>

              <td class="px-4 py-3.5 text-[12px] text-cream/40 hidden lg:table-cell">
                {{ $user->phone ?? '—' }}
              </td>

              <td class="px-4 py-3.5">
                @if($user->status === 'active')
                  <span class="inline-flex items-center gap-1.5 text-[9px] uppercase px-2.5 py-1 border border-cgreen/[.22] bg-cgreen/[.07] text-cgreen">
                    <span class="w-1.5 h-1.5 rounded-full bg-cgreen"></span>
                    Actif
                  </span>

                @elseif($user->status === 'inactive')
                  <span class="inline-flex items-center gap-1.5 text-[9px] uppercase px-2.5 py-1 border border-gold/[.15] bg-gold/[.05] text-cream/40">
                    <span class="w-1.5 h-1.5 rounded-full bg-cream/40"></span>
                    Inactif
                  </span>

                @else
                  <span class="inline-flex items-center gap-1.5 text-[9px] uppercase px-2.5 py-1 border border-cred/[.22] bg-cred/[.07] text-cred">
                    <span class="w-1.5 h-1.5 rounded-full bg-cred"></span>
                    Bloqué
                  </span>
                @endif
              </td>

              <td class="px-6 py-3.5 text-right">
                <button class="w-7 h-7 border border-gold/[.14] text-cream/28">👁</button>
                <button class="w-7 h-7 border border-cred/[.18] text-cred/45">🚫</button>
                <button class="w-7 h-7 border border-cred/[.15] text-cred/38">🗑</button>
              </td>

            </tr>

            @empty
              <tr>
                <td colspan="6" class="text-center py-10 text-cream/30">
                  No users found
                </td>
              </tr>
            @endforelse

          </tbody>
        </table>
      </div>

      <!-- Footer -->
      <div class="px-6 py-3.5 border-t border-gold/[.07] bg-s2 flex items-center justify-between">
        <span class="text-[11px] text-cream/25">
          {{ $users->firstItem() }}–{{ $users->lastItem() }} sur {{ $users->total() }}
        </span>

        <div class="flex gap-1.5">
          {{ $users->links() }}
        </div>
      </div>

    </div>

  </div>
</div>

</body>
</html>