<?php
include "./utils/functions.php";
include "./model/model_utilisateur.php";

session_start();
$message = "";
$messageCo = "";

if (isset($_POST["inscriptionButton"])) {
    //! 1er étape: vérifier les champs vides
    if (isset($_POST["pseudo_utilisateur"]) && !empty($_POST["pseudo_utilisateur"]) && isset($_POST["email_utilisateur"]) && !empty($_POST["email_utilisateur"]) && isset($_POST["mdp_utilisateur"]) && !empty($_POST["mdp_utilisateur"])) {
        //! 2eme étape: vérifier format
        if (filter_var($_POST["email_utilisateur"], FILTER_VALIDATE_EMAIL)) {
            //! 3eme étape: nettoyer les données
            $pseudo = nettoyage($_POST["pseudo_utilisateur"]);
            $email = nettoyage($_POST["email_utilisateur"]);
            $mdp = nettoyage($_POST["mdp_utilisateur"]);
            //chiffrage mdp
            $mdp = password_hash($mdp, PASSWORD_BCRYPT);

            $bdd = DBconnect();

            $message = userAdd($bdd, $pseudo, $email, $mdp);
        } else {
            $message = "Email non valide";
        }
    } else {
        $message = "Remplir tous les champs obligatoires svp";
    }
}

if (isset($_POST["connexionButton"])) {
    //! 1er étape: vérifier les champs vides
    if (isset($_POST["email"]) && !empty($_POST["email"]) && isset($_POST["password"]) && !empty($_POST["password"])) {
        //! 2eme étape: vérifier format
        if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            //! 3eme étape: nettoyer les données
            $email = nettoyage($_POST["email"]);
            $mdp = nettoyage($_POST["password"]);

            $bdd = DBconnect();

            $data = readUserBymail($bdd, $email);

            if (!empty($data)) {

                //! Verifier correspondance mdp entré avec mdp BDD
                if (password_verify($mdp, $data[0]["mdp_utilisateur"])) {

                    $_SESSION['id_utilisateur'] = $data[0]['id_utilisateur'];
                    $_SESSION['pseudo_utilisateur'] = $data[0]['pseudo_utilisateur'];
                    $_SESSION['email_utilisateur'] = $data[0]['email_utilisateur'];
                    $_SESSION['id_role'] = $data[0]['id_role'];

                    if ($data[0]['id_role'] == 2) {
                        header('Location:controllerAdmin.php');
                    } else {
                        $messageCo = "Connexion réussie";
                        header('Location:controllerCompteUtilisateur.php');
                    }
                } else {
                    $messageCo = "Mot de passe non valide";
                }
            } else {
                $messageCo = "Login et/ou Mot de Passe incorrect(s)";
            }
        } else {
            $messageCo = "Email non valide";
        }
    } else {
        $messageCo = "Remplir tous les champs obligatoires svp";
    }
}


include "./view/header.php";
include "./view/viewConnexion.php";
include "./view/footer.php";
