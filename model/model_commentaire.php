<?php

function getCommentairesByArticle(PDO $pdo, int $id_article): array {
    $sql = "SELECT c.contenu_commentaire, c.date_commentaire, u.pseudo_utilisateur
            FROM commentaires c
            JOIN utilisateurs u ON c.id_utilisateur = u.id_utilisateur
            WHERE c.id_article = ?
            ORDER BY c.date_commentaire DESC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id_article]);
    return $stmt->fetchAll();
}

function ajouterCommentaire(PDO $pdo, int $id_article, int $id_utilisateur, string $contenu): bool {
    $sql = "INSERT INTO commentaires (contenu_commentaire, date_commentaire, id_article, id_utilisateur)
            VALUES (?, NOW(), ?, ?)";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$contenu, $id_article, $id_utilisateur]);
}
