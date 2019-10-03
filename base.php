<?php

//ouverture connexion serveur BD
$dbLink = mysqli_connect('mysql-latableronde.alwaysdata.net', '191121', 'tableronde')
or die('Erreur de connexion au serveur : ' . mysqli_connect_error());

//sélection BD
mysqli_select_db($dbLink , 'latableronde_dtb')
or die('Erreur dans la sélection de la base : ' . mysqli_error($dbLink));

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

//vérif conditions générales
if (isset($_POST['conditions']))
{
    $conditions=$_POST['conditions'];
}
else{
    $conditions=" ";
}

//récup variables en POST
$name = $_POST['name'];
$civilite = $_POST['civilite'];
$email = $_POST['email'];
$password = $_POST['password'];
$conditions = $_POST['conditions'];

//insertion dans BD
$query='INSERT INTO user(name, civilite, email, password, conditions)VALUES(';
$query.='"'.$name.'",';
$query.='"'.$civilite.'",';
$query.='"'.$email.'",';
$query.='"'.$password.'",';
$query.='"'.$conditions.'",';


