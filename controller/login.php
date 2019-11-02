<?php
include "../model/utils.inc.php";
include "../model/link.inc.php";
include '../model/dtb.inc.php';
//Création de l'en tête et de l'include du css sur la page
start_page($login, $logincss, $background2);

if ($step == 'ERROR_incomplet') {
    echo 'Merci de bien remplir tous les champs du formulaire'.'<br/>';
}
//Affichage de la page

require $loginview;

end_page();

