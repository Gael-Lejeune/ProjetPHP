<?php
include "../model/utils.inc.php";
include "../model/link.inc.php";
include '../model/dtb.inc.php';

session_start(); // On demarre la session

include_classe(); //inclusion des classes nécessaires
$db = dtb_connect_PDO(); //connection a la base de donnée avec PDO
$manager = new Disc_Mess_Manager($db);

$manager->setTexte($_POST['id'], $_POST['text']);

header("location:$page_disc_controller");