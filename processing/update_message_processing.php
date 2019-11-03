<?php
include "../model/utils.inc.php";
include "../model/link.inc.php";
include '../model/dtb.inc.php';

session_start(); // On demarre la session

include_classe(); //inclusion des classes nécessaires
$db = dtb_connect_PDO(); //connection a la base de donnée avec PDO
$manager = new Disc_Mess_Manager($db);

// On modifie le texte envoyer par l'administrateur
$manager->setTexte($_POST['id'], $_POST['text']);

// On revient à la page de la discussion
header("location:$page_disc_controller");