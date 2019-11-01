<?php

include_classe(); //inclusion des classes nécessaires
$db = dtb_connect_PDO(); //connection a la base de donnée avec PDO
$user_manager = new UserManager($db);
$disc_manager = new Disc_Mess_Manager($db);

$user = $user_manager->getUser($_SESSION['email']);
$disc_liste = $disc_manager->getUserDiscussion($user->getEmail());

$nbDiscMax = 5;
$nbDiscUser = $disc_manager->getNbOpenDiscForUser($user->getEmail());

$nbDiscRestantes = $nbDiscMax - $nbDiscUser;

