<?php
include "../model/utils.inc.php";
include "../model/link.inc.php";
include '../model/dtb.inc.php';

//Création de l'en tête et de l'include du css sur la page
start_page($create_disc, $logincss, $background3);

session_start();

require "../view/create_discussion_view.php";

end_page();
