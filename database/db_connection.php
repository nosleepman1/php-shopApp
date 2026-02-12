<?php
if(session_status() == PHP_SESSION_NONE){
    session_start();
}
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'boutique';
$port = 3306;

try {
    $dsn = "mysql:host=$host;port=$port;dbname=$dbname";
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,//retourne un tableau associatif
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    $pdo = new PDO($dsn, $user, $password, $options);
} catch (PDOException $e) {
    die("connexion echouée: " . $e->getMessage());
}