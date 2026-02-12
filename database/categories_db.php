<?php 

    require_once 'db_connection.php';

    function createCategory($libelle){
        global $pdo;

        $sql = 'INSERT INTO categories (libelle) VALUES (:libelle)';

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':libelle', $libelle, PDO::PARAM_STR);
        return $stmt->execute();
    }

    function deleteCategory($id){
        global $pdo;
        $sql = 'DELETE FROM categories WHERE id=:id';
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    function updateCategory($id, $libelle){
        global $pdo;
        $sql = 'UPDATE categories SET libelle=:libelle WHERE id=:id';
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':libelle', $libelle, PDO::PARAM_STR);
        return $stmt->execute();
    }

    function getCategory($id){
        global $pdo;
        $sql = 'SELECT * FROM categories WHERE id=:id';
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    function all(){
        global $pdo;
        $sql = 'SELECT * FROM categories ORDER BY libelle';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }