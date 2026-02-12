<?php 

    require __DIR__ . '/../../database/categories_db.php';
    function categories(){
        return all();
    }