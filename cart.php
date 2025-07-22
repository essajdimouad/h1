<?php
require_once 'config/database.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$message = '';

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'checkout':
                $cart = $_SESSION['cart'] ?? [];
                if (!empty($cart)) {
                    // Calculate total
                    $total = 0;
                    foreach ($cart as $item) {
                        $total += $item['price'] * $item['quantity'];
                    }

                    try {
                        $pdo->beginTransaction();
                        
                        // Insert order
                        $stmt = $pdo->prepare("INSERT INTO orders (user_id, total_amount) VALUES (?, ?)");
                        $stmt->execute([$user_id, $total]);
                        $order_id = $pdo->lastInsertId();

                        // Insert order items
                        foreach ($cart as $item) {
                            $stmt = $pdo->prepare("INSERT INTO order_items (order_id, product_id, quantity, price) VALUES (?, ?, ?, ?)");
                            $stmt->execute([$order_id, $item['id'], $item['quantity'], $item['price']]);
                        }

                        $pdo->commit();
                        
                        // Clear cart
                        $_SESSION['cart'] = [];
                        $message = "Commande #$order_id passée avec succès ! Total: " . number_format($total, 2) . " MAD";
                        
                    } catch (Exception $e) {
                        $pdo->rollBack();
                        $message = "Erreur lors de la commande: " . $e->getMessage();
                    }
                }
                break;
        }
    }
}
?>

<?php include 'includes/header.php'; ?>

<div class="container" style="max-width: 1000px; margin: 2rem auto; padding: 0 20px;">
    <h2 style="text-align: center; margin-bottom: 2rem; color: #004f3c;">🛒 Mon Panier</h2>
    
    <?php if (!empty($message)): ?>
        <div class="alert alert-success" style="margin-bottom: 2rem;">
            <?= htmlspecialchars($message) ?>
        </div>
    <?php endif; ?>
    
    <div style="display: grid; grid-template-columns: 1fr 300px; gap: 2rem; align-items: start;">
        <!-- Cart Items -->
        <div style="background: white; border-radius: 15px; padding: 2rem; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
            <h3 style="margin-bottom: 1.5rem; color: #004f3c;">Articles dans votre panier</h3>
            <div id="cart-items">
                <!-- Cart items will be populated by JavaScript -->
            </div>
        </div>
        
        <!-- Cart Summary -->
        <div style="background: white; border-radius: 15px; padding: 2rem; box-shadow: 0 5px 15px rgba(0,0,0,0.1); position: sticky; top: 100px;">
            <h3 style="margin-bottom: 1.5rem; color: #004f3c;">Résumé de la commande</h3>
            
            <div style="border-bottom: 1px solid #e1e1e1; padding-bottom: 1rem; margin-bottom: 1rem;">
                <div style="display: flex; justify-content: space-between; margin-bottom: 0.5rem;">
                    <span>Sous-total:</span>
                    <span id="cart-total">0.00</span> MAD
                </div>
                <div style="display: flex; justify-content: space-between; margin-bottom: 0.5rem;">
                    <span>Livraison:</span>
                    <span>Gratuite</span>
                </div>
            </div>
            
            <div style="display: flex; justify-content: space-between; font-weight: bold; font-size: 1.2rem; margin-bottom: 2rem;">
                <span>Total:</span>
                <span id="final-total">0.00</span> MAD
            </div>
            
            <form method="POST" id="checkout-form">
                <input type="hidden" name="action" value="checkout">
                <button type="submit" class="btn" style="width: 100%; padding: 15px; font-size: 1.1rem;" id="checkout-btn">
                    🛍️ Passer la commande
                </button>
            </form>
            
            <div style="text-align: center; margin-top: 1rem;">
                <a href="index.php" style="color: #004f3c; text-decoration: none;">← Continuer mes achats</a>
            </div>
        </div>
    </div>
</div>

<style>
.cart-item {
    display: grid;
    grid-template-columns: 80px 1fr auto auto auto;
    gap: 1rem;
    align-items: center;
    padding: 1rem;
    border-bottom: 1px solid #f0f0f0;
    margin-bottom: 1rem;
}

.cart-item:last-child {
    border-bottom: none;
    margin-bottom: 0;
}

.cart-item-image {
    width: 80px;
    height: 80px;
    object-fit: cover;
    border-radius: 8px;
}

.cart-item-details h4 {
    margin: 0 0 0.5rem 0;
    color: #004f3c;
}

.cart-item-price {
    color: #666;
    font-size: 0.9rem;
}

.cart-item-controls {
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.qty-btn {
    background: #f8f9fa;
    border: 1px solid #dee2e6;
    width: 30px;
    height: 30px;
    border-radius: 50%;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    transition: all 0.2s ease;
}

.qty-btn:hover {
    background: #004f3c;
    color: white;
    border-color: #004f3c;
}

.quantity {
    min-width: 30px;
    text-align: center;
    font-weight: bold;
}

.cart-item-total {
    font-weight: bold;
    color: #004f3c;
}

.remove-btn {
    background: #dc3545;
    color: white;
    border: none;
    width: 30px;
    height: 30px;
    border-radius: 50%;
    cursor: pointer;
    font-size: 1.2rem;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.2s ease;
}

.remove-btn:hover {
    background: #c82333;
    transform: scale(1.1);
}

.empty-cart {
    text-align: center;
    padding: 3rem;
    color: #666;
    font-size: 1.1rem;
}

@media (max-width: 768px) {
    .container > div {
        grid-template-columns: 1fr !important;
    }
    
    .cart-item {
        grid-template-columns: 60px 1fr auto;
        gap: 0.5rem;
    }
    
    .cart-item-controls {
        grid-column: 1 / -1;
        justify-content: center;
        margin-top: 0.5rem;
    }
    
    .cart-item-total {
        grid-column: 1 / -1;
        text-align: center;
        margin-top: 0.5rem;
    }
}
</style>

<script>
// Update the final total when cart total changes
function updateFinalTotal() {
    const cartTotal = document.getElementById('cart-total');
    const finalTotal = document.getElementById('final-total');
    const checkoutBtn = document.getElementById('checkout-btn');
    
    if (cartTotal && finalTotal) {
        finalTotal.textContent = cartTotal.textContent;
        
        // Disable checkout button if cart is empty
        const total = parseFloat(cartTotal.textContent);
        if (checkoutBtn) {
            checkoutBtn.disabled = total === 0;
            checkoutBtn.style.opacity = total === 0 ? '0.5' : '1';
        }
    }
}

// Override the displayCart function to update final total
const originalDisplayCart = window.displayCart;
window.displayCart = function() {
    if (originalDisplayCart) {
        originalDisplayCart();
        updateFinalTotal();
    }
};

// Initialize
document.addEventListener('DOMContentLoaded', function() {
    updateFinalTotal();
    
    // Handle checkout form submission
    document.getElementById('checkout-form').addEventListener('submit', function(e) {
        const cart = JSON.parse(localStorage.getItem('cart')) || [];
        if (cart.length === 0) {
            e.preventDefault();
            showNotification('Votre panier est vide', 'error');
            return;
        }
        
        // Store cart in session for PHP processing
        fetch('api/store_cart.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(cart)
        });
    });
});
</script>

<?php include 'includes/footer.php'; ?>