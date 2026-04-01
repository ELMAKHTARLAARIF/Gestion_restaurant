<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Inscription | La Maison</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=Jost:wght@300;400;500&display=swap" rel="stylesheet" />
    <style>
        :root {
            --gold: #C8A96E;
            --dark: #0D0D0D;
            --cream: #F5F0E8;
            --muted: #8A7E6E;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Jost', sans-serif;
            background: var(--dark);
            color: var(--cream);
            min-height: 100vh;
            display: flex;
        }

        /* LEFT PANEL */
        .left-panel {
            flex: 1;
            position: relative;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 4rem;
            min-height: 100vh;
        }

        .left-bg {
            position: absolute;
            inset: 0;
            background: url('https://images.unsplash.com/photo-1559339352-11d035aa65de?w=1200&q=80') center/cover;
            filter: brightness(0.3);
        }

        .left-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(200, 169, 110, 0.05) 0%, rgba(13, 13, 13, 0.85) 100%);
        }

        .left-top {
            position: relative;
        }

        .left-bottom {
            position: relative;
        }

        .brand-logo {
            font-family: 'Cormorant Garamond', serif;
            font-size: 2.2rem;
            color: var(--gold);
            display: block;
            margin-bottom: 0.4rem;
        }

        .brand-tagline {
            font-size: 0.65rem;
            letter-spacing: 0.35em;
            text-transform: uppercase;
            color: rgba(245, 240, 232, 0.4);
        }

        .perks {
            list-style: none;
        }

        .perk {
            display: flex;
            align-items: flex-start;
            gap: 1rem;
            margin-bottom: 1.75rem;
        }

        .perk-icon {
            width: 36px;
            height: 36px;
            border: 1px solid rgba(200, 169, 110, 0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            font-size: 0.9rem;
            margin-top: 0.1rem;
        }

        .perk-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.1rem;
            margin-bottom: 0.2rem;
        }

        .perk-desc {
            font-size: 0.75rem;
            color: rgba(245, 240, 232, 0.4);
            line-height: 1.6;
        }

        .perks-heading {
            font-size: 0.62rem;
            letter-spacing: 0.35em;
            text-transform: uppercase;
            color: var(--gold);
            margin-bottom: 2rem;
            display: block;
        }

        /* RIGHT PANEL */
        .right-panel {
            width: 520px;
            min-width: 520px;
            background: #090909;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 4rem 3.5rem;
            position: relative;
            overflow-y: auto;
        }

        .right-panel::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 1px;
            height: 100%;
            background: linear-gradient(to bottom, transparent, rgba(200, 169, 110, 0.25) 20%, rgba(200, 169, 110, 0.25) 80%, transparent);
        }

        .form-header {
            margin-bottom: 2.5rem;
        }

        .form-eyebrow {
            font-size: 0.62rem;
            letter-spacing: 0.35em;
            text-transform: uppercase;
            color: var(--gold);
            margin-bottom: 1rem;
            display: block;
        }

        .form-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 2.4rem;
            font-weight: 300;
            line-height: 1.1;
        }

        .form-title em {
            font-style: italic;
            color: var(--gold);
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }

        .input-group {
            margin-bottom: 1.1rem;
        }

        .input-label {
            font-size: 0.6rem;
            letter-spacing: 0.25em;
            text-transform: uppercase;
            color: var(--muted);
            display: block;
            margin-bottom: 0.55rem;
        }

        .input-wrap {
            position: relative;
        }

        .input-field {
            width: 100%;
            background: #111;
            border: 1px solid rgba(200, 169, 110, 0.12);
            padding: 0.9rem 1.2rem;
            font-family: 'Jost', sans-serif;
            font-size: 0.86rem;
            color: var(--cream);
            outline: none;
            transition: border-color 0.3s;
        }

        .input-field:focus {
            border-color: rgba(200, 169, 110, 0.55);
        }

        .input-field::placeholder {
            color: rgba(245, 240, 232, 0.2);
        }

        .input-toggle {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: rgba(245, 240, 232, 0.25);
            cursor: pointer;
            font-size: 0.9rem;
        }

        .error-msg {
            font-size: 0.7rem;
            color: #e07070;
            margin-top: 0.35rem;
            display: none;
        }

        .input-field.error {
            border-color: rgba(220, 80, 80, 0.45);
        }

        /* Password strength */
        .strength-bar {
            display: flex;
            gap: 3px;
            margin-top: 0.5rem;
        }

        .strength-seg {
            flex: 1;
            height: 2px;
            background: rgba(255, 255, 255, 0.1);
            transition: background 0.3s;
        }

        .strength-seg.weak {
            background: #e07070;
        }

        .strength-seg.medium {
            background: #d4b87c;
        }

        .strength-seg.strong {
            background: #7ec891;
        }

        .strength-label {
            font-size: 0.62rem;
            color: rgba(245, 240, 232, 0.3);
            margin-top: 0.3rem;
        }

        /* Terms */
        .terms-wrap {
            display: flex;
            align-items: flex-start;
            gap: 0.75rem;
            margin: 1.5rem 0;
            cursor: pointer;
        }

        .terms-wrap input {
            display: none;
        }

        .checkbox-box {
            width: 14px;
            height: 14px;
            border: 1px solid rgba(200, 169, 110, 0.35);
            flex-shrink: 0;
            position: relative;
            transition: all 0.3s;
            margin-top: 2px;
        }

        .terms-wrap input:checked+.checkbox-box {
            background: var(--gold);
            border-color: var(--gold);
        }

        .terms-wrap input:checked+.checkbox-box::after {
            content: '✓';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 8px;
            color: var(--dark);
            font-weight: bold;
        }

        .terms-text {
            font-size: 0.75rem;
            color: rgba(245, 240, 232, 0.4);
            line-height: 1.6;
        }

        .terms-text a {
            color: var(--gold);
            text-decoration: none;
        }

        .btn-signup {
            width: 100%;
            padding: 1.05rem;
            background: var(--gold);
            color: var(--dark);
            font-family: 'Jost', sans-serif;
            font-size: 0.72rem;
            letter-spacing: 0.25em;
            text-transform: uppercase;
            border: none;
            cursor: pointer;
            transition: all 0.3s;
            margin-bottom: 1.5rem;
        }

        .btn-signup:hover {
            background: #d4b87c;
        }

        .btn-signup:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        /* Progress steps */
        .steps {
            display: flex;
            align-items: center;
            gap: 0;
            margin-bottom: 2.5rem;
        }

        .step {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0.4rem;
            flex: 1;
        }

        .step-circle {
            width: 28px;
            height: 28px;
            border: 1px solid rgba(200, 169, 110, 0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.65rem;
            color: rgba(245, 240, 232, 0.3);
            transition: all 0.3s;
        }

        .step-circle.active {
            border-color: var(--gold);
            color: var(--gold);
            background: rgba(200, 169, 110, 0.08);
        }

        .step-circle.done {
            background: var(--gold);
            border-color: var(--gold);
            color: var(--dark);
        }

        .step-label {
            font-size: 0.55rem;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            color: rgba(245, 240, 232, 0.25);
        }

        .step-label.active {
            color: var(--gold);
        }

        .step-line {
            flex: 1;
            height: 1px;
            background: rgba(200, 169, 110, 0.15);
            margin-bottom: 1rem;
        }

        .login-link {
            text-align: center;
            font-size: 0.78rem;
            color: rgba(245, 240, 232, 0.35);
            padding-top: 1.5rem;
            border-top: 1px solid rgba(200, 169, 110, 0.08);
        }

        .login-link a {
            color: var(--gold);
            text-decoration: none;
        }

        /* Success state */
        .success-screen {
            display: none;
            text-align: center;
            padding: 2rem 0;
        }

        .success-icon {
            width: 64px;
            height: 64px;
            border: 1px solid var(--gold);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 2rem;
            font-size: 1.5rem;
        }

        .success-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 2rem;
            margin-bottom: 1rem;
        }

        .success-text {
            font-size: 0.85rem;
            color: rgba(245, 240, 232, 0.5);
            line-height: 1.8;
            margin-bottom: 2rem;
        }

        @media (max-width:950px) {
            .left-panel {
                display: none;
            }

            .right-panel {
                width: 100%;
                min-width: unset;
                min-height: 100vh;
            }
        }

        @media (max-width:520px) {
            .right-panel {
                padding: 2.5rem 1.5rem;
            }

            .form-row {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

    <!-- LEFT PANEL -->
    <div class="left-panel">
        <div class="left-bg"></div>
        <div class="left-overlay"></div>
        <div class="left-top">
            <a href="index.html" style="text-decoration:none;">
                <span class="brand-logo">La Maison</span>
                <span class="brand-tagline">Restaurant Gastronomique</span>
            </a>
        </div>
        <div class="left-bottom">
            <span class="perks-heading">Avantages membres</span>
            <ul class="perks">
                <li class="perk">
                    <div class="perk-icon">🗓</div>
                    <div>
                        <div class="perk-title">Réservations prioritaires</div>
                        <div class="perk-desc">Accédez aux meilleures tables avant tout le monde, même lors des soirées spéciales.</div>
                    </div>
                </li>
                <li class="perk">
                    <div class="perk-icon">🍷</div>
                    <div>
                        <div class="perk-title">Menus exclusifs</div>
                        <div class="perk-desc">Découvrez les créations saisonnières du chef en avant-première.</div>
                    </div>
                </li>
                <li class="perk">
                    <div class="perk-icon">🎁</div>
                    <div>
                        <div class="perk-title">Offres personnalisées</div>
                        <div class="perk-desc">Surprises pour votre anniversaire, anniversaire de mariage et occasions spéciales.</div>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <!-- RIGHT PANEL -->
    <div class="right-panel">
        <!-- Steps -->
        @include('Component.HandleMessages')
        <!-- FORM -->
        <div id="formContent">
            @error('email')
            <span class="error-msg">{{ $message }}</span>
            @enderror
            <div class="form-header">
                <span class="form-eyebrow">Nouveau compte</span>
                <h1 class="form-title">Rejoignez<br><em>La Maison</em></h1>
            </div>
            <form class="signing-form" action="{{route('store')}}" method="POST">
                @csrf
                <div class="form-row">
                    <div class="input-group">
                        <label class="input-label">Prénom</label>
                        <input type="text" class="input-field" id="firstName" placeholder="Ahmed" name="name" />
                        <span class="error-msg" id="fn-error">Requis</span>
                    </div>
                    <div class="input-group">
                        <label class="input-label">Nom</label>
                        <input type="text" class="input-field" id="lastName" placeholder="Benali" name="lastName" />
                        <span class="error-msg" id="ln-error">Requis</span>
                    </div>
                </div>

                <div class="input-group">
                    <label class="input-label">Adresse email</label>
                    <input type="email" class="input-field" id="email" placeholder="vous@exemple.com" name="email" />
                    <span class="error-msg" id="email-error">Email invalide</span>
                </div>

                <div class="input-group">
                    <label class="input-label">Téléphone</label>
                    <input type="tel" class="input-field" id="phone" placeholder="+212 6XX XXX XXX" name="phone" />
                </div>

                <div class="input-group">
                    <label class="input-label">Mot de passe</label>
                    <div class="input-wrap">
                        <input type="password" name="password" class="input-field" id="password" placeholder="Minimum 8 caractères" oninput="checkStrength(this.value)" />
                        <span class="input-toggle" id="togglePwd">👁</span>
                    </div>
                    <div class="strength-bar">
                        <div class="strength-seg" id="seg1"></div>
                        <div class="strength-seg" id="seg2"></div>
                        <div class="strength-seg" id="seg3"></div>
                        <div class="strength-seg" id="seg4"></div>
                    </div>
                    <span class="strength-label" id="strengthLabel">Entrez un mot de passe</span>
                    <span class="error-msg" id="pwd-error">Minimum 8 caractères</span>
                </div>

                <div class="input-group">
                    <label class="input-label">Confirmer le mot de passe</label>
                    <div class="input-wrap">
                        <input type="password" class="input-field" id="confirmPwd" placeholder="••••••••" name="password_confirmation" />
                    </div>
                    <span class="error-msg" id="cpwd-error">Les mots de passe ne correspondent pas</span>
                </div>

                <label class="terms-wrap">
                    <input type="checkbox" id="terms" />
                    <div class="checkbox-box"></div>
                    <span class="terms-text">J'accepte les <a href="#">Conditions générales</a> et la <a href="#">Politique de confidentialité</a> de La Maison.</span>
                </label>

                <button class="btn-signup" id="signupBtn">Créer mon compte</button>

                <div class="login-link">
                    Déjà membre ? <a href="{{route('login')}}">Se connecter</a>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('togglePwd').addEventListener('click', () => {
            const p = document.getElementById('password');
            p.type = p.type === 'password' ? 'text' : 'password';
        });

        function checkStrength(val) {
            const segs = [document.getElementById('seg1'), document.getElementById('seg2'), document.getElementById('seg3'), document.getElementById('seg4')];
            const label = document.getElementById('strengthLabel');
            segs.forEach(s => {
                s.className = 'strength-seg';
            });
            if (!val) {
                label.textContent = 'Entrez un mot de passe';
                return;
            }
            let score = 0;
            if (val.length >= 8) score++;
            if (/[A-Z]/.test(val)) score++;
            if (/[0-9]/.test(val)) score++;
            if (/[^A-Za-z0-9]/.test(val)) score++;
            const cls = score <= 1 ? 'weak' : score <= 2 ? 'medium' : 'strong';
            const labels = ['', 'Faible', 'Faible', 'Moyen', 'Fort'];
            for (let i = 0; i < score; i++) segs[i].classList.add(cls);
            label.textContent = `Force : ${labels[score]}`;
            label.style.color = cls === 'weak' ? '#e07070' : cls === 'medium' ? '#d4b87c' : '#7ec891';
        }

        document.getElementById('signupBtn').addEventListener('click', () => {
            const fn = document.getElementById('firstName');
            const ln = document.getElementById('lastName');
            const email = document.getElementById('email');
            const pwd = document.getElementById('password');
            const cpwd = document.getElementById('confirmPwd');
            const terms = document.getElementById('terms');
            let valid = true;

            [fn, ln, email, pwd, cpwd].forEach(f => f.classList.remove('error'));
            document.querySelectorAll('.error-msg').forEach(e => e.style.display = 'none');

            if (!fn.value.trim()) {
                fn.classList.add('error');
                document.getElementById('fn-error').style.display = 'block';
                valid = false;
            }
            if (!ln.value.trim()) {
                ln.classList.add('error');
                document.getElementById('ln-error').style.display = 'block';
                valid = false;
            }
            if (!email.value || !/\S+@\S+\.\S+/.test(email.value)) {
                email.classList.add('error');
                document.getElementById('email-error').style.display = 'block';
                valid = false;
            }
            if (!pwd.value || pwd.value.length < 8) {
                pwd.classList.add('error');
                document.getElementById('pwd-error').style.display = 'block';
                valid = false;
            }
            if (cpwd.value !== pwd.value) {
                cpwd.classList.add('error');
                document.getElementById('cpwd-error').style.display = 'block';
                valid = false;
            }
            if (!terms.checked) {
                alert('Veuillez accepter les conditions générales.');
                valid = false;
            }

            if (valid) {
                // Animate steps
                document.getElementById('s1').className = 'step-circle done';
                document.getElementById('s2').className = 'step-circle done';
                document.getElementById('s3').className = 'step-circle done';
                document.getElementById('signupBtn').textContent = 'Création en cours…';
                document.getElementById('signupBtn').disabled = true;
                setTimeout(() => {
                    document.getElementById('formContent').style.display = 'none';
                    document.getElementById('successScreen').style.display = 'block';
                }, 1200);
            }
        });
    </script>
</body>

</html>