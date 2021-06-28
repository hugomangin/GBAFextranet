<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8', 'root', 'root');
    }
catch (Exception $e)
{
    die('Erreur : '.$e->getMessage());
    }

$req = $bdd->prepare('SELECT question, reponse FROM account WHERE nom_utilisateur = :pseudo_utilisateur');
$req->execute(array(
    'pseudo_utilisateur' => $_POST['pseudo_utilisateur']));

$resultat = $req->fetch();

if($_POST['reponse'] == $resultat['reponse'] AND $_POST['question'] == $resultat['question'])
{
    $pass_hache = password_hash($_POST['nouveau_mot_de_passe'], PASSWORD_DEFAULT);

    $req = $bdd->prepare('UPDATE account SET mot_de_passe = :nouveau_mot_de_passe WHERE nom_utilisateur = :pseudo_utilisateur AND question = :question_secrete AND reponse = :reponse_secrete');
    $req->execute(array(
    'pseudo_utilisateur' => $_POST['pseudo_utilisateur'],
    'nouveau_mot_de_passe' => $pass_hache,
    'question_secrete' => $_POST['question'],
    'reponse_secrete' => $_POST['reponse']));

    header('Location: connexion.php');
    }
else
{
    header('Location: mauvaise_question_reponse.php');
    }
?>
