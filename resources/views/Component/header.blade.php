<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin | La Maison</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.0/chart.umd.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=Jost:wght@300;400;500;600&display=swap" rel="stylesheet" />
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        gold: '#C8A96E',
                        'gold-h': '#d4b87c',
                        dark: '#0B0B0B',
                        s1: '#111111',
                        s2: '#161616',
                        s3: '#1C1C1C',
                        cream: '#F5F0E8',
                        cgreen: '#6EC88A',
                        cred: '#C86E6E',
                        cblue: '#6E9EC8',
                    },
                    fontFamily: {
                        display: ['"Cormorant Garamond"', 'serif'],
                        body: ['Jost', 'sans-serif']
                    },
                    width: {
                        sidebar: '240px',
                        'sidebar-sm': '64px'
                    },
                }
            }
        }
    </script>
    <style>
        html,
        body {
            height: 100%;
            overflow: hidden;
        }

        body {
            font-family: 'Jost', sans-serif;
        }

        .sidebar-w {
            width: 240px;
            min-width: 240px;
            transition: width .3s, min-width .3s;
        }

        .sidebar-w.collapsed {
            width: 64px;
            min-width: 64px;
        }

        .sidebar-w.collapsed .hide-collapsed {
            opacity: 0;
            width: 0;
            overflow: hidden;
            transition: opacity .2s;
        }

        .sidebar-w.collapsed .nav-badge {
            opacity: 0;
        }

        .sidebar-w.collapsed .nav-label-text {
            opacity: 0;
        }

        .content-scroll::-webkit-scrollbar {
            width: 3px;
        }

        .content-scroll::-webkit-scrollbar-thumb {
            background: rgba(200, 169, 110, .15);
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(16px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-up {
            animation: fadeUp .45s ease forwards;
            opacity: 0;
        }

        .fade-up:nth-child(1) {
            animation-delay: .05s;
        }

        .fade-up:nth-child(2) {
            animation-delay: .12s;
        }

        .fade-up:nth-child(3) {
            animation-delay: .19s;
        }

        .fade-up:nth-child(4) {
            animation-delay: .26s;
        }

        .stat-card::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background: #C8A96E;
            transition: width .4s;
        }

        .stat-card:hover::after {
            width: 100%;
        }

        .table-cell-item {
            transition: all .2s;
        }

        .notif-panel {
            transform: translateX(100%);
            transition: transform .3s;
        }

        .notif-panel.open {
            transform: translateX(0);
        }
    </style>
</head>

<body class="bg-dark text-cream font-body flex" style="font-size:14px;">

    <!-- ══ SIDEBAR ══ -->
    <aside id="sidebar" class="sidebar-w relative z-20 h-screen bg-s1 border-r border-gold/[.12] flex flex-col overflow-hidden">
        <!-- Collapse btn -->
        <button id="collapseBtn" onclick="toggleSidebar()"
            class="absolute top-6 -right-3 w-6 h-6 bg-s1 border border-gold/[.12] flex items-center justify-center z-30 text-[10px] text-cream/40 hover:text-gold transition-colors cursor-pointer">◀</button>

        <!-- Logo -->
        <div class="flex items-center gap-3 px-6 py-7 border-b border-gold/[.12]">
            <div class="w-8 h-8 border border-gold/40 flex items-center justify-center text-[11px] text-gold flex-shrink-0">LM</div>
            <span class="hide-collapsed font-display text-xl text-gold tracking-wide whitespace-nowrap">La Maison</span>
        </div>

        <!-- Nav -->
        <nav class="flex-1 overflow-y-auto py-4">
            <div class="nav-label-text px-6 pb-2 text-[9px] tracking-[.3em] uppercase text-cream/20 whitespace-nowrap transition-opacity">Principal</div>

            <a href="{{route('Dashboard')}}" class="nav-item active group flex items-center gap-3 px-6 py-[11px] cursor-pointer border-l-2 border-gold bg-gold/[.08] hover:bg-gold/[.08] transition-all" onclick="setPage('dashboard',this)">
                <span class="w-5 text-center text-gold text-base flex-shrink-0">⊞</span>
                <span class="hide-collapsed text-[12px] tracking-wide text-gold whitespace-nowrap">Tableau de bord</span>
            </a>
            <a class="nav-item group flex items-center gap-3 px-6 py-[11px] cursor-pointer border-l-2 border-transparent hover:bg-gold/[.06] transition-all" onclick="setPage('reservations',this)">
                <span class="w-5 text-center text-cream/45 text-base flex-shrink-0">🗓</span>
                <span class="hide-collapsed text-[12px] tracking-wide text-cream/45 whitespace-nowrap flex-1">Réservations</span>
                <span class="nav-badge hide-collapsed bg-gold text-dark text-[9px] font-semibold px-1.5 py-0.5">8</span>
            </a>
            <a class="nav-item group flex items-center gap-3 px-6 py-[11px] cursor-pointer border-l-2 border-transparent hover:bg-gold/[.06] transition-all" onclick="setPage('orders',this)">
                <span class="w-5 text-center text-cream/45 text-base flex-shrink-0">🍽</span>
                <span class="hide-collapsed text-[12px] tracking-wide text-cream/45 whitespace-nowrap flex-1">Commandes</span>
                <span class="nav-badge hide-collapsed bg-gold text-dark text-[9px] font-semibold px-1.5 py-0.5">3</span>
            </a>
            <a class="nav-item group flex items-center gap-3 px-6 py-[11px] cursor-pointer border-l-2 border-transparent hover:bg-gold/[.06] transition-all" onclick="setPage('menu',this)">
                <span class="w-5 text-center text-cream/45 text-base flex-shrink-0">📋</span>
                <span class="hide-collapsed text-[12px] tracking-wide text-cream/45 whitespace-nowrap">Menu</span>
            </a>
            <a href="{{route('AddItem')}}">
                <div class="nav-item group flex items-center gap-3 px-6 py-[11px] cursor-pointer border-l-2 border-transparent hover:bg-gold/[.06] transition-all" onclick="window.location.href='add-item.html'">
                    <span class="w-5 text-center text-cream/45 text-base flex-shrink-0">＋</span>
                    <span class="hide-collapsed text-[12px] tracking-wide text-cream/45 whitespace-nowrap">Items</span>
                </div>
            </a>
            <a class="nav-item group flex items-center gap-3 px-6 py-[11px] cursor-pointer border-l-2 border-transparent hover:bg-gold/[.06] transition-all" onclick="setPage('tables',this)">
                <span class="w-5 text-center text-cream/45 text-base flex-shrink-0">🪑</span>
                <span class="hide-collapsed text-[12px] tracking-wide text-cream/45 whitespace-nowrap">Tables</span>
            </a>

            <div class="nav-label-text mt-4 px-6 pb-2 text-[9px] tracking-[.3em] uppercase text-cream/20 whitespace-nowrap transition-opacity">Gestion</div>
            <a class="nav-item group flex items-center gap-3 px-6 py-[11px] cursor-pointer border-l-2 border-transparent hover:bg-gold/[.06] transition-all" onclick="setPage('clients',this)">
                <span class="w-5 text-center text-cream/45 text-base flex-shrink-0">👤</span>
                <span class="hide-collapsed text-[12px] tracking-wide text-cream/45 whitespace-nowrap">Clients</span>
            </a>
            <a class="nav-item group flex items-center gap-3 px-6 py-[11px] cursor-pointer border-l-2 border-transparent hover:bg-gold/[.06] transition-all" onclick="setPage('staff',this)">
                <span class="w-5 text-center text-cream/45 text-base flex-shrink-0">👥</span>
                <span class="hide-collapsed text-[12px] tracking-wide text-cream/45 whitespace-nowrap">Personnel</span>
            </a>
            <a class="nav-item group flex items-center gap-3 px-6 py-[11px] cursor-pointer border-l-2 border-transparent hover:bg-gold/[.06] transition-all" onclick="setPage('analytics',this)">
                <span class="w-5 text-center text-cream/45 text-base flex-shrink-0">📊</span>
                <span class="hide-collapsed text-[12px] tracking-wide text-cream/45 whitespace-nowrap">Analytique</span>
            </a>
            <a class="nav-item group flex items-center gap-3 px-6 py-[11px] cursor-pointer border-l-2 border-transparent hover:bg-gold/[.06] transition-all" onclick="setPage('settings',this)">
                <span class="w-5 text-center text-cream/45 text-base flex-shrink-0">⚙</span>
                <span class="hide-collapsed text-[12px] tracking-wide text-cream/45 whitespace-nowrap">Paramètres</span>
            </a>
        </nav>

        <!-- User -->
        <div class="flex items-center gap-3 px-5 py-4 border-t border-gold/[.12]">
            <div class="w-8 h-8 bg-gold/10 border border-gold/25 flex items-center justify-center text-[10px] text-gold flex-shrink-0">MK</div>
            <div class="hide-collapsed overflow-hidden">
                <div class="text-[12px] text-cream whitespace-nowrap">Laarif</div>
                <div class="text-[10px] text-cream/40">Administrateur</div>
            </div>
        </div>
    </aside>

    <!-- ══ MAIN ══ -->
    <div class="flex-1 flex flex-col overflow-hidden">

        <!-- TOPBAR -->
        <header class="h-[60px] bg-s1 border-b border-gold/[.12] flex items-center px-8 gap-4 flex-shrink-0">
            <h1 id="pageTitle" class="font-display text-xl font-light">Tableau de <em class="italic text-gold">bord</em></h1>
            <div class="flex-1"></div>
            <!-- Search -->
            <div class="flex items-center gap-2 bg-s2 border border-gold/[.12] px-4 py-2 w-52">
                <span class="text-cream/30 text-sm">🔍</span>
                <input type="text" placeholder="Rechercher…" class="bg-transparent border-0 outline-none text-[12px] text-cream placeholder-cream/25 w-full font-body" />
            </div>
            <!-- Actions -->
            <div class="flex items-center gap-2">
                <button onclick="toggleNotif()" class="relative w-9 h-9 border border-gold/[.12] flex items-center justify-center text-cream/40 hover:border-gold/35 hover:text-gold transition-all text-sm">
                    🔔<span class="absolute top-1.5 right-1.5 w-1.5 h-1.5 bg-gold rounded-full"></span>
                </button>
                <button onclick="toggleFS()" class="w-9 h-9 border border-gold/[.12] flex items-center justify-center text-cream/40 hover:border-gold/35 hover:text-gold transition-all text-sm">⛶</button>
                <button onclick="window.location.href='login.html'" class="w-9 h-9 border border-gold/[.12] flex items-center justify-center text-cream/40 hover:border-gold/35 hover:text-gold transition-all text-sm">⏻</button>
            </div>
            <div id="topDate" class="text-[11px] text-cream/35 pl-3 border-l border-gold/[.1]"></div>
        </header>