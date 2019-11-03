<?php

include "../model/utils.inc.php";
include "../model/link.inc.php";
include '../model/dtb.inc.php';

//Demarrage de la page
start_page($myprofile, $logincss, $background4);

//Demarrage de la session
session_start();
include_classe();

//Affichage de la page
require $admin_view;

end_page();
