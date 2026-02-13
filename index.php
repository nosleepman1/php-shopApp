<?php 
$index=true;
$pageTitle = "Accueil - Mon Site";
include 'header.php'; 
include 'database/user_db.php';
// include 'actions/products/getProducts.php';
include 'database/products_db.php';
$products = getAll();
?>
<?php include 'navbar.php'; ?>

<main>
  
    
  
  <div class="py-5 my-5">
    <div class="container">
      <div class="row hidden-md-up">
        <div class="col-md-4 d-flex wrap gap-3">
            <?php foreach($products as $product): ?>
          <div class="card col-lg-8 p-2 card-hover shadow-sm">
            <div class="card-block">
                <div class="card-image">
                    <img src="/assets/shping.webp" alt="" class="img img-fluid">
                </div>
             
            <h4 class="card-title"><?= $product['libelle'] ?></h4>
             
            <h6 class="card-subtitle text-muted"><?= $product['categoryName'] ?></h6>
         
            <p class="card-text p-y-1 mt-2"><?= substr( $product['description'], 0, 80) . '...' ?></p>
              
              <div class="d-flex justify-content-between align-items-center">
                
                <p>stock: <b><?= (int)$product['quantite'] == 0 ? 'epuisé' : $product['quantite'] ?></b></p>
                
                <p><b><?= $product['prix']?> FCFA</b></p>
              </div>
              
              <div class="d-flex justify-content-between align-items-center "> 
                
              <a href="#" class="btn btn-success <?= isset($_SESSION['user_id']) && (int)$product['quantite'] > 0 ? '' : ' disabled' ?>">Ajouter au panier</a>
              
              <?php if(isset($_SESSION['user_id'])): ?>
                    <a href="#" > <i class="fa-regular fa-heart mr-2 text-dark fs-3"></i> </a>
                <?php endif ; ?>
              </div>
            </div>
          </div>
          <?php endforeach;?>
        </div>
    </div>
    </div>
    </div>

</main>

<style>
    .card-hover {
    transition: all 0.3s ease;
}

.card-hover:hover {
    transform: translateY(-5px);
    box-shadow: 0 1rem 3rem rgba(0,0,0,.175);
}
</style>

<?php include 'footer.php'; ?>