<?php
include "../model/utils.inc.php";
include "../model/link.inc.php";
include '../model/dtb.inc.php';

session_start();

include_classe(); //inclusion des classes nécessaires
$db = dtb_connect_PDO(); //connection a la base de donnée avec PDO
$manager = new Disc_Mess_Manager($db);

$action = $_POST['action'];
$disc_array=$manager->getDiscussion($_SESSION['discussion']);
$discussion = new Discussion($disc_array);

if ($action == 'Ajouter mon message')
{
    $message = $manager->getOpenMsg($discussion->getIdDiscussion());

    if ($manager->canWrite($_SESSION['email'], $discussion->getIdDiscussion(), $message->getIdMsg())) {
        $msg = $_POST['texte'];
        $manager->concatenation($message, $msg);
    } else {
        header("location:$page_disc_controller?error=ERROR_write");
    }

    header("location:$page_disc_controller");
} else if ($action == 'Fermer le message')
{
    $message = $manager->getOpenMsg($discussion->getIdDiscussion());

    if ($manager->getTexte($message->getIdMsg()) != '')
        $manager->closeMsg($message);

    header("location:$page_disc_controller");
} else if ($action == 'Like')
{
    if ($manager->canLike($_SESSION['email'], $discussion->getIdDiscussion())) {
        $manager->incrLike($discussion->getIdDiscussion());
    }

    header("location:$page_disc_controller");
} else {
    header("location:$page_disc_controller?error=ERROR_processing");
}