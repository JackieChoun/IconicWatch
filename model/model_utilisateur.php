<?php

function userAdd($bdd, $pseudo, $email, $mdp)
{
    $role = 1;
    try {

        //! verif du mail déjà existant
        $req = $bdd->prepare("SELECT email_utilisateur FROM utilisateurs WHERE email_utilisateur = ? LIMIT 1");

        $req->bindParam(1, $email, PDO::PARAM_STR);

        $req->execute();

        $utilisateur = $req->fetch(PDO::FETCH_ASSOC);

        if (empty($utilisateur)) {
            //! envoi des données sur BDD
            $req = $bdd->prepare("INSERT INTO utilisateurs (`pseudo_utilisateur`, `email_utilisateur`, `mdp_utilisateur`, id_role) VALUES (?,?,?,?)");

            $req->bindParam(1, $pseudo, PDO::PARAM_STR);

            $req->bindParam(2, $email, PDO::PARAM_STR);

            $req->bindParam(3, $mdp, PDO::PARAM_STR);

            $req->bindParam(4, $role, PDO::PARAM_INT);

            $req->execute();

            return "Inscription de $pseudo réussi.";
        } else {
            return "Email déjà utilisé";
        }
    } catch (EXCEPTION $error) {
        return $error->getMessage();
    }
}


function readUserBymail($bdd, $email)
{

    try {
        $req = $bdd->prepare("SELECT id_utilisateur, pseudo_utilisateur, email_utilisateur, mdp_utilisateur, id_role FROM utilisateurs WHERE email_utilisateur = ? LIMIT 1");

        $req->bindParam(1, $email, PDO::PARAM_STR);

        $req->execute();

        $data = $req->fetchAll();

        return $data;
    } catch (Exception $error) {
        return $error->getMessage();
    }
}

//! Uptade de l'utilisateur
function updatePassword($bdd, $id_utilisateur, $newPasswordHash)
{
    try {
        $req = $bdd->prepare("UPDATE utilisateurs SET mdp_utilisateur = ? WHERE id_utilisateur = ?");
        $req->bindParam(1, $newPasswordHash, PDO::PARAM_STR);
        $req->bindParam(2, $id_utilisateur, PDO::PARAM_INT);
        $req->execute();
        return true;
    } catch (Exception $error) {
        return $error->getMessage();
    }
}

function updateEmail($bdd, $id_utilisateur, $newEmail)
{
    try {
        $req = $bdd->prepare("UPDATE utilisateurs SET email_utilisateur = ? WHERE id_utilisateur = ?");
        $req->bindParam(1, $newEmail, PDO::PARAM_STR);
        $req->bindParam(2, $id_utilisateur, PDO::PARAM_INT);
        $req->execute();
        return true;
    } catch (Exception $error) {
        return $error->getMessage();
    }
}

function deleteUser($bdd, $id_utilisateur)
{
    try {
        $req = $bdd->prepare("DELETE FROM utilisateurs WHERE id_utilisateur = ?");
        $req->bindParam(1, $id_utilisateur, PDO::PARAM_INT);
        $req->execute();
        return true;
    } catch (Exception $error) {
        return $error->getMessage();
    }
}

