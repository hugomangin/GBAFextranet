<?php

if (isset($_SESSION['id_utilisateur']) AND isset($_SESSION['pseudo_utilisateur']))
{
    echo '<a href="accueil.php">Accueil</a>';
}
?>
