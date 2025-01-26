<?php
session_start();

include 'db.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - Mon Site Web</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Bienvenue sur Mon Site Web</h1>
        <nav>
            <?php if (isset($_SESSION['user_id'])) : ?>
                <!-- Si l'utilisateur est connecté -->
                <p>Bonjour, <?php echo htmlspecialchars($_SESSION['username']); ?> !</p>
                <a href="dashboard.php">Tableau de bord</a>
                <a href="logout.php">Déconnexion</a>
            <?php else : ?>
                <!-- Si l'utilisateur n'est pas connecté -->
                <a href="register.php">Inscription</a>
                <a href="login.php">Connexion</a>
            <?php endif; ?>
        </nav>
    </header>

    <main>
        <section>
            <h2>À propos de ce site</h2>
            <p>Ce site web est un exemple de système d'authentification en PHP avec MySQL.</p>
            <p>Inscrivez-vous pour créer un compte ou connectez-vous pour accéder à votre tableau de bord.</p>
        </section>
    </main>

    <footer>
        <p>&copy; 2023 Mon Site Web. Tous droits réservés.</p>
    </footer>
</body>
</html>