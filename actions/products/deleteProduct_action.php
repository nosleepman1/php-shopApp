<?php 

     if($_SERVER['REQUEST_METHOD'] == 'POST') {
        require '../../database/products_db.php';

        $id = intval($_POST['id']);

        $result = delete($id);

        if ($result) {
            header('Location: /views/admin/index.php');
            exit();
        } else {
            header('Location: /views/admin/index.php');
            exit();
        }

     }