<?php
include "../model/utils.inc.php";
include "../model/link.inc.php";
include '../model/dtb.inc.php';

start_page($mymdp, $logincss, $background5);

//Formulaire MDP oublié

session_start();

require $mymdpview;

end_page();


