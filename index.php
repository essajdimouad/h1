<?php
require_once 'config/database.php';
session_start();

// Get products with pagination
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 6;
$offset = ($page - 1) * $limit;

$stmt = $pdo->prepare("SELECT * FROM products ORDER BY created_at DESC LIMIT ? OFFSET ?");
$stmt->execute([$limit, $offset]);
$products = $stmt->fetchAll();

// Get total products for pagination
$totalStmt = $pdo->query("SELECT COUNT(*) FROM products");
$totalProducts = $totalStmt->fetchColumn();
$totalPages = ceil($totalProducts / $limit);
?>

<?php include 'includes/header.php'; ?>

<div class="hero">
  <div class="container">
    <h1>Bienvenue chez OCP Shop</h1>
    <p>Découvrez notre sélection exceptionnelle de produits de qualité, soigneusement choisis pour vous offrir la meilleure expérience d'achat en ligne.</p>
    
    <!-- Search Bar -->
    <div style="margin-top: 2rem; max-width: 500px; margin-left: auto; margin-right: auto;">
      <input type="text" id="search-input" placeholder="🔍 Rechercher un produit..." 
             style="width: 100%; padding: 15px 20px; border: 2px solid #e1e1e1; border-radius: 25px; font-size: 1rem; outline: none; transition: all 0.3s ease;">
    </div>
  </div>
</div>

<section class="products" id="products-grid">
  <?php if (empty($products)): ?>
    <div style="grid-column: 1 / -1; text-align: center; padding: 3rem;">
      <h3>Aucun produit disponible pour le moment</h3>
      <p>Revenez bientôt pour découvrir nos nouveautés !</p>
    </div>
  <?php else: ?>
    <?php foreach ($products as $product): ?>
      <div class="product-card fade-in">
        <div class="product-image">
          <img src="<?= htmlspecialchars($product['image_url'] ?: 'https://images.pexels.com/photos/90946/pexels-photo-90946.jpeg?auto=compress&cs=tinysrgb&w=400') ?>" 
               alt="<?= htmlspecialchars($product['name']) ?>"
               loading="lazy">
        </div>
        <div class="product-content">
          <h3><?= htmlspecialchars($product['name']) ?></h3>
          <p><?= htmlspecialchars(substr($product['description'], 0, 100)) ?><?= strlen($product['description']) > 100 ? '...' : '' ?></p>
          <div class="product-price"><?= number_format($product['price'], 2) ?> MAD</div>
          <?php if (isset($_SESSION['user_id'])): ?>
            <button class="btn add-to-cart-btn" 
                    data-product-id="<?= $product['id'] ?>"
                    data-product-price="<?= $product['price'] ?>">
              🛒 Ajouter au panier
            </button>
          <?php else: ?>
            <a href="login.php" class="btn">🔑 Connectez-vous pour acheter</a>
          <?php endif; ?>
        </div>
      </div>
    <?php endforeach; ?>
  <?php endif; ?>
</section>

<!-- Pagination -->
<?php if ($totalPages > 1): ?>
<div style="text-align: center; margin: 3rem 0;">
  <div style="display: inline-flex; gap: 10px; align-items: center;">
    <?php if ($page > 1): ?>
      <a href="?page=<?= $page - 1 ?>" class="btn" style="padding: 8px 16px;">← Précédent</a>
    <?php endif; ?>
    
    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
      <a href="?page=<?= $i ?>" 
         class="btn <?= $i === $page ? 'active' : '' ?>" 
         style="padding: 8px 16px; <?= $i === $page ? 'background: #006b52;' : 'background: #ccc; color: #333;' ?>">
        <?= $i ?>
      </a>
    <?php endfor; ?>
    
    <?php if ($page < $totalPages): ?>
      <a href="?page=<?= $page + 1 ?>" class="btn" style="padding: 8px 16px;">Suivant →</a>
    <?php endif; ?>
  </div>
</div>
<?php endif; ?>

<!-- Features Section -->
<div style="background: white; margin: 3rem auto; max-width: 1200px; border-radius: 20px; padding: 3rem; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
  <h2 style="text-align: center; margin-bottom: 2rem; color: #004f3c;">Pourquoi choisir OCP Shop ?</h2>
  <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 2rem;">
    <div style="text-align: center;">
      <div style="font-size: 3rem; margin-bottom: 1rem;">🚚</div>
      <h3 style="color: #004f3c; margin-bottom: 0.5rem;">Livraison rapide</h3>
      <p style="color: #666;">Livraison gratuite pour toute commande supérieure à 500 MAD</p>
    </div>
    <div style="text-align: center;">
      <div style="font-size: 3rem; margin-bottom: 1rem;">🔒</div>
      <h3 style="color: #004f3c; margin-bottom: 0.5rem;">Paiement sécurisé</h3>
      <p style="color: #666;">Vos transactions sont protégées par un cryptage SSL</p>
    </div>
    <div style="text-align: center;">
      <div style="font-size: 3rem; margin-bottom: 1rem;">⭐</div>
      <h3 style="color: #004f3c; margin-bottom: 0.5rem;">Qualité garantie</h3>
      <p style="color: #666;">Produits sélectionnés avec soin pour votre satisfaction</p>
    </div>
  </div>
</div>

<?php include 'includes/footer.php'; ?>