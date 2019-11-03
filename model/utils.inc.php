<?php

function start_page($title, $lien1, $background){ // fonction qui affiche tout le debut de la partie html
    echo'<!DOCTYPE html>
<html lang="fr">
<head>
<title>'.PHP_EOL.$title.'</title>
<link href="'.PHP_EOL.$lien1. '" rel="stylesheet">
<link rel="icon" type="image/png" href="https://zupimages.net/up/19/44/i76f.png" />
<link href="https://fonts.googleapis.com/css?family=Staatliches&display=swap" rel="stylesheet">
</head>
<body id="' .$background.'">'.PHP_EOL;

};

function end_page(){ // fonction qui affiche la fin de la partie html
    echo'</body></html>';
}
