<?php 

    require 'db_connection.php';



    function create($libelle, $prix, $quantite, $description, $user_id, $category_id, $image) {
        global $pdo;

        $sql = "INSERT INTO products (libelle, prix, quantite, description, user_id, category_id, image) VALUES (:libelle, :prix, :quantite, :description, :user_id, :category_id, :image)";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute(
            [
                'libelle' => $libelle,
                'prix' => $prix,
                'quantite' => $quantite,
                'description' => $description,
                'user_id'=> $user_id,
                'category_id'=> $category_id,
                'image' => $image
            ]
        );
    }

    function update($id, $libelle, $prix, $quantite, $description) {
      
        global $pdo;

        $sql = "UPDATE products SET libelle = :libelle, prix = :prix, quantite = :quantite, description = :description WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute(
            [
                'libelle' => $libelle,
                'prix' => $prix,
                'quantite' => $quantite,
                'description' => $description,
                'id' => $id
            ]
        );
    }

    function delete($id) {
        global $pdo;

        $sql = "DELETE FROM products WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }



    function getAll() {
        global $pdo;
        $sql = "SELECT p.id, p.libelle, p.prix, p.quantite, p.description, p.user_id, p.category_id, p.image, c.categoryName FROM products p JOIN categories c ON p.category_id = c.id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }


    function getById($id) {
        global $pdo;

        $sql = "SELECT * FROM products WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }