<main id="connexion">
    <div>
        <h2 class="titreCate">Connexion</h2>
        <form action="" method="post">
            <input type="email" id="connexionEmail" name="email" placeholder="Email" required>
            <p id="messageMailCo"></p>
            <input type="password" id="connexionPassword" name="password" placeholder="Mot de passe" required>
            <p id="messagePasswordCo"></p>
            <a href="#">J'ai oublié mon mot de passe</a>
            <p> <?php echo $messageCo; ?> </p>
            <button type="submit" value="envoyer" id="connexionButton" class="btn-1" name="connexionButton">Accès à mon compte</button>
        </form>
    </div>
    <div>
        <h2 class="titreCate">Créer mon compte</h2>
        <form action="" method="post">
            <input type="text" id="pseudo" name="pseudo_utilisateur" minlength="2" placeholder="Pseudo" required>
            <input type="email" id="inscriptionEmail" name="email_utilisateur" placeholder="Email" required>
            <p id="messageMail"></p>
            <input type="password" id="inscriptionPassword" name="mdp_utilisateur" minlength="8" placeholder="Mot de passe" required>
            <p id="messagePassword"></p>

            <p><?php echo $message; ?></p>
            <button type="submit" name="inscriptionButton" value="valider" id="inscriptionButton" class="btn-1">Valider le compte</button>
        </form>
    </div>
</main>