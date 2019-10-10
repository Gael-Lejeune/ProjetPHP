<?php
include "utils.inc.php";
include 'link.inc.php';
include 'model/dtb.inc.php';


session_start();

//ouverture connexion serveur BD
$dbLink = dtbconnect();


//Recuperation des variables en post
$email=$_POST['email'];
$password=md5($_POST['password']);
//Definition de la requete mySql
$query="SELECT email,password,connection_number FROM user WHERE email = '$email' AND password = '$password'";

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



$dbRow=mysqli_fetch_assoc($dbResult);


//Si le mot de passe et l'email correspondent
if($email == $dbRow['email'] &&  $password == $dbRow['password'])
{
    //On demarre la session
    $_SESSION['login']='true';
    $_SESSION['email']=$email;
    $_SESSION['password']=$password;

    header('Location:indexlogin.php');

    /*
    $nbc = "SELECT connection_number FROM user WHERE id = $email";
    $nbc = mysqli_query($dbLink, $nbc);
    $nbc = mysqli_fetch_assoc($nbc);
    $nbc = $nbc['connection_number'];
    $nbc = $nbc+1;
    $nbc = "UPDATE user SET connection_number = $nbc  WHERE id = $email";
    mysqli_query($dbLink, $nbc);
    */

}

//Si les mots de passe et/ou email ne correspondent pas on retourne sur login en renvoyant une erreur
else
{
    header('Location:login.php?error=ERROR');
}