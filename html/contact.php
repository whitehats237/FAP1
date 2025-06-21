<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact – ARCHEO STAR</title>
  <link rel="stylesheet" href="/FAP/style/contact.css">
</head>
<body>

  <div class="header1">
    <h1>ARCHEO STAR</h1>
    <button><img src="/FAP/images/shop-svgrepo-com.svg" width="20" height="20"><a href="#"> E‑shop</a></button>
    <button><img src="/FAP/images/tickets-line-svgrepo-com.svg" width="20" height="20"><a href="#"> Billetterie</a></button>
  </div>

  <div class="header2">
    <nav>
       <ul>
                <li><a href="/FAP/html/index.html">Accueil</a></li>
                <li><a href="/FAP/html/chantier.html">Expositions</a></li>
                <li><a href="/FAP/html/contact.php">Contact</a></li>
                <li><a href="/FAP/html/inscription.php">Inscription</a></li>
                <li><a href="/FAP/html/Actualites.php">Actualites</a></li>
        </ul>
    </nav>
  </div>

  <div class ="header3">
    <h2>Contactez‑nous</h2><br>
    <p>Une question ? Une réservation ? Nous sommes là pour vous répondre.</p>
  </div>

  <?php
  $message_envoye = false;
  $erreur = "";
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $name = trim($_POST['name'] ?? '');
      $email = trim($_POST['email'] ?? '');
      $message = trim($_POST['message'] ?? '');

      if ($name && $email && $message) {
          try {
              $pdo = new PDO('mysql:host=localhost;dbname=archeo_it;charset=utf8', 'root', '');
              $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              $stmt = $pdo->prepare("INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)");
              $stmt->execute([$name, $email, $message]);
              $message_envoye = true;
          } catch (PDOException $e) {
              $erreur = "Erreur lors de l'envoi : " . $e->getMessage();
          }
      } else {
          $erreur = "Tous les champs sont obligatoires.";
      }
  }
  ?>

  <section class="contact">
    <h2>Envoyez‑nous un message</h2>
    <?php if ($message_envoye): ?>
      <p style="color:green;">Votre message a bien été envoyé. Merci !</p>
    <?php elseif ($erreur): ?>
      <p style="color:red;"><?= htmlspecialchars($erreur) ?></p>
    <?php endif; ?>
    <form action="" method="post">
      <div style="display:flex;flex-direction:column;gap:12px">
        <input type="text" name="name" placeholder="Nom *" required>
        <input type="email" name="email" placeholder="E‑mail *" required>
        <textarea name="message" rows="5" placeholder="Votre message *" required></textarea>
        <button type="submit">Envoyer</button>
      </div>
    </form>
  </section>

  <footer>
    <div class="footer-content">
      <p>&copy; 2025 Archeo Star. Tous droits réservés.</p>
      <div class="SOCIALS">
        <a href="#"><img src="/FAP/images/facebook-svgrepo-com.svg" width="20" height="20"></a>
        <a href="#"><img src="/FAP/images/twitter-svgrepo-com.svg"  width="20" height="20"></a>
        <a href="#"><img src="/FAP/images/instagram-167-svgrepo-com.svg" width="20" height="20"></a>
        <a href="#"><img src="/FAP/images/tiktok-svgrepo-com.svg" width="20" height="20"></a>
      </div>
      <ul>
        <li><a href="#">Mentions légales</a></li>
        <li><a href="#">Politique de confidentialité</a></li>
        <li><a href="#">Conditions d'utilisation</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
    </div>
  </footer>

</body>
</html>