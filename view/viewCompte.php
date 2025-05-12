<main id="compte">
    <a href="javascript:history.back()" class="retour">Retour</a>
    <h2 class="titreCate">Compte</h2>
    <div>
        <p>Bonjour <?= $_SESSION['pseudo_utilisateur'] ?>.</p>

        <p>Votre adresse mail est <?= $_SESSION['email_utilisateur'] ?>.</p>
        <a href="deco.php">Se déconnecter</a>
        <p><?= $message ?></p>
    </div>
    <div>
        <h2>Modifier le mot de passe</h2>
        <form action="" method="post">
            <input type="password" name="old_mdp" placeholder="Ancien mot de passe" required>
            <input type="password" name="new_mdp" placeholder="Nouveau mot de passe" required>
            <button type="submit" value="Modifier" class="btn-1">Modifier</button>
            <input type="hidden" name="action" value="update_password">
        </form>

        <h2>Modifier l'adresse mail</h2>
        <form action="" method="post">
            <input type="email" name="email" placeholder="Nouvel Email">
            <button type="submit" value="Modifier" class="btn-1">Modifier</button>
            <input type="hidden" name="action" value="update_email">
        </form>

        <h2>Supprimer le compte</h2>
        <form action="" method="post" onsubmit="return confirmDeletion();" >
            <input type="hidden" name="action" value="delete_account">
            <button type="submit" value="Supprimer" class="btn-1">Supprimer</button>
        </form>
    </div>
</main>