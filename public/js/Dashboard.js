      document.getElementById('topDate').textContent = new Date().toLocaleDateString('fr-FR', {
            weekday: 'long',
            day: 'numeric',
            month: 'long'
        });

        let collapsed = false;

        function toggleSidebar() {
            collapsed = !collapsed;
            document.getElementById('sidebar').classList.toggle('collapsed', collapsed);
            document.getElementById('collapseBtn').textContent = collapsed ? '▶' : '◀';
        }

        // Char count
        document.getElementById('itemDesc').addEventListener('input', function() {
            document.getElementById('charCount').textContent = `${this.value.length} / 200`;
        });

        // Tag toggle
        function toggleTag(el) {
            el.classList.toggle('selected');
        }

        function toggleSeason(el) {
            el.classList.toggle('selected');
            el.classList.toggle('border-gold/50');
            el.classList.toggle('bg-gold/10');
            el.classList.toggle('text-gold');
            el.classList.toggle('text-cream/40');
            el.classList.toggle('border-gold/[.12]');
        }

        // Live preview
        function updatePreview() {
            const name = document.getElementById('itemName').value;
            const desc = document.getElementById('itemDesc').value;
            const price = document.getElementById('itemPrice').value;
            const cat = document.getElementById('itemCat').value;

            const pName = document.getElementById('prev-name');
            const pDesc = document.getElementById('prev-desc');
            const pPrice = document.getElementById('prev-price');
            const pCat = document.getElementById('prev-cat');

            pName.textContent = name || 'Nom du plat…';
            pName.className = `font-display text-lg mb-2 ${name ? 'text-cream' : 'text-cream/30 italic'}`;
            pDesc.textContent = desc ? (desc.length > 80 ? desc.substring(0, 80) + '…' : desc) : 'Description apparaîtra ici…';
            pDesc.className = `text-[11px] leading-relaxed mb-4 ${desc ? 'text-cream/60' : 'text-cream/25'}`;
            pPrice.textContent = price ? `${parseInt(price).toLocaleString('fr-FR')} MAD` : '— MAD';
            pPrice.className = `font-display text-xl ${price ? 'text-gold' : 'text-gold/40'}`;
            pCat.textContent = cat || 'Catégorie';
        }

        // Ingredients
        const ingredients = ['Saint-Jacques fraîches', 'Huile de truffe blanche', 'Fleur de sel'];

        function renderIngredients() {
            const list = document.getElementById('ingredientsList');
            list.innerHTML = ingredients.map((ing, i) => `
      <div class="flex items-center gap-3 bg-s2 border border-gold/[.08] px-4 py-2.5 group">
        <span class="w-4 h-4 border border-gold/20 flex items-center justify-center text-[9px] text-gold/40 flex-shrink-0">${i+1}</span>
        <input value="${ing}" class="flex-1 bg-transparent border-0 outline-none text-[12px] text-cream font-body" placeholder="Ingrédient…"/>
        <button onclick="removeIngredient(${i})" class="text-cream/20 hover:text-cred transition-colors bg-transparent border-0 cursor-pointer opacity-0 group-hover:opacity-100 text-xs">✕</button>
      </div>`).join('');
        }

        function addIngredient() {
            ingredients.push('');
            renderIngredients();
            const inputs = document.querySelectorAll('#ingredientsList input');
            inputs[inputs.length - 1].focus();
        }

        function removeIngredient(i) {
            ingredients.splice(i, 1);
            renderIngredients();
        }
        renderIngredients();

        // Image upload
        function handleFile(input) {
            const file = input.files[0];
            if (!file) return;
            const reader = new FileReader();
            reader.onload = e => {
                document.getElementById('imagePreview').src = e.target.result;
                document.getElementById('imgName').textContent = file.name;
                document.getElementById('imgSize').textContent = `${(file.size/1024).toFixed(1)} KB`;
                document.getElementById('imagePreviewWrap').classList.remove('hidden');
                document.getElementById('imagePreviewWrap').classList.add('flex');
                document.getElementById('dropZone').classList.add('hidden');
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
                const input = document.getElementById('fileInput');
                input.files = dt.files;
                handleFile(input);
            }
        }

        function removeImage() {
            document.getElementById('imagePreview').src = '';
            document.getElementById('fileInput').value = '';
            document.getElementById('imagePreviewWrap').classList.add('hidden');
            document.getElementById('imagePreviewWrap').classList.remove('flex');
            document.getElementById('dropZone').classList.remove('hidden');
        }
