<?php

include_classe(); //inclusion des classes nécessaires
$db = dtb_connect_PDO(); //connection a la base de donnée avec PDO
$manager = new Disc_Mess_Manager($db);

$result = $manager->getDiscussion();
$msg_Disc1 = $manager->getMsgForIDDisc($result[0]['id_discussion']);
$msg_Disc2 = $manager->getMsgForIDDisc($result[1]['id_discussion']);
