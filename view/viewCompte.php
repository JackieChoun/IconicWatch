<main id="compte">
    <a href="javascript:history.back()" class="retour">Retour</a>
    <h2 class="titreCate">Compte</h2>
    <div>
        <p>Bonjour <?= $_SESSION['pseudo_utilisateur'] ?></p>

        <p>Votre adresse mail est <?= $_SESSION['email_utilisateur'] ?></p>
        <a href="deco.php">Déconnexion</a>
    </div>
    <div>
        <h2>Modifier le mot de passe</h2>
        <form action="" method="post">
            <label for="mdp">Nouveau mot de passe</label>
            <input type="password" name="mdp" id="mdp" required>
            <input type="submit" value="Modifier" class="btn-1">
        </form>

        <h2>Supprimer le compte</h2>
        <form action="" method="post">
            <input type="submit" value="Supprimer le compte" class="btn-1">
        </form>

        <h2>Modifier l'adresse mail</h2>
        <form action="" method="post">
            <label for="email">Nouvelle adresse mail</label>
            <input type="email" name="email" id="email" required>
            <input type="submit" value="Modifier" class="btn-1">
        </form>
    </div>
</main>