<?php

function start_page($title, $lien1, $rel1, $lien2, $rel2, $background){ // fonction qui affiche tout le debut de la partie html

    echo'<!DOCTYPE html> 
<html lang="fr">
<head>
<title>'.PHP_EOL.$title.'</title>
<link href="'.PHP_EOL.$lien1.'" rel="'.PHP_EOL.$rel1.'">
    <link href="'.PHP_EOL.$lien2.'" rel="'.PHP_EOL.$rel2.'">
</head>
<body id="'.$background.'">'.PHP_EOL;

};

function end_page(){ // fonction qui affiche la fin de la partie html
    echo'</body></html>';
}