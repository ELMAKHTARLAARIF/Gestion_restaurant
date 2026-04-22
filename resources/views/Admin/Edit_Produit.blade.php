{{-- resources/views/Admin/edit-item.blade.php --}}
@include('Component.header')

<div class="main-col">
    <div class="page-scroll">

        {{-- Page header --}}
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


        <div style="display:flex;align-items:center;gap:12px;background:#111111;border:1px solid rgba(200,169,110,.1);padding:14px 20px;margin-bottom:24px;" class="fade-up">
            @if($item->status === 'Disponible')
            <div style="width:8px;height:8px;border-radius:50%;background:#6EC88A;flex-shrink:0;"></div>
            @else
            <div style="width:8px;height:8px;border-radius:50%;background:rgba(200,169,110,.6);flex-shrink:0;"></div>
            @endif

            <span style="font-size:11px;color:rgba(245,240,232,.4);letter-spacing:.05em;">
                Statut actuel :

                @if($item->status === 'Disponible')
                <strong style="color:#6EC88A">
                    Disponible sur la carte
                </strong>
                @else
                <strong style="color:#C8A96E">
                    Temporairement indisponible
                </strong>
                @endif
            </span>

            <div style="flex:1;"></div>

            <a href="{{ route('show_items') }}"
                style="font-size:10px;letter-spacing:.15em;text-transform:uppercase;color:rgba(200,169,110,.5);text-decoration:none;">
                ← Retour aux items
            </a>

        </div>

        {{-- Main grid --}}
        <form
            style="display:grid;grid-template-columns:1fr 1fr 1fr;gap:24px;"
            action="{{ route('update', $item->id) }}"
            method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- LEFT — col-span-2 --}}
            <div style="grid-column:span 2;display:flex;flex-direction:column;gap:20px;">

                {{-- Basic info card --}}
                <div style="background:#111111;border:1px solid rgba(200,169,110,.1);" class="fade-up">
                    <div style="display:flex;align-items:center;justify-content:space-between;padding:16px 24px;border-bottom:1px solid rgba(200,169,110,.1);">
                        <span style="font-size:11px;letter-spacing:.2em;text-transform:uppercase;color:rgba(245,240,232,.4);">Informations générales</span>
                        <span style="font-size:10px;color:rgba(245,240,232,.2);">* Champs requis</span>
                    </div>
                    <div style="padding:24px;display:flex;flex-direction:column;gap:20px;">

                        {{-- Name + Category --}}
                        <div style="display:grid;grid-template-columns:1fr 1fr;gap:16px;">
                            <div>
                                <label style="display:block;font-size:10px;letter-spacing:.25em;text-transform:uppercase;color:rgba(245,240,232,.4);margin-bottom:8px;">Nom du plat *</label>
                                <input
                                    type="text"
                                    name="name"
                                    value="{{ old('name', $item->name) }}"
                                    placeholder="Ex : Côte de Bœuf Grillée"
                                    style="padding:12px 16px;"
                                    required />
                                @error('name')
                                <p style="font-size:10px;color:#C86E6E;margin-top:4px;">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label style="display:block;font-size:10px;letter-spacing:.25em;text-transform:uppercase;color:rgba(245,240,232,.4);margin-bottom:8px;">Catégorie *</label>
                                <select name="category_id" style="padding:12px 16px;cursor:pointer;" required>
                                    <option value="">Sélectionner…</option>
                                    @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}" {{ old('category_id', $item->category_id) == $cat->id ? 'selected' : '' }}>
                                        {{ $cat->name }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <p style="font-size:10px;color:#C86E6E;margin-top:4px;">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        {{-- Description --}}
                        <div>
                            <label style="display:block;font-size:10px;letter-spacing:.25em;text-transform:uppercase;color:rgba(245,240,232,.4);margin-bottom:8px;">Description *</label>
                            <textarea
                                name="description"
                                rows="3"
                                maxlength="200"
                                placeholder="Décrivez les ingrédients, la préparation, les saveurs…"
                                style="padding:12px 16px;"
                                required>{{ old('description', $item->description) }}</textarea>
                            <div style="display:flex;justify-content:flex-end;margin-top:4px;">
                                <span style="font-size:10px;color:rgba(245,240,232,.2);">{{ strlen(old('description', $item->description)) }} / 200</span>
                            </div>
                            @error('description')
                            <p style="font-size:10px;color:#C86E6E;margin-top:4px;">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Price + Prep time + Status --}}
                        <div style="display:grid;grid-template-columns:1fr 1fr 1fr;gap:16px;">
                            <div>
                                <label style="display:block;font-size:10px;letter-spacing:.25em;text-transform:uppercase;color:rgba(245,240,232,.4);margin-bottom:8px;">Prix (MAD) *</label>
                                <div style="position:relative;">
                                    <input
                                        type="number"
                                        name="prix"
                                        value="{{ old('prix', $item->prix) }}"
                                        placeholder="0"
                                        min="0"
                                        step="0.01"
                                        style="padding:12px 48px 12px 16px;"
                                        required />
                                    <span style="position:absolute;right:14px;top:50%;transform:translateY(-50%);font-size:11px;color:rgba(245,240,232,.3);letter-spacing:.05em;pointer-events:none;">MAD</span>
                                </div>
                                @error('prix')
                                <p style="font-size:10px;color:#C86E6E;margin-top:4px;">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label style="display:block;font-size:10px;letter-spacing:.25em;text-transform:uppercase;color:rgba(245,240,232,.4);margin-bottom:8px;">Temps prépa. (min)</label>
                                <div style="position:relative;">
                                    <input
                                        type="number"
                                        name="temp_prepa"
                                        value="{{ old('temp_prepa', $item->temp_prepa) }}"
                                        placeholder="—"
                                        min="0"
                                        max="600"
                                        style="padding:12px 44px 12px 16px;" />
                                    <span style="position:absolute;right:14px;top:50%;transform:translateY(-50%);font-size:11px;color:rgba(245,240,232,.3);pointer-events:none;">min</span>
                                </div>
                                @error('temp_prepa')
                                <p style="font-size:10px;color:#C86E6E;margin-top:4px;">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label style="display:block;font-size:10px;letter-spacing:.25em;text-transform:uppercase;color:rgba(245,240,232,.4);margin-bottom:8px;">Statut</label>
                                <select name="status" style="padding:12px 16px;cursor:pointer;">
                                    <option value="disponible" {{ old('status', $item->status) === 'disponible' ? 'selected' : '' }}>✅ Disponible</option>
                                    <option value="Temporairement indisponible" {{ old('status', $item->status) === 'Temporairement indisponible' ? 'selected' : '' }}>⏸ Temporairement indisponible</option>
                                </select>
                            </div>
                        </div>

                    </div>
                </div>

                {{-- Image upload card --}}
                <div style="background:#111111;border:1px solid rgba(200,169,110,.1);" class="fade-up">
                    <div style="display:flex;align-items:center;justify-content:space-between;padding:16px 24px;border-bottom:1px solid rgba(200,169,110,.1);">
                        <span style="font-size:11px;letter-spacing:.2em;text-transform:uppercase;color:rgba(245,240,232,.4);">Photo du plat</span>
                        @if($item->image)
                        <span style="font-size:10px;color:rgba(200,169,110,.5);">Laisser vide pour conserver l'image actuelle</span>
                        @endif
                    </div>
                    <div style="padding:24px;">

                        {{-- Current image — display only --}}
                        @if($item->image)
                        <div style="display:flex;align-items:flex-start;gap:16px;padding:16px;background:#161616;border:1px solid rgba(200,169,110,.1);margin-bottom:16px;">
                            <img
                                src="{{ asset('storage/' . $item->image) }}"
                                alt="{{ $item->name }}"
                                style="width:96px;height:96px;object-fit:cover;border:1px solid rgba(200,169,110,.15);flex-shrink:0;" />
                            <div>
                                <p style="font-size:11px;color:rgba(245,240,232,.5);margin-bottom:4px;letter-spacing:.05em;">Image actuelle</p>
                                <p style="font-size:10px;color:rgba(245,240,232,.22);">{{ basename($item->image) }}</p>
                            </div>
                        </div>
                        @endif

                        {{-- Drop zone --}}
                        <div id="dropZone"
                            style="padding:40px;text-align:center;cursor:pointer;border:1px dashed rgba(200,169,110,.2);transition:border-color .2s;">
                            <div style="font-size:2rem;margin-bottom:12px;opacity:.3;">📷</div>
                            <div style="font-size:12px;color:rgba(245,240,232,.35);margin-bottom:4px;">
                                Glissez une <strong style="color:#C8A96E;">nouvelle image</strong> ici ou cliquez pour parcourir
                            </div>
                            <div style="font-size:10px;color:rgba(245,240,232,.2);">JPG, PNG, WEBP · max 5 MB · min 800×600px recommandé</div>
                            <input type="file" id="fileInput" name="image" style="display:none;" accept="image/*" />
                        </div>

                        {{-- New image preview (hidden until file chosen) --}}
                        <div id="imagePreviewWrap" style="display:none;margin-top:16px;flex-direction:row;gap:16px;align-items:flex-start;">
                            <img id="imagePreview" src="" alt="preview" style="width:96px;height:96px;object-fit:cover;border:1px solid rgba(200,169,110,.2);flex-shrink:0;" />
                            <div>
                                <p id="imgName" style="font-size:12px;margin-bottom:4px;color:rgba(245,240,232,.6);"></p>
                                <p id="imgSize" style="font-size:10px;color:rgba(245,240,232,.3);margin-bottom:12px;"></p>
                                <button type="button" id="removeImageBtn" style="font-size:10px;letter-spacing:.1em;text-transform:uppercase;color:rgba(200,110,110,.7);background:none;border:none;cursor:pointer;">Supprimer</button>
                            </div>
                        </div>

                    </div>
                </div>

            </div>{{-- end left --}}

            {{-- RIGHT col --}}
            <div style="display:flex;flex-direction:column;gap:20px;">

                {{-- Static preview card --}}
                <div style="background:#111111;border:1px solid rgba(200,169,110,.1);" class="fade-up">
                    <div style="padding:16px 20px;border-bottom:1px solid rgba(200,169,110,.1);">
                        <span style="font-size:11px;letter-spacing:.2em;text-transform:uppercase;color:rgba(245,240,232,.4);">Aperçu actuel</span>
                    </div>
                    <div style="padding:20px;">
                        <div style="background:#161616;border:1px solid rgba(200,169,110,.1);padding:16px;">
                            @if($item->image)
                            <div style="margin-bottom:12px;">
                                <img
                                    src="{{ asset('storage/'.$item->image) }}"
                                    alt="{{ $item->name }}"
                                    style="width:100%;height:120px;object-fit:cover;border:1px solid rgba(200,169,110,.1);" />
                            </div>
                            @endif
                            <div style="font-size:9px;letter-spacing:.25em;text-transform:uppercase;color:rgba(200,169,110,.6);margin-bottom:6px;">
                                {{ $item->category->name ?? 'Catégorie' }}
                            </div>
                            <div style="font-family:'Cormorant Garamond',serif;font-size:1.2rem;font-weight:300;margin-bottom:6px;color:#F5F0E8;">
                                {{ $item->name }}
                            </div>
                            <div style="font-size:11px;color:rgba(245,240,232,.35);line-height:1.6;margin-bottom:12px;">
                                {{ $item->description }}
                            </div>
                            <div style="display:flex;align-items:center;justify-content:space-between;padding-top:10px;border-top:1px solid rgba(200,169,110,.08);">
                                <span style="font-family:'Cormorant Garamond',serif;font-size:1.3rem;color:#C8A96E;">
                                    {{ $item->prix }} <span style="font-size:.8rem;color:rgba(245,240,232,.25);">MAD</span>
                                </span>
                                <span style="font-size:10px;color:rgba(245,240,232,.25);">
                                    ⏱ {{ $item->temp_prepa ?? '—' }} min
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Metadata card --}}
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

                {{-- Action buttons --}}
                <div style="display:flex;flex-direction:column;gap:10px;" class="fade-up">
                    <button type="submit" name="action" value="publish"
                        style="width:100%;padding:16px;background:#C8A96E;color:#0B0B0B;font-size:11px;letter-spacing:.25em;text-transform:uppercase;font-family:'Jost',sans-serif;border:none;cursor:pointer;font-weight:600;transition:background .2s;"
                        onmouseover="this.style.background='#d4b87c'" onmouseout="this.style.background='#C8A96E'">
                        ✓ Enregistrer les modifications
                    </button>

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

            </div>{{-- end right --}}

        </form>

        <div style="height:2rem;"></div>
    </div>
