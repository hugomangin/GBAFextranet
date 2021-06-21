<!DOCTYPE html>
<html>

    <head>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css" />
        <title>Index</title>

    </head>

    <body>

        <?php
        include("header.php");
        ?>

        <section>

            <h1>Bienvenue sur le site du Groupement Banque-Assurance Français.</h1>

            <p>Le GBAF est le représentant de la profession bancaire et des assureurs sur tousles axes de la réglementation financière française. Notre mission est de promouvoirl'activité bancaire à l’échelle nationale en tant qu'interlocuteur privilégié des pouvoirs publics</p>

            <h2>Liste des acteurs:</h2>
            <?php
            try
            {
                $bdd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8', 'root', 'root');
            }
            catch (Exception $e)
            {
                die('Erreur : '.$e->getMessage());
            }
            $reponse_acteur = $bdd->query('SELECT id_acteur, acteur, description FROM acteur');

            while ($donnees_acteur = $reponse_acteur->fetch()) // Boucle pour récupérer les acteurs dans la BDD
            {
            ?>

                <p>
                <div id="box">
                <strong>Acteur:</strong> <?php echo $donnees_acteur['acteur']; ?><br />
                <strong>Description: </strong><?php echo $donnees_acteur['description']; ?><br />
                <a href="acteur.php?id_acteur=<?php echo $donnees_acteur['id_acteur']; ?>">Afficher la suite</a> <!-- Envoi de l'id_acteur dans l'URL et redirection vers acteur.php -->
                </div>
                </p>

              <?php

              }
              $reponse_acteur->closeCursor();
              ?>

        </section>

        <?php include("footer.php"); ?>

    </body>

</html>
