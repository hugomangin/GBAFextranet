<?php

session_start();

try
{
	$bdd3 = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$req3 = $bdd3->prepare('INSERT INTO vote (id_utilisateur, id_acteur, vote) VALUES(:id_utilisateur, :id_acteur, :vote)');
$req3->execute(array(
		'id_utilisateur' => $_SESSION['id_utilisateur'],
		'id_acteur' => $_GET['id_acteur'],
		'vote' => $_POST['vote']));

header('Location: acteur.php?id_acteur='.$_GET['id_acteur'].'');



?>
