<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css" />
        <title>Acteur</title>
    </head>
    <body>
        <?php
        include("header.php");
        include("menu.php");
        ?>
        <section>
            <div id="acteur">
            <?php
            try
            {
                $bdd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8', 'root', 'root');
                }
            catch (Exception $e)
            {
                die('Erreur : '.$e->getMessage());
                }

            $requete_acteur = $bdd->prepare('SELECT acteur, description, logo FROM acteur WHERE id_acteur = ?');
            $requete_acteur->execute(array($_GET['id_acteur']));

            while ($donnees_acteur = $requete_acteur->fetch())
            {
            ?>
            <p>
            <?php echo'<img src="logos/'.$donnees_acteur['logo'].'" class="logo_acteur_flottant" alt="logo"/>'; ?>
            <p class="titre_acteur"><?php echo $donnees_acteur['acteur']; ?></p><br />
            <p class="description_acteur"><strong>Description: </strong><?php echo $donnees_acteur['description']; ?></p><br />
            </p>
            <?php
            }
            $requete_acteur->closeCursor();
            ?>
            </div>
            <?php include("vote.php");?>
        </section>
        <section>
        <?php
        try
        {
          	$bdd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8', 'root', 'root');
            }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
            }

        $req = $bdd->prepare('SELECT COUNT(*) AS nb_commentaire FROM post WHERE id_acteur=:id_acteur AND id_utilisateur=:id_utilisateur');
        $req->execute(array(
              'id_acteur' => $_GET['id_acteur'],
              'id_utilisateur' => $_SESSION['id_utilisateur']));

        $resultat = $req->fetch();

        if($resultat['nb_commentaire'] == 0) // Filtre pour limiter l'ajout de commentaire (1/acteur)
        {
            ?>
            <div id="zone_commentaire">
            <div class="envoi_commentaire">
            <form action="traitement_commentaire.php?id_acteur=<?php echo $_GET['id_acteur']; ?>" method="post"> <!-- Formulaire pour saisir un commentaire -->
                <label for="post">Message: </label><input type="text" name="post" />
                <input type="submit" value="Envoyer" /><br><br>
            <?php
            }
        else
        {
            Echo "Vous avez déjà laissé un commentaire sur cet acteur.";
            }
        ?>
        <br><br><strong>Commentaires:</strong>
            </form>
            </div>
            <?php
            try
            {
                $bdd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8', 'root', 'root');
                }
            catch (Exception $e)
            {
                die('Erreur : '.$e->getMessage());
                }

            $requete_commentaire = $bdd->prepare('SELECT *
            FROM post
            INNER JOIN account -- Jointure entre tables post et account avec clé id_utilisateur
            ON post.id_utilisateur = account.id_utilisateur
            WHERE id_acteur = ?
            ORDER BY date_add DESC');  // Filtre sur les commentaires associés à l'acteur consulté et classement par date d'ajout, du plus récent au plus ancien
            $requete_commentaire->execute(array($_GET['id_acteur']));

            while ($donnees_commentaire = $requete_commentaire->fetch()) // Affichage des commentaires
            {
                ?>
                <div class="commentaires">
                  <?php echo htmlspecialchars($donnees_commentaire['date_add']." ".$donnees_commentaire['prenom']." ".$donnees_commentaire['nom']." ".$donnees_commentaire['post']);?>
                </div>
                <?php
                }
            $requete_commentaire->closeCursor();
            ?>
            </div>
        </section>
        <?php include("footer.php"); ?>
    </body>
</html>
