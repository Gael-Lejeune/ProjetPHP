<?php
include "../model/utils.inc.php";
include "../model/link.inc.php";
include '../model/dtb.inc.php';

//Création de l'en tête et de l'include du css sur la page
start_page($create_disc, $logincss, $background3);

//Demarrage de la session
session_start();

//Affichage de la page
require $create_disc_view;

end_page();
