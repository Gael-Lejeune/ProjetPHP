<?php

function start_page($title, $lien1, $rel1, $lien2, $rel2)
{
    echo'<!DOCTYPE html> 
<html lang="fr">
<head>
<title>'.PHP_EOL.$title.'</title>
<link href="'.PHP_EOL.$lien1.'" rel="'.PHP_EOL.$rel1.'">
    <link href="'.PHP_EOL.$lien2.'" rel="'.PHP_EOL.$rel2.'">
</head>
<body>'.PHP_EOL;
};

function start_page1($title)
{
    echo'<!DOCTYPE html> 
<html lang="fr">
<head>
<title>'.PHP_EOL.$title.'</title>
</head>
<body>'.PHP_EOL;
};


function end_page()
{
    echo'</body></html>';
}