<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact — GEDES International</title>
  <link href="../icone.png" rel="shortcut icon" type="image/png" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link href="../css/style-main.css" rel="stylesheet" />
  <link href="css/pages-style.css" rel="stylesheet" />
</head>
<body>

<header>
  <div class="navbar">
    <a href="../index.html" class="logo-link"><div class="logo-section">
      <img src="../image/logoFinale.png" alt="logo GEDES" />
      <div class="brand-text">
        <h1>GEDES International</h1>
        <p>Geo-Engineering DEsign and Surveying</p>
        <p class="brand-sub">ETUDES TECHNIQUES &amp; INGENIERIE</p>
      </div>
    </div></a>
    <nav id="mainNav">
      <ul>
        <li><a href="../index.html">ACCUEIL</a></li>
        <li class="smenu" onclick="toggleSubmenu(event)">
          <a href="#">SERVICES <span>+</span></a>
          <ul class="submenu">
            <li><a href="topographie.html">Topographie</a></li>
            <li><a href="geodesie.html">Géodésie</a></li>
            <li><a href="bathymetrie.html">Bathymétrie</a></li>
            <li><a href="geotechnique.html">Géotechnique</a></li>
            <li><a href="relevea.html">Relevé d'architecture</a></li>
            <li><a href="telecommunication.html">Ingénierie Télécom</a></li>
            <li><a href="teledetection.html">Télédétection</a></li>
            <li><a href="reseaux.html">Détection de Réseaux</a></li>
            <li><a href="sig.html">Cartographie SIG</a></li>
            <li><a href="photogrametrie.html">Photogrammetrie</a></li>
            <li><a href="VRD.html">Maîtrise d'oeuvre VRD</a></li>
            <li><a href="travauxp.html">Travaux Publics</a></li>
            <li><a href="batiment.html">Bâtiment</a></li>
            <li><a href="terassement.html">Terrassement</a></li>
            <li><a href="ingenierie.html">Ingénierie</a></li>
            <li><a href="electrification.html">Électrification</a></li>
          </ul>
        </li>
        <li><a href="savoir.html">À PROPOS</a></li>
        <li><a href="reference.html">RÉFÉRENCES</a></li>
        <li><a href="video.html">VIDÉOS</a></li>
        <li><a href="contact.html" class="active">CONTACT</a></li>
      </ul>
    </nav>
    <div class="hamburger" onclick="toggleMenu()">
      <span></span><span></span><span></span>
    </div>
  </div>
</header>

<section class="page-hero">
  <img class="page-hero-img" src="../image/hero-contact.jpg" alt="" />
  <div class="page-hero-overlay"></div>
  <div class="page-hero-content">
    <h1>Contact</h1>
  </div>
</section>

<div class="breadcrumb">
  <div class="breadcrumb-inner">
    <a href="../index.html">Accueil</a>
    <span class="sep">/</span>
    <span class="current">Contact</span>
  </div>
</div>

