<?php

// Contient les fonction de base en rapport avec la base de donnée et la POO

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
<?php
//require "../toolclass/function.inc.php";

// Connexion à la base de données
try
{
    $dbLink = new PDO('mysql:host=mysql-freenote.alwaysdata.net;dbname=freenote_sql', 'freenote','zawarudo');
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
//Récupération de l'ID de la discussion
$IdDiscussion = $_GET['Id_Discussion'];

// Récupération de la Discussion
$dis = $dbLink->prepare('SELECT NomDiscussion, Id_Discussion FROM Discussion WHERE Id_Discussion = ?');
$dis->execute(array($_GET['Id_Discussion']));
$Ddis = $dis->fetch();

// Récupération des messages de la discussion
$FMess = $dbLink->prepare('SELECT FullMessage FROM FullMessage WHERE Id_Discussion = ?');
$FMess->execute(array($_GET['Id_Discussion']));
$DFMess = $FMess->fetch();

//Récupère le message en cours
$MessInPr = $dbLink->prepare('SELECT Message FROM Message WHERE Id_Discussion = ?');
$MessInPr->execute(array($_GET['Id_Discussion']));
$DMessInPr = $MessInPr->fetch();

?>
