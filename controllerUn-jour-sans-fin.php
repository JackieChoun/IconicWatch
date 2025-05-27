<?php
session_start();

require_once 'utils/functions.php';             // contient DBconnect() & nettoyage()
require_once 'model/model_commentaire.php';

$pdo = DBconnect();

// ID de l'article à afficher
//todo ou à récupérer dynamiquement via $_GET['id_article'] 
$id_article = 2;

// Traitement du POST : ajout de commentaire 
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['contenu_commentaire'])) {
    // Vérifie que l'utilisateur est connecté
    if (isset($_SESSION['id_utilisateur'])) {
        // Nettoyage du contenu du commentaire
        $contenu = nettoyage($_POST['contenu_commentaire']);
        // Vérifie que le contenu du commentaire est valide (au moins 3 caractères)
        if (strlen($contenu) >= 3) {
            ajouterCommentaire($pdo, $id_article, $_SESSION['id_utilisateur'], $contenu);
            // Redirection vers la page de l'article
            header("Location: " . $_SERVER['REQUEST_URI']);
            exit;
        }
        
    } else {
        // si non connecté, tu peux stocker un message d'erreur
        header("Location: controllerConnexion.php");
        exit;
    }
}

// Récupération des commentaires existants 
$commentaires = getCommentairesByArticle($pdo, $id_article);

// Génération de la variable $comList pour la view
$comList = '';
foreach ($commentaires as $c) {
    $comList .= '<div>';
    $comList .= '<strong>' . $c['pseudo_utilisateur'] . '</strong> ';
    $comList .= '<em>' . $c['date_commentaire'] . '</em>';
    $comList .= '<p>' . $c['contenu_commentaire'] . '</p>';
    $comList .= '</div>';
}
include "./view/header.php";
include "./view/viewUnJourSansFin.php";
include "./view/footer.php";
