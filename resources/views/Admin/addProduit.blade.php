@include('Component.header')

    <!-- ══ MAIN COLUMN ══ -->
    <div class="main-col">
        <!-- TOPBAR (fixed at top, never scrolls) -->

        <!-- ══ SCROLLABLE CONTENT ══ -->
        <div class="page-scroll">

            <!-- Page header -->
            <div style="margin-bottom:2rem;" class="fade-up">
                <span style="display:block;font-size:10px;letter-spacing:.35em;text-transform:uppercase;color:#C8A96E;margin-bottom:8px;">Gestion du menu</span>
                <h1 style="font-family:'Cormorant Garamond',serif;font-weight:300;font-size:2.2rem;line-height:1.1;">Ajouter un <em style="font-style:italic;color:#C8A96E;">item</em></h1>
                <p style="font-size:12px;color:rgba(245,240,232,.35);margin-top:8px;">Remplissez le formulaire pour ajouter un nouveau plat, entrée ou boisson à la carte.</p>
            </div>
@include('Component.HandleMessages')
            <!-- MAIN GRID -->
            <form style="display:grid;grid-template-columns:1fr 1fr 1fr;gap:24px;" action="{{route('create')}}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- LEFT col-span-2 -->
                <div style="grid-column: span 2; display:flex; flex-direction:column; gap:20px;">

                    <!-- Basic Info -->
                    <div style="background:#111111;border:1px solid rgba(200,169,110,.1);" class="fade-up">
                        <div style="display:flex;align-items:center;justify-content:space-between;padding:16px 24px;border-bottom:1px solid rgba(200,169,110,.1);">
                            <span style="font-size:11px;letter-spacing:.2em;text-transform:uppercase;color:rgba(245,240,232,.4);">Informations générales</span>
                            <span style="font-size:10px;color:rgba(245,240,232,.2);">* Champs requis</span>
                        </div>
                        <div style="padding:24px;display:flex;flex-direction:column;gap:20px;">

                            <!-- Name + Category -->
                            <div style="display:grid;grid-template-columns:1fr 1fr;gap:16px;">
                                <div>
                                    <label style="display:block;font-size:10px;letter-spacing:.25em;text-transform:uppercase;color:rgba(245,240,232,.4);margin-bottom:8px;">Nom du plat *</label>
                                    <input type="text" name="name" id="itemName" placeholder="Ex : Côte de Bœuf Grillée" oninput="updatePreview()" style="padding:12px 16px;" />
                                </div>
                                <div>
                                    <label style="display:block;font-size:10px;letter-spacing:.25em;text-transform:uppercase;color:rgba(245,240,232,.4);margin-bottom:8px;">Catégorie *</label>
                                    <select name="category" id="itemCat" onchange="updatePreview()" style="padding:12px 16px;cursor:pointer;">
                                        <option value="">Sélectionner…</option>
                                        <option value="entrees">🥗 Entrées</option>
                                        <option value="plats">🍖 Plats principaux</option>
                                        <option value="desserts">🍮 Desserts</option>
                                        <option value="boissons">🍷 Boissons</option>
                                        <option value="suggestions">⭐ Suggestions du Chef</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Description -->
                            <div>
                                <label style="display:block;font-size:10px;letter-spacing:.25em;text-transform:uppercase;color:rgba(245,240,232,.4);margin-bottom:8px;">Description *</label>
                                <textarea name="description" id="itemDesc" rows="3" placeholder="Décrivez les ingrédients, la préparation, les saveurs…" oninput="updatePreview();updateChar()" style="padding:12px 16px;"></textarea>
                                <div style="display:flex;justify-content:flex-end;margin-top:4px;">
                                    <span id="charCount" style="font-size:10px;color:rgba(245,240,232,.2);">0 / 200</span>
                                </div>
                            </div>

                            <!-- Price + Prep time -->
                            <div style="display:grid;grid-template-columns:1fr 1fr 1fr;gap:16px;">
                                <div>
                                    <label style="display:block;font-size:10px;letter-spacing:.25em;text-transform:uppercase;color:rgba(245,240,232,.4);margin-bottom:8px;">Prix (MAD) *</label>
                                    <div style="position:relative;">
                                        <input type="number" name="prix" id="itemPrice" placeholder="0" min="0" oninput="updatePreview()" style="padding:12px 48px 12px 16px;" />
                                        <span style="position:absolute;right:14px;top:50%;transform:translateY(-50%);font-size:11px;color:rgba(245,240,232,.3);letter-spacing:.05em;pointer-events:none;">MAD</span>
                                    </div>
                                </div>
                                <div>
                                    <label style="display:block;font-size:10px;letter-spacing:.25em;text-transform:uppercase;color:rgba(245,240,232,.4);margin-bottom:8px;">Temps prépa. (min)</label>
                                    <div style="position:relative;">
                                        <input type="number" name="temp_prepa" id="itemTime" placeholder="30" min="0" style="padding:12px 44px 12px 16px;" />
                                        <span style="position:absolute;right:14px;top:50%;transform:translateY(-50%);font-size:11px;color:rgba(245,240,232,.3);pointer-events:none;">min</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- Image upload -->
                    <div style="background:#111111;border:1px solid rgba(200,169,110,.1);" class="fade-up">
                        <div style="padding:16px 24px;border-bottom:1px solid rgba(200,169,110,.1);">
                            <span style="font-size:11px;letter-spacing:.2em;text-transform:uppercase;color:rgba(245,240,232,.4);">Photo du plat</span>
                        </div>
                        <div style="padding:24px;">
                            <div class="drop-zone" id="dropZone" style="padding:40px;text-align:center;"
                                onclick="document.getElementById('fileInput').click()"
                                ondragover="event.preventDefault();this.classList.add('drag-over')"
                                ondragleave="this.classList.remove('drag-over')"
                                ondrop="handleDrop(event)">
                                <div style="font-size:2rem;margin-bottom:12px;opacity:.3;">📷</div>
                                <div style="font-size:12px;color:rgba(245,240,232,.35);margin-bottom:4px;">Glissez une image ici ou <span style="color:#C8A96E;">cliquez pour parcourir</span></div>
                                <div style="font-size:10px;color:rgba(245,240,232,.2);">JPG, PNG, WEBP · max 5 MB · min 800×600px recommandé</div>
                                <input type="file" id="fileInput" name="image" style="display:none;" accept="image/*" onchange="handleFile(this)" />
                            </div>
                            <div id="imagePreviewWrap" style="display:none;margin-top:16px;display:none;gap:16px;align-items:flex-start;">
                                <img id="imagePreview" src="" alt="preview" style="width:96px;height:96px;object-fit:cover;border:1px solid rgba(200,169,110,.2);" />
                                <div>
                                    <p id="imgName" style="font-size:12px;margin-bottom:4px;"></p>
                                    <p id="imgSize" style="font-size:10px;color:rgba(245,240,232,.3);margin-bottom:12px;"></p>
                                    <button type="button" onclick="removeImage()" style="font-size:10px;letter-spacing:.1em;text-transform:uppercase;color:rgba(200,110,110,.7);background:none;border:none;cursor:pointer;">Supprimer</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div><!-- end left -->

                <!-- RIGHT col -->
                <div style="display:flex;flex-direction:column;gap:20px;">

                    <!-- Status -->
                    <div style="background:#111111;border:1px solid rgba(200,169,110,.1);" class="fade-up">
                        <div style="padding:16px 20px;border-bottom:1px solid rgba(200,169,110,.1);">
                            <span style="font-size:11px;letter-spacing:.2em;text-transform:uppercase;color:rgba(245,240,232,.4);">Publication</span>
                        </div>
                        <div style="padding:20px;display:flex;flex-direction:column;gap:16px;">
                            <div>
                                <label style="display:block;font-size:10px;letter-spacing:.2em;text-transform:uppercase;color:rgba(245,240,232,.35);margin-bottom:8px;">Statut</label>
                                <select name="status" style="padding:12px 16px;cursor:pointer;">
                                    <option value="disponible">✅ Disponible</option>
                                    <option value="Temporairement indisponible">⏸ Temporairement indisponible</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Preview card -->
                    <div style="background:#111111;border:1px solid rgba(200,169,110,.1);" class="fade-up">
                        <div style="padding:16px 20px;border-bottom:1px solid rgba(200,169,110,.1);">
                            <span style="font-size:11px;letter-spacing:.2em;text-transform:uppercase;color:rgba(245,240,232,.4);">Aperçu carte</span>
                        </div>
                        <div style="padding:20px;">
                            <div style="background:#161616;border:1px solid rgba(200,169,110,.1);padding:16px;">
                                <div id="prevCat" style="font-size:9px;letter-spacing:.25em;text-transform:uppercase;color:rgba(200,169,110,.6);margin-bottom:6px;">Catégorie</div>
                                <div id="prevName" style="font-family:'Cormorant Garamond',serif;font-size:1.2rem;font-weight:300;margin-bottom:6px;color:rgba(245,240,232,.4);">Nom du plat</div>
                                <div id="prevDesc" style="font-size:11px;color:rgba(245,240,232,.25);line-height:1.6;margin-bottom:12px;">Description du plat…</div>
                                <div style="display:flex;align-items:center;justify-content:space-between;padding-top:10px;border-top:1px solid rgba(200,169,110,.08);">
                                    <span id="prevPrice" style="font-family:'Cormorant Garamond',serif;font-size:1.3rem;color:rgba(200,169,110,.4);">— <span style="font-size:.8rem;color:rgba(245,240,232,.2);">MAD</span></span>
                                    <span id="prevTime" style="font-size:10px;color:rgba(245,240,232,.2);">⏱ — min</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Action buttons -->
                    <div style="display:flex;flex-direction:column;gap:10px;" class="fade-up">
                        <button type="submit" name="action" value="publish"
                            style="width:100%;padding:16px;background:#C8A96E;color:#0B0B0B;font-size:11px;letter-spacing:.25em;text-transform:uppercase;font-family:'Jost',sans-serif;border:none;cursor:pointer;font-weight:600;transition:background .2s;"
                            onmouseover="this.style.background='#d4b87c'" onmouseout="this.style.background='#C8A96E'">
                            ✓ Publier l'item
                        </button>
                        <button type="submit" name="action" value="draft"
                            style="width:100%;padding:12px;border:1px solid rgba(200,169,110,.2);color:rgba(245,240,232,.5);font-size:11px;letter-spacing:.2em;text-transform:uppercase;font-family:'Jost',sans-serif;background:transparent;cursor:pointer;transition:all .2s;"
                            onmouseover="this.style.borderColor='rgba(200,169,110,.4)';this.style.color='rgba(245,240,232,.8)'" onmouseout="this.style.borderColor='rgba(200,169,110,.2)';this.style.color='rgba(245,240,232,.5)'">
                            Enregistrer brouillon
                        </button>
                        <a href="{{route('Dashboard')}}"
                            style="width:100%;padding:12px;border:1px solid rgba(245,240,232,.06);color:rgba(245,240,232,.25);font-size:11px;letter-spacing:.2em;text-transform:uppercase;font-family:'Jost',sans-serif;text-align:center;text-decoration:none;display:block;transition:all .2s;box-sizing:border-box;"
                            onmouseover="this.style.borderColor='rgba(245,240,232,.12)';this.style.color='rgba(245,240,232,.45)'" onmouseout="this.style.borderColor='rgba(245,240,232,.06)';this.style.color='rgba(245,240,232,.25)'">
                            Annuler
                        </a>
                    </div>

                </div><!-- end right -->

            </form>

            <!-- bottom spacer -->
            <div style="height:2rem;"></div>

        </div><!-- end page-scroll -->

    </div><!-- end main-col -->

</div><!-- end layout -->

<!-- SUCCESS TOAST -->
<div id="toast" style="position:fixed;bottom:32px;right:32px;background:#161616;border:1px solid rgba(110,200,138,.3);padding:16px 24px;display:flex;align-items:center;gap:12px;z-index:50;transform:translateY(20px);opacity:0;transition:all .5s;pointer-events:none;">
    <span style="color:#6EC88A;font-size:18px;">✓</span>
    <div>
        <div style="font-size:13px;color:#F5F0E8;">Item ajouté avec succès</div>
        <div style="font-size:10px;color:rgba(245,240,232,.35);">Visible sur la carte immédiatement</div>
    </div>
</div>


</body>
</html>