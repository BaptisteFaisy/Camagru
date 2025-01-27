<?php
$host = 'localhost';
$dbname = 'mon_site_web';
$username = 'baba';
$password = 'Bab123456789!';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données1 : " . $e->getMessage());
}
?>

