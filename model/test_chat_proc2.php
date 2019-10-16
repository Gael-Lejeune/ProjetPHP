<?php

include "../model/utils.inc.php";
include "../model/link.inc.php";
include '../model/dtb.inc.php';

session_start();

$dbLink=dtbconnect();

$action=$_POST['action'];

if ($action == 'discussion'){
    $query="INSERT INTO discussion (test) VALUES (30)";
    $dbResult = querycheck($dbLink, $query);

    $dbRow=mysqli_fetch_assoc($dbResult);
    echo $dbRow;
}

//Recuperation des variables en post
//$id_msg=($_POST['id_msg']);
//$user_msg=($_POST['user_msg']);
//$id_discussion=($_POST['id_discussion']);
//$est_ouvert=($_POST['est_ouvert']);
//$texte=($_POST['texte']);

//Definition de la requete mySql
//$query="INSERT INTO message (texte) VALUES ('$texte')";

//Verification de la viabilité de la requete
//$dbResult = querycheck($dbLink, $query, 'Requete viable');

//lit le résultat de la requête dans un tableau associatif
//$dbRow=mysqli_fetch_assoc($dbResult);
//echo $dbRow;

//redirection HTTP vers test_chat.php

//header("Location: $test_chat?step=ERROR_mdp");

//database: id_msg / user_msg / id_discussion / est_ouvert / texte

//Recuperation des variables
//$texte=$_POST['texte'];

//database: id_discussion / est_ouverte

//ouvrir une discussion :

?>
