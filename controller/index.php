<?php
include "../model/utils.inc.php";
include "../model/link.inc.php";
include '../model/dtb.inc.php';

start_page($index, $indexcss, "stylesheet", "fonts.googleapis.com/css?family=Oswald&display=swap", "stylesheet", $background1);

session_start();

require "../view/indexview.php";

end_page();