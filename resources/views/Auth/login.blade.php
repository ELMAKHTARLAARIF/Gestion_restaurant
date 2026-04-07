<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Connexion | La Maison</title>
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
      overflow: hidden;
    }

    /* LEFT PANEL */
    .left-panel {
      flex: 1;
      position: relative;
      overflow: hidden;
      display: flex;
      flex-direction: column;
      justify-content: flex-end;
      padding: 4rem;
      min-height: 100vh;
    }

    .left-bg {
      position: absolute;
      inset: 0;
      background: url('https://images.unsplash.com/photo-1414235077428-338989a2e8c0?w=1200&q=80') center/cover;
      filter: brightness(0.35);
    }

    .left-overlay {
      position: absolute;
      inset: 0;
      background: linear-gradient(135deg, rgba(0, 0, 0, 0.3) 0%, rgba(13, 13, 13, 0.8) 100%);
    }

    .left-content {
      position: relative;
    }

    .brand-logo {
      font-family: 'Cormorant Garamond', serif;
      font-size: 2.5rem;
      color: var(--gold);
      display: block;
      margin-bottom: 0.5rem;
    }

    .brand-tagline {
      font-size: 0.72rem;
      letter-spacing: 0.3em;
      text-transform: uppercase;
      color: rgba(245, 240, 232, 0.45);
      margin-bottom: 3rem;
    }

    .quote {
      font-family: 'Cormorant Garamond', serif;
      font-size: 1.6rem;
      font-style: italic;
      color: var(--cream);
      line-height: 1.5;
      margin-bottom: 1rem;
    }

    .quote-author {
      font-size: 0.7rem;
      letter-spacing: 0.2em;
      text-transform: uppercase;
      color: var(--gold);
    }

    .decorative-line {
      width: 50px;
      height: 1px;
      background: var(--gold);
      margin-bottom: 1.5rem;
    }

    /* RIGHT PANEL */
    .right-panel {
      width: 480px;
      min-width: 480px;
      background: #0a0a0a;
      display: flex;
      flex-direction: column;
      justify-content: center;
      padding: 4rem 3.5rem;
      position: relative;
    }

    .right-panel::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 1px;
      height: 100%;
      background: linear-gradient(to bottom, transparent, rgba(200, 169, 110, 0.3) 30%, rgba(200, 169, 110, 0.3) 70%, transparent);
    }

    .form-header {
      margin-bottom: 3rem;
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
      font-size: 2.6rem;
      font-weight: 300;
      line-height: 1.1;
    }

    .form-title em {
      font-style: italic;
      color: var(--gold);
    }

    .input-group {
      margin-bottom: 1.25rem;
    }

    .input-label {
      font-size: 0.62rem;
      letter-spacing: 0.25em;
      text-transform: uppercase;
      color: var(--muted);
      display: block;
      margin-bottom: 0.6rem;
    }

    .input-wrap {
      position: relative;
    }

    .input-field {
      width: 100%;
      background: #111;
      border: 1px solid rgba(200, 169, 110, 0.15);
      padding: 0.95rem 1.25rem;
      font-family: 'Jost', sans-serif;
      font-size: 0.88rem;
      color: var(--cream);
      outline: none;
      transition: border-color 0.3s;
    }

    .input-field:focus {
      border-color: rgba(200, 169, 110, 0.6);
    }

    .input-field::placeholder {
      color: rgba(245, 240, 232, 0.2);
    }

    .input-icon {
      position: absolute;
      right: 1rem;
      top: 50%;
      transform: translateY(-50%);
      color: rgba(245, 240, 232, 0.25);
      cursor: pointer;
      font-size: 1rem;
    }

    .form-options {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 2rem;
    }

    .checkbox-wrap {
      display: flex;
      align-items: center;
      gap: 0.6rem;
      cursor: pointer;
    }

    .checkbox-wrap input {
      display: none;
    }

    .checkbox-box {
      width: 14px;
      height: 14px;
      border: 1px solid rgba(200, 169, 110, 0.4);
      position: relative;
      flex-shrink: 0;
      transition: all 0.3s;
    }

    .checkbox-wrap input:checked+.checkbox-box {
      background: var(--gold);
      border-color: var(--gold);
    }

    .checkbox-wrap input:checked+.checkbox-box::after {
      content: '✓';
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      font-size: 9px;
      color: var(--dark);
      font-weight: bold;
    }

    .checkbox-label {
      font-size: 0.75rem;
      color: rgba(245, 240, 232, 0.45);
    }

    .forgot-link {
      font-size: 0.72rem;
      color: var(--gold);
      text-decoration: none;
      opacity: 0.8;
      transition: opacity 0.3s;
    }

    .forgot-link:hover {
      opacity: 1;
    }

    .btn-login {
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

    .btn-login:hover {
      background: #d4b87c;
    }

    .divider {
      display: flex;
      align-items: center;
      gap: 1rem;
      margin-bottom: 1.5rem;
    }

    .divider-line {
      flex: 1;
      height: 1px;
      background: rgba(200, 169, 110, 0.12);
    }

    .divider-text {
      font-size: 0.65rem;
      letter-spacing: 0.2em;
      text-transform: uppercase;
      color: rgba(245, 240, 232, 0.25);
    }

    .social-login {
      display: flex;
      gap: 1rem;
      margin-bottom: 2.5rem;
    }

    .social-btn {
      flex: 1;
      padding: 0.8rem;
      border: 1px solid rgba(200, 169, 110, 0.15);
      background: none;
      color: rgba(245, 240, 232, 0.5);
      font-family: 'Jost', sans-serif;
      font-size: 0.72rem;
      letter-spacing: 0.15em;
      cursor: pointer;
      transition: all 0.3s;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 0.5rem;
    }

    .social-btn:hover {
      border-color: rgba(200, 169, 110, 0.4);
      color: var(--cream);
    }

    .signup-prompt {
      text-align: center;
      padding-top: 2rem;
      border-top: 1px solid rgba(200, 169, 110, 0.08);
    }

    .signup-prompt p {
      font-size: 0.78rem;
      color: rgba(245, 240, 232, 0.35);
    }

    .signup-prompt a {
      color: var(--gold);
      text-decoration: none;
      transition: opacity 0.3s;
    }

    .signup-prompt a:hover {
      opacity: 0.8;
    }

    /* Error state */
    .error-msg {
      font-size: 0.72rem;
      color: #e07070;
      margin-top: 0.4rem;
      display: none;
    }

    .input-field.error {
      border-color: rgba(220, 80, 80, 0.5);
    }

    @media (max-width:900px) {
      .left-panel {
        display: none;
      }

      .right-panel {
        width: 100%;
        min-width: unset;
        min-height: 100vh;
      }
    }

    @media (max-width:500px) {
      .right-panel {
        padding: 3rem 1.75rem;
      }
    }
  </style>
</head>

<body>

  <!-- LEFT PANEL -->
  <div class="left-panel">
    <div class="left-bg"></div>
    <div class="left-overlay"></div>
    <div class="left-content">
      <span class="brand-logo">La Maison</span>
      <span class="brand-tagline">Restaurant Gastronomique</span>
      <div class="decorative-line"></div>
      <p class="quote">"La gastronomie est l'art<br>de bien nourrir l'âme."</p>
      <span class="quote-author">— Chef Karim El Fassi</span>
    </div>
  </div>

  <!-- RIGHT PANEL -->
  <div class="right-panel">
    <div class="form-header">
      <span class="form-eyebrow">Espace client</span>
      <h1 class="form-title">Bon retour<br><em>parmi nous</em></h1>
    </div>
    <form action="{{ route('login.store') }}" method="POST">
      @csrf

      <div class="input-group">
        <label class="input-label">Adresse email</label>
        <div class="input-wrap">
          <input type="email" class="input-field" id="email" name="email" placeholder="vous@exemple.com" />
        </div>
        <span class="error-msg" id="email-error">Veuillez entrer un email valide.</span>
      </div>

      <div class="input-group">
        <label class="input-label">Mot de passe</label>
        <div class="input-wrap">
          <input type="password" class="input-field" id="password" name="password" placeholder="••••••••" />
          <span class="input-icon" id="togglePwd">👁</span>
        </div>
        <span class="error-msg" id="pwd-error">Le mot de passe est requis.</span>
      </div>

      <div class="form-options">
        <label class="checkbox-wrap">
          <input type="checkbox" id="remember" />
          <div class="checkbox-box"></div>
          <span class="checkbox-label">Se souvenir de moi</span>
        </label>
        <a href="#" class="forgot-link">Mot de passe oublié ?</a>
      </div>

      <button class="btn-login" id="loginBtn">Se connecter</button>

      <div class="divider">
        <div class="divider-line"></div>
        <span class="divider-text">ou</span>
        <div class="divider-line"></div>
      </div>

      <div class="social-login">
        <a href="/auth/google" class="social-btn">
          <img src="https://cdn-icons-png.flaticon.com/512/300/300221.png" alt="Google" style="width:18px; height:18px;" />
          Google
        </a>
      </div>
    </form>

    <div class="signup-prompt">
      <p>Pas encore de compte ? <a href="{{route('signup')}}">Créer un compte</a></p>
    </div>
  </div>

  <script>
    // Toggle password visibility
    document.getElementById('togglePwd').addEventListener('click', () => {
      const pwd = document.getElementById('password');
      pwd.type = pwd.type === 'password' ? 'text' : 'password';
    });

    // Form validation
    document.getElementById('loginBtn').addEventListener('click', () => {
      const email = document.getElementById('email');
      const password = document.getElementById('password');
      const emailErr = document.getElementById('email-error');
      const pwdErr = document.getElementById('pwd-error');
      let valid = true;

      email.classList.remove('error');
      emailErr.style.display = 'none';
      password.classList.remove('error');
      pwdErr.style.display = 'none';

      if (!email.value || !/\S+@\S+\.\S+/.test(email.value)) {
        email.classList.add('error');
        emailErr.style.display = 'block';
        valid = false;
      }
      if (!password.value) {
        password.classList.add('error');
        pwdErr.style.display = 'block';
        valid = false;
      }
      if (valid) {
        const btn = document.getElementById('loginBtn');
        btn.textContent = 'Connexion en cours…';
        btn.style.opacity = '0.7';
        setTimeout(() => {
          window.location.href = 'index.html';
        }, 1200);
      }
    });
  </script>
</body>

</html>