<?php
include "../model/utils.inc.php";
include "../model/link.inc.php";
include '../model/dtb.inc.php';



session_start();

//ouverture connexion serveur BD
$dbLink = dtbconnect();

//Recuperation des variables en post
$email=$_POST['email'];
$password=md5($_POST['password']);

$query="SELECT email,password,connection_number FROM user WHERE email = '$email' AND password = '$password'";

//Verification de la viabilité de la requete
$dbResult = querycheck($dbLink, $query);

$dbRow=mysqli_fetch_assoc($dbResult);

//Si le mot de passe et l'email correspondent
if ($email != $dbRow['email'] || $password != $dbRow['password']) {
    //On demarre la session
    header('Location:login.php?error=ERROR');
}
else {
    //On demarre la session
    $_SESSION['login']=true;
    $_SESSION['email']=$email;
    $_SESSION['password']=$password;

    header('Location:index.php');
}