<?php
include "../model/utils.inc.php";
include "../model/link.inc.php";
include '../model/dtb.inc.php';


//Demarrage de la page
start_page("login", $inscriptioncss, "stylesheet", "fonts.googleapis.com/css?family=Oswald&display=swap", "stylesheet");
session_start();

require $myprofilemodel;

require $myprofileview;

end_page();