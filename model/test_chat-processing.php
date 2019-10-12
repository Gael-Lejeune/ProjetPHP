<?php

include "../model/utils.inc.php";
include "../model/link.inc.php";
include '../model/dtb.inc.php';

session_start();

dtbconnect();

//Recuperation des variables en post
$id_msg=($_POST['id_msg']);
$user_msg=($_POST['user_msg']);
$id_discussion=($_POST['id_discussion']);
$est_ouvert=($_POST['est_ouvert']);
$texte=($_POST['texte']);

//Definition de la requete mySql
$query="INSERT INTO message (texte) VALUES ('$texte')";

//Verification de la viabilité de la requete
$dbResult = querycheck($dbLink, $query, 'Requete viable');

//lit le résultat de la requête dans un tableau associatif
$dbRow=mysqli_fetch_assoc($dbResult);
echo $dbRow;

//redirection HTTP vers test_chat.php

header('Location: test_chat.php?step=ERROR_mdp');

?>
