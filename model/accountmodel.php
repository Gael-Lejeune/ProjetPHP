<?php

include_classe(); //inclusion des classes nécessaires
$db = dtb_connect_PDO(); //connection a la base de donnée avec PDO
$manager = new UserManager($db);

//Si la personne est connecte
if (loginckeck($manager)){
    $user = $manager->getUser($_SESSION['email']);
//Si la personne n'est pas connecte
} else {
    session_destroy();
    header("location:$indexcontroller?error=ERROR_auth");
}