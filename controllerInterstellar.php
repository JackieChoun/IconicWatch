<?php
session_start(); // Démarre la session

include "./utils/functions.php";

// $bdd = DBconnect();


// // Vérifier si l'utilisateur est connecté
// if (!isset($_SESSION['pseudo_utilisateur'])) {
//     die("Vous devez être connecté pour poster un commentaire.");
// }

// // Vérifier si un commentaire est soumis
// if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["contenu_commentaire"])) {

//     $pseudo = $_SESSION['pseudo_utilisateur']; // Récupère le pseudo de la session
//     $commentaire = nettoyage($_POST["contenu_commentaire"]);

//     $sql = "INSERT INTO commentaires(id_commentaire, contenu_commentaire) VALUES ('$pseudo', '$commentaire')";

//     if ($bdd->query($sql) === TRUE) {
//         echo "Commentaire ajouté avec succès.";
//     } else {
//         echo "Erreur : " . $bdd->error;
//     }
// }

// $req = $bdd->prepare("SELECT id_utillisateur, contenu_commentaire, date_commentaire FROM commentaires ORDER BY date DESC");
// $result = $bdd->query($req);

// if ($result->num_rows > 0) {
//     while ($row = $result->fetch_assoc()) {
//         echo "<p><strong>" . htmlspecialchars($row["id_utilisateur"]) . "</strong> (" . date("d/m/Y H:i", strtotime($row["date_commentaire"])) . ") : " . htmlspecialchars($row["contenu_commentaire"]) . "</p>";
//     }
// } else {
//     echo "Aucun commentaire pour le moment.";
// }

include "view/header.php";
include "view/viewInterstellar.php";
include "view/footer.php";
