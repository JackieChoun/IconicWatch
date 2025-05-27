<?php

if (isset($_SESSION["id_utilisateur"])) {
    echo "<style>.link {
            display: none;
        }</style>";
} else {
    echo "<style>.linkCo {
            display: none;
        }</style>";
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Acceuil d'IconicWatch, article sur les montres au cinema. Pour passionnés de montre ET de cinema.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./source/css/projet.css">
    <title>Iconic Watch</title>
</head>

<body id="haut">
    <header>
        <div>
            <a href="index.php" title="Accueil"> <img src="./source/image/logo/logo.svg" alt="logo" id="logo"> </a>
            <div id="titreAccueil">
                <h1>ICONIC WATCH</h1>
                <h2>LES MONTRES AU CINEMA</h2>
            </div>
        </div>
        <div id="icon">
            <div>
                <input type="search" maxlength="100" minlength="2" size="30" id="search">
                <label for="search"> <img src="./source/image/logo/Search.svg" alt="search" class="icones"> </label>
            </div>
            <a href="<?php echo isset($_SESSION['id_utilisateur']) ? 'controllerCompteUtilisateur.php' : 'controllerConnexion.php'; ?>"> <img src="./source/image/logo/utilisateur.svg" alt="utilisateur" class="icones" id="logoUtilisateur"></a>
            <!-- Menu burger -->
            <nav id="menuContainer">
                <button id="button"><img src="./source/image/logo/Menu.svg" alt="Menu"></button>
                <ul id="liste">
                    <li> <a href="index.php">Accueil</a> </li>
                    <li> <a href="controllerMarques.php">Marques</a> </li>
                    <li> <a href="controllerFilms.php">Films</a> </li>
                    <li> <a href="controllerConnexion.php" class="link">Connexion</a> </li>
                    <li> <a href="controllerCompteUtilisateur.php" class="linkCo">Compte</a> </li>
                    <li> <a href="deco.php" class="linkCo">Déconnexion</a> </li>
                </ul>
            </nav>
        </div>
    </header>