<?php
require_once 'config/database.php';
session_start();

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';

    // Validation
    if (empty($name) || empty($email) || empty($password) || empty($confirm_password)) {
        $error = "Veuillez remplir tous les champs.";
    } elseif (strlen($password) < 6) {
        $error = "Le mot de passe doit contenir au moins 6 caractères.";
    } elseif ($password !== $confirm_password) {
        $error = "Les mots de passe ne correspondent pas.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Adresse email invalide.";
    } else {
        // Check if email already exists
        $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->execute([$email]);
        
        if ($stmt->fetch()) {
            $error = "Cette adresse email est déjà utilisée.";
        } else {
            // Create user
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
            
            if ($stmt->execute([$name, $email, $hashedPassword])) {
                $success = "Compte créé avec succès ! Vous pouvez maintenant vous connecter.";
                // Clear form data
                $_POST = [];
            } else {
                $error = "Erreur lors de la création du compte. Veuillez réessayer.";
            }
        }
    }
}
?>

<?php include 'includes/header.php'; ?>

<div class="form-container">
    <h2>📝 Créer un compte</h2>
    
    <?php if (!empty($error)): ?>
        <div class="alert alert-error"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>
    
    <?php if (!empty($success)): ?>
        <div class="alert alert-success"><?= htmlspecialchars($success) ?></div>
    <?php endif; ?>
    
    <form method="POST" id="signup-form">
        <div class="form-group">
            <label for="name">👤 Nom complet</label>
            <input type="text" id="name" name="name" required 
                   value="<?= htmlspecialchars($_POST['name'] ?? '') ?>"
                   placeholder="Votre nom complet">
        </div>
        
        <div class="form-group">
            <label for="email">📧 Adresse email</label>
            <input type="email" id="email" name="email" required 
                   value="<?= htmlspecialchars($_POST['email'] ?? '') ?>"
                   placeholder="votre@email.com">
        </div>
        
        <div class="form-group">
            <label for="password">🔒 Mot de passe</label>
            <input type="password" id="password" name="password" required 
                   placeholder="Au moins 6 caractères"
                   minlength="6">
        </div>
        
        <div class="form-group">
            <label for="confirm_password">🔒 Confirmer le mot de passe</label>
            <input type="password" id="confirm_password" name="confirm_password" required 
                   placeholder="Répétez votre mot de passe">
        </div>
        
        <button type="submit" class="btn" style="width: 100%; margin-top: 1rem;">
            Créer mon compte
        </button>
    </form>
    
    <div style="text-align: center; margin-top: 2rem; padding-top: 2rem; border-top: 1px solid #e1e1e1;">
        <p>Déjà un compte ? <a href="login.php" style="color: #004f3c; font-weight: 600;">Se connecter</a></p>
    </div>
</div>

<script>
// Password confirmation validation
document.getElementById('confirm_password').addEventListener('input', function() {
    const password = document.getElementById('password').value;
    const confirmPassword = this.value;
    
    if (password !== confirmPassword) {
        this.style.borderColor = '#dc3545';
    } else {
        this.style.borderColor = '#28a745';
    }
});
</script>

<?php include 'includes/footer.php'; ?>