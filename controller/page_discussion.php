<?php
include "../model/utils.inc.php";
include "../model/link.inc.php";
include '../model/dtb.inc.php';

//Demarrage de la page
start_page("myprofile", $discussioncss, "stylesheet", "fonts.googleapis.com/css?family=Oswald&display=swap", "stylesheet", $background4);

session_start();

$step=$_GET['error'];
if ($step == 'ERROR_write') {
    echo 'Vous ne pouvez écrire qu\'une seule fois dans le même message'.'<br/>';
} else if ($step == 'ERROR_tolong') {
    echo 'Le message que vous voulez écrire est trop long'.'<br>';
}

require '../model/page_disc_model.php';
require '../view/page_disc_view.php';
end_page();