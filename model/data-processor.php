<?php

include "../model/utils.inc.php";
include "../model/link.inc.php";
include '../model/dtb.inc.php';


$dbLink = dtbconnect();

//vérif du nom
if (isset($_POST['name']))
{
    $name=$_POST['name'];
}
else{
    $name=" ";
}

//vérif de la civilité
if (isset($_POST['civilite']))
{
    $civilite=$_POST['civilite'];
}
else{
    $civilite=" ";
}

//vérif du mail
if (isset($_POST['email']))
{
    $email=$_POST['email'];
}
else{
    $email=" ";
}

//vérif du mot de passe
if (isset($_POST['password']))
{
    $password=$_POST['password'];
}
else{
    $password=" ";
}

//vérif du mot de passe
if (isset($_POST['passwordconf']))
{
    $passwordconf=$_POST['passwordconf'];
}
else{
    $passwordconf=" ";
}

//récup variables en POST
$name = $_POST['name'];
$civilite = $_POST['civilite'];
$email = $_POST['email'];
$password = md5($_POST['password']);
$passwordconf = md5($_POST['passwordconf']);
$conditions = $_POST['conditions'];
$action = $_POST['action'];

//Si la personne a bien coche les conditions geerales d'utilisation
if ($conditions == 'ok') {

    //Si le mot de passe et le mot de passe de confirmation sont bien les memes
    if ($password == $passwordconf) {
        //insertion dans la base de donnee d'un nouvel user
        $query='INSERT INTO user(name, civilite, email, password)VALUES(';
        $query.='"'.$name.'",';
        $query.='"'.$civilite.'",';
        $query.='"'.$email.'",';
        $query.='"'.$password.'")';

       $dbResult = querycheck($dbLink, $query);


        //affichage après validation du formulaire
        header("location:$indexcontroller");


        //Si les mots de passes ne correspondent pas on retourne sur la page d'inscription en renvoyant une erreur
    } else {
        header ('Location:formulaire_inscription.php?step=ERROR_mdp');

    }

    //Si les conditions generales d'utilisation ne sont pas coches on retourne sur la page d'inscription en renvoyant une erreur
} else {
    header ('Location:formulaire_inscription.php?step=ERROR_cond');
}



