<?php
require_once 'config/database.php';
session_start();

$stmt = $pdo->query("SELECT * FROM products ORDER BY created_at DESC LIMIT 6");
$products = $stmt->fetchAll();
?>

<?php include 'includes/header.php'; ?>

<section class="products">
  <?php foreach ($products as $product): ?>
    <div class="product-card">
      <img src="<?= htmlspecialchars($product['image_url']) ?>" alt="<?= htmlspecialchars($product['name']) ?>">
      <h3><?= htmlspecialchars($product['name']) ?></h3>
      <p><?= htmlspecialchars($product['description']) ?></p>
      <strong><?= number_format($product['price'], 2) ?> MAD</strong><br>
      <button>Ajouter au panier</button>
    </div>
  <?php endforeach; ?>
</section>

<?php include 'includes/footer.php'; ?>
