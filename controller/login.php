<?php
include "../model/utils.inc.php";
include "../model/link.inc.php";
include '../model/dtb.inc.php';

start_page("login", $logincss, "stylesheet", "fonts.googleapis.com/css?family=Oswald&display=swap", "stylesheet");

if ($_GET['error'] == 'ERROR')
    echo 'ERREUR AUTHENTIFICATION';
//Formulaire de login
require "../view/loginview.php";

end_page();

