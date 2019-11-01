<?php

include_classe(); //inclusion des classes nécessaires
$db = dtb_connect_PDO(); //connection a la base de donnée avec PDO
$user_manager = new UserManager($db);
$disc_manager = new Disc_Mess_Manager($db);

// on recupere l'utilisateur
$user = $user_manager->getUser($_SESSION['email']);
$disc_liste = $disc_manager->getUserDiscussion($user->getEmail());

// on recupere le nombre de discussion ouverte de l'utilisateur
$nbDiscMax = 5;
$nbDiscUser = $disc_manager->getNbOpenDiscForUser($user->getEmail());

// on calcul le nombre de discussions restantes
$nbDiscRestantes = $nbDiscMax - $nbDiscUser;
