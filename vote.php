<form action="vote_traitement.php?id_acteur=<?php echo $_GET['id_acteur']; ?>" method="post">
  <select class="" name="vote"><br>
      <option value="1">Jaime</option>
      <option value="-1">Jenaimepas</option>
  <input type="submit" name="" value="OK">
</form>

<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$req = $bdd->query('SELECT COUNT(*) AS nb_vote_positif FROM vote WHERE vote = 1');

while ($donnees = $req->fetch())
{
	echo $donnees['nb_vote_positif'];?><br>
<?php
}

$req = $bdd->query('SELECT COUNT(*) AS nb_vote_negatif FROM vote WHERE vote = -1');

while ($donnees = $req->fetch())
{
	echo $donnees['nb_vote_negatif'];
}

$req->closeCursor();
?>
