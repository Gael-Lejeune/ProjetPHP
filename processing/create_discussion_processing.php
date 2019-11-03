<?php

include "../model/utils.inc.php";
include "../model/link.inc.php";
include '../model/dtb.inc.php';

include_classe(); //inclusion des classes nécessaires
$db = dtb_connect_PDO(); //connection a la base de donnée avec PDO
$user_manager = new UserManager($db); // Création du manager pour les utilisateurs
$disc_manager = new Disc_Mess_Manager($db); // Création du manger pour les messages et les discussions

session_start(); // On demarre la session

//Si la personne est connecte
if (loginckeck($user_manager)) {

    //Verification de l'existance des variables
    if (isset($_POST['name_disc']) and isset($_POST['message']) and isset($_POST['nb_msg_max'])) {
        $name_disc=$_POST['name_disc'];
        $msg = $_POST['message'];
        $nb_msg_max = $_POST['nb_msg_max'];
    } else {
        header ("location:$create_disc_controller?step=ERROR_incomplet"); // Si le formulaire est incomplet on renvoi une erreur
    }

    // On créer la discussion
    $discussion = new Discussion(['discName' => $name_disc,'owner' => $_SESSION['email'], 'nbMessMax' => $nb_msg_max]);
    $disc_manager->add_disc($discussion); // On créer une nouvelle discussion

    // On créer le premier message de la discussion
    $message = new Message(['idDiscussion' => $disc_manager->getIDLastDisc(),'text' => $msg]);
    $disc_manager->add_msg($message); // On créer le premier message de la discussion

    // On enregistre dans ecrivain que cet utilisateur a bien ecrit dans le message
    $ecrivain = new Ecrivain(['writer' => $_SESSION['email'],'idMsg' =>$disc_manager->getIDLastMsg(), 'idDiscussion' => $disc_manager->getIDLastDisc()]);
    $disc_manager->add_ecrv($ecrivain); // On ajoute un tuple dans ecrivain pour indiquer que l'utilisateur a bien ecrit dans le message

    header("location:$indexcontroller"); // On revient sur l'index

// Si la personne n'est pas connecté
} else {
    session_destroy();
    header("location:$logincontroller?error=ERROR_auth"); // on revient sur l'index en renvoyant une erreur
}
