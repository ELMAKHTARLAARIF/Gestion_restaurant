{{-- resources/views/admin/users.blade.php --}}
@include('Component.header')

<meta name="csrf-token" content="{{ csrf_token() }}">


<div class="flex-1 overflow-y-auto bg-dark">
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
  <div class="p-7 flex flex-col gap-6">

    <!-- STAT CARDS (UNCHANGED) -->
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-px bg-gold/[.07] animate-fu">
      <!-- your cards unchanged -->
      <!-- KEEP SAME -->
    </div>

    <!-- TABLE -->
    <div class="bg-s1 border border-gold/[.1] animate-fu2">

      <!-- Header -->
      <div class="flex flex-wrap items-center gap-4 px-6 py-4 border-b border-gold/[.08]">

        <div class="flex border border-gold/[.12] overflow-hidden">
          <a href="#" id="filter-all"
            class="text-[10px] tracking-[.12em] uppercase px-4 py-2 bg-gold text-dark font-semibold">
            Tous
          </a>

          <a href="#" id="filter-active"
            class="text-[10px] tracking-[.12em] uppercase px-4 py-2 border-l border-gold/[.1]">
            Actifs
          </a>

          <a href="#" id="filter-inactive"
            class="text-[10px] tracking-[.12em] uppercase px-4 py-2 border-l border-gold/[.1]">
            Inactifs
          </a>

          <a href="#" id="filter-blocked"
            class="text-[10px] tracking-[.12em] uppercase px-4 py-2 border-l border-gold/[.1]">
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
              <th class="text-left px-6 py-3"><input type="checkbox" class="w-3.5 h-3.5" /></th>
              <th class="text-left px-4 py-3 text-[9px] uppercase text-cream/22">Client</th>
              <th class="text-left px-4 py-3 text-[9px] uppercase text-cream/22 hidden md:table-cell">Email</th>
              <th class="text-left px-4 py-3 text-[9px] uppercase text-cream/22 hidden lg:table-cell">Téléphone</th>
              <th class="text-left px-4 py-3 text-[9px] uppercase text-cream/22">Statut</th>
              <th class="text-right px-6 py-3 text-[9px] uppercase text-cream/22">Actions</th>
            </tr>
          </thead>

          <tbody class="divide-y divide-gold/[.04]">

            @forelse($users as $user)

            <tr class="urow group" data-status="{{ $user->status }}">

              <td class="px-6 py-3.5"><input type="checkbox" class="w-3.5 h-3.5" /></td>

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

              <td class="status-cell px-4 py-3.5">
                @if($user->status === 'active')
                <span class="inline-flex items-center gap-1.5 text-[9px] uppercase px-2.5 py-1 border border-cgreen/[.22] bg-cgreen/[.07] text-cgreen">
                  <span class="w-1.5 h-1.5 rounded-full bg-cgreen"></span> Actif
                </span>
                @elseif($user->status === 'inactive')
                <span class="inline-flex items-center gap-1.5 text-[9px] uppercase px-2.5 py-1 border border-gold/[.15] bg-gold/[.05] text-cream/40">
                  <span class="w-1.5 h-1.5 rounded-full bg-cream/40"></span> Inactif
                </span>
                @else
                <span class="inline-flex items-center gap-1.5 text-[9px] uppercase px-2.5 py-1 border border-cred/[.22] bg-cred/[.07] text-cred">
                  <span class="w-1.5 h-1.5 rounded-full bg-cred"></span> Bloqué
                </span>
                @endif
              </td>
              <td class="px-6 py-3.5 text-right">
                <!-- Activate: check-circle -->
                <button class="btn-activate w-7 h-7 border border-cgreen/[.2]" data-id="{{ $user->id }}">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 text-cgreen">
                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14" />
                    <polyline points="22 4 12 14.01 9 11.01" />
                  </svg>
                </button>

                <!-- Inactive: pause-circle -->
                <button class="btn-inactive w-7 h-7 border border-gold/[.2]" data-id="{{ $user->id }}">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 text-gold">
                    <circle cx="12" cy="12" r="10" />
                    <line x1="10" y1="15" x2="10" y2="9" />
                    <line x1="14" y1="15" x2="14" y2="9" />
                  </svg>
                </button>

                <!-- Block: ban -->
                <button class="btn-block w-7 h-7 border border-cred/[.2]" data-id="{{ $user->id }}">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 text-cred">
                    <circle cx="12" cy="12" r="10" />
                    <line x1="4.93" y1="4.93" x2="19.07" y2="19.07" />
                  </svg>
                </button>

                <!-- Delete: trash-2 -->
                <button class="btn-delete w-7 h-7 border border-cred/[.15]" data-id="{{ $user->id }}">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 text-cred">
                    <polyline points="3 6 5 6 21 6" />
                    <path d="M19 6l-1 14H6L5 6" />
                    <path d="M10 11v6" />
                    <path d="M14 11v6" />
                    <path d="M9 6V4h6v2" />
                  </svg>
                </button>
              </td>
            </tr>

            @empty
            <tr>
              <td colspan="6" class="text-center py-10 text-cream/30">No users found</td>
            </tr>
            @endforelse

          </tbody>
        </table>
      </div>

      <!-- Footer unchanged -->
      <div class="px-6 py-3.5 border-t border-gold/[.07] bg-s2 flex items-center justify-between">
        <span class="text-[11px] text-cream/25">
          {{ $users->firstItem() }}–{{ $users->lastItem() }} sur {{ $users->total() }}
        </span>
        <div class="flex gap-1.5">{{ $users->links() }}</div>
      </div>

    </div>
  </div>
