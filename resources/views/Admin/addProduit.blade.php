<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ajouter un item | La Maison</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
            animation: fadeUp .4s ease forwards;
            opacity: 0;
        }

        .fade-up:nth-child(1) {
            animation-delay: .04s;
        }

        .fade-up:nth-child(2) {
            animation-delay: .1s;
        }

        .fade-up:nth-child(3) {
            animation-delay: .16s;
        }

        input[type=range] {
            -webkit-appearance: none;
            width: 100%;
            height: 2px;
            background: rgba(200, 169, 110, .2);
            outline: none;
        }

        input[type=range]::-webkit-slider-thumb {
            -webkit-appearance: none;
            width: 14px;
            height: 14px;
            background: #C8A96E;
            cursor: pointer;
            border-radius: 0;
        }

        .tag-chip {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 3px 10px;
            border: 1px solid rgba(200, 169, 110, .25);
            font-size: 11px;
            color: rgba(245, 240, 232, .6);
            cursor: pointer;
            transition: all .2s;
        }

        .tag-chip.selected {
            background: rgba(200, 169, 110, .12);
            border-color: rgba(200, 169, 110, .6);
            color: #C8A96E;
        }

        .drop-zone {
            border: 1px dashed rgba(200, 169, 110, .25);
            transition: all .3s;
        }

        .drop-zone.drag-over {
            border-color: rgba(200, 169, 110, .7);
            background: rgba(200, 169, 110, .04);
        }

        .preview-card {
            background: #161616;
            border: 1px solid rgba(200, 169, 110, .12);
        }

        /* toggle switch */
        .toggle-wrap input {
            display: none;
        }

        .toggle-track {
            width: 36px;
            height: 20px;
            background: rgba(255, 255, 255, .1);
            border: 1px solid rgba(200, 169, 110, .2);
            position: relative;
            cursor: pointer;
            transition: background .2s;
        }

        .toggle-thumb {
            position: absolute;
            top: 2px;
            left: 2px;
            width: 14px;
            height: 14px;
            background: rgba(245, 240, 232, .3);
            transition: all .25s;
        }

        .toggle-wrap input:checked+.toggle-track {
            background: rgba(200, 169, 110, .2);
            border-color: rgba(200, 169, 110, .6);
        }

        .toggle-wrap input:checked+.toggle-track .toggle-thumb {
            left: 18px;
            background: #C8A96E;
        }

        /* number input */
        input[type=number]::-webkit-inner-spin-button {
            -webkit-appearance: none;
        }
    </style>
</head>

<body class="bg-dark text-cream font-body flex" style="font-size:14px;">

    <!-- ══ SIDEBAR ══ -->
    @include('Component.header')
    <!-- ══ MAIN ══ -->
    <div class="flex-1 flex flex-col overflow-hidden">

        <!-- TOPBAR -->
        <header class="h-[60px] bg-s1 border-b border-gold/[.12] flex items-center px-8 gap-4 flex-shrink-0">
            <div class="flex items-center gap-3">
                <a href="admin.html" class="text-cream/30 hover:text-gold transition-colors text-sm no-underline">⊞</a>
                <span class="text-cream/20 text-xs">/</span>
                <span class="text-cream/30 text-[12px]">Menu</span>
                <span class="text-cream/20 text-xs">/</span>
                <span class="text-[12px] text-gold">Ajouter un item</span>
            </div>
            <div class="flex-1"></div>
            <a href="admin.html" class="text-[11px] tracking-[.15em] uppercase text-cream/35 hover:text-gold transition-colors border border-gold/[.12] px-4 py-2 no-underline hover:border-gold/30">← Retour</a>
            <div id="topDate" class="text-[11px] text-cream/30 pl-3 border-l border-gold/[.1]"></div>
        </header>

        <!-- CONTENT -->
