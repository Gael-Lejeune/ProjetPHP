<?php
include "../model/utils.inc.php";
include "../model/link.inc.php";
include '../model/dtb.inc.php';

start_page($login, $logincss, $background2);


if ($_GET['error'] == 'ERROR')
    echo 'ERREUR AUTHENTIFICATION';
//Formulaire de login

if ($step == 'ERROR_incomplet') {
    echo 'Merci de bien remplir tous les champs du formulaire'.'<br/>';
}

require $loginview;

end_page();

