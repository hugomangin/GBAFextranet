<!DOCTYPE html>
<html>

    <head>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css" />
        <title>Inscription</title>

    </head>

    <body>

        <?php include("header.php"); ?>

        <section>

        <div class="formulaire_inscription">

        <form action="inscription_traitement.php" method="post">

            <label for="prenom_utilisateur">Prénom: </label><input type="text" name="prenom_utilisateur" value=""><br>
            <label for="nom_utilisateur">Nom: </label><input type="text" name="nom_utilisateur" value=""><br>
            <label for="pseudo_utilisateur">Nom d'utilisateur: </label><input type="text" name="pseudo_utilisateur" value=""><br>
            <label for="mot_de_passe">Mot de passe: </label><input type="password" name="mot_de_passe" value=""><br>
            <label for="confirmation_mot_de_passe">Confirmation mot de passe: </label><input type="password" name="confirmation_mot_de_passe" value=""><br>
            <select class="" name="question"><br>
                <option value="question1">Nom de jeune fille de votre mère?</option>
                <option value="question2">Ville de naissance?</option>
                <option value="question3">Nom de votre premier animal de compagnie?</option>
            </select>
            <label for="reponse">Réponse: </label><input type="text" name="reponse" value=""><br>
            <input type="submit" name="Bouton_inscription" value="Créer compte">

        </form>

        </div>
        </section>

        <?php include("footer.php"); ?>

    </body>

</html>
