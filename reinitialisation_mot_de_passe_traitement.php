<?php
// Vérification de la validité des informations

try
{
    $bdd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8', 'root', 'root');
}
catch (Exception $e)
{
    die('Erreur : '.$e->getMessage());
}

$pass_hache = password_hash($_POST['nouveau_mot_de_passe'], PASSWORD_DEFAULT);

$req = $bdd->prepare('UPDATE account SET mot_de_passe = :nouveau_mot_de_passe WHERE nom_utilisateur = :pseudo_utilisateur');
$req->execute(array(
  'pseudo_utilisateur' => $_POST['pseudo_utilisateur'],
  'nouveau_mot_de_passe' => $pass_hache
	));

header('Location: connexion.php');

?>
