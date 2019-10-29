<?php

include_classe(); //inclusion des classes nécessaires
$db = dtb_connect_PDO(); //connection a la base de donnée avec PDO
$user_manager = new UserManager($db);
$manager = new Disc_Mess_Manager($db);

if(isset($_POST['discussion'])) {
    $_SESSION['discussion'] = $_POST['discussion'];
}

var_dump($_SESSION);
var_dump($_POST);

$result = $manager->getDiscussion($_SESSION['discussion']);

$messages = $manager->getMsgForIDDisc($_SESSION['discussion']);

