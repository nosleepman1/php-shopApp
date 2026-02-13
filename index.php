<?php 
$index=true;
$pageTitle = "Accueil - Mon Site";
include 'header.php'; 
include 'database/user_db.php';
// include 'actions/products/getProducts.php';
include 'database/products_db.php';
$products = getAll();
require 'database/favoris_db.php';
?>
<?php include 'navbar.php'; ?>

<main>
  
    <style>
        img{
            max-height: 200px;
            max-width: 200px;
            width: 100%;
            overflow: hidden;
        }
    </style>
  
  <div class="py-5 my-5">
    <div class="container">
      <?php if (isset($_SESSION['error'])): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <?= htmlspecialchars($_SESSION['error']) ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php unset($_SESSION['error']); ?>
      <?php endif; ?>
      
      <div class="row hidden-md-up">
        <div class=" d-flex flex-wrap gap-3 justify-content-center">
            <?php foreach($products as $product): ?>
          <div class="card col-lg-2 col-sm-12 col-md-4 p-2 card-hover shadow-sm">
            <div class="card-block">
                <div class="card-image">
                    <img src="<?= $product['image'] ? $product['image'] : '/assets/shping.webp'?>" alt="" class="img img-fluid">
                </div>
             
            <h4 class="card-title"><?= $product['libelle'] ?></h4>
             
            <h6 class="card-subtitle text-muted"><?= $product['categoryName'] ?></h6>
         
            <p class="card-text p-y-1 mt-2"><?= substr( $product['description'], 0, 30) . '...' ?></p>
              
              <div class="d-flex justify-content-between align-items-center">
                
                <p>stock: <b><?= (int)$product['quantite'] == 0 ? 'epuisé' : $product['quantite'] ?></b></p>
                
                <p><b><?= $product['prix']?> F</b></p>
              </div>
              
              <div class="d-flex justify-content-between align-items-center "> 
                
              <a href="#" class="btn btn-success <?= isset($_SESSION['user_id']) && (int)$product['quantite'] > 0 ? '' : ' disabled' ?>">Ajouter au panier</a>
              
              <?php if(isset($_SESSION['user_id'])): ?>
                    <form action="/actions/favoris/addFavoris.php" method="post">
                        <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                        <button id="btn" type="submit"> 
                            <i class="fa-<?= checkFavorite($_SESSION['user_id'], $product['id']) ? 'solid' : 'regular' ?> fa-heart mr-2 text-dark fs-3"></i>
                         </button>
                    </form>
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

    #btn{
        border: none;
        background: none;
    }
    .card-hover {
    transition: all 0.3s ease;
}

.card-hover:hover {
    transform: translateY(-5px);
    box-shadow: 0 1rem 3rem rgba(0,0,0,.175);
}
</style>

<?php include 'footer.php'; ?>