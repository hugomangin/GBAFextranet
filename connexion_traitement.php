<?php

try
{
    $bdd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8', 'root', 'root');
}
catch (Exception $e)
{
    die('Erreur : '.$e->getMessage());
}

//  Récupération de l'utilisateur et de son pass hashé
$req = $bdd->prepare('SELECT id_utilisateur, mot_de_passe FROM account WHERE nom_utilisateur = :pseudo_utilisateur');
$req->execute(array(
    'pseudo_utilisateur' => $_POST['pseudo_utilisateur']));

$resultat = $req->fetch();

// Comparaison du pass envoyé via le formulaire avec la base
$isPasswordCorrect = password_verify($_POST['mot_de_passe'], $resultat['mot_de_passe']);

if (!$resultat)
{
    header('Location: mauvais_identifiant.php');
}
else
{
    if ($isPasswordCorrect) {
        session_start();
        $_SESSION['id_utilisateur'] = $resultat['id_utilisateur'];
        $_SESSION['pseudo_utilisateur'] = $_POST['pseudo_utilisateur'];
        header('Location: accueil.php');

    }
    else {
        header('Location: mauvais_identifiant.php');
    }
}
