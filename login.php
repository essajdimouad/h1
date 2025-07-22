<?php
require_once 'config/database.php';
session_start();

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if (empty($email) || empty($password)) {
        $error = "Veuillez remplir tous les champs.";
    } else {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            header("Location: index.php");
            exit;
        } else {
            $error = "Email ou mot de passe incorrect.";
        }
    }
}
?>

<?php include 'includes/header.php'; ?>

<div class="form-container">
    <h2>🔑 Connexion</h2>
    
    <?php if (!empty($error)): ?>
        <div class="alert alert-error"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>
    
    <?php if (!empty($success)): ?>
        <div class="alert alert-success"><?= htmlspecialchars($success) ?></div>
    <?php endif; ?>
    
    <form method="POST" id="login-form">
        <div class="form-group">
            <label for="email">📧 Adresse email</label>
            <input type="email" id="email" name="email" required 
                   value="<?= htmlspecialchars($_POST['email'] ?? '') ?>"
                   placeholder="votre@email.com">
        </div>
        
        <div class="form-group">
            <label for="password">🔒 Mot de passe</label>
            <input type="password" id="password" name="password" required 
                   placeholder="Votre mot de passe">
        </div>
        
        <button type="submit" class="btn" style="width: 100%; margin-top: 1rem;">
            Se connecter
        </button>
    </form>
    
    <div style="text-align: center; margin-top: 2rem; padding-top: 2rem; border-top: 1px solid #e1e1e1;">
        <p>Pas encore de compte ? <a href="signup.php" style="color: #004f3c; font-weight: 600;">Créer un compte</a></p>
    </div>
</div>

<?php include 'includes/footer.php'; ?>