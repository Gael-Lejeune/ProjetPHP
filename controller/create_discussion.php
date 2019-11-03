<?php
include "../model/utils.inc.php";
include "../model/link.inc.php";
include '../model/dtb.inc.php';

//Création de l'en tête et de l'include du css sur la page
start_page($create_disc, $logincss, $background3);

//Demarrage de la session
session_start();
include_classe();

//Si la personne est connecte
if (loginckeck($user_manager)){
    $user = $user_manager->getUser($_SESSION['email']); // On récupère ses informations
}
//Si la personne n'est pas connecte
else
{
    session_destroy();
    header("location:$logincontroller?error=ERROR_auth"); // On revient sur l'index
}


//Affichage de la page
require $create_disc_view;

end_page();
