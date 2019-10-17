<?php
include "../model/dtb.inc.php";
loginckeck($_SESSION['email'], $_SESSION['password']);
$dbLink = dtbconnect();

//Si la personne est connecte
if ($_SESSION['login']){

    //On recupere ses informations (email et password grace a $_SESSION)
    $email=$_SESSION['email'];

    //Requete pour recuperer le nom
    $query_name="SELECT name FROM user WHERE email = '$email'";

    //Verification de la viabilité de la requete
    $dbResult = querycheck($dbLink, $query_name);


    $dbRow=mysqli_fetch_assoc($dbResult);
    $name=$dbRow['name'];

    //Si la personne n'est pas connecte
} else {
    header("Location:$indexcontroller?error=ERROR_auth");
}