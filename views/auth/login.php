<?php 
session_start();
$login=true;
$pageTitle = "Connexion - Mon Site";
include '../../header.php';

 include '../../navbar.php'; 
 $errorMessage = $_SESSION['error'] ?? null;
unset($_SESSION['error']);
 ?>

<main>
    <div class="container">
        <!-- Contenu spécifique de la page -->
        <h1>Connectez-vous</h1>
        <form action="/actions/auth/login_action.php" method="POST">
            <?php if ($errorMessage): ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo htmlspecialchars($errorMessage); ?>
                </div>
            <?php endif; ?>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Se connecter</button>
        </form>
    </div>
</main>

<?php include '../../footer.php'; ?>