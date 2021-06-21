<?php

if (isset($_SESSION['id_utilisateur']) AND isset($_SESSION['pseudo_utilisateur']))
{
    echo '<a href="parametres_compte_formulaire.php">Paramètres du compte</a>';
}
?>
