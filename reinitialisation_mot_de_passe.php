<!DOCTYPE html>
<html>

    <head>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css" />
        <title>Connexion</title>

    </head>



    <body>

        <?php include("header.php"); ?>

        <section>
          <div class="formulaire_reinitialisation">
          <form class="" action="reinitialisation_mot_de_passe_traitement.php" method="post">

            <label for="pseudo_utilisateur">Nom d'utilisateur</label><input type="text" name="pseudo_utilisateur" value=""><br>
            <label for="nouveau_mot_de_passe">Nouveau mot de passe</label><input type="password" name="nouveau_mot_de_passe" value=""><br>
            <label for="confirmation_nouveau_mot_de_passe">Confirmation mot de passe</label><input type="password" name="confirmation_nouveau_mot_de_passe" value=""><br>
            <input type="submit" name="Bouton_reinitialisation" value="Reinitialiser">

          </form>
        </div>
        </section>



        <?php include("footer.php"); ?>

    </body>

</html>
