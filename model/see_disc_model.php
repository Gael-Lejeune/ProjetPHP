<?php

include_classe(); //inclusion des classes nécessaires
$db = dtb_connect_PDO(); //connection a la base de donnée avec PDO
$user_manager = new UserManager($db);
$disc_manager = new Disc_Mess_Manager($db);

//Si la personne est connecte
if (loginckeck($user_manager)){
    $user = $user_manager->getUser($_SESSION['email']); // On récupère ses informations
}
//Si la personne n'est pas connecte
else
{
    session_destroy();
    header("location:$logincontroller?error=ERROR_auth"); // On revient sur l'index
}


// on recupere l'utilisateur
$user = $user_manager->getUser($_SESSION['email']);
$disc_liste = $disc_manager->getUserDiscussion($user->getEmail());

// on recupere le nombre de discussion ouverte de l'utilisateur
$file = file('../ParamsAdmin.txt');
$nbDiscMax = $file['1'];
$nbDiscUser = $disc_manager->getNbOpenDiscForUser($user->getEmail());

// on calcul le nombre de discussions restantes
$nbDiscRestantes = $nbDiscMax - $nbDiscUser;
