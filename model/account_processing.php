<?php
include "../model/dtb.inc.php";
include "../model/utils.inc.php";
include  "../model/link.inc.php";
//Demarrage de la page
$dbLink = dtbconnect();

session_start();
//Recuperation du mot de passe entrer dans le formulaire (pour confirmation de l'identite) et du mot de passe enregistre de l'utilisateur (que ce soit pour changer le nom ou le mot de passe

$real_password=$_SESSION['password'];
$enter_password=md5($_POST['Password']);

//Si les deux mots de passe correspondent
if($real_password == $enter_password) {

    //On recupere la valeur renvoye par le bouton submit
    $action=$_POST['submit'];


    //Si la variable action vaut 'password' c'est que l'utilisateur veux changer son mot de passe
    if ($action == 'password') {

        //On recupere alors son nouveau mot de passe et son email
        $new_password=md5($_POST['DoChangePassword']);
        $email=$_SESSION['email'];

        //On update le password dans la table user pour la personne qui a l'email de la session ouverte
        $query="UPDATE user SET user.password='$new_password' WHERE email='$email' and password='$real_password'";

        //Verification de la viabilité de la requete
        $dbResult = querycheck($dbLink,$query);

        header("Location:$myprofilecontroller");
    }
    elseif ($action == 'login') {

        //On recupere le nouveau nom et l'email
        $new_name = $_POST['DoChangeLogin'];
        $email = $_SESSION['email'];


        //On update le name dans la table user
        $query = "UPDATE user SET user.name='$new_name' WHERE email='$email' and password='$real_password'";


        //Verification de la viabilité de la requete
        $dbResult = querycheck($dbLink, $query);

        header("Location:$myprofilecontroller");
    }
    //Si les deux mots de passe ne correspondent pas
} else {
    header("Location:$myprofilecontroller?error=ERROR");
}
