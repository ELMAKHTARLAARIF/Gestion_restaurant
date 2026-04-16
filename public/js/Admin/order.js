
  // Date
  document.getElementById('dateBadge').textContent =
    new Date().toLocaleDateString('fr-FR',{weekday:'short',day:'numeric',month:'short'});

  // View toggle: Pipeline ↔ Table
  function setView(v) {
    document.getElementById('viewKanban').classList.toggle('hidden', v !== 'kanban');
    document.getElementById('viewTable').classList.toggle('hidden', v !== 'table');
    document.getElementById('vKanban').classList.toggle('on', v === 'kanban');
    document.getElementById('vTable').classList.toggle('on', v === 'table');
  }

  // Status filter strip
  function filterStatus(s, btn) {
    document.querySelectorAll('.sfilter').forEach(b => b.classList.remove('on','text-gold'));
    btn.classList.add('on','text-gold');
  }

  // Modals
  function openModal(id) {
    document.getElementById(id).classList.remove('hidden');
    document.body.style.overflow = 'hidden';
  }
  function closeModal(id) {
    document.getElementById(id).classList.add('hidden');
    document.body.style.overflow = '';
  }

  // Detail modal
  function openDetail(ref) {
    document.getElementById('dRef').textContent = ref;
    openModal('detailModal');
  }

  // Escape key
  document.addEventListener('keydown', e => {
    if (e.key === 'Escape')
      ['detailModal','addModal','cancelModal'].forEach(id => closeModal(id));
  });
