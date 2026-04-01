<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>La Maison | Restaurant Gastronomique</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=Jost:wght@300;400;500&display=swap" rel="stylesheet"/>
  <style>
    :root {
      --gold: #C8A96E;
      --dark: #0D0D0D;
      --cream: #F5F0E8;
      --muted: #8A7E6E;
    }
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body { font-family: 'Jost', sans-serif; background: var(--dark); color: var(--cream); overflow-x: hidden; }
    .font-display { font-family: 'Cormorant Garamond', serif; }

    /* NAV */
    nav { position: fixed; top: 0; width: 100%; z-index: 50; padding: 1.5rem 3rem; display: flex; align-items: center; justify-content: space-between; background: linear-gradient(to bottom, rgba(13,13,13,0.95), transparent); }
    .nav-logo { font-family: 'Cormorant Garamond', serif; font-size: 1.6rem; letter-spacing: 0.15em; color: var(--gold); }
    .nav-links { display: flex; gap: 2.5rem; }
    .nav-links a { font-size: 0.75rem; letter-spacing: 0.2em; text-transform: uppercase; color: var(--cream); opacity: 0.75; text-decoration: none; transition: opacity 0.3s, color 0.3s; }
    .nav-links a:hover { opacity: 1; color: var(--gold); }
    .nav-cta { font-size: 0.7rem; letter-spacing: 0.2em; text-transform: uppercase; padding: 0.65rem 1.75rem; border: 1px solid var(--gold); color: var(--gold); text-decoration: none; transition: all 0.3s; }
    .nav-cta:hover { background: var(--gold); color: var(--dark); }
    .hamburger { display: none; flex-direction: column; gap: 5px; cursor: pointer; }
    .hamburger span { display: block; width: 24px; height: 1.5px; background: var(--cream); }

    /* HERO */
    .hero { height: 100vh; position: relative; display: flex; align-items: center; justify-content: center; overflow: hidden; }
    .hero-bg { position: absolute; inset: 0; background: url('https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?w=1800&q=80') center/cover no-repeat; filter: brightness(0.35); }
    .hero-overlay { position: absolute; inset: 0; background: radial-gradient(ellipse at center bottom, rgba(200,169,110,0.08) 0%, transparent 70%); }
    .hero-content { position: relative; text-align: center; padding: 0 1.5rem; animation: fadeUp 1.2s ease forwards; }
    .hero-tag { font-size: 0.7rem; letter-spacing: 0.35em; text-transform: uppercase; color: var(--gold); margin-bottom: 1.5rem; display: block; }
    .hero-title { font-family: 'Cormorant Garamond', serif; font-size: clamp(4rem, 10vw, 8rem); font-weight: 300; line-height: 1; margin-bottom: 1.5rem; }
    .hero-title em { font-style: italic; color: var(--gold); }
    .hero-sub { font-size: 0.85rem; letter-spacing: 0.15em; color: rgba(245,240,232,0.55); margin-bottom: 3rem; }
    .hero-divider { width: 60px; height: 1px; background: var(--gold); margin: 0 auto 3rem; }
    .hero-btns { display: flex; gap: 1.25rem; justify-content: center; flex-wrap: wrap; }
    .btn-primary { padding: 1rem 2.5rem; background: var(--gold); color: var(--dark); font-size: 0.72rem; letter-spacing: 0.2em; text-transform: uppercase; text-decoration: none; transition: all 0.3s; }
    .btn-primary:hover { background: #d4b87c; }
    .btn-ghost { padding: 1rem 2.5rem; border: 1px solid rgba(245,240,232,0.3); color: var(--cream); font-size: 0.72rem; letter-spacing: 0.2em; text-transform: uppercase; text-decoration: none; transition: all 0.3s; }
    .btn-ghost:hover { border-color: var(--gold); color: var(--gold); }
    .scroll-hint { position: absolute; bottom: 2.5rem; left: 50%; transform: translateX(-50%); display: flex; flex-direction: column; align-items: center; gap: 0.5rem; opacity: 0.4; animation: bounce 2s infinite; }
    .scroll-hint span { font-size: 0.6rem; letter-spacing: 0.3em; text-transform: uppercase; }
    .scroll-arrow { width: 1px; height: 40px; background: var(--cream); }

    /* STRIP */
    .strip { background: var(--gold); padding: 1rem 2rem; display: flex; justify-content: center; gap: 4rem; flex-wrap: wrap; }
    .strip-item { display: flex; align-items: center; gap: 0.75rem; }
    .strip-item span { font-size: 0.7rem; letter-spacing: 0.15em; text-transform: uppercase; color: var(--dark); font-weight: 500; }
    .strip-icon { width: 18px; height: 18px; fill: var(--dark); }

    /* ABOUT */
    .about { display: grid; grid-template-columns: 1fr 1fr; min-height: 80vh; }
    .about-img { position: relative; overflow: hidden; }
    .about-img img { width: 100%; height: 100%; object-fit: cover; filter: brightness(0.8); transition: transform 0.8s ease; }
    .about-img:hover img { transform: scale(1.04); }
    .about-img-overlay { position: absolute; inset: 0; border: 1px solid rgba(200,169,110,0.2); margin: 2rem; pointer-events: none; }
    .about-content { padding: 5rem 4rem; display: flex; flex-direction: column; justify-content: center; background: #111; }
    .section-tag { font-size: 0.65rem; letter-spacing: 0.4em; text-transform: uppercase; color: var(--gold); margin-bottom: 1.25rem; display: block; }
    .section-title { font-family: 'Cormorant Garamond', serif; font-size: clamp(2.5rem, 5vw, 3.5rem); font-weight: 300; line-height: 1.1; margin-bottom: 1.5rem; }
    .section-title em { font-style: italic; color: var(--gold); }
    .section-text { font-size: 0.9rem; line-height: 1.9; color: rgba(245,240,232,0.6); margin-bottom: 2rem; }
    .stat-row { display: flex; gap: 2.5rem; margin-top: 2rem; padding-top: 2rem; border-top: 1px solid rgba(200,169,110,0.2); }
    .stat { text-align: center; }
    .stat-num { font-family: 'Cormorant Garamond', serif; font-size: 2.5rem; color: var(--gold); display: block; line-height: 1; }
    .stat-label { font-size: 0.65rem; letter-spacing: 0.2em; text-transform: uppercase; color: var(--muted); margin-top: 0.25rem; display: block; }

    /* MENU PREVIEW */
    .menu-section { padding: 6rem 3rem; background: var(--dark); }
    .section-header { text-align: center; margin-bottom: 4rem; }
    .menu-tabs { display: flex; justify-content: center; gap: 0; margin-bottom: 3rem; border: 1px solid rgba(200,169,110,0.25); display: inline-flex; }
    .menu-tabs-wrap { text-align: center; }
    .tab { padding: 0.65rem 2rem; font-size: 0.7rem; letter-spacing: 0.2em; text-transform: uppercase; cursor: pointer; transition: all 0.3s; color: rgba(245,240,232,0.5); border: none; background: none; }
    .tab.active, .tab:hover { background: var(--gold); color: var(--dark); }
    .menu-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 1.5px; background: rgba(200,169,110,0.1); max-width: 1100px; margin: 0 auto; }
    .menu-card { background: #111; padding: 2rem; position: relative; overflow: hidden; transition: background 0.3s; }
    .menu-card::before { content: ''; position: absolute; top: 0; left: 0; width: 3px; height: 0; background: var(--gold); transition: height 0.4s; }
    .menu-card:hover { background: #161616; }
    .menu-card:hover::before { height: 100%; }
    .menu-card-tag { font-size: 0.6rem; letter-spacing: 0.25em; text-transform: uppercase; color: var(--gold); margin-bottom: 0.75rem; }
    .menu-card-name { font-family: 'Cormorant Garamond', serif; font-size: 1.4rem; margin-bottom: 0.5rem; }
    .menu-card-desc { font-size: 0.8rem; color: rgba(245,240,232,0.5); line-height: 1.7; margin-bottom: 1.25rem; }
    .menu-card-footer { display: flex; justify-content: space-between; align-items: center; }
    .menu-price { font-family: 'Cormorant Garamond', serif; font-size: 1.3rem; color: var(--gold); }
    .menu-badge { font-size: 0.58rem; letter-spacing: 0.15em; text-transform: uppercase; padding: 0.25rem 0.65rem; border: 1px solid rgba(200,169,110,0.4); color: var(--muted); }

    /* GALLERY */
    .gallery { display: grid; grid-template-columns: repeat(4, 1fr); grid-template-rows: repeat(2, 260px); gap: 4px; }
    .gallery-item { overflow: hidden; position: relative; }
    .gallery-item img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.6s ease, filter 0.6s ease; filter: brightness(0.75) saturate(0.9); }
    .gallery-item:hover img { transform: scale(1.08); filter: brightness(0.9) saturate(1.1); }
    .gallery-item.featured { grid-column: span 2; grid-row: span 2; }
    .gallery-overlay { position: absolute; inset: 0; background: linear-gradient(to top, rgba(0,0,0,0.5) 0%, transparent 60%); opacity: 0; transition: opacity 0.4s; display: flex; align-items: flex-end; padding: 1.5rem; }
    .gallery-item:hover .gallery-overlay { opacity: 1; }
    .gallery-overlay span { font-size: 0.65rem; letter-spacing: 0.2em; text-transform: uppercase; color: var(--gold); }

    /* RESERVATION */
    .reservation { padding: 7rem 3rem; background: #0a0a0a; position: relative; overflow: hidden; }
    .reservation::before { content: ''; position: absolute; top: 50%; left: 50%; transform: translate(-50%,-50%); width: 600px; height: 600px; border-radius: 50%; border: 1px solid rgba(200,169,110,0.06); pointer-events: none; }
    .reservation::after { content: ''; position: absolute; top: 50%; left: 50%; transform: translate(-50%,-50%); width: 900px; height: 900px; border-radius: 50%; border: 1px solid rgba(200,169,110,0.04); pointer-events: none; }
    .reservation-inner { max-width: 700px; margin: 0 auto; text-align: center; position: relative; }
    .reservation-form { display: grid; grid-template-columns: 1fr 1fr; gap: 1px; background: rgba(200,169,110,0.15); margin: 3rem 0 2rem; }
    .form-group { background: #111; padding: 1.25rem 1.5rem; }
    .form-group.full { grid-column: span 2; }
    .form-label { font-size: 0.6rem; letter-spacing: 0.25em; text-transform: uppercase; color: var(--gold); display: block; margin-bottom: 0.5rem; }
    .form-input { width: 100%; background: none; border: none; outline: none; font-family: 'Jost', sans-serif; font-size: 0.9rem; color: var(--cream); padding: 0; }
    .form-input::placeholder { color: rgba(245,240,232,0.25); }
    .form-input option { background: #111; color: var(--cream); }
    .btn-reserve { width: 100%; padding: 1.1rem; background: var(--gold); color: var(--dark); font-family: 'Jost', sans-serif; font-size: 0.72rem; letter-spacing: 0.25em; text-transform: uppercase; border: none; cursor: pointer; transition: all 0.3s; }
    .btn-reserve:hover { background: #d4b87c; }

    /* FOOTER */
    footer { background: #060606; padding: 4rem 3rem 2rem; }
    .footer-grid { display: grid; grid-template-columns: 1.5fr 1fr 1fr 1fr; gap: 3rem; margin-bottom: 3rem; }
    .footer-logo { font-family: 'Cormorant Garamond', serif; font-size: 2rem; color: var(--gold); display: block; margin-bottom: 1rem; }
    .footer-desc { font-size: 0.8rem; line-height: 1.8; color: rgba(245,240,232,0.4); }
    .footer-heading { font-size: 0.65rem; letter-spacing: 0.3em; text-transform: uppercase; color: var(--gold); margin-bottom: 1.25rem; }
    .footer-links { list-style: none; }
    .footer-links li { margin-bottom: 0.6rem; }
    .footer-links a { font-size: 0.8rem; color: rgba(245,240,232,0.45); text-decoration: none; transition: color 0.3s; }
    .footer-links a:hover { color: var(--cream); }
    .footer-bottom { border-top: 1px solid rgba(200,169,110,0.1); padding-top: 2rem; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 1rem; }
    .footer-copy { font-size: 0.72rem; color: rgba(245,240,232,0.25); }
    .social-links { display: flex; gap: 1.25rem; }
    .social-links a { font-size: 0.65rem; letter-spacing: 0.15em; text-transform: uppercase; color: rgba(245,240,232,0.35); text-decoration: none; transition: color 0.3s; }
    .social-links a:hover { color: var(--gold); }

    @keyframes fadeUp { from { opacity: 0; transform: translateY(30px); } to { opacity: 1; transform: translateY(0); } }
    @keyframes bounce { 0%, 100% { transform: translateX(-50%) translateY(0); } 50% { transform: translateX(-50%) translateY(8px); } }

    @media (max-width: 900px) {
      nav { padding: 1.25rem 1.5rem; }
      .nav-links, .nav-cta { display: none; }
      .hamburger { display: flex; }
      .about { grid-template-columns: 1fr; }
      .about-img { height: 350px; }
      .about-content { padding: 3rem 2rem; }
      .gallery { grid-template-columns: 1fr 1fr; grid-template-rows: auto; }
      .gallery-item.featured { grid-column: span 2; }
      .footer-grid { grid-template-columns: 1fr 1fr; }
      .reservation-form { grid-template-columns: 1fr; }
      .form-group.full { grid-column: span 1; }
    }
    @media (max-width: 600px) {
      .strip { gap: 1.5rem; }
      .hero-title { font-size: 3.5rem; }
      .gallery { grid-template-columns: 1fr; }
      .gallery-item.featured { grid-column: span 1; }
      .footer-grid { grid-template-columns: 1fr; }
    }
  </style>
</head>
<body>

<nav>
  <span class="nav-logo">La Maison</span>
  <div class="nav-links">
    <a href="#">Accueil</a>
    <a href="#">À propos</a>
    <a href="#">Menu</a>
    <a href="#">Galerie</a>
    <a href="#">Contact</a>
  </div>
  <a onclick="openRes()" class="nav-cta">Réserver</a>
  <div class="hamburger">
    <span></span><span></span><span></span>
  </div>
</nav>

<section class="hero">
  <div class="hero-bg"></div>
  <div class="hero-overlay"></div>
  <div class="hero-content">
    <span class="hero-tag">Restaurant Gastronomique · Casablanca</span>
    <h1 class="hero-title">L'Art de<br><em>Bien Manger</em></h1>
    <div class="hero-divider"></div>
    <p class="hero-sub">Une expérience culinaire d'exception, au cœur de la ville</p>
    <div class="hero-btns">
      <a onclick="openRes()" class="btn-primary">Réserver une table</a>
      <a href="#menu" class="btn-ghost">Découvrir le menu</a>
    </div>
  </div>
  <div class="scroll-hint">
    <span>Défiler</span>
    <div class="scroll-arrow"></div>
  </div>
</section>

<div class="strip">
  <div class="strip-item">
    <svg class="strip-icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
    <span>15 Avenue des Arts, Casablanca</span>
  </div>
  <div class="strip-item">
    <svg class="strip-icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67V7z"/></svg>
    <span>Mar – Sam : 12h – 15h · 19h – 23h</span>
  </div>
  <div class="strip-item">
    <svg class="strip-icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/></svg>
    <span>+212 522 000 000</span>
  </div>
</div>

<section class="about">
  <div class="about-img">
    <img src="https://images.unsplash.com/photo-1414235077428-338989a2e8c0?w=900&q=80" alt="Notre cuisine"/>
    <div class="about-img-overlay"></div>
  </div>
  <div class="about-content">
    <span class="section-tag">Notre Histoire</span>
    <h2 class="section-title">Une <em>passion</em><br>pour l'excellence</h2>
    <p class="section-text">Fondé en 2010, La Maison est né d'une vision : offrir une gastronomie raffinée mêlant traditions culinaires françaises et saveurs marocaines. Chaque assiette raconte une histoire, chaque repas devient un souvenir.</p>
    <p class="section-text">Notre chef, formé dans les plus grandes maisons parisiennes, sélectionne personnellement chaque produit pour garantir fraîcheur et authenticité.</p>
    <a href="#" class="btn-ghost" style="display:inline-block; width:fit-content;">Découvrir notre histoire</a>
    <div class="stat-row">
      <div class="stat"><span class="stat-num">14</span><span class="stat-label">Ans d'expérience</span></div>
      <div class="stat"><span class="stat-num">48</span><span class="stat-label">Tables</span></div>
      <div class="stat"><span class="stat-num">★ 4.9</span><span class="stat-label">Note moyenne</span></div>
    </div>
  </div>
</section>

<section class="menu-section" id="menu">
  <div class="section-header">
    <span class="section-tag">Notre Carte</span>
    <h2 class="section-title" style="font-size:3rem;">Spécialités <em>du Chef</em></h2>
  </div>
  <div class="menu-tabs-wrap">
    <div class="menu-tabs">
      <button class="tab active">Entrées</button>
      <button class="tab">Plats</button>
      <button class="tab">Desserts</button>
      <button class="tab">Boissons</button>
    </div>
  </div>
  <div class="menu-grid" style="margin-top:2rem;">
    <div class="menu-card">
      <div class="menu-card-tag">Entrée froide</div>
      <div class="menu-card-name">Carpaccio de Saint-Jacques</div>
      <div class="menu-card-desc">Fines tranches de noix de Saint-Jacques, huile de truffe blanche, fleur de sel et agrumes du Maroc.</div>
      <div class="menu-card-footer"><span class="menu-price">185 MAD</span><span class="menu-badge">Signature</span></div>
    </div>
    <div class="menu-card">
      <div class="menu-card-tag">Entrée chaude</div>
      <div class="menu-card-name">Briouates au Fromage</div>
      <div class="menu-card-desc">Feuilletés croustillants, fromage de chèvre local, miel de thym et noix caramélisées.</div>
      <div class="menu-card-footer"><span class="menu-price">120 MAD</span><span class="menu-badge">Végétarien</span></div>
    </div>
    <div class="menu-card">
      <div class="menu-card-tag">Soupe</div>
      <div class="menu-card-name">Harira Gastronomique</div>
      <div class="menu-card-desc">Revisitée avec bouillon de homard, pois chiches confits, citron confit et safran de Taliouine.</div>
      <div class="menu-card-footer"><span class="menu-price">95 MAD</span><span class="menu-badge">Halal</span></div>
    </div>
    <div class="menu-card">
      <div class="menu-card-tag">Entrée froide</div>
      <div class="menu-card-name">Foie Gras Maison</div>
      <div class="menu-card-desc">Terrine de foie gras mi-cuit, chutney de figues, pain brioché grillé et fleur de sel.</div>
      <div class="menu-card-footer"><span class="menu-price">220 MAD</span><span class="menu-badge">Chef</span></div>
    </div>
  </div>
  <div style="text-align:center; margin-top:3rem;">
    <a href="#" class="btn-ghost">Voir la carte complète</a>
  </div>
</section>

<section>
  <div class="gallery">
    <div class="gallery-item featured">
      <img src="https://images.unsplash.com/photo-1550966871-3ed3cdb5ed0c?w=900&q=80" alt="Salle"/>
      <div class="gallery-overlay"><span>La Salle</span></div>
    </div>
    <div class="gallery-item">
      <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?w=600&q=80" alt="Plat"/>
      <div class="gallery-overlay"><span>Nos Plats</span></div>
    </div>
    <div class="gallery-item">
      <img src="https://images.unsplash.com/photo-1467003909585-2f8a72700288?w=600&q=80" alt="Cuisine"/>
      <div class="gallery-overlay"><span>La Cuisine</span></div>
    </div>
    <div class="gallery-item">
      <img src="https://images.unsplash.com/photo-1414235077428-338989a2e8c0?w=600&q=80" alt="Dessert"/>
      <div class="gallery-overlay"><span>Desserts</span></div>
    </div>
    <div class="gallery-item">
      <img src="https://images.unsplash.com/photo-1559339352-11d035aa65de?w=600&q=80" alt="Ambiance"/>
      <div class="gallery-overlay"><span>Ambiance</span></div>
    </div>
  </div>
</section>

<section class="reservation">
  <div class="reservation-inner">
    <span class="section-tag">Réservation</span>
    <h2 class="section-title" style="font-size:2.8rem;">Réservez votre<br><em>table en ligne</em></h2>
    <p class="section-text">Choisissez votre date et garantissez votre place pour une soirée inoubliable.</p>
    <div class="reservation-form">
      <div class="form-group">
        <label class="form-label">Date</label>
        <input type="date" class="form-input" />
      </div>
      <div class="form-group">
        <label class="form-label">Heure</label>
        <select class="form-input">
          <option>19:00</option><option>19:30</option><option>20:00</option>
          <option>20:30</option><option>21:00</option><option>21:30</option>
        </select>
      </div>
      <div class="form-group">
        <label class="form-label">Nombre de personnes</label>
        <select class="form-input">
          <option>1 personne</option><option>2 personnes</option>
          <option>3 personnes</option><option>4 personnes</option>
          <option>5+ personnes</option>
        </select>
      </div>
      <div class="form-group">
        <label class="form-label">Téléphone</label>
        <input type="tel" class="form-input" placeholder="+212 6XX XXX XXX"/>
      </div>
      <div class="form-group full">
        <label class="form-label">Nom complet</label>
        <input type="text" class="form-input" placeholder="Votre nom"/>
      </div>
    </div>
    <button class="btn-reserve">Confirmer la réservation</button>
    <p style="font-size:0.72rem; color: rgba(245,240,232,0.3); margin-top:1rem;">Vous recevrez une confirmation par email dans les 24h</p>
  </div>
</section>

<footer>
  <div class="footer-grid">
    <div>
      <span class="footer-logo">La Maison</span>
      <p class="footer-desc">Restaurant gastronomique au cœur de Casablanca. Une expérience culinaire unique alliant tradition et modernité.</p>
    </div>
    <div>
      <div class="footer-heading">Navigation</div>
      <ul class="footer-links">
        <li><a href="#">Accueil</a></li>
        <li><a href="#">À propos</a></li>
        <li><a href="#">Menu</a></li>
        <li><a href="#">Galerie</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
    </div>
    <div>
      <div class="footer-heading">Horaires</div>
      <ul class="footer-links">
        <li><a href="#">Mar – Ven : 12h – 15h</a></li>
        <li><a href="#">Mar – Sam : 19h – 23h</a></li>
        <li><a href="#">Dimanche : Fermé</a></li>
        <li><a href="#">Lundi : Fermé</a></li>
      </ul>
    </div>
    <div>
      <div class="footer-heading">Contact</div>
      <ul class="footer-links">
        <li><a href="#">15 Avenue des Arts</a></li>
        <li><a href="#">Casablanca, Maroc</a></li>
        <li><a href="#">+212 522 000 000</a></li>
        <li><a href="#">contact@lamaison.ma</a></li>
      </ul>
    </div>
  </div>
  <div class="footer-bottom">
    <span class="footer-copy">© 2025 La Maison. Tous droits réservés.</span>
    <div class="social-links">
      <a href="#">Instagram</a>
      <a href="#">Facebook</a>
      <a href="#">TripAdvisor</a>
    </div>
  </div>
</footer>
<!-- Reservation Modal -->
</body>
</html>