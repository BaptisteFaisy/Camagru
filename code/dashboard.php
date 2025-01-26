<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Tableau de bord</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Bienvenue, <?php echo htmlspecialchars($_SESSION['username']); ?> !</h1>
    <p>Ceci est votre tableau de bord.</p>
    <a href="logout.php">Déconnexion</a>
</body>
</html>