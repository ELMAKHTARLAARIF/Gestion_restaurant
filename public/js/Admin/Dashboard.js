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
    dashboard: 'Tableau de <em class="italic text-gold">bord</em>',
    reservations: 'Réser<em class="italic text-gold">vations</em>',
    orders: 'Com<em class="italic text-gold">mandes</em>',
    menu: 'Menu & <em class="italic text-gold">Carte</em>',
    tables: '<em class="italic text-gold">Tables</em>',
    clients: '<em class="italic text-gold">Clients</em>',
    staff: 'Person<em class="italic text-gold">nel</em>',
    analytics: '<em class="italic text-gold">Analytique</em>',
    settings: 'Para<em class="italic text-gold">mètres</em>',
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
  //  Notifications panel (FIXED)
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
  //  Fullscreen
  // ─────────────────────────────
  window.toggleFS = function () {
    if (!document.fullscreenElement) {
      document.documentElement.requestFullscreen().catch(() => { });
    } else {
      document.exitFullscreen();
    }
  };



  fetch('/dashboard/chart-data')
    .then(res => res.json())
    .then(data => {

      const revenueData = data.revenue;
      const revenueLabels = data.labels;

      const canvas = document.getElementById('revenueChart');

      new Chart(canvas.getContext('2d'), {
        type: 'bar',
        data: {
          labels: revenueLabels,
          datasets: [{
            data: revenueData,
            backgroundColor: 'rgba(200,169,110,.3)',
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

    });

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


const btn = document.getElementById("themeToggle");

btn.addEventListener("click", () => {
  document.body.classList.toggle("light-theme");

  localStorage.setItem(
    "theme",
    document.body.classList.contains("light-theme") ? "light" : "dark"
  );
});

window.addEventListener("load", () => {
  if (localStorage.getItem("theme") === "light") {
    document.body.classList.add("light-theme");
  }
});




