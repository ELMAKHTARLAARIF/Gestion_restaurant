{{-- resources/views/Admin/edit-item.blade.php --}}
@include('Component.header')

<!-- ══ MAIN COLUMN ══ -->
<div class="main-col">

    <!-- ══ SCROLLABLE CONTENT ══ -->
    <div class="page-scroll">

        <!-- Page header -->
        <div style="margin-bottom:2rem;" class="fade-up">
            <span style="display:block;font-size:10px;letter-spacing:.35em;text-transform:uppercase;color:#C8A96E;margin-bottom:8px;">Gestion du menu</span>
            <h1 style="font-family:'Cormorant Garamond',serif;font-weight:300;font-size:2.2rem;line-height:1.1;">
                Modifier l' <em style="font-style:italic;color:#C8A96E;">item</em>
            </h1>
            <p style="font-size:12px;color:rgba(245,240,232,.35);margin-top:8px;">
                Modifiez les informations de <strong style="color:rgba(245,240,232,.6);">{{ $item->name }}</strong> puis enregistrez.
            </p>
        </div>

        @include('Component.HandleMessages')

        <!-- CURRENT STATUS BANNER -->
        <div style="display:flex;align-items:center;gap:12px;background:#111111;border:1px solid rgba(200,169,110,.1);padding:14px 20px;margin-bottom:24px;" class="fade-up">
            <div style="width:8px;height:8px;border-radius:50%;background:{{ $item->status === 'disponible' ? '#6EC88A' : 'rgba(200,169,110,.6)' }};flex-shrink:0;"></div>
            <span style="font-size:11px;color:rgba(245,240,232,.4);letter-spacing:.05em;">
                Statut actuel :
                <strong style="color:{{ $item->status === 'disponible' ? '#6EC88A' : '#C8A96E' }}`>
                    {{ $item->status === 'disponible' ? 'Disponible sur la carte' : 'Temporairement indisponible' }}
                </strong>
            </span>
            <div style="flex:1;"></div>
            <a href="{{ route('show_items') }}" style="font-size:10px;letter-spacing:.15em;text-transform:uppercase;color:rgba(200,169,110,.5);text-decoration:none;hover:color:#C8A96E;">← Retour aux items</a>
        </div>

        <!-- MAIN GRID -->
        <form
            style="display:grid;grid-template-columns:1fr 1fr 1fr;gap:24px;"
            action="{{ route('update', $item->id) }}"
            method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- ═══ LEFT — col-span-2 ═══ -->
            <div style="grid-column:span 2;display:flex;flex-direction:column;gap:20px;">

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
                                <input
                                    type="text"
                                    name="name"
                                    id="itemName"
                                    value="{{ old('name', $item->name) }}"
                                    placeholder="Ex : Côte de Bœuf Grillée"
                                    oninput="updatePreview()"
                                    style="padding:12px 16px;"
                                    required />
                                @error('name')<p style="font-size:10px;color:#C86E6E;margin-top:4px;">{{ $message }}</p>@enderror
                            </div>
                            <div>
                                <label style="display:block;font-size:10px;letter-spacing:.25em;text-transform:uppercase;color:rgba(245,240,232,.4);margin-bottom:8px;">Catégorie *</label>
                                <select name="category_id" id="itemCat" onchange="updatePreview()" style="padding:12px 16px;cursor:pointer;" required>
                                    <option value="">Sélectionner…</option>
                                    <option value="{{$category->id }}" {{ old('category_id', $item->category_id) == $category->id ? 'selected' : '' }}>
                                        {{$category->name }}
                                    </option>

                                </select>
                                @error('category_id')<p style="font-size:10px;color:#C86E6E;margin-top:4px;">{{ $message }}</p>@enderror
                            </div>
                        </div>

                        <!-- Description -->
                        <div>
                            <label style="display:block;font-size:10px;letter-spacing:.25em;text-transform:uppercase;color:rgba(245,240,232,.4);margin-bottom:8px;">Description *</label>
                            <textarea
                                name="description"
                                id="itemDesc"
                                rows="3"
                                maxlength="200"
                                placeholder="Décrivez les ingrédients, la préparation, les saveurs…"
                                oninput="updatePreview();updateChar()"
                                style="padding:12px 16px;"
                                required>{{ old('description', $item->description) }}</textarea>
                            <div style="display:flex;justify-content:flex-end;margin-top:4px;">
                                <span id="charCount" style="font-size:10px;color:rgba(245,240,232,.2);">{{ strlen(old('description', $item->description)) }} / 200</span>
                            </div>
                            @error('description')<p style="font-size:10px;color:#C86E6E;margin-top:4px;">{{ $message }}</p>@enderror
                        </div>

                        <!-- Price + Prep time -->
                        <div style="display:grid;grid-template-columns:1fr 1fr 1fr;gap:16px;">
                            <div>
                                <label style="display:block;font-size:10px;letter-spacing:.25em;text-transform:uppercase;color:rgba(245,240,232,.4);margin-bottom:8px;">Prix (MAD) *</label>
                                <div style="position:relative;">
                                    <input
                                        type="number"
                                        name="prix"
                                        id="itemPrice"
                                        value="{{ old('prix', $item->prix) }}"
                                        placeholder="0"
                                        min="0"
                                        step="0.01"
                                        oninput="updatePreview()"
                                        style="padding:12px 48px 12px 16px;"
                                        required />
                                    <span style="position:absolute;right:14px;top:50%;transform:translateY(-50%);font-size:11px;color:rgba(245,240,232,.3);letter-spacing:.05em;pointer-events:none;">MAD</span>
                                </div>
                                @error('prix')<p style="font-size:10px;color:#C86E6E;margin-top:4px;">{{ $message }}</p>@enderror
                            </div>
                            <div>
                                <label style="display:block;font-size:10px;letter-spacing:.25em;text-transform:uppercase;color:rgba(245,240,232,.4);margin-bottom:8px;">Temps prépa. (min)</label>
                                <div style="position:relative;">
                                    <input
                                        type="number"
                                        name="temp_prepa"
                                        id="itemTime"
                                        value="{{ old('temp_prepa', $item->temp_prepa) }}"
                                        placeholder="{{ old('temp_prepa', $item->temp_prepa) }}"
                                        min="0"
                                        max="600"
                                        style="padding:12px 44px 12px 16px;" />
                                    <span style="position:absolute;right:14px;top:50%;transform:translateY(-50%);font-size:11px;color:rgba(245,240,232,.3);pointer-events:none;">min</span>
                                </div>
                                @error('temp_prepa')<p style="font-size:10px;color:#C86E6E;margin-top:4px;">{{ $message }}</p>@enderror
                            </div>
                            <div>
                                <label style="display:block;font-size:10px;letter-spacing:.25em;text-transform:uppercase;color:rgba(245,240,232,.4);margin-bottom:8px;">Statut</label>
                                <select name="status" style="padding:12px 16px;cursor:pointer;">
                                    <option value="disponible" {{ old('status', $item->status) === 'disponible'                    ? 'selected' : '' }}>✅ Disponible</option>
                                    <option value="Temporairement indisponible" {{ old('status', $item->status) === 'Temporairement indisponible'   ? 'selected' : '' }}>⏸ Temporairement indisponible</option>
                                </select>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Image upload -->
                <div style="background:#111111;border:1px solid rgba(200,169,110,.1);" class="fade-up">
                    <div style="display:flex;align-items:center;justify-content:space-between;padding:16px 24px;border-bottom:1px solid rgba(200,169,110,.1);">
                        <span style="font-size:11px;letter-spacing:.2em;text-transform:uppercase;color:rgba(245,240,232,.4);">Photo du plat</span>
                        @if($item->image)
                        <span style="font-size:10px;color:rgba(200,169,110,.5);">Image actuelle · laisser vide pour conserver</span>
                        @endif
                    </div>
                    <div style="padding:24px;">

                        {{-- Current image --}}
                        @if($item->image)
                        <div style="display:flex;align-items:flex-start;gap:16px;padding:16px;background:#161616;border:1px solid rgba(200,169,110,.1);margin-bottom:16px;">
                            <img
                                src="{{ asset('storage/' . $item->image) }}"
                                alt="{{ $item->name }}"
                                style="width:96px;height:96px;object-fit:cover;border:1px solid rgba(200,169,110,.15);flex-shrink:0;" />
                            <div>
                                <p style="font-size:11px;color:rgba(245,240,232,.5);margin-bottom:4px;letter-spacing:.05em;">Image actuelle</p>
                                <p style="font-size:10px;color:rgba(245,240,232,.22);margin-bottom:10px;">{{ basename($item->image) }}</p>
                                <label style="display:flex;align-items:center;gap:8px;cursor:pointer;">
                                    <input type="checkbox" name="remove_image" value="1" id="removeImg"
                                        style="width:14px;height:14px;accent-color:#C86E6E;"
                                        onchange="document.getElementById('removeLabel').style.color = this.checked ? '#C86E6E' : 'rgba(245,240,232,.35)'" />
                                    <span id="removeLabel" style="font-size:10px;letter-spacing:.1em;text-transform:uppercase;color:rgba(245,240,232,.35);">Supprimer l'image actuelle</span>
                                </label>
                            </div>
                        </div>
                        @endif

                        {{-- Drop zone --}}
                        <div class="drop-zone" id="dropZone" style="padding:40px;text-align:center;"
                            onclick="document.getElementById('fileInput').click()"
                            ondragover="event.preventDefault();this.classList.add('drag-over')"
                            ondragleave="this.classList.remove('drag-over')"
                            ondrop="handleDrop(event)">
                            <div style="font-size:2rem;margin-bottom:12px;opacity:.3;">📷</div>
                            <div style="font-size:12px;color:rgba(245,240,232,.35);margin-bottom:4px;">
                                Glissez une <strong style="color:#C8A96E;">nouvelle image</strong> ici ou cliquez pour parcourir
                            </div>
                            <div style="font-size:10px;color:rgba(245,240,232,.2);">JPG, PNG, WEBP · max 5 MB · min 800×600px recommandé</div>
                            <input type="file" id="fileInput" name="image" style="display:none;" accept="image/*" onchange="handleFile(this)" />
                        </div>

                        {{-- New image preview --}}
                        <div id="imagePreviewWrap" style="display:none;margin-top:16px;gap:16px;align-items:flex-start;">
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


            <!-- ═══ RIGHT col ═══ -->
            <div style="display:flex;flex-direction:column;gap:20px;">

                <!-- Preview card -->
                <div style="background:#111111;border:1px solid rgba(200,169,110,.1);" class="fade-up">
                    <div style="padding:16px 20px;border-bottom:1px solid rgba(200,169,110,.1);">
                        <span style="font-size:11px;letter-spacing:.2em;text-transform:uppercase;color:rgba(245,240,232,.4);">Aperçu carte</span>
                    </div>
                    <div style="padding:20px;">
                        <div style="background:#161616;border:1px solid rgba(200,169,110,.1);padding:16px;">
                            {{-- Live image preview on top if image exists --}}
                            <div id="prevImgWrap" style="{{ $item->image ? '' : 'display:none;' }}margin-bottom:12px;">
                                <img id="prevImg"
                                    src="{{ $item->image ? asset('storage/'.$item->image) : '' }}"
                                    alt=""
                                    style="width:100%;height:120px;object-fit:cover;border:1px solid rgba(200,169,110,.1);" />
                            </div>
                            <div id="prevCat" style="font-size:9px;letter-spacing:.25em;text-transform:uppercase;color:rgba(200,169,110,.6);margin-bottom:6px;">
                                {{ $item->category->name ?? 'Catégorie' }}
                            </div>
                            <div id="prevName" style="font-family:'Cormorant Garamond',serif;font-size:1.2rem;font-weight:300;margin-bottom:6px;color:#F5F0E8;">
                                {{ $item->name }}
                            </div>
                            <div id="prevDesc" style="font-size:11px;color:rgba(245,240,232,.35);line-height:1.6;margin-bottom:12px;">
                                {{ $item->description }}
                            </div>
                            <div style="display:flex;align-items:center;justify-content:space-between;padding-top:10px;border-top:1px solid rgba(200,169,110,.08);">
                                <span id="prevPrice" style="font-family:'Cormorant Garamond',serif;font-size:1.3rem;color:#C8A96E;">
                                    {{ $item->prix }} <span style="font-size:.8rem;color:rgba(245,240,232,.25);">MAD</span>
                                </span>
                                <span id="prevTime" style="font-size:10px;color:rgba(245,240,232,.25);">
                                    ⏱ {{ $item->temp_prepa ?? '—' }} min
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Metadata card -->
                <div style="background:#111111;border:1px solid rgba(200,169,110,.1);" class="fade-up">
                    <div style="padding:16px 20px;border-bottom:1px solid rgba(200,169,110,.1);">
                        <span style="font-size:11px;letter-spacing:.2em;text-transform:uppercase;color:rgba(245,240,232,.4);">Métadonnées</span>
                    </div>
                    <div style="padding:20px;display:flex;flex-direction:column;gap:12px;">
                        <div style="display:flex;justify-content:space-between;align-items:center;">
                            <span style="font-size:10px;color:rgba(245,240,232,.28);letter-spacing:.1em;text-transform:uppercase;">ID</span>
                            <span style="font-size:12px;color:rgba(245,240,232,.45);font-family:'Cormorant Garamond',serif;">#{{ $item->id }}</span>
                        </div>
                        <div style="height:1px;background:rgba(200,169,110,.06);"></div>
                        <div style="display:flex;justify-content:space-between;align-items:center;">
                            <span style="font-size:10px;color:rgba(245,240,232,.28);letter-spacing:.1em;text-transform:uppercase;">Créé le</span>
                            <span style="font-size:11px;color:rgba(245,240,232,.4);">{{ $item->created_at->format('d M Y') }}</span>
                        </div>
                        <div style="height:1px;background:rgba(200,169,110,.06);"></div>
                        <div style="display:flex;justify-content:space-between;align-items:center;">
                            <span style="font-size:10px;color:rgba(245,240,232,.28);letter-spacing:.1em;text-transform:uppercase;">Modifié le</span>
                            <span style="font-size:11px;color:rgba(245,240,232,.4);">{{ $item->updated_at->format('d M Y · H:i') }}</span>
                        </div>
                        <div style="height:1px;background:rgba(200,169,110,.06);"></div>
                        <div style="display:flex;justify-content:space-between;align-items:center;">
                            <span style="font-size:10px;color:rgba(245,240,232,.28);letter-spacing:.1em;text-transform:uppercase;">Ajouté par</span>
                            <span style="font-size:11px;color:rgba(245,240,232,.4);">{{ $item->user->name ?? 'Admin' }}</span>
                        </div>
                    </div>
                </div>

                <!-- Action buttons -->
                <div style="display:flex;flex-direction:column;gap:10px;" class="fade-up">

                    {{-- Save changes --}}
                    <button type="submit" name="action" value="publish"
                        style="width:100%;padding:16px;background:#C8A96E;color:#0B0B0B;font-size:11px;letter-spacing:.25em;text-transform:uppercase;font-family:'Jost',sans-serif;border:none;cursor:pointer;font-weight:600;transition:background .2s;"
                        onmouseover="this.style.background='#d4b87c'" onmouseout="this.style.background='#C8A96E'">
                        ✓ Enregistrer les modifications
                    </button>

                    {{-- Save as draft --}}
                    <button type="submit" name="action" value="draft"
                        style="width:100%;padding:12px;border:1px solid rgba(200,169,110,.2);color:rgba(245,240,232,.5);font-size:11px;letter-spacing:.2em;text-transform:uppercase;font-family:'Jost',sans-serif;background:transparent;cursor:pointer;transition:all .2s;"
                        onmouseover="this.style.borderColor='rgba(200,169,110,.4)';this.style.color='rgba(245,240,232,.8)'" onmouseout="this.style.borderColor='rgba(200,169,110,.2)';this.style.color='rgba(245,240,232,.5)'">
                        Enregistrer brouillon
                    </button>

                    <a href="{{ route('show_items') }}"
                        style="width:100%;padding:12px;border:1px solid rgba(245,240,232,.06);color:rgba(245,240,232,.25);font-size:11px;letter-spacing:.2em;text-transform:uppercase;font-family:'Jost',sans-serif;text-align:center;text-decoration:none;display:block;transition:all .2s;box-sizing:border-box;"
                        onmouseover="this.style.borderColor='rgba(245,240,232,.12)';this.style.color='rgba(245,240,232,.45)'" onmouseout="this.style.borderColor='rgba(245,240,232,.06)';this.style.color='rgba(245,240,232,.25)'">
                        Annuler
                    </a>

                    <div style="height:1px;background:rgba(200,169,110,.06);margin:4px 0;"></div>

                </div>

            </div>

        </form>

        <div style="height:2rem;"></div>

    </div>
</div>

</div>


<!-- SUCCESS TOAST -->
<div id="toast" style="position:fixed;bottom:32px;right:32px;background:#161616;border:1px solid rgba(110,200,138,.3);padding:16px 24px;display:flex;align-items:center;gap:12px;z-index:50;transform:translateY(20px);opacity:0;transition:all .5s;pointer-events:none;">
    <span style="color:#6EC88A;font-size:18px;">✓</span>
    <div>
        <div style="font-size:13px;color:#F5F0E8;">Modifications enregistrées</div>
        <div style="font-size:10px;color:rgba(245,240,232,.35);">Les changements sont visibles sur la carte</div>
    </div>
</div>


<script>
    // ── File handling ──
    function handleFile(input) {
        if (!input.files?.length) return;
        const file = input.files[0];
        showImagePreview(file);
    }

    function handleDrop(event) {
        event.preventDefault();
        document.getElementById('dropZone').classList.remove('drag-over');
        const file = event.dataTransfer.files?.[0];
        if (file && file.type.startsWith('image/')) {
            document.getElementById('fileInput').files = event.dataTransfer.files;
            showImagePreview(file);
        }
    }

</script>

</body>

</html>