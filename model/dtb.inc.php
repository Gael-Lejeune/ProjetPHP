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
        // requête envoyée
        echo 'Requête : ' . $query . '<br/>';
        exit();
    }
    else {
        return $dbResult;
    }
}


function loginckeck($manager)
{
    return ($manager->exist($_SESSION['email'], $_SESSION['password']) and $_SESSION['login']) ? true : false;
}

function dtb_connect_PDO ()
{
    $db = new PDO('mysql:host=mysql-latableronde.alwaysdata.net;dbname=latableronde_dtb', 191121, 'tableronde');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

    return $db;
}

function include_classe ()
{
    function chargerClasse ($classname)
    {
        require '../class/'.$classname.'.php';
    }

    spl_autoload_register('chargerClasse');
}
