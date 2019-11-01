<?php
include "../model/utils.inc.php";
include "../model/link.inc.php";
include '../model/dtb.inc.php';

//Demarrage de la page
start_page("login", "html/css/myprofile.css", "stylesheet", "fonts.googleapis.com/css?family=Oswald&display=swap", "stylesheet", $background4);
session_start();

require '../model/accountmodel.php';
require '../view/accountview.php';

end_page();

