
  // Date
  document.getElementById('topDate').textContent = new Date().toLocaleDateString('fr-FR',{weekday:'long',day:'numeric',month:'long'});

  // Sidebar collapse
  let collapsed = false;
  function toggleSidebar() {
    collapsed = !collapsed;
    document.getElementById('sidebar').classList.toggle('collapsed', collapsed);
    document.getElementById('collapseBtn').textContent = collapsed ? '▶' : '◀';
  }

  // Nav
  const titles = {dashboard:'Tableau de <em class="italic text-gold">bord</em>',reservations:'Réser<em class="italic text-gold">vations</em>',orders:'Com<em class="italic text-gold">mandes</em>',menu:'Menu & <em class="italic text-gold">Carte</em>',tables:'<em class="italic text-gold">Tables</em>',clients:'<em class="italic text-gold">Clients</em>',staff:'Person<em class="italic text-gold">nel</em>',analytics:'<em class="italic text-gold">Analytique</em>',settings:'Para<em class="italic text-gold">mètres</em>'};
  function setPage(name, el) {
    document.querySelectorAll('.nav-item').forEach(i => {
      i.classList.remove('active','border-gold','bg-gold/[.08]');
      i.classList.add('border-transparent');
      i.querySelectorAll('span').forEach(s => { s.classList.remove('text-gold'); s.classList.add('text-cream/45'); });
    });
    el.classList.add('active','border-gold','bg-gold/[.08]');
    el.classList.remove('border-transparent');
    el.querySelectorAll('span').forEach(s => { if(!s.classList.contains('nav-badge') && !s.classList.contains('hide-collapsed')) { s.classList.add('text-gold'); s.classList.remove('text-cream/45'); } });
    document.getElementById('pageTitle').innerHTML = titles[name] || name;
  }

  // Notif
  function toggleNotif() { document.getElementById('notifPanel').classList.toggle('open'); }
  function toggleFS() { if(!document.fullscreenElement) document.documentElement.requestFullscreen().catch(()=>{}); else document.exitFullscreen(); }

  // Tables grid
  const states = ['occupied','occupied','free','reserved','occupied','free','free','occupied','reserved','free','occupied','occupied','reserved','free','free','occupied','free','reserved','occupied','free','occupied','reserved','free','free'];
  const seats = [2,4,2,4,6,2,4,4,2,6,4,2,4,2,4,6,2,4,4,2,4,2,6,4];
  const colorMap = { occupied:'border-gold/35 bg-gold/[.08] text-gold', reserved:'border-cblue/35 bg-cblue/[.08] text-cblue', free:'border-cgreen/20 bg-cgreen/[.05] text-cgreen' };
  const stateArr = [...states];
  const grid = document.getElementById('tablesGrid');
  states.forEach((s, i) => {
    const el = document.createElement('div');
    el.className = `aspect-square border flex flex-col items-center justify-center gap-0.5 cursor-pointer transition-all ${colorMap[s]}`;
    el.innerHTML = `<div class="font-display text-sm leading-none">${i+1}</div><div class="text-[9px] text-cream/35 tracking-wide">${seats[i]}p</div>`;
    el.addEventListener('click', () => {
      const order = ['free','occupied','reserved'];
      stateArr[i] = order[(order.indexOf(stateArr[i])+1)%3];
      el.className = `aspect-square border flex flex-col items-center justify-center gap-0.5 cursor-pointer transition-all ${colorMap[stateArr[i]]}`;
      el.querySelector('div').className = `font-display text-sm leading-none`;
    });
    grid.appendChild(el);
  });

  // Revenue chart
  new Chart(document.getElementById('revenueChart').getContext('2d'), {
    type:'bar',
    data:{labels:['Lun','Mar','Mer','Jeu','Ven','Sam','Auj'],datasets:[{label:'Revenus',data:[6200,7100,5800,8400,9200,11500,8420],backgroundColor:(ctx)=>ctx.dataIndex===6?'rgba(200,169,110,.85)':'rgba(200,169,110,.16)',borderColor:'rgba(200,169,110,.4)',borderWidth:1,borderRadius:0}]},
    options:{responsive:true,maintainAspectRatio:false,plugins:{legend:{display:false},tooltip:{backgroundColor:'#161616',borderColor:'rgba(200,169,110,.3)',borderWidth:1,titleColor:'#C8A96E',bodyColor:'rgba(245,240,232,.7)',titleFont:{family:'Cormorant Garamond',size:13},bodyFont:{family:'Jost',size:11},callbacks:{label:ctx=>` ${ctx.parsed.y.toLocaleString('fr-FR')} MAD`}}},scales:{x:{grid:{color:'rgba(200,169,110,.05)'},ticks:{color:'rgba(245,240,232,.3)',font:{family:'Jost',size:10}}},y:{grid:{color:'rgba(200,169,110,.05)'},ticks:{color:'rgba(245,240,232,.3)',font:{family:'Jost',size:10},callback:v=>v.toLocaleString('fr-FR')}}}}
  });

  // Donut chart
  new Chart(document.getElementById('donutChart').getContext('2d'), {
    type:'doughnut',
    data:{datasets:[{data:[54,28,18],backgroundColor:['rgba(200,169,110,.8)','rgba(110,158,200,.8)','rgba(110,200,138,.8)'],borderColor:'#111',borderWidth:3,hoverOffset:4}]},
    options:{responsive:false,cutout:'72%',plugins:{legend:{display:false},tooltip:{backgroundColor:'#161616',borderColor:'rgba(200,169,110,.3)',borderWidth:1,titleColor:'#C8A96E',bodyColor:'rgba(245,240,232,.7)',callbacks:{label:ctx=>` ${ctx.parsed}%`}}}}
  });
