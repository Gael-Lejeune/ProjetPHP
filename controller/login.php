<?php
include "../model/utils.inc.php";
include "../model/link.inc.php";
include '../model/dtb.inc.php';

//Création de l'en tête et de l'include du css sur la page
start_page($login, $logincss, $background2);

//Affichage de la page
require $loginview;

end_page();
