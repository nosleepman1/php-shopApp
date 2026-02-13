
<?php 
$produits=true;
$pageTitle = "Produits - Mon Site";
include '../../header.php'; 
include '../../database/user_db.php';
require '../../actions/products/getProducts.php';
?>
<?php include '../../navbar.php'; ?>



<div class="container">

    <h1>Liste des produits</h1>
    <div>
        <a href="/views/pages/addProduct.php" class="btn btn-primary mb-3">Ajouter un produit</a>
    </div>
    <?php if(empty($products)): ?>
        <p>Aucun produit disponible.</p>
    <?php else: ?>
        <div class="row d-flex justify-content-center wrap">
        <?php foreach ($products as $product): ?>
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="my-3">
                            <img src="/assets/shping.webp" class="img-fluid" alt="">
                        </div>
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title"><?php echo htmlspecialchars($product['libelle']); ?></h3>
                              <p class="card-text">Prix: <span><?php echo htmlspecialchars($product['prix']) ?></span> FCFA</p>
                        </div>
                        
                        <a href="/views/pages/productDetails.php?id=<?=  $product['id']; ?>" class="btn btn-primary mt-5">Voir plus</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>

        <style>
            span{
                font-size: 15px;
                font-weight: bold;
            }

            img{
                width: 300px;
                height: 350px;
            }
        </style>
</div>