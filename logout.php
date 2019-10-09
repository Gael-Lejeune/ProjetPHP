<?php

include "utils.inc.php";
include "link.inc.php";

start_page("login", $inscriptioncss, "stylesheet", "fonts.googleapis.com/css?family=Oswald&display=swap", "stylesheet");

session_start();

if ($_SESSION['login']) {
    session_destroy();
    header('Location:' . $indexaddr);
}

end_page();
