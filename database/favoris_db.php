<?php 
    require 'db_connection.php';



    function createFavoris($user_id, $product_id) {
        global $pdo;

        $sql = 'INSERT INTO favoris (user_id, product_id) VALUES (:user_id, :product_id)';
        $stmt = $pdo->prepare($sql);
        
        return $stmt->execute([
            'user_id'=> $user_id,
            'product_id'=> $product_id
        ]);
    }

    function deleteFavoris($user_id, $product_id) {
        global $pdo;
        $sql = 'DELETE FROM favoris WHERE user_id = :user_id AND product_id = :product_id';

         $stmt = $pdo->prepare($sql);
        
        return $stmt->execute([
            'user_id'=> $user_id,
            'product_id'=> $product_id
        ]);

    }

    function checkFavorite($user_id, $product_id){
        global $pdo;

        $sql = 'SELECT * FROM favoris WHERE user_id = :user_id AND product_id = :product_id';

         $stmt = $pdo->prepare($sql);
        
        $stmt->execute([
            'user_id'=> $user_id,
            'product_id'=> $product_id
        ]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result !== false;
    }