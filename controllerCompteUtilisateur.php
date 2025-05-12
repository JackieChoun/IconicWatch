<?php
session_start();
include "./utils/functions.php";
$bdd = DBconnect();
include "./model/model_utilisateur.php";

$id = $_SESSION['id_utilisateur'];
$message = "";

// Changement d'email
if (isset($_POST['action']) && $_POST['action'] === 'update_email') {
    $newEmail = $_POST['email'];
    if (filter_var($newEmail, FILTER_VALIDATE_EMAIL)) {
        $result = updateEmail($bdd, $id, $newEmail);
        if ($result === true) {
            $_SESSION['email_utilisateur'] = $newEmail;
            $message = "Email mis à jour avec succès.";
        } else {
            $message = $result; // message d'erreur renvoyé par le modèle
        }
    } else {
        $message = "Email invalide.";
    }
};

// Changement de mot de passe
if (isset($_POST['action']) && $_POST['action'] === 'update_password') {
    $currentPwd = $_POST['old_mdp'];
    $newPwd = $_POST['new_mdp'];

    // Lire l'utilisateur
    $user = readUserBymail($bdd, $_SESSION['email_utilisateur'])[0];

    if (password_verify($currentPwd, $user['mdp_utilisateur'])) {
        if (strlen($newPwd) >= 6) {
            $newHash = password_hash($newPwd, PASSWORD_DEFAULT);
            $result = updatePassword($bdd, $id, $newHash);
            $message = $result === true ? "Mot de passe mis à jour." : $result;
        } else {
            $message = "Le nouveau mot de passe sont trop courts.";
        }
    } else {
        $message = "Mot de passe actuel incorrect.";
    }
}

// Supprimer le compte
if (isset($_POST['action']) && $_POST['action'] === 'delete_account') {

    $user = readUserBymail($bdd, $_SESSION['email_utilisateur'])[0];

        $result = deleteUser($bdd, $id);
        if ($result === true) {
            session_destroy();
            header("Location: Index.php");
            exit;
        } else {
            $message = $result;
        }
    }




include "./view/header.php";
include "./view/viewCompte.php";
include "./view/footer.php";