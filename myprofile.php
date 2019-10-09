<?php
include "utils.inc.php";
include "link.inc.php";

start_page("login", "html/css/myprofile.css", "stylesheet", "fonts.googleapis.com/css?family=Oswald&display=swap", "stylesheet");

session_start();

//ouverture connexion serveur BD
$dbLink=mysqli_connect("mysql-latableronde.alwaysdata.net","191121","tableronde")
or die('Erreur de connexion au serveur:'.mysqli_connect_error());

//sélection BD
mysqli_select_db($dbLink,"latableronde_dtb")
or die('Erreur dans la sélection de la base:'.mysqli_error($dbLink));

$real_password=$_SESSION['password'];
$enter_password=$_POST['Password'];


if($real_password == $enter_password) {

    $action=$_POST['submit'];

    if ($action == 'password') {

        $new_password=$_POST['DoChangePassword'];
        $email=$_SESSION['email'];

        $query="UPDATE user SET user.password='$new_password' WHERE email='$email' and password='$real_password'";

        //Verification de la viabilité de la requete
        if(!($dbResult=mysqli_query($dbLink, $query))) {
            echo 'Erreurderequête<br/>';
            //Affichele type d'erreur.
            echo 'Erreur:' . mysqli_error($dbLink) . '<br/>';
            //Affiche la requête envoyée.
            echo 'Requête:' . $query . '<br/>';
            exit();
        } else {
            header('Location:'.$indexaddr);
        }

    } elseif ($action == 'login') {

    } else {

    }

} else {
    header('Location:account.php?error=ERROR');
}
