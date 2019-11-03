<?php
// Contient les fonction de base en rapport avec la base de donnée et la PDO

function loginckeck($manager) // renvoi vrai si la personne est bien connecté (en verifiant les variables SESSION) et faux dans l'autre cas
{
    return ($manager->exist($_SESSION['email'], $_SESSION['password']) and $_SESSION['login']) ? true : false;
}

function dtb_connect_PDO () // Connection avec la base de donnée avec PDO
{
    $db = new PDO('mysql:host=mysql-latableronde.alwaysdata.net;dbname=latableronde_dtb', 191121, 'tableronde');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

    return $db;
}

function include_classe () // Charge uniquement les classes necessaire au fichier dans laquelle la fonction est appellé
{
    function chargerClasse ($classname)
    {
        require '../class/'.$classname.'.php';
    }

    spl_autoload_register('chargerClasse');
}
?>
