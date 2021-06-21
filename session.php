<?php
session_start();

if (isset($_SESSION['id_utilisateur']) AND isset($_SESSION['pseudo_utilisateur']))
{
    echo 'Bonjour ' . $_SESSION['pseudo_utilisateur'] . ',';
}
?>
