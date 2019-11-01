<?php
include "../model/dtb.inc.php";
include "../model/utils.inc.php";
include  "../model/link.inc.php";

session_start();

include_classe(); //inclusion des classes nécessaires
$db = dtb_connect_PDO(); //connection a la base de donnée avec PDO
$manager = new UserManager($db);

//Si la personne est bien connecté
if(loginckeck($manager)) {

    //Récupération des mot de passe
    $real_password = $_SESSION['password'];
    if (isset($_POST['password'])) {
        $enter_password = md5($_POST['password']);
    } else {
        header("location:$myprofilecontroller?step=ERROR_incomplet");
    }

    //Si les deux mots de passe correspondent
    if ($real_password == $enter_password) {

        //On recupere la valeur renvoye par le bouton submit
        $action = $_POST['submit'];

        //Si la variable action vaut 'password' c'est que l'utilisateur veux changer son mot de passe
        if ($action == 'password') {

            //On recupere alors son nouveau mot de passe
            $new_password = md5($_POST['new_password']);

            $user = $manager->getUser($_SESSION['email']);
            $user->setPassword($new_password);
            $manager->updatePassword($user);

            $_SESSION['password'] = $new_password;
            header("Location:$myprofilecontroller");

        // L'utilisateur veut changer son nom
        } elseif ($action == 'login') {

            //On recupere le nouveau nom
            $new_login = (string)$_POST['new_login'];

            $user = $manager->getUser($_SESSION['email']);
            $user->setUser_name($new_login);
            $manager->updateName($user);

            header("Location:$myprofilecontroller");

        }
    //Si les deux mots de passe ne correspondent pas
    } else {
        header("Location:$myprofilecontroller?error=ERROR_mdp");
    }
} else {
    session_destroy();
    header("location:$indexcontroller?error=ERROR_auth");
}