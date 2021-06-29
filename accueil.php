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
				<title>Accueil</title>
		</head>
		<body>
		<?php
		include("header.php");
		include("menu.php");
		include("presentation.php");
		?>
				<section>
						<h2>Liste des acteurs:</h2>
						<?php
						try
						{
								$bdd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8', 'root', 'root');
						}
						catch (Exception $e)
						{
								die('Erreur : '.$e->getMessage());
						}

						$reponse_acteur = $bdd->query('SELECT id_acteur, acteur, description, logo FROM acteur');

						while ($donnees_acteur = $reponse_acteur->fetch()) // Boucle pour récupérer les informations sur les acteurs stockées dans la BDD.
						{
						?>
						<div class="super_conteneur_acteur">
						<?php
						echo'<img src="logos/'.$donnees_acteur['logo'].'" class="logo_acteur" alt="logo"/>';
						?>
								<div class="conteneur_acteur">
										<h3>
										<?php
										echo $donnees_acteur['acteur'];
										?>
										</h3>
										<div class="description_acteur">
												<strong>Description: </strong>
												<?php
												echo $donnees_acteur['description'];
												?>
										</div>
								</div>
								<div class="afficher_suite">
										<a href="acteur.php?id_acteur=<?php echo $donnees_acteur['id_acteur']; ?>">Afficher la suite</a>
								</div>
						</div>
						<?php
						}
						$reponse_acteur->closeCursor();
						?>
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
