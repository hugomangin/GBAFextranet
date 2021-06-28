<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8', 'root', 'root');
    }
catch (Exception $e)
{
    die('Erreur : '.$e->getMessage());
    }

$req = $bdd->prepare('SELECT nom_utilisateur FROM account WHERE nom_utilisateur = :pseudo_utilisateur');
$req->execute(array(
    'pseudo_utilisateur' => $_POST['pseudo_utilisateur']));

$resultat = $req->fetch();
$pseudo = $_POST['pseudo_utilisateur'];

if ($_POST['pseudo_utilisateur'] = $resultat)
{
    echo "Le nom d'utilisateur existe déjà.";?><br>
    <a href="inscription.php">Retour</a><?php
    }
else
{
    if($_POST['mot_de_passe'] == $_POST['confirmation_mot_de_passe'])
    {
        $pass_hache = password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT); // Hachage du mot de passe avant insertion en BDD

        $req = $bdd->prepare('INSERT INTO account(prenom, nom, nom_utilisateur, mot_de_passe, question, reponse) VALUES(:prenom_utilisateur, :nom_utilisateur, :pseudo_utilisateur, :mot_de_passe, :question, :reponse)');
        $req->execute(array(
              'prenom_utilisateur' => htmlspecialchars($_POST['prenom_utilisateur']),
              'nom_utilisateur' => htmlspecialchars($_POST['nom_utilisateur']),
              'pseudo_utilisateur' => htmlspecialchars($pseudo),
          		'mot_de_passe' => $pass_hache,
              'question' => $_POST['question'],
          		'reponse' => htmlspecialchars($_POST['reponse']),));

              header('Location: connexion.php');
        }
else
{
    echo "Les mots de passe ne correspondent pas.";?><br>
    <a href="inscription.php">Retour</a><?php
    }
}
?>
