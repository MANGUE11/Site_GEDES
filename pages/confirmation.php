<!DOCTYPE html>
<html lang="fr">

<head>
 <meta charset="UTF-8">
 <title>Confirmation — GEDES International</title>
 <link href="../icone.png" rel="shortcut icon" type="image/png" />
 <link
  href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800&family=Inter:wght@300;400;500;600&display=swap"
  rel="stylesheet">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
 <link href="../css/style-main.css" rel="stylesheet" />
 <link href="css/pages-style.css" rel="stylesheet" />
</head>

<body>

 <header>
  <div class="navbar">
   <a href="../index.html" class="logo-link">
    <div class="logo-section">
     <img src="../image/logo.png" alt="logo GEDES" />
     <div class="brand-text">
      <h1>GEDES International</h1>
      <p>Geo-Engineering DEsign and Surveying</p>
      <p class="brand-sub">ETUDES TECHNIQUES &amp; INGENIERIE</p>
     </div>
    </div>
   </a>
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
     <li><a href="contact1.php">CONTACT</a></li>
    </ul>
   </nav>
   <div class="hamburger" onclick="toggleMenu()">
    <span></span><span></span><span></span>
   </div>
  </div>
 </header>

 <div class="breadcrumb">
  <div class="breadcrumb-inner">
   <a href="../index.html">Accueil</a>
   <span class="sep">/</span>
   <span class="current">Confirmation</span>
  </div>
 </div>

 <?php
if (isset($_POST) && isset($_POST['nom']) && isset($_POST['email']) && isset($_POST['prenom']) && isset($_POST['numero']) && isset($_POST['demande']) && isset($_POST['message'])) {
  extract($_POST);
  if (!empty($nom) && !empty($prenom) && !empty($email) && !empty($numero) && !empty($demande) && !empty($message)) {
    $message = str_replace("\'", "'", $message);
    $destinataire = 'bacon@gedesinternational.com';
    $sujet = "Formulaire de contact";
    $msg = "Message GEDES INTERNATIONAL\n" .
           "Nom: $nom\n" .
           "Prénom: $prenom\n" .
           "Email: $email\n" .
           "Message: $message\n" .
           "Numéro: $numero\n" .
           "Sujet: $demande\n";
    $entete = "From: $nom $prenom\r\nReply-To: $email";

    if (mail($destinataire, $sujet, $msg, $entete)) {
      $statut = 'success';
      $texte  = "Votre message a bien été envoyé. Nous vous répondrons dans les plus brefs délais.";
    } else {
      $statut = 'error';
      $texte  = "Une erreur s'est produite lors de l'envoi de l'email. Veuillez réessayer.";
    }
  } else {
    $statut = 'warning';
    $texte  = "Veuillez remplir tous les champs obligatoires.";
  }
} else {
  $statut = 'warning';
  $texte  = "Aucune donnée reçue.";
}
?>

 <section class="page-content">
  <div class="content-wrapper" style="max-width: 600px; text-align: center; padding: 4rem 2rem;">
   <?php if ($statut === 'success'): ?>
   <div class="confirm-icon confirm-icon--success"><i class="fas fa-check-circle"></i></div>
   <h2 class="content-title">Message envoyé !</h2>
   <p class="content-lead"><?= htmlspecialchars($texte) ?></p>
   <?php elseif ($statut === 'error'): ?>
   <div class="confirm-icon confirm-icon--error"><i class="fas fa-times-circle"></i></div>
   <h2 class="content-title">Erreur d'envoi</h2>
   <p class="content-lead"><?= htmlspecialchars($texte) ?></p>
   <?php else: ?>
   <div class="confirm-icon confirm-icon--warning"><i class="fas fa-exclamation-circle"></i></div>
   <h2 class="content-title">Attention</h2>
   <p class="content-lead"><?= htmlspecialchars($texte) ?></p>
   <?php endif; ?>
   <a href="contact1.php" class="page-cta-btn" style="margin-top: 2rem; display: inline-block;">Retour au formulaire</a>
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
     <li><a href="contact1.php">Contact</a></li>
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