</div>

<script>
  document.addEventListener("DOMContentLoaded", () => {

    const rows = document.querySelectorAll(".urow");
    const csrf = document.querySelector('meta[name="csrf-token"]').content;

    function filter(status) {
      rows.forEach(row => {
        row.style.display =
          (status === "all" || row.dataset.status === status) ?
          "" :
          "none";
      });
    }

    document.getElementById("filter-all").onclick = e => {
      e.preventDefault();
      filter("all");
    };
    document.getElementById("filter-active").onclick = e => {
      e.preventDefault();
      filter("active");
    };
    document.getElementById("filter-inactive").onclick = e => {
      e.preventDefault();
      filter("inactive");
    };
    document.getElementById("filter-blocked").onclick = e => {
      e.preventDefault();
      filter("blocked");
    };

    function updateBadge(row, status) {
      const cell = row.querySelector(".status-cell");

      let badge = "";

      if (status === "active") {
        badge = `<span class="inline-flex items-center gap-1.5 text-[9px] uppercase px-2.5 py-1 border border-cgreen/[.22] bg-cgreen/[.07] text-cgreen">
                        <span class="w-1.5 h-1.5 rounded-full bg-cgreen"></span> Actif
                     </span>`;
      } else if (status === "inactive") {
        badge = `<span class="inline-flex items-center gap-1.5 text-[9px] uppercase px-2.5 py-1 border border-gold/[.15] bg-gold/[.05] text-cream/40">
                        <span class="w-1.5 h-1.5 rounded-full bg-cream/40"></span> Inactif
                     </span>`;
      } else {
        badge = `<span class="inline-flex items-center gap-1.5 text-[9px] uppercase px-2.5 py-1 border border-cred/[.22] bg-cred/[.07] text-cred">
                        <span class="w-1.5 h-1.5 rounded-full bg-cred"></span> Bloqué
                     </span>`;
      }

      cell.innerHTML = badge;
      row.dataset.status = status;
    }

    document.addEventListener("click", async (e) => {

      const btn = e.target.closest("button");
      if (!btn) return;

      const id = btn.dataset.id;
      const row = btn.closest(".urow");

      try {

        if (btn.classList.contains("btn-activate")) {
          await fetch(`/admin/users/${id}/activate`, {
            method: "POST",
            headers: {
              "X-CSRF-TOKEN": csrf
            }
          });
          updateBadge(row, "active");
        }

        if (btn.classList.contains("btn-inactive")) {
          await fetch(`/admin/users/${id}/inactive`, {
            method: "POST",
            headers: {
              "X-CSRF-TOKEN": csrf
            }
          });
          updateBadge(row, "inactive");
        }

        if (btn.classList.contains("btn-block")) {
          await fetch(`/admin/users/${id}/block`, {
            method: "POST",
            headers: {
              "X-CSRF-TOKEN": csrf
            }
          });
          updateBadge(row, "blocked");
        }

        if (btn.classList.contains("btn-delete")) {
          if (!confirm("Delete this user?")) return;

          await fetch(`/admin/users/${id}`, {
            method: "DELETE",
            headers: {
              "X-CSRF-TOKEN": csrf
            }
          });
          row.remove();
        }

      } catch (err) {
        console.error(err);
        alert("Something went wrong");
      }

    });

  });
</script>

</body>

</html>