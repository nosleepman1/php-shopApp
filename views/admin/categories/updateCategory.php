<?php
    $id = null;
    require '../../../database/categories_db.php';

    if (isset($_GET["id"])) {
        $id = $_GET["id"];
    } else {
        header("Location: /views/admin/indexCategories.php");
    }

    $category = getCategory($_GET['id']);

    include "../../../header.php";
    include "../../../navbar.php";

?>

<div class="container m-5 p-5">
      
        <div class="contenu-modal-category">
            <button type="button" class="btn-close-category" id="btnFermerCategory" aria-label="Close"></button>
            
            <h2>Modifier une categorie</h2>

            

            <form action="/actions/categories/updateCategory_action.php" method="POST" id="form">

                <input type="hidden" name="id" value="<?= $id ?>">

                <div class="form-group mb-3">
                    <label for="libelle">Libelle</label>
                    <input type="text" class="form-control" name="libelle" value="<?= $category['libelle'] ?>">    
                </div>

                <button type="submit" class="btn btn-primary">Ajouter</button>
            </form> 
        </div>
    </div> 



<?php     include "../../../footer.php";
?>

