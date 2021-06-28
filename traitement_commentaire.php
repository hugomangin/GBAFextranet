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

$req3 = $bdd3->prepare('INSERT INTO post (id_utilisateur, id_acteur, date_add, post) VALUES(:id_utilisateur, :id_acteur, NOW(), :post)');
$req3->execute(array(
		'id_utilisateur' => $_SESSION['id_utilisateur'],
		'id_acteur' => $_GET['id_acteur'],
		'post' => $_POST['post']));

header('Location: acteur.php?id_acteur='.$_GET['id_acteur'].'');
?>
