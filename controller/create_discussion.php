<?php
include "../model/utils.inc.php";
include "../model/link.inc.php";
include '../model/dtb.inc.php';

//Création de l'en tête et de l'include du css sur la page
start_page($create_disc, $logincss, $background3);

//Demarrage de la session
session_start();
//Inclusion des classes
include_classe();

$db = new PDO('mysql:host=mysql-latableronde.alwaysdata.net;dbname=latableronde_dtb', 191121, 'tableronde');
$user_manager = new UserManager($db);
//Si la personne est connecte
if (loginckeck($user_manager)){
    $user = $user_manager->getUser($_SESSION['email']); // On récupère ses informations
}
//Si la personne n'est pas connecte
else
{
    session_destroy();
    header("location:$logincontroller?error=ERROR_auth"); // On revient sur la page de connexion
}


//Affichage de la page
require $create_disc_view;

end_page();
