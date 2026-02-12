<?php 
$index=true;
$pageTitle = "Accueil - Mon Site";
include 'header.php'; 
include 'database/user_db.php';
?>
<?php include 'navbar.php'; ?>

<main>
  
    <h1>Bienvenue <?php echo isset($_SESSION['user_id']) ? getFullName($_SESSION['user_id']) : 'Invité'; ?> sur notre site !</h1>
    
</main>

<?php include 'footer.php'; ?>