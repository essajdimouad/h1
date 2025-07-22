<?php
require_once 'config/database.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$cart = $_SESSION['cart'] ?? [];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($cart)) {
    // Calcul total
    $total = 0;
    foreach ($cart as $item) {
        $total += $item['price'] * $item['quantity'];
    }

    // Insertion commande
    $stmt = $pdo->prepare("INSERT INTO orders (user_id, total_amount) VALUES (?, ?)");
    $stmt->execute([$user_id, $total]);
    $order_id = $pdo->lastInsertId();

    // Insertion items
    foreach ($cart as $item) {
        $stmt = $pdo->prepare("INSERT INTO order_items (order_id, product_id, quantity, price) VALUES (?, ?, ?, ?)");
        $stmt->execute([$order_id, $item['id'], $item['quantity'], $item['price']]);
    }

    // Vider panier
    $_SESSION['cart'] = [];
    $success = "Commande passée avec succès.";
}
?>

<?php include 'includes/header.php'; ?>

<h2>Validation de commande</h2>
<?php if (!empty($success)) echo "<p style='color:green;'>$success</p>"; ?>

<?php include 'includes/footer.php'; ?>
