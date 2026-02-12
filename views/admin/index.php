<?php 
$admin=true;
$pageTitle = "Admin - Products";
include '../../header.php'; 
include '../../database/user_db.php';
require '../../actions/products/getProducts.php';
require '../../actions/categories/getCategories.php';
$categories = categories();
?>
<?php include '../../navbar.php'; ?>


<div class="container">

    
    <h1>Liste des produits</h1>
   
    <div class="d-flex gap-3">
        <a href="/views/admin/indexCategories.php" class="btn btn-secondary mb-3" >Consulter categories</a>
        <button class="btn btn-outline-dark mb-3" id="btnAjouter">Ajouter Produit</button>
    </div>

    <div class="row  justify-content-center position-relative">

    <div class=" d-flex flex-column position-relative">

    <?php if (isset($_SESSION['error']) || isset($_SESSION['success'])): ?>

        <?php 
            $isError = isset($_SESSION['error']);
            $message = $isError ? $_SESSION['error'] : $_SESSION['success'];
        ?>

        <div class="alert alert-<?= $isError ? 'danger' : 'success' ?>" role="alert">
            <?= htmlspecialchars($message) ?>
        </div>

        <?php 
            unset($_SESSION['error']);
            unset($_SESSION['success']);
        ?>

    <?php endif; ?>


   
    
   
    <div class="voile-modale" id="voile"></div>

    
    <div class="formulaire" id="modal">
      
        <div class="contenu-modal">
            <button type="button" class="btn-close" id="btnFermer" aria-label="Close"></button>
            
            <h2>Ajouter Produit</h2>

            

            <form action="/actions/products/addProduct_action.php" method="POST" id="form">

                <div class="form-group mb-3">
                    <label for="libelle">Libelle</label>
                    <input type="text" class="form-control" name="libelle" >    
                </div>

                <div class="form-group mb-3">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="description" rows="3"></textarea>    
                </div>

                <div class="form-group mb-3">
                    <label for="prix">Prix</label>
                    <input type="number" class="form-control" name="prix" required>    
                </div>

                <div class="form-group mb-3">
                    <label for="quantite">Quantité</label>
                    <input type="number" class="form-control" name="quantite" required>    
                </div>

                <div class="form-group mb-3">
                    <label for="categorie_id">Catégorie</label>
                    <select class="form-control" name="category_id">
                        <option value="">-- Sélectionner une catégorie --</option>
                        <?php foreach ($categories as $category): ?>
                            <option value="<?= $category['id'] ?>"><?= htmlspecialchars($category['libelle']) ?></option>
                        <?php endforeach; ?>
                    </select>    
                </div>

                <button type="submit" class="btn btn-primary">Soumettre</button>
            </form> 
        </div>
    </div> 

   

        
       
        <table class="table  table-striped">
           
            <thead >
                    <tr>
                        <td>Libelle</td>
                        <td>Description</td>
                        <td>Quantité</td>
                        <td>Prix</td>
                        <td>Actions</td>
                    </tr>
            </thead>

            <tbody>

                <?php foreach ($products as $product): ?>
                    
                    <tr>
                        <td> <?= $product['libelle'] ?> </td>
                        <td> <?= $product['description'] ?> </td>
                        <td> <?= $product['prix'] ?> </td>
                        <td> <?= $product['quantite'] ?> </td>
                        
                        <td >

                            <div class="d-flex gap-2">
                                <a href="/views/admin/products/editProduct.php?id=<?= $product['id'] ?>" 
                                class="btn btn-primary">
                                modifier</a>

                                <form action="/actions/products/deleteProduct_action.php" method="post">
                                    <input type="hidden" name="id" value="<?= $product['id'] ?>">
                                    <button type="submit" class="btn btn-danger">Supprimer</button>
                                </form>
                            </div>

                        </td>
                    </tr>
                    
                <?php endforeach ; ?>

            </tbody>

        </table>
    </div>
</div>
</div>

<style>
    
    .voile-modale {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.6);
        z-index: 999;
    }

    .voile-modale.active {
        display: block;
    }

   
    .formulaire {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 1000;
        width: 90%;
        max-width: 600px;
    }


    

    .formulaire.active {
        display: block;
    }

  

    .contenu-modal {
        background: white;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        position: relative;
    }
    .contenu-modal h2 {
        margin-bottom: 20px;
        color: #313732;
    }

  
    .btn-close {
        position: absolute;
        top: 15px;
        right: 15px;
    }

   
</style>


<script>
    const btnAjouter = document.getElementById('btnAjouter');
    const modal = document.getElementById('modal');
    const btnFermer = document.getElementById('btnFermer');

    const voile = document.getElementById('voile');



    
    btnAjouter.addEventListener('click', (e) => {
        e.preventDefault();
        modal.classList.add('active');
        voile.classList.add('active');
        document.body.style.overflow = 'hidden';
    });

   
    btnFermer.addEventListener('click', (e) => {
        e.preventDefault();
        modal.classList.remove('active');
        voile.classList.remove('active');
        document.body.style.overflow = 'auto';
    });

     voile.addEventListener('click', (e) => {
        modal.classList.remove('active');
        voile.classList.remove('active');
        document.body.style.overflow = 'auto';
    });

   
   







</script>



<?php include '../../footer.php'; ?>