<?php
include "../model/utils.inc.php";
include "../model/link.inc.php";
include '../model/dtb.inc.php';


//Demarrage de la page
start_page("login", $logincss, "stylesheet", "fonts.googleapis.com/css?family=Oswald&display=swap", "stylesheet");
session_start();
loginckeck($_SESSION['email'], $_SESSION['password']);
$dbLink = dtbconnect();

//Si la personne est connecte
if ($_SESSION['login']){

    //On recupere ses informations (email et password grace a $_SESSION)
    $email=$_SESSION['email'];
    $password=$_SESSION['password'];

    //Requete pour recuperer le nom
    $query_name="SELECT name FROM user WHERE email = '$email' AND password = '$password'";

    //Verification de la viabilité de la requete
    $dbResult = querycheck($dbLink, $query_name);


    $dbRow=mysqli_fetch_assoc($dbResult);
    $name=$dbRow['name'];

    //Requete pour recupere la civilite
    $query_civ="SELECT civilite FROM user WHERE email = '$email' AND password = '$password'";

    //Verification de la viabilité de la requete
    $dbResult = querycheck($dbLink, $query_civ);


    $dbRow=mysqli_fetch_assoc($dbResult);
    $civ=$dbRow['civilite'];

    require $myprofileview;

    //Si la personne n'est pas connecte
} else {
    header('Location:indexlogin.php?error=ERROR_auth');
}
