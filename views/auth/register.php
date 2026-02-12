<?php
session_start();
$register = true;
$pageTitle = "Inscription - Mon Site";
include '../../header.php';
?>
<?php include '../../navbar.php';
$errorMessage = $_SESSION['error'] ?? null;
unset($_SESSION['error']);
?>



<main>
    <div class="container">
        <!-- Contenu spécifique de la page -->
        <h1>Inscrivez-vous</h1>
        <form action="/actions/auth/register_action.php" method="POST">
            <?php if ($errorMessage): ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo htmlspecialchars($errorMessage); ?>
                </div>
            <?php endif; ?>
            <div class="mb-3">
                <label for="username" class="form-label">Nom d'utilisateur</label>
                <input type="text" class="form-control" id="username" name="username">
            </div>
            <div class="mb-3">
                <label for="firstname" class="form-label">Prénom</label>
                <input type="text" class="form-control" id="firstname" name="firstname">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <button type="submit" class="btn btn-primary">S'inscrire</button>

        </form>
    </div>
</main>

<?php include '../../footer.php'; ?>