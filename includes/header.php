<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>OCP E-Commerce - Votre boutique en ligne</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="OCP Shop - Découvrez notre sélection de produits de qualité">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="icon" type="image/x-icon" href="assets/images/favicon.ico">
</head>
<body>
  <header class="navbar">
    <div class="container">
      <h1 class="logo">OCP Shop</h1>
      <nav class="nav-links">
        <a href="index.php">🏠 Accueil</a>
        <?php if (isset($_SESSION['user_id'])): ?>
          <a href="purchase_history.php">📋 Historique</a>
          <a href="cart.php" class="cart-link">
            🛒 Panier
            <span class="cart-badge" style="display: none;">0</span>
          </a>
          <a href="logout.php">🚪 Déconnexion</a>
        <?php else: ?>
          <a href="login.php">🔑 Connexion</a>
          <a href="signup.php">📝 Inscription</a>
        <?php endif; ?>
      </nav>
    </div>
  </header>
  <main>
</body>
</html>