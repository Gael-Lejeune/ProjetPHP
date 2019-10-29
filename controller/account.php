<?php
include "../model/utils.inc.php";
include "../model/link.inc.php";
include '../model/dtb.inc.php';

//Demarrage de la page
start_page("myprofile", $logincss, "stylesheet", "fonts.googleapis.com/css?family=Oswald&display=swap", "stylesheet", $background4);


session_start();

if ($step == 'ERROR_auth') {
    echo 'Vous n\'ête pas connecté'.'<br/>';
} else if ($step == 'ERROR_mdp') {
    echo 'La confirmation de mot de passe est incorrecte'.'<br/>';
} else if ($step == 'ERROR_incomplet') {
    echo 'Merci de bien remplir tous les champs du formulaire'.'<br/>';
}

require $myprofilemodel;

require $myprofileview;

end_page();