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


function querycheck($dbLink, $query, $successmessage)
{
//Verification de la viabilite de la requete
    if (!($dbResult = mysqli_query($dbLink, $query))) {
        echo 'Erreur de requête<br/>';
        // type d'erreur
        echo 'Erreur : ' . mysqli_error($dbLink) . '<br/><br/>';
        // requête envoyée
        echo 'Requête : ' . $query . '<br/>';
        exit();
    }
    else {
        echo $successmessage;
    }
    return $dbResult;
}