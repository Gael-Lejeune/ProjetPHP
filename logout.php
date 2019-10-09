<?php

include "utils.inc.php";
include "link.inc.php";

if ($_SESSION['login']) {
    session_destroy();
    header('Location:index.php?step=ERROR');
}
