<?php

include_classe(); //inclusion des classes nécessaires
$db = dtb_connect_PDO(); //connection a la base de donnée avec PDO
$user_manager = new UserManager($db);
$disc_manager = new Disc_Mess_Manager($db);

$user = $user_manager->getUser($_SESSION['email']);

$disc_liste = $disc_manager->getUserDiscussion($user->getEmail());

function affiche_disc () {
    foreach ($disc_liste as $key_disc => $disc_array) {
        $discussion = new Discussion ($disc_array);
        echo $discussion->getDiscName().'<br>';
        $mess_liste = $disc_manager->getMsgForIDDisc($discussion->getIdDiscussion());
        foreach ($mess_liste as $key_mess => $mess_array) {
            $message = new Message($mess_array);
            echo $message->getText().'<br>';
        }
        echo '<br>';
    }
}

