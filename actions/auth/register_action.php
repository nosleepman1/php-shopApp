
<?php
session_start();
require '../../database/user_db.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $username = $_POST['username'];
    $firstname = $_POST['firstname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!empty($username) && !empty($firstname) && !empty($email) && !empty($password)) {
        // Vérifier si l'utilisateur existe déjà
        if (!getUserByEmail($email)) {
            registerUser($username, $firstname, $email, $password);
            header('Location: /views/auth/login.php');
            exit();
        } else {
            $_SESSION['error'] = "Un utilisateur avec cet email existe déjà.";
            header('Location: /views/auth/register.php');
            exit();
        }
    } else $_SESSION['error'] = "Tous les champs sont requis.";
    header('Location: /views/auth/register.php');
    exit();




    // Ici, vous pouvez ajouter la logique pour enregistrer l'utilisateur dans la base de données
    // Par exemple, vous pouvez hacher le mot de passe et insérer les données dans une table utilisateurs

    // Rediriger vers une page de succès ou de connexion après l'inscription
    header('Location: /views/auth/login.php');
    exit();
}
