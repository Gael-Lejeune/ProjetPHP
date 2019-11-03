<?php
include "../model/utils.inc.php";
include "../model/link.inc.php";
include '../model/dtb.inc.php';

//Création de l'en tête et de l'include du css sur la page
start_page($see_disc, $discussioncss, $background4);
//Demarrage de la session
session_start();

//Appel du model
require $see_disc_model;

//Affichage de la page
require $see_disc_view;

end_page();
