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
            <div class="connexion">
                <form action="connexion_traitement.php" method="post">
                <label for="pseudo_utilisateur">Nom d'utilisateur</label><input type="text" name="pseudo_utilisateur" value=""><br>
                <label for="mot_de_passe">Mot de passe</label><input type="password" name="mot_de_passe" value=""><br>
                <input type="submit" name="Bouton_inscription" value="Se connecter">
                </form>
                <a href="inscription.php">Pas de compte?</a>
                <a href="reinitialisation_mot_de_passe.php">Mot de passe oublié?</a>
            </div>
        </section>
        <?php include("footer.php"); ?>
    </body>
</html>
