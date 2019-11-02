<?php

include_classe(); //inclusion des classes nécessaires
$db = dtb_connect_PDO(); //connection a la base de donnée avec PDO
$user_manager = new UserManager($db);
$manager = new Disc_Mess_Manager($db);

// On recupere les informations de la discussion, l'utilisateur qui l'a créer et les messages qu'elle contient
$result = $manager->getDiscussion($_GET['discussion']);
$user = $user_manager->getUser($manager->getOwner($_GET['discussion']));
$messages = $manager->getMsgForIDDisc($_GET['discussion']);
