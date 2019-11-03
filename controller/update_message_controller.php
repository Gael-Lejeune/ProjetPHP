<?php

include "../model/utils.inc.php";
include "../model/link.inc.php";
include '../model/dtb.inc.php';

//Demarrage de la page
start_page("myprofile", $discussioncss, $background4);

session_start();

require '../model/update_message_model.php';
require '../view/update_message_view.php';
end_page();