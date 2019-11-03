<?php

include "../model/utils.inc.php";
include "../model/link.inc.php";
include '../model/dtb.inc.php';

include_classe(); //inclusion des classes nécessaires
$db = dtb_connect_PDO(); //connection a la base de donnée avec PDO
$manager = new UserManager($db);

//Verification de l'existance des variables
if (isset($_POST['name']) and isset($_POST['email']) and isset($_POST['password']) and isset($_POST['passwordconf']) and isset($_POST['action']))
{
    $name=$_POST['name'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $passwordconf = md5($_POST['passwordconf']);
    $action = $_POST['action'];
}
else
    {
    header ("location:$inscriptioncontroller?step=ERROR_incomplet"); // sinon on renvoi une erreur disant que le formulaire n'est pas complet
}

//Si la personne a bien coche les conditions geerales d'utilisation
if (isset($_POST['conditions']) and $_POST['conditions'] == 'ok')
{
    //Si le mot de passe et le mot de passe de confirmation sont bien les memes
    if ($password == $passwordconf)
    {
        if ($manager->email_exist($email)) {
            header("location:");
        } else {
            //insertion dans la base de donnée d'un nouvel user
            $user = new User(['user_name' => $name, 'email' => $email, 'password' => $password, 'role' => 'member']);
            $manager->add($user);
            header("location:$indexcontroller"); // On retourne sur l'index
        }

    }
    //Si les mots de passes ne correspondent pas on retourne sur la page d'inscription en renvoyant une erreur
    else
        {
        header ("location:$inscriptioncontroller?step=ERROR_mdp"); // On revient sur la page en renvoyant une erreur

    }

}
//Si les conditions generales d'utilisation ne sont pas coches on retourne sur la page d'inscription en renvoyant une erreur
else
    {
    header ("location:$inscriptioncontroller?step=ERROR_cond"); // On revient sur la page en renvoyant une erreur
}
