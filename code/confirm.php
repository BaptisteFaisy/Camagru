<?php
include 'db.php';

if (isset($_GET['token'])) {
    $token = $_GET['token'];

    try {
        $stmt = $pdo->prepare("SELECT id FROM users WHERE confirmation_token = ? AND is_confirmed = FALSE");
        $stmt->execute([$token]);
        $user = $stmt->fetch();

        if ($user) {
            $stmt = $pdo->prepare("UPDATE users SET is_confirmed = TRUE, confirmation_token = NULL WHERE id = ?");
            $stmt->execute([$user['id']]);

            echo "Votre compte a été confirmé avec succès ! Vous pouvez maintenant vous <a href='login.php'>connecter</a>.";
        } else {
            echo "Token invalide ou compte déjà confirmé.";
        }
    } catch (PDOException $e) {
        die("Erreur lors de la confirmation du compte : " . $e->getMessage());
    }
} else {
    echo "Token manquant dans l'URL.";
}
?>