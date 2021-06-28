<div id="vote">
    <div class="partie 1">


<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$req = $bdd->prepare('SELECT COUNT(*) AS nb_vote_membre FROM vote WHERE id_acteur=:id_acteur AND id_utilisateur=:id_utilisateur');
$req->execute(array(

    'id_acteur' => $_GET['id_acteur'],
    'id_utilisateur' => $_SESSION['id_utilisateur']));

$resultat = $req->fetch();

if($resultat['nb_vote_membre'] == 0)
{
?>

<form action="vote_traitement.php?id_acteur=<?php echo $_GET['id_acteur']; ?>" method="post">
  <select class="" name="vote"><br>
      <option value="1">J'aime</option>
      <option value="-1">Je n'aime pas</option>
  <input type="submit" name="" value="OK">
</form>

<?php
}

else {
    Echo "Vous avez déjà voté sur cet acteur.";
}
?>

</div>
<div class="partie 2">



<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$req = $bdd->prepare('SELECT COUNT(*) AS nb_vote_positif FROM vote WHERE vote = 1 AND id_acteur=:id_acteur');
$req->execute(array(
    'id_acteur' => $_GET['id_acteur']));

while ($donnees = $req->fetch())
{
	echo 'Nombre de votes positif: '.$donnees['nb_vote_positif'].'';
}
?>
</div>
<div class="partie 3">


<?php
$req = $bdd->prepare('SELECT COUNT(*) AS nb_vote_negatif FROM vote WHERE vote = -1 AND id_acteur=:id_acteur');
$req->execute(array(
    'id_acteur' => $_GET['id_acteur']));

while ($donnees = $req->fetch())
{
  echo 'Nombre de votes negatif: '.$donnees['nb_vote_negatif'].'';
}

$req->closeCursor();

?>
</div>
</div>
