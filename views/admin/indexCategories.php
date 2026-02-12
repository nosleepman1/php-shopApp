<?php 
$admin=true;
$pageTitle = "Admin - Categories";
include '../../header.php'; 
include '../../database/user_db.php';
require '../../actions/products/getProducts.php';
require '../../actions/categories/getCategories.php';
$categories = categories();
?>
<?php include '../../navbar.php'; ?>


<div class="container">
    
    <h1>Liste des Categories</h1>
   
    <div class="d-flex gap-3">
        <a href="/views/admin/index.php" class="btn btn-secondary mb-3" >Consulter produits</a>
        <button class="btn btn-outline-dark mb-3" id="btnAjouterCategory">Ajouter ue Categorie</button>
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


   
    
   
   
    <div class="voile-modale" id="voileCategory"></div>

    

    <div class="formulaireCategory" id="modalCategory">
      
        <div class="contenu-modal-category">
            <button type="button" class="btn-close-category" id="btnFermerCategory" aria-label="Close"></button>
            
            <h2>Ajouter une categorie</h2>

            

            <form action="/actions/categories/addCategory_action.php" method="POST" id="form">

                <div class="form-group mb-3">
                    <label for="libelle">Libelle</label>
                    <input type="text" class="form-control" name="libelle" >    
                </div>

                <button type="submit" class="btn btn-primary">Ajouter</button>
            </form> 
        </div>
    </div> 


        
       
        <table class="table  table-striped">
           
            <thead >
                    <tr>
                        <td class="col-2">id</td>
                        <td class="col-8">libelle</td>
                        <td>actions</td>
                       
                    </tr>
            </thead>

            <tbody>

                <?php foreach ($categories as $category): ?>
                    
                    <tr>
                        <td> <?= $category['id'] ?> </td>
                        <td> <?= $category['libelle'] ?> </td>
                        
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

   
   
    .formulaireCategory {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 1000;
        width: 90%;
        max-width: 600px;
    }


    


     .formulaireCategory.active {
        display: block;
    }

 

    .contenu-modal-category {
        background: white;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        position: relative;
    }
  
    .contenu-modal-category h2 {
        margin-bottom: 20px;
        color: #313732;
    }

    

    .btn-close-category {
        position: absolute;
        top: 15px;
        right: 15px;
    }
</style>


<script>
   
    const voileCategory = document.getElementById('voileCategory');
    const btnAjouterCategory = document.getElementById('btnAjouterCategory');
    const modalCategory = document.getElementById('modalCategory');
    const btnFermerCategory = document.getElementById('btnFermerCategory');

   
    btnAjouterCategory.addEventListener('click', (e) => {
        e.preventDefault();
        modalCategory.classList.add('active');
        voileCategory.classList.add('active');
        document.body.style.overflow = 'hidden';
    });


    btnFermerCategory.addEventListener('click', (e) => {
        e.preventDefault();
        modalCategory.classList.remove('active');
        voileCategory.classList.remove('active');
        document.body.style.overflow = 'auto';
    });

    voileCategory.addEventListener('click', (e) => {
        modalCategory.classList.remove('active');
        voileCategory.classList.remove('active');
        document.body.style.overflow = 'auto';
    });






</script>



<?php include '../../footer.php'; ?>