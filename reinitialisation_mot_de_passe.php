<!DOCTYPE html>
<html>
		<head>
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
				<meta charset="utf-8" />
				<link rel="stylesheet" href="style.css" />
				<title>Réinitialisation</title>
		</head>
		<body>
				<?php include("header.php"); ?>
				<section>
						<div class="formulaire_reinitialisation">
								<form class="" action="reinitialisation_mot_de_passe_traitement.php" method="post">
										<label for="pseudo_utilisateur">Nom d'utilisateur</label>
										<input id="pseudo_utilisateur" type="text" name="pseudo_utilisateur" value=""><br>
										<label for="nouveau_mot_de_passe">Nouveau mot de passe</label>
										<input id="nouveau_mot_de_passe" type="password" name="nouveau_mot_de_passe" value=""><br>
										<label for="confirmation_nouveau_mot_de_passe">Confirmation mot de passe</label>
										<input id="confirmation_nouveau_mot_de_passe" type="password" name="confirmation_nouveau_mot_de_passe" value=""><br>
										<label for="question">Question secrète </label>
										<select id="question" class="" name="question">
												<option value="question1">Nom de jeune fille de votre mère?</option>
												<option value="question2">Ville de naissance?</option>
												<option value="question3">Nom de votre premier animal de compagnie?</option>
										</select>
										<label for="reponse">Réponse </label><input id="reponse" type="text" name="reponse" value=""><br>
										<input type="submit" name="Bouton_reinitialisation" value="Reinitialiser"><br>
										<a href="index.php">Retour à l'écran de connexion</a>
								</form>
						</div>
				</section>
				<?php
				include("footer.php");
				?>
		</body>
</html>
