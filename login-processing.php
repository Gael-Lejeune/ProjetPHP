<?php
include "utils.inc.php";


start_page("login");

session_start();


$step=$_GET['step'];
echo $step, '<br/>';

$dbLink=mysqli_connect("mysql-latableronde.alwaysdata.net","191121","tableronde")
or die('Erreurdeconnexionauserveur:'.mysqli_connect_error());

mysqli_select_db($dbLink,"latableronde_dtb")
or die('Erreurdanslasélectiondelabase:'.mysqli_error($dbLink));

$email=$_POST['email'];
$password=$_POST['password'];
$query="SELECT email,password,connection_number FROM user WHERE email = '$email' AND password = '$password'";


if(!($dbResult=mysqli_query($dbLink, $query)))
{
    echo'Erreurderequête<br/>';
//Afficheletyped'erreur.
    echo'Erreur:'.mysqli_error($dbLink).'<br/>';
//Affichelarequêteenvoyée.
    echo'Requête:'.$query.'<br/>';
    exit();
}



$dbRow=mysqli_fetch_assoc($dbResult);

if($email == $dbRow['email'] &&  $password == $dbRow['password'])
{
    $_SESSION['login']='ok';
    $_SESSION['email']=$email;
    $_SESSION['passsword']=$password;

    header('Location:index.php');

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