<main class="ficheFilms">
    <a href="javascript:history.back()" class="retour">Retour</a>
    <img src="./source/image/films/unjoursansfin/unjoursansfin.webp" alt="affiche Interstellar">
    <div class="imageFilms">
        <img src="./source/image/films/unjoursansfin/image1.jpg" alt="">
        <img src="./source/image/films/unjoursansfin/image2.png" alt="">
        <img src="./source/image/films/unjoursansfin/image3.jpg" alt="">
        <img src="./source/image/films/unjoursansfin/image4.jpg" alt="">
        <h2 class="titreCate">Réveil-matin Panasonic RC-6025</h2>
    </div>
    <div class="caracteristique">
        <h3>Réveil matin</h3>
        <h3>Plus en vente par la marque</h3>
        <h3>Objet de collection</h3>
    </div>
    <p>Le film repose sur le concept d’une répétition sans fin du même jour. Le réveil, qui sonne toujours à 6h00, est la métaphore parfaite de cette boucle : le début immuable de chaque nouvelle journée.
    Le Panasonic RC-6025, avec son affichage clair et son alarme distinctive, devient presque un personnage à part entière, incarnant cette répétition mécanique et inévitable. En plus de sa chanson insupportable, il est le symbole de la monotonie du jour qui ne finit jamais.
    </p>
    <?php if (isset($_SESSION['id_utilisateur'])): ?>
    <form action="" method="post">
        <textarea name="contenu_commentaire" id="commentaire" placeholder="Commentaire" required></textarea>
        <div>
            <button type="submit" name="envoyerCom" class="btn-1">Ajouter commentaire</button>
        </div>
    </form>
    <?php else: ?>
        <p><a href="index.php?page=connexion">Connecte-toi</a> pour poster un commentaire.</p>
    <?php endif; ?>
    <div id="listeCommentaires">
        <h2>Liste Commentaires</h2>
        <?= $comList; ?>
    </div>
</main>