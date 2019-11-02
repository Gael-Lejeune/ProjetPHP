<?php
include "../model/utils.inc.php";
include "../model/link.inc.php";
include '../model/dtb.inc.php';

//Demarrage de la page
start_page($myprofile, $logincss, $background4);


//Demarrage de la session
session_start();

//Appel du model
require $myprofilemodel;

//Affichage de la page
require $myprofileview;

end_page();
