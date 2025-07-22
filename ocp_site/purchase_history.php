<?php
require_once 'config/database.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

$stmt = $pdo->prepare("SELECT * FROM orders WHERE user_id = ? ORDER BY order_date DESC");
$stmt->execute([$user_id]);
$orders = $stmt->fetchAll();
?>

<?php include 'includes/header.php'; ?>

<h2>Historique de vos commandes</h2>
<?php foreach ($orders as $order): ?>
    <div>
        Commande #<?= $order['id'] ?> – <?= $order['order_date'] ?> – Total: <?= $order['total_amount'] ?> MAD
    </div>
<?php endforeach; ?>

<?php include 'includes/footer.php'; ?>
