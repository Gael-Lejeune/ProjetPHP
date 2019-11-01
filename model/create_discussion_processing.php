<?php

include "../model/utils.inc.php";
include "../model/link.inc.php";
include '../model/dtb.inc.php';

include_classe(); //inclusion des classes nécessaires
$db = dtb_connect_PDO(); //connection a la base de donnée avec PDO
$user_manager = new UserManager($db);
$disc_manager = new Disc_Mess_Manager($db);

session_start();

//Si la personne est connecte
if (loginckeck($user_manager)){

    //Verification de l'existance des variables
    if (isset($_POST['name_disc']) and isset($_POST['message']) and isset($_POST['nb_msg_max'])) {
        $name_disc=$_POST['name_disc'];
        $msg = $_POST['message'];
        $nb_msg_max = $_POST['nb_msg_max'];
    } else {
        header ("location:$create_disc_controller?step=ERROR_incomplet");
    }

    $discussion = new Discussion(['discName' => $name_disc,'owner' => $_SESSION['email'], 'nbMessMax' => $nb_msg_max]);
    $disc_manager->add_disc($discussion);

    $message = new Message(['idDiscussion' => $disc_manager->getIDLastDisc(),'text' => $msg]);
    $disc_manager->add_msg($message);

    $ecrivain = new Ecrivain(['writer' => $_SESSION['email'],'idMsg' =>$disc_manager->getIDLastMsg(), 'idDiscussion' => $disc_manager->getIDLastDisc()]);
    $disc_manager->add_ecrv($ecrivain);

    header("location:$indexcontroller");

}  else {
    session_destroy();
    header("location:$indexcontroller?error=ERROR_auth");
}
