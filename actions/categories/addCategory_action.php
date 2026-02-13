<?php 
    require '../../database/categories_db.php';
    if(session_status() == PHP_SESSION_NONE) session_start();

    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        $libelle = $_POST['libelle'];
        
        if(!empty($libelle)) {
            $result = createCategory($libelle);

            if($result) {
                $_SESSION['success'] = "categorie créée avec success";
                header('Location: /views/admin/indexCategories.php');
            } else {
                $_SESSION['error'] = 'echec de la creation de categorie';
                header('Location: /views/admin/indexCategories.php');
            }
        } else {
            $_SESSION['error'] = 'Veuillez saisir le libelle de la cotegorie';
            header('Location: /views/admin/indexCategories.php');
        }
    } else {
        header('Location: /views/admin/indexCategories.php');
    }