<?php

include "../model/utils.inc.php";
include "../model/link.inc.php";
include '../model/dtb.inc.php';

//Demarrage de la page
start_page($myprofile, $logincss, $background4);

session_start();

require '../view/admin_view.php';

end_page();