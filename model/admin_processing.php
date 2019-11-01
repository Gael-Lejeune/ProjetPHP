<?php

include "../model/dtb.inc.php";
include "../model/utils.inc.php";
include  "../model/link.inc.php";

session_start();

include_classe(); //inclusion des classes nécessaires
$db = dtb_connect_PDO(); //connection a la base de donnée avec PDO
$manager = new UserManager($db);

//Si la personne est bien connecté
if(loginckeck($manager)) {
    //Si la personne est bien admin
}