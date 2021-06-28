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

$req = $bdd->prepare('SELECT nom, prenom FROM account WHERE id_utilisateur = :id_utilisateur');
$req->execute(array(
    'id_utilisateur' => $_SESSION['id_utilisateur']));

while($donnees = $req->fetch())
{
    echo 'Bonjour ' . $donnees['prenom']." ".$donnees['nom'] . ',';
}
?>
