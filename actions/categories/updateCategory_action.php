<?php 

    if(session_status()==PHP_SESSION_NONE)session_start();
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      
        require '../../database/categories_db.php';
        $id = $_POST['id'];

        if (!$id) {
            header('Location: /views/admin/indexCategories.php');
        }

        $libelle = $_POST['libelle'];

        $result = updateCategory($id, $libelle);

        if ($result) {
            $_SESSION['success'] = 'categorie modifiée avec success';
            header('Location: /views/admin/indexCategories.php');
        } else {
            $_SESSION['error'] = 'echec lors de la modification';
            header('Location: /views/admin/indexCategories.php');
        }
    }