<?php
include "../model/utils.inc.php";
include "../model/link.inc.php";
include '../model/dtb.inc.php';

session_start(); // On demarre la session

include_classe(); //inclusion des classes nécessaires
$db = dtb_connect_PDO(); //connection a la base de donnée avec PDO
$manager = new UserManager($db);

//Verification de l'existance des variables
if (isset($_POST['email']) and isset($_POST['password']) and isset($_POST['action']))
{
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $action = $_POST['action'];
}
else
    {
    header ("location:$inscriptioncontroller?step=ERROR_incomplet"); // Sinon on renvoit une erreur disant que le formulaire n'est pas complet
}

//Si l'utilisateur existe
if ($manager->exist($email, $password))
{
    //On demarre la session
    $_SESSION['login']=true;
    $_SESSION['email']=$email;
    $_SESSION['password']=$password;

    //On retourne sur l'index
    header("Location:$indexcontroller");
}
//Sinon on lui envoi un message d'erreur
else
{
    header("Location:$logincontroller?error=ERROR");
}
