<?php

include "../model/utils.inc.php";
include "../model/link.inc.php";
include '../model/dtb.inc.php';

//Demarrage de la page
start_page($index, $indexcss, "stylesheet", "fonts.googleapis.com/css?family=Oswald&display=swap", "stylesheet", $background1);

session_start();

require '../model/see_disc_model.php';
require '../view/see_disc_view.php';

end_page();
