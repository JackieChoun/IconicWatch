<?php

function comAdd($bdd, $contenu, $date)
{
    try {

        $req = $bdd->prepare("INSERT INTO commentaires (`contenu_commentaire`, `date_commentaire`) VALUES (?,?)");

        $req->bindParam(1, $contenu, PDO::PARAM_STR);
        $req->bindParam(2, $date, PDO::PARAM_STR);

        $req->execute();

        return "Votre commentaire est envoyé";
    } catch (EXCEPTION $error) {
        return $error->getMessage();
    }
}

function comAll($bdd)
{
    try {
        //!préparer le SELECT
        $req = $bdd->prepare("SELECT contenu_commentaire, date_commentaire FROM commentaires");

        //!execution de la requete
        $req->execute();

        //!récupérer données BDD
        $data = $req->fetchAll();

        //création varible
        $comList = "";

        //!affichage
        foreach ($data as $commentaire) {
            $comList = $comList . "<div> <p>date:{$commentaire['date_commentaire']} {$commentaire['contenu_commentaire']}</p> </div>";
        }

        return $comList;
    } catch (EXCEPTION $e) {
        return $e->getMessage();
    }
}
