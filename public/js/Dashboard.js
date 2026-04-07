document.addEventListener('DOMContentLoaded', function () {

  // ─────────────────────────────
  // 📅 Date
  // ─────────────────────────────
  const topDate = document.getElementById('topDate');
  if (topDate) {
    topDate.textContent = new Date().toLocaleDateString('fr-FR', {
      weekday: 'long',
      day: 'numeric',
      month: 'long'
    });
  }

  // ─────────────────────────────
  // 📌 Sidebar collapse
  // ─────────────────────────────
  let collapsed = false;

  window.toggleSidebar = function () {
    collapsed = !collapsed;

    document.getElementById('sidebar')
      ?.classList.toggle('collapsed', collapsed);

    const btn = document.getElementById('collapseBtn');
    if (btn) btn.textContent = collapsed ? '▶' : '◀';
  };

  // ─────────────────────────────
  // 📄 Page switching
  // ─────────────────────────────
  const titles = {
    dashboard:    'Tableau de <em class="italic text-gold">bord</em>',
    reservations: 'Réser<em class="italic text-gold">vations</em>',
    orders:       'Com<em class="italic text-gold">mandes</em>',
    menu:         'Menu & <em class="italic text-gold">Carte</em>',
    tables:       '<em class="italic text-gold">Tables</em>',
    clients:      '<em class="italic text-gold">Clients</em>',
    staff:        'Person<em class="italic text-gold">nel</em>',
    analytics:    '<em class="italic text-gold">Analytique</em>',
    settings:     'Para<em class="italic text-gold">mètres</em>',
  };

  window.setPage = function (name, el) {
    document.querySelectorAll('.nav-item').forEach(i => {
      i.classList.remove('active', 'border-gold', 'bg-gold/[.08]');
      i.classList.add('border-transparent');

      i.querySelectorAll('span').forEach(s => {
        s.classList.remove('text-gold');
        s.classList.add('text-cream/45');
      });
    });

    el.classList.add('active', 'border-gold', 'bg-gold/[.08]');
    el.classList.remove('border-transparent');

    el.querySelectorAll('span').forEach(s => {
      if (!s.classList.contains('nav-badge')) {
        s.classList.add('text-gold');
        s.classList.remove('text-cream/45');
      }
    });

    const pageTitle = document.getElementById('pageTitle');
    if (pageTitle) pageTitle.innerHTML = titles[name] || name;
  };

  // ─────────────────────────────
  // 🔔 Notifications panel (FIXED)
  // ─────────────────────────────
  const notifPanel = document.getElementById('notifPanel');

  window.toggleNotif = function () {
    notifPanel?.classList.toggle('hidden');
  };

  // Close when clicking outside
  document.addEventListener('click', function (e) {
    if (!notifPanel) return;

    const isClickInside = notifPanel.contains(e.target);
    const isButton = e.target.closest('[onclick="toggleNotif()"]');

    if (!isClickInside && !isButton) {
      notifPanel.classList.add('hidden');
    }
  });

  // Prevent closing when clicking inside panel
  notifPanel?.addEventListener('click', function (e) {
    e.stopPropagation();
  });

  // ─────────────────────────────
  // 🖥 Fullscreen
  // ─────────────────────────────
  window.toggleFS = function () {
    if (!document.fullscreenElement) {
      document.documentElement.requestFullscreen().catch(() => {});
    } else {
      document.exitFullscreen();
    }
  };

  // ─────────────────────────────
  // 🪑 Tables grid
  // ─────────────────────────────
  const tablesGrid = document.getElementById('tablesGrid');

  if (tablesGrid) {
    const states = [
      'occupied','occupied','free','reserved','occupied','free',
      'free','occupied','reserved','free','occupied','occupied',
      'reserved','free','free','occupied','free','reserved',
      'occupied','free','occupied','reserved','free','free'
    ];

    const seats = [
      2,4,2,4,6,2,4,4,2,6,4,2,
      4,2,4,6,2,4,4,2,4,2,6,4
    ];

    const colorMap = {
      occupied: 'border-gold/35 bg-gold/[.08] text-gold',
      reserved: 'border-cblue/35 bg-cblue/[.08] text-cblue',
      free:     'border-cgreen/20 bg-cgreen/[.05] text-cgreen',
    };

    const stateArr = [...states];

    states.forEach((s, i) => {
      const el = document.createElement('div');

      el.className = `
        aspect-square border flex flex-col items-center justify-center
        gap-0.5 cursor-pointer transition-all ${colorMap[s]}
      `;

      el.innerHTML = `
        <div class="font-display text-sm">${i + 1}</div>
        <div class="text-[9px] text-cream/35">${seats[i]}p</div>
      `;

      el.addEventListener('click', () => {
        const order = ['free', 'occupied', 'reserved'];

        stateArr[i] = order[(order.indexOf(stateArr[i]) + 1) % 3];

        el.className = `
          aspect-square border flex flex-col items-center justify-center
          gap-0.5 cursor-pointer transition-all ${colorMap[stateArr[i]]}
        `;
      });

      tablesGrid.appendChild(el);
    });
  }

  // ─────────────────────────────
  // 📊 Revenue chart
  // ─────────────────────────────
  const revenueCanvas = document.getElementById('revenueChart');

  if (revenueCanvas && typeof Chart !== 'undefined') {
    new Chart(revenueCanvas.getContext('2d'), {
      type: 'bar',
      data: {
        labels: ['Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam', 'Auj'],
        datasets: [{
          data: [6200, 7100, 5800, 8400, 9200, 11500, 8420],
          backgroundColor: (ctx) =>
            ctx.dataIndex === 6
              ? 'rgba(200,169,110,.85)'
              : 'rgba(200,169,110,.16)',
          borderColor: 'rgba(200,169,110,.4)',
          borderWidth: 1
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: { legend: { display: false } }
      }
    });
  }

  // ─────────────────────────────
  // 🍩 Donut chart
  // ─────────────────────────────
  const donutCanvas = document.getElementById('donutChart');

  if (donutCanvas && typeof Chart !== 'undefined') {
    new Chart(donutCanvas.getContext('2d'), {
      type: 'doughnut',
      data: {
        datasets: [{
          data: [54, 28, 18],
          backgroundColor: [
            'rgba(200,169,110,.8)',
            'rgba(110,158,200,.8)',
            'rgba(110,200,138,.8)'
          ],
          borderWidth: 2
        }]
      },
      options: {
        cutout: '70%',
        plugins: { legend: { display: false } }
      }
    });
  }

});
/////

// add produit

    const d = new Date();
    document.getElementById('topDate').textContent = d.toLocaleDateString('fr-FR', { weekday:'short', day:'2-digit', month:'long' });

    // Live preview
    function updatePreview() {
        const name  = document.getElementById('itemName').value;
        const cat   = document.getElementById('itemCat').selectedOptions[0]?.text || 'Catégorie';
        const desc  = document.getElementById('itemDesc').value;
        const price = document.getElementById('itemPrice').value;
        const time  = document.getElementById('itemTime').value;

        document.getElementById('prevName').textContent  = name  || 'Nom du plat';
        document.getElementById('prevName').style.color  = name  ? '#F5F0E8' : 'rgba(245,240,232,.4)';
        document.getElementById('prevCat').textContent   = cat !== 'Sélectionner…' ? cat : 'Catégorie';
        document.getElementById('prevDesc').textContent  = desc  || 'Description du plat…';
        document.getElementById('prevPrice').innerHTML   = price ? `${parseInt(price).toLocaleString('fr-FR')} <span style="font-size:.8rem;color:rgba(245,240,232,.3);">MAD</span>` : `— <span style="font-size:.8rem;color:rgba(245,240,232,.2);">MAD</span>`;
        document.getElementById('prevPrice').style.color = price ? '#C8A96E' : 'rgba(200,169,110,.4)';
        document.getElementById('prevTime').textContent  = time  ? `⏱ ${time} min` : '⏱ — min';
    }

    function updateChar() {
        const len = document.getElementById('itemDesc').value.length;
        document.getElementById('charCount').textContent = `${len} / 200`;
    }

    // Image handling
    function handleFile(input) {
        const file = input.files[0];
        if (!file) return;
        const reader = new FileReader();
        reader.onload = e => {
            document.getElementById('imagePreview').src = e.target.result;
            document.getElementById('imgName').textContent = file.name;
            document.getElementById('imgSize').textContent = (file.size / 1024).toFixed(1) + ' KB';
            const wrap = document.getElementById('imagePreviewWrap');
            wrap.style.display = 'flex';
        };
        reader.readAsDataURL(file);
    }

    function handleDrop(e) {
        e.preventDefault();
        document.getElementById('dropZone').classList.remove('drag-over');
        const file = e.dataTransfer.files[0];
        if (file && file.type.startsWith('image/')) {
            const dt = new DataTransfer();
            dt.items.add(file);
            document.getElementById('fileInput').files = dt.files;
            handleFile(document.getElementById('fileInput'));
        }
    }

    function removeImage() {
        document.getElementById('fileInput').value = '';
        document.getElementById('imagePreviewWrap').style.display = 'none';
        document.getElementById('imagePreview').src = '';
    }
