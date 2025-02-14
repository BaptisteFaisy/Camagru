<?php
include 'db.php';

// Vérifie si le formulaire a été soumis via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération des données du formulaire
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    // Génération d'un token de confirmation
    $confirmation_token = bin2hex(random_bytes(32));

    // Insertion des données dans la base de données
    try {
        $stmt = $pdo->prepare("INSERT INTO users (username, email, password, confirmation_token) VALUES (?, ?, ?, ?)");
        $stmt->execute([$username, $email, $password, $confirmation_token]);
    } catch (PDOException $e) {
        die("Erreur lors de l'inscription : " . $e->getMessage());
    }

    // Envoi de l'e-mail de confirmation
    $confirmation_link = "http://votresite.com/confirm.php?token=$confirmation_token";
    $subject = "Confirmation de votre compte";
    $message = "Cliquez sur ce lien pour confirmer votre compte : $confirmation_link";
    $headers = "From: pro.baptisteeuw@gmail.com";

    if (mail($email, $subject, $message, $headers)) {
        echo "Un e-mail de confirmation a été envoyé à $email.";
    } else {
        echo "Erreur lors de l'envoi de l'e-mail de confirmation.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Inscription</h1>
    <form action="register.php" method="POST">
        <input type="text" name="username" placeholder="Nom d'utilisateur" required>
        <input type="email" name="email" placeholder="Adresse e-mail" required>
        <input type="password" name="password" placeholder="Mot de passe" required>
        <button type="submit">S'inscrire</button>
    </form>
    <p>Déjà inscrit ? <a href="login.php">Connectez-vous ici</a>.</p>
</body>
</html>