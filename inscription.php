<!DOCTYPE html>
<html>
		<head>
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
				<meta charset="utf-8" />
				<link rel="stylesheet" href="style.css" />
				<title>Inscription</title>
		</head>
		<body>
				<section>
				<?php
				include("header.php");
				?>
						<div class="formulaire_inscription">
								<form action="inscription_traitement.php" method="post">
										<label for="prenom_utilisateur">Prénom: </label><input id="prenom_utilisateur" type="text" name="prenom_utilisateur" value=""><br>
										<label for="nom_utilisateur">Nom: </label><input id="nom_utilisateur" type="text" name="nom_utilisateur" value=""><br>
										<label for="pseudo_utilisateur">Nom d'utilisateur: </label><input id="pseudo_utilisateur" type="text" name="pseudo_utilisateur" value=""><br>
										<label for="mot_de_passe">Mot de passe: </label><input id="mot_de_passe" type="password" name="mot_de_passe" value=""><br>
										<label for="confirmation_mot_de_passe">Confirmation mot de passe: </label><input id="confirmation_mot_de_passe"  type="password" name="confirmation_mot_de_passe" value=""><br>
										<label for="question">Question secrète </label><select id="question" class="" name="question">
												<option value="question1">Nom de jeune fille de votre mère?</option>
												<option value="question2">Ville de naissance?</option>
												<option value="question3">Nom de votre premier animal de compagnie?</option>
										</select>
										<label for="reponse">Réponse </label><input id="reponse" type="text" name="reponse" value=""><br>
										<input type="submit" name="Bouton_inscription" value="Créer compte"><br>
										<a href="index.php">Retour à l'écran de connexion</a>
								</form>
						</div>
				</section>
				<?php
				include("footer.php");
				?>
		</body>
</html>
