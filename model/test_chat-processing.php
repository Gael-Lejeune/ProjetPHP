<?php

include "../model/utils.inc.php";
include "../model/link.inc.php";
include '../model/dtb.inc.php';

session_start();

$dbLink = dtbconnect();

//vérif de l'ID du message
if (isset($_POST['id_msg']))
{
    $id_msg=$_POST['id_msg'];
}
else{
    $id_msg=" ";
}

//vérif de celui qui poste le message
if (isset($_POST['name']))
{
    $name=$_POST['name'];
}
else{
    $name=" ";
}

//vérif de l'ID de la discussion
if (isset($_POST['id_discussion']))
{
    $id_discussion=$_POST['id_discussion'];
}
else{
    $id_discussion=" ";
}

//vérif si la discussion est ouverte ou non
if (isset($_POST['est_ouvert']))
{
    $est_ouvert=$_POST['est_ouvert'];
}
else{
    $est_ouvert=" ";
}

//vérif du mot écrit
if (isset($_POST['texte']))
{
    $texte=$_POST['texte'];
}
else{
    $texte=" ";
}

//Recuperation des variables en post
$id_msg=($_POST['id_msg']);
$user_msg=($_POST['name']);
$id_discussion=($_POST['id_discussion']);
$est_ouvert=($_POST['est_ouvert']);
$texte=($_POST['texte']);
$action=($_POST['action']);

//Definition de la requete mySql
//$query="INSERT INTO message (id_msg, user_msg, id_discussion, est_ouvert, texte) VALUES ('$id_msg','$user_msg','$id_discussion','$est_ouvert','$texte')";
$query="INSERT INTO message(id_msg, message.name, id_discussion, est_ouvert, texte)
        SELECT id_msg, message.name, id_discussion,est_ouvert,texte
        FROM user JOIN message ON user.name = message.name
        WHERE est_ouvert IS TRUE
        ORDER BY id_msg DESC LIMIT 0,10";

var_dump();

//Verification de la viabilité de la requete
$dbResult = querycheck($dbLink, $query);

var_dump();

//lit le résultat de la requête dans un tableau associatif
$dbRow=mysqli_fetch_assoc($dbResult);

if ($est_ouvert == TRUE || $action='action') {
    //ouverture variables de session
    $_SESSION['id_msg']=$id_msg;
    $_SESSION['user_msg']=$user_msg;
    $_SESSION['id_discussion']=$id_discussion;
    $_SESSION['est_ouvert']=$est_ouvert;
    $_SESSION['texte']=$texte;

    //On demarre la session
    header("Location:$indexcontroller");

}
else {
    //Erreur
    header("Location:$logincontroller?error=ERROR");
}


?>
