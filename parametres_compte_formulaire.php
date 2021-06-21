<!DOCTYPE html>
<html>

    <head>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css" />
        <title>Paramètres du compte</title>

    </head>

    <body>

        <?php
        include("header.php");
        ?>

<section>

<form class="" action="parametres_compte_traitement.php" method="post">

    <label for="nouveau_prenom_utilisateur">Nouveau prénom</label><input type="text" name="nouveau_prenom_utilisateur" value=""><br>
    <label for="nouveau_nom_utilisateur">Nouveau nom</label><input type="text" name="nouveau_nom_utilisateur" value=""><br>
    <label for="nouveau_pseudo_utilisateur">Nouveau nom d'utilisateur</label><input type="text" name="nouveau_pseudo_utilisateur" value=""><br>
    <label for="nouveau_mot_de_passe">Nouveau mot de passe</label><input type="password" name="nouveau_mot_de_passe" value=""><br>
    <input type="submit" name="Bouton_inscription" value="Confirmer modifications">

</form>

</section>

<?php include("footer.php"); ?>

</body>

</html>
