<?php
include "../model/utils.inc.php";
include "../model/link.inc.php";
include '../model/dtb.inc.php';

start_page($index, $indexcss, $background1);

session_start();

require $indexmodel;

require $indexview;

end_page();