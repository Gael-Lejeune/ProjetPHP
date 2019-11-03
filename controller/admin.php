<?php
include "../model/utils.inc.php";
include "../model/link.inc.php";
include '../model/dtb.inc.php';

//Création de l'en tête et de l'include du css sur la page
start_page($myprofile, $logincss, $background4);

//Demarrage de la session
session_start();
//Inclusion des classes
include_classe();

//Affichage de la page
require $admin_view;

end_page();
