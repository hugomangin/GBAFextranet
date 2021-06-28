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
            try // Requête SQL pour récupération des acteurs
            {
                $bdd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8', 'root', 'root'); // Connexion PDO
            }
            catch (Exception $e)
                {
                die('Erreur : '.$e->getMessage());

            }
            $requete_acteur = $bdd->prepare('SELECT acteur, description, logo FROM acteur WHERE id_acteur = ?');
            $requete_acteur->execute(array($_GET['id_acteur']));

            while ($donnees_acteur = $requete_acteur->fetch()) // Boucle pour récupérer les acteurs
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

              <?php
              include("vote.php");
              ?>

        </section>



        <section>
          <div id="zone_commentaire">


            <div class="envoi_commentaire">


            <form action="traitement_commentaire.php?id_acteur=<?php echo $_GET['id_acteur']; ?>" method="post"> <!-- Formulaire pour saisir un commentaire -->

                <label for="post">Message: </label><input type="text" name="post" />
                <input type="submit" value="Envoyer" /><br><br>
                <strong>Commentaires:</strong>
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
            ORDER BY date_add DESC'); // Filtre sur les commentaires associés à l'acteur consulté

            $requete_commentaire->execute(array($_GET['id_acteur'])); // Suite filtre sur les commentaires associés à l'acteur consulté

            while ($donnees_commentaire = $requete_commentaire->fetch())
            {
            ?>

            <div class="commentaires">

            <?php echo $donnees_commentaire['date_add']." ".$donnees_commentaire['prenom']." ".$donnees_commentaire['nom']." ".$donnees_commentaire['post'];?>
            </div>

            <?php

            }
            $requete_commentaire->closeCursor();
            ?>
            </div>
        </section>

        <?php

        include("footer.php"); ?>

    </body>

</html>
