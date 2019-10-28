<?php

include_classe(); //inclusion des classes nécessaires
$db = dtb_connect_PDO(); //connection a la base de donnée avec PDO
$manager = new UserManager($db);

//Si la personne est connecte
if ($_SESSION['login']){
//On recupere ses informations
$email=$_SESSION['email'];
$password=$_SESSION['password'];

$user = $manager->getUser($email);

//Si la personne n'est pas connecte
} else {
header("location:$myprofilecontroller?error=ERROR_auth");
}