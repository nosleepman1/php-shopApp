<?php 
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      
        require '../../database/categories_db.php';
        $id = $_POST['id'];

        deleteCategory($id);
        header('Location: /views/admin/indexCategories.php');
    }