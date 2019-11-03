<?php
include "../model/utils.inc.php";
include "../model/link.inc.php";
include '../model/dtb.inc.php';

//Création de l'en tête et de l'include du css sur la page
start_page($myprofile, $logincss, $background4);

//Demarrage de la session
session_start();

//Si le mot de passe ne correspond pas à la confirmation de mot de passe
if ($step == 'ERROR_mdp') {
    echo 'La confirmation de mot de passe est incorrecte'.'<br/>';
}

//Appel du model
require $myprofilemodel;

//Affichage de la page
require $myprofileview;

end_page();
