<?php
//session_start(); // Démarre la session

// include "./model/model_commentaire.php";
// include "./utils/functions.php";
$comList = "";
// $bdd = DBconnect();
// $comList = comAll($bdd);

// if (isset($_POST["envoyerCom"])) {
//     //! 1er étape: vérifier les champs vides
//     if (isset($_POST["contenu_commentaire"]) && !empty($_POST["contenu_commentaire"])) {
//         //! 3eme étape: nettoyer les données
//         $contenu = nettoyage($_POST["contenu_commentaire"]);
//         $date = date(DATE_RFC2822);

//         $bdd = DBconnect();

//         return comAdd($bdd, $contenu, $date);
//     } else {
//         $message = "Remplis les champs, burro";
//     }
// }

include "view/header.php";
include "view/viewInterstellar.php";
include "view/footer.php";
