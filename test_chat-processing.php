<?php

include 'utils.inc.php';
include 'model/dtb.inc.php';

session_start();

//connexion + sélection base de données
dtbconnect();

//Recuperation des variables en post
$id_msg=($_POST['id_msg']);
$user_msg=($_POST['user_msg']);
$id_discussion=($_POST['id_discussion']);
$est_ouvert=($_POST['est_ouvert']);
$texte=($_POST['texte']);

echo $query;

//Definition de la requete mySql
$query="INSERT INTO message (texte) VALUE ('$texte')";

//Verification de la viabilité de la requete
if(!($dbResult=mysqli_query($dbLink, $query)))
{
    echo'Erreurderequête<br/>';
//Affichele type d'erreur.
    echo'Erreur:'.mysqli_error($dbLink).'<br/>';
//Affiche la requête envoyée.
    echo'Requête:'.$query.'<br/>';
    exit();
}
//lit le résultat de la requête dans un tableau associatif
$dbRow=mysqli_fetch_assoc($dbResult);
echo $dbRow;

//redirection HTTP vers test_chat.php
header('Location: test_chat.php?step=ERROR_mdp');

?>
