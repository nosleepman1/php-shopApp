<header data-bs-theme="dark">
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">L2GL APP</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                   
                    <li class="nav-item"><a class="nav-link  <?php echo $index ? 'active' : '' ?>" href="/index.php"  > Accueil</a></li>
                   
                   
                    <?php if (isset($_SESSION['user_id'])): ?>
                      <li class="nav-item"><a class="nav-link  <?php echo $produits ? 'active' : '' ?>" href="/views/products/produits.php"  > Produits</a></li> 
                    <?php endif; ?>
                   
                   
                    <?php if (!isset($_SESSION['user_id'])): ?>
                        <li class="nav-item"><a class="nav-link <?php echo $login ? 'active' : '' ?>" href="/views/auth/login.php"  > Connexion</a></li>
                        <li class="nav-item"><a class="nav-link <?php echo $register ? 'active' : '' ?>" href="/views/auth/register.php"  > Inscription</a></li>
                    <?php endif; ?>

                    <?php if (isset($_SESSION['role']) && $_SESSION['role'] == "admin"): ?>
                        <li class="nav-item"><a class="nav-link <?php echo $admin ? 'active' : '' ?>" href="/views/admin/index.php"  > Administrateur</a></li>
                    <?php endif; ?>
                </ul>

                <?php if (isset($_SESSION['user_id'])): ?>
                <form class="d-flex" action="/actions/auth/logout_action.php">
                    <button  class="btn btn-outline-danger" type="submit">Deconnexion</button>
                </form>
                <?php endif; ?>
            </div>
        </div>
    </nav>
</header>