<section class="contact-section">
  <div class="contact-wrapper">

    <!-- Infos -->
    <div class="contact-info">
      <h2 class="content-title">Parlons de votre projet</h2>
      <p class="content-lead">Un projet ? Une question ? Remplissez le formulaire et nous vous répondrons dans les plus brefs délais.</p>

      <div class="info-cards">
        <div class="info-card">
          <div class="info-card-icon"><i class="fas fa-map-marker-alt"></i></div>
          <div>
            <h4>Siège social</h4>
            <p>Riviera Palmeraie, Abidjan<br>01 BP 6116 Abidjan 01</p>
          </div>
        </div>
        <div class="info-card">
          <div class="info-card-icon"><i class="fas fa-phone"></i></div>
          <div>
            <h4>Téléphone</h4>
            <p>(+225) 27 22 51 24 93<br>(+225) 07 77 10 11 11</p>
          </div>
        </div>
        <div class="info-card">
          <div class="info-card-icon"><i class="fas fa-envelope"></i></div>
          <div>
            <h4>Email</h4>
            <p>gedes@gedes-international.com<br>contact@gedes-international.com</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Formulaire -->
    <div class="contact-form-box">

      <?php if (array_key_exists('errors', $_SESSION)): ?>
        <div class="form-alert form-alert--error">
          <i class="fas fa-exclamation-circle"></i>
          <?= implode('<br>', $_SESSION['errors']); ?>
        </div>
      <?php endif; ?>

      <?php if (array_key_exists('success', $_SESSION)): ?>
        <div class="form-alert form-alert--success">
          <i class="fas fa-check-circle"></i>
          Votre message a bien été envoyé. Nous vous répondrons rapidement.
        </div>
      <?php endif; ?>

      <form class="contact-form" action="post_contact.html" method="POST">
        <div class="form-row">
          <div class="form-group">
            <label for="prenom">Prénom *</label>
            <input type="text" id="prenom" name="prenom" placeholder="Votre prénom"
              value="<?= isset($_SESSION['inputs']['prenom']) ? htmlspecialchars($_SESSION['inputs']['prenom']) : ''; ?>" />
          </div>
          <div class="form-group">
            <label for="nom">Nom *</label>
            <input type="text" id="nom" name="nom" placeholder="Votre nom"
              value="<?= isset($_SESSION['inputs']['nom']) ? htmlspecialchars($_SESSION['inputs']['nom']) : ''; ?>" />
          </div>
        </div>
        <div class="form-row">
          <div class="form-group">
            <label for="email">Email *</label>
            <input type="email" id="email" name="email" placeholder="votre@email.com"
              value="<?= isset($_SESSION['inputs']['email']) ? htmlspecialchars($_SESSION['inputs']['email']) : ''; ?>" />
          </div>
          <div class="form-group">
            <label for="numero">Téléphone *</label>
            <input type="text" id="numero" name="numero" placeholder="+225 00 00 00 00 00"
              value="<?= isset($_SESSION['inputs']['numero']) ? htmlspecialchars($_SESSION['inputs']['numero']) : ''; ?>" />
          </div>
        </div>
        <div class="form-group">
          <label for="demande">Objet de la demande</label>
          <select id="demande" name="demande">
            <option value="Demande d'information">Demande d'information</option>
            <option value="Offre commerciale">Offre commerciale</option>
            <option value="Autre demande">Autre demande</option>
          </select>
        </div>
        <div class="form-group">
          <label for="message">Message *</label>
          <textarea id="message" name="message" rows="5" placeholder="Décrivez votre projet ou votre demande…"><?= isset($_SESSION['inputs']['message']) ? htmlspecialchars($_SESSION['inputs']['message']) : ''; ?></textarea>
        </div>
        <button type="submit" class="form-submit">
          <i class="fas fa-paper-plane"></i> Envoyer le message
        </button>
      </form>
    </div>

  </div>
</section>

<footer>
  <div class="footer-content">
    <div class="footer-column">
      <h3>GEDES International</h3>
      <p><strong>Geo-Engineering Design and Surveying</strong></p>
      <p>Bureau d'études spécialisé en topographie, géodésie et géomatique de renommée internationale.</p>
    </div>
    <div class="footer-column">
      <h3>Contact</h3>
      <p><i class="fas fa-map-marker-alt"></i> Siège Abidjan: Riviera Palmeraie</p>
      <p>01 BP 6116 Abidjan 01</p>
      <p><i class="fas fa-phone"></i> Tel: (+225) 27 22 51 24 93</p>
      <p><i class="fas fa-mobile-alt"></i> Mobile: (+225) 07 77 10 11 11</p>
    </div>
    <div class="footer-column">
      <h3>Services</h3>
      <ul>
        <li><a href="topographie.html">Topographie</a></li>
        <li><a href="geodesie.html">Géodésie</a></li>
        <li><a href="bathymetrie.html">Bathymétrie</a></li>
        <li><a href="geotechnique.html">Géotechnique</a></li>
      </ul>
    </div>
    <div class="footer-column">
      <h3>Liens Utiles</h3>
      <ul>
        <li><a href="reference.html">Références</a></li>
        <li><a href="video.html">Vidéos</a></li>
        <li><a href="contact.html">Contact</a></li>
        <li><a href="mailto:gedes@gedes-international.com">Email</a></li>
      </ul>
    </div>
  </div>
  <div class="footer-bottom">
    <p>&copy; 2024 GEDES International — Tous droits réservés</p>
  </div>
</footer>

<script src="../js/main.js"></script>
</body>
</html>
<?php
unset($_SESSION['inputs']);
unset($_SESSION['success']);
unset($_SESSION['errors']);
?>
