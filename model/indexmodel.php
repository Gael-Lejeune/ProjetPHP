<?php

include_classe(); //inclusion des classes nécessaires
$db = dtb_connect_PDO(); //connection a la base de donnée avec PDO
$manager = new Disc_Mess_Manager($db);

$_SESSION['discussion']=NULL;

$result = $manager->getDiscussionPagination();
$msg_Disc1 = $manager->getMsgForIDDisc($result[0]['idDiscussion']);
$msg_Disc2 = $manager->getMsgForIDDisc($result[1]['idDiscussion']);

var_dump($_SESSION);