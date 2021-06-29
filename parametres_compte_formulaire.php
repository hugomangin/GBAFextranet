<?php
session_start();
if (isset($_SESSION['id_utilisateur']))
{
?>

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
				include("menu.php");

				try
				{
						$bdd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8', 'root', 'root');
				}
				catch (Exception $e)
				{
						die('Erreur : '.$e->getMessage());
				}

				$req = $bdd->prepare('SELECT nom, prenom, nom_utilisateur FROM account WHERE id_utilisateur = :id_utilisateur');
				$req->execute(array(
					'id_utilisateur' => $_SESSION['id_utilisateur']));

				$donnees = $req->fetch();
				?>
				<section>
						<div class="parametres_compte_formulaire">
								<form class="" action="parametres_compte_traitement.php" method="post">
									<?php echo 'Prénom actuel: '.$donnees['prenom'].' ';?><br>
									<label for="nouveau_prenom_utilisateur">Nouveau prénom</label><input id="nouveau_prenom_utilisateur" type="text" name="nouveau_prenom_utilisateur" value="<?php echo $donnees['prenom'];?>"><br><br>
									<?php echo 'Nom actuel: '.$donnees['nom'].' ';?><br>
									<label for="nouveau_nom_utilisateur">Nouveau nom</label><input id="nouveau_nom_utilisateur" type="text" name="nouveau_nom_utilisateur" value="<?php echo $donnees['nom'];?>"><br><br>
									<?php echo 'Nom d\'utilisateur actuel: '.$donnees['nom_utilisateur'].' ';?><br>
									<label for="nouveau_pseudo_utilisateur">Nouveau nom d'utilisateur</label><input id="nouveau_pseudo_utilisateur" type="text" name="nouveau_pseudo_utilisateur" value="<?php echo $donnees['nom_utilisateur'];?>"><br><br>
									<label for="nouveau_mot_de_passe">Nouveau mot de passe</label><input id="nouveau_mot_de_passe" type="password" name="nouveau_mot_de_passe" value=""><br><br>
									<input type="submit" name="Bouton_inscription" value="Confirmer modifications">
								</form>
						</div>
				</section>
				<?php
				include("footer.php");
				?>
		</body>
</html>
<?php
}
else
{
		header('Location: index.php');
}
?>
