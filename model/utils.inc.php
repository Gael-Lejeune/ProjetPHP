<?php

function start_page($title, $lien1, $background) // fonction qui affiche tout le debut de la partie html
{
    echo'<!DOCTYPE html>
<html lang="fr">
<head>
<title>'.PHP_EOL.$title.'</title>
<link href="'.PHP_EOL.$lien1.'" rel="stylesheet">
<link href="http://fr.allfont.net/allfont.css?fonts=bebas" rel="stylesheet" type="text/css">
</head>
<body id="'.$background.'">'.PHP_EOL;

};

function end_page() // fonction qui affiche la fin de la partie html
{
    echo'</body></html>';
}
