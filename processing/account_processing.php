<?php
include "../model/dtb.inc.php";
include "../model/utils.inc.php";
include "../model/link.inc.php";

session_start(); // on demarre la session

include_classe(); //inclusion des classes nécessaires
$db = dtb_connect_PDO(); //connection a la base de donnée avec PDO
$manager = new UserManager($db); // création du manager

//Si la personne est bien connecté
if(loginckeck($manager)) {

    //Récupération des mot de passe
    $real_password = $_SESSION['password'];
    if (isset($_POST['password'])) {
        $enter_password = md5($_POST['password']); // on crypte le mot de passe
    } else {
        header("location:$myprofilecontroller?error=ERROR_incomplet"); // si le mot de passe n'a pas été entré dans le formulaire
    }

    //Si les deux mots de passe correspondent
    if ($real_password == $enter_password) {
        //On recupere la valeur renvoye par le bouton submit
        $action = $_POST['submit'];

        //Si la variable action vaut 'password' c'est que l'utilisateur veux changer son mot de passe
        if ($action == 'password') {
            //On recupere alors son nouveau mot de passe
            $new_password = md5($_POST['new_password']);

            // On met à jour le mot de passe dans la base de donnée
            $user = $manager->getUser($_SESSION['email']);
            $user->setPassword($new_password);
            $manager->updatePassword($user);

            $_SESSION['password'] = $new_password; // On met à jour la variable $_SESSION pour eviter les erreurs de connection
            header("Location:$myprofilecontroller"); // On revient sur la même page

        // L'utilisateur veut changer son nom
        } elseif ($action == 'login') {

            //On recupere le nouveau nom
            $new_login = (string)$_POST['new_login'];

            $user = $manager->getUser($_SESSION['email']);
            $user->setUser_name($new_login);
            $manager->updateName($user); // On met à jour le pseudo dans la base de donnée

            header("Location:$myprofilecontroller"); // On revient sur la même page
        }
    //Si les deux mots de passe ne correspondent pas
    } else {
        header("Location:$myprofilecontroller?error=ERROR_mdp"); // On revient sur la page en renvoyant une erreur
    }
// si la personne n'est pas connecté
} else {
    session_destroy();
    header("location:$logincontroller?error=ERROR_auth"); // On revient sur l'index
}
