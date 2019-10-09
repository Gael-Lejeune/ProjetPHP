<?php
include "utils.inc.php";
include "link.inc.php";

start_page1("login");

session_start();

//ouverture connexion serveur BD
$dbLink=mysqli_connect("mysql-latableronde.alwaysdata.net","191121","tableronde")
or die('Erreurdeconnexionauserveur:'.mysqli_connect_error());

//sélection BD
mysqli_select_db($dbLink,"latableronde_dtb")
or die('Erreurdanslasélectiondelabase:'.mysqli_error($dbLink));

//Recuperation des variables en post
$email=$_POST['email'];
$password=$_POST['password'];
//Definition de la requete mySql
$query="SELECT email,password,connection_number FROM user WHERE email = '$email' AND password = '$password'";

//Verification de la viabilité de la requete
if(!($dbResult=mysqli_query($dbLink, $query)))
{
    echo'Erreurderequête<br/>';
//Affichele type d'erreur.
    echo'Erreur:'.mysqli_error($dbLink).'<br/>';
//Affiche la requête envoyée.
    echo'Requête:'.$query.'<br/>';
    exit();
}


$dbRow=mysqli_fetch_assoc($dbResult);
if($email == $dbRow['email'] &&  $password == $dbRow['password'])
{
    $_SESSION['login']=true;
    $_SESSION['email']=$email;
    $_SESSION['passsword']=$password;

    header('Location:'.$indexaddr);

    /*
    $nbc = "SELECT connection_number FROM user WHERE id = $email";
    $nbc = mysqli_query($dbLink, $nbc);
    $nbc = mysqli_fetch_assoc($nbc);
    $nbc = $nbc['connection_number'];
    $nbc = $nbc+1;
    $nbc = "UPDATE user SET connection_number = $nbc  WHERE id = $email";
    mysqli_query($dbLink, $nbc);
    */

}

else
{
    header('Location:login.php?step=ERROR');
}