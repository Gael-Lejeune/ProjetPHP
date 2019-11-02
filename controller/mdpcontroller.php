<?php
include "../model/utils.inc.php";
include "../model/link.inc.php";
include '../model/dtb.inc.php';

//Création de l'en tête et de l'include du css sur la page
start_page($mymdp, $logincss, $background5);

//Formulaire MDP oublié

session_start();
//Affichage de la page

require $mymdpview;

end_page();