</div>

{{-- Success toast --}}
<div id="toast" style="position:fixed;bottom:32px;right:32px;background:#161616;border:1px solid rgba(110,200,138,.3);padding:16px 24px;display:flex;align-items:center;gap:12px;z-index:50;transform:translateY(20px);opacity:0;transition:all .5s;pointer-events:none;">
    <span style="color:#6EC88A;font-size:18px;">✓</span>
    <div>
        <div style="font-size:13px;color:#F5F0E8;">Modifications enregistrées</div>
        <div style="font-size:10px;color:rgba(245,240,232,.35);">Les changements sont visibles sur la carte</div>
    </div>
</div>

{{-- JS : image handling only --}}
<script>
    (function() {
        var dropZone = document.getElementById('dropZone');
        var fileInput = document.getElementById('fileInput');
        var wrap = document.getElementById('imagePreviewWrap');
        var imgPreview = document.getElementById('imagePreview');
        var nameEl = document.getElementById('imgName');
        var sizeEl = document.getElementById('imgSize');
        var removeBtn = document.getElementById('removeImageBtn');

        dropZone.addEventListener('click', function() {
            fileInput.click();
        });

        dropZone.addEventListener('dragover', function(e) {
            e.preventDefault();
            dropZone.style.borderColor = 'rgba(200,169,110,.6)';
        });

        dropZone.addEventListener('dragleave', function() {
            dropZone.style.borderColor = 'rgba(200,169,110,.2)';
        });

        dropZone.addEventListener('drop', function(e) {
            e.preventDefault();
            dropZone.style.borderColor = 'rgba(200,169,110,.2)';
            var file = e.dataTransfer.files[0];
            if (file && file.type.indexOf('image/') === 0) {
                var dt = new DataTransfer();
                dt.items.add(file);
                fileInput.files = dt.files;
                showPreview(file);
            }
        });

        fileInput.addEventListener('change', function() {
            if (fileInput.files.length) {
                showPreview(fileInput.files[0]);
            }
        });

        removeBtn.addEventListener('click', function() {
            fileInput.value = '';
            imgPreview.src = '';
            nameEl.textContent = '';
            sizeEl.textContent = '';
            wrap.style.display = 'none';
        });

        function showPreview(file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                imgPreview.src = e.target.result;
                nameEl.textContent = file.name;
                sizeEl.textContent = (file.size / 1024 / 1024).toFixed(2) + ' MB';
                wrap.style.display = 'flex';
            };
            reader.readAsDataURL(file);
        }

    }());
</script>

</body>

</html>