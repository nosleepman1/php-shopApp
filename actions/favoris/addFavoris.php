<?php 
    require '../../database/db_connection.php';
    require '../../database/favoris_db.php';
    require '../../database/products_db.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
    
        $user_id = $_SESSION['user_id'];
        $product_id = (int) $_POST['product_id'];

          
        if (checkFavorite($user_id, $product_id)) { 
          
            $result = deleteFavoris($user_id, $product_id);
            
            if (!$result) {
                $_SESSION['error'] = 'erreur lors de la suppression des favoris';
            }
        } else {
                $result = createFavoris($user_id, $product_id);
               
                if (!$result) {
                    $_SESSION['error'] = 'erreur lors de l ajout aux favoris';
                
                } 
            }
        }

        header('Location: /index.php');
        exit();
          