@include('Component.HandleMessages')
                <!-- Page header -->
                <div class="mb-8 fade-up">
                    <span class="block text-[10px] tracking-[.35em] uppercase text-gold mb-2">Gestion du menu</span>
                    <h1 class="font-display font-light text-[2.2rem] leading-tight">Ajouter un <em class="italic text-gold">item</em></h1>
                    <p class="text-[12px] text-cream/35 mt-2">Remplissez le formulaire pour ajouter un nouveau plat, entrée ou boisson à la carte.</p>
                </div>

                <!-- MAIN GRID -->
                <form class="grid grid-cols-3 gap-6" action="{{route('create')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- LEFT: main form (col-span-2) -->
                    <div class="col-span-2 flex flex-col gap-5">

                        <!-- Basic Info -->
                        <div class="bg-s1 border border-gold/[.1] fade-up">
                            <div class="flex items-center justify-between px-6 py-4 border-b border-gold/[.1]">
                                <span class="text-[11px] tracking-[.2em] uppercase text-cream/40">Informations générales</span>
                                <span class="text-[10px] text-cream/20">* Champs requis</span>
                            </div>
                            <div class="p-6 flex flex-col gap-5">

                                <!-- Name + Category row -->
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-[10px] tracking-[.25em] uppercase text-cream/40 mb-2">Nom du plat *</label>
                                        <input id="itemName" type="text" name="name" placeholder="Ex : Côte de Bœuf Grillée" oninput="updatePreview()"
                                            class="w-full bg-s2 border border-gold/[.12] px-4 py-3 text-[13px] text-cream placeholder-cream/20 outline-none focus:border-gold/50 transition-colors font-body" />
                                    </div>
                                    <div>
                                        <label class="block text-[10px] tracking-[.25em] uppercase text-cream/40 mb-2">Catégorie *</label>
                                        <select id="itemCat" onchange="updatePreview()" name="category"
                                            class="w-full bg-s2 border border-gold/[.12] px-4 py-3 text-[13px] text-cream outline-none focus:border-gold/50 transition-colors font-body cursor-pointer">
                                            <option value="" class="bg-s2">Sélectionner…</option>
                                            <option value="entrees" class="bg-s2">🥗 Entrées</option>
                                            <option value="plats" class="bg-s2">🍖 Plats principaux</option>
                                            <option value="desserts" class="bg-s2">🍮 Desserts</option>
                                            <option value="boissons" class="bg-s2">🍷 Boissons</option>
                                            <option value="suggestions" class="bg-s2">⭐ Suggestions du Chef</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Description -->
                                <div>
                                    <label class="block text-[10px] tracking-[.25em] uppercase text-cream/40 mb-2">Description *</label>
                                    <textarea id="itemDesc" name="description" rows="3"
                                        placeholder="Décrivez les ingrédients, la préparation, les saveurs…" oninput="updatePreview()"
                                        class="w-full bg-s2 border border-gold/[.12] px-4 py-3 text-[13px] text-cream placeholder-cream/20 outline-none focus:border-gold/50 transition-colors resize-none font-body"></textarea>
                                    <div class="flex justify-end mt-1">
                                        <span id="charCount" class="text-[10px] text-cream/20">0 / 200</span>
                                    </div>
                                </div>

                                <!-- Price + prep time -->
                                <div class="grid grid-cols-3 gap-4">
                                    <div>
                                        <label class="block text-[10px] tracking-[.25em] uppercase text-cream/40 mb-2">Prix (MAD) *</label>
                                        <div class="relative">
                                            <input id="itemPrice" name="prix" type="number" placeholder="0" min="0" oninput="updatePreview()"
                                                class="w-full bg-s2 border border-gold/[.12] px-4 py-3 text-[13px] text-cream placeholder-cream/20 outline-none focus:border-gold/50 transition-colors font-body pr-14" />
                                            <span class="absolute right-4 top-1/2 -translate-y-1/2 text-[11px] text-cream/30 tracking-wide">MAD</span>
                                        </div>
                                    </div>
                                    <div>
                                        <label class="block text-[10px] tracking-[.25em] uppercase text-cream/40 mb-2">Temps prépa. (min)</label>
                                        <div class="relative">
                                            <input id="itemTime" type="number" name="temp_prepa" placeholder="30" min="0"
                                                class="w-full bg-s2 border border-gold/[.12] px-4 py-3 text-[13px] text-cream placeholder-cream/20 outline-none focus:border-gold/50 transition-colors font-body pr-12" />
                                            <span class="absolute right-4 top-1/2 -translate-y-1/2 text-[11px] text-cream/30">min</span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- Image upload -->
                        <div class="bg-s1 border border-gold/[.1] fade-up">
                            <div class="px-6 py-4 border-b border-gold/[.1]">
                                <span class="text-[11px] tracking-[.2em] uppercase text-cream/40">Photo du plat</span>
                            </div>
                            <div class="p-6">
                                <div id="dropZone"
                                    class="drop-zone p-10 text-center cursor-pointer hover:border-gold/50 hover:bg-gold/[.02] transition-all"
                                    onclick="document.getElementById('fileInput').click()"
                                    ondragover="event.preventDefault();this.classList.add('drag-over')"
                                    ondragleave="this.classList.remove('drag-over')"
                                    ondrop="handleDrop(event)">
                                    <div class="text-3xl mb-3 opacity-30">📷</div>
                                    <div class="text-[12px] text-cream/35 mb-1">Glissez une image ici ou <span class="text-gold">cliquez pour parcourir</span></div>
                                    <div class="text-[10px] text-cream/20">JPG, PNG, WEBP · max 5 MB · min 800×600px recommandé</div>
                                    <input type="file" id="fileInput" name="image" class="hidden" accept="image/*" onchange="handleFile(this)" />
                                </div>
                                <div id="imagePreviewWrap" class="hidden mt-4 flex gap-4 items-start">
                                    <img id="imagePreview" src="" alt="preview" class="w-24 h-24 object-cover border border-gold/[.2]" />
                                    <div>
                                        <p id="imgName" class="text-[12px] text-cream mb-1"></p>
                                        <p id="imgSize" class="text-[10px] text-cream/30 mb-3"></p>
                                        <button type="button" onclick="removeImage()"
                                            class="text-[10px] tracking-wide uppercase text-cred/70 hover:text-cred bg-transparent border-0 cursor-pointer">Supprimer</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- RIGHT: settings + preview -->
                    <div class="flex flex-col gap-5">

                        <!-- Status & Visibility -->
                        <div class="bg-s1 border border-gold/[.1] fade-up">
                            <div class="px-5 py-4 border-b border-gold/[.1]">
                                <span class="text-[11px] tracking-[.2em] uppercase text-cream/40">Publication</span>
                            </div>
                            <div class="p-5 flex flex-col gap-4">
                                <div>
                                    <label class="block text-[10px] tracking-[.2em] uppercase text-cream/35 mb-2">Statut</label>
                                    <select name="status"
                                        class="w-full bg-s2 border border-gold/[.12] px-4 py-3 text-[12px] text-cream outline-none focus:border-gold/50 font-body cursor-pointer">
                                        <option value="disponible" class="bg-s2">✅ Disponible</option>
                                        <option value="Temporairement indisponible" class="bg-s2">⏸ Temporairement indisponible</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Action buttons -->
                        <div class="flex flex-col gap-2.5 fade-up">
                            <button type="submit" name="action" value="publish"
                                class="w-full py-4 bg-gold text-dark text-[11px] tracking-[.25em] uppercase font-body border-0 cursor-pointer hover:bg-gold-h transition-all font-semibold">
                                ✓ Publier l'item
                            </button>
                            <button type="submit" name="action" value="draft"
                                class="w-full py-3 border border-gold/[.2] text-cream/50 text-[11px] tracking-[.2em] uppercase font-body bg-transparent cursor-pointer hover:border-gold/40 hover:text-cream transition-all">
                                Enregistrer brouillon
                            </button>
                            <a href="{{route('Dashboard')}}"
                                class="w-full py-3 border border-cream/[.06] text-cream/25 text-[11px] tracking-[.2em] uppercase font-body text-center no-underline hover:border-cream/10 hover:text-cream/40 transition-all block">
                                Annuler
                            </a>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- SUCCESS TOAST -->
    <div id="toast" class="fixed bottom-8 right-8 bg-s2 border border-cgreen/30 px-6 py-4 flex items-center gap-3 z-50 translate-y-20 opacity-0 transition-all duration-500 pointer-events-none">
        <span class="text-cgreen text-lg">✓</span>
        <div>
            <div class="text-[13px] text-cream">Item ajouté avec succès</div>
            <div class="text-[10px] text-cream/35">Visible sur la carte immédiatement</div>
        </div>
    </div>


</body>

</html>