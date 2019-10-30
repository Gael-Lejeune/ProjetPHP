<?php

include "../model/utils.inc.php";
include "../model/link.inc.php";
include '../model/dtb.inc.php';

//Demarrage de la page
start_page("myprofile", $logincss, "stylesheet", "fonts.googleapis.com/css?family=Oswald&display=swap", "stylesheet", $background4);

session_start();

require '../model/see_disc_model.php';
require '../view/see_disc_view.php';

end_page();
