<main>
    <a href="javascript:history.back()" class="retour">Retour</a>
    <h2 class="titreCate">Compte</h2>
    <p>Bonjour <?= $_SESSION['pseudo_utilisateur'] ?></p>

    <p>Votre adresse mail est <?= $_SESSION['email_utilisateur'] ?></p>
    <a href="deco.php">Déconnexion</a>

    <h2>Modifier le mot de passe</h2>
    <form action="index.php?controller=utilisateur&action=modifierMdp" method="post">
        <label for="mdp">Nouveau mot de passe</label>
        <input type="password" name="mdp" id="mdp" required>
        <input type="submit" value="Modifier">
    </form>

    <h2>Supprimer le compte</h2>
    <form action="index.php?controller=utilisateur&action=supprimerCompte" method="post">
        <input type="submit" value="Supprimer le compte">
    </form>

    <h2>Modifier l'adresse mail</h2>
    <form action="index.php?controller=utilisateur&action=modifierEmail" method="post">
        <label for="email">Nouvelle adresse mail</label>
        <input type="email" name="email" id="email" required>
        <input type="submit" value="Modifier">
    </form>
</main>