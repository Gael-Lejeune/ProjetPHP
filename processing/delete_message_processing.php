<?php
include "../model/utils.inc.php";
include "../model/link.inc.php";
include '../model/dtb.inc.php';

session_start(); // On demarre la session

include_classe(); //inclusion des classes nécessaires
$db = dtb_connect_PDO(); //connection a la base de donnée avec PDO
$manager = new Disc_Mess_Manager($db);
$user_manager = new UserManager($db);

$user = $user_manager->getUser($_SESSION['email']);

// Si l'utilisateur est bien admin
if ($user->getRole() == 'admin') {

    // On recupere le message a supprimer
    $message = $manager->getMessage($_POST['id']);

    // On le supprime
    $manager->deleteMess($message);
}

header("location:$page_disc_controller"); // On revient sur la page de la discussion