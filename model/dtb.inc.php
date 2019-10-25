<?php

function dtbconnect(){
//ouverture connexion serveur BD
    $dbLink = mysqli_connect('mysql-latableronde.alwaysdata.net', '191121', 'tableronde')
    or die('Erreur de connexion au serveur : ' . mysqli_connect_error());
//sélection BD
    mysqli_select_db($dbLink, 'latableronde_dtb')
    or die('Erreur dans la sélection de la base : ' . mysqli_error($dbLink));
    return $dbLink;
}


function querycheck($dbLink, $query)
{
//Verification de la viabilite de la requete
    if (!($dbResult = mysqli_query($dbLink, $query))) {
        echo 'Erreur de requête<br/>';
        // type d'erreur
        echo 'Erreur : ' . mysqli_error($dbLink) . '<br/><br/>';
        var_dump($dbLink);
        // requête envoyée
        echo 'Requête : ' . $query . '<br/>';
        exit();
    }
    else {
        return $dbResult;
    }
}


function loginckeck($email,$password)
{
    $dbLink = dtbconnect();
    $query="SELECT email,password,connection_number FROM user WHERE email = '$email' AND password = '$password'";

//Verification de la viabilité de la requete
    $dbResult = querycheck($dbLink, $query);
    $dbRow=mysqli_fetch_assoc($dbResult);
//Si le mot de passe et l'email correspondent
    if ($email != $dbRow['email'] || $password != $dbRow['password']) {
        //On demarre la session
        header('Location:login.php?error=ERROR');
    }
}
