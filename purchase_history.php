<?php
require_once 'config/database.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

// Get orders with items
$stmt = $pdo->prepare("
    SELECT o.*, 
           GROUP_CONCAT(CONCAT(p.name, ' (', oi.quantity, 'x)') SEPARATOR ', ') as items
    FROM orders o
    LEFT JOIN order_items oi ON o.id = oi.order_id
    LEFT JOIN products p ON oi.product_id = p.id
    WHERE o.user_id = ?
    GROUP BY o.id
    ORDER BY o.order_date DESC
");
$stmt->execute([$user_id]);
$orders = $stmt->fetchAll();
?>

<?php include 'includes/header.php'; ?>

<div class="container" style="max-width: 1000px; margin: 2rem auto; padding: 0 20px;">
    <h2 style="text-align: center; margin-bottom: 2rem; color: #004f3c;">📋 Historique de vos commandes</h2>
    
    <?php if (empty($orders)): ?>
        <div style="text-align: center; padding: 3rem; background: white; border-radius: 15px; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
            <div style="font-size: 4rem; margin-bottom: 1rem;">🛍️</div>
            <h3 style="color: #666; margin-bottom: 1rem;">Aucune commande trouvée</h3>
            <p style="color: #999; margin-bottom: 2rem;">Vous n'avez pas encore passé de commande.</p>
            <a href="index.php" class="btn">Découvrir nos produits</a>
        </div>
    <?php else: ?>
        <div style="display: grid; gap: 1.5rem;">
            <?php foreach ($orders as $order): ?>
                <div class="order-card">
                    <div class="order-header">
                        <div>
                            <div class="order-id">Commande #<?= $order['id'] ?></div>
                            <div class="order-date"><?= date('d/m/Y à H:i', strtotime($order['order_date'])) ?></div>
                        </div>
                        <div class="order-total"><?= number_format($order['total_amount'], 2) ?> MAD</div>
                    </div>
                    
                    <?php if ($order['items']): ?>
                        <div style="margin-top: 1rem; padding-top: 1rem; border-top: 1px solid #f0f0f0;">
                            <strong style="color: #004f3c;">Articles commandés:</strong>
                            <p style="margin-top: 0.5rem; color: #666;"><?= htmlspecialchars($order['items']) ?></p>
                        </div>
                    <?php endif; ?>
                    
                    <div style="margin-top: 1rem; display: flex; justify-content: space-between; align-items: center;">
                        <span style="padding: 4px 12px; background: #d4edda; color: #155724; border-radius: 15px; font-size: 0.9rem;">
                            ✅ Commande confirmée
                        </span>
                        <button onclick="showOrderDetails(<?= $order['id'] ?>)" 
                                style="background: none; border: 1px solid #004f3c; color: #004f3c; padding: 6px 12px; border-radius: 15px; cursor: pointer; font-size: 0.9rem;">
                            Voir détails
                        </button>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        
        <!-- Statistics -->
        <div style="margin-top: 3rem; background: white; border-radius: 15px; padding: 2rem; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
            <h3 style="text-align: center; margin-bottom: 2rem; color: #004f3c;">📊 Vos statistiques</h3>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 2rem; text-align: center;">
                <div>
                    <div style="font-size: 2rem; color: #004f3c; font-weight: bold;"><?= count($orders) ?></div>
                    <div style="color: #666;">Commandes passées</div>
                </div>
                <div>
                    <div style="font-size: 2rem; color: #004f3c; font-weight: bold;">
                        <?= number_format(array_sum(array_column($orders, 'total_amount')), 2) ?>
                    </div>
                    <div style="color: #666;">Total dépensé (MAD)</div>
                </div>
                <div>
                    <div style="font-size: 2rem; color: #004f3c; font-weight: bold;">
                        <?= count($orders) > 0 ? number_format(array_sum(array_column($orders, 'total_amount')) / count($orders), 2) : '0.00' ?>
                    </div>
                    <div style="color: #666;">Panier moyen (MAD)</div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>

<script>
function showOrderDetails(orderId) {
    // This could open a modal or redirect to a detailed order page
    showNotification(`Détails de la commande #${orderId} - Fonctionnalité à venir`, 'info');
}
</script>

<?php include 'includes/footer.php'; ?>