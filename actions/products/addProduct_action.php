<?php 
require '../../database/products_db.php';
if (session_status() == 'PHP_SESSION_NONE') {
    session_start();
}
    
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        $libelle = $_POST['libelle'];
        $prix = floatval($_POST['prix']);
        $quantite = intval($_POST['quantite']);
        $description = $_POST['description'];
        $user_id = $_SESSION['user_id'];
        $category_id = $_POST['category_id'];

       if(!empty($libelle) && !empty($prix) && !empty($quantite) && !empty($description)) {
            
            if($prix < 0 || $prix > 20000000 || $quantite < 5 || $quantite > 100) {
                $_SESSION['error'] = "Le prix et la quantité doivent être des valeurs positives.";
                header('Location: /views/admin/index.php');
                exit();
            }

            if(strlen($description) < 10) {
                $_SESSION['error'] = "La description doit contenir au moins 250 caractères.";
                header('Location: /views/admin/index.php');
                exit();
            }

            $result = create($libelle, $prix, $quantite, $description, $user_id, $category_id);

            if ($result) {
                header('Location: /views/admin/index.php');
                exit();
            } else {
                $_SESSION['error'] = 'erreur lors de l ajout du produit';
                header('Location: /views/admin/index.php');
                exit();
            }
            
        } else {
            $_SESSION['error'] = "Tous les champs sont obligatoires.";
            header('Location: /views/admin/index.php');
            exit();
        }
        
    }