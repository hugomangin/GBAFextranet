<?php

session_start();

try
{
    $bdd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8', 'root', 'root');
}
catch (Exception $e)
{
    die('Erreur : '.$e->getMessage());
}

$pass_hache = password_hash($_POST['nouveau_mot_de_passe'], PASSWORD_DEFAULT);

$req = $bdd->prepare('UPDATE account
SET prenom = :nouveau_prenom_utilisateur,
nom = :nouveau_nom_utilisateur,
nom_utilisateur = :nouveau_pseudo_utilisateur,
mot_de_passe = :nouveau_mot_de_passe

WHERE id_utilisateur = :id_utilisateur');

$req->execute(array(
  'nouveau_prenom_utilisateur' => $_POST['nouveau_prenom_utilisateur'],
  'nouveau_nom_utilisateur' => $_POST['nouveau_nom_utilisateur'],
  'nouveau_pseudo_utilisateur' => $_POST['nouveau_pseudo_utilisateur'],
  'nouveau_mot_de_passe' => $pass_hache,
  'id_utilisateur' => $_SESSION['id_utilisateur']
	));

header('Location: parametres_compte_formulaire.php');

